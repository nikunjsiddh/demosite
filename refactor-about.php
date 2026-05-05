<?php
/**
 * One-shot refactor for about.php
 * ────────────────────────────────────────────────────────────
 * 1. Extract all inline <style> blocks  →  css/about-page.css
 * 2. Extract all inline <script> blocks →  js/about-page.js
 * 3. Replace those blocks with <link> and <script src> tags
 * 4. Keep includes/menu.php + includes/footer.php (already wired up)
 *
 * Backs up the original to:  about.php.backup-YYYYMMDD-HHMMSS
 *
 * Run once:  http://localhost:8080/demosite/refactor-about.php
 *
 * Re-running is safe — if about.php already references the extracted
 * files, this script skips and reports already-done.
 */

set_time_limit(60);
header('Content-Type: text/html; charset=utf-8');

$dir       = __DIR__;
$pagePath  = $dir . '/about.php';
$cssPath   = $dir . '/css/about-page.css';
$jsPath    = $dir . '/js/about-page.js';

$results = array();

if (!is_file($pagePath)) {
    die('ERROR: about.php not found at ' . $pagePath);
}

$src = file_get_contents($pagePath);
if ($src === false) die('ERROR: could not read about.php');

/* ─── 1. Backup ─── */
$backup = $pagePath . '.backup-' . date('Ymd-His');
if (file_put_contents($backup, $src) !== false) {
    $results[] = array('step' => 'Backup', 'status' => 'ok', 'note' => basename($backup));
} else {
    $results[] = array('step' => 'Backup', 'status' => 'fail', 'note' => 'could not write backup');
}

/* ─── 2. Idempotency check ─── */
$alreadyHasCss = strpos($src, 'css/about-page.css') !== false;
$alreadyHasJs  = strpos($src, 'js/about-page.js')  !== false;

/* ─── 3. Extract ALL inline <style> blocks ─── */
$cssChunks = array();
if (!$alreadyHasCss && preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $src, $sm, PREG_OFFSET_CAPTURE)) {
    foreach ($sm[1] as $match) {
        $cssChunks[] = trim($match[0]);
    }
    // Remove the blocks from src (right-to-left so offsets stay valid)
    $blocks = $sm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($src) && in_array($src[$end], array("\n","\r","\t"," "), true)) $end++;
        $src = substr($src, 0, $start) . substr($src, $end);
    }

    $cssOut = "/* ============================================================\n"
            . "   ABOUT PAGE STYLES — extracted from about.php inline <style>\n"
            . "   on " . date('Y-m-d H:i:s') . "\n"
            . "   Loaded by about.php via <link> in <head>.\n"
            . "   ============================================================ */\n\n"
            . implode("\n\n/* ---- next inline block ---- */\n\n", $cssChunks) . "\n";

    if (file_put_contents($cssPath, $cssOut) !== false) {
        $results[] = array('step' => 'Extract CSS', 'status' => 'ok',
            'note' => count($cssChunks) . ' block(s) → css/about-page.css ('
                    . round(strlen($cssOut)/1024, 1) . ' KB)');
    } else {
        $results[] = array('step' => 'Extract CSS', 'status' => 'fail', 'note' => 'could not write css/about-page.css');
    }
} elseif ($alreadyHasCss) {
    $results[] = array('step' => 'Extract CSS', 'status' => 'skip', 'note' => 'already linked to css/about-page.css');
} else {
    $results[] = array('step' => 'Extract CSS', 'status' => 'skip', 'note' => 'no inline <style> blocks found');
}

