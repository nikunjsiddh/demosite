/* ============================================================
   INDEX PAGE BEHAVIOUR — extracted from index.php inline <script>
   Loaded only on the home page via $extra_js = ['index-page'].
   ============================================================ */

// ──────────────────────────────────────
        //  NATIVE SCROLL — no parallax library, no GSAP.
        //  Just regular browser scrolling.
        // ──────────────────────────────────────

        // Hero word-by-word reveal — splits each word in .title-line into spans
        (function () {
            const lines = document.querySelectorAll('#heroTitle .title-line');
            if (!lines.length) return;
            let globalIndex = 0;
            lines.forEach((line) => {
                const text = line.textContent;
                line.textContent = '';
                text.split(/(\s+)/).forEach((token) => {
                    if (/^\s+$/.test(token)) {
                        line.appendChild(document.createTextNode(token));
                    } else if (token.length) {
                        const span = document.createElement('span');
                        span.className = 'word';
                        span.textContent = token;
                        span.style.animationDelay = (0.2 + globalIndex * 0.08) + 's';
                        line.appendChild(span);
                        globalIndex++;
                    }
                });
            });
        })();

        // Auto-tag existing section headers and key content blocks with .reveal
        (function () {
            const autoTargets = [
                '.about-section .section-header',
                '.about-section .about-image',
                '.about-section .about-text',
                '.journey-section .section-header',
                '.journey-section .timeline-item',
                '.stats-section .stat-item',
                '.services-section .section-header',
                '.news-section .section-header',
                '.contact-preview-section .contact-content'
            ];
            autoTargets.forEach((sel) => {
                document.querySelectorAll(sel).forEach((el, i) => {
                    if (!el.classList.contains('reveal')) {
                        el.classList.add('reveal');
                        // small stagger inside lists
                        if (sel.includes('timeline-item') ||
                            sel.includes('stat-item')) {
                            el.style.transitionDelay = (i * 0.08) + 's';
                        }
                    }
                });
            });

            // about: image from-left, text from-right
            document.querySelectorAll('.about-section .about-image').forEach(el => el.classList.add('from-left'));
            document.querySelectorAll('.about-section .about-text').forEach(el => el.classList.add('from-right'));

            // services + news cards keep their original hover-tilt only — no entrance animation

            // timeline items: flip-x for dramatic reveal
            document.querySelectorAll('.journey-section .timeline-item').forEach(el => el.classList.add('flip-x'));

            // stats: bounce-in
            document.querySelectorAll('.stats-section .stat-item').forEach(el => el.classList.add('bounce-in'));
        })();

        // IntersectionObserver — fire reveal when element enters viewport
        (function () {
            const reveals = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window) {
                const io = new IntersectionObserver((entries) => {
                    entries.forEach((e) => {
                        if (e.isIntersecting) {
                            e.target.classList.add('visible');
                            io.unobserve(e.target);
                        }
                    });
                }, { threshold: 0.12 });
                reveals.forEach((el) => io.observe(el));
            } else {
                reveals.forEach((el) => el.classList.add('visible'));
            }
        })();
