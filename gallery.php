<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery – Sachdeva Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="fonts.googleapis.com/css2" rel="stylesheet">
    <link rel="stylesheet" href="agentapp_static/180193f0_40d1_70d0_7dcd_e2aaa36334c6/f39xi1f8zu/styles.css">
    <link rel="preload" as="video"
        href="https://assets.mixkit.co/videos/preview/mixkit-cargo-ship-sailing-in-the-ocean-1901-large.mp4">
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&amp;q=80">
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1568430462989-44163eb1752f?w=600&amp;q=80">
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&amp;q=80">
    <link rel="stylesheet" href="css/inline_styles.css">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --navy: #0d1b2a;
            --navy2: #132238;
            --blue: #1e4d7b;
            --gold: #c9a84c;
            --bg: #eef1f5;
            --white: #ffffff;
            --text: #334155;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ── PAGE HEADER (parallax hero) ── */
        .page-header {
            position: relative;
            padding: 180px 32px 120px;
            text-align: center;
            overflow: hidden;
            isolation: isolate;
            background-image:
                linear-gradient(135deg, rgba(13, 27, 42, 0.78) 0%, rgba(20, 48, 77, 0.62) 50%, rgba(13, 27, 42, 0.82) 100%),
                url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=1800&q=85');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 22% 28%, rgba(201, 168, 76, 0.20), transparent 55%),
                radial-gradient(ellipse at 78% 72%, rgba(46, 125, 79, 0.16), transparent 55%);
            pointer-events: none;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .page-header-content { position: relative; z-index: 1; }

        .page-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(201, 168, 76, 0.14);
            border: 1px solid rgba(201, 168, 76, 0.55);
            color: #f0b94a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 8px 22px;
            border-radius: 50px;
            margin-bottom: 22px;
            backdrop-filter: blur(8px);
        }
        .page-header-badge::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #f0b94a;
            box-shadow: 0 0 10px #f0b94a;
        }

        .page-header .gold-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), #e4c46e, var(--gold));
            margin: 22px auto 0;
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .page-header { padding: 140px 18px 90px; background-attachment: scroll; }
        }

        .page-header-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--gold);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .page-header h1 {
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.12;
            margin-bottom: 16px;
            letter-spacing: -0.01em;
        }

        .page-header h1 span { color: var(--gold); }

        .page-header p {
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.05rem;
            line-height: 1.75;
            max-width: 640px;
            margin: 0 auto;
        }

        /* ── BREADCRUMB ── */
        .breadcrumb {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 12px 32px;
        }

        .breadcrumb-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.78rem;
            color: var(--muted);
        }

        .breadcrumb-inner a {
            color: var(--blue);
            text-decoration: none
        }

        .breadcrumb-inner a:hover {
            text-decoration: underline
        }

        .breadcrumb-inner i {
            font-size: 0.6rem
        }

        /* ── MAIN ── */
        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        /* ── STATS ROW ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 48px;
        }

        @media(max-width:640px) {
            .stats-row {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        .stat-box {
            background: #fff;
            border-radius: 12px;
            padding: 24px 20px;
            text-align: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07), 0 4px 16px rgba(0, 0, 0, 0.05);
            border-bottom: 3px solid var(--gold);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.1)
        }

        .stat-box-num {
            font-size: 2rem;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-box-lbl {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--blue);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .section-heading {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .section-sub {
            font-size: 0.88rem;
            color: var(--muted);
            margin-bottom: 32px;
            line-height: 1.6;
        }

        /* ── FILTER BAR ── */
        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 32px;
        }

        .filter-btn {
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid var(--border);
            background: #fff;
            color: var(--muted);
            font-family: 'Inter', sans-serif;
            transition: all 0.2s ease;
            letter-spacing: 0.2px;
        }

        .filter-btn:hover {
            border-color: var(--navy);
            color: var(--navy);
            background: #f8fafc;
        }

        .filter-btn.active {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy);
        }

        /* ── MASONRY GALLERY GRID ── */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 200px;
            gap: 16px;
        }

        @media(max-width:900px) {
            .gallery-grid { grid-template-columns: repeat(3, 1fr); grid-auto-rows: 180px; }
        }

        @media(max-width:640px) {
            .gallery-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 160px; }
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            background: #1a3553;
            box-shadow: 0 6px 18px rgba(13, 27, 42, 0.12);
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .gallery-item.visible {
            opacity: 1;
            transform: translateY(0);
            transition:
                opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s ease;
        }

        /* Masonry size variants */
        .gallery-item.wide  { grid-column: span 2; }
        .gallery-item.tall  { grid-row: span 2; }
        .gallery-item.huge  { grid-column: span 2; grid-row: span 2; }

        @media(max-width:640px) {
            .gallery-item.huge { grid-column: span 2; grid-row: span 2; }
            .gallery-item.wide { grid-column: span 2; }
            .gallery-item.tall { grid-row: span 2; grid-column: span 1; }
        }

        .gallery-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(13, 27, 42, 0.22);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), filter 0.5s ease;
            filter: brightness(0.92) saturate(0.95);
            display: block;
        }

        .gallery-item:hover img {
            transform: scale(1.10);
            filter: brightness(1.05) saturate(1.15);
        }

        /* overlay — always visible at bottom but more pronounced on hover */
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(6, 14, 28, 0.92) 0%, rgba(13, 27, 42, 0.55) 35%, transparent 65%);
            opacity: 1;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: flex-end;
            padding: 20px;
            pointer-events: none;
        }

        .gallery-overlay-content {
            transform: translateY(6px);
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            width: 100%;
        }

        .gallery-item:hover .gallery-overlay-content { transform: translateY(0); }

        .gallery-overlay-cat {
            display: inline-block;
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 4px 10px;
            background: rgba(201, 168, 76, 0.18);
            border: 1px solid rgba(201, 168, 76, 0.45);
            border-radius: 50px;
            margin-bottom: 10px;
            backdrop-filter: blur(4px);
        }

        .gallery-overlay-title {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.3;
            letter-spacing: -0.01em;
        }

        /* expand icon — visible on hover */
        .gallery-expand {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #e4c46e);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-size: 0.85rem;
            opacity: 0;
            transform: scale(0.6) rotate(-30deg);
            transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            z-index: 2;
        }

        .gallery-item:hover .gallery-expand {
            opacity: 1;
            transform: scale(1) rotate(0);
        }

        /* Gold accent ring on hover */
        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 16px;
            border: 2px solid transparent;
            transition: border-color 0.4s ease;
            pointer-events: none;
            z-index: 1;
        }

        .gallery-item:hover::after { border-color: rgba(201, 168, 76, 0.55); }

        /* featured / wide items */
        .gallery-item.wide {
            grid-column: span 2;
        }

        .gallery-item.tall {
            grid-row: span 2;
        }

        /* ─── STATS STRIP ─── */
        .stats-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.14);
            margin-bottom: 32px;
        }

        @media(max-width:640px) {
            .stats-strip {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .stat-item {
            padding: 28px 20px;
            text-align: center;
            border-right: 1px solid #f0eeff;
            position: relative;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-item::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--purple);
            transition: width 0.4s ease;
        }

        .stat-item:hover::before {
            width: 60%;
        }

        .stat-num {
            font-size: 2rem;
            font-weight: 900;
            font-family: 'Playfair Display', serif;
            color: var(--purple);
        }

        .stat-lbl {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--muted);
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── LIGHTBOX ── */
        .lb {
            position: fixed;
            inset: 0;
            background: rgba(5, 10, 20, 0.92);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            cursor: zoom-out;
        }

        .lb.open {
            display: flex;
            animation: fadeIn 0.25s ease
        }

        .lb-inner {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            max-width: 820px;
            width: 100%;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            cursor: default;
            position: relative;
            animation: slideUp 0.28s ease;
        }

        .lb-img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            display: block
        }

        .lb-cap {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border);
        }

        .lb-cap h3 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--navy)
        }

        .lb-cap span {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .lb-close {
            position: absolute;
            top: 12px;
            right: 14px;
            background: rgba(13, 27, 42, 0.65);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            cursor: pointer;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.25s ease, transform 0.25s ease;
            z-index: 5;
        }

        .lb-close:hover {
            background: var(--gold);
            color: var(--navy);
            transform: rotate(90deg) scale(1.05);
        }

        /* Prev / Next nav arrows */
        .lb-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(13, 27, 42, 0.78);
            color: #fff;
            border: 1.5px solid rgba(201, 168, 76, 0.45);
            cursor: pointer;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.25s ease, transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), border-color 0.25s ease;
            z-index: 4;
            backdrop-filter: blur(6px);
        }

        .lb-prev { left: -68px; }
        .lb-next { right: -68px; }

        .lb-nav:hover {
            background: var(--gold);
            color: var(--navy);
            border-color: var(--gold-light);
            transform: translateY(-50%) scale(1.10);
        }

        .lb-prev:hover { transform: translateY(-50%) translateX(-3px) scale(1.10); }
        .lb-next:hover { transform: translateY(-50%) translateX(3px) scale(1.10); }

        /* Counter pill (e.g. 3 / 22) */
        .lb-counter {
            position: absolute;
            top: 14px;
            left: 16px;
            background: rgba(13, 27, 42, 0.78);
            color: var(--gold-light);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 8px 14px;
            border-radius: 50px;
            z-index: 5;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(201, 168, 76, 0.4);
        }

        .lb-counter .lb-cur { color: #fff; }

        /* On smaller viewports, dock arrows inside the modal */
        @media (max-width: 920px) {
            .lb-prev { left: 10px; }
            .lb-next { right: 10px; }
            .lb-nav {
                width: 44px;
                height: 44px;
                background: rgba(13, 27, 42, 0.85);
            }
        }

        /* Image fade between slides */
        .lb-img.swap {
            animation: lb-fade 0.35s ease;
        }

        @keyframes lb-fade {
            from { opacity: 0; transform: scale(0.97); }
            to   { opacity: 1; transform: scale(1); }
        }



        /* ── BACK TO TOP ── */
        .back-top {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--gold);
            color: var(--navy);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(201, 168, 76, 0.5);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            z-index: 100;
        }

        .back-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(201, 168, 76, 0.6)
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(24px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0)
        }

        @media(max-width:768px) {
            .nav-links {
                display: none
            }

            .main {
                padding: 32px 16px 60px
            }
        }
    </style>
    <link rel="stylesheet" href="css/marine-footer.css">
    <link rel="stylesheet" href="css/marine-header.css">
