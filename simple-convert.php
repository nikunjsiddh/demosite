<?php
/**
 * Simple HTML → PHP converter (preserves UI 100%).
 *
 * For each .html source file, this script:
 *   1. Copies the file content verbatim (no UI/style/layout changes)
 *   2. Replaces all `.html` link references with the matching `.php` filename
 *      inside: href="...", href='...', window.location.href='...', etc.
 *   3. Replaces hardcoded "© 2026" with dynamic <?= date('Y') ?>.
 *   4. Writes the result as a .php file with the same name (Contact.html → contact.php).
 *
 * Run once: http://localhost:8080/demosite/simple-convert.php
 *
 * Re-running is safe — it overwrites the .php files based on the latest .html sources.
 */

set_time_limit(120);
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__;

// Source .html → target .php
$files = [
    'sspsb.html'                  => 'sspsb.php',
    'jjsb.html'                   => 'jjsb.php',
    'news.html'                   => 'news.php',
    'gallery.html'                => 'gallery.php',
    'Contact.html'                => 'contact.php',
    'environment-management.html' => 'environment-management.php',
    'health-safety.html'          => 'health-safety.php',
    'waste-management.html'       => 'waste-management.php',
];

// Link replacement map (case-sensitive on the source side)
$linkMap = [
    'index.html'                  => 'index.php',
    'about.html'                  => 'about.php',
    'sspsb.html'                  => 'sspsb.php',
    'jjsb.html'                   => 'jjsb.php',
    'news.html'                   => 'news.php',
    'gallery.html'                => 'gallery.php',
    'Contact.html'                => 'contact.php',
    'environment-management.html' => 'environment-management.php',
    'health-safety.html'          => 'health-safety.php',
    'waste-management.html'       => 'waste-management.php',
];

$results = [];

