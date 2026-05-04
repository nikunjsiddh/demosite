<?php
/**
 * Shared header — meta, fonts, site CSS, marine header markup.
 *
 * Pages may set these BEFORE including this file:
 *   $page_title         — <title>
 *   $page_description   — meta description
 *   $page_class         — extra class on <body>
 *   $extra_head         — extra raw HTML inserted just before </head>
 */
require_once __DIR__ . '/config.php';

$page_title       = $page_title       ?? (SITE_NAME . ' — ' . SITE_TAGLINE);
$page_description = $page_description ?? SITE_DESCRIPTION;
$page_class       = $page_class       ?? '';
$extra_head       = $extra_head       ?? '';

global $NAV;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <title><?= htmlspecialchars($page_title) ?></title>

    <!-- Fonts + icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Site CSS -->
    <link rel="stylesheet" href="css/inline_styles.css">
    <link rel="stylesheet" href="css/marine-header.css">
    <link rel="stylesheet" href="css/marine-footer.css">

    <?= $extra_head ?>
</head>
<body class="has-marine-header <?= htmlspecialchars($page_class) ?>">

    <!-- ─── MARINE HEADER ─── -->
    <header id="header" class="marine-header">
        <div class="mh-main">
            <div class="mh-main-inner">
                <a href="index.php" class="mh-logo">
                    <img src="images/logo.png" alt="<?= SITE_NAME ?>">
                    <div class="mh-logo-text"><?= SITE_NAME ?><span>Ship Recycling · Since 1983</span></div>
                </a>
                <nav class="mh-nav">
                    <ul class="mh-nav-list">
                        <?php foreach ($NAV as $item): ?>
                            <?php $has_sub = !empty($item['submenu']); ?>
                            <li<?= $has_sub ? ' class="mh-has-submenu"' : '' ?>>
                                <a href="<?= $item['url'] ?>"<?= active_class($item['url'], $item['submenu'] ?? []) ?><?= $has_sub ? ' role="button" aria-haspopup="true"' : '' ?>>
                                    <?= htmlspecialchars($item['label']) ?>
                                    <?php if ($has_sub): ?> <i class="fas fa-chevron-down"></i><?php endif; ?>
                                </a>
                                <?php if ($has_sub): ?>
                                    <ul class="mh-submenu"<?= count($item['submenu']) > 1 && strlen($item['submenu'][0]['label']) > 18 ? ' style="min-width: 300px;"' : '' ?>>
                                        <?php foreach ($item['submenu'] as $sub): ?>
                                            <li>
                                                <a href="<?= $sub['url'] ?>"<?= active_class($sub['url']) ?>>
                                                    <?= htmlspecialchars($sub['label']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <button class="mh-toggle" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>
    <script src="js/marine-header.js"></script>
