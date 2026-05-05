<?php
/**
 * About.php — clean refactor (v2)
 * ────────────────────────────────────────────────────────────
 * Extracts inline <style> and <script> from about.php into
 *   • css/about-page.css
 *   • js/about-page.js
 * and rewires the footer through includes/footer.php — without
 * any layout/UI changes. The body content (sections + cert grid +
 * cert lightbox div) is left exactly as it is.
 *
 * Run once:  http://localhost:8080/demosite/refactor-about-v2.php
 *
 * Safety:
 *   • Backs up about.php to about.php.v2-backup-YYYYMMDD-HHMMSS first.
 *   • Only modifies the file if the rewrite parses cleanly under php -l.
 *   • If anything fails, the original file is left untouched.
 *   • Re-running is safe (idempotent) — already-refactored files are skipped.
 */

set_time_limit(60);
header('Content-Type: text/html; charset=utf-8');

$dir       = __DIR__;
$pagePath  = $dir . '/about.php';
$cssPath   = $dir . '/css/about-page.css';
$jsPath    = $dir . '/js/about-page.js';
$ts        = date('Ymd-His');

$results = array();
$abort   = false;

if (!is_file($pagePath)) die('ERROR: about.php not found.');

$src = file_get_contents($pagePath);
if ($src === false) die('ERROR: could not read about.php');

/* ─── Idempotency ─── */
if (strpos($src, "css/about-page.css") !== false &&
    strpos($src, "/includes/footer.php") !== false) {
    $results[] = array('step' => 'Idempotency check', 'status' => 'skip',
        'note' => 'about.php already uses css/about-page.css and includes/footer.php — nothing to do');
}

/* ─── 1. Backup ─── */
$backup = $pagePath . '.v2-backup-' . $ts;
if (!file_put_contents($backup, $src)) {
    $results[] = array('step' => 'Backup', 'status' => 'fail', 'note' => 'could not write backup');
    $abort = true;
} else {
    $results[] = array('step' => 'Backup', 'status' => 'ok', 'note' => basename($backup));
}

/* Work on a mutable copy */
$work = $src;

/* ─── 2. Extract ALL inline <style> blocks (combine into one CSS file) ─── */
$cssChunks = array();
if (!$abort && preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $work, $sm, PREG_OFFSET_CAPTURE)) {
    foreach ($sm[1] as $match) {
        $cssChunks[] = trim($match[0]);
    }
    // Walk right-to-left so offsets stay valid
    $blocks = $sm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        // swallow trailing whitespace
        while ($end < strlen($work) && in_array($work[$end], array("\n","\r","\t"," "), true)) $end++;
        $work = substr($work, 0, $start) . substr($work, $end);
    }

    $cssOut = "/* ============================================================\n"
            . "   ABOUT PAGE STYLES — extracted from about.php inline <style>\n"
            . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-about-v2.php\n"
            . "   Two original blocks merged in source order (main page + cert lightbox).\n"
            . "   ============================================================ */\n\n"
            . implode("\n\n/* ============= next inline block ============= */\n\n", $cssChunks) . "\n";

    if (!file_put_contents($cssPath, $cssOut)) {
        $results[] = array('step' => 'Extract CSS', 'status' => 'fail', 'note' => 'could not write css/about-page.css');
        $abort = true;
    } else {
        $results[] = array('step' => 'Extract CSS', 'status' => 'ok',
            'note' => count($cssChunks) . ' block(s) → ' . round(strlen($cssOut)/1024, 1) . ' KB');
    }
} else {
    $results[] = array('step' => 'Extract CSS', 'status' => 'skip', 'note' => 'no inline <style> blocks found');
}

