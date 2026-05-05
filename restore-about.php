<?php
/**
 * One-shot restore: copy the original about.php from its pre-refactor backup
 * back over the current (broken) about.php.
 *
 * Run once:  http://localhost:8080/demosite/restore-about.php
 *
 * Side effect: also moves the broken current version to
 *   about.php.broken-YYYYMMDD-HHMMSS
 * so we don't lose any in-progress work.
 */

set_time_limit(30);
header('Content-Type: text/html; charset=utf-8');

$dir       = __DIR__;
$pagePath  = $dir . '/about.php';
$ts        = date('Ymd-His');

// Find the most recent backup file
$backups = glob($dir . '/about.php.backup-*');
if (!$backups) {
    die('No backup file found. Cannot restore.');
}
rsort($backups);                   // newest first
$mostRecentBackup = $backups[0];

$results = array();

/* ─── 1. Save the (broken) current about.php as ".broken-..." ─── */
$brokenSave = $dir . '/about.php.broken-' . $ts;
if (is_file($pagePath)) {
    if (copy($pagePath, $brokenSave)) {
        $results[] = array('step' => 'Save broken version', 'status' => 'ok',
            'note' => basename($brokenSave));
    } else {
        $results[] = array('step' => 'Save broken version', 'status' => 'fail',
            'note' => 'could not copy current about.php');
    }
}

/* ─── 2. Restore the backup over about.php ─── */
if (copy($mostRecentBackup, $pagePath)) {
    $size  = filesize($pagePath);
    $lines = substr_count(file_get_contents($pagePath), "\n");
    $results[] = array('step' => 'Restore from backup', 'status' => 'ok',
        'note' => 'about.php now ' . round($size/1024, 1) . ' KB · ' . $lines . ' lines · from ' . basename($mostRecentBackup));
} else {
    $results[] = array('step' => 'Restore from backup', 'status' => 'fail',
        'note' => 'could not copy backup over about.php');
}

/* ─── 3. PHP syntax check on the restored file ─── */
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
<title>about.php Restore Report</title>
<style>
    body { font-family: 'Inter', system-ui, sans-serif; background: #0a1929; color: #f5f3ef; margin: 0; padding: 50px 24px; }
    h1 { color: #b87333; font-weight: 800; font-size: 1.7rem; margin: 0 0 10px; }
    p.lead { color: rgba(255,255,255,0.65); margin: 0 0 28px; }
    .container { max-width: 920px; margin: 0 auto; }
    table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.04); border-radius: 14px; overflow: hidden; }
    th, td { padding: 14px 18px; text-align: left; font-size: 0.92rem; border-bottom: 1px solid rgba(184,115,51,0.15); }
    th { background: rgba(184,115,51,0.10); color: #f5d98b; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; font-size: 0.72rem; }
    .ok   { color: #6fc28a; font-weight: 700; }
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
    <h1>about.php Restored</h1>
    <p class="lead">Original working <code>about.php</code> restored from its pre-refactor backup. UI back to the version you had before the extraction script ran.</p>

    <table>
        <thead><tr><th>Step</th><th>Status</th><th>Note</th></tr></thead>
        <tbody>
        <?php foreach ($results as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['step']) ?></td>
                <td>
                    <?php if ($r['status'] === 'ok'): ?><span class="ok">✓ ok</span>
                    <?php else: ?><span class="fail">✗ <?= htmlspecialchars($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="hint">
        <b>Test it:</b><br>
        Visit <a href="about.php">http://localhost:8080/demosite/about.php</a> and hard-refresh
        (<code>Ctrl + Shift + R</code>). You should see the original UI exactly as before.<br><br>

        <b>What was preserved:</b><br>
        • Inline <code>&lt;style&gt;</code> block — back inside the file (no external CSS link).<br>
        • Inline <code>&lt;script&gt;</code> block — back inside the file.<br>
        • Marine footer markup — full inline as before.<br>
        • Back-to-top button + agentapp scripts — all present.<br>
        • Original banner image (<code>aboutusbanner.png</code>) — unchanged.<br><br>

        <b>Cleanup files left in <code>demosite/</code>:</b><br>
        • <code>about.php</code> (restored, working version)<br>
        • <code>about.php.broken-<?= $ts ?></code> (the broken refactored version, kept for reference)<br>
        • <code>about.php.backup-...</code> (the original backup that was used to restore)<br>
        Once you're happy with about.php, those .broken-* and .backup-* files can be deleted.
    </div>
</div>
</body>
</html>
