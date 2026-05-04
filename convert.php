<?php
/**
 * One-click HTML → PHP modular converter.
 *
 * Reads every .html page in this directory and creates a matching .php
 * version that uses includes/header.php and includes/footer.php.
 *
 * Run this once by visiting:  http://localhost/demosite/convert.php
 *
 * What it does per file:
 *   1. Extracts <title> and <meta name="description">.
 *   2. Extracts every inline <style> block from <head> (page-specific CSS).
 *   3. Extracts the body content between </header><script src="js/marine-header.js"></script>
 *      and <footer id="footer" class="marine-footer">.
 *   4. Extracts inline <script> blocks at the very bottom.
 *   5. Extracts external/inline <script src=...> tags (preserves them).
 *   6. Updates all *.html cross-references inside the body to *.php.
 *   7. Writes a clean .php file using the modular pattern.
 *
 * Files that get converted (one .html → one .php):
 *   index, about, environment-management, waste-management, health-safety,
 *   sspsb, jjsb, news, gallery, Contact (→ contact.php).
 *
 * Backup/utility files (environment-management-backup.html,
 * Writing_about-us_html.html) are skipped.
 */

set_time_limit(120);
header('Content-Type: text/html; charset=utf-8');

$dir   = __DIR__;
$skip  = ['environment-management-backup.html', 'Writing_about-us_html.html'];

// Filename map — original .html -> target .php (some get renamed for case-consistency)
$targetMap = [
    'Contact.html' => 'contact.php',
];

$files = glob($dir . '/*.html');

$results = [];

foreach ($files as $path) {
    $base = basename($path);
    if (in_array($base, $skip, true)) {
        $results[] = ['file' => $base, 'status' => 'skipped', 'note' => 'in skip list'];
        continue;
    }

    $target = $targetMap[$base] ?? (pathinfo($base, PATHINFO_FILENAME) . '.php');
    $targetPath = $dir . '/' . $target;

    $html = file_get_contents($path);
    if ($html === false) {
        $results[] = ['file' => $base, 'status' => 'error', 'note' => 'could not read'];
        continue;
    }

    /* ─── 1. Title ─── */
    preg_match('#<title>([^<]*)</title>#i', $html, $m);
    $title = trim($m[1] ?? 'Sachdeva Group');

    /* ─── 2. Meta description ─── */
    preg_match('#<meta\s+name=["\']description["\']\s+content=["\']([^"\']*)["\']#is', $html, $m);
    $description = trim($m[1] ?? '');

    /* ─── 3. Inline <style> blocks from <head> ─── */
    // Get the head section
    preg_match('#<head\b[^>]*>(.*?)</head>#is', $html, $m);
    $head = $m[1] ?? '';

    // All <style>...</style> blocks within <head>
    preg_match_all('#<style\b[^>]*>.*?</style>#is', $head, $styleMatches);
    $extra_head_styles = implode("\n", $styleMatches[0] ?? []);

    /* ─── 4. Extract body content ─── */
    // Look for the marker after the marine header script tag
    // Pattern: </header>\s*<script src="js/marine-header.js"></script>
    $startMarker = '#</header>\s*<script\s+src=["\']js/marine-header\.js["\']\s*></script>#is';
    $endMarker   = '#<footer\s+id=["\']footer["\']\s+class=["\']marine-footer["\']#is';

    $startPos = false;
    if (preg_match($startMarker, $html, $m, PREG_OFFSET_CAPTURE)) {
        $startPos = $m[0][1] + strlen($m[0][0]);
    }
    $endPos = false;
    if (preg_match($endMarker, $html, $m, PREG_OFFSET_CAPTURE)) {
        $endPos = $m[0][1];
    }

    if ($startPos === false || $endPos === false || $startPos >= $endPos) {
        // Fallback: try without the marine-header.js script (pages may include it differently)
        if (preg_match('#</header>#i', $html, $m, PREG_OFFSET_CAPTURE)) {
            $startPos = $m[0][1] + strlen($m[0][0]);
        }
    }

    $body = '';
    if ($startPos !== false && $endPos !== false && $startPos < $endPos) {
        $body = substr($html, $startPos, $endPos - $startPos);
    } else {
        $results[] = ['file' => $base, 'status' => 'error', 'note' => 'could not find body markers'];
        continue;
    }

    /* ─── 5. Extract scripts AFTER the marine footer (page-specific JS) ─── */
    // Footer in marine-footer.js + then any inline page scripts before </body>
    $afterFooter = '';
    if (preg_match('#<script\s+src=["\']js/marine-footer\.js["\']\s*></script>(.*?)</body>#is', $html, $m)) {
        $afterFooter = trim($m[1]);
    }
    // Strip any "back to top" buttons or known footer leftovers — leave only <script> tags
    // Keep only <script>...</script> blocks (inline) and <script src=...></script> (external)
    $extraScripts = '';
    if (preg_match_all('#<script[\s\S]*?</script>#i', $afterFooter, $scriptMatches)) {
        $extraScripts = implode("\n", $scriptMatches[0]);
    }

    /* ─── 6. Update cross-references *.html → *.php inside body ─── */
    $body = preg_replace_callback(
        '#href=(["\'])([^"\']+\.html)(#?[^"\']*)\1#i',
        function ($m) use ($targetMap) {
            $url = $m[2];
            $hash = $m[3];
            $name = basename($url);
            if (isset($targetMap[$name])) {
                $url = str_replace($name, $targetMap[$name], $url);
            } else {
                $url = preg_replace('#\.html$#i', '.php', $url);
            }
            return "href={$m[1]}{$url}{$hash}{$m[1]}";
        },
        $body
    );

    /* ─── 7. Build the .php file ─── */
    $titleEsc       = addslashes($title);
    $descriptionEsc = addslashes($description);
    $pageClass      = strtolower(pathinfo($target, PATHINFO_FILENAME)) . '-page';

    // We'll write $extra_head as a HEREDOC (allows multi-line CSS verbatim)
    // Need to escape any closing HEREDOC marker accidentally in the styles — extremely unlikely
    $extraHeadHeredoc = $extra_head_styles
        ? "<<<HTML\n{$extra_head_styles}\nHTML"
        : "''";

    $extraScriptsHeredoc = $extraScripts
        ? "<<<HTML\n{$extraScripts}\nHTML"
        : "''";

    // Final PHP page contents
    $php = "<?php\n"
         . "/**\n"
         . " * {$title}\n"
         . " * Auto-converted from {$base} on " . date('Y-m-d') . " — modular structure.\n"
         . " */\n"
         . "\$page_title       = '{$titleEsc}';\n"
         . "\$page_description = '{$descriptionEsc}';\n"
         . "\$page_class       = '{$pageClass}';\n"
         . "\$extra_head       = {$extraHeadHeredoc};\n"
         . "require_once __DIR__ . '/includes/header.php';\n"
         . "?>\n"
         . "{$body}\n"
         . "<?php\n"
         . "\$extra_scripts = {$extraScriptsHeredoc};\n"
         . "require_once __DIR__ . '/includes/footer.php';\n"
         . "?>\n";

    // Write
    if (file_put_contents($targetPath, $php) === false) {
        $results[] = ['file' => $base, 'status' => 'error', 'note' => 'could not write ' . $target];
        continue;
    }

    // Quick syntax check
    $syntaxOk = true;
    $syntaxNote = '';
    if (function_exists('shell_exec')) {
        $cmd  = 'php -l ' . escapeshellarg($targetPath) . ' 2>&1';
        $out  = @shell_exec($cmd);
        if ($out !== null && stripos($out, 'No syntax errors') === false) {
            $syntaxOk   = false;
            $syntaxNote = trim(strip_tags((string) $out));
        }
    }

    $results[] = [
        'file'    => $base,
        'target'  => $target,
        'status'  => $syntaxOk ? 'success' : 'syntax-error',
        'bodyKB'  => round(strlen($body) / 1024, 1) . ' KB',
        'styles'  => count($styleMatches[0] ?? []) . ' style block(s)',
        'note'    => $syntaxNote,
    ];
}

