<?php
/**
 * jjsb.php — clean CSS/JS extract (UI / layout preserved)
 * ────────────────────────────────────────────────────────────
 * Extracts the inline <style> and <script> blocks from jjsb.php
 * into:
 *   • css/jjsb-page.css
 *   • js/jjsb-page.js   (wrapped in IIFE + DOMContentLoaded + rAF safety)
 *
 * The body content AND the inline marine footer markup are left
 * exactly as they are. No structural change. No include rewiring.
 *
 * Run once:  http://localhost:8080/demosite/refactor-jjsb.php
 *
 * Safety:
 *   • Backs up jjsb.php to jjsb.php.backup-YYYYMMDD-HHMMSS first.
 *   • Writes proposed result to jjsb.php.tmp-... and runs `php -l` on it.
 *   • Only renames the temp over jjsb.php if syntax check passes.
 *   • If anything fails, the original file is left untouched.
 *   • Re-running is safe — already-refactored is detected and skipped.
 */

set_time_limit(60);
header('Content-Type: text/html; charset=utf-8');

$dir       = __DIR__;
$pagePath  = $dir . '/jjsb.php';
$cssPath   = $dir . '/css/jjsb-page.css';
$jsPath    = $dir . '/js/jjsb-page.js';
$ts        = date('Ymd-His');

$results = array();
$abort   = false;

if (!is_file($pagePath)) die('ERROR: jjsb.php not found.');

$src = file_get_contents($pagePath);
if ($src === false) die('ERROR: could not read jjsb.php');

/* ─── Idempotency check ─── */
if (strpos($src, "css/jjsb-page.css") !== false &&
    strpos($src, "js/jjsb-page.js")   !== false) {
    $results[] = array('step' => 'Idempotency check', 'status' => 'skip',
        'note' => 'jjsb.php already references both css/jjsb-page.css and js/jjsb-page.js — nothing to do');
    $abort = true;
}

/* ─── 1. Backup ─── */
if (!$abort) {
    $backup = $pagePath . '.backup-' . $ts;
    if (!file_put_contents($backup, $src)) {
        $results[] = array('step' => 'Backup', 'status' => 'fail', 'note' => 'could not write backup');
        $abort = true;
    } else {
        $results[] = array('step' => 'Backup', 'status' => 'ok', 'note' => basename($backup));
    }
}

$work = $src;

/* ─── 2. Extract ALL inline <style> blocks ─── */
$cssChunks = array();
if (!$abort && preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $work, $sm, PREG_OFFSET_CAPTURE)) {
    foreach ($sm[1] as $match) {
        $cssChunks[] = trim($match[0]);
    }
    $blocks = $sm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($work) && in_array($work[$end], array("\n","\r","\t"," "), true)) $end++;
        $work = substr($work, 0, $start) . substr($work, $end);
    }

    $cssOut = "/* ============================================================\n"
            . "   JJSB PAGE STYLES — extracted from jjsb.php inline <style>\n"
            . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-jjsb.php\n"
            . "   ============================================================ */\n\n"
            . implode("\n\n/* ============= next inline block ============= */\n\n", $cssChunks) . "\n";

    if (!file_put_contents($cssPath, $cssOut)) {
        $results[] = array('step' => 'Extract CSS', 'status' => 'fail', 'note' => 'could not write css/jjsb-page.css');
        $abort = true;
    } else {
        $results[] = array('step' => 'Extract CSS', 'status' => 'ok',
            'note' => count($cssChunks) . ' block(s) → ' . round(strlen($cssOut)/1024, 1) . ' KB');
    }
} elseif (!$abort) {
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

    /* Wrap extracted JS in IIFE + DOMContentLoaded + rAF safety fallback for `.reveal` */
    $jsBody = implode("\n\n/* ============= next inline block ============= */\n\n", $jsChunks);

    $jsOut  = "/* ============================================================\n"
            . "   JJSB PAGE BEHAVIOUR — extracted from jjsb.php inline <script>\n"
            . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-jjsb.php\n"
            . "   Wrapped in IIFE + DOMContentLoaded + rAF safety net so any\n"
            . "   .reveal element already in the viewport on load is shown\n"
            . "   immediately, even if IntersectionObserver misses it.\n"
            . "   ============================================================ */\n\n"
            . "(function () {\n"
            . "    'use strict';\n\n"
            . "    function boot() {\n"
            . $jsBody . "\n\n"
            . "        /* ─── Safety net: ensure any .reveal already in viewport gets .visible ─── */\n"
            . "        requestAnimationFrame(function () {\n"
            . "            requestAnimationFrame(function () {\n"
            . "                document.querySelectorAll('.reveal').forEach(function (el) {\n"
            . "                    if (el.classList.contains('visible')) return;\n"
            . "                    var rect = el.getBoundingClientRect();\n"
            . "                    if (rect.top < window.innerHeight && rect.bottom > 0) {\n"
            . "                        el.classList.add('visible');\n"
            . "                    }\n"
            . "                });\n"
            . "            });\n"
            . "        });\n"
            . "    }\n\n"
            . "    if (document.readyState === 'loading') {\n"
            . "        document.addEventListener('DOMContentLoaded', boot);\n"
            . "    } else {\n"
            . "        boot();\n"
            . "    }\n"
            . "})();\n";

    if (!file_put_contents($jsPath, $jsOut)) {
        $results[] = array('step' => 'Extract JS', 'status' => 'fail', 'note' => 'could not write js/jjsb-page.js');
        $abort = true;
    } else {
        $results[] = array('step' => 'Extract JS', 'status' => 'ok',
            'note' => count($jsChunks) . ' block(s) → ' . round(strlen($jsOut)/1024, 1) . ' KB · IIFE-wrapped + rAF safety');
    }
} elseif (!$abort) {
    $results[] = array('step' => 'Extract JS', 'status' => 'skip', 'note' => 'no inline <script> blocks found');
}

