<?php
/**
 * SHARED HEADER (common across the whole site)
 * ────────────────────────────────────────────────────────────
 * Single source for the document <head>, opening <body>, and the
 * navigation menu. Every page calls this once at the very top.
 *
 * Pages set these variables BEFORE including this file:
 *   $page_title        — string, the page title (no site suffix)
 *   $page_description  — string, meta description
 *   $page_keywords     — string, comma-separated keywords (optional)
 *   $page_class        — string, extra class on <body>
 *   $extra_css         — array of file basenames in /css   (e.g. ['index-page'])
 *   $show_page_loader  — bool, show the ship loading animation (default: false)
 *
 * Asset version is appended to all CSS for cache-busting; bump
 * ASSET_VERSION when you ship CSS changes.
 */

if (!defined('ASSET_VERSION')) {
    define('ASSET_VERSION', '1.0.1');
}

$page_title       = $page_title       ?? 'Sachdeva Group — Trusted Ship Recycling Partner Since 1983';
$page_description = $page_description ?? 'Sachdeva Group — your trusted partner for safe and environmentally sound ship recycling at Alang, Gujarat since 1983.';
$page_keywords    = $page_keywords    ?? 'ship recycling, ship breaking, maritime, Sachdeva Group, Alang, sustainable recycling';
$page_class       = $page_class       ?? '';
$extra_css        = $extra_css        ?? [];
$show_page_loader = $show_page_loader ?? false;

// Cache-busting helper
$v = '?v=' . ASSET_VERSION;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords"    content="<?= htmlspecialchars($page_keywords) ?>">
    <title><?= htmlspecialchars($page_title) ?></title>

    <!-- Fonts + icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Site-wide CSS — load order matters: base → theme → header → footer -->
    <link rel="stylesheet" href="agentapp_static/180193f0_40d1_70d0_7dcd_e2aaa36334c6/f39xi1f8zu/styles.css<?= $v ?>">
    <link rel="stylesheet" href="css/inline_styles.css<?= $v ?>">
    <link rel="stylesheet" href="css/marine-header.css<?= $v ?>">
    <link rel="stylesheet" href="css/marine-footer.css<?= $v ?>">

    <!-- Per-page CSS (loaded only on the page that needs it) -->
    <?php foreach ((array) $extra_css as $css): ?>
        <link rel="stylesheet" href="css/<?= htmlspecialchars($css) ?>.css<?= $v ?>">
    <?php endforeach; ?>
</head>

<body class="<?= htmlspecialchars(trim($page_class)) ?>">

<?php if ($show_page_loader): ?>
    <!-- LOADING ANIMATION (opt-in via $show_page_loader = true) -->
    <div class="page-loader">
        <div class="ship-loader">
            <svg viewBox="0 0 200 100" class="ship-svg">
                <path class="wave" d="M0,50 Q25,30 50,50 T100,50 T150,50 T200,50" stroke="#d4af37" fill="none" stroke-width="2"></path>
                <path class="wave wave-2" d="M0,55 Q25,35 50,55 T100,55 T150,55 T200,55" stroke="#0a2540" fill="none" stroke-width="2"></path>
                <polygon points="100,30 120,45 80,45" fill="#0a2540" class="ship-icon"></polygon>
            </svg>
            <p>Loading Excellence...</p>
        </div>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/menu.php'; ?>
