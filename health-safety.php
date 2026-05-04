<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health &amp; Safety – Sachdeva Group | Safe Ship Recycling at Alang</title>
    <meta name="description"
        content="Sachdeva Group's Health &amp; Safety practices — ISO 45001, HKC compliant, PPE, training, emergency preparedness, and a strong safety culture at Alang ship recycling yard." />
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
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --navy: #0d1b2a;
            --navy-blue: #0d1b2a;
            --navy-mid: #14304d;
            --gold: #c9a84c;
            --gold-light: #e4c46e;
            --gold-accent: #d4af37;
            --bg: #f3f7fb;
            --white: #ffffff;
            --text: #2c3e50;
            --muted: #64748b;
            --safety-red: #c73d3d;
            --safety-amber: #e8a13e;
            --safety-green: #2e7d4f;
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
        .hs-hero {
            position: relative;
            padding: 220px 24px 100px;
            text-align: center;
            background-image:
                linear-gradient(135deg, rgba(13, 27, 42, 0.86) 0%, rgba(20, 48, 77, 0.78) 55%, rgba(13, 27, 42, 0.88) 100%),
                url('images/Health&Safety.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow: hidden;
            isolation: isolate;
        }

        .hs-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 22% 28%, rgba(199, 61, 61, 0.18), transparent 50%),
                radial-gradient(ellipse at 78% 72%, rgba(232, 161, 62, 0.18), transparent 50%);
            pointer-events: none;
        }

        .hs-hero > * { position: relative; z-index: 1; }

        .hs-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(232, 161, 62, 0.14);
            border: 1px solid rgba(232, 161, 62, 0.55);
            color: #ffd47a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 8px 22px;
            border-radius: 50px;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
        }

        .hs-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ffd47a;
            box-shadow: 0 0 10px #ffd47a;
        }

        .hs-hero h1 {
            font-family: 'Inter', sans-serif;
            font-size: clamp(2.2rem, 5.2vw, 4rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1.15;
            letter-spacing: -0.01em;
        }

        .hs-hero h1 span { color: var(--gold-light); }

        .hs-hero p {
            max-width: 740px;
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

        .hs-hero-meta {
            display: flex;
            gap: 28px;
            justify-content: center;
            margin-top: 36px;
            flex-wrap: wrap;
        }

        .hs-hero-meta span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.92rem;
            font-weight: 500;
        }

        .hs-hero-meta i { color: var(--gold-light); }

        /* ─── SECTION SHELL ─── */
        .section {
            padding: 100px 24px;
            position: relative;
        }

        .section-inner {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        /* ─── DARK GLASS SECTION (matches Waste Management on environment page) ─── */
        .section-dark {
            background-image:
                linear-gradient(180deg, rgba(6, 22, 37, 0.92) 0%, rgba(13, 27, 42, 0.92) 50%, rgba(20, 48, 77, 0.92) 100%),
                url('images/Health&Safety.png');
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
                radial-gradient(circle at 20% 20%, rgba(199, 61, 61, 0.18), transparent 50%),
                radial-gradient(circle at 80% 60%, rgba(232, 161, 62, 0.16), transparent 50%);
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

        .section-head {
            text-align: center;
            margin-bottom: 64px;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(199, 61, 61, 0.10);
            color: var(--safety-red);
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
            max-width: 720px;
            margin: 0 auto;
            line-height: 1.75;
        }

        /* ─── PRINCIPLE CARDS (dark glass, matches env-mgmt waste section) ─── */
        .principle-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
            gap: 28px;
        }

        .principle-card {
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

        /* Animated gold stripe across the top */
        .principle-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
            z-index: 3;
        }

        /* Cyan/teal glow blob that grows on hover */
        .principle-card::after {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(70, 197, 216, 0.18), transparent 70%);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 0;
        }

        .principle-card:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(232, 161, 62, 0.55);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.45);
        }

        .principle-card:hover::before { transform: scaleX(1); }
        .principle-card:hover::after { transform: scale(1.8); }

        .principle-card .icon-wrap {
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

        .principle-card .icon-wrap::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 22px;
            border: 2px solid var(--gold);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .principle-card:hover .icon-wrap { transform: rotate(-6deg) scale(1.05); }
        .principle-card:hover .icon-wrap::after { opacity: 0.5; inset: -10px; }

        .principle-num-pill {
            position: absolute;
            top: 22px;
            right: 26px;
            font-size: 2.2rem;
            font-weight: 900;
            color: rgba(232, 161, 62, 0.22);
            line-height: 1;
            letter-spacing: -0.02em;
            z-index: 2;
        }

        .principle-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gold-light);
            margin-bottom: 12px;
            line-height: 1.4;
            position: relative;
            z-index: 2;
        }

        .principle-card p {
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.94rem;
            line-height: 1.75;
            position: relative;
            z-index: 2;
        }

        @media (prefers-reduced-motion: reduce) {
            .principle-card { transition: none !important; transform: none !important; }
        }

        /* ─── SAFETY CULTURE FEATURED BLOCK ─── */
        .culture-section {
            background:
                linear-gradient(135deg, rgba(13, 27, 42, 0.94) 0%, rgba(20, 48, 77, 0.92) 100%),
                url('images/Health&Safety.png') center/cover no-repeat fixed;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .culture-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(199, 61, 61, 0.18), transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(232, 161, 62, 0.14), transparent 50%);
            pointer-events: none;
        }

        .culture-inner {
            position: relative;
            z-index: 1;
            max-width: 980px;
            margin: 0 auto;
            text-align: center;
        }

        .culture-section .section-tag {
            background: rgba(232, 161, 62, 0.15);
            color: var(--gold-light);
            border: 1px solid rgba(232, 161, 62, 0.35);
        }

        .culture-section h2 {
            color: #fff;
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            font-weight: 800;
            margin: 14px 0 22px;
            letter-spacing: -0.01em;
        }

        .culture-section h2 span { color: var(--gold-light); font-style: italic; }

        .culture-section p {
            color: rgba(255, 255, 255, 0.82);
            font-size: 1.05rem;
            line-height: 1.85;
            max-width: 760px;
            margin: 0 auto;
        }

        .culture-pillars {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-top: 50px;
        }

        .culture-pillar {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(232, 161, 62, 0.25);
            border-radius: 14px;
            padding: 22px 18px;
            transition: 0.4s ease;
            backdrop-filter: blur(8px);
        }

        .culture-pillar:hover {
            background: rgba(232, 161, 62, 0.1);
            border-color: var(--gold);
            transform: translateY(-6px);
        }

        .culture-pillar i {
            font-size: 1.8rem;
            color: var(--gold-light);
            margin-bottom: 10px;
        }

        .culture-pillar .cp-title {
            color: #fff;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .culture-pillar .cp-sub {
            color: rgba(255, 255, 255, 0.65);
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

        @media(max-width: 768px) {
            .hs-hero {
                padding: 160px 18px 80px;
                background-attachment: scroll;
            }

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
    <section class="hs-hero">
        <span class="hs-badge">People First · Safety Always</span>
        <h1>Health &amp; <span>Safety</span></h1>
        <p>At Sachdeva Group, the well-being of our workforce, partners, and community comes before everything else.
            Every operation runs on a foundation of rigorous safety protocols, training, and a culture where every
            voice is heard.</p>
        <div class="gold-divider"></div>

        <div class="hs-hero-meta">
            <span><i class="fas fa-shield-halved"></i> ISO 45001 Aligned</span>
            <span><i class="fas fa-helmet-safety"></i> Mandatory PPE</span>
            <span><i class="fas fa-truck-medical"></i> Emergency Ready</span>
        </div>
    </section>

    <!-- ─── 11 PRINCIPLES ─── -->
    <section class="section section-dark">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag"><i class="fas fa-helmet-safety"></i> Health &amp; Safety</span>
                <h2 class="section-title">Responsible Practices for a <span>Safer Future</span></h2>
                <div class="gold-line"></div>
                <p class="section-sub">Eleven pillars that anchor every shift, every task, and every decision at our
                    Alang ship recycling facility.</p>
            </div>

            <div class="principle-grid stagger">
                <div class="principle-card reveal" style="--i:0">
                    <div class="principle-num-pill">01</div>
                    <div class="icon-wrap"><i class="fas fa-shield-halved"></i></div>
                    <h3>Safety as a Core Value</h3>
                    <p>We prioritize the health and safety of our employees, contractors, and visitors in every
                        operation — without compromise, every day.</p>
                </div>

                <div class="principle-card reveal" style="--i:1">
                    <div class="principle-num-pill">02</div>
                    <div class="icon-wrap"><i class="fas fa-clipboard-check"></i></div>
                    <h3>Compliance with Standards</h3>
                    <p>Fully aligned with international and local safety standards, including the Hong Kong
                        International Convention (HKC) and ISO 45001.</p>
                </div>

                <div class="principle-card reveal" style="--i:2">
                    <div class="principle-num-pill">03</div>
                    <div class="icon-wrap"><i class="fas fa-magnifying-glass-chart"></i></div>
                    <h3>Risk Assessments</h3>
                    <p>Every task undergoes thorough risk evaluations to identify potential hazards and put
                        mitigation steps in place before work begins.</p>
                </div>

                <div class="principle-card reveal" style="--i:3">
                    <div class="principle-num-pill">04</div>
                    <div class="icon-wrap"><i class="fas fa-helmet-safety"></i></div>
                    <h3>PPE for All Workers</h3>
                    <p>Mandatory use of high-quality personal protective equipment — helmets, harnesses, gloves,
                        respirators, eyewear — to ensure maximum protection.</p>
                </div>

                <div class="principle-card reveal" style="--i:4">
                    <div class="principle-num-pill">05</div>
                    <div class="icon-wrap"><i class="fas fa-chalkboard-user"></i></div>
                    <h3>Regular Safety Training</h3>
                    <p>Ongoing internal and external training programs keep our workers sharp on procedures,
                        equipment, and emergency response.</p>
                </div>

                <div class="principle-card reveal" style="--i:5">
                    <div class="principle-num-pill">06</div>
                    <div class="icon-wrap"><i class="fas fa-truck-medical"></i></div>
                    <h3>Emergency Preparedness</h3>
                    <p>A well-documented and regularly practiced emergency response plan covers fire, medical,
                        chemical, and evacuation scenarios.</p>
                </div>

                <div class="principle-card reveal" style="--i:6">
                    <div class="principle-num-pill">07</div>
                    <div class="icon-wrap"><i class="fas fa-biohazard"></i></div>
                    <h3>Specialized Hazard Handling</h3>
                    <p>Strict protocols for safe identification, removal, and disposal of hazardous materials
                        — asbestos, PCBs, residual fuels, and more.</p>
                </div>

                <div class="principle-card reveal" style="--i:7">
                    <div class="principle-num-pill">08</div>
                    <div class="icon-wrap"><i class="fas fa-heart-pulse"></i></div>
                    <h3>Health Monitoring</h3>
                    <p>Periodic medical check-ups and wellness programs promote our workers' physical and mental
                        well-being throughout their careers with us.</p>
                </div>

                <div class="principle-card reveal" style="--i:8">
                    <div class="principle-num-pill">09</div>
                    <div class="icon-wrap"><i class="fas fa-bullhorn"></i></div>
                    <h3>Transparent Incident Reporting</h3>
                    <p>An open culture of reporting near-misses and accidents — every report drives prevention,
                        learning, and continuous improvement.</p>
                </div>

                <div class="principle-card reveal" style="--i:9">
                    <div class="principle-num-pill">10</div>
                    <div class="icon-wrap"><i class="fas fa-arrows-spin"></i></div>
                    <h3>Continuous Improvement</h3>
                    <p>Regular audits, monitoring, and integrated feedback ensure our safety measures evolve with
                        every lesson learned.</p>
                </div>

                <div class="principle-card reveal" style="--i:10">
                    <div class="principle-num-pill">11</div>
                    <div class="icon-wrap"><i class="fas fa-people-group"></i></div>
                    <h3>Safety Culture</h3>
                    <p>Safety is a shared value — every team member upholds it, every voice matters, and every
                        risk is addressed proactively.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── CULTURE FEATURED BLOCK ─── -->
    <section class="section culture-section">
        <div class="culture-inner">
            <div class="reveal">
                <span class="section-tag gold"><i class="fas fa-handshake-angle"></i> Our Safety Culture</span>
                <h2>Safety Is a <span>Shared Promise</span></h2>
                <p>At our company, safety is not just a requirement — it is a value every team member upholds. We
                    encourage a proactive approach to identifying and addressing potential risks, and we empower
                    every worker, supervisor, and contractor to stop work the moment something looks unsafe.</p>
            </div>

            <div class="culture-pillars stagger">
                <div class="culture-pillar reveal" style="--i:0">
                    <i class="fas fa-eye"></i>
                    <div class="cp-title">See It</div>
                    <div class="cp-sub">Spot Hazards Early</div>
                </div>
                <div class="culture-pillar reveal" style="--i:1">
                    <i class="fas fa-comment-dots"></i>
                    <div class="cp-title">Say It</div>
                    <div class="cp-sub">Speak Up Freely</div>
                </div>
                <div class="culture-pillar reveal" style="--i:2">
                    <i class="fas fa-hand-paper"></i>
                    <div class="cp-title">Stop It</div>
                    <div class="cp-sub">Stop-Work Authority</div>
                </div>
                <div class="culture-pillar reveal" style="--i:3">
                    <i class="fas fa-screwdriver-wrench"></i>
                    <div class="cp-title">Solve It</div>
                    <div class="cp-sub">Fix &amp; Document</div>
                </div>
                <div class="culture-pillar reveal" style="--i:4">
                    <i class="fas fa-chart-line"></i>
                    <div class="cp-title">Sustain It</div>
                    <div class="cp-sub">Continuous Care</div>
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

        // Gentle 3D tilt — same feel as the "Our Commitment" cards on the home page
        (function () {
            const isTouch = window.matchMedia('(hover: none)').matches;
            const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (isTouch || reduced) return;

            const cards = document.querySelectorAll('.principle-card');

            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = ((y - centerY) / centerY) * -5;
                    const rotateY = ((x - centerX) / centerX) * 5;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-15px)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                });
            });
        })();
    </script>
</body>

</html>