</head>

<body>

    <!-- ── NAV ── -->
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
                            <a href="javascript:void(0)" class="active" role="button" aria-haspopup="true">News &amp; Media <i class="fas fa-chevron-down"></i></a>
                            <ul class="mh-submenu">
                                <li><a href="news.php">News</a></li>
                                <li><a href="gallery.php" class="active">Media</a></li>
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

    <!-- ── PAGE HEADER (parallax hero) ── -->
    <section class="page-header">
        <div class="page-header-content">
            <span class="page-header-badge">Visual Journey</span>
            <h1>Inside Our <span>Alang Yard</span></h1>
            <p>A visual journey through our ship recycling operations, safety practices, environmental compliance,
                and the daily life inside India's largest ship-breaking destination.</p>
            <div class="gold-divider"></div>
        </div>
    </section>


    <!-- ── MAIN ── -->
    <main class="main">

        <!-- Stats -->
        <div class="stats-row reveal">
            <div class="stat-box">
                <div class="stat-box-num">500+</div>
                <div class="stat-box-lbl">Photos</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-num">73</div>
                <div class="stat-box-lbl">Ships Recycled</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-num">40+</div>
                <div class="stat-box-lbl">Years of Operations</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-num">6</div>
                <div class="stat-box-lbl">Certifications</div>
            </div>
        </div>

        <!-- Gallery Section -->


        <!-- Filters -->
        <div class="filter-bar reveal">
            <button class="filter-btn active" data-filter="all">All Photos</button>
            <button class="filter-btn" data-filter="operations">Operations</button>
            <button class="filter-btn" data-filter="ships">Ships &amp; Vessels</button>
            <button class="filter-btn" data-filter="facility">Facility</button>
            <button class="filter-btn" data-filter="safety">Safety</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">

            <!-- Local Alang Yard Photos (1.jpg–6.jpg) -->
            <div class="gallery-item huge" data-cat="operations" onclick="openLb(this)">
                <img src="images/gallery/1.jpg" alt="Alang Ship Recycling Yard">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Alang Ship Recycling Yard</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item tall" data-cat="ships" onclick="openLb(this)">
                <img src="images/gallery/2.jpg" alt="Beached vessel at Alang">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Ships</span>
                        <div class="gallery-overlay-title">Beached End-of-Life Vessel</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="facility" onclick="openLb(this)">
                <img src="images/gallery/3.jpg" alt="Yard layout at Alang">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Facility</span>
                        <div class="gallery-overlay-title">Yard Plot Layout</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="operations" onclick="openLb(this)">
                <img src="images/gallery/4.jpg" alt="Ship dismantling">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Ship Dismantling in Progress</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="operations" onclick="openLb(this)">
                <img src="images/gallery/5.jpg" alt="Steel recovery">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Steel Plate Recovery</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item wide" data-cat="facility" onclick="openLb(this)">
                <img src="images/gallery/6.jpg" alt="Alang yard facility">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Facility</span>
                        <div class="gallery-overlay-title">Yard Operations View</div>
                    </div>
                </div>
            </div>

            <!-- Curated Alang-style maritime photos -->
            <div class="gallery-item tall" data-cat="ships" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1494412651409-8963ce7935a7?w=700&q=80" alt="Cargo vessel at port">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Ships</span>
                        <div class="gallery-overlay-title">End-of-Life Cargo Vessel</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="ships" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1568430462989-44163eb1752f?w=600&q=80" alt="Bulk carrier">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Ships</span>
                        <div class="gallery-overlay-title">Incoming Bulk Carrier</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="ships" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1517414204297-9d527e1ddccd?w=600&q=80" alt="Container ship">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Ships</span>
                        <div class="gallery-overlay-title">Container Vessel Beaching</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item huge" data-cat="facility" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1577563908411-5077b6dc7624?w=1100&q=80" alt="Heavy lift cranes">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Facility</span>
                        <div class="gallery-overlay-title">Heavy Lift Cranes &amp; Yard Infrastructure</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="operations" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1565895405127-481853366cf8?w=600&q=80" alt="Steel scrap recovery">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Steel &amp; Scrap Recovery</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="operations" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1494412685616-a5d310fbb07d?w=600&q=80" alt="Steel processing">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Steel Processing Unit</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="operations" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&q=80" alt="Cutting operation">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Operations</span>
                        <div class="gallery-overlay-title">Cutting &amp; Welding</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="safety" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=600&q=80" alt="HSE worker with PPE">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Safety</span>
                        <div class="gallery-overlay-title">Trained HSE Worker</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="safety" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80" alt="Workforce safety">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Safety</span>
                        <div class="gallery-overlay-title">Workforce Safety Gear</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="safety" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?w=600&q=80" alt="Safety inspection">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Safety</span>
                        <div class="gallery-overlay-title">HSE Inspection Round</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item wide" data-cat="ships" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1520939817895-060bdaf4fe1b?w=900&q=80" alt="Tanker awaiting recycling">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Ships</span>
                        <div class="gallery-overlay-title">Tanker Awaiting Recycling</div>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-cat="facility" onclick="openLb(this)">
                <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?w=600&q=80" alt="Aerial yard view">
                <div class="gallery-expand"><i class="fas fa-expand-alt"></i></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <span class="gallery-overlay-cat">Facility</span>
                        <div class="gallery-overlay-title">Aerial Yard View</div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- ── LIGHTBOX ── -->
    <div class="lb" id="lb" onclick="if(event.target===this)closeLb()">
        <div class="lb-inner">
            <div class="lb-counter" id="lbCounter"><span class="lb-cur" id="lbCur">1</span> <span style="opacity:0.6;">/</span> <span id="lbTot">22</span></div>
            <button class="lb-close" onclick="closeLb()" aria-label="Close"><i class="fas fa-times"></i></button>
            <button class="lb-nav lb-prev" onclick="lbPrev()" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
            <button class="lb-nav lb-next" onclick="lbNext()" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
            <img class="lb-img" id="lbImg" src="" alt="">
            <div class="lb-cap">
                <h3 id="lbTitle"></h3>
                <span id="lbCat"></span>
            </div>
        </div>
    </div>



    <!-- Back to Top -->
    <button class="back-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Reveal on scroll for non-gallery elements
        const ro = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('visible'); ro.unobserve(e.target); }
        }), { threshold: 0.08 });
        document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

        // Stagger reveal for gallery items
        (function () {
            const items = document.querySelectorAll('.gallery-item');
            const io = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        const idx = Array.from(items).indexOf(e.target);
                        const visibleSoFar = Array.from(items).slice(0, idx)
                            .filter(it => it.classList.contains('visible')).length;
                        e.target.style.transitionDelay = ((idx % 8) * 0.07) + 's';
                        e.target.classList.add('visible');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.05 });
            items.forEach(el => io.observe(el));
        })();

        // Filter — animated hide/show
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const f = btn.dataset.filter;
                document.querySelectorAll('.gallery-item').forEach((card, i) => {
                    const show = f === 'all' || card.dataset.cat === f;
                    if (show) {
                        card.style.display = '';
                        // re-trigger reveal
                        card.classList.remove('visible');
                        card.style.transitionDelay = ((i % 8) * 0.05) + 's';
                        // tiny timeout so transition fires
                        requestAnimationFrame(() => requestAnimationFrame(() => {
                            card.classList.add('visible');
                        }));
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Lightbox with prev/next navigation
        let scrollPosition = 0;
        let lbList = [];      // currently visible cards
        let lbIndex = 0;      // index within lbList

        function getVisibleCards() {
            return Array.from(document.querySelectorAll('.gallery-item'))
                .filter(c => c.style.display !== 'none');
        }

        function paintLb() {
            const card = lbList[lbIndex];
            if (!card) return;
            const img = card.querySelector('img');
            const title = card.querySelector('.gallery-overlay-title')?.textContent || card.dataset.cat || '';
            const cat = card.querySelector('.gallery-overlay-cat')?.textContent || card.dataset.cat || '';
            const src = img.dataset.large || img.src;

            const lbImg = document.getElementById('lbImg');
            lbImg.src = src;
            // Fade animation between slides
            lbImg.classList.remove('swap');
            void lbImg.offsetWidth; // reflow
            lbImg.classList.add('swap');

            document.getElementById('lbTitle').textContent = title;
            document.getElementById('lbCat').textContent = cat;
            document.getElementById('lbCur').textContent = (lbIndex + 1);
            document.getElementById('lbTot').textContent = lbList.length;
        }

        function openLb(card) {
            lbList = getVisibleCards();
            lbIndex = lbList.indexOf(card);
            if (lbIndex < 0) lbIndex = 0;

            paintLb();
            document.getElementById('lb').classList.add('open');

            scrollPosition = window.scrollY;
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.top = `-${scrollPosition}px`;
            document.body.style.width = '100%';
        }

        function closeLb() {
            const lb = document.getElementById('lb');
            lb.classList.remove('open');
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.width = '';
            window.scrollTo(0, scrollPosition);
        }

        function lbPrev() {
            if (!lbList.length) return;
            lbIndex = (lbIndex - 1 + lbList.length) % lbList.length;
            paintLb();
        }

        function lbNext() {
            if (!lbList.length) return;
            lbIndex = (lbIndex + 1) % lbList.length;
            paintLb();
        }

        // Keyboard: Esc closes, ← / → navigate
        document.addEventListener('keydown', (e) => {
            const lbOpen = document.getElementById('lb').classList.contains('open');
            if (e.key === 'Escape') { closeLb(); return; }
            if (!lbOpen) return;
            if (e.key === 'ArrowLeft')  lbPrev();
            if (e.key === 'ArrowRight') lbNext();
        });

        // Swipe on touch devices
        (function () {
            const lb = document.getElementById('lb');
            let startX = null;
            lb.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
            lb.addEventListener('touchend', (e) => {
                if (startX == null) return;
                const dx = e.changedTouches[0].clientX - startX;
                if (Math.abs(dx) > 50) {
                    if (dx > 0) lbPrev(); else lbNext();
                }
                startX = null;
            }, { passive: true });
        })();
    </script>

    <!-- ─── MARINE ANIMATED FOOTER ─── -->
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
                        Leading India's ship recycling industry from Alang, Gujarat with over four decades of expertise,
                        sustainable practices, and unwavering commitment to environmental responsibility.
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
</body>

</html>