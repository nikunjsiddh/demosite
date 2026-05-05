<?php
/**
 * One-shot refactor: extract inline <style> + inline <script> blocks from
 * index.php into separate files, and rewrite index.php so it becomes minimal
 * (only metadata + body content + include tags for header/footer).
 *
 * Run once:  http://localhost:8080/demosite/refactor-index.php
 *
 * Creates:
 *   • css/index-page.css   — extracted from <style>…</style>
 *   • js/index-page.js     — extracted from final inline <script>…</script>
 *   • index.php (rewritten) — minimal, with <link> + <script src> tags
 *
 * Backs up the original to:  index.php.backup-YYYYMMDD-HHMMSS
 */

set_time_limit(60);
header('Content-Type: text/html; charset=utf-8');

$dir       = __DIR__;
$indexPath = $dir . '/index.php';
$cssPath   = $dir . '/css/index-page.css';
$jsPath    = $dir . '/js/index-page.js';

$results = [];
$ok      = true;

if (!is_file($indexPath)) {
    die('ERROR: index.php not found.');
}

$src = file_get_contents($indexPath);
if ($src === false) {
    die('ERROR: could not read index.php');
}

/* ─── 1. Backup ─── */
$backup = $indexPath . '.backup-' . date('Ymd-His');
if (file_put_contents($backup, $src) !== false) {
    $results[] = ['step' => 'Backup',  'status' => 'ok', 'note' => basename($backup)];
} else {
    $results[] = ['step' => 'Backup',  'status' => 'fail', 'note' => 'could not write backup'];
    $ok = false;
}

/* ─── 2. Extract <style>…</style> (first inline block in <head>) ─── */
$cssExtracted = '';
if (preg_match('#<style\b[^>]*>(.*?)</style>#is', $src, $m, PREG_OFFSET_CAPTURE)) {
    $cssExtracted = trim($m[1][0]);
    // Remove the <style> block (and its surrounding whitespace + indentation) from src
    $start = $m[0][1];
    $end   = $start + strlen($m[0][0]);
    // also swallow trailing newline after </style>
    while ($end < strlen($src) && ($src[$end] === "\n" || $src[$end] === "\r" || $src[$end] === "\t" || $src[$end] === ' ')) {
        $end++;
    }
    $src = substr($src, 0, $start) . substr($src, $end);

    $cssOut = "/* ============================================================\n"
            . "   INDEX PAGE STYLES — extracted from index.php inline <style>\n"
            . "   Loaded only on the home page via \$extra_css = ['index-page'].\n"
            . "   ============================================================ */\n\n"
            . $cssExtracted . "\n";

    if (file_put_contents($cssPath, $cssOut) !== false) {
        $results[] = ['step' => 'Extract CSS', 'status' => 'ok',
            'note' => 'css/index-page.css · ' . round(strlen($cssOut)/1024, 1) . ' KB'];
    } else {
        $results[] = ['step' => 'Extract CSS', 'status' => 'fail', 'note' => 'could not write css/index-page.css'];
        $ok = false;
    }
} else {
    $results[] = ['step' => 'Extract CSS', 'status' => 'skip', 'note' => 'no inline <style> block found'];
}

/* ─── 3. Extract the LAST inline <script> block (the one before </body>) ─── */
$jsExtracted = '';
if (preg_match_all('#<script\b(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is', $src, $matches, PREG_OFFSET_CAPTURE)) {
    // pick the last inline <script> block
    $lastIdx = count($matches[0]) - 1;
    if ($lastIdx >= 0) {
        $jsExtracted = trim($matches[1][$lastIdx][0]);
        $blockStart  = $matches[0][$lastIdx][1];
        $blockEnd    = $blockStart + strlen($matches[0][$lastIdx][0]);
        // swallow trailing whitespace
        while ($blockEnd < strlen($src) && in_array($src[$blockEnd], ["\n","\r","\t"," "], true)) {
            $blockEnd++;
        }
        $src = substr($src, 0, $blockStart) . substr($src, $blockEnd);

        $jsOut = "/* ============================================================\n"
               . "   INDEX PAGE BEHAVIOUR — extracted from index.php inline <script>\n"
               . "   Loaded only on the home page via \$extra_js = ['index-page'].\n"
               . "   ============================================================ */\n\n"
               . $jsExtracted . "\n";

        if (file_put_contents($jsPath, $jsOut) !== false) {
            $results[] = ['step' => 'Extract JS', 'status' => 'ok',
                'note' => 'js/index-page.js · ' . round(strlen($jsOut)/1024, 1) . ' KB'];
        } else {
            $results[] = ['step' => 'Extract JS', 'status' => 'fail', 'note' => 'could not write js/index-page.js'];
            $ok = false;
        }
    }
} else {
    $results[] = ['step' => 'Extract JS', 'status' => 'skip', 'note' => 'no inline <script> block found'];
}

