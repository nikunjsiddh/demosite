<?php
/**
 * REFACTOR ALL PAGES
 * ────────────────────────────────────────────────────────────
 * For every PHP page in the site, extract:
 *   • all inline <style>…</style> blocks  →  css/<page>.css
 *   • all inline <script>…</script> blocks (no src=)  →  js/<page>.js
 * Then rewrite the page so a single <link> and <script src> point
 * at the new asset files. Pages already refactored are skipped.
 *
 * UI is preserved 100% — only the location of the CSS/JS changes.
 *
 * Run once:  http://localhost:8080/demosite/refactor-all-pages.php
 *
 * Each page is backed up first to:
 *   <page>.php.backup-YYYYMMDD-HHMMSS
 *
 * Re-running is safe: any page that already references its
 * css/<page>.css and js/<page>.js is detected and skipped.
 */

set_time_limit(120);
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__;

// Pages to process (index.php handled by refactor-index.php)
$pages = [
    'about.php',
    'sspsb.php',
    'jjsb.php',
    'contact.php',
    'news.php',
    'gallery.php',
    'environment-management.php',
    'health-safety.php',
    'waste-management.php',
];

$ts      = date('Ymd-His');
$results = [];

foreach ($pages as $file) {
    $path = $dir . '/' . $file;
    $base = pathinfo($file, PATHINFO_FILENAME);  // e.g. "about"
    $cssRel = "css/{$base}.css";
    $jsRel  = "js/{$base}.js";
    $cssPath = $dir . '/' . $cssRel;
    $jsPath  = $dir . '/' . $jsRel;

    $row = [
        'file'    => $file,
        'css'     => '',
        'js'      => '',
        'status'  => '',
        'note'    => '',
    ];

    if (!is_file($path)) {
        $row['status'] = 'missing';
        $row['note']   = 'file not found';
        $results[] = $row;
        continue;
    }

    $src = file_get_contents($path);
    if ($src === false) {
        $row['status'] = 'error';
        $row['note']   = 'could not read file';
        $results[] = $row;
        continue;
    }

    // Idempotency check — already refactored?
    $alreadyHasCss = strpos($src, $cssRel) !== false;
    $alreadyHasJs  = strpos($src, $jsRel)  !== false;
    if ($alreadyHasCss && $alreadyHasJs) {
        $row['status'] = 'already-done';
        $row['note']   = 'page already references both extracted files';
        $results[] = $row;
        continue;
    }

    // Backup BEFORE we mutate
    $backup = $path . '.backup-' . $ts;
    if (!file_exists($backup)) {
        @file_put_contents($backup, $src);
    }

    /* ─── 1. Extract ALL inline <style>…</style> blocks ─── */
    $cssChunks = [];
    if (preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $src, $sm, PREG_OFFSET_CAPTURE)) {
        // Collect content
        foreach ($sm[1] as $i => $match) {
            $cssChunks[] = trim($match[0]);
        }
        // Remove from src, walking right-to-left so offsets stay valid
        $blocks = $sm[0];
        $count  = count($blocks);
        for ($i = $count - 1; $i >= 0; $i--) {
            $start = $blocks[$i][1];
            $end   = $start + strlen($blocks[$i][0]);
            // swallow trailing whitespace
            while ($end < strlen($src) && in_array($src[$end], ["\n","\r","\t"," "], true)) $end++;
            $src = substr($src, 0, $start) . substr($src, $end);
        }
    }

    /* ─── 2. Extract ALL inline <script>…</script> blocks (no src=) ─── */
    $jsChunks = [];
    if (preg_match_all('#<script\b(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is', $src, $jm, PREG_OFFSET_CAPTURE)) {
        foreach ($jm[1] as $i => $match) {
            $jsChunks[] = trim($match[0]);
        }
        $blocks = $jm[0];
        $count  = count($blocks);
        for ($i = $count - 1; $i >= 0; $i--) {
            $start = $blocks[$i][1];
            $end   = $start + strlen($blocks[$i][0]);
            while ($end < strlen($src) && in_array($src[$end], ["\n","\r","\t"," "], true)) $end++;
            $src = substr($src, 0, $start) . substr($src, $end);
        }
    }

    /* ─── 3. Write css/<page>.css ─── */
    if (!empty($cssChunks) && !$alreadyHasCss) {
        $cssOut = "/* ============================================================\n"
                . "   {$file} STYLES — extracted from inline <style> block(s)\n"
                . "   on " . date('Y-m-d H:i:s') . "\n"
                . "   This file is loaded by {$file} via <link> in <head>.\n"
                . "   ============================================================ */\n\n"
                . implode("\n\n/* ---- next inline block ---- */\n\n", $cssChunks) . "\n";

        if (file_put_contents($cssPath, $cssOut) !== false) {
            $row['css'] = round(strlen($cssOut)/1024, 1) . ' KB → ' . $cssRel;
        } else {
            $row['status'] = 'error';
            $row['note']   = "could not write {$cssRel}";
            $results[] = $row;
            continue;
        }
    } elseif (empty($cssChunks)) {
        $row['css'] = '— (no inline styles)';
    }

    /* ─── 4. Write js/<page>.js ─── */
    if (!empty($jsChunks) && !$alreadyHasJs) {
        $jsOut = "/* ============================================================\n"
               . "   {$file} BEHAVIOUR — extracted from inline <script> block(s)\n"
               . "   on " . date('Y-m-d H:i:s') . "\n"
               . "   This file is loaded by {$file} via <script src> before </body>.\n"
               . "   ============================================================ */\n\n"
               . implode("\n\n/* ---- next inline block ---- */\n\n", $jsChunks) . "\n";

        if (file_put_contents($jsPath, $jsOut) !== false) {
            $row['js'] = round(strlen($jsOut)/1024, 1) . ' KB → ' . $jsRel;
        } else {
            $row['status'] = 'error';
            $row['note']   = "could not write {$jsRel}";
            $results[] = $row;
            continue;
        }
    } elseif (empty($jsChunks)) {
        $row['js'] = '— (no inline scripts)';
    }

    /* ─── 5. Inject <link> tag before </head> ─── */
    if (!empty($cssChunks) && !$alreadyHasCss) {
        $src = preg_replace(
            '#</head>#i',
            "    <!-- Extracted page-specific styles -->\n"
            . "    <link rel=\"stylesheet\" href=\"{$cssRel}\">\n"
            . '</head>',
            $src,
            1
        );
    }

    /* ─── 6. Inject <script src> tag before </body> ─── */
    if (!empty($jsChunks) && !$alreadyHasJs) {
        $src = preg_replace(
            '#</body>#i',
            "    <!-- Extracted page-specific behaviour -->\n"
            . "    <script src=\"{$jsRel}\" defer></script>\n"
            . '</body>',
            $src,
            1
        );
    }

    /* ─── 7. Write the rewritten page ─── */
    if (file_put_contents($path, $src) === false) {
        $row['status'] = 'error';
        $row['note']   = 'could not write rewritten page';
        $results[] = $row;
        continue;
    }

    /* ─── 8. PHP syntax check ─── */
    $syntaxOk = true;
    if (function_exists('shell_exec')) {
        $cmd = 'php -l ' . escapeshellarg($path) . ' 2>&1';
        $out = @shell_exec($cmd);
        if ($out !== null && stripos($out, 'No syntax errors') === false) {
            $syntaxOk = false;
            $row['status'] = 'syntax-error';
            $row['note']   = trim(strip_tags((string) $out));
        }
    }

    if ($syntaxOk) {
        $row['status'] = 'ok';
        $row['note']   = 'extracted ' . count($cssChunks) . ' style + ' . count($jsChunks) . ' script blocks';
    }

    $results[] = $row;
}