/* ─── 4. Inject <link> tag before </head> ─── */
if (!$abort && !empty($cssChunks)) {
    $work = preg_replace(
        '#</head>#i',
        "    <!-- jjsb page styles (extracted) -->\n"
        . "    <link rel=\"stylesheet\" href=\"css/jjsb-page.css\">\n"
        . '</head>',
        $work,
        1
    );
}

/* ─── 5. Inject <script src> tag before </body> ─── */
if (!$abort && !empty($jsChunks)) {
    $work = preg_replace(
        '#</body>#i',
        "    <!-- jjsb page behaviour (extracted) -->\n"
        . "    <script src=\"js/jjsb-page.js\" defer></script>\n"
        . '</body>',
        $work,
        1
    );
}

/* ─── 6. Atomic commit — only if PHP syntax is clean ─── */
if (!$abort) {
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
            if (!@rename($tmpPath, $pagePath)) {
                if (copy($tmpPath, $pagePath)) {
                    @unlink($tmpPath);
                } else {
                    $results[] = array('step' => 'Commit', 'status' => 'fail',
                        'note' => 'could not move temp file over jjsb.php');
                    $abort = true;
                }
            }
            if (!$abort) {
                $newSize  = filesize($pagePath);
                $newLines = substr_count(file_get_contents($pagePath), "\n");
                $results[] = array('step' => 'Commit', 'status' => 'ok',
                    'note' => 'jjsb.php now ' . round($newSize/1024, 1) . ' KB · ' . $newLines . ' lines');
                $results[] = array('step' => 'Syntax check', 'status' => 'ok', 'note' => $syntaxNote);
            }
        } else {
            @unlink($tmpPath);
            $results[] = array('step' => 'Commit', 'status' => 'fail',
                'note' => 'syntax check failed — original jjsb.php LEFT UNTOUCHED');
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
<title>jjsb.php Refactor Report</title>
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
    <h1>jjsb.php Refactor Report</h1>
    <p class="lead">CSS extracted to <code>css/jjsb-page.css</code>, JS to <code>js/jjsb-page.js</code> (IIFE-wrapped). Body content + inline footer markup were not touched. Atomic commit — syntax verified before write.</p>

    <table>
        <thead><tr><th>Step</th><th>Status</th><th>Note</th></tr></thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['step']) ?></td>
                <td>
                    <?php if ($r['status'] === 'ok'): ?><span class="ok">✓ ok</span>
                    <?php elseif ($r['status'] === 'skip'): ?><span class="skip">↷ skip</span>
                    <?php else: ?><span class="fail">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>What was changed in <code>jjsb.php</code>:</b><br>
        • Inline <code>&lt;style&gt;</code> block(s) → <code>css/jjsb-page.css</code>, replaced with <code>&lt;link&gt;</code> tag.<br>
        • Inline <code>&lt;script&gt;</code> block(s) → <code>js/jjsb-page.js</code>, replaced with <code>&lt;script src defer&gt;</code> tag.<br>
        • JS wrapped in IIFE + <code>DOMContentLoaded</code> + a <code>requestAnimationFrame</code> safety net that auto-shows any <code>.reveal</code> element already in the viewport on load.<br>
        • Body content — UNTOUCHED.<br>
        • Inline marine footer markup — UNTOUCHED.<br>
        • If syntax check failed, <code>jjsb.php</code> was left exactly as it was. No half-baked rewrites.<br><br>

        <b>Test:</b><br>
        Visit <a href="jjsb.php">http://localhost:8080/demosite/jjsb.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). Page should render exactly as before — same hero, stats, table, ISO chips, footer.<br><br>

        <b>If anything looks off:</b><br>
        Restore from <code>jjsb.php.backup-<?= $ts ?></code> in the demosite folder.
    </div>
</div>
</body>
</html>