foreach ($files as $source => $target) {
    $sourcePath = $dir . '/' . $source;
    $targetPath = $dir . '/' . $target;

    if (!is_file($sourcePath)) {
        $results[] = [
            'source' => $source,
            'target' => $target,
            'status' => 'missing',
            'note'   => 'source file not found',
        ];
        continue;
    }

    $html = file_get_contents($sourcePath);
    if ($html === false) {
        $results[] = [
            'source' => $source,
            'target' => $target,
            'status' => 'error',
            'note'   => 'could not read source',
        ];
        continue;
    }

    $original = $html;

    /* ─── 1. Replace href="...html" / href='...html' with .php ─── */
    $html = preg_replace_callback(
        '#(href\s*=\s*["\'])([^"\']+?)(["\'])#i',
        function ($m) use ($linkMap) {
            $url = $m[2];
            // Skip mailto:, tel:, http:, javascript:, # — only touch .html files
            if (preg_match('#^(mailto:|tel:|https?://|javascript:|#)#i', $url)) {
                return $m[0];
            }
            // Split url + #hash
            $hash = '';
            if (($p = strpos($url, '#')) !== false) {
                $hash = substr($url, $p);
                $url  = substr($url, 0, $p);
            }
            $base = basename($url);
            if (isset($linkMap[$base])) {
                $url = str_replace($base, $linkMap[$base], $url);
            } elseif (preg_match('#\.html$#i', $url)) {
                $url = preg_replace('#\.html$#i', '.php', $url);
            }
            return $m[1] . $url . $hash . $m[3];
        },
        $html
    );

    /* ─── 2. Replace window.location.href='...html' with .php ─── */
    $html = preg_replace_callback(
        "#(window\\.location\\.href\\s*=\\s*['\"])([^'\"]+?)(['\"])#i",
        function ($m) use ($linkMap) {
            $url = $m[2];
            $base = basename($url);
            if (isset($linkMap[$base])) {
                $url = str_replace($base, $linkMap[$base], $url);
            } elseif (preg_match('#\.html$#i', $url)) {
                $url = preg_replace('#\.html$#i', '.php', $url);
            }
            return $m[1] . $url . $m[3];
        },
        $html
    );

    /* ─── 3. Replace hardcoded © 2026 with dynamic <?= date('Y') ?> ─── */
    $html = preg_replace(
        '#©\s*20\d{2}#u',
        '© <?= date(\'Y\') ?>',
        $html
    );

    /* ─── 4. Write the .php file ─── */
    if (file_put_contents($targetPath, $html) === false) {
        $results[] = [
            'source' => $source,
            'target' => $target,
            'status' => 'error',
            'note'   => 'could not write target',
        ];
        continue;
    }

    /* ─── 5. PHP syntax check ─── */
    $syntaxOk   = true;
    $syntaxNote = 'no changes';
    if ($html === $original) {
        $syntaxNote = 'no .html references to update';
    } else {
        $diff = strlen($html) - strlen($original);
        $syntaxNote = ($diff >= 0 ? '+' : '') . $diff . ' bytes';
    }

    if (function_exists('shell_exec')) {
        $cmd = 'php -l ' . escapeshellarg($targetPath) . ' 2>&1';
        $out = @shell_exec($cmd);
        if ($out !== null && stripos($out, 'No syntax errors') === false) {
            $syntaxOk   = false;
            $syntaxNote = trim(strip_tags((string) $out));
        }
    }

    $results[] = [
        'source' => $source,
        'target' => $target,
        'status' => $syntaxOk ? 'success' : 'syntax-error',
        'size'   => round(strlen($html) / 1024, 1) . ' KB',
        'note'   => $syntaxNote,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Simple HTML → PHP Conversion Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0d1b2a; color: #f5f0e8; margin: 0; padding: 40px 24px; }
    h1 { color: #e4c46e; font-weight: 800; font-size: 1.7rem; margin: 0 0 8px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 1100px; margin: 0 auto; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.03); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(201,168,76,0.12); }
    th { background: rgba(201,168,76,0.08); color: #e4c46e; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; font-size: 0.72rem; }
    .ok { color: #6fc28a; font-weight: 700; }
    .err { color: #ff8a8a; font-weight: 700; }
    .miss { color: #ffd166; font-weight: 700; }
    .note { color: rgba(255,255,255,0.6); font-size: 0.85rem; }
    .hint { background: rgba(201,168,76,0.10); border: 1px solid rgba(201,168,76,0.32); padding: 18px 22px; border-radius: 12px; line-height: 1.75; margin-top: 22px; }
    .hint b { color: #e4c46e; }
    code { background: rgba(255,255,255,0.07); padding: 2px 6px; border-radius: 4px; font-size: 0.86rem; color: #e4c46e; }
    .summary { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 24px; }
    .pill { background: rgba(255,255,255,0.05); padding: 10px 18px; border-radius: 50px; font-size: 0.88rem; border: 1px solid rgba(201,168,76,0.2); }
    .pill b { color: #e4c46e; }
</style>
</head>
<body>
    <div class="container">
        <h1>Simple HTML → PHP Conversion Report</h1>
        <p class="lead">UI / fonts / styles / layout preserved 100%. Only <code>.html</code> link references replaced with <code>.php</code>.</p>

        <?php
            $okCount   = count(array_filter($results, fn($r) => $r['status'] === 'success'));
            $errCount  = count(array_filter($results, fn($r) => $r['status'] === 'error' || $r['status'] === 'syntax-error'));
            $missCount = count(array_filter($results, fn($r) => $r['status'] === 'missing'));
        ?>
        <div class="summary">
            <span class="pill"><b><?= count($results) ?></b> total</span>
            <span class="pill" style="color:#6fc28a;"><b><?= $okCount ?></b> success</span>
            <?php if ($errCount): ?><span class="pill" style="color:#ff8a8a;"><b><?= $errCount ?></b> errors</span><?php endif; ?>
            <?php if ($missCount): ?><span class="pill" style="color:#ffd166;"><b><?= $missCount ?></b> missing</span><?php endif; ?>
            <span class="pill"><?= date('Y-m-d H:i:s') ?></span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Source (.html)</th>
                    <th>Target (.php)</th>
                    <th>Status</th>
                    <th>Size</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $r): ?>
                <tr>
                    <td><code><?= htmlspecialchars($r['source']) ?></code></td>
                    <td><code><?= htmlspecialchars($r['target']) ?></code></td>
                    <td>
                        <?php if ($r['status'] === 'success'): ?><span class="ok">✓ success</span>
                        <?php elseif ($r['status'] === 'missing'): ?><span class="miss">⚠ missing</span>
                        <?php else: ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td><span class="note"><?= htmlspecialchars($r['size'] ?? '—') ?></span></td>
                    <td><span class="note"><?= htmlspecialchars($r['note'] ?? '') ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="hint">
            <b>Next steps:</b><br>
            1. Visit each generated <code>.php</code> page to verify it looks identical:<br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/sspsb.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/jjsb.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/news.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/gallery.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/contact.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/environment-management.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/health-safety.php</code><br>
            &nbsp;&nbsp; <code>http://localhost:8080/demosite/waste-management.php</code><br>
            2. Once verified, you can safely <b>delete the original <code>.html</code> files</b> (or keep them as backup).<br>
            3. <b>Re-running this script is safe</b> — it overwrites the <code>.php</code> files based on the latest <code>.html</code> source.
        </div>
    </div>
</body>
</html>
