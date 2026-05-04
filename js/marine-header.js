/* Marine header
   - Sticky shrink on scroll
   - Mobile menu toggle with backdrop
   - Click submenu to expand on mobile */
(function () {
    function init() {
        var header = document.querySelector('.marine-header');
        if (!header) return;

        // Add body class so the page reserves space for the fixed header
        if (!document.body.classList.contains('has-marine-header')) {
            document.body.classList.add('has-marine-header');
        }

        // Scroll-shrink
        var ticking = false;
        function onScroll() {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    if (window.scrollY > 50) header.classList.add('scrolled');
                    else header.classList.remove('scrolled');
                    ticking = false;
                });
                ticking = true;
            }
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Mobile toggle
        var toggle = header.querySelector('.mh-toggle');
        var nav = header.querySelector('.mh-nav');

        // Backdrop
        var overlay = document.createElement('div');
        overlay.className = 'mh-overlay';
        document.body.appendChild(overlay);

        function closeMenu() {
            if (toggle) toggle.classList.remove('active');
            if (nav) nav.classList.remove('open');
            overlay.classList.remove('show');
        }

        if (toggle && nav) {
            toggle.addEventListener('click', function () {
                var open = !nav.classList.contains('open');
                toggle.classList.toggle('active', open);
                nav.classList.toggle('open', open);
                overlay.classList.toggle('show', open);
            });

            overlay.addEventListener('click', closeMenu);

            // Close mobile menu when clicking a leaf nav link
            nav.querySelectorAll('a').forEach(function (a) {
                a.addEventListener('click', function () {
                    if (window.innerWidth <= 980 && !a.closest('.mh-has-submenu > a')) {
                        // Don't close if clicking the submenu parent
                        if (!a.parentElement.classList.contains('mh-has-submenu')) {
                            setTimeout(closeMenu, 80);
                        }
                    }
                });
            });

            // ESC closes the panel
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeMenu();
            });

            // Close on resize back to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth > 980) closeMenu();
            });
        }

        // Mobile submenu expand/collapse — click parent <a>
        header.querySelectorAll('.mh-has-submenu > a').forEach(function (a) {
            a.addEventListener('click', function (e) {
                if (window.innerWidth <= 980) {
                    e.preventDefault();
                    a.parentElement.classList.toggle('expanded');
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
