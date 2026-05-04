<?php
/**
 * SHARED MENU / HEADER
 * ────────────────────────────────────────────────────────────
 * Single source of truth for the site's marine-style header menu.
 *
 * Used on every page via:
 *     <?php include __DIR__ . '/includes/menu.php'; ?>
 *
 * The current page is detected from the filename (PHP_SELF) and
 * the matching nav link automatically gets a `class="active"`.
 *
 * To add or rename a menu item, edit ONLY this file —
 * every page will pick up the change automatically.
 */

// Current page filename (e.g. "index.php", "about.php")
$current_page = basename($_SERVER['PHP_SELF']);

// Helper: returns ' class="active"' when $page matches the current page
function nav_active($page) {
    global $current_page;
    return $current_page === $page ? ' class="active"' : '';
}

// Helper: returns ' class="active"' when current page is in $pages list
function nav_active_in(array $pages) {
    global $current_page;
    return in_array($current_page, $pages, true) ? ' class="active"' : '';
}
?>
<!-- ─── MARINE HEADER (shared via includes/menu.php) ─── -->
<header id="header" class="marine-header">
    <div class="mh-topbar">
        <div class="mh-topbar-inner">
            <div class="mh-topbar-left">
                <a href="mailto:info@sachdevagroup.in"><i class="fas fa-envelope"></i> info@sachdevagroup.in</a>
                <a href="tel:+919925499123"><i class="fas fa-phone"></i> +91 99254 99123</a>
            </div>
            <div class="mh-topbar-right">
                <span class="mh-tb-label">Follow:</span>
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Twitter / X"><i class="fab fa-x-twitter"></i></a>
                <a href="https://wa.me/919925499123" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <div class="mh-main">
        <div class="mh-main-inner">
            <a href="index.php" class="mh-logo">
                <img src="images/logo.png" alt="Sachdeva Group">
                <div class="mh-logo-text">Sachdeva Group<span>Ship Recycling · Since 1983</span></div>
            </a>

            <nav class="mh-nav">
                <ul class="mh-nav-list">
                    <li><a href="index.php"<?= nav_active('index.php') ?>>Home</a></li>
                    <li><a href="about.php"<?= nav_active('about.php') ?>>About Us</a></li>

                    <li class="mh-has-submenu">
                        <a href="javascript:void(0)"<?= nav_active_in(['sspsb.php', 'jjsb.php']) ?> role="button" aria-haspopup="true">Our Companies <i class="fas fa-chevron-down"></i></a>
                        <ul class="mh-submenu" style="min-width: 300px;">
                            <li><a href="sspsb.php"<?= nav_active('sspsb.php') ?>>Sachdeva Steel Products (Ship Breakers)</a></li>
                            <li><a href="jjsb.php"<?= nav_active('jjsb.php') ?>>Jai Jagdish Ship Breakers</a></li>
                        </ul>
                    </li>

                    <li class="mh-has-submenu">
                        <a href="javascript:void(0)"<?= nav_active_in(['news.php', 'gallery.php']) ?> role="button" aria-haspopup="true">News &amp; Media <i class="fas fa-chevron-down"></i></a>
                        <ul class="mh-submenu">
                            <li><a href="news.php"<?= nav_active('news.php') ?>>News</a></li>
                            <li><a href="gallery.php"<?= nav_active('gallery.php') ?>>Media</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.php"<?= nav_active('contact.php') ?>>Contact</a></li>
                </ul>
            </nav>

            <a href="contact.php" class="mh-cta">
                <i class="fas fa-anchor"></i> Get Quote
            </a>

            <button class="mh-toggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
<script src="js/marine-header.js"></script>
