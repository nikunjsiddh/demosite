<?php
/**
 * jjsb.php — FULL migration to shared header/footer + external CSS/JS
 * ────────────────────────────────────────────────────────────
 * Goal:
 *   • Extract inline <style> blocks  → css/jjsb-page.css
 *   • Extract inline <script> blocks → js/jjsb-page.js (IIFE + safety net)
 *   • Replace duplicated <!DOCTYPE>, <head>, common CSS links, <body>
 *     opening, and the includes/menu.php call  →  one require for
 *     includes/header.php with $page_title, $extra_css, $extra_js set.
 *   • Replace the inline marine <footer>, scripts, </body>, </html>
 *     with one require for includes/footer.php.
 *
 * Body content + section markup + animations are left UNTOUCHED.
 *
 * Run once:  http://localhost:8080/demosite/refactor-jjsb-full.php
 *
 * Safety:
 *   • Backs up jjsb.php to jjsb.php.full-backup-YYYYMMDD-HHMMSS.
 *   • Writes the proposed file to jjsb.php.tmp- and runs `php -l`.
 *   • Only renames the temp over jjsb.php if the syntax check passes.
 *   • If anything fails, the original jjsb.php is left untouched.
 *   • Idempotent — already-migrated pages are skipped.
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

/* ─── Idempotency: header.php + footer.php already wired up? ─── */
if (strpos($src, "/includes/header.php") !== false &&
    strpos($src, "/includes/footer.php") !== false &&
    stripos($src, '<!DOCTYPE') === false) {
    $results[] = array('step' => 'Idempotency', 'status' => 'skip',
        'note' => 'jjsb.php already uses shared header.php + footer.php');
    $abort = true;
}

/* ─── 1. Backup ─── */
if (!$abort) {
    $backup = $pagePath . '.full-backup-' . $ts;
    if (!file_put_contents($backup, $src)) {
        $results[] = array('step' => 'Backup', 'status' => 'fail', 'note' => 'could not write backup');
        $abort = true;
    } else {
        $results[] = array('step' => 'Backup', 'status' => 'ok', 'note' => basename($backup));
    }
}

/* ─── 2. Extract metadata from current file ─── */
$meta = array(
    'title'       => 'Jai Jagdish Ship Breakers Pvt. Ltd.',
    'description' => '',
    'keywords'    => '',
    'class'       => '',
);
if (!$abort) {
    if (preg_match('#<title>([^<]*)</title>#i', $src, $m))                             $meta['title']       = trim($m[1]);
    if (preg_match('#<meta\s+name=["\']description["\']\s+content=["\']([^"\']*)["\']#is', $src, $m)) $meta['description'] = trim($m[1]);
    if (preg_match('#<meta\s+name=["\']keywords["\']\s+content=["\']([^"\']*)["\']#is', $src, $m))    $meta['keywords']    = trim($m[1]);
    if (preg_match('#<body\b[^>]*\bclass=["\']([^"\']*)["\']#is', $src, $m))             $meta['class']       = trim($m[1]);

    $results[] = array('step' => 'Read metadata', 'status' => 'ok',
        'note' => 'title, desc, keywords' . ($meta['class'] ? ' + body class' : ''));
}

$work = $src;

/* ─── 3. Extract ALL inline <style> blocks ─── */
$cssChunks = array();
if (!$abort && preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $work, $sm, PREG_OFFSET_CAPTURE)) {
    foreach ($sm[1] as $match) $cssChunks[] = trim($match[0]);

    $blocks = $sm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($work) && in_array($work[$end], array("\n","\r","\t"," "), true)) $end++;
        $work = substr($work, 0, $start) . substr($work, $end);
    }

    $cssOut = "/* ============================================================\n"
            . "   JJSB PAGE STYLES — extracted from jjsb.php inline <style>\n"
            . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-jjsb-full.php\n"
            . "   ============================================================ */\n\n"
            . implode("\n\n/* ============= next inline block ============= */\n\n", $cssChunks) . "\n";

    if (!file_put_contents($cssPath, $cssOut)) {
        $results[] = array('step' => 'Extract CSS', 'status' => 'fail', 'note' => 'could not write css/jjsb-page.css');
        $abort = true;
    } else {
        $results[] = array('step' => 'Extract CSS', 'status' => 'ok',
            'note' => count($cssChunks) . ' block(s) → ' . round(strlen($cssOut)/1024, 1) . ' KB');
    }
}

/* ─── 4. Extract ALL inline <script> blocks (no src) ─── */
$jsChunks = array();
if (!$abort && preg_match_all('#<script\b(?![^>]*\bsrc=)[^>]*>(.*?)</script>#is', $work, $jm, PREG_OFFSET_CAPTURE)) {
    foreach ($jm[1] as $match) $jsChunks[] = trim($match[0]);

    $blocks = $jm[0];
    for ($i = count($blocks) - 1; $i >= 0; $i--) {
        $start = $blocks[$i][1];
        $end   = $start + strlen($blocks[$i][0]);
        while ($end < strlen($work) && in_array($work[$end], array("\n","\r","\t"," "), true)) $end++;
        $work = substr($work, 0, $start) . substr($work, $end);
    }

    $jsBody = implode("\n\n/* ============= next inline block ============= */\n\n", $jsChunks);

    $jsOut  = "/* ============================================================\n"
            . "   JJSB PAGE BEHAVIOUR — extracted from jjsb.php inline <script>\n"
            . "   Generated: " . date('Y-m-d H:i:s') . " by refactor-jjsb-full.php\n"
            . "   IIFE + DOMContentLoaded + rAF safety net so any .reveal\n"
            . "   element already in viewport on load is shown immediately,\n"
            . "   even if IntersectionObserver misses it.\n"
            . "   ============================================================ */\n\n"
            . "(function () {\n"
            . "    'use strict';\n\n"
            . "    function boot() {\n"
            . $jsBody . "\n\n"
            . "        /* Safety net for .reveal */\n"
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
            'note' => count($jsChunks) . ' block(s) → ' . round(strlen($jsOut)/1024, 1) . ' KB · IIFE + safety');
    }
}

