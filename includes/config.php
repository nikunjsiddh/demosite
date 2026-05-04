<?php
/**
 * Site configuration — constants, navigation tree, helpers.
 * Loaded once by header.php. Don't include directly from pages.
 */

/* ─── Site constants ─── */
define('SITE_NAME',       'Sachdeva Group');
define('SITE_TAGLINE',    'Trusted Ship Recycling Partner Since 1983');
define('SITE_DESCRIPTION','Sachdeva Group - leading ship recycling partner at Alang, Gujarat since 1983. HKC compliant, ISO certified.');
define('CONTACT_EMAIL',   'info@sachdevagroup.in');
define('CONTACT_PHONE',   '+91 99254 99123');
define('CONTACT_ADDRESS', 'Alang Ship Recycling Yard, Bhavnagar, Gujarat – 364 210');

/* ─── Navigation tree ─── */
$NAV = [
    ['label' => 'Home',          'url' => 'index.php'],
    ['label' => 'About Us',      'url' => 'about.php'],
    ['label' => 'Our Companies', 'url' => 'javascript:void(0)', 'submenu' => [
        ['label' => 'Sachdeva Steel Products (Ship Breakers)', 'url' => 'sspsb.php'],
        ['label' => 'Jai Jagdish Ship Breakers',               'url' => 'jjsb.php'],
    ]],
    ['label' => 'News & Media',  'url' => 'news.php', 'submenu' => [
        ['label' => 'News',  'url' => 'news.php'],
        ['label' => 'Media', 'url' => 'gallery.php'],
    ]],
    ['label' => 'Contact',       'url' => 'contact.php'],
];

/* ─── Helpers ─── */

/** Returns the current page's filename (e.g. "about.php"). */
function current_page() {
    return basename($_SERVER['PHP_SELF']);
}

/** Checks whether a nav item (or its submenu) matches the current page. */
function is_active($url, $submenu = []) {
    $current = current_page();
    if (basename($url) === $current) return true;
    foreach ($submenu as $sub) {
        if (basename($sub['url']) === $current) return true;
    }
    return false;
}

/** Echoes ' class="active"' if the URL matches the current page. */
function active_class($url, $submenu = []) {
    return is_active($url, $submenu) ? ' class="active"' : '';
}
