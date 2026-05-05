<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News & Media – Sachdeva Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="fonts.googleapis.com/css2" rel="stylesheet">
    <link rel="stylesheet" href="agentapp_static/180193f0_40d1_70d0_7dcd_e2aaa36334c6/f39xi1f8zu/styles.css">
    <link rel="stylesheet" href="css/inline_styles.css">
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
            --navy-mid: #112240;
            --navy-light: #1a2f4e;
            --gold: #c9a84c;
            --gold-light: #e4c46e;
            --gold-dim: #a8893c;
            --white: #ffffff;
            --off-white: #f4f6f9;
            --text: #1e2d3d;
            --muted: #5a7090;
            --border: rgba(201, 168, 76, 0.18);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--off-white);
            color: var(--text);
            overflow-x: hidden;
        }





        /* ─── PAGE HERO (parallax) ─── */
        .page-hero {
            position: relative;
            text-align: center;
            padding: 200px 24px 110px;
            overflow: hidden;
            isolation: isolate;
            background-image:
                linear-gradient(135deg, rgba(13, 27, 42, 0.78) 0%, rgba(20, 48, 77, 0.62) 50%, rgba(13, 27, 42, 0.82) 100%),
                url('https://images.unsplash.com/photo-1494412651409-8963ce7935a7?w=1800&q=85');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse at 22% 28%, rgba(201, 168, 76, 0.20), transparent 55%),
                radial-gradient(ellipse at 78% 72%, rgba(46, 125, 79, 0.16), transparent 55%);
            pointer-events: none;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .page-hero > * { position: relative; z-index: 1; }

        @media (max-width: 768px) {
            .page-hero { padding: 160px 18px 80px; background-attachment: scroll; }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(201, 168, 76, 0.14);
            border: 1px solid rgba(201, 168, 76, 0.55);
            color: var(--gold-light);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 8px 22px;
            border-radius: 50px;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
            animation: fadeDown 0.6s ease both;
        }

        .hero-badge::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--gold-light);
            box-shadow: 0 0 10px var(--gold-light);
        }

        .page-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 4rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.12;
            letter-spacing: -0.01em;
            animation: fadeDown 0.7s ease 0.1s both;
        }

        .page-hero h1 span { color: var(--gold-light); }

        .hero-sub {
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.05rem;
            line-height: 1.75;
            max-width: 660px;
            margin: 22px auto 0;
            animation: fadeDown 0.8s ease 0.2s both;
        }

        .hero-divider {
            width: 58px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            margin: 26px auto 0;
            border-radius: 2px;
            animation: expandW 0.9s ease 0.35s both;
        }

        /* ─── STATS BAR ─── */
        .stats-bar {
            background: var(--off-white);
            padding: 36px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .stats-inner {
            max-width: 1160px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        @media(max-width:700px) {
            .stats-inner {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .stat-card {
            background: linear-gradient(135deg, #fff, #f8fbff);
            border-radius: 16px;
            padding: 28px 22px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(13, 27, 42, 0.07);
            border: 1px solid #e8ecf2;
            border-bottom: 3px solid var(--gold);
            transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 120px; height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.12), transparent 70%);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(201, 168, 76, 0.22);
            border-bottom-color: var(--gold-light);
        }

        .stat-card:hover::before { transform: scale(1.7); }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--navy), var(--navy-light));
            color: var(--gold-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin: 0 auto 14px;
            transition: transform 0.4s ease;
            position: relative;
            z-index: 1;
        }

        .stat-card:hover .stat-icon {
            transform: rotate(-8deg) scale(1.08);
        }

        .stat-num {
            font-family: clamp(1.9rem, 4vw, 3rem);
            font-size: clamp(2.2rem, 5.5vw, 3.6rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 0.67rem;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--muted);
        }

        /* ─── FILTER BAR ─── */
        .filter-section {
            background: var(--off-white);
            padding: 28px 20px 0;
            position: sticky;
            top: 70px;
            z-index: 80;
        }

        .filter-inner {
            max-width: 1160px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            padding-bottom: 18px;
            border-bottom: 2px solid #e2e8f0;
        }

        .filter-btn {
            padding: 9px 22px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1.5px solid #d1d8e3;
            background: #fff;
            color: var(--muted);
            cursor: pointer;
            transition: all 0.22s ease;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.2px;
        }

        .filter-btn:hover {
            border-color: var(--gold);
            color: var(--navy);
            background: rgba(201, 168, 76, 0.07);
        }

        .filter-btn.active {
            background: var(--navy);
            border-color: var(--navy);
            color: #fff;
            box-shadow: 0 4px 14px rgba(13, 27, 42, 0.25);
        }

        /* ─── MAIN CONTENT ─── */
        .main-wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 40px 20px 80px;
        }

        /* ─── FEATURED ARTICLE ─── */
        .featured-wrap {
            margin-bottom: 40px;
        }

        .section-label {
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--border), transparent);
        }

        .featured-card {
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            gap: 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.13);
            border: 1px solid #e2e8f0;
            cursor: pointer;
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        @media(max-width:768px) {
            .featured-card {
                grid-template-columns: 1fr;
            }
        }

        .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 56px rgba(13, 27, 42, 0.2);
        }

        .featured-img-wrap {
            position: relative;
            overflow: hidden;
            min-height: 320px;
        }

        .featured-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
            display: block;
        }

        .featured-card:hover .featured-img-wrap img {
            transform: scale(1.06);
        }

        .featured-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(13, 27, 42, 0.25) 0%, transparent 60%);
        }

        .featured-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            background: var(--gold);
            color: var(--navy);
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
        }

        /* Upload button on image */
        .img-upload-btn {
            position: absolute;
            bottom: 14px;
            right: 14px;
            background: rgba(13, 27, 42, 0.75);
            border: 1px solid rgba(201, 168, 76, 0.4);
            color: var(--gold-light);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(6px);
            transition: background 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .img-upload-btn:hover {
            background: rgba(201, 168, 76, 0.25);
        }

        .img-upload-input {
            display: none;
        }

        .featured-content {
            background: #fff;
            padding: 40px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media(max-width:768px) {
            .featured-content {
                padding: 28px 24px;
            }
        }

        .cat-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(13, 27, 42, 0.07);
            color: var(--navy);
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 5px 14px;
            border-radius: 50px;
            margin-bottom: 14px;
            border: 1px solid rgba(13, 27, 42, 0.1);
            width: fit-content;
        }

        .news-date {
            font-size: 0.74rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 14px;
        }

        .featured-content h2 {
            font-family: clamp(1.9rem, 4vw, 3rem);
            font-size: clamp(1.5rem, 4vw, 2.2rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.32;
            margin-bottom: 16px;
        }

        .featured-content p {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 24px;
            flex: 1;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--navy);
            color: #fff;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 12px 26px;
            border-radius: 50px;
            text-decoration: none;
            letter-spacing: 0.3px;
            width: fit-content;
            transition: background 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-primary:hover {
            background: var(--navy-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(13, 27, 42, 0.3);
        }

        .btn-primary i {
            font-size: 0.68rem;
        }

        /* ─── NEWS GALLERY GRID ─── */
        .news-gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        @media(max-width:900px) {
            .news-gallery {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:560px) {
            .news-gallery {
                grid-template-columns: 1fr;
            }
        }

        .gallery-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(13, 27, 42, 0.07);
            border: 1px solid #e2e8f0;
            background: #fff;
            cursor: pointer;
            transition:
                transform 0.5s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s ease,
                border-color 0.3s ease;
            display: flex;
            flex-direction: column;
            position: relative;
            opacity: 0;
            transform: translateY(40px);
        }

        .gallery-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
            z-index: 5;
            border-radius: 18px 18px 0 0;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 28px 56px rgba(13, 27, 42, 0.18);
            border-color: rgba(201, 168, 76, 0.4);
        }

        .gallery-card:hover::before { transform: scaleX(1); }

        /* Image container with overlay */
        .card-img-wrap {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.55s ease;
        }

        .gallery-card:hover .card-img-wrap img {
            transform: scale(1.09);
        }

        /* Dark overlay on hover */
        .card-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(13, 27, 42, 0.72) 0%,
                    rgba(13, 27, 42, 0.08) 55%,
                    transparent 100%);
            opacity: 0;
            transition: opacity 0.35s ease;
            display: flex;
            align-items: flex-end;
            padding: 16px;
        }

        .gallery-card:hover .card-img-overlay {
            opacity: 1;
        }

        .overlay-read {
            color: #fff;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
        }

        .card-cat-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 0.59rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 4px 12px;
            border-radius: 50px;
            color: #fff;
        }

        /* Category colors */
        .cat-certification {
            background: #1a73e8;
        }

        .cat-operations {
            background: #0d7a5f;
        }

        .cat-safety {
            background: #d4380d;
        }

        .cat-innovation {
            background: #722ed1;
        }

        .cat-environment {
            background: #389e0d;
        }

        .cat-industry {
            background: #c9a84c;
            color: var(--navy) !important;
        }

        .cat-featured {
            background: var(--gold);
            color: var(--navy) !important;
        }

        /* Upload button inside card image */
        .card-upload-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(13, 27, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.62rem;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            backdrop-filter: blur(6px);
            transition: background 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .card-upload-btn:hover {
            background: rgba(201, 168, 76, 0.35);
            color: #fff;
        }

        /* Card body */
        .card-body {
            padding: 20px 20px 22px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-date {
            font-size: 0.68rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 9px;
        }

        .card-body h3 {
            font-family: clamp(1.9rem, 4vw, 3rem);
            font-size: clamp(0.97rem, 2.5vw, 1.25rem);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.42;
            margin-bottom: 10px;
            transition: color 0.2s;
        }

        .gallery-card:hover .card-body h3 {
            color: var(--gold-dim);
        }

        .card-body p {
            font-size: 0.79rem;
            color: var(--muted);
            line-height: 1.68;
            flex: 1;
            margin-bottom: 16px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f0f3f8;
            padding-top: 13px;
            margin-top: auto;
        }

        .card-author {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--navy);
        }

        .author-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--navy), var(--gold));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.58rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .card-read-link {
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--gold-dim);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s, gap 0.2s;
        }

        .card-read-link:hover {
            color: var(--navy);
            gap: 7px;
        }

        /* ─── NEWSLETTER STRIP ─── */
        .newsletter-strip {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
            border-radius: 20px;
            padding: 44px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            margin-top: 48px;
            box-shadow: 0 8px 36px rgba(13, 27, 42, 0.3);
            border: 1px solid rgba(201, 168, 76, 0.2);
            position: relative;
            overflow: hidden;
        }

        .newsletter-strip::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
        }

        @media(max-width:680px) {
            .newsletter-strip {
                flex-direction: column;
                text-align: center;
                padding: 32px 24px;
            }
        }

        .nl-text h3 {
            font-family: clamp(1.9rem, 4vw, 3rem);
            font-size: clamp(1.3rem, 3.25vw, 2.2rem);
            font-weight: 800;
            color: #fff;
            margin-bottom: 6px;
        }

        .nl-text p {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.65);
        }

        .nl-form {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        @media(max-width:460px) {
            .nl-form {
                flex-direction: column;
                width: 100%;
            }
        }

        .nl-input {
            padding: 13px 22px;
            border-radius: 50px;
            border: 1px solid rgba(201, 168, 76, 0.3);
            font-size: 0.85rem;
            font-family: 'Inter', sans-serif;
            width: 250px;
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            backdrop-filter: blur(4px);
            transition: border-color 0.2s;
        }

        .nl-input:focus {
            border-color: var(--gold);
        }

        .nl-input::placeholder {
            color: rgba(255, 255, 255, 0.45);
        }

        @media(max-width:460px) {
            .nl-input {
                width: 100%;
            }
        }

        .nl-btn {
            padding: 13px 26px;
            border-radius: 50px;
            background: var(--gold);
            color: var(--navy);
            font-size: 0.82rem;
            font-weight: 800;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .nl-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        /* ─── PRESS PANEL ─── */
        .press-panel {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            padding: 36px 32px;
            margin-top: 32px;
            position: relative;
            overflow: hidden;
        }

        .press-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--navy), var(--gold), var(--navy));
        }

        .press-panel-title {
            font-family: clamp(1.9rem, 4vw, 3rem);
            font-size: clamp(1.15rem, 2.85vw, 1.75rem);
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 26px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #edf0f5;
            padding-bottom: 14px;
        }

        .press-panel-title i {
            color: var(--gold);
        }

        .press-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        @media(max-width:600px) {
            .press-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .press-item {
            background: var(--off-white);
            border-radius: 12px;
            padding: 22px 16px;
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: all 0.28s ease;
            cursor: pointer;
        }

        .press-item:hover {
            background: #fff;
            transform: translateY(-5px);
            box-shadow: 0 10px 28px rgba(13, 27, 42, 0.12);
            border-color: var(--gold);
        }

        .press-icon {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            background: var(--navy);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin: 0 auto 12px;
            transition: transform 0.28s ease;
        }

        .press-item:hover .press-icon {
            transform: scale(1.1) rotate(-6deg);
        }

        .press-name {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 4px;
        }

        .press-type {
            font-size: 0.65rem;
            color: var(--muted);
        }

        /* ─── FOOTER ─── */
        .page-footer {
            background: var(--navy);
            text-align: center;
            padding: 28px 24px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.8rem;
            border-top: 1px solid rgba(201, 168, 76, 0.15);
        }

        .page-footer a {
            color: var(--gold);
            text-decoration: none;
        }

        .page-footer a:hover {
            color: var(--gold-light);
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes expandW {
            from {
                width: 0;
            }

            to {
                width: 58px;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in:nth-child(2) {
            transition-delay: 0.08s;
        }

        .fade-in:nth-child(3) {
            transition-delay: 0.16s;
        }

        .fade-in:nth-child(4) {
            transition-delay: 0.24s;
        }

        .fade-in:nth-child(5) {
            transition-delay: 0.32s;
        }

        .fade-in:nth-child(6) {
            transition-delay: 0.40s;
        }

        /* Hidden cards (filtered) */
        .gallery-card.hidden {
            display: none;
        }

        @media(max-width:768px) {
            .nav-menu {
                display: none;
            }

            .press-panel {
                padding: 24px 18px;
            }
        }
    </style>
    <link rel="stylesheet" href="css/marine-footer.css">
    <link rel="stylesheet" href="css/marine-header.css">
</head>

<body>

    <!-- ─── NAV ─── -->
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
                                <li><a href="news.php" class="active">News</a></li>
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
    <section class="page-hero" style="padding-top: 200px;">
        <div class="hero-badge"><i class="fas fa-newspaper"></i> Latest Updates</div>
        <h1>News & <span>Media</span></h1>
        <p class="hero-sub">Latest updates and highlights from Sachdeva Group — milestones, certifications, and industry
            news.</p>
        <div class="hero-divider"></div>
    </section>

    <!-- ─── STATS BAR ─── -->
    <section class="stats-bar">
        <div class="stats-inner">
            <div class="stat-card fade-in">
                <div class="stat-icon"><i class="fas fa-ship"></i></div>
                <div class="stat-num" data-count="73">0</div>
                <div class="stat-label">Ships Recycled</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon"><i class="fas fa-clock-rotate-left"></i></div>
                <div class="stat-num" data-count="40">0<small style="color:var(--gold);font-size:0.7em;">+</small></div>
                <div class="stat-label">Years of Operations</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon"><i class="fas fa-certificate"></i></div>
                <div class="stat-num" data-count="6">0</div>
                <div class="stat-label">Certifications</div>
            </div>
            <div class="stat-card fade-in">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-num" data-count="200">0<small style="color:var(--gold);font-size:0.7em;">+</small></div>
                <div class="stat-label">Workers Trained</div>
            </div>
        </div>
    </section>

    <!-- ─── FILTER BAR ─── -->
    <div class="filter-section">
        <div class="filter-inner">
            <button class="filter-btn active" data-filter="all">All News</button>
            <button class="filter-btn" data-filter="operations">Operations</button>
            <button class="filter-btn" data-filter="certification">Certifications</button>
            <button class="filter-btn" data-filter="safety">Safety</button>
            <button class="filter-btn" data-filter="environment">Environment</button>
            <button class="filter-btn" data-filter="innovation">Innovation</button>
            <button class="filter-btn" data-filter="industry">Industry</button>
        </div>
    </div>

    <!-- ─── MAIN CONTENT ─── -->
    <div class="main-wrap">

        <!-- Featured Article -->
        <div class="featured-wrap fade-in">
            <div class="section-label"><i class="fas fa-star"></i> Featured Story</div>
            <div class="featured-card">
                <div class="featured-img-wrap">
                    <img id="featured-img" src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=900&q=80"
                        alt="Ship recycling operations">
                    <div class="featured-img-overlay"></div>
                    <div class="featured-badge"><i class="fas fa-star"></i> Featured</div>
                    <!-- Upload button -->
                    <label class="img-upload-btn" for="featured-upload">
                        <i class="fas fa-camera"></i> Change Photo
                    </label>
                    <input class="img-upload-input" type="file" id="featured-upload" accept="image/*">
                </div>
                <div class="featured-content">

                    <h2>Sachdeva Group Achieves Record Recycling Milestone — 73 Ships</h2>
                    <p>After four decades of commitment to safe and environmentally responsible ship recycling, the
                        Sachdeva Group celebrates its 73rd vessel successfully processed at the Alang facility,
                        reinforcing its position as a global leader in the industry.</p>
                    <a href="#" class="btn-primary">Read Full Story <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Gallery-Style News Grid -->
        <div class="section-label fade-in"><i class="fas fa-th-large"></i> Latest News</div>

        <div class="news-gallery" id="newsGallery">

            <!-- Card 1 – Certification -->
            <div class="gallery-card fade-in" data-category="certification">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=700&q=80"
                        alt="ISO Certification">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-certification">Certification</span>
                    <label class="card-upload-btn" for="upload-1">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-1" accept="image/*" data-target="card-img-1">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> March 15, 2026</div>
                    <h3>Bureau Veritas Recertifies Sachdeva Steel ISO 30000:2009</h3>
                    <p>Sachdeva Steel Products LLP successfully completed its recertification audit, reaffirming
                        compliance with international ship recycling standards under Bureau Veritas.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">SG</div> Sachdeva Group
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 – Operations -->
            <div class="gallery-card fade-in" data-category="operations">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1568430462989-44163eb1752f?w=700&q=80"
                        alt="Ship arrival">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-operations">Operations</span>
                    <label class="card-upload-btn" for="upload-2">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-2" accept="image/*" data-target="card-img-2">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> February 28, 2026</div>
                    <h3>Jai Jagdish Completes Successful Recycling of Bulk Carrier</h3>
                    <p>Jai Jagdish Ship Breakers Pvt. Ltd. completed the environmentally sound recycling of a 42,000 DWT
                        bulk carrier, maintaining full compliance with EU Ship Recycling Regulations.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">JJ</div> Jai Jagdish
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3 – Safety -->
            <div class="gallery-card fade-in" data-category="safety">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80"
                        alt="Safety training">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-safety">Safety</span>
                    <label class="card-upload-btn" for="upload-3">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-3" accept="image/*" data-target="card-img-3">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> January 20, 2026</div>
                    <h3>Annual Safety Training Drive Completed for 200+ Workers</h3>
                    <p>In line with ILO guidelines, Sachdeva Group conducted its annual occupational health and safety
                        training program, covering fire safety, hazardous material handling, and first aid.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">SD</div> Safety Dept.
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 – Innovation -->
            <div class="gallery-card fade-in" data-category="innovation">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=700&q=80"
                        alt="Digital Technology">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-innovation">Innovation</span>
                    <label class="card-upload-btn" for="upload-4">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-4" accept="image/*" data-target="card-img-4">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> December 12, 2025</div>
                    <h3>Sachdeva Group Adopts Digital Inventory Management System</h3>
                    <p>To improve efficiency and traceability of recyclable materials, the Group has implemented a
                        digital platform for real-time inventory management across both facilities.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">SG</div> Sachdeva Group
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 – Environment -->
            <div class="gallery-card fade-in" data-category="environment">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?w=700&q=80"
                        alt="Environmental">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-environment">Environment</span>
                    <label class="card-upload-btn" for="upload-5">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-5" accept="image/*" data-target="card-img-5">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> November 5, 2025</div>
                    <h3>Green Yard Initiative: Zero Liquid Discharge System Installed</h3>
                    <p>As part of its commitment to environmental responsibility, Sachdeva Group has installed a Zero
                        Liquid Discharge system to ensure no industrial effluents reach the surrounding ecosystem.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">EH</div> Env. Health
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 6 – Industry -->
            <div class="gallery-card fade-in" data-category="industry">
                <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1500470261855-0873d50b06c2?w=700&q=80"
                        alt="Maritime inspection">
                    <div class="card-img-overlay">
                        <div class="overlay-read"><i class="fas fa-book-open"></i> Read Article</div>
                    </div>
                    <span class="card-cat-badge cat-industry">Industry</span>
                    <label class="card-upload-btn" for="upload-6">
                        <i class="fas fa-upload"></i> Upload
                    </label>
                    <input class="img-upload-input" type="file" id="upload-6" accept="image/*" data-target="card-img-6">
                </div>
                <div class="card-body">
                    <div class="card-date"><i class="fas fa-clock"></i> October 18, 2025</div>
                    <h3>ClassNK Inspectors Visit Alang Facility — EU Compliance Verified</h3>
                    <p>Nippon Kaiji Kyokai (Netherlands) B.V. conducted a site inspection of Plot No. 63 & 64, verifying
                        full compliance with EU Ship Recycling Regulation (EU) No. 1257/2013.</p>
                    <div class="card-footer">
                        <div class="card-author">
                            <div class="author-avatar">NK</div> ClassNK
                        </div>
                        <a href="#" class="card-read-link">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div><!-- /news-gallery -->

        <!-- Newsletter Strip -->
        <div class="newsletter-strip fade-in">
            <div class="nl-text">
                <h3>Stay Updated</h3>
                <p>Get the latest news from Sachdeva Group delivered to your inbox.</p>
            </div>
            <div class="nl-form">
                <input class="nl-input" type="email" placeholder="Your email address">
                <button class="nl-btn"><i class="fas fa-paper-plane"></i> Subscribe</button>
            </div>
        </div>

        <!-- Press Coverage -->
        <div class="press-panel fade-in">
            <div class="press-panel-title">
                <i class="fas fa-broadcast-tower"></i> Press Coverage
            </div>
            <div class="press-grid">
                <div class="press-item">
                    <div class="press-icon"><i class="fas fa-anchor"></i></div>
                    <div class="press-name">Maritime India</div>
                    <div class="press-type">Industry Journal</div>
                </div>
                <div class="press-item">
                    <div class="press-icon"><i class="fas fa-ship"></i></div>
                    <div class="press-name">Lloyd's List</div>
                    <div class="press-type">Shipping News</div>
                </div>
                <div class="press-item">
                    <div class="press-icon"><i class="fas fa-leaf"></i></div>
                    <div class="press-name">GreenPort</div>
                    <div class="press-type">Environment</div>
                </div>
                <div class="press-item">
                    <div class="press-icon"><i class="fas fa-globe"></i></div>
                    <div class="press-name">IMO News</div>
                    <div class="press-type">Maritime Org.</div>
                </div>
            </div>
        </div>

    </div><!-- /main-wrap -->

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
                                    <small>Since 1997 — 36+ Ships</small>
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

    <script>
        /* ─── Scroll Fade-In ─── */
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.08 });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        /* ─── Stagger reveal for gallery cards ─── */
        (function () {
            const cards = document.querySelectorAll('.gallery-card');
            const io = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        const idx = Array.from(cards).indexOf(e.target);
                        e.target.style.transitionDelay = ((idx % 6) * 0.08) + 's';
                        e.target.classList.add('visible');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.08 });
            cards.forEach(el => io.observe(el));
        })();

        /* ─── Animated counters ─── */
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
            const io2 = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) { animate(e.target); io2.unobserve(e.target); }
                });
            }, { threshold: 0.4 });
            counters.forEach(c => io2.observe(c));
        })();

        /* ─── 3D tilt on gallery cards ─── */
        (function () {
            const isTouch = window.matchMedia('(hover: none)').matches;
            const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (isTouch || reduced) return;
            document.querySelectorAll('.gallery-card').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const rotateX = ((y - rect.height / 2) / (rect.height / 2)) * -3;
                    const rotateY = ((x - rect.width / 2) / (rect.width / 2)) * 3;
                    card.style.transform =
                        `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-10px)`;
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                });
            });
        })();

        /* ─── Category Filter ─── */
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryCards = document.querySelectorAll('.gallery-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const filter = btn.dataset.filter;
                galleryCards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.classList.remove('hidden');
                        // re-trigger fade animation
                        card.classList.remove('visible');
                        setTimeout(() => card.classList.add('visible'), 50);
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        /* ─── Image Upload – Featured ─── */
        document.getElementById('featured-upload').addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('featured-img').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });

        /* ─── Image Upload – Gallery Cards ─── */
        document.querySelectorAll('.news-gallery .img-upload-input').forEach(input => {
            input.addEventListener('change', function () {
                const file = this.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = e => {
                    // find the img inside the same card-img-wrap
                    const wrap = this.closest('.card-img-wrap');
                    if (wrap) wrap.querySelector('img').src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>

</html>