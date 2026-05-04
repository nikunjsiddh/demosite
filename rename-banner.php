<?php
/**
 * One-click banner rename
 * ────────────────────────────────────────────────
 * Renames the uploaded "ChatGPT Image..." file in images/banner/
 * to a clean URL-friendly filename: contact-banner.png
 *
 * Run once: http://localhost:8080/demosite/rename-banner.php
 */

set_time_limit(30);
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__ . '/images/banner';
$target = $dir . '/contact-banner.png';

$result = ['status' => 'unknown', 'note' => ''];

if (file_exists($target)) {
    $result = ['status' => 'already-done', 'note' => 'contact-banner.png already exists'];
} else {
    // Find any "ChatGPT Image*.png" file and rename it
    $matches = glob($dir . '/ChatGPT Image*.png');
    if (!empty($matches)) {
        $source = $matches[0];
        if (copy($source, $target)) {
            $result = [
                'status' => 'success',
                'note'   => 'Copied "' . basename($source) . '" → "contact-banner.png"',
            ];
            // Optionally delete the original — keep for now to be safe
        } else {
            $result = ['status' => 'error', 'note' => 'copy failed'];
        }
    } else {
        $result = ['status' => 'error', 'note' => 'no ChatGPT Image*.png file found in images/banner/'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Banner Rename Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0d1b2a; color: #f5f0e8; margin: 0; padding: 60px 24px; text-align: center; }
    h1 { color: #e4c46e; font-weight: 800; font-size: 1.7rem; margin: 0 0 18px; }
    .card { max-width: 600px; margin: 0 auto; background: rgba(255,255,255,0.05); border: 1px solid rgba(201,168,76,0.3); padding: 30px; border-radius: 14px; }
    .ok { color: #6fc28a; font-weight: 700; font-size: 1.2rem; }
    .skip { color: #a8c8d8; font-weight: 700; font-size: 1.2rem; }
    .err { color: #ff8a8a; font-weight: 700; font-size: 1.2rem; }
    p { margin: 16px 0; line-height: 1.7; color: rgba(255,255,255,0.8); }
    code { background: rgba(255,255,255,0.07); padding: 3px 8px; border-radius: 4px; color: #e4c46e; font-size: 0.92rem; }
    a { color: #e4c46e; }
</style>
</head>
<body>
    <div class="card">
        <h1>Banner Rename</h1>
        <?php if ($result['status'] === 'success'): ?>
            <p class="ok">✓ Success</p>
            <p><?= htmlspecialchars($result['note']) ?></p>
            <p>Now visit: <br><a href="contact.php">→ contact.php</a></p>
        <?php elseif ($result['status'] === 'already-done'): ?>
            <p class="skip">↷ Already done</p>
            <p><?= htmlspecialchars($result['note']) ?></p>
            <p><a href="contact.php">→ Open contact.php</a></p>
        <?php else: ?>
            <p class="err">✗ <?= htmlspecialchars($result['status']) ?></p>
            <p><?= htmlspecialchars($result['note']) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
