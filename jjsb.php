<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jai Jagdish Ship Breakers Pvt. Ltd. – Sachdeva Group</title>
    <meta name="description"
        content="Jai Jagdish Ship Breakers Pvt. Ltd. — recycling vessels at Plot 66, Alang Yard since 1998. 35+ ships recycled across bulk, tanker, container, RO-RO &amp; LPG categories under HKC and ISO standards." />
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
        .ssp-hero {
            position: relative;
            padding: 220px 24px 110px;
            text-align: center;
            background-image:
                linear-gradient(135deg, rgba(13, 27, 42, 0.86) 0%, rgba(20, 48, 77, 0.78) 55%, rgba(13, 27, 42, 0.88) 100%),
                url('images/banner/about.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow: hidden;
            isolation: isolate;
        }

        .ssp-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 78% 28%, rgba(232, 161, 62, 0.20), transparent 50%),
                radial-gradient(ellipse at 22% 72%, rgba(46, 125, 79, 0.16), transparent 50%);
            pointer-events: none;
        }

        .ssp-hero > * { position: relative; z-index: 1; }

        .ssp-badge {
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

        .ssp-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold-bright);
            box-shadow: 0 0 10px var(--gold-bright);
        }

        .ssp-hero h1 {
            font-size: clamp(1.8rem, 4.2vw, 3.2rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1.18;
            letter-spacing: -0.01em;
            max-width: 920px;
            margin: 0 auto;
        }

        /* Index-style two-line heading: white top + gold gradient highlight */
        .ssp-hero h1 .title-line {
            display: block;
            color: #ffffff;
        }
        .ssp-hero h1 .title-line.highlight-gradient {
            background: linear-gradient(135deg, var(--gold), var(--gold-light), #ffd700);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        .ssp-hero p {
            max-width: 780px;
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

        .ssp-hero-meta {
            display: flex;
            gap: 26px;
            justify-content: center;
            margin-top: 36px;
            flex-wrap: wrap;
        }

        .ssp-hero-meta span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.92rem;
            font-weight: 500;
        }

        .ssp-hero-meta i { color: var(--gold-light); }

        /* ─── STATS BAR ─── */
        .stats-bar {
            position: relative;
            margin: -70px auto 0;
            z-index: 10;
            max-width: 1180px;
            padding: 0 24px;
        }

        .stats-inner {
            background: linear-gradient(135deg, #ffffff 0%, #f8fbff 100%);
            border-radius: 22px;
            padding: 32px 26px;
            box-shadow: 0 24px 60px rgba(13, 27, 42, 0.18);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            position: relative;
            overflow: hidden;
        }

        .stats-inner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--eco-green), var(--gold), var(--gold-light), var(--gold));
            background-size: 200% auto;
            animation: stripe-shift 5s linear infinite;
        }

        @keyframes stripe-shift {
            0% { background-position: 0% 0; }
            100% { background-position: 200% 0; }
        }

        .stat-cell {
            text-align: center;
            position: relative;
            padding: 6px 8px;
        }

        .stat-cell:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -9px;
            top: 18%;
            bottom: 18%;
            width: 1px;
            background: linear-gradient(180deg, transparent, #e2e8f0, transparent);
        }

        .stat-icon-wrap {
            width: 50px;
            height: 50px;
            margin: 0 auto 12px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(201, 168, 76, 0.15), rgba(46, 125, 79, 0.12));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.3rem;
        }

        .stat-num {
            font-family: 'Inter', sans-serif;
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
            letter-spacing: -0.01em;
        }

        .stat-num small { font-size: 0.7em; color: var(--gold); }

        .stat-label {
            font-size: 0.76rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 6px;
        }

        @media (max-width: 720px) {
            .stats-inner { grid-template-columns: repeat(2, 1fr); padding: 24px 18px; }
            .stat-cell:nth-child(2)::after { display: none; }
        }

        /* ─── SECTION ─── */
        .section { padding: 100px 24px; position: relative; }
        .section-inner { max-width: 1200px; margin: 0 auto; position: relative; }

        .section-light { background: linear-gradient(180deg, #ffffff 0%, #f3f7fb 100%); }
        .section-head { text-align: center; margin-bottom: 56px; }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(46, 125, 79, 0.10);
            color: var(--eco-green);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 8px 20px;
            border-radius: 50px;
            margin-bottom: 16px;
        }

        .section-tag.gold { background: rgba(201, 168, 76, 0.12); color: var(--gold); }

        .section-title {
            font-size: clamp(1.7rem, 3vw, 2.4rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .section-title span { color: var(--gold); }

        .gold-line {
            display: inline-block;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            margin: 8px 0 22px;
            border-radius: 2px;
        }

        .section-sub {
            color: var(--muted);
            font-size: 1.02rem;
            max-width: 780px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* ─── COMPANY INTRO + YARD DETAILS ─── */
        .intro-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 40px;
            align-items: stretch;
        }

        @media (max-width: 900px) { .intro-grid { grid-template-columns: 1fr; } }

        .intro-text {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(13, 27, 42, 0.05);
            box-shadow: 0 10px 30px rgba(13, 27, 42, 0.06);
            border-left: 5px solid var(--gold);
        }

        .intro-text h3 {
            color: var(--navy);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .intro-text p {
            color: var(--text);
            font-size: 0.98rem;
            line-height: 1.85;
            margin-bottom: 12px;
        }

        .intro-text strong { color: var(--navy); }

        .yard-card {
            background: linear-gradient(135deg, rgba(13, 27, 42, 0.97) 0%, rgba(20, 48, 77, 0.96) 100%);
            color: #fff;
            padding: 38px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(13, 27, 42, 0.18);
        }

        .yard-card::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232, 161, 62, 0.22), transparent 70%);
        }

        .yard-card h3 {
            color: var(--gold-light);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .yard-card .yc-sub {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.78rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 22px;
            position: relative;
            z-index: 1;
        }

        .yc-list {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .yc-list li {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(232, 161, 62, 0.18);
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .yc-list li:hover {
            background: rgba(232, 161, 62, 0.10);
            border-color: rgba(232, 161, 62, 0.45);
            transform: translateX(4px);
        }

        .yc-list .yc-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(232, 161, 62, 0.22), rgba(232, 161, 62, 0.06));
            border: 1px solid rgba(232, 161, 62, 0.4);
            color: var(--gold-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .yc-list li:hover .yc-icon {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--navy);
            transform: rotate(-8deg) scale(1.05);
        }

        .yc-list .yc-meta {
            font-size: 0.9rem;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.85);
        }

        .yc-list .yc-meta b {
            display: block;
            color: var(--gold-light);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .yc-list .yc-meta a { color: rgba(255, 255, 255, 0.85); text-decoration: none; transition: color 0.3s; }
        .yc-list .yc-meta a:hover { color: var(--gold-light); }

        /* ─── SHIPS TABLE ─── */
        .ships-controls {
            display: flex;
            gap: 14px;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
            max-width: 360px;
        }

        .search-wrap i {
            position: absolute;
            left: 16px; top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 0.9rem;
        }

        .search-wrap input {
            width: 100%;
            padding: 12px 16px 12px 42px;
            border-radius: 50px;
            border: 1px solid rgba(13, 27, 42, 0.12);
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            color: var(--navy);
            background: var(--white);
            outline: none;
            transition: 0.3s;
        }

        .search-wrap input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.12);
        }

        .ships-count { color: var(--muted); font-size: 0.88rem; font-weight: 600; }
        .ships-count strong { color: var(--navy); font-size: 1.05rem; }

        .ships-table-wrap {
            background: var(--white);
            border-radius: 18px;
            box-shadow: 0 12px 36px rgba(13, 27, 42, 0.08);
            overflow: hidden;
            border: 1px solid rgba(13, 27, 42, 0.05);
            position: relative;
        }

        .ships-table-scroll { overflow-x: auto; }

        .ships-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        .ships-table thead th {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            color: var(--gold-light);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-align: left;
            padding: 18px 20px;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        .ships-table thead th:first-child { padding-left: 28px; }
        .ships-table thead th:last-child { padding-right: 28px; text-align: right; }
        .ships-table thead th.col-ldt { text-align: right; }

        .ships-table tbody tr {
            border-bottom: 1px solid rgba(13, 27, 42, 0.06);
        }

        .ships-table tbody tr:nth-child(even) { background: rgba(243, 247, 251, 0.55); }

        .ships-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(201, 168, 76, 0.10), rgba(201, 168, 76, 0.02));
        }

        .ships-table tbody tr:hover .sr-num {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--navy);
            transform: rotate(-6deg) scale(1.05);
        }

        .ships-table tbody td {
            padding: 14px 20px;
            font-size: 0.9rem;
            color: var(--text);
            vertical-align: middle;
        }

        .ships-table tbody td:first-child { padding-left: 28px; }
        .ships-table tbody td:last-child { padding-right: 28px; text-align: right; }
        .ships-table tbody td.col-ldt {
            text-align: right;
            font-variant-numeric: tabular-nums;
            font-weight: 600;
            color: var(--navy);
        }

        .ships-table tbody td.col-name {
            font-weight: 600;
            color: var(--navy);
        }

        .sr-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: rgba(13, 27, 42, 0.06);
            color: var(--navy);
            font-weight: 700;
            font-size: 0.82rem;
            transition: 0.3s ease;
        }

        .type-pill {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.74rem;
            font-weight: 600;
            background: rgba(46, 125, 79, 0.10);
            color: var(--eco-green);
            border: 1px solid rgba(46, 125, 79, 0.2);
        }

        .year-pill {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--gold);
            background: rgba(201, 168, 76, 0.12);
            border: 1px solid rgba(201, 168, 76, 0.32);
        }

        .ships-empty {
            display: none;
            padding: 60px 24px;
            text-align: center;
            color: var(--muted);
        }

        .ships-empty.show { display: block; }
        .ships-empty i { font-size: 2rem; color: var(--gold); margin-bottom: 12px; }

        /* ─── INSIGHTS ─── */
        .insights-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-top: 30px;
        }

        @media (max-width: 820px) { .insights-grid { grid-template-columns: 1fr; } }

        .insight-card {
            background: linear-gradient(135deg, rgba(13, 27, 42, 0.97) 0%, rgba(20, 48, 77, 0.94) 100%);
            color: #fff;
            border-radius: 22px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 18px 44px rgba(13, 27, 42, 0.16);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .insight-card::before {
            content: '';
            position: absolute;
            top: -120px; right: -120px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232, 161, 62, 0.22), transparent 70%);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .insight-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 28px 56px rgba(13, 27, 42, 0.28);
        }

        .insight-card:hover::before { transform: scale(1.4); }

        .insight-icon {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(232, 161, 62, 0.24), rgba(232, 161, 62, 0.06));
            border: 1px solid rgba(232, 161, 62, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-light);
            font-size: 1.6rem;
            margin-bottom: 22px;
            position: relative;
            z-index: 1;
        }

        .insight-card h3 {
            color: var(--gold-light);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .insight-card p {
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.95rem;
            line-height: 1.75;
            position: relative;
            z-index: 1;
        }

        .yard-svg {
            width: 100%;
            height: 200px;
            margin-top: 22px;
            position: relative;
            z-index: 1;
        }

        /* ─── ISO CERTS ─── */
        .iso-band {
            background:
                linear-gradient(135deg, rgba(13, 27, 42, 0.95) 0%, rgba(20, 48, 77, 0.92) 60%, rgba(13, 27, 42, 0.95) 100%);
            color: #fff;
            padding: 70px 24px;
            position: relative;
            overflow: hidden;
        }

        .iso-band::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 30% 50%, rgba(46, 125, 79, 0.2), transparent 50%),
                radial-gradient(circle at 70% 50%, rgba(232, 161, 62, 0.18), transparent 50%);
        }

        .iso-inner {
            max-width: 1180px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .iso-inner > p.lead {
            color: rgba(255, 255, 255, 0.6);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 28px;
        }

        .iso-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
        }

        .iso-chip {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(232, 161, 62, 0.32);
            border-radius: 16px;
            padding: 24px 18px;
            backdrop-filter: blur(8px);
        }

        .iso-chip:hover {
            transform: translateY(-6px);
            background: rgba(232, 161, 62, 0.10);
            border-color: var(--gold);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.3);
        }

        .iso-chip i { font-size: 1.8rem; color: var(--gold-light); margin-bottom: 10px; }
        .iso-chip .it { color: #fff; font-weight: 700; font-size: 0.95rem; margin-bottom: 4px; }
        .iso-chip .is { color: rgba(255, 255, 255, 0.6); font-size: 0.74rem; text-transform: uppercase; letter-spacing: 1.5px; }

        /* ─── REVEAL SYSTEM (matches sspsb.html) ─── */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible { opacity: 1; transform: none; }
        .stagger > .reveal { transition-delay: calc(var(--i, 0) * 0.08s); }

        .reveal.slide-left  { transform: translateX(-50px) translateY(20px); }
        .reveal.slide-left.visible  { transform: none; }

        .reveal.slide-right { transform: translateX(50px) translateY(20px); }
        .reveal.slide-right.visible { transform: none; }

        .reveal.scale-up { transform: scale(0.92) translateY(30px); }
        .reveal.scale-up.visible { transform: scale(1) translateY(0); }

        .reveal.flip-x {
            transform: perspective(1400px) rotateX(-25deg) translateY(50px);
            transform-origin: 50% 100%;
            transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.flip-x.visible {
            transform: perspective(1000px) rotateX(0) rotateY(0) translateY(0);
        }

        /* Yard list items sequential */
        .yc-list li {
            opacity: 0;
            transform: translateX(-24px);
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        background 0.3s ease,
                        border-color 0.3s ease;
        }
        .yard-card.visible .yc-list li,
        .reveal.visible .yc-list li {
            opacity: 1;
            transform: translateX(0);
        }
        .yard-card.visible .yc-list li:nth-child(1),
        .reveal.visible .yc-list li:nth-child(1) { transition-delay: 0.20s; }
        .yard-card.visible .yc-list li:nth-child(2),
        .reveal.visible .yc-list li:nth-child(2) { transition-delay: 0.32s; }
        .yard-card.visible .yc-list li:nth-child(3),
        .reveal.visible .yc-list li:nth-child(3) { transition-delay: 0.44s; }

        /* Hero word reveal */
        .ssp-hero h1 .word {
            display: inline-block;
            opacity: 0;
            transform: translateY(40px) rotateX(-30deg);
            animation: word-up 0.85s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes word-up {
            to { opacity: 1; transform: translateY(0) rotateX(0); }
        }

        .ssp-hero .ssp-badge {
            opacity: 0;
            animation: fade-down 0.7s ease 0.1s forwards;
        }

        .ssp-hero p,
        .ssp-hero .gold-divider,
        .ssp-hero .ssp-hero-meta {
            opacity: 0;
            animation: fade-down 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .ssp-hero p { animation-delay: 0.55s; }
        .ssp-hero .gold-divider { animation-delay: 0.7s; }
        .ssp-hero .ssp-hero-meta { animation-delay: 0.85s; }

        @keyframes fade-down {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Stats stagger */
        .stat-cell {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .stats-bar.visible .stat-cell { opacity: 1; transform: translateY(0); }
        .stats-bar.visible .stat-cell:nth-child(1) { transition-delay: 0.10s; }
        .stats-bar.visible .stat-cell:nth-child(2) { transition-delay: 0.22s; }
        .stats-bar.visible .stat-cell:nth-child(3) { transition-delay: 0.34s; }
        .stats-bar.visible .stat-cell:nth-child(4) { transition-delay: 0.46s; }

        /* Table cascade */
        .ships-table tbody tr {
            opacity: 0;
            transform: translateX(-18px);
            transition: opacity 0.5s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.5s cubic-bezier(0.16, 1, 0.3, 1),
                        background 0.25s ease;
        }
        .ships-table.cascade tbody tr { opacity: 1; transform: translateX(0); }

        /* ISO bounce */
        .iso-chip {
            opacity: 0;
            transform: scale(0.6) translateY(20px);
            transition: opacity 0.7s ease,
                        transform 0.7s cubic-bezier(0.34, 1.65, 0.64, 1),
                        background 0.4s ease,
                        border-color 0.4s ease,
                        box-shadow 0.4s ease;
        }
        .iso-grid.visible .iso-chip { opacity: 1; transform: scale(1) translateY(0); }
        .iso-grid.visible .iso-chip:nth-child(1) { transition-delay: 0.05s; }
        .iso-grid.visible .iso-chip:nth-child(2) { transition-delay: 0.15s; }
        .iso-grid.visible .iso-chip:nth-child(3) { transition-delay: 0.25s; }
        .iso-grid.visible .iso-chip:nth-child(4) { transition-delay: 0.35s; }

        @media (prefers-reduced-motion: reduce) {
            .reveal, .reveal.visible,
            .ssp-hero h1 .word, .ssp-hero .ssp-badge, .ssp-hero p,
            .ssp-hero .gold-divider, .ssp-hero .ssp-hero-meta,
            .stat-cell, .ships-table tbody tr, .iso-chip, .yc-list li {
                transform: none !important;
                opacity: 1 !important;
                animation: none !important;
                transition: none !important;
            }
        }

        @media (max-width: 768px) {
            .ssp-hero { padding: 160px 18px 80px; background-attachment: scroll; }
            .section { padding: 70px 18px; }
            .stats-bar { margin-top: -50px; }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/includes/menu.php'; ?>

    <!-- ─── HERO ─── -->
    <section class="ssp-hero">
        <span class="ssp-badge">Established 1998 · 35+ Ships Recycled</span>
        <h1 id="heroTitle">
            <span class="title-line">Jai Jagdish Ship Breakers</span>
            <span class="title-line highlight-gradient">Pvt. Ltd.</span>
        </h1>
        <p>The second flagship unit of Sachdeva Group, recycling diverse vessel categories at Plot 66, Alang Ship
            Breaking Yard since 1998 — with strict HKC compliance and modern HSE infrastructure.</p>
        <div class="gold-divider"></div>

        <div class="ssp-hero-meta">
            <span><i class="fas fa-location-dot"></i> Plot 66, Alang</span>
            <span><i class="fas fa-shield-halved"></i> HKC Compliant</span>
            <span><i class="fas fa-award"></i> ISO Certified</span>
        </div>
    </section>

    <!-- ─── STATS BAR ─── -->
    <div class="stats-bar reveal">
        <div class="stats-inner">
            <div class="stat-cell">
                <div class="stat-icon-wrap"><i class="fas fa-ship"></i></div>
                <div class="stat-num" data-count="35">0<small>+</small></div>
                <div class="stat-label">Ships Recycled</div>
            </div>
            <div class="stat-cell">
                <div class="stat-icon-wrap"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-num" data-count="1998">0</div>
                <div class="stat-label">Established</div>
            </div>
            <div class="stat-cell">
                <div class="stat-icon-wrap"><i class="fas fa-weight-hanging"></i></div>
                <div class="stat-num" data-count="377">0<small>K+ MT</small></div>
                <div class="stat-label">Total LDT Recycled</div>
            </div>
            <div class="stat-cell">
                <div class="stat-icon-wrap"><i class="fas fa-certificate"></i></div>
                <div class="stat-num" data-count="4">0</div>
                <div class="stat-label">ISO Certifications</div>
            </div>
        </div>
    </div>

    <!-- ─── COMPANY INTRO + YARD DETAILS ─── -->
    <section class="section section-light">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag"><i class="fas fa-building"></i> About the Company</span>
                <h2 class="section-title">Our <span>Company</span></h2>
                <div class="gold-line"></div>
            </div>

            <div class="intro-grid">
                <div class="intro-text reveal slide-left">
                    <h3>Jai Jagdish Ship Breakers Pvt. Ltd.</h3>
                    <p>Sachdeva Steel Products (Ship Breaking Unit) and Jai Jagdish Ship Breakers Pvt. Ltd. is
                        involved in the business since ship breaking activity started at <strong>Alang in
                            1983</strong>.</p>
                    <p>We established this unit in the year <strong>1998</strong> under the name of <strong>Jai
                            Jagdish Ship Breakers Pvt. Ltd.</strong> and till date <strong>35 ships have been
                            Recycled</strong> across diverse categories including bulk carriers, tankers,
                        container vessels, RO-RO ships, LPG carriers, drilling rigs and reefers.</p>
                    <p>Every dismantling operation is carried out under strict HSE supervision and full
                        compliance with the Hong Kong International Convention.</p>
                </div>

                <div class="yard-card reveal slide-right">
                    <h3>Yard Details</h3>
                    <div class="yc-sub">Operational Site</div>
                    <ul class="yc-list">
                        <li>
                            <span class="yc-icon"><i class="fas fa-location-dot"></i></span>
                            <div class="yc-meta">
                                <b>Address</b>
                                Plot No 66, Alang Ship Breaking Yard,<br>Alang, Bhavnagar, Gujarat, India
                            </div>
                        </li>
                        <li>
                            <span class="yc-icon"><i class="fas fa-phone-volume"></i></span>
                            <div class="yc-meta">
                                <b>Call Us</b>
                                <a href="tel:+912782429573">+91 278 2429573</a>
                            </div>
                        </li>
                        <li>
                            <span class="yc-icon"><i class="fas fa-envelope"></i></span>
                            <div class="yc-meta">
                                <b>Email Us</b>
                                <a href="mailto:info@sachdevagroup.in">info@sachdevagroup.in</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── SHIPS RECYCLED TABLE ─── -->
    <section class="section">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag gold"><i class="fas fa-list-check"></i> Track Record</span>
                <h2 class="section-title">List of Ships <span>Recycled</span></h2>
                <div class="gold-line"></div>
                <p class="section-sub">Every vessel dismantled at Plot 66 Alang from 1998 to date — fully
                    documented under HKC. Use the search to filter by name, type, or year.</p>
            </div>

            <div class="reveal">
                <div class="ships-controls">
                    <div class="search-wrap">
                        <i class="fas fa-magnifying-glass"></i>
                        <input id="shipSearch" type="text" placeholder="Search by name, type or year…" />
                    </div>
                    <div class="ships-count">
                        Showing <strong id="shipCount">35</strong> of <strong>35</strong> vessels
                    </div>
                </div>

                <div class="ships-table-wrap">
                    <div class="ships-table-scroll">
                        <table class="ships-table" id="shipsTable">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">SR</th>
                                    <th>Name of Ship</th>
                                    <th>Type of Ship</th>
                                    <th class="col-ldt">LDT (MT)</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><span class="sr-num">01</span></td><td class="col-name">M.V. ARNAKI</td><td><span class="type-pill">Motor Bulk Carrier</span></td><td class="col-ldt">16,730.000</td><td><span class="year-pill">1998-1999</span></td></tr>
                                <tr><td><span class="sr-num">02</span></td><td class="col-name">M.V. HARMAE</td><td><span class="type-pill">RO-RO</span></td><td class="col-ldt">4,381.860</td><td><span class="year-pill">1999-2000</span></td></tr>
                                <tr><td><span class="sr-num">03</span></td><td class="col-name">PACIFIC TRIDENT</td><td><span class="type-pill">Bulk Carrier</span></td><td class="col-ldt">10,414.000</td><td><span class="year-pill">1999-2000</span></td></tr>
                                <tr><td><span class="sr-num">04</span></td><td class="col-name">M.V. ARCADIA</td><td><span class="type-pill">Bulk Carrier</span></td><td class="col-ldt">5,781.000</td><td><span class="year-pill">1999-2000</span></td></tr>
                                <tr><td><span class="sr-num">05</span></td><td class="col-name">M.V. GENERAL K. ORBAY</td><td><span class="type-pill">General Cargo</span></td><td class="col-ldt">5,990.000</td><td><span class="year-pill">2000-2001</span></td></tr>
                                <tr><td><span class="sr-num">06</span></td><td class="col-name">M.V. GOA</td><td><span class="type-pill">General Cargo</span></td><td class="col-ldt">7,898.000</td><td><span class="year-pill">2000-2001</span></td></tr>
                                <tr><td><span class="sr-num">07</span></td><td class="col-name">M.V. SEA FORTUNE</td><td><span class="type-pill">Log Carrier</span></td><td class="col-ldt">7,222.000</td><td><span class="year-pill">2001-2002</span></td></tr>
                                <tr><td><span class="sr-num">08</span></td><td class="col-name">M.V. AINO</td><td><span class="type-pill">LPG Tanker</span></td><td class="col-ldt">4,670.000</td><td><span class="year-pill">2002-2003</span></td></tr>
                                <tr><td><span class="sr-num">09</span></td><td class="col-name">M.T. YELLOW STAR</td><td><span class="type-pill">Bulk Carrier</span></td><td class="col-ldt">9,553.000</td><td><span class="year-pill">2002-2003</span></td></tr>
                                <tr><td><span class="sr-num">10</span></td><td class="col-name">M.T. GOLD SEAL</td><td><span class="type-pill">Motor Tanker</span></td><td class="col-ldt">1,708.190</td><td><span class="year-pill">2002-2003</span></td></tr>
                                <tr><td><span class="sr-num">11</span></td><td class="col-name">M.V. GRAY LAKER</td><td><span class="type-pill">Steel General Cargo</span></td><td class="col-ldt">5,564.000</td><td><span class="year-pill">2002-2003</span></td></tr>
                                <tr><td><span class="sr-num">12</span></td><td class="col-name">M.V. JOHANNA JACOBA</td><td><span class="type-pill">Hopper Dredger</span></td><td class="col-ldt">3,324.260</td><td><span class="year-pill">2003-2004</span></td></tr>
                                <tr><td><span class="sr-num">13</span></td><td class="col-name">M.V. PROJECT FEMCO</td><td><span class="type-pill">RO-RO Motor Ship</span></td><td class="col-ldt">5,031.300</td><td><span class="year-pill">2003-2004</span></td></tr>
                                <tr><td><span class="sr-num">14</span></td><td class="col-name">M.V. LAGOS-1</td><td><span class="type-pill">General Cargo</span></td><td class="col-ldt">6,887.700</td><td><span class="year-pill">2004-2005</span></td></tr>
                                <tr><td><span class="sr-num">15</span></td><td class="col-name">M.V. CURY</td><td><span class="type-pill">Reefer Vessel</span></td><td class="col-ldt">4,301.000</td><td><span class="year-pill">2004-2005</span></td></tr>
                                <tr><td><span class="sr-num">16</span></td><td class="col-name">FAIR ECO</td><td><span class="type-pill">Oil Tanker</span></td><td class="col-ldt">7,537.000</td><td><span class="year-pill">2005-2006</span></td></tr>
                                <tr><td><span class="sr-num">17</span></td><td class="col-name">MED GENERAL IV</td><td><span class="type-pill">General Cargo</span></td><td class="col-ldt">4,016.730</td><td><span class="year-pill">2005-2006</span></td></tr>
                                <tr><td><span class="sr-num">18</span></td><td class="col-name">S. QUEEN</td><td><span class="type-pill">Container Vessel</span></td><td class="col-ldt">1,575.820</td><td><span class="year-pill">2007-2008</span></td></tr>
                                <tr><td><span class="sr-num">19</span></td><td class="col-name">M.V. ANASTASIS</td><td><span class="type-pill">Passenger / Cargo</span></td><td class="col-ldt">9,144.730</td><td><span class="year-pill">2007-2008</span></td></tr>
                                <tr><td><span class="sr-num">20</span></td><td class="col-name">M.V. PIETRI FLAME</td><td><span class="type-pill">Reefer Vessel</span></td><td class="col-ldt">6,784.160</td><td><span class="year-pill">2008-2009</span></td></tr>
                                <tr><td><span class="sr-num">21</span></td><td class="col-name">MT SOUTHERN ACE</td><td><span class="type-pill">Pure Car Carrier</span></td><td class="col-ldt">11,474.409</td><td><span class="year-pill">2008-2009</span></td></tr>
                                <tr><td><span class="sr-num">22</span></td><td class="col-name">M.V. RELCHEM ARJUN</td><td><span class="type-pill">Chemical Tanker</span></td><td class="col-ldt">7,235.000</td><td><span class="year-pill">2009-2010</span></td></tr>
                                <tr><td><span class="sr-num">23</span></td><td class="col-name">M.V. MSC GERMANY</td><td><span class="type-pill">Cellular Container</span></td><td class="col-ldt">16,750.000</td><td><span class="year-pill">2009-2010</span></td></tr>
                                <tr><td><span class="sr-num">24</span></td><td class="col-name">M.T. LILLY-5</td><td><span class="type-pill">Gas Carrier</span></td><td class="col-ldt">5,650.000</td><td><span class="year-pill">2010-2011</span></td></tr>
                                <tr><td><span class="sr-num">25</span></td><td class="col-name">LPG POSH</td><td><span class="type-pill">LPG Tanker</span></td><td class="col-ldt">15,700.000</td><td><span class="year-pill">2010-2011</span></td></tr>
                                <tr><td><span class="sr-num">26</span></td><td class="col-name">PACIFIC SPIRIT</td><td><span class="type-pill">Vehicle Carrier</span></td><td class="col-ldt">15,898.840</td><td><span class="year-pill">2011-2012</span></td></tr>
                                <tr><td><span class="sr-num">27</span></td><td class="col-name">RION</td><td><span class="type-pill">Tanker</span></td><td class="col-ldt">39,025.000</td><td><span class="year-pill">2011-2012</span></td></tr>
                                <tr><td><span class="sr-num">28</span></td><td class="col-name">DIAMOND JASMINE</td><td><span class="type-pill">Tanker</span></td><td class="col-ldt">41,838.000</td><td><span class="year-pill">2013-2014</span></td></tr>
                                <tr><td><span class="sr-num">29</span></td><td class="col-name">MOL TYNE</td><td><span class="type-pill">Container Vessel</span></td><td class="col-ldt">23,545.000</td><td><span class="year-pill">2014-2015</span></td></tr>
                                <tr><td><span class="sr-num">30</span></td><td class="col-name">TINAMOU ARROW</td><td><span class="type-pill">General Cargo</span></td><td class="col-ldt">11,054.000</td><td><span class="year-pill">2015-2016</span></td></tr>
                                <tr><td><span class="sr-num">31</span></td><td class="col-name">ADVENTURE</td><td><span class="type-pill">Tanker</span></td><td class="col-ldt">7,895.200</td><td><span class="year-pill">2016-2017</span></td></tr>
                                <tr><td><span class="sr-num">32</span></td><td class="col-name">CATHERINE</td><td><span class="type-pill">Container Vessel</span></td><td class="col-ldt">23,507.000</td><td><span class="year-pill">2017-2018</span></td></tr>
                                <tr><td><span class="sr-num">33</span></td><td class="col-name">MV INNOVATOR</td><td><span class="type-pill">Rig</span></td><td class="col-ldt">9,859.059</td><td><span class="year-pill">2018-2019</span></td></tr>
                                <tr><td><span class="sr-num">34</span></td><td class="col-name">TRANS PACIFIC</td><td><span class="type-pill">Vehicle Carrier</span></td><td class="col-ldt">6,817.910</td><td><span class="year-pill">2019-2020</span></td></tr>
                                <tr><td><span class="sr-num">35</span></td><td class="col-name">ACTINIA</td><td><span class="type-pill">Drilling Rig</span></td><td class="col-ldt">13,210.630</td><td><span class="year-pill">2019-2020</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ships-empty" id="shipsEmpty">
                        <i class="fas fa-magnifying-glass"></i>
                        <div>No vessels match your search.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── INSIGHTS / YARD LAYOUT ─── -->
    <section class="section section-light">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag"><i class="fas fa-eye"></i> Insights</span>
                <h2 class="section-title">Yard Layout &amp; <span>HKC Compliance</span></h2>
                <div class="gold-line"></div>
            </div>

            <div class="insights-grid stagger">
                <div class="insight-card reveal flip-x" style="--i:0">
                    <div class="insight-icon"><i class="fas fa-map-location-dot"></i></div>
                    <h3>Yard Layout</h3>
                    <p>Plot 66 at Alang spans dedicated zones for vessel beaching, cutting, hazardous-material
                        storage, scrap segregation, and effluent treatment — all designed for safe, compliant
                        recycling operations.</p>
                    <svg class="yard-svg" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="sea-jjsb" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0" stop-color="#1a3553" stop-opacity="0.4"/>
                                <stop offset="1" stop-color="#1a3553" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <rect x="0" y="120" width="400" height="80" fill="url(#sea-jjsb)"/>
                        <path d="M0,135 C100,120 200,150 300,135 C350,128 380,140 400,135 L400,200 L0,200 Z" fill="rgba(70,197,216,0.18)"/>
                        <path d="M0,150 C100,140 200,165 300,150 C350,144 380,155 400,150 L400,200 L0,200 Z" fill="rgba(13,27,42,0.55)"/>
                        <rect x="20" y="20" width="80" height="90" rx="6" fill="rgba(232,161,62,0.16)" stroke="rgba(232,161,62,0.55)" stroke-width="1"/>
                        <text x="60" y="68" fill="#f0b94a" text-anchor="middle" font-size="10" font-family="Inter" font-weight="700">CUTTING</text>
                        <rect x="115" y="20" width="80" height="90" rx="6" fill="rgba(199,61,61,0.16)" stroke="rgba(199,61,61,0.55)" stroke-width="1"/>
                        <text x="155" y="62" fill="#ff8a8a" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">HAZ-MAT</text>
                        <text x="155" y="74" fill="#ff8a8a" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">STORAGE</text>
                        <rect x="210" y="20" width="80" height="90" rx="6" fill="rgba(46,125,79,0.18)" stroke="rgba(46,125,79,0.55)" stroke-width="1"/>
                        <text x="250" y="62" fill="#6fc28a" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">SCRAP</text>
                        <text x="250" y="74" fill="#6fc28a" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">SEGREGATION</text>
                        <rect x="305" y="20" width="75" height="90" rx="6" fill="rgba(70,197,216,0.18)" stroke="rgba(70,197,216,0.55)" stroke-width="1"/>
                        <text x="342" y="62" fill="#7fc7d8" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">EFFLUENT</text>
                        <text x="342" y="74" fill="#7fc7d8" text-anchor="middle" font-size="9" font-family="Inter" font-weight="700">TREATMENT</text>
                        <g transform="translate(160,110)">
                            <polygon points="0,0 90,0 80,18 10,18" fill="rgba(13,27,42,0.95)" stroke="rgba(232,161,62,0.6)" stroke-width="1"/>
                            <rect x="20" y="-12" width="50" height="14" fill="rgba(245,217,139,0.6)"/>
                        </g>
                    </svg>
                </div>

                <div class="insight-card reveal flip-x" style="--i:1">
                    <div class="insight-icon"><i class="fas fa-shield-halved"></i></div>
                    <h3>Ships Recycled Under HKC</h3>
                    <p>Every vessel processed at our yard is recycled in full alignment with the
                        <strong style="color: var(--gold-light);">Hong Kong International Convention</strong>
                        for the Safe and Environmentally Sound Recycling of Ships — covering inventory of
                        hazardous materials, ship recycling plan, and safe-for-entry certification.</p>
                    <div style="display:flex; gap: 14px; flex-wrap: wrap; margin-top: 24px; position: relative; z-index:1;">
                        <span style="display:inline-flex; align-items:center; gap:8px; padding: 8px 16px; background: rgba(232,161,62,0.14); border: 1px solid rgba(232,161,62,0.4); border-radius: 50px; font-size: 0.82rem; color: var(--gold-light); font-weight: 600;">
                            <i class="fas fa-clipboard-check"></i> IHM Verified
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:8px; padding: 8px 16px; background: rgba(232,161,62,0.14); border: 1px solid rgba(232,161,62,0.4); border-radius: 50px; font-size: 0.82rem; color: var(--gold-light); font-weight: 600;">
                            <i class="fas fa-file-shield"></i> SRP Approved
                        </span>
                        <span style="display:inline-flex; align-items:center; gap:8px; padding: 8px 16px; background: rgba(232,161,62,0.14); border: 1px solid rgba(232,161,62,0.4); border-radius: 50px; font-size: 0.82rem; color: var(--gold-light); font-weight: 600;">
                            <i class="fas fa-check-double"></i> Statement of Compliance
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── HEAD OFFICE CONTACT ─── -->
    <section class="section">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-tag gold"><i class="fas fa-envelope-open-text"></i> Head Office</span>
                <h2 class="section-title">Contact <span>Us</span></h2>
                <div class="gold-line"></div>
            </div>

            <div class="yard-card reveal scale-up" style="max-width: 880px; margin: 0 auto;">
                <h3>Sachdeva House</h3>
                <div class="yc-sub">Corporate Office</div>
                <ul class="yc-list">
                    <li>
                        <span class="yc-icon"><i class="fas fa-location-dot"></i></span>
                        <div class="yc-meta">
                            <b>Address</b>
                            "Sachdeva House", Opp Swaminarayan Mandir,<br>Lokhand Bazar, Bhavnagar, Gujarat, India
                        </div>
                    </li>
                    <li>
                        <span class="yc-icon"><i class="fas fa-phone-volume"></i></span>
                        <div class="yc-meta">
                            <b>Call Us</b>
                            <a href="tel:+912782429573">+91 278 2429573</a>
                        </div>
                    </li>
                    <li>
                        <span class="yc-icon"><i class="fas fa-envelope"></i></span>
                        <div class="yc-meta">
                            <b>Email Us</b>
                            <a href="mailto:info@sachdevagroup.in">info@sachdevagroup.in</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ─── ISO CERTIFICATIONS ─── -->
    <section class="iso-band">
        <div class="iso-inner">
            <p class="lead reveal">CERTIFICATIONS &amp; COMPLIANCE</p>
            <div class="iso-grid stagger">
                <div class="iso-chip reveal" style="--i:0">
                    <i class="fas fa-ship"></i>
                    <div class="it">ISO 30000:2009</div>
                    <div class="is">Ship Recycling</div>
                </div>
                <div class="iso-chip reveal" style="--i:1">
                    <i class="fas fa-award"></i>
                    <div class="it">ISO 9001:2015</div>
                    <div class="is">Quality Management</div>
                </div>
                <div class="iso-chip reveal" style="--i:2">
                    <i class="fas fa-leaf"></i>
                    <div class="it">ISO 14001:2015</div>
                    <div class="is">Environmental</div>
                </div>
                <div class="iso-chip reveal" style="--i:3">
                    <i class="fas fa-helmet-safety"></i>
                    <div class="it">ISO 45001:2018</div>
                    <div class="is">Health &amp; Safety</div>
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
                                    <small>Since 1994 — 36+ Ships</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="jjsb.php">
                                <span class="cmp-icon"><i class="fas fa-sailboat"></i></span>
                                <span class="cmp-text">
                                    Jai Jagdish Ship Breakers Pvt. Ltd.
                                    <small>Since 1998 — 35+ Ships</small>
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
                                <a href="tel:+912782429573">+91 278 2429573</a>
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
        // Hero word-by-word reveal
        (function () {
            const h = document.getElementById('heroTitle');
            if (!h) return;
            function splitNode(node) {
                if (node.nodeType === Node.TEXT_NODE) {
                    const frag = document.createDocumentFragment();
                    const words = node.textContent.split(/(\s+)/);
                    words.forEach((w) => {
                        if (/^\s+$/.test(w)) {
                            frag.appendChild(document.createTextNode(w));
                        } else if (w.length) {
                            const span = document.createElement('span');
                            span.className = 'word';
                            span.textContent = w;
                            frag.appendChild(span);
                        }
                    });
                    node.parentNode.replaceChild(frag, node);
                } else if (node.nodeType === Node.ELEMENT_NODE) {
                    Array.from(node.childNodes).forEach(splitNode);
                }
            }
            Array.from(h.childNodes).forEach(splitNode);
            const allWords = h.querySelectorAll('.word');
            allWords.forEach((w, i) => {
                w.style.animationDelay = (0.15 + i * 0.07) + 's';
            });
        })();

        // Reveal-on-scroll
        (function () {
            const reveals = document.querySelectorAll('.reveal, .stats-bar, .iso-grid');
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

        // Animated counters
        (function () {
            const counters = document.querySelectorAll('.stat-num[data-count]');
            const animate = (el) => {
                const target = +el.getAttribute('data-count');
                const small = el.querySelector('small');
                const suffix = small ? small.outerHTML : '';
                const duration = 1800;
                const start = performance.now();
                const tick = (now) => {
                    const p = Math.min(1, (now - start) / duration);
                    const eased = 1 - Math.pow(1 - p, 3);
                    const val = Math.round(target * eased);
                    el.innerHTML = val + suffix;
                    if (p < 1) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
            };
            if ('IntersectionObserver' in window) {
                const io2 = new IntersectionObserver((entries) => {
                    entries.forEach((e) => {
                        if (e.isIntersecting) { animate(e.target); io2.unobserve(e.target); }
                    });
                }, { threshold: 0.4 });
                counters.forEach((c) => io2.observe(c));
            }
        })();

        // Cascade ship-table rows when the table scrolls into view
        (function () {
            const table = document.getElementById('shipsTable');
            if (!table) return;
            if ('IntersectionObserver' in window) {
                const io = new IntersectionObserver((entries) => {
                    entries.forEach((e) => {
                        if (e.isIntersecting) {
                            const rows = table.querySelectorAll('tbody tr');
                            rows.forEach((row, i) => {
                                row.style.transitionDelay = (i * 0.04) + 's';
                            });
                            requestAnimationFrame(() => {
                                table.classList.add('cascade');
                            });
                            io.unobserve(table);
                        }
                    });
                }, { threshold: 0.08 });
                io.observe(table);
            } else {
                table.classList.add('cascade');
            }
        })();

        // Ship search filter
        (function () {
            const input = document.getElementById('shipSearch');
            const rows = document.querySelectorAll('#shipsTable tbody tr');
            const count = document.getElementById('shipCount');
            const empty = document.getElementById('shipsEmpty');

            input.addEventListener('input', () => {
                const q = input.value.trim().toLowerCase();
                let shown = 0;
                rows.forEach((row) => {
                    const text = row.textContent.toLowerCase();
                    if (!q || text.includes(q)) {
                        row.style.display = '';
                        shown++;
                    } else {
                        row.style.display = 'none';
                    }
                });
                count.textContent = shown;
                empty.classList.toggle('show', shown === 0);
            });
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
    </script>
</body>

</html>
