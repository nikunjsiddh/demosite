<?php
/**
 * APPLY SHARED LAYOUT
 * ────────────────────────────────────────────────────────────
 * For every page in the site, replace the duplicated:
 *   • <!DOCTYPE html> ... <head>...</head> ... <body class="..."> ...
 *     opening + the `<?php include 'includes/menu.php'; ?>` line
 *   • the marine <footer> markup, scripts, </body>, </html>
 * with a single line each:
 *   <?php $page_title=...; $extra_css=[...]; include 'includes/header.php'; ?>
 *   <?php include 'includes/footer.php'; ?>
 *
 * Page-specific values are auto-extracted from the existing markup:
 *   • <title> → $page_title
 *   • <meta name="description"> → $page_description
 *   • <meta name="keywords">    → $page_keywords
 *   • <body class="...">        → $page_class
 *   • any <link href="css/<page>.css"> → $extra_css = [...]
 *   • any <script src="js/<page>.js">  → $extra_js  = [...]
 *
 * UI is preserved 100% — body content between menu include and footer
 * stays untouched, just the surrounding scaffolding becomes a 2-line include.
 *
 * Run once:  http://localhost:8080/demosite/apply-shared-layout.php
 *
 * Each page is backed up first to:
 *   <page>.php.layout-backup-YYYYMMDD-HHMMSS
 *
 * Re-running is safe: pages already converted (no <!DOCTYPE> at the top,
 * already include includes/header.php) are skipped.
 */

set_time_limit(120);
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__;
$ts  = date('Ymd-His');

