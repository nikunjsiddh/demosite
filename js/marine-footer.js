/* Marine footer — bubble + crest spray generators */
(function () {
    function makeBubbles() {
        var wrap = document.getElementById('footerBubbles');
        if (!wrap || wrap.dataset.bubbled === '1') return;
        wrap.dataset.bubbled = '1';
        for (var i = 0; i < 14; i++) {
            var b = document.createElement('span');
            var size = 6 + Math.random() * 22;
            b.style.width = size + 'px';
            b.style.height = size + 'px';
            b.style.left = (Math.random() * 100) + '%';
            b.style.animationDuration = (14 + Math.random() * 16) + 's';
            b.style.animationDelay = (-Math.random() * 18) + 's';
            b.style.opacity = (0.2 + Math.random() * 0.35).toFixed(2);
            wrap.appendChild(b);
        }
    }

    function makeSpray() {
        var wrap = document.getElementById('crestSpray');
        if (!wrap || wrap.dataset.sprayed === '1') return;
        wrap.dataset.sprayed = '1';
        for (var i = 0; i < 14; i++) {
            var s = document.createElement('span');
            s.style.left = (Math.random() * 100) + '%';
            s.style.bottom = (28 + Math.random() * 14) + '%';
            s.style.animationDuration = (3 + Math.random() * 4) + 's';
            s.style.animationDelay = (-Math.random() * 6) + 's';
            // size variation
            var size = 3 + Math.random() * 4;
            s.style.width = size + 'px';
            s.style.height = size + 'px';
            wrap.appendChild(s);
        }
    }

    function init() {
        makeBubbles();
        makeSpray();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