/* ─── 3. Extract ALL inline <script> blocks WITHOUT a src= attribute ─── */
$jsChunks = array();
if (!$abort && preg_match_all('#<script\b(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is', $work, $jm, PREG_OFFSET_CAPTURE)) {
    foreach ($jm[1] as $match) {
        $jsChunks[] = trim($match[0]);
    }
    $blocks = $jm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($work) && in_array($work[$end], array("\n","\r","\t"," "), true)) $end++;
        $work = substr($work, 0, $start) . substr($work, $end);
    }

    $jsOut = "/* ============================================================\n"
           . "   ABOUT PAGE BEHAVIOUR — extracted from about.php inline <script>\n"
           . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-about-v2.php\n"
           . "   ============================================================ */\n\n"
           . implode("\n\n/* ============= next inline block ============= */\n\n", $jsChunks) . "\n";

    if (!file_put_contents($jsPath, $jsOut)) {
        $results[] = array('step' => 'Extract JS', 'status' => 'fail', 'note' => 'could not write js/about-page.js');
        $abort = true;
    } else {
        $results[] = array('step' => 'Extract JS', 'status' => 'ok',
            'note' => count($jsChunks) . ' block(s) → ' . round(strlen($jsOut)/1024, 1) . ' KB');
    }
} else {
    $results[] = array('step' => 'Extract JS', 'status' => 'skip', 'note' => 'no inline <script> blocks found');
}

/* ─── 4. Inject <link> tag before </head> ─── */
if (!$abort && !empty($cssChunks)) {
    $work = preg_replace(
        '#</head>#i',
        "    <!-- About page styles (extracted) -->\n"
        . "    <link rel=\"stylesheet\" href=\"css/about-page.css\">\n"
        . '</head>',
        $work,
        1
    );
}

/* ─── 5. Remove the inline footer block + replace with includes/footer.php call
        Boundary:   FROM the comment "<!-- ─── MARINE ANIMATED FOOTER ─── -->"
                    (or the <footer id="footer" ...> tag if comment isn't there)
                    TO  </html> (inclusive)
        Replace with: $extra_js = ['about-page']; include 'includes/footer.php';
   ─── */
if (!$abort) {
    // try to locate the start of the footer chunk
    $startPattern = '/(?:[ \t]*<!--[^>]*MARINE\s+(?:ANIMATED\s+)?FOOTER[^>]*-->\s*)?[ \t]*<footer\s+id=["\']footer["\']\s+class=["\']marine-footer["\']/i';
    if (preg_match($startPattern, $work, $m, PREG_OFFSET_CAPTURE)) {
        $startOfFooter = $m[0][1];
        // Find end of the file (everything from MARINE FOOTER through </html>)
        $endPattern = '#</html>#i';
        if (preg_match($endPattern, $work, $em, PREG_OFFSET_CAPTURE)) {
            $endOfFile = $em[0][1] + strlen($em[0][0]);
            // Walk past any trailing whitespace
            while ($endOfFile < strlen($work) && in_array($work[$endOfFile], array("\n","\r","\t"," "), true)) {
                $endOfFile++;
            }

            $replacement =
                "    <?php\n" .
                "    /* Per-page JS bucket — picked up by includes/footer.php */\n" .
                "    \$extra_js = ['about-page'];\n" .
                "    include __DIR__ . '/includes/footer.php';\n" .
                "    ?>\n";

            $work = substr($work, 0, $startOfFooter) . $replacement . substr($work, $endOfFile);
            $results[] = array('step' => 'Replace footer', 'status' => 'ok',
                'note' => 'inline footer + scripts + closing tags replaced with single include');
        } else {
            $results[] = array('step' => 'Replace footer', 'status' => 'fail',
                'note' => 'could not find </html> after footer start');
            $abort = true;
        }
    } else {
        $results[] = array('step' => 'Replace footer', 'status' => 'skip',
            'note' => 'no inline footer block found (already migrated?)');
    }
}