// Pages to process
$pages = [
    'index.php',
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

$results = [];

foreach ($pages as $file) {
    $path = $dir . '/' . $file;
    $base = pathinfo($file, PATHINFO_FILENAME);

    $row = [
        'file'   => $file,
        'status' => '',
        'meta'   => '',
        'extra'  => '',
        'note'   => '',
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
        $row['note']   = 'could not read';
        $results[] = $row;
        continue;
    }

    // Idempotency — already converted?
    if (strpos($src, "/includes/header.php") !== false &&
        stripos($src, '<!DOCTYPE') === false) {
        $row['status'] = 'already-done';
        $row['note']   = 'page already uses shared header/footer';
        $results[] = $row;
        continue;
    }

    /* ─── Extract metadata ─── */
    $meta = [
        'title'       => '',
        'description' => '',
        'keywords'    => '',
        'class'       => '',
        'show_loader' => false,
        'extra_css'   => [],
        'extra_js'    => [],
    ];

    if (preg_match('#<title>([^<]*)</title>#i', $src, $m)) {
        $meta['title'] = trim($m[1]);
    }
    if (preg_match('#<meta\s+name=["\']description["\']\s+content=["\']([^"\']*)["\']#is', $src, $m)) {
        $meta['description'] = trim($m[1]);
    }
    if (preg_match('#<meta\s+name=["\']keywords["\']\s+content=["\']([^"\']*)["\']#is', $src, $m)) {
        $meta['keywords'] = trim($m[1]);
    }
    if (preg_match('#<body\b[^>]*\bclass=["\']([^"\']*)["\']#is', $src, $m)) {
        $meta['class'] = trim($m[1]);
    }
    if (stripos($src, 'page-loader') !== false) {
        $meta['show_loader'] = true;
    }

    // Find page-specific CSS files: css/<name>.css where name is NOT a global one
    $globalCss = ['inline_styles', 'marine-header', 'marine-footer'];
    if (preg_match_all('#<link[^>]+href=["\']css/([a-z0-9_-]+)\.css(?:\?[^"\']*)?["\']#i', $src, $cm)) {
        foreach ($cm[1] as $n) {
            if (!in_array($n, $globalCss, true) && !in_array($n, $meta['extra_css'], true)) {
                $meta['extra_css'][] = $n;
            }
        }
    }
    // Find page-specific JS: js/<name>.js where name is NOT global
    $globalJs = ['marine-header', 'marine-footer'];
    if (preg_match_all('#<script[^>]+src=["\']js/([a-z0-9_-]+)\.js(?:\?[^"\']*)?["\']#i', $src, $jm)) {
        foreach ($jm[1] as $n) {
            if (!in_array($n, $globalJs, true) && !in_array($n, $meta['extra_js'], true)) {
                $meta['extra_js'][] = $n;
            }
        }
    }

    /* ─── Locate the BODY CONTENT region ─── */
    // Start: first character AFTER `<?php include __DIR__ . '/includes/menu.php'; ?>` line
    // End:   first character BEFORE the marine-footer's `<footer id="footer" class="marine-footer">` line
    $startMarker = "/<\?php\s+include\s+__DIR__\s*\.\s*'\/includes\/menu\.php'\s*;\s*\?>/";
    $endMarker   = '/<footer\s+id=["\']footer["\']\s+class=["\']marine-footer["\']/i';

    $startPos = null;
    $endPos   = null;

    if (preg_match($startMarker, $src, $m, PREG_OFFSET_CAPTURE)) {
        $startPos = $m[0][1] + strlen($m[0][0]);
    } else {
        // Fallback: after the closing `</header>` tag (marine-header)
        if (preg_match('#</header>\s*<script[^>]+marine-header\.js[^>]*>\s*</script>#is', $src, $m, PREG_OFFSET_CAPTURE)) {
            $startPos = $m[0][1] + strlen($m[0][0]);
        }
    }

    if (preg_match($endMarker, $src, $m, PREG_OFFSET_CAPTURE)) {
        $endPos = $m[0][1];
        // back up to the start of that line so the comment <!-- MARINE FOOTER --> goes too
        $back = $endPos;
        while ($back > 0 && $src[$back - 1] !== "\n") $back--;
        // also back up past any preceding blank line and the comment
        $endPos = $back;
        // optionally strip preceding "<!-- ... MARINE FOOTER ... -->" comment line
        $prevLine = '';
        $cursor = $endPos;
        while ($cursor > 0 && $src[$cursor - 1] === "\n") $cursor--;
        $lineStart = $cursor;
        while ($lineStart > 0 && $src[$lineStart - 1] !== "\n") $lineStart--;
        $prevLine = substr($src, $lineStart, $cursor - $lineStart);
        if (preg_match('#<!--[^>]*MARINE FOOTER[^>]*-->#i', $prevLine)) {
            $endPos = $lineStart;
        }
    }

    if ($startPos === null || $endPos === null || $startPos >= $endPos) {
        $row['status'] = 'error';
        $row['note']   = 'could not locate body content boundaries';
        $results[] = $row;
        continue;
    }

    // Backup
    $backup = $path . '.layout-backup-' . $ts;
    if (!file_exists($backup)) {
        @file_put_contents($backup, $src);
    }

    /* ─── Body content (kept verbatim) ─── */
    $body = trim(substr($src, $startPos, $endPos - $startPos), "\r\n\t");

    /* ─── Build the new file ─── */
    $titleEsc = addslashes($meta['title']     ?? '');
    $descEsc  = addslashes($meta['description'] ?? '');
    $kwEsc    = addslashes($meta['keywords']    ?? '');
    $classEsc = addslashes($meta['class']       ?? '');
    $quoteFn = function ($n) { return "'" . addslashes($n) . "'"; };
    $extraCssArr = '[' . implode(', ', array_map($quoteFn, $meta['extra_css'])) . ']';
    $extraJsArr  = '[' . implode(', ', array_map($quoteFn, $meta['extra_js']))  . ']';

    $php  = "<?php\n";
    $php .= "/**\n";
    $php .= " * {$file} — body content only.\n";
    $php .= " * Common <head>, menu, and footer come from includes/header.php + includes/footer.php.\n";
    $php .= " */\n";
    $php .= "\$page_title       = '{$titleEsc}';\n";
    $php .= "\$page_description = '{$descEsc}';\n";
    $php .= "\$page_keywords    = '{$kwEsc}';\n";
    $php .= "\$page_class       = '{$classEsc}';\n";
    $php .= "\$extra_css        = {$extraCssArr};\n";
    $php .= "\$extra_js         = {$extraJsArr};\n";
    if ($meta['show_loader']) {
        $php .= "\$show_page_loader = true;\n";
    }
    $php .= "require_once __DIR__ . '/includes/header.php';\n";
    $php .= "?>\n";
    $php .= $body . "\n";
    $php .= "<?php require_once __DIR__ . '/includes/footer.php'; ?>\n";

    /* ─── Write it ─── */
    if (file_put_contents($path, $php) === false) {
        $row['status'] = 'error';
        $row['note']   = 'could not write rewritten page';
        $results[] = $row;
        continue;
    }

    /* ─── PHP syntax check ─── */
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
        $row['note']   = 'now ' . round(strlen($php) / 1024, 1) . ' KB · ' . substr_count($php, "\n") . ' lines';
        $row['meta']   = ($meta['title'] ? 'title✓ ' : '') . ($meta['description'] ? 'desc✓ ' : '') . ($meta['class'] ? 'class✓' : '');
        $row['extra']  = (count($meta['extra_css']) ? 'css:' . count($meta['extra_css']) . ' ' : '') . (count($meta['extra_js']) ? 'js:' . count($meta['extra_js']) : '');
    }

    $results[] = $row;
}