/* ─── 4. Inject <link> and <script src> placeholders in their place ─── */
// Insert the CSS link tag right before </head>
if ($cssExtracted !== '') {
    $src = preg_replace(
        '#</head>#i',
        "    <!-- Index-page-only styles (extracted from inline <style>) -->\n"
        . "    <link rel=\"stylesheet\" href=\"css/index-page.css\">\n"
        . '</head>',
        $src,
        1
    );
}

// Insert the JS script tag right before </body>
if ($jsExtracted !== '') {
    $src = preg_replace(
        '#</body>#i',
        "    <!-- Index-page-only behaviour (extracted from inline <script>) -->\n"
        . "    <script src=\"js/index-page.js\" defer></script>\n"
        . '</body>',
        $src,
        1
    );
}

/* ─── 5. Write the rewritten index.php ─── */
if (file_put_contents($indexPath, $src) !== false) {
    $results[] = ['step' => 'Rewrite index.php', 'status' => 'ok',
        'note' => 'now ' . round(strlen($src)/1024, 1) . ' KB · ' . substr_count($src, "\n") . ' lines'];
} else {
    $results[] = ['step' => 'Rewrite index.php', 'status' => 'fail', 'note' => 'could not write'];
    $ok = false;
}

/* ─── 6. PHP syntax check on the rewritten index.php ─── */
if (function_exists('shell_exec')) {
    $cmd = 'php -l ' . escapeshellarg($indexPath) . ' 2>&1';
    $out = @shell_exec($cmd);
    if ($out !== null) {
        $clean = trim(strip_tags((string) $out));
        if (stripos($out, 'No syntax errors') === false) {
            $results[] = ['step' => 'Syntax check', 'status' => 'fail', 'note' => $clean];
            $ok = false;
        } else {
            $results[] = ['step' => 'Syntax check', 'status' => 'ok', 'note' => 'no syntax errors'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>index.php Refactor Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0a1929; color: #f5f3ef; margin: 0; padding: 50px 24px; }
    h1 { color: #b87333; font-weight: 800; font-size: 1.7rem; margin: 0 0 8px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 920px; margin: 0 auto; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.04); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(184,115,51,0.15); }
    th { background: rgba(184,115,51,0.10); color: #f5d98b; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; font-size: 0.72rem; }
    .ok   { color: #6fc28a; font-weight: 700; }
    .skip { color: #a8c8d8; font-weight: 700; }
    .err  { color: #ff8a8a; font-weight: 700; }
    .note { color: rgba(255,255,255,0.7); font-size: 0.85rem; }
    .hint { background: rgba(184,115,51,0.10); border: 1px solid rgba(184,115,51,0.32); padding: 22px; border-radius: 12px; line-height: 1.75; margin-top: 24px; }
    .hint b { color: #f5d98b; }
    code { background: rgba(255,255,255,0.07); padding: 2px 8px; border-radius: 4px; color: #f5d98b; font-size: 0.86rem; }
    .pill { display: inline-block; padding: 6px 14px; border-radius: 50px; font-size: 0.78rem; background: rgba(184,115,51,0.18); border: 1px solid rgba(184,115,51,0.4); color: #f5d98b; margin-right: 8px; }
</style>
</head>
<body>
<div class="container">
    <h1>index.php Refactor Report</h1>
    <p class="lead">Extracted inline <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> blocks into dedicated asset files. <code>index.php</code> rewritten with <code>&lt;link&gt;</code> and <code>&lt;script src&gt;</code> tags pointing at them.</p>

    <table>
        <thead><tr><th>Step</th><th>Status</th><th>Note</th></tr></thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['step']) ?></td>
                <td>
                    <?php if ($r['status'] === 'ok'):    ?><span class="ok">✓ ok</span>
                    <?php elseif ($r['status'] === 'skip'): ?><span class="skip">↷ skip</span>
                    <?php else:                          ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>What changed:</b><br>
        • Inline <code>&lt;style&gt;</code> block from <code>index.php</code> moved to <code>css/index-page.css</code>.<br>
        • Inline <code>&lt;script&gt;</code> block from <code>index.php</code> moved to <code>js/index-page.js</code>.<br>
        • <code>index.php</code> now has <code>&lt;link rel="stylesheet" href="css/index-page.css"&gt;</code> before <code>&lt;/head&gt;</code><br>
        &nbsp;&nbsp;and <code>&lt;script src="js/index-page.js" defer&gt;&lt;/script&gt;</code> before <code>&lt;/body&gt;</code>.<br>
        • Original is preserved as a backup (see top row).<br><br>

        <b>Test:</b><br>
        Visit <a href="index.php" style="color:#f5d98b;">http://localhost:8080/demosite/index.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). Page should look identical — same UI, same animations — just sourcing CSS/JS from external files.<br><br>

        <b>If anything looks broken:</b><br>
        Restore the backup with: <code>copy index.php.backup-... index.php</code> in the demosite folder.
    </div>
</div>
</body>
</html>