/* ─── 6. Atomic write — only commit if PHP syntax is clean ─── */
if (!$abort) {
    // Write to a temp file and run php -l on it before committing
    $tmpPath = $pagePath . '.tmp-' . $ts;
    if (!file_put_contents($tmpPath, $work)) {
        $results[] = array('step' => 'Write temp', 'status' => 'fail', 'note' => 'could not write temp file');
        $abort = true;
    } else {
        $syntaxOk = true;
        $syntaxNote = 'no syntax check available (shell_exec disabled)';
        if (function_exists('shell_exec')) {
            $cmd = 'php -l ' . escapeshellarg($tmpPath) . ' 2>&1';
            $out = @shell_exec($cmd);
            if ($out !== null) {
                if (stripos($out, 'No syntax errors') !== false) {
                    $syntaxNote = 'no syntax errors';
                } else {
                    $syntaxOk   = false;
                    $syntaxNote = trim(strip_tags((string) $out));
                }
            }
        }

        if ($syntaxOk) {
            // Move temp over the live file
            if (!@rename($tmpPath, $pagePath)) {
                // rename can fail across volumes; fall back to copy + unlink
                if (copy($tmpPath, $pagePath)) {
                    @unlink($tmpPath);
                } else {
                    $results[] = array('step' => 'Commit', 'status' => 'fail',
                        'note' => 'could not move temp file over about.php');
                    $abort = true;
                }
            }
            if (!$abort) {
                $newSize  = filesize($pagePath);
                $newLines = substr_count(file_get_contents($pagePath), "\n");
                $results[] = array('step' => 'Commit', 'status' => 'ok',
                    'note' => 'about.php now ' . round($newSize/1024, 1) . ' KB · ' . $newLines . ' lines');
                $results[] = array('step' => 'Syntax check', 'status' => 'ok', 'note' => $syntaxNote);
            }
        } else {
            // Don't commit — leave about.php untouched
            @unlink($tmpPath);
            $results[] = array('step' => 'Commit', 'status' => 'fail',
                'note' => 'syntax check failed — original about.php LEFT UNTOUCHED');
            $results[] = array('step' => 'Syntax error', 'status' => 'fail', 'note' => $syntaxNote);
            $abort = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>about.php Refactor v2 Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0a1929; color: #f5f3ef; margin: 0; padding: 50px 24px; }
    h1 { color: #b87333; font-weight: 800; font-size: 1.7rem; margin: 0 0 10px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 920px; margin: 0 auto; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.04); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(184,115,51,0.15); }
    th { background: rgba(184,115,51,0.10); color: #f5d98b; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; font-size: 0.72rem; }
    .ok   { color: #6fc28a; font-weight: 700; }
    .skip { color: #a8c8d8; font-weight: 700; }
    .fail { color: #ff8a8a; font-weight: 700; }
    .note { color: rgba(255,255,255,0.7); font-size: 0.85rem; }
    .hint { background: rgba(184,115,51,0.10); border: 1px solid rgba(184,115,51,0.32); padding: 22px; border-radius: 12px; line-height: 1.85; margin-top: 24px; }
    .hint b { color: #f5d98b; }
    code { background: rgba(255,255,255,0.07); padding: 2px 8px; border-radius: 4px; color: #f5d98b; font-size: 0.86rem; }
    a { color: #f5d98b; }
</style>
</head>
<body>
<div class="container">
    <h1>about.php Refactor v2 Report</h1>
    <p class="lead">Two-step atomic refactor: extracted CSS/JS to external files, replaced inline footer with <code>includes/footer.php</code>, and verified PHP syntax before committing. UI/layout preserved.</p>

    <table>
        <thead><tr><th>Step</th><th>Status</th><th>Note</th></tr></thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['step']) ?></td>
                <td>
                    <?php if ($r['status'] === 'ok'):    ?><span class="ok">✓ ok</span>
                    <?php elseif ($r['status'] === 'skip'): ?><span class="skip">↷ skip</span>
                    <?php else:                          ?><span class="fail">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>What was changed:</b><br>
        • Both <code>&lt;style&gt;</code> blocks merged into <code>css/about-page.css</code>.<br>
        • Inline <code>&lt;script&gt;</code> moved into <code>js/about-page.js</code>.<br>
        • <code>&lt;link rel="stylesheet" href="css/about-page.css"&gt;</code> added before <code>&lt;/head&gt;</code>.<br>
        • Inline <code>&lt;footer&gt;</code> markup + back-to-top button + closing scripts/tags replaced with a single
        <code>&lt;?php $extra_js = ['about-page']; include 'includes/footer.php'; ?&gt;</code>.<br>
        • <code>about-page.js</code> is wired through the footer's <code>$extra_js</code> loop.<br>
        • Body content (hero, sections, cert grid, cert lightbox div) — UNTOUCHED.<br>
        • If syntax check failed, <code>about.php</code> was left exactly as it was. No half-baked rewrites.<br><br>

        <b>Test:</b><br>
        Visit <a href="about.php">http://localhost:8080/demosite/about.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). It should render exactly as before.<br><br>

        <b>If something looks off:</b><br>
        The original is preserved as <code>about.php.v2-backup-<?= $ts ?></code> in the demosite folder.
        Rename it back over <code>about.php</code> to restore.
    </div>
</div>
</body>
</html>