$okCount   = count(array_filter($results, function ($r) { return $r['status'] === 'ok'; }));
$skipCount = count(array_filter($results, function ($r) { return $r['status'] === 'already-done'; }));
$errCount  = count(array_filter($results, function ($r) { return in_array($r['status'], ['error','syntax-error','missing'], true); }));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Apply Shared Layout — Report</title>
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
    <h1>Apply Shared Layout — Report</h1>
    <p class="lead">Each page now contains only its body content + 2 lines: <code>require_once 'includes/header.php'</code> and <code>require_once 'includes/footer.php'</code>. UI is preserved 100%.</p>

    <div class="summary">
        <span class="pill"><b><?= count($results) ?></b> pages processed</span>
        <span class="pill" style="color:#6fc28a;"><b><?= $okCount ?></b> converted</span>
        <?php if ($skipCount): ?><span class="pill" style="color:#a8c8d8;"><b><?= $skipCount ?></b> already done</span><?php endif; ?>
        <?php if ($errCount): ?><span class="pill" style="color:#ff8a8a;"><b><?= $errCount ?></b> issues</span><?php endif; ?>
        <span class="pill"><?= date('Y-m-d H:i:s') ?></span>
    </div>

    <table>
        <thead>
            <tr>
                <th>Page</th>
                <th>Status</th>
                <th>Metadata</th>
                <th>Extras</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><code><?= htmlspecialchars($r['file']) ?></code></td>
                <td>
                    <?php if ($r['status'] === 'ok'): ?><span class="ok">✓ converted</span>
                    <?php elseif ($r['status'] === 'already-done'): ?><span class="skip">↷ done</span>
                    <?php elseif ($r['status'] === 'missing'): ?><span class="miss">⚠ missing</span>
                    <?php else: ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['meta']) ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['extra']) ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>What each page now looks like:</b><br>
        <code>&lt;?php<br>
        $page_title       = '...';<br>
        $page_description = '...';<br>
        $page_class       = 'about-page';<br>
        $extra_css        = ['about'];<br>
        $extra_js         = ['about'];<br>
        require_once __DIR__ . '/includes/header.php';<br>
        ?&gt;<br>
        &lt;!-- body content (sections) --&gt;<br>
        &lt;?php require_once __DIR__ . '/includes/footer.php'; ?&gt;</code>
        <br><br>

        <b>Where the common stuff lives now:</b><br>
        • <code>includes/header.php</code> → DOCTYPE, &lt;head&gt;, all common CSS, &lt;body&gt;, page-loader, menu<br>
        • <code>includes/menu.php</code>   → just the &lt;nav&gt; markup with auto-active page detection<br>
        • <code>includes/footer.php</code> → marine footer markup, common JS, &lt;/body&gt;, &lt;/html&gt;<br>
        <br>

        <b>Test each page:</b>
        <?php foreach ($pages as $p): ?>
            <br>&nbsp;&nbsp;→ <a href="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></a>
        <?php endforeach; ?>
        <br><br>

        <b>Restore a page if needed:</b><br>
        Each rewritten page has a backup at <code>&lt;page&gt;.php.layout-backup-<?= $ts ?></code> in <code>demosite/</code>.<br>
        Rename it back over the page to undo the change.
    </div>
</div>
</body>
</html>