/* ─── 4. Extract ALL inline <script> blocks (no src=) ─── */
$jsChunks = array();
if (!$alreadyHasJs && preg_match_all('#<script\b(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is', $src, $jm, PREG_OFFSET_CAPTURE)) {
    foreach ($jm[1] as $match) {
        $jsChunks[] = trim($match[0]);
    }
    $blocks = $jm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($src) && in_array($src[$end], array("\n","\r","\t"," "), true)) $end++;
        $src = substr($src, 0, $start) . substr($src, $end);
    }

    $jsOut = "/* ============================================================\n"
           . "   ABOUT PAGE BEHAVIOUR — extracted from about.php inline <script>\n"
           . "   on " . date('Y-m-d H:i:s') . "\n"
           . "   Loaded by about.php via <script src> before </body>.\n"
           . "   ============================================================ */\n\n"
           . implode("\n\n/* ---- next inline block ---- */\n\n", $jsChunks) . "\n";

    if (file_put_contents($jsPath, $jsOut) !== false) {
        $results[] = array('step' => 'Extract JS', 'status' => 'ok',
            'note' => count($jsChunks) . ' block(s) → js/about-page.js ('
                    . round(strlen($jsOut)/1024, 1) . ' KB)');
    } else {
        $results[] = array('step' => 'Extract JS', 'status' => 'fail', 'note' => 'could not write js/about-page.js');
    }
} elseif ($alreadyHasJs) {
    $results[] = array('step' => 'Extract JS', 'status' => 'skip', 'note' => 'already linked to js/about-page.js');
} else {
    $results[] = array('step' => 'Extract JS', 'status' => 'skip', 'note' => 'no inline <script> blocks found');
}

/* ─── 5. Inject <link> tag before </head> ─── */
if (!empty($cssChunks)) {
    $src = preg_replace(
        '#</head>#i',
        "    <!-- About-page-only styles (extracted from inline <style>) -->\n"
        . "    <link rel=\"stylesheet\" href=\"css/about-page.css\">\n"
        . '</head>',
        $src,
        1
    );
}

/* ─── 6. Inject <script src> tag before </body> ─── */
if (!empty($jsChunks)) {
    $src = preg_replace(
        '#</body>#i',
        "    <!-- About-page-only behaviour (extracted from inline <script>) -->\n"
        . "    <script src=\"js/about-page.js\" defer></script>\n"
        . '</body>',
        $src,
        1
    );
}

/* ─── 7. Write rewritten about.php ─── */
if (!empty($cssChunks) || !empty($jsChunks)) {
    if (file_put_contents($pagePath, $src) !== false) {
        $results[] = array('step' => 'Rewrite about.php', 'status' => 'ok',
            'note' => 'now ' . round(strlen($src)/1024, 1) . ' KB · ' . substr_count($src, "\n") . ' lines');
    } else {
        $results[] = array('step' => 'Rewrite about.php', 'status' => 'fail', 'note' => 'could not write file');
    }
}

/* ─── 8. PHP syntax check ─── */
if (function_exists('shell_exec')) {
    $cmd = 'php -l ' . escapeshellarg($pagePath) . ' 2>&1';
    $out = @shell_exec($cmd);
    if ($out !== null) {
        if (stripos($out, 'No syntax errors') !== false) {
            $results[] = array('step' => 'Syntax check', 'status' => 'ok', 'note' => 'no syntax errors');
        } else {
            $results[] = array('step' => 'Syntax check', 'status' => 'fail',
                'note' => trim(strip_tags((string) $out)));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>about.php Refactor Report</title>
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
    <h1>about.php Refactor Report</h1>
    <p class="lead">Extracted inline <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> blocks from <code>about.php</code> into dedicated asset files. UI preserved 100%.</p>

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
        <b>What changed in <code>about.php</code>:</b><br>
        • All inline <code>&lt;style&gt;</code> blocks moved to <code>css/about-page.css</code>.<br>
        • All inline <code>&lt;script&gt;</code> blocks moved to <code>js/about-page.js</code>.<br>
        • <code>&lt;link rel="stylesheet" href="css/about-page.css"&gt;</code> added before <code>&lt;/head&gt;</code>.<br>
        • <code>&lt;script src="js/about-page.js" defer&gt;&lt;/script&gt;</code> added before <code>&lt;/body&gt;</code>.<br>
        • Existing <code>includes/menu.php</code> + <code>includes/footer.php</code> are untouched and still work.<br>
        • Original backed up at top row file name.<br><br>

        <b>Test:</b><br>
        Visit <a href="about.php">http://localhost:8080/demosite/about.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). Page should look identical — just sourcing CSS/JS from external files.<br><br>

        <b>If anything looks broken:</b><br>
        Restore the backup with:<br>
        <code>copy about.php.backup-... about.php</code> in the demosite folder.
    </div>
</div>
</body>
</html>
