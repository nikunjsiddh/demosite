<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waste Management – Sachdeva Group | Safe Ship Recycling at Alang</title>
    <meta name="description"
        content="Sachdeva Group's Waste Management — Inventory of Hazardous Materials (IHM), safe handling of asbestos, PCBs, glass fibre, solid foam &amp; waste oil, with HSE Team supervision at every stage." />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="agentapp_static/180193f0_40d1_70d0_7dcd_e2aaa36334c6/f39xi1f8zu/styles.css">
    <link rel="stylesheet" href="css/inline_styles.css">
    <link rel="stylesheet" href="css/marine-footer.css">
    <link rel="stylesheet" href="css/marine-header.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy: #0d1b2a;
            --navy-mid: #14304d;
            --navy-light: #1a3553;
            --gold: #c9a84c;
            --gold-light: #e4c46e;
            --gold-bright: #ffd47a;
            --bg: #f3f7fb;
            --white: #ffffff;
            --text: #2c3e50;
            --muted: #64748b;
            --warn-red: #c73d3d;
            --warn-amber: #e8a13e;
            --warn-yellow: #f0c419;
            --eco-green: #2e7d4f;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        /* ─── HERO ─── */
        .wm-hero {
            position: relative;
            padding: 220px 24px 110px;
            text-align: center;
            background-image:
                linear-gradient(135deg, rgba(13, 27, 42, 0.86) 0%, rgba(20, 48, 77, 0.78) 55%, rgba(13, 27, 42, 0.88) 100%),
                url('images/WasteManagement.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow: hidden;
            isolation: isolate;
        }

        .wm-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 22% 28%, rgba(232, 161, 62, 0.20), transparent 50%),
                radial-gradient(ellipse at 78% 72%, rgba(46, 125, 79, 0.20), transparent 50%);
            pointer-events: none;
        }

        .wm-hero > * { position: relative; z-index: 1; }

        .wm-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(232, 161, 62, 0.14);
            border: 1px solid rgba(232, 161, 62, 0.55);
            color: var(--gold-bright);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 8px 22px;
            border-radius: 50px;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
        }

        .wm-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold-bright);
            box-shadow: 0 0 10px var(--gold-bright);
        }

        .wm-hero h1 {
            font-size: clamp(2.2rem, 5.2vw, 4rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1.15;
            letter-spacing: -0.01em;
        }

        .wm-hero h1 span { color: var(--gold-light); }

        .wm-hero p {
            max-width: 760px;
            margin: 22px auto 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.05rem;
            line-height: 1.75;
        }

        .gold-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            margin: 26px auto 0;
            border-radius: 2px;
        }

        .wm-hero-meta {
            display: flex;
            gap: 28px;
            justify-content: center;
            margin-top: 36px;
            flex-wrap: wrap;
        }

        .wm-hero-meta span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.92rem;
            font-weight: 500;
        }

        .wm-hero-meta i { color: var(--gold-light); }

        /* ─── SECTION SHELL ─── */
        .section { padding: 100px 24px; position: relative; }
        .section-inner { max-width: 1200px; margin: 0 auto; position: relative; }

        .section-light {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(243, 247, 251, 0.96) 100%),
                url('images/environment1.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .section-light::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 18% 18%, rgba(46, 125, 79, 0.08), transparent 40%),
                radial-gradient(circle at 82% 80%, rgba(201, 168, 76, 0.08), transparent 40%);
            pointer-events: none;
        }

        .section-light .section-inner { position: relative; z-index: 1; }

        .section-head { text-align: center; margin-bottom: 60px; }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(199, 61, 61, 0.10);
            color: var(--warn-red);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 8px 20px;
            border-radius: 50px;
            margin-bottom: 16px;
        }

        .section-tag i { font-size: 13px; }

        .section-tag.gold {
            background: rgba(201, 168, 76, 0.12);
            color: var(--gold);
        }

        .section-title {
            font-size: clamp(1.8rem, 3.2vw, 2.6rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.2;
            margin-bottom: 14px;
            letter-spacing: -0.01em;
        }

        .section-title span { color: var(--gold); }

        .gold-line {
            display: inline-block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            margin: 8px 0 22px;
            border-radius: 2px;
            position: relative;
        }

        .gold-line::before, .gold-line::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
        }

        .gold-line::before { left: -14px; }
        .gold-line::after { right: -14px; }

        .section-sub {
            color: var(--muted);
            font-size: 1.02rem;
            max-width: 760px;
            margin: 0 auto;
            line-height: 1.85;
        }

        /* ─── INTRO CALLOUT ─── */
        .intro-callout {
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(248, 251, 255, 0.96));
            border-radius: 22px;
            padding: 44px 40px;
            box-shadow: 0 10px 30px rgba(13, 27, 42, 0.08);
            border: 1px solid rgba(13, 27, 42, 0.05);
            position: relative;
            border-left: 5px solid var(--warn-amber);
            display: grid;
            grid-template-columns: 90px 1fr;
            gap: 26px;
            align-items: flex-start;
        }

        .intro-callout .ic-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--warn-amber), var(--gold-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
            box-shadow: 0 10px 22px rgba(232, 161, 62, 0.3);
        }

        .intro-callout p {
            color: var(--text);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .intro-callout p:last-child { margin-bottom: 0; }

        .intro-callout strong { color: var(--navy); }

        @media (max-width: 720px) {
            .intro-callout { grid-template-columns: 1fr; padding: 32px 24px; }
        }

        /* ─── HAZARDOUS MATERIALS GRID ─── */
        .hazmat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 22px;
            margin-top: 40px;
        }

        .hazmat-chip {
            background: var(--white);
            border-radius: 18px;
            padding: 28px 22px;
            text-align: center;
            border: 1px solid rgba(199, 61, 61, 0.18);
            box-shadow: 0 6px 20px rgba(13, 27, 42, 0.06);
            transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease, border-color 0.3s;
            position: relative;
            overflow: hidden;
        }

        .hazmat-chip::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--warn-red), var(--warn-amber));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .hazmat-chip:hover {
            transform: translateY(-8px);
            border-color: rgba(199, 61, 61, 0.45);
            box-shadow: 0 22px 44px rgba(199, 61, 61, 0.15);
        }

        .hazmat-chip:hover::before { transform: scaleX(1); }

        .hazmat-chip .hm-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(199, 61, 61, 0.12), rgba(232, 161, 62, 0.10));
            border: 1px solid rgba(199, 61, 61, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--warn-red);
            font-size: 1.5rem;
            transition: 0.4s ease;
        }

        .hazmat-chip:hover .hm-icon {
            background: linear-gradient(135deg, var(--warn-red), var(--warn-amber));
            color: #fff;
            transform: rotate(-8deg) scale(1.08);
        }

        .hazmat-chip h4 {
            color: var(--navy);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .hazmat-chip p {
            color: var(--muted);
            font-size: 0.78rem;
            line-height: 1.5;
        }

        /* ─── PROCEDURE SECTION (DARK) ─── */
        .section-dark {
            background-image:
                linear-gradient(180deg, rgba(6, 22, 37, 0.92) 0%, rgba(13, 27, 42, 0.92) 50%, rgba(20, 48, 77, 0.92) 100%),
                url('images/WasteManagement.png');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .section-dark::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(232, 161, 62, 0.16), transparent 50%),
                radial-gradient(circle at 80% 60%, rgba(46, 125, 79, 0.18), transparent 50%);
            pointer-events: none;
        }

        .section-dark::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(232, 161, 62, 0.08) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.4;
            pointer-events: none;
            mask-image: radial-gradient(ellipse at center, #000 0%, transparent 75%);
            -webkit-mask-image: radial-gradient(ellipse at center, #000 0%, transparent 75%);
        }

        .section-dark .section-inner { position: relative; z-index: 1; }
        .section-dark .section-title { color: var(--white); }
        .section-dark .section-title span { color: var(--gold-light); }
        .section-dark .section-sub { color: rgba(255, 255, 255, 0.72); }
        .section-dark .section-tag {
            background: rgba(232, 161, 62, 0.12);
            color: var(--gold-light);
            border: 1px solid rgba(232, 161, 62, 0.32);
        }

        /* ─── PROCEDURE CARDS (with rotateX flip-in) ─── */
        .procedure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
            gap: 28px;
            perspective: 1400px;
        }

        .procedure-card {
            position: relative;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(232, 161, 62, 0.22);
            border-radius: 20px;
            padding: 36px 28px 30px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            overflow: hidden;
            transform: perspective(1000px) rotateX(0) rotateY(0) translateY(0);
            transition: transform 0.4s ease, background 0.4s ease, border-color 0.3s ease, box-shadow 0.4s ease;
            isolation: isolate;
            will-change: transform;
        }

        .procedure-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
            z-index: 3;
        }

        .procedure-card::after {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(70, 197, 216, 0.18), transparent 70%);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 0;
        }

        .procedure-card:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(232, 161, 62, 0.55);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.45);
        }

        .procedure-card:hover::before { transform: scaleX(1); }
        .procedure-card:hover::after { transform: scale(1.8); }

        .procedure-card .icon-wrap {
            position: relative;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(232, 161, 62, 0.22), rgba(232, 161, 62, 0.06));
            border: 1px solid rgba(232, 161, 62, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-light);
            font-size: 1.5rem;
            margin-bottom: 22px;
            transition: transform 0.4s ease;
            z-index: 2;
        }

        .procedure-card .icon-wrap::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 22px;
            border: 2px solid var(--gold);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .procedure-card:hover .icon-wrap { transform: rotate(-6deg) scale(1.05); }
        .procedure-card:hover .icon-wrap::after { opacity: 0.5; inset: -10px; }

        .step-pill {
            position: absolute;
            top: 22px;
            right: 26px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold-light);
            background: rgba(232, 161, 62, 0.14);
            border: 1px solid rgba(232, 161, 62, 0.35);
            padding: 6px 12px;
            border-radius: 20px;
            z-index: 2;
        }

        .procedure-card h3 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--gold-light);
            margin-bottom: 12px;
            line-height: 1.4;
            position: relative;
            z-index: 2;
        }

        .procedure-card p {
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.94rem;
            line-height: 1.75;
            position: relative;
            z-index: 2;
        }

        /* ─── COMMITMENT BLOCK ─── */
        .commit-section {
            background:
                linear-gradient(135deg, rgba(13, 27, 42, 0.94) 0%, rgba(20, 48, 77, 0.92) 100%),
                url('images/Environmental-Concerns.jpg') center/cover no-repeat fixed;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .commit-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(46, 125, 79, 0.20), transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(232, 161, 62, 0.16), transparent 50%);
            pointer-events: none;
        }

        .commit-inner {
            position: relative;
            z-index: 1;
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
        }

        .commit-section .section-tag {
            background: rgba(46, 125, 79, 0.18);
            color: #6fc28a;
            border: 1px solid rgba(46, 125, 79, 0.4);
        }

        .commit-section h2 {
            color: #fff;
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            font-weight: 800;
            margin: 14px 0 22px;
        }

        .commit-section h2 span { color: var(--gold-light); font-style: italic; }

        .commit-section p {
            color: rgba(255, 255, 255, 0.84);
            font-size: 1.05rem;
            line-height: 1.85;
            margin-bottom: 20px;
        }

        .commit-pillars {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-top: 40px;
        }

        .commit-pillar {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(232, 161, 62, 0.25);
            border-radius: 14px;
            padding: 22px 18px;
            backdrop-filter: blur(8px);
            transition: 0.4s ease;
        }

        .commit-pillar:hover {
            background: rgba(232, 161, 62, 0.1);
            border-color: var(--gold);
            transform: translateY(-6px);
        }

        .commit-pillar i {
            font-size: 1.7rem;
            color: var(--gold-light);
            margin-bottom: 10px;
        }

        .commit-pillar .cp-title {
            color: #fff;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .commit-pillar .cp-sub {
            color: rgba(255, 255, 255, 0.62);
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        /* ─── REVEAL ─── */
        .reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible { opacity: 1; transform: none; }

        .stagger > .reveal { transition-delay: calc(var(--i, 0) * 0.07s); }

        /* RotateX flip-in for procedure cards (1–7) */
        .section-dark .procedure-card.reveal {
            transform: perspective(1400px) rotateX(-25deg) translateY(60px);
            transform-origin: 50% 100%;
            opacity: 0;
            transition:
                opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .section-dark .procedure-card.reveal.visible {
            transform: perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px);
            opacity: 1;
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal, .reveal.visible {
                transform: none !important;
                transition: none !important;
            }
        }

        @media (max-width: 768px) {
            .wm-hero { padding: 160px 18px 80px; background-attachment: scroll; }
            .section { padding: 70px 18px; }
        }
    </style>
</head>

<body>
    <!-- ─── MARINE HEADER ─── -->
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li class="mh-has-submenu">
                            <a href="javascript:void(0)" role="button" aria-haspopup="true">Our Companies <i class="fas fa-chevron-down"></i></a>
                            <ul class="mh-submenu" style="min-width: 300px;">
                                <li><a href="sspsb.php">Sachdeva Steel Products (Ship Breakers)</a></li>
                                <li><a href="jjsb.php">Jai Jagdish Ship Breakers</a></li>
                            </ul>
                        </li>
                        <li class="mh-has-submenu">
                            <a href="javascript:void(0)" role="button" aria-haspopup="true">News &amp; Media <i class="fas fa-chevron-down"></i></a>
                            <ul class="mh-submenu">
                                <li><a href="news.php">News</a></li>
                                <li><a href="gallery.php">Media</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
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

    <!-- ─── HERO ─── -->
    <section class="wm-hero">
        <span class="wm-badge">Safe · Compliant · Responsible</span>
        <h1>Waste <span>Management</span></h1>
        <p>Dismantling end-of-life vessels safely and sustainably is one of the maritime industry's biggest
            challenges. At Sachdeva Group, every kilogram of hazardous material is identified, handled, and
            disposed of with absolute care for human health and the environment.</p>
        <div class="gold-divider"></div>

        <div class="wm-hero-meta">
            <span><i class="fas fa-clipboard-list"></i> IHM Verified</span>
            <span><i class="fas fa-people-line"></i> HSE Supervised</span>
            <span><i class="fas fa-recycle"></i> Authorised Disposal</span>
        </div>
    </section>

    <!-- ─── INTRO + HAZARDOUS MATERIALS ─── -->
    <section class="section section-light">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag"><i class="fas fa-triangle-exclamation"></i> The Challenge</span>
                <h2 class="section-title">Hazardous Materials in <span>End-of-Life Vessels</span></h2>
                <div class="gold-line"></div>
                <p class="section-sub">When dismantling a vessel, on-board hazardous materials can have severe
                    negative implications for the environment and human health if mishandled.</p>
            </div>

            <div class="intro-callout reveal">
                <div class="ic-icon"><i class="fas fa-ship"></i></div>
                <div>
                    <p>Dismantling end-of-life ships in an <strong>environmentally sound and safe manner</strong>
                        is of great concern as well as being a major challenge nowadays.</p>
                    <p>When dismantling the vessel, on-board hazardous materials such as <strong>asbestos,
                            polychlorinated biphenyls (PCBs), glass fibre, solid foam and waste oil</strong> can
                        incur severe negative implications on the environment and human health.</p>
                </div>
            </div>

            <div class="hazmat-grid stagger">
                <div class="hazmat-chip reveal" style="--i:0">
                    <div class="hm-icon"><i class="fas fa-radiation"></i></div>
                    <h4>Asbestos</h4>
                    <p>Insulation &amp; lagging removal under controlled conditions.</p>
                </div>
                <div class="hazmat-chip reveal" style="--i:1">
                    <div class="hm-icon"><i class="fas fa-flask"></i></div>
                    <h4>PCBs</h4>
                    <p>Polychlorinated biphenyls in older electrical equipment.</p>
                </div>
                <div class="hazmat-chip reveal" style="--i:2">
                    <div class="hm-icon"><i class="fas fa-grip-lines"></i></div>
                    <h4>Glass Fibre</h4>
                    <p>Insulation and composite material handling.</p>
                </div>
                <div class="hazmat-chip reveal" style="--i:3">
                    <div class="hm-icon"><i class="fas fa-cloud"></i></div>
                    <h4>Solid Foam</h4>
                    <p>Polyurethane and similar insulation foams.</p>
                </div>
                <div class="hazmat-chip reveal" style="--i:4">
                    <div class="hm-icon"><i class="fas fa-oil-can"></i></div>
                    <h4>Waste Oil</h4>
                    <p>Bilge, sludge, and engine residues collected for treatment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── PROCEDURE (7 STEPS, DARK SECTION) ─── -->
    <section class="section section-dark">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag gold"><i class="fas fa-list-check"></i> Sachdeva Group Procedure</span>
                <h2 class="section-title">Procedure Followed by <span>Sachdeva Group</span></h2>
                <div class="gold-line"></div>
                <p class="section-sub">A seven-step protocol for safe handling of hazardous materials — from
                    inventory to authorised disposal, with HSE Team supervision at every stage.</p>
            </div>

            <div class="procedure-grid stagger">
                <div class="procedure-card reveal" style="--i:0">
                    <span class="step-pill">Step 01</span>
                    <div class="icon-wrap"><i class="fas fa-clipboard-list"></i></div>
                    <h3>IHM Handover</h3>
                    <p>Before purchasing the vessel, the ship owner hands over the Inventory of Hazardous
                        Materials (IHM) to the Ship Recycling Facility (SRF).</p>
                </div>

                <div class="procedure-card reveal" style="--i:1">
                    <span class="step-pill">Step 02</span>
                    <div class="icon-wrap"><i class="fas fa-tags"></i></div>
                    <h3>Identification &amp; Labelling</h3>
                    <p>Identified hazardous materials are clearly labelled and marked as early as possible
                        prior to dismantling of the vessel.</p>
                </div>

                <div class="procedure-card reveal" style="--i:2">
                    <span class="step-pill">Step 03</span>
                    <div class="icon-wrap"><i class="fas fa-file-shield"></i></div>
                    <h3>Plan-Based Handling</h3>
                    <p>Handling of hazardous material is carried out strictly according to the Ship Recycling
                        Facility Plan.</p>
                </div>

                <div class="procedure-card reveal" style="--i:3">
                    <span class="step-pill">Step 04</span>
                    <div class="icon-wrap"><i class="fas fa-user-shield"></i></div>
                    <h3>Trained Removal</h3>
                    <p>Removal of hazardous material is performed by trained personnel under the direct
                        supervision of the HSE Team.</p>
                </div>

                <div class="procedure-card reveal" style="--i:4">
                    <span class="step-pill">Step 05</span>
                    <div class="icon-wrap"><i class="fas fa-warehouse"></i></div>
                    <h3>Dedicated Storage</h3>
                    <p>Hazardous material is stored in a dedicated temporary storage area within the yard,
                        segregated by type.</p>
                </div>

                <div class="procedure-card reveal" style="--i:5">
                    <span class="step-pill">Step 06</span>
                    <div class="icon-wrap"><i class="fas fa-truck-arrow-right"></i></div>
                    <h3>Authorised Sub-Contractor</h3>
                    <p>HSE Team contacts the authorised sub-contractor to collect hazardous material from the
                        yard and issues a manifest detailing quantity and type.</p>
                </div>

                <div class="procedure-card reveal" style="--i:6">
                    <span class="step-pill">Step 07</span>
                    <div class="icon-wrap"><i class="fas fa-magnifying-glass-chart"></i></div>
                    <h3>Site Verification</h3>
                    <p>HSE Team visits the sub-contractor's site to verify the activities being carried out and
                        confirm proper treatment of the material.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── COMMITMENT BLOCK ─── -->
    <section class="section commit-section">
        <div class="commit-inner">
            <div class="reveal">
                <span class="section-tag"><i class="fas fa-leaf"></i> Our Commitment</span>
                <h2>Sustainable <span>Green Ship Recycling</span></h2>
                <p>Unsafe management and disposal of ship wastes can readily lead to adverse effects on health
                    and the environment.</p>
                <p>For sustainable green ship recycling, Sachdeva Group's first priority is the <strong
                        style="color: var(--gold-light);">safe handling of hazardous material</strong>
                    — without ever tampering with human health or the environment.</p>
            </div>

            <div class="commit-pillars stagger">
                <div class="commit-pillar reveal" style="--i:0">
                    <i class="fas fa-shield-halved"></i>
                    <div class="cp-title">Safety First</div>
                    <div class="cp-sub">Zero Compromise</div>
                </div>
                <div class="commit-pillar reveal" style="--i:1">
                    <i class="fas fa-leaf"></i>
                    <div class="cp-title">Eco Priority</div>
                    <div class="cp-sub">Protect Nature</div>
                </div>
                <div class="commit-pillar reveal" style="--i:2">
                    <i class="fas fa-people-group"></i>
                    <div class="cp-title">Human Health</div>
                    <div class="cp-sub">Workers &amp; Community</div>
                </div>
                <div class="commit-pillar reveal" style="--i:3">
                    <i class="fas fa-clipboard-check"></i>
                    <div class="cp-title">Full Compliance</div>
                    <div class="cp-sub">HKC · IHM · MoEF</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── MARINE FOOTER ─── -->
    <footer id="footer" class="marine-footer">
        <div class="footer-bubbles" id="footerBubbles"></div>

        <div class="marine-footer-inner">
            <div class="marine-footer-grid">
                <div class="ftr-col">
                    <div class="ftr-logo">
                        <img src="images/logo-white.png" alt="Sachdeva Group">
                        <div class="ftr-logo-text">
                            Sachdeva Group
                            <span>Ship Recycling · Since 1983</span>
                        </div>
                    </div>
                    <p class="ftr-about-text">
                        Leading India's ship recycling industry from Alang, Gujarat with over four decades of
                        expertise, sustainable practices, and unwavering commitment to environmental responsibility.
                    </p>
                    <div class="ftr-trust-badge">
                        <i class="fas fa-shield-halved"></i>
                        ISO Certified · HKC Compliant
                    </div>
                </div>

                <div class="ftr-col">
                    <h4>Quick Links</h4>
                    <ul class="ftr-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="sspsb.php">Sachdeva Steel Products</a></li>
                        <li><a href="jjsb.php">Jai Jagdish Ship Breakers</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="gallery.php">Media</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>

                <div class="ftr-col">
                    <h4>Our Companies</h4>
                    <ul class="ftr-companies">
                        <li>
                            <a href="sspsb.php">
                                <span class="cmp-icon"><i class="fas fa-anchor"></i></span>
                                <span class="cmp-text">
                                    Sachdeva Steel Products (Ship Breaking Unit) LLP
                                    <small>Since 1997 · 36+ Ships</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="jjsb.php">
                                <span class="cmp-icon"><i class="fas fa-sailboat"></i></span>
                                <span class="cmp-text">
                                    Jai Jagdish Ship Breakers Pvt. Ltd.
                                    <small>Since 1998 · 35+ Ships</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="ftr-col">
                    <h4>Get In Touch</h4>
                    <ul class="ftr-contact">
                        <li>
                            <span class="ci-icon"><i class="fas fa-location-dot"></i></span>
                            <div class="ci-meta">
                                <b>Address</b>
                                Alang Ship Recycling Yard,<br>Bhavnagar, Gujarat – 364 210
                            </div>
                        </li>
                        <li>
                            <span class="ci-icon"><i class="fas fa-envelope"></i></span>
                            <div class="ci-meta">
                                <b>Email</b>
                                <a href="mailto:info@sachdevagroup.in">info@sachdevagroup.in</a>
                            </div>
                        </li>
                        <li>
                            <span class="ci-icon"><i class="fas fa-phone-volume"></i></span>
                            <div class="ci-meta">
                                <b>Call Us</b>
                                <a href="tel:+919925499123">+91 99254 99123</a>
                            </div>
                        </li>
                    </ul>

                    <div class="ftr-social-row">
                        <a href="#" class="ftr-social-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="ftr-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="ftr-social-btn" title="Twitter / X"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="ftr-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/919925499123" target="_blank" class="ftr-social-btn" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="marine-footer-bottom">
            <p>© <?= date('Y') ?> Sachdeva Group. Crafted <i class="fas fa-anchor"></i> for the seas. All rights reserved.</p>
            <div class="ftr-bottom-links">
                <a href="#">Privacy Policy</a>
                <span>•</span>
                <a href="#">Terms of Service</a>
                <span>•</span>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </footer>
    <script src="js/marine-footer.js"></script>

    <button id="backToTop" class="back-to-top" aria-label="Back to top">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg>
    </button>

    <script>
        // Reveal-on-scroll
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

        // Back to top
        (function () {
            const btt = document.getElementById('backToTop');
            if (btt) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 400) btt.classList.add('show');
                    else btt.classList.remove('show');
                });
                btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
            }
        })();

        // Cursor-tracked tilt on procedure & hazmat cards
        (function () {
            const isTouch = window.matchMedia('(hover: none)').matches;
            const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (isTouch || reduced) return;

            const cards = document.querySelectorAll('.procedure-card, .hazmat-chip');
            cards.forEach((card) => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = ((y - centerY) / centerY) * -5;
                    const rotateY = ((x - centerX) / centerX) *  5;
                    card.style.transform =
                        `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-15px)`;
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                });
            });
        })();
    </script>
</body>

</html>