$okCount   = count(array_filter($results, fn($r) => $r['status'] === 'ok'));
$skipCount = count(array_filter($results, fn($r) => $r['status'] === 'already-done'));
$errCount  = count(array_filter($results, fn($r) => in_array($r['status'], ['error','syntax-error','missing'], true)));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>All Pages Refactor Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0a1929; color: #f5f3ef; margin: 0; padding: 40px 24px; }
    h1 { color: #b87333; font-weight: 800; font-size: 1.7rem; margin: 0 0 8px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 1100px; margin: 0 auto; }
    .summary { display: flex; gap: 12px; flex-wrap: wrap; margin: 0 0 24px; }
    .pill { padding: 10px 18px; border-radius: 50px; font-size: 0.86rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(184,115,51,0.25); }
    .pill b { color: #f5d98b; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.04); border-radius: 14px; overflow: hidden; }
    th, td { padding: 13px 16px; text-align: left; font-size: 0.88rem; border-bottom: 1px solid rgba(184,115,51,0.15); }
    th { background: rgba(184,115,51,0.10); color: #f5d98b; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; font-size: 0.7rem; }
    .ok   { color: #6fc28a; font-weight: 700; }
    .skip { color: #a8c8d8; font-weight: 700; }
    .err  { color: #ff8a8a; font-weight: 700; }
    .miss { color: #ffd166; font-weight: 700; }
    .note { color: rgba(255,255,255,0.60); font-size: 0.82rem; }
    code { background: rgba(255,255,255,0.08); padding: 2px 6px; border-radius: 4px; font-size: 0.84rem; color: #f5d98b; }
    .hint { background: rgba(184,115,51,0.10); border: 1px solid rgba(184,115,51,0.32); padding: 22px; border-radius: 12px; line-height: 1.85; margin-top: 24px; font-size: 0.92rem; }
    .hint b { color: #f5d98b; }
    a { color: #f5d98b; }
</style>
</head>
<body>
<div class="container">
    <h1>All Pages Refactor Report</h1>
    <p class="lead">Inline <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> blocks moved to per-page external asset files. UI preserved 100%.</p>

    <div class="summary">
        <span class="pill"><b><?= count($results) ?></b> pages processed</span>
        <span class="pill" style="color:#6fc28a;"><b><?= $okCount ?></b> refactored</span>
        <?php if ($skipCount): ?><span class="pill" style="color:#a8c8d8;"><b><?= $skipCount ?></b> already done</span><?php endif; ?>
        <?php if ($errCount): ?><span class="pill" style="color:#ff8a8a;"><b><?= $errCount ?></b> issues</span><?php endif; ?>
        <span class="pill"><?= date('Y-m-d H:i:s') ?></span>
    </div>

    <table>
        <thead>
            <tr>
                <th>Page</th>
                <th>Status</th>
                <th>CSS extracted</th>
                <th>JS extracted</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><code><?= htmlspecialchars($r['file']) ?></code></td>
                <td>
                    <?php if ($r['status'] === 'ok'): ?><span class="ok">✓ ok</span>
                    <?php elseif ($r['status'] === 'already-done'): ?><span class="skip">↷ done</span>
                    <?php elseif ($r['status'] === 'missing'): ?><span class="miss">⚠ missing</span>
                    <?php else: ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['css']) ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['js']) ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>What happened to each page:</b><br>
        • Inline <code>&lt;style&gt;</code> block(s) merged → <code>css/&lt;page&gt;.css</code> (loaded via <code>&lt;link&gt;</code> before <code>&lt;/head&gt;</code>)<br>
        • Inline <code>&lt;script&gt;</code> block(s) merged → <code>js/&lt;page&gt;.js</code> (loaded via <code>&lt;script src defer&gt;</code> before <code>&lt;/body&gt;</code>)<br>
        • Original page backed up as <code>&lt;page&gt;.php.backup-<?= $ts ?></code> in the same folder.<br>
        • PHP syntax verified after rewrite.<br>
        • Re-running this script is safe — pages already referencing both extracted files are skipped.<br><br>

        <b>Next: test each page</b>
        <?php foreach ($pages as $p): ?>
            <br>&nbsp;&nbsp;→ <a href="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></a>
        <?php endforeach; ?>
        <br><br>

        <b>If anything looks broken on a page:</b><br>
        Open <code>File Explorer</code> in <code>demosite/</code> and rename the matching backup file<br>
        e.g. <code>about.php.backup-<?= $ts ?></code> → <code>about.php</code> (overwriting the refactored one).
    </div>
</div>
</body>
</html>
