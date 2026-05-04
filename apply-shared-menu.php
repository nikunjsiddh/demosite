<?php
/**
 * Apply Shared Menu Refactor
 * ────────────────────────────────────────────────────────────
 * Replaces the duplicated menu HTML in each PHP page with a single
 * include statement pointing at includes/menu.php.
 *
 * Run once:  http://localhost:8080/demosite/apply-shared-menu.php
 *
 * For each target .php file:
 *   1. Locates the block from `<!-- ─── MARINE HEADER ... -->`
 *      down to `<script src="js/marine-header.js"></script>`.
 *   2. Replaces it with `<?php include __DIR__ . '/includes/menu.php'; ?>`.
 *   3. Skips files that already use the include (idempotent / safe to re-run).
 */

set_time_limit(120);
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__;

$files = [
    'index.php',
    'about.php',
    'sspsb.php',
    'jjsb.php',
    'contact.php',
    'environment-management.php',
    'health-safety.php',
    'waste-management.php',
    'news.php',
    'gallery.php',
];

$includeStmt = "    <?php include __DIR__ . '/includes/menu.php'; ?>";

// Pattern: from the MARINE HEADER comment OR the <header id="header"
// down to the closing `<script src="js/marine-header.js"></script>` line.
$pattern = '#(?:[ \t]*<!--[^>]*MARINE HEADER[^>]*-->\s*)?[ \t]*<header\s+id=["\']header["\'][^>]*>.*?<script\s+src=["\']js/marine-header\.js["\']\s*></script>#is';

$results = [];

foreach ($files as $filename) {
    $path = $dir . '/' . $filename;

    if (!is_file($path)) {
        $results[] = ['file' => $filename, 'status' => 'missing', 'note' => 'file not found'];
        continue;
    }

    $content = file_get_contents($path);
    if ($content === false) {
        $results[] = ['file' => $filename, 'status' => 'error', 'note' => 'could not read'];
        continue;
    }

    // Already refactored?
    if (strpos($content, "/includes/menu.php") !== false) {
        $results[] = ['file' => $filename, 'status' => 'already-done', 'note' => 'uses includes/menu.php'];
        continue;
    }

    if (!preg_match($pattern, $content)) {
        $results[] = ['file' => $filename, 'status' => 'no-match', 'note' => 'no menu block found'];
        continue;
    }

    $newContent = preg_replace($pattern, $includeStmt, $content, 1);

    if ($newContent === null || $newContent === $content) {
        $results[] = ['file' => $filename, 'status' => 'error', 'note' => 'replace failed'];
        continue;
    }

    if (file_put_contents($path, $newContent) === false) {
        $results[] = ['file' => $filename, 'status' => 'error', 'note' => 'could not write'];
        continue;
    }

    // PHP syntax check
    $syntaxOk   = true;
    $syntaxNote = 'menu replaced';
    if (function_exists('shell_exec')) {
        $cmd = 'php -l ' . escapeshellarg($path) . ' 2>&1';
        $out = @shell_exec($cmd);
        if ($out !== null && stripos($out, 'No syntax errors') === false) {
            $syntaxOk   = false;
            $syntaxNote = trim(strip_tags((string) $out));
        }
    }

    $bytesSaved = strlen($content) - strlen($newContent);
    $results[] = [
        'file'   => $filename,
        'status' => $syntaxOk ? 'success' : 'syntax-error',
        'note'   => $syntaxNote . ' (-' . $bytesSaved . ' bytes)',
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shared Menu Refactor Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0d1b2a; color: #f5f0e8; margin: 0; padding: 40px 24px; }
    h1 { color: #e4c46e; font-weight: 800; font-size: 1.7rem; margin: 0 0 8px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 1100px; margin: 0 auto; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.03); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(201,168,76,0.12); }
    th { background: rgba(201,168,76,0.08); color: #e4c46e; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; font-size: 0.72rem; }
    .ok { color: #6fc28a; font-weight: 700; }
    .skip { color: #a8c8d8; font-weight: 700; }
    .err { color: #ff8a8a; font-weight: 700; }
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
        <h1>Shared Menu Refactor Report</h1>
        <p class="lead">Each page's duplicated menu HTML replaced with a single <code>include</code> pointing at <code>includes/menu.php</code>.</p>

        <?php
            $okCount   = count(array_filter($results, fn($r) => $r['status'] === 'success'));
            $doneCount = count(array_filter($results, fn($r) => $r['status'] === 'already-done'));
            $errCount  = count(array_filter($results, fn($r) => in_array($r['status'], ['error','syntax-error','no-match','missing'], true)));
        ?>
        <div class="summary">
            <span class="pill"><b><?= count($results) ?></b> total</span>
            <span class="pill" style="color:#6fc28a;"><b><?= $okCount ?></b> refactored</span>
            <span class="pill" style="color:#a8c8d8;"><b><?= $doneCount ?></b> already done</span>
            <?php if ($errCount): ?><span class="pill" style="color:#ff8a8a;"><b><?= $errCount ?></b> issues</span><?php endif; ?>
            <span class="pill"><?= date('Y-m-d H:i:s') ?></span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>File</th>
                    <th>Status</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $r): ?>
                <tr>
                    <td><code><?= htmlspecialchars($r['file']) ?></code></td>
                    <td>
                        <?php if ($r['status'] === 'success'): ?><span class="ok">✓ refactored</span>
                        <?php elseif ($r['status'] === 'already-done'): ?><span class="skip">↷ already done</span>
                        <?php else: ?><span class="err">✗ <?= htmlspecialchars($r['status']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td><span class="note"><?= htmlspecialchars($r['note'] ?? '') ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="hint">
            <b>What this script did:</b><br>
            • Found the menu block in each <code>.php</code> file (from MARINE HEADER comment to <code>marine-header.js</code> script).<br>
            • Replaced the entire block with a single line:<br>
            &nbsp;&nbsp;<code>&lt;?php include __DIR__ . '/includes/menu.php'; ?&gt;</code><br>
            • Files that already use the include are skipped (safe to re-run).<br><br>
            <b>Now to edit the menu:</b><br>
            Open <code>includes/menu.php</code> — every page picks up changes automatically.<br>
            Active page link gets <code>class="active"</code> automatically based on current filename.
        </div>
    </div>
</body>
</html>