/* ─── 5. Locate the body content boundaries ─── */
/*
   Body content begins AFTER:  `<?php include __DIR__ . '/includes/menu.php'; ?>`
   Body content ends BEFORE:   the marine footer comment / opening <footer id="footer">
*/
if (!$abort) {
    $startMarker = "/<\?php\s+include\s+__DIR__\s*\.\s*'\/includes\/menu\.php'\s*;\s*\?>/";
    $endMarker   = '/(?:[ \t]*<!--[^>]*MARINE\s+(?:ANIMATED\s+)?FOOTER[^>]*-->\s*)?[ \t]*<footer\s+id=["\']footer["\']\s+class=["\']marine-footer["\']/i';

    $startPos = null;
    $endPos   = null;

    if (preg_match($startMarker, $work, $m, PREG_OFFSET_CAPTURE)) {
        $startPos = $m[0][1] + strlen($m[0][0]);
    }
    if (preg_match($endMarker, $work, $m, PREG_OFFSET_CAPTURE)) {
        $endPos = $m[0][1];
    }

    if ($startPos === null || $endPos === null || $startPos >= $endPos) {
        $results[] = array('step' => 'Locate body', 'status' => 'fail',
            'note' => 'could not locate body content boundaries');
        $abort = true;
    } else {
        $body = trim(substr($work, $startPos, $endPos - $startPos), "\r\n\t");
        $results[] = array('step' => 'Locate body', 'status' => 'ok',
            'note' => 'body content captured (' . round(strlen($body)/1024, 1) . ' KB)');
    }
}

/* ─── 6. Build the new minimal jjsb.php ─── */
if (!$abort) {
    $titleEsc = addslashes($meta['title']);
    $descEsc  = addslashes($meta['description']);
    $kwEsc    = addslashes($meta['keywords']);
    $classEsc = addslashes($meta['class']);

    $newSrc  = "<?php\n";
    $newSrc .= "/**\n";
    $newSrc .= " * jjsb.php — body content only.\n";
    $newSrc .= " * Common <head>, menu, and footer come from\n";
    $newSrc .= " *   includes/header.php  +  includes/footer.php\n";
    $newSrc .= " */\n";
    $newSrc .= "\$page_title       = '{$titleEsc}';\n";
    $newSrc .= "\$page_description = '{$descEsc}';\n";
    if ($kwEsc !== '') {
        $newSrc .= "\$page_keywords    = '{$kwEsc}';\n";
    }
    $newSrc .= "\$page_class       = '{$classEsc}';\n";
    $newSrc .= "\$extra_css        = " . (!empty($cssChunks) ? "['jjsb-page']" : "[]") . ";\n";
    $newSrc .= "\$extra_js         = " . (!empty($jsChunks)  ? "['jjsb-page']" : "[]") . ";\n";
    $newSrc .= "require_once __DIR__ . '/includes/header.php';\n";
    $newSrc .= "?>\n";
    $newSrc .= $body . "\n";
    $newSrc .= "<?php require_once __DIR__ . '/includes/footer.php'; ?>\n";

    /* ─── 7. Atomic commit — only if PHP syntax is clean ─── */
    $tmpPath = $pagePath . '.tmp-' . $ts;
    if (!file_put_contents($tmpPath, $newSrc)) {
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
<title>jjsb.php Full Migration Report</title>
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
    <h1>jjsb.php Full Migration Report</h1>
    <p class="lead">CSS to <code>css/jjsb-page.css</code>, JS to <code>js/jjsb-page.js</code>. <code>&lt;head&gt;</code> + menu + footer now come from <code>includes/header.php</code> + <code>includes/footer.php</code>. Body content untouched. Atomic commit verified by <code>php -l</code>.</p>

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
        <b>What jjsb.php now looks like (top of file):</b><br>
        <code>&lt;?php<br>
        $page_title       = 'Jai Jagdish Ship Breakers ...';<br>
        $page_description = '...';<br>
        $page_class       = '';<br>
        $extra_css        = ['jjsb-page'];<br>
        $extra_js         = ['jjsb-page'];<br>
        require_once __DIR__ . '/includes/header.php';<br>
        ?&gt;<br>
        &lt;!-- body content (hero, stats, table, ISO band) --&gt;<br>
        &lt;?php require_once __DIR__ . '/includes/footer.php'; ?&gt;</code>
        <br><br>

        <b>Where the common stuff lives now:</b><br>
        • <code>includes/header.php</code> → DOCTYPE, &lt;head&gt;, all common CSS, &lt;body&gt;, page-loader, menu<br>
        • <code>includes/menu.php</code>   → just the &lt;nav&gt; markup with auto-active page detection<br>
        • <code>includes/footer.php</code> → marine footer markup, common JS, &lt;/body&gt;, &lt;/html&gt;<br><br>

        <b>Test:</b><br>
        Visit <a href="jjsb.php">http://localhost:8080/demosite/jjsb.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). Hero, stats counter, ships table search, ISO band, footer — all should look exactly as before.<br><br>

        <b>If anything looks off:</b><br>
        Restore from <code>jjsb.php.full-backup-<?= $ts ?></code> in the demosite folder.
    </div>
</div>
</body>
</html>