/* ─── Render report ─── */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML → PHP Conversion Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0d1b2a; color: #f5f0e8; margin: 0; padding: 40px 24px; }
    h1 { color: #e4c46e; font-weight: 800; font-size: 1.6rem; margin: 0 0 8px; }
    p.lead { color: rgba(255,255,255,0.6); margin: 0 0 28px; }
    table { width: 100%; max-width: 1100px; margin: 0 auto; border-collapse: collapse; background: rgba(255,255,255,0.03); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(201,168,76,0.12); }
    th { background: rgba(201,168,76,0.08); color: #e4c46e; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; font-size: 0.72rem; }
    .ok { color: #6fc28a; font-weight: 700; }
    .skip { color: #a8c8d8; }
    .err { color: #ff8a8a; font-weight: 700; }
    .note { color: rgba(255,255,255,0.55); font-size: 0.82rem; }
    .hint { max-width: 1100px; margin: 22px auto 0; background: rgba(201,168,76,0.08); border: 1px solid rgba(201,168,76,0.3); padding: 18px 22px; border-radius: 12px; line-height: 1.7; }
    .hint b { color: #e4c46e; }
    .hint a { color: #e4c46e; }
    code { background: rgba(255,255,255,0.06); padding: 2px 6px; border-radius: 4px; font-size: 0.86rem; }
</style>
</head>
<body>
    <h1>HTML → PHP Conversion Report</h1>
    <p class="lead">Generated <?= date('Y-m-d H:i:s') ?> · <?= count($results) ?> file(s) processed</p>
    <table>
        <thead>
            <tr>
                <th>Source (.html)</th>
                <th>Target (.php)</th>
                <th>Status</th>
                <th>Body</th>
                <th>Styles</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><code><?= htmlspecialchars($r['file']) ?></code></td>
                <td><code><?= htmlspecialchars($r['target'] ?? '—') ?></code></td>
                <td>
                    <?php if ($r['status'] === 'success'): ?><span class="ok">✓ success</span>
                    <?php elseif ($r['status'] === 'skipped'): ?><span class="skip">↷ skipped</span>
                    <?php else: ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['bodyKB'] ?? '—') ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['styles'] ?? '—') ?></span></td>
                <td><span class="note"><?= htmlspecialchars($r['note'] ?? '') ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="hint">
        <b>Next steps:</b><br>
        1. Visit each generated <code>.php</code> page in your browser to verify it renders identically:<br>
        &nbsp;&nbsp; <code>http://localhost/demosite/index.php</code> · <code>about.php</code> · <code>contact.php</code> · etc.<br>
        2. If all pages look right, you can safely <b>delete the original <code>.html</code> files</b> (or move them to a backup folder).<br>
        3. Edits to the menu/footer now happen in <code>includes/header.php</code> + <code>includes/footer.php</code> only — every page picks them up automatically.<br>
        4. <b>Re-running this script</b> is safe — it overwrites the <code>.php</code> files based on the current <code>.html</code> sources.
    </div>
</body>
</html>
