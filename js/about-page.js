/* ============================================================
   ABOUT PAGE BEHAVIOUR
   - Reveal-on-scroll for .fade-up / .tl-item via IntersectionObserver
   - Animated counters for .stat-number
   - Certificate lightbox with prev/next, keyboard, swipe
   - Safety net: any .fade-up still hidden after DOM ready becomes
     visible immediately (covers edge cases where the observer
     misses elements already in the viewport on load)
   ============================================================ */

(function () {
    'use strict';

    /* ─── Boot once DOM is parsed ─── */
    function boot() {

        /* ─── 1. Reveal-on-scroll ─── */
        var revealEls = document.querySelectorAll('.tl-item, .fade-up');

        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });

            revealEls.forEach(function (el) { revealObserver.observe(el); });
        } else {
            // Browser doesn't support IO — show everything immediately
            revealEls.forEach(function (el) { el.classList.add('visible'); });
        }

        /* Safety net — any element already inside the viewport at boot
           is guaranteed visible after a couple of frames, even if the
           observer's first callback hasn't fired yet. */
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                revealEls.forEach(function (el) {
                    var rect = el.getBoundingClientRect();
                    var inView = rect.top < window.innerHeight && rect.bottom > 0;
                    if (inView) el.classList.add('visible');
                });
            });
        });

        /* ─── 2. Animated counters ─── */
        var counters = document.querySelectorAll('.stat-number');
        if (counters.length && 'IntersectionObserver' in window) {
            var numObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    var el = entry.target;
                    var text = el.textContent.trim();
                    var match = text.match(/[\d,]+/);
                    if (!match) { numObserver.unobserve(el); return; }
                    var end = parseInt(match[0].replace(/,/g, ''), 10);
                    var start = 0;
                    var duration = 1500;
                    var step = end / (duration / 16);
                    var timer = setInterval(function () {
                        start = Math.min(start + step, end);
                        el.textContent = text.replace(/[\d,]+/, Math.floor(start).toLocaleString());
                        if (start >= end) clearInterval(timer);
                    }, 16);
                    numObserver.unobserve(el);
                });
            }, { threshold: 0.5 });
            counters.forEach(function (c) { numObserver.observe(c); });
        }

        /* ─── 3. Certificate lightbox ─── */
        var CERT_IMAGES = [
            'images/cert/1.jpg',
            'images/cert/2.jpg',
            'images/cert/3.jpg',
            'images/cert/4.jpg',
            'images/cert/5.jpg',
            'images/cert/6.jpg',
            'images/cert/7.jpg',
            'images/cert/8.jpg',
            'images/cert/9.jpg'
        ];
        var certIndex = 0;
        var scrollPosition = 0;

        function paintCertLb() {
            var img = document.getElementById('certLbImg');
            if (!img) return;
            img.src = CERT_IMAGES[certIndex];
            img.classList.remove('swap');
            void img.offsetWidth;
            img.classList.add('swap');
            var cur = document.getElementById('certLbCur');
            var tot = document.getElementById('certLbTot');
            if (cur) cur.textContent = (certIndex + 1);
            if (tot) tot.textContent = CERT_IMAGES.length;
        }

        function openCertLb(idx) {
            var lb = document.getElementById('certLb');
            if (!lb) return;
            certIndex = idx;
            paintCertLb();
            lb.classList.add('open');
            scrollPosition = window.scrollY;
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.top = -scrollPosition + 'px';
            document.body.style.width = '100%';
        }

        function closeCertLb(e, force) {
            var lb = document.getElementById('certLb');
            if (!lb) return;
            if (force || (e && (e.target === lb || (e.target.closest && e.target.closest('.lightbox-close'))))) {
                lb.classList.remove('open');
                document.body.style.overflow = '';
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.width = '';
                window.scrollTo(0, scrollPosition);
            }
        }

        function certLbPrev() {
            certIndex = (certIndex - 1 + CERT_IMAGES.length) % CERT_IMAGES.length;
            paintCertLb();
        }

        function certLbNext() {
            certIndex = (certIndex + 1) % CERT_IMAGES.length;
            paintCertLb();
        }

        // Expose lightbox functions globally — onclick="openCertLb(0)" etc. need them
        window.openCertLb  = openCertLb;
        window.closeCertLb = closeCertLb;
        window.certLbPrev  = certLbPrev;
        window.certLbNext  = certLbNext;

        // Keyboard: Esc / ← / →
        document.addEventListener('keydown', function (e) {
            var lb = document.getElementById('certLb');
            if (!lb) return;
            var lbOpen = lb.classList.contains('open');
            if (e.key === 'Escape') { closeCertLb(null, true); return; }
            if (!lbOpen) return;
            if (e.key === 'ArrowLeft')  certLbPrev();
            if (e.key === 'ArrowRight') certLbNext();
        });

        // Touch swipe on cert lightbox
        var lb = document.getElementById('certLb');
        if (lb) {
            var startX = null;
            lb.addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            }, { passive: true });
            lb.addEventListener('touchend', function (e) {
                if (startX == null) return;
                var dx = e.changedTouches[0].clientX - startX;
                if (Math.abs(dx) > 50) {
                    if (dx > 0) certLbPrev(); else certLbNext();
                }
                startX = null;
            }, { passive: true });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();
