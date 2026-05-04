<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Contact Us – Sachdeva Group</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="css/inline_styles.css" />
    <link rel="stylesheet" href="css/marine-footer.css" />
    <link rel="stylesheet" href="css/marine-header.css" />

    <!-- Agent App CSS -->
    <link rel="stylesheet" href="agentapp_static/180193f0_40d1_70d0_7dcd_e2aaa36334c6/f39xi1f8zu/styles.css" />




    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0a1628;
            --deep: #060e1c;
            --gold: #c9922a;
            --gold-light: #f0b94a;
            --gold-pale: #f5d98b;
            --rust: #8b2e0f;
            --steel: #4a6070;
            --silver: #b8c8d8;
            --white: #f5f0e8;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(180deg, rgba(6, 14, 28, 0.96) 0%, rgba(10, 22, 40, 0.97) 50%, rgba(6, 14, 28, 0.98) 100%),
                url('images/Environmental-Concerns.jpg') center top / cover no-repeat fixed;
            color: var(--white);
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 18%, rgba(201, 146, 42, 0.10), transparent 35%),
                radial-gradient(circle at 88% 82%, rgba(46, 125, 79, 0.08), transparent 35%);
            pointer-events: none;
            z-index: 0;
        }

        /* ─── CANVAS PARTICLES ─── */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            opacity: 0.35;
        }

        /* ─── SCROLLBAR ─── */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--deep);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 3px;
        }




        /* ─── HERO SECTION ─── */
        .hero {
            position: relative;
            height: 70vh;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            isolation: isolate;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(6, 14, 28, 0.45) 0%, rgba(6, 14, 28, 0.78) 100%),
                /* url('images/banner/aboutusbanner.png') center/cover no-repeat; */
                url('images/banner/contacus .png') center/cover no-repeat;
            animation: heroZoom 22s ease-in-out infinite alternate;
            transform-origin: center;
        }

        @keyframes heroZoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 25% 30%, rgba(201, 146, 42, 0.25), transparent 55%),
                radial-gradient(ellipse at 75% 70%, rgba(46, 125, 79, 0.20), transparent 55%),
                linear-gradient(135deg, rgba(10, 22, 40, 0.5) 0%, rgba(139, 46, 15, 0.15) 100%);
        }

        /* Animated wave layers at hero bottom */
        .hero-waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 140px;
            z-index: 1;
            pointer-events: none;
            overflow: hidden;
        }

        .hero-wave-svg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            animation: wave-shift 22s linear infinite;
        }

        .hero-wave-svg.w2 {
            animation-duration: 30s;
            opacity: 0.6;
        }

        .hero-wave-svg.w3 {
            animation-duration: 38s;
            opacity: 0.4;
        }

        @keyframes wave-shift {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* Sailing ship across hero */


        @keyframes ship-sail {
            0% {
                transform: translateX(-130%) translateY(0) rotate(0);
            }

            50% {
                transform: translateX(50%) translateY(-6px) rotate(-1.5deg);
            }

            100% {
                transform: translateX(220%) translateY(0) rotate(0);
            }
        }

        /* Bubble container */
        .hero-bubbles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 1;
        }

        .hero-bubbles span {
            position: absolute;
            bottom: -60px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.6), rgba(201, 146, 42, 0.12));
            border: 1px solid rgba(255, 255, 255, 0.18);
            animation: bubble-up linear infinite;
        }

        @keyframes bubble-up {
            0% {
                transform: translateY(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            100% {
                transform: translateY(-110vh);
                opacity: 0;
            }
        }

        /* rust/steel ship silhouette decorative line */
        .hero-stripe {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 5%;
            animation: fadeUp 1s ease 0.3s both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-breadcrumb {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 18px;
            font-family: 'Raleway', sans-serif;
            font-size: 0.78rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(245, 217, 139, 0.7);
        }

        .hero-breadcrumb i {
            font-size: 0.6rem;
        }

        .hero-breadcrumb span:last-child {
            color: var(--gold-light);
        }

        .hero-title {
            font-family: 'Inter', sans-serif;
            font-size: clamp(2rem, 5vw, 3.4rem);
            font-weight: 900;
            line-height: 1.1;
            background: linear-gradient(135deg, var(--white) 0%, var(--gold-pale) 40%, var(--gold) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
            text-shadow: none;
        }

        .hero-subtitle {
            font-family: 'Raleway', sans-serif;
            font-size: 1rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--silver);
            margin-bottom: 28px;
        }

        .hero-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 0;
        }

        .hero-divider::before,
        .hero-divider::after {
            content: '';
            flex: 1;
            max-width: 120px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold));
        }

        .hero-divider::after {
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .hero-divider i {
            color: var(--gold);
            font-size: 1.1rem;
        }

        /* ─── STATS BANNER (premium card layout) ─── */
        .stats-bar {
            position: relative;
            z-index: 2;
            padding: 70px 5%;
            background:
                linear-gradient(180deg, rgba(10, 22, 40, 0.94), rgba(20, 35, 60, 0.97), rgba(10, 22, 40, 0.94)),
                url('images/WasteManagement.png') center/cover no-repeat;
            border-top: 1px solid rgba(201, 146, 42, 0.3);
            border-bottom: 1px solid rgba(201, 146, 42, 0.3);
            overflow: hidden;
            isolation: isolate;
        }

        .stats-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
            background-size: 200% auto;
            animation: shimmer 4s linear infinite;
            z-index: 5;
        }

        .stats-bar::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(201, 146, 42, 0.16), transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(70, 197, 216, 0.12), transparent 50%);
            pointer-events: none;
        }

        .stats-inner {
            position: relative;
            z-index: 1;
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-card {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.04), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(201, 146, 42, 0.22);
            border-radius: 18px;
            padding: 32px 24px 28px;
            text-align: center;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            overflow: hidden;
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                background 0.4s ease,
                border-color 0.4s ease,
                box-shadow 0.4s ease;
        }

        .stat-card.in {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-card:nth-child(1).in {
            transition-delay: 0.05s;
        }

        .stat-card:nth-child(2).in {
            transition-delay: 0.18s;
        }

        .stat-card:nth-child(3).in {
            transition-delay: 0.30s;
        }

        .stat-card:nth-child(4).in {
            transition-delay: 0.42s;
        }

        /* Glow blob behind */
        .stat-card::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 146, 42, 0.18), transparent 70%);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 0;
        }

        /* Top stripe — scales on hover */
        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
            z-index: 2;
        }

        .stat-card:hover {
            background: linear-gradient(135deg, rgba(201, 146, 42, 0.10), rgba(255, 255, 255, 0.04));
            border-color: rgba(201, 146, 42, 0.55);
            box-shadow: 0 22px 50px rgba(0, 0, 0, 0.4), 0 0 30px rgba(201, 146, 42, 0.18);
            transform: translateY(-6px);
        }

        .stat-card:hover::after {
            transform: scaleX(1);
        }

        .stat-card:hover::before {
            transform: scale(1.6);
        }

        .stat-card>* {
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            margin: 0 auto 16px;
            background: linear-gradient(135deg, rgba(201, 146, 42, 0.22), rgba(201, 146, 42, 0.05));
            border: 1px solid rgba(201, 146, 42, 0.4);
            color: var(--gold-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            transition: transform 0.4s ease, background 0.4s ease;
        }

        .stat-card:hover .stat-icon {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--deep);
            transform: rotate(-8deg) scale(1.08);
        }

        .stat-num-row {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 4px;
            line-height: 1;
            margin-bottom: 12px;
        }

        .stat-number {
            font-family: 'Inter', sans-serif;
            font-size: 3.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--gold), var(--gold-light), var(--gold-pale));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            letter-spacing: -0.02em;
        }

        .stat-suffix {
            font-family: 'Inter', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gold);
            line-height: 1;
        }

        .stat-label {
            font-family: 'Inter', sans-serif;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--white);
            margin-bottom: 4px;
        }

        .stat-sub {
            font-family: 'Inter', sans-serif;
            font-size: 0.72rem;
            color: var(--silver);
            opacity: 0.7;
        }

        @media (max-width: 980px) {
            .stats-inner {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 540px) {
            .stats-inner {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .stats-bar {
                padding: 50px 6%;
            }

            .stat-number {
                font-size: 2.6rem;
            }
        }

        /* ─── MAIN CONTENT WRAPPER ─── */
        .main-content {
            position: relative;
            z-index: 1;
            padding: 80px 5%;
            max-width: 1300px;
            margin: 0 auto;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 50% 0%, rgba(201, 146, 42, 0.06), transparent 60%);
            pointer-events: none;
            z-index: -1;
        }

        /* ─── SECTION HEADING ─── */
        .section-heading {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-tag {
            display: inline-block;
            font-family: 'Raleway', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            border: 1px solid rgba(201, 146, 42, 0.4);
            padding: 5px 18px;
            border-radius: 50px;
            margin-bottom: 16px;
            animation: pulse-border 2.5s ease-in-out infinite;
        }

        @keyframes pulse-border {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(201, 146, 42, 0.3);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(201, 146, 42, 0);
            }
        }

        .section-title {
            font-family: 'Inter', sans-serif;
            font-size: clamp(1.6rem, 3vw, 2.4rem);
            font-weight: 700;
            color: var(--white);
            margin-bottom: 16px;
        }

        .section-title span {
            color: var(--gold-light);
        }

        .section-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .section-line::before,
        .section-line::after {
            content: '';
            width: 60px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold));
        }

        .section-line::after {
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .section-line-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gold);
        }

        /* ─── CONTACT CARDS GRID ─── */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            margin-bottom: 70px;
        }

        .contact-card {
            background: linear-gradient(135deg, rgba(10, 22, 40, 0.9), rgba(20, 35, 60, 0.8));
            border: 1px solid rgba(201, 146, 42, 0.15);
            border-radius: 12px;
            padding: 32px 24px;
            position: relative;
            overflow: hidden;
            transition: transform 0.4s, box-shadow 0.4s, border-color 0.4s;
            cursor: pointer;
            animation: fadeUp 0.8s ease both;
        }

        .contact-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .contact-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .contact-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .contact-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .contact-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(201, 146, 42, 0.05), transparent 60%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .contact-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 30px rgba(201, 146, 42, 0.1);
            border-color: rgba(201, 146, 42, 0.4);
        }

        .contact-card:hover::before {
            transform: scaleX(1);
        }

        .contact-card:hover::after {
            opacity: 1;
        }

        .card-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, rgba(201, 146, 42, 0.15), rgba(240, 185, 74, 0.1));
            border: 1px solid rgba(201, 146, 42, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: var(--gold-light);
            transition: transform 0.3s, background 0.3s;
        }

        .contact-card:hover .card-icon {
            transform: rotate(5deg) scale(1.1);
            background: linear-gradient(135deg, rgba(201, 146, 42, 0.3), rgba(240, 185, 74, 0.2));
        }

        .card-label {
            font-family: 'Raleway', sans-serif;
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .card-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 6px;
            line-height: 1.5;
        }

        .card-sub {
            font-size: 0.82rem;
            color: var(--silver);
            line-height: 1.6;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 14px;
            text-decoration: none;
            font-size: 0.78rem;
            letter-spacing: 1px;
            color: var(--gold-light);
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            transition: gap 0.3s;
        }

        .card-link:hover {
            gap: 10px;
            color: var(--gold-pale);
        }

        /* ─── PROFILE / REPRESENTATIVE SECTION ─── */
        .profile-section {
            background:
                linear-gradient(135deg, rgba(10, 22, 40, 0.94), rgba(15, 28, 50, 0.92)),
                url('images/environment1.jpg') right/cover no-repeat;
            border: 1px solid rgba(201, 146, 42, 0.2);
            border-radius: 16px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 280px 1fr;
            margin-bottom: 70px;
            animation: fadeUp 1s ease 0.3s both;
            position: relative;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.35);
        }

        .profile-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--gold), var(--gold-light), var(--gold));
        }

        .profile-left {
            background: linear-gradient(180deg, rgba(201, 146, 42, 0.08), rgba(201, 146, 42, 0.03));
            padding: 48px 32px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-right: 1px solid rgba(201, 146, 42, 0.15);
        }

        .profile-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--navy), var(--steel));
            border: 3px solid var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            color: var(--gold-light);
            margin-bottom: 20px;
            box-shadow: 0 0 0 6px rgba(201, 146, 42, 0.12), 0 0 40px rgba(201, 146, 42, 0.2);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .profile-name {
            font-family: 'Inter', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 6px;
        }

        .profile-role {
            font-family: 'Raleway', sans-serif;
            font-size: 0.75rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 16px;
        }

        .profile-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
        }

        .profile-tag {
            font-family: 'Raleway', sans-serif;
            font-size: 0.68rem;
            background: rgba(201, 146, 42, 0.1);
            border: 1px solid rgba(201, 146, 42, 0.25);
            color: var(--silver);
            padding: 3px 10px;
            border-radius: 50px;
        }

        .profile-right {
            padding: 48px 40px;
        }

        .profile-right h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.4rem;
            color: var(--gold-light);
            margin-bottom: 12px;
        }

        .profile-right p {
            color: var(--silver);
            line-height: 1.8;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }

        .profile-contacts {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 28px;
        }

        .profile-contact-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            background: rgba(201, 146, 42, 0.06);
            border: 1px solid rgba(201, 146, 42, 0.12);
            border-radius: 8px;
            transition: background 0.3s, border-color 0.3s;
        }

        .profile-contact-item:hover {
            background: rgba(201, 146, 42, 0.12);
            border-color: rgba(201, 146, 42, 0.3);
        }

        .profile-contact-item i {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: var(--deep);
            flex-shrink: 0;
        }

        .pci-info-label {
            font-family: 'Raleway', sans-serif;
            font-size: 0.65rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
        }

        .pci-info-val {
            font-size: 0.9rem;
            color: var(--white);
            font-weight: 600;
        }

        .profile-btns {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-gold {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 6px;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--deep);
            transition: box-shadow 0.3s, transform 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-gold::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s;
        }

        .btn-gold:hover::after {
            transform: translateX(100%);
        }

        .btn-gold:hover {
            box-shadow: 0 8px 30px rgba(201, 146, 42, 0.5);
            transform: translateY(-2px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 26px;
            border-radius: 6px;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            background: transparent;
            border: 2px solid rgba(201, 146, 42, 0.5);
            color: var(--gold-light);
            transition: background 0.3s, border-color 0.3s, transform 0.3s;
        }

        .btn-outline:hover {
            background: rgba(201, 146, 42, 0.1);
            border-color: var(--gold-light);
            transform: translateY(-2px);
        }

        /* ─── TWO COLUMN LAYOUT ─── */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 70px;
        }

        /* ─── INQUIRY FORM ─── */
        .form-panel {
            background:
                linear-gradient(135deg, rgba(10, 22, 40, 0.94), rgba(15, 28, 50, 0.92)),
                url('images/Environmental-Concerns.jpg') center/cover no-repeat;
            border: 1px solid rgba(201, 146, 42, 0.2);
            border-radius: 16px;
            padding: 40px 36px;
            animation: fadeUp 1s ease 0.2s both;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .form-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            background-size: 200% auto;
            animation: shimmer 4s linear infinite;
        }

        .form-panel>* {
            position: relative;
            z-index: 1;
        }

        .form-panel h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.3rem;
            color: var(--gold-light);
            margin-bottom: 6px;
        }

        .form-panel p {
            color: var(--silver);
            font-size: 0.85rem;
            margin-bottom: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 16px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-family: 'Raleway', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(201, 146, 42, 0.2);
            border-radius: 8px;
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: 0.88rem;
            padding: 12px 16px;
            outline: none;
            transition: border-color 0.3s, background 0.3s, box-shadow 0.3s;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(184, 200, 216, 0.4);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
            background: rgba(201, 146, 42, 0.05);
            box-shadow: 0 0 0 3px rgba(201, 146, 42, 0.12);
        }

        .form-group select option {
            background: var(--navy);
            color: var(--white);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 110px;
        }

        .phone-row {
            display: grid;
            grid-template-columns: 90px 1fr;
            gap: 10px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--deep);
            border: none;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: translateX(-100%);
        }

        .submit-btn:hover {
            box-shadow: 0 8px 30px rgba(201, 146, 42, 0.6);
            transform: translateY(-2px);
        }

        .submit-btn:hover::before {
            animation: btnShine 0.6s ease forwards;
        }

        @keyframes btnShine {
            to {
                transform: translateX(100%);
            }
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .submit-btn.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* ─── MAP PANEL ─── */
        .map-panel {
            background: linear-gradient(135deg, rgba(10, 22, 40, 0.94), rgba(15, 28, 50, 0.92));
            border: 1px solid rgba(201, 146, 42, 0.2);
            border-radius: 16px;
            overflow: hidden;
            animation: fadeUp 1s ease 0.35s both;
            display: flex;
            flex-direction: column;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .map-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
            background-size: 200% auto;
            animation: shimmer 4s linear infinite;
            z-index: 2;
        }

        .map-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(201, 146, 42, 0.15);
        }

        .map-header h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            color: var(--gold-light);
            margin-bottom: 4px;
        }

        .map-header p {
            font-size: 0.82rem;
            color: var(--silver);
        }

        .map-iframe-wrap {
            flex: 1;
            min-height: 300px;
            position: relative;
        }

        .map-iframe-wrap iframe {
            width: 100%;
            height: 100%;
            min-height: 280px;
            border: 0;
            filter: grayscale(40%) invert(90%) hue-rotate(180deg);
        }

        .map-overlay-card {
            position: absolute;
            bottom: 16px;
            left: 16px;
            background: rgba(6, 14, 28, 0.92);
            border: 1px solid rgba(201, 146, 42, 0.3);
            border-radius: 10px;
            padding: 14px 18px;
            backdrop-filter: blur(8px);
            max-width: 230px;
        }

        .map-overlay-card strong {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            color: var(--gold-light);
            margin-bottom: 4px;
        }

        .map-overlay-card span {
            font-size: 0.75rem;
            color: var(--silver);
            line-height: 1.5;
        }

        .map-footer {
            padding: 16px 28px;
            border-top: 1px solid rgba(201, 146, 42, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .map-footer i {
            color: var(--gold);
        }

        .map-footer span {
            font-size: 0.8rem;
            color: var(--silver);
        }

        .map-footer a {
            color: var(--gold-light);
            text-decoration: none;
        }

        .map-footer a:hover {
            text-decoration: underline;
        }

        /* ─── OPERATING HOURS ─── */
        .hours-section {
            background:
                linear-gradient(135deg, rgba(10, 22, 40, 0.94), rgba(15, 28, 50, 0.92)),
                url('images/WasteManagement.png') right/cover no-repeat;
            border: 1px solid rgba(201, 146, 42, 0.15);
            border-radius: 16px;
            padding: 36px 36px;
            margin-bottom: 70px;
            animation: fadeUp 1s ease both;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .hours-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--gold), var(--gold-light), var(--gold));
        }

        .hours-left h3 {
            font-family: 'Inter', sans-serif;
            font-size: 1.3rem;
            color: var(--gold-light);
            margin-bottom: 8px;
        }

        .hours-left p {
            color: var(--silver);
            font-size: 0.88rem;
            line-height: 1.7;
        }

        .hours-table {
            width: 100%;
            border-collapse: collapse;
        }

        .hours-table tr {
            border-bottom: 1px solid rgba(201, 146, 42, 0.1);
        }

        .hours-table td {
            padding: 10px 0;
            font-size: 0.85rem;
            color: var(--silver);
        }

        .hours-table td:last-child {
            text-align: right;
        }

        .hours-table .ht-today td {
            color: var(--gold-light);
            font-weight: 600;
        }

        .hours-table .ht-closed td:last-child {
            color: var(--rust);
        }

        .open-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(46, 160, 67, 0.15);
            border: 1px solid rgba(46, 160, 67, 0.3);
            color: #4caf50;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 14px;
        }

        .open-badge::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4caf50;
            animation: blink 1.2s ease-in-out infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }

        /* ─── SOCIAL MEDIA ─── */
        .social-section {
            text-align: center;
            margin-bottom: 70px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 28px;
        }

        .social-btn {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            text-decoration: none;
            border: 1px solid rgba(201, 146, 42, 0.2);
            color: var(--silver);
            background: rgba(10, 22, 40, 0.8);
            transition: transform 0.3s, background 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .social-btn.linkedin:hover {
            background: #0077b5;
            color: #fff;
            border-color: #0077b5;
        }

        .social-btn.facebook:hover {
            background: #1877f2;
            color: #fff;
            border-color: #1877f2;
        }

        .social-btn.twitter:hover {
            background: #1da1f2;
            color: #fff;
            border-color: #1da1f2;
        }

        .social-btn.youtube:hover {
            background: #ff0000;
            color: #fff;
            border-color: #ff0000;
        }

        .social-btn.whatsapp:hover {
            background: #25d366;
            color: #fff;
            border-color: #25d366;
        }

        .social-btn.email:hover {
            background: var(--gold);
            color: var(--deep);
            border-color: var(--gold);
        }

        /* ─── MARINE FOOTER ─── */
        .marine-footer {
            position: relative;
            margin-top: 80px;
            padding: 0;
            background:
                linear-gradient(180deg, rgba(6, 14, 28, 0.96) 0%, rgba(10, 22, 40, 0.98) 50%, rgba(3, 9, 18, 1) 100%),
                url('images/Environmental-Concerns.jpg') center/cover no-repeat;
            color: var(--white);
            overflow: hidden;
            isolation: isolate;
        }

        /* Waves at the very top of the footer */
        .footer-wave-stack {
            position: relative;
            height: 110px;
            background: transparent;
            overflow: hidden;
        }

        .footer-wave-stack svg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            animation: ftr-wave-shift 24s linear infinite;
        }

        .footer-wave-stack svg.fw2 {
            animation-duration: 32s;
            opacity: 0.55;
        }

        .footer-wave-stack svg.fw3 {
            animation-duration: 40s;
            opacity: 0.35;
        }

        @keyframes ftr-wave-shift {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* Sailing ship at the top of the footer */
        .footer-ship {
            position: absolute;
            top: 12px;
            left: 0;
            width: 90px;
            z-index: 3;
            animation: ftr-ship-sail 42s linear infinite;
            opacity: 0.85;
            filter: drop-shadow(0 4px 14px rgba(0, 0, 0, 0.4));
        }

        @keyframes ftr-ship-sail {
            0% {
                transform: translateX(-130%) translateY(0) rotate(0);
            }

            50% {
                transform: translateX(50%) translateY(-5px) rotate(-1.2deg);
            }

            100% {
                transform: translateX(220%) translateY(0) rotate(0);
            }
        }

        /* Bubbles inside the footer */
        .footer-bubbles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .footer-bubbles span {
            position: absolute;
            bottom: -50px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.4), rgba(201, 146, 42, 0.08));
            border: 1px solid rgba(255, 255, 255, 0.12);
            animation: ftr-bubble-up linear infinite;
        }

        @keyframes ftr-bubble-up {
            0% {
                transform: translateY(0);
                opacity: 0;
            }

            10% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-700px);
                opacity: 0;
            }
        }

        /* Glow blobs */
        .marine-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 18% 30%, rgba(201, 146, 42, 0.13), transparent 40%),
                radial-gradient(circle at 82% 70%, rgba(46, 125, 79, 0.12), transparent 40%);
            pointer-events: none;
            z-index: 1;
        }

        /* Inner content wrapper */
        .marine-footer-inner {
            position: relative;
            z-index: 2;
            max-width: 1300px;
            margin: 0 auto;
            padding: 60px 5% 0;
        }

        /* ─── BRAND STRIP (with anchor) ─── */
        .ftr-brand-strip {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 26px;
            padding: 18px 0 38px;
            position: relative;
        }

        .ftr-brand-strip::before,
        .ftr-brand-strip::after {
            content: '';
            flex: 1;
            max-width: 220px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(201, 146, 42, 0.45));
        }

        .ftr-brand-strip::after {
            background: linear-gradient(90deg, rgba(201, 146, 42, 0.45), transparent);
        }

        .ftr-anchor-wrap {
            position: relative;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 146, 42, 0.18), rgba(10, 22, 40, 0.4));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-light);
            font-size: 1.6rem;
            border: 1px solid rgba(201, 146, 42, 0.4);
        }

        .ftr-anchor-wrap::before {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            opacity: 0.45;
            animation: ftr-pulse 2.6s ease-out infinite;
        }

        .ftr-anchor-wrap::after {
            content: '';
            position: absolute;
            inset: -16px;
            border-radius: 50%;
            border: 1px dashed rgba(201, 146, 42, 0.3);
            animation: ftr-spin 18s linear infinite;
        }

        @keyframes ftr-pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.6);
                opacity: 0;
            }
        }

        @keyframes ftr-spin {
            from {
                transform: rotate(0);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .ftr-anchor-wrap i {
            animation: ftr-sway 4s ease-in-out infinite;
        }

        @keyframes ftr-sway {

            0%,
            100% {
                transform: rotate(-6deg);
            }

            50% {
                transform: rotate(6deg);
            }
        }

        /* ─── GRID ─── */
        .marine-footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.4fr 1.3fr;
            gap: 44px;
            padding-bottom: 50px;
        }

        .ftr-col h4 {
            font-family: 'Inter', sans-serif;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 22px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .ftr-col h4::before {
            content: '';
            width: 24px;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        /* About column */
        .ftr-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .ftr-logo img {
            height: 50px;
            width: auto;
            filter: drop-shadow(0 0 14px rgba(255, 255, 255, 0.18)) drop-shadow(0 0 22px rgba(201, 146, 42, 0.25));
        }

        .ftr-logo .ftr-logo-text {
            font-family: 'Inter', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1.2;
        }

        .ftr-logo .ftr-logo-text span {
            display: block;
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--gold-light);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 3px;
        }

        .ftr-about-text {
            color: rgba(245, 240, 232, 0.65);
            font-size: 0.88rem;
            line-height: 1.75;
            margin-bottom: 20px;
        }

        .ftr-trust-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            background: rgba(201, 146, 42, 0.08);
            border: 1px solid rgba(201, 146, 42, 0.3);
            border-radius: 50px;
            color: var(--gold-light);
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1px;
            position: relative;
        }

        .ftr-trust-badge i {
            color: var(--gold);
            font-size: 0.95rem;
        }

        .ftr-trust-badge::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50px;
            border: 1px solid var(--gold);
            opacity: 0;
            animation: ftr-trust-pulse 2.4s ease-out infinite;
        }

        @keyframes ftr-trust-pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.12);
                opacity: 0;
            }
        }

        /* Quick Links */
        .ftr-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ftr-links li {
            margin-bottom: 11px;
        }

        .ftr-links a {
            color: rgba(245, 240, 232, 0.7);
            text-decoration: none;
            font-size: 0.92rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease, gap 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .ftr-links a::before {
            content: '\f0da';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 0.7rem;
            color: var(--gold);
            opacity: 0.6;
            transition: 0.3s;
        }

        .ftr-links a:hover {
            color: var(--gold-light);
            gap: 14px;
            transform: translateX(2px);
        }

        .ftr-links a:hover::before {
            opacity: 1;
            color: var(--gold-light);
        }

        /* Companies */
        .ftr-companies {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ftr-companies li {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding: 14px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(201, 146, 42, 0.12);
            border-radius: 10px;
            margin-bottom: 12px;
            transition: 0.3s;
        }

        .ftr-companies li:hover {
            background: rgba(201, 146, 42, 0.08);
            border-color: rgba(201, 146, 42, 0.35);
            transform: translateX(4px);
        }

        .ftr-companies .cmp-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--deep);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.92rem;
        }

        .ftr-companies .cmp-text {
            font-size: 0.84rem;
            color: rgba(245, 240, 232, 0.85);
            line-height: 1.5;
        }

        .ftr-companies .cmp-text small {
            display: block;
            color: var(--gold-light);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        /* Contact Info */
        .ftr-contact {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .ftr-contact li {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .ftr-contact .ci-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: rgba(201, 146, 42, 0.12);
            border: 1px solid rgba(201, 146, 42, 0.3);
            color: var(--gold-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .ftr-contact li:hover .ci-icon {
            background: var(--gold);
            color: var(--deep);
            transform: rotate(-8deg) scale(1.05);
        }

        .ftr-contact .ci-meta {
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .ftr-contact .ci-meta b {
            display: block;
            color: var(--gold-light);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .ftr-contact .ci-meta a {
            color: rgba(245, 240, 232, 0.85);
            text-decoration: none;
            transition: color 0.3s;
        }

        .ftr-contact .ci-meta a:hover {
            color: var(--gold-light);
        }

        /* Social row */
        .ftr-social-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .ftr-social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(201, 146, 42, 0.25);
            color: rgba(245, 240, 232, 0.75);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 0.95rem;
            position: relative;
            transition: 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .ftr-social-btn::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 1.5px solid var(--gold);
            opacity: 0;
            transform: scale(0.85);
            transition: 0.35s;
        }

        .ftr-social-btn:hover {
            transform: translateY(-4px);
            background: var(--gold);
            color: var(--deep);
            border-color: var(--gold);
            box-shadow: 0 8px 22px rgba(201, 146, 42, 0.35);
        }

        .ftr-social-btn:hover::before {
            opacity: 0.6;
            transform: scale(1.18);
        }

        /* ─── BOTTOM BAR ─── */
        .marine-footer-bottom {
            position: relative;
            z-index: 2;
            border-top: 1px solid rgba(201, 146, 42, 0.18);
            padding: 22px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 0.82rem;
            color: rgba(245, 240, 232, 0.55);
            background: rgba(3, 9, 18, 0.6);
            backdrop-filter: blur(6px);
        }

        .marine-footer-bottom p i {
            color: var(--gold);
            margin: 0 6px;
            animation: ftr-sway 3s ease-in-out infinite;
            display: inline-block;
        }

        .ftr-bottom-links {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .ftr-bottom-links a {
            color: rgba(245, 240, 232, 0.65);
            text-decoration: none;
            transition: color 0.3s;
        }

        .ftr-bottom-links a:hover {
            color: var(--gold-light);
        }

        .ftr-bottom-links span {
            color: rgba(201, 146, 42, 0.4);
        }

        @media (max-width: 980px) {
            .marine-footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 32px;
            }
        }

        @media (max-width: 600px) {
            .marine-footer-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .marine-footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        /* ─── TOAST ─── */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #1a3020, #0f2018);
            border: 1px solid rgba(76, 175, 80, 0.4);
            border-radius: 12px;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 300px;
            z-index: 9999;
            transform: translateY(100px);
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast i {
            font-size: 1.3rem;
            color: #4caf50;
        }

        .toast-msg strong {
            display: block;
            color: #4caf50;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .toast-msg span {
            font-size: 0.78rem;
            color: var(--silver);
        }

        /* ─── SCROLL ANIMATIONS ─── */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .two-col {
                grid-template-columns: 1fr;
            }

            .profile-section {
                grid-template-columns: 1fr;
            }

            .profile-left {
                border-right: none;
                border-bottom: 1px solid rgba(201, 146, 42, 0.15);
                padding: 36px 24px;
            }

            .hours-section {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .profile-right {
                padding: 28px 24px;
            }
        }
    </style>
</head>

<body>

    <!-- ─── PARTICLES ─── -->
    <canvas id="particles-canvas"></canvas>

    <!-- ─── TOAST ─── -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <div class="toast-msg">
            <strong>Message Sent Successfully!</strong>
            <span>Our team will respond within 24 hours.</span>
        </div>
    </div>

    <!-- ─── NAVBAR ─── -->

    <?php include __DIR__ . '/includes/menu.php'; ?>
    <!-- ─── HERO ─── -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-bubbles" id="heroBubbles"></div>

        <!-- Sailing ship -->


        <!-- Animated waves -->
        <div class="hero-waves">
            <svg class="hero-wave-svg w3" viewBox="0 0 1440 140" preserveAspectRatio="none">
                <path d="M0,80 C240,40 480,120 720,80 C960,40 1200,120 1440,80 L1440,140 L0,140 Z"
                    fill="rgba(201,146,42,0.10)" />
                <path d="M1440,80 C1680,40 1920,120 2160,80 C2400,40 2640,120 2880,80 L2880,140 L1440,140 Z"
                    fill="rgba(201,146,42,0.10)" />
            </svg>
            <svg class="hero-wave-svg w2" viewBox="0 0 1440 140" preserveAspectRatio="none">
                <path d="M0,95 C240,60 480,130 720,95 C960,60 1200,130 1440,95 L1440,140 L0,140 Z"
                    fill="rgba(46,125,79,0.22)" />
                <path d="M1440,95 C1680,60 1920,130 2160,95 C2400,60 2640,130 2880,95 L2880,140 L1440,140 Z"
                    fill="rgba(46,125,79,0.22)" />
            </svg>
            <svg class="hero-wave-svg w1" viewBox="0 0 1440 140" preserveAspectRatio="none">
                <path d="M0,110 C220,85 440,135 720,110 C1000,85 1220,135 1440,110 L1440,140 L0,140 Z"
                    fill="rgba(6,14,28,0.92)" />
                <path d="M1440,110 C1660,85 1880,135 2160,110 C2440,85 2660,135 2880,110 L2880,140 L1440,140 Z"
                    fill="rgba(6,14,28,0.92)" />
            </svg>
        </div>

        <div class="hero-stripe"></div>
        <div class="hero-content">
            <div class="hero-breadcrumb">
                <a href="index.php" style="color:inherit;text-decoration:none;">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Contact Us</span>
            </div>
            <h1 class="hero-title">Get In Touch With Us</h1>
            <p class="hero-subtitle">Alang Ship Recycling Yard &bull; Gujarat, India</p>
            <div class="hero-divider"><i class="fas fa-anchor"></i></div>
        </div>
    </section>

    <!-- ─── STATS BAR (premium cards) ─── -->
    <section class="stats-bar">
        <div class="stats-inner">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-headset"></i></div>
                <div class="stat-num-row">
                    <span class="stat-number" data-count="24">0</span>
                    <span class="stat-suffix">/7</span>
                </div>
                <div class="stat-label">Always Available</div>
                <div class="stat-sub">Customer Support</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-clock-rotate-left"></i></div>
                <div class="stat-num-row">
                    <span class="stat-number" data-count="30">0</span>
                    <span class="stat-suffix">+</span>
                </div>
                <div class="stat-label">Years of Excellence</div>
                <div class="stat-sub">Maritime Heritage</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-ship"></i></div>
                <div class="stat-num-row">
                    <span class="stat-number" data-count="500">0</span>
                    <span class="stat-suffix">+</span>
                </div>
                <div class="stat-label">Vessels Recycled</div>
                <div class="stat-sub">Successful Projects</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-award"></i></div>
                <div class="stat-num-row">
                    <span class="stat-number" data-count="100">0</span>
                    <span class="stat-suffix">%</span>
                </div>
                <div class="stat-label">Client Satisfaction</div>
                <div class="stat-sub">Trusted Partner</div>
            </div>
        </div>
    </section>

    <!-- ─── MAIN CONTENT ─── -->
    <div class="main-content">

        <!-- Contact Info Cards -->
        <div class="section-heading reveal">
            <div class="section-tag">📍 Our Coordinates</div>
            <h2 class="section-title">Contact <span>Information</span></h2>
            <div class="section-line">
                <div class="section-line-dot"></div>
            </div>
        </div>

        <div class="contact-grid">
            <div class="contact-card reveal">
                <div class="card-icon"><i class="fas fa-building"></i></div>
                <div class="card-label">Head Office</div>
                <div class="card-value">Sachdeva Group</div>
                <div class="card-sub">Alang Ship Recycling Yard,<br>Bhavnagar District,<br>Gujarat – 364 210, India
                </div>
                <a href="https://maps.google.com" target="_blank" class="card-link">
                    View on Map <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="contact-card reveal">
                <div class="card-icon"><i class="fas fa-phone-volume"></i></div>
                <div class="card-label">Direct Lines</div>
                <div class="card-value">+91 9925499123</div>
                <div class="card-sub">Mobile / WhatsApp<br>+91 278 2429573<br>Office Landline</div>
                <a href="tel:+919925499123" class="card-link">
                    Call Now <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="contact-card reveal">
                <div class="card-icon"><i class="fas fa-envelope-open-text"></i></div>
                <div class="card-label">Email</div>
                <div class="card-value">info@sachdevagroup.in</div>
                <div class="card-sub">General Enquiries &amp; Business<br>Response within 24 hours</div>
                <a href="mailto:info@sachdevagroup.in" class="card-link">
                    Send Email <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="contact-card reveal">
                <div class="card-icon"><i class="fas fa-globe"></i></div>
                <div class="card-label">Website</div>
                <div class="card-value">www.sachdevagroup.in</div>
                <div class="card-sub">Ship Recycling &amp; Demolition<br>ISO Certified Facility</div>
                <a href="https://www.sachdevagroup.in" target="_blank" class="card-link">
                    Visit Site <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="section-heading reveal">
            <div class="section-tag">👤 View Profile</div>
            <h2 class="section-title">Business <span>Representative</span></h2>
            <div class="section-line">
                <div class="section-line-dot"></div>
            </div>
        </div>

        <div class="profile-section reveal">
            <div class="profile-left">
                <div class="profile-avatar"><i class="fas fa-user-tie"></i></div>
                <div class="profile-name">Mr. Devang Gujarati</div>
                <div class="profile-role">Director &amp; Key Contact</div>
                <div class="profile-tags">
                    <span class="profile-tag">Ship Recycling</span>
                    <span class="profile-tag">Steel Trading</span>
                    <span class="profile-tag">Maritime</span>
                    <span class="profile-tag">ISO Certified</span>
                </div>
            </div>
            <div class="profile-right">
                <h3>Senior Business Director</h3>
                <p>
                    Mr. Devang Gujarati leads Sachdeva Group's operations at the Alang Ship Recycling Yard — one of
                    India's largest and most respected ship-breaking facilities. With over two decades of maritime
                    industry experience, he oversees end-to-end vessel acquisition, demolition, and steel recovery
                    operations, maintaining the highest environmental and safety standards under the Hong Kong
                    Convention.
                </p>
                <div class="profile-contacts">
                    <div class="profile-contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <div>
                            <span class="pci-info-label">Mobile / WhatsApp</span>
                            <span class="pci-info-val">+91 9925499123</span>
                        </div>
                    </div>
                    <div class="profile-contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <span class="pci-info-label">Office Direct</span>
                            <span class="pci-info-val">+91 278 2429573</span>
                        </div>
                    </div>
                    <div class="profile-contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <span class="pci-info-label">Business Email</span>
                            <span class="pci-info-val">info@sachdevagroup.in</span>
                        </div>
                    </div>
                </div>
                <div class="profile-btns">
                    <a href="https://wa.me/919925499123" class="btn-gold" target="_blank">
                        <i class="fab fa-whatsapp"></i> WhatsApp Chat
                    </a>
                    <a href="mailto:info@sachdevagroup.in" class="btn-outline">
                        <i class="fas fa-paper-plane"></i> Send Email
                    </a>
                </div>
            </div>
        </div>

        <!-- Inquiry Form + Map -->
        <div class="section-heading reveal" id="inquiry">
            <div class="section-tag">✉️ Reach Out</div>
            <h2 class="section-title">Send an <span>Enquiry</span></h2>
            <div class="section-line">
                <div class="section-line-dot"></div>
            </div>
        </div>

        <div class="two-col">

            <!-- Form -->
            <div class="form-panel reveal">
                <h3>Business Inquiry Form</h3>
                <p>Fill in the details below and our team will get back to you promptly.</p>
                <form id="inquiry-form" onsubmit="handleSubmit(event)" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="John" required />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Doe" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="john@company.com" required />
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="phone-row">
                            <select>
                                <option>+91 🇮🇳</option>
                                <option>+1 🇺🇸</option>
                                <option>+44 🇬🇧</option>
                                <option>+971 🇦🇪</option>
                                <option>+65 🇸🇬</option>
                                <option>+81 🇯🇵</option>
                                <option>+49 🇩🇪</option>
                                <option>+86 🇨🇳</option>
                                <option>+82 🇰🇷</option>
                            </select>
                            <input type="tel" placeholder="98765 43210" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject / Service</label>
                        <select required>
                            <option value="" disabled selected>Select a subject…</option>
                            <option>Ship Demolition &amp; Recycling</option>
                            <option>Steel &amp; Scrap Purchase</option>
                            <option>Vessel Acquisition</option>
                            <option>Environmental Compliance</option>
                            <option>Business Partnership</option>
                            <option>General Enquiry</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea placeholder="Describe your vessel, tonnage, requirements, or enquiry…"
                            required></textarea>
                    </div>
                    <button type="submit" class="submit-btn" id="submit-btn">
                        <i class="fas fa-paper-plane" id="submit-icon"></i>
                        <span id="submit-text">Send Enquiry</span>
                    </button>
                </form>
            </div>

            <!-- Map -->
            <div class="map-panel reveal">
                <div class="map-header">
                    <h3><i class="fas fa-map-marker-alt" style="color:var(--gold);margin-right:8px;"></i>Find Us at
                        Alang Yard</h3>
                    <p>Alang Ship Recycling Yard, Bhavnagar, Gujarat — the world's largest ship breaking destination.
                    </p>
                </div>
                <div class="map-iframe-wrap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7405.093893085!2d72.1799!3d21.4052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f4e2b2a9b5b5b%3A0x0!2sAlang%2C+Gujarat!5e0!3m2!1sen!2sin!4v1700000000000"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="map-overlay-card">
                        <strong>Sachdeva Group</strong>
                        <span>Alang Ship Recycling Yard, Bhavnagar District, Gujarat – 364 210</span>
                    </div>
                </div>
                <div class="map-footer">
                    <i class="fas fa-directions"></i>
                    <span>Get directions via <a href="https://maps.google.com" target="_blank">Google Maps</a></span>
                </div>
            </div>
        </div>

        <!-- Operating Hours -->
        <div class="hours-section reveal">
            <div class="hours-left">
                <h3>Operating Hours</h3>
                <p>Our team is available across the week to handle vessel inquiries, port visits, and procurement
                    discussions. Emergency and critical operations are handled 24/7 by our on-site team at Alang Yard.
                </p>
                <div class="open-badge">Currently Open</div>
            </div>
            <div>
                <table class="hours-table">
                    <tbody>
                        <tr class="ht-today">
                            <td><strong>Monday</strong></td>
                            <td>09:00 AM – 06:30 PM</td>
                        </tr>
                        <tr class="ht-today">
                            <td><strong>Tuesday</strong></td>
                            <td>09:00 AM – 06:30 PM</td>
                        </tr>
                        <tr class="ht-today">
                            <td><strong>Wednesday</strong></td>
                            <td>09:00 AM – 06:30 PM</td>
                        </tr>
                        <tr class="ht-today">
                            <td><strong>Thursday</strong></td>
                            <td>09:00 AM – 06:30 PM</td>
                        </tr>
                        <tr class="ht-today">
                            <td><strong>Friday</strong></td>
                            <td>09:00 AM – 06:30 PM</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>10:00 AM – 04:00 PM</td>
                        </tr>
                        <tr class="ht-closed">
                            <td>Sunday</td>
                            <td>Emergency Only</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Social Links -->
        <div class="social-section reveal">
            <div class="section-tag">🌐 Follow Us</div>
            <h2 class="section-title" style="margin-top:12px;">Connect on <span>Social Media</span></h2>
            <div class="social-icons">
                <a href="#" class="social-btn linkedin" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-btn facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn twitter" title="Twitter / X"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="social-btn youtube" title="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="https://wa.me/919925499123" class="social-btn whatsapp" title="WhatsApp" target="_blank"><i
                        class="fab fa-whatsapp"></i></a>
                <a href="mailto:info@sachdevagroup.in" class="social-btn email" title="Email"><i
                        class="fas fa-envelope"></i></a>
            </div>
        </div>

    </div><!-- /main-content -->

    <!-- ─── MARINE ANIMATED FOOTER ─── -->
    <footer id="footer" class="marine-footer">
        <!-- Floating bubbles -->
        <div class="footer-bubbles" id="footerBubbles"></div>

        <div class="marine-footer-inner">

            <!-- Main grid -->
            <div class="marine-footer-grid">
                <!-- About column -->
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

                <!-- Quick Links -->
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

                <!-- Our Companies -->
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

                <!-- Contact Info -->
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
                        <a href="https://wa.me/919925499123" target="_blank" class="ftr-social-btn" title="WhatsApp"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="marine-footer-bottom">
            <p>©
                <?= date('Y') ?> Sachdeva Group. Crafted <i class="fas fa-anchor"></i> for the seas. All rights
                reserved.
            </p>
            <div class="ftr-bottom-links">
                <a href="#">Privacy Policy</a>
                <span>•</span>
                <a href="#">Terms of Service</a>
                <span>•</span>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </footer>

    <!-- ─── SCRIPTS ─── -->
    <script>
        /* ── Particles ── */
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);
        for (let i = 0; i < 70; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                r: Math.random() * 1.8 + 0.4,
                dx: (Math.random() - 0.5) * 0.3,
                dy: -Math.random() * 0.5 - 0.1,
                alpha: Math.random() * 0.5 + 0.2,
            });
        }
        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(201,146,42,${p.alpha})`;
                ctx.fill();
                p.x += p.dx; p.y += p.dy;
                if (p.y < -10) { p.y = canvas.height + 10; p.x = Math.random() * canvas.width; }
                if (p.x < 0) p.x = canvas.width;
                if (p.x > canvas.width) p.x = 0;
            });
            requestAnimationFrame(animateParticles);
        }
        animateParticles();

        /* ── Navbar scroll effect ── */
        (function () {
            const hdr = document.getElementById('header');
            if (!hdr) return;
            window.addEventListener('scroll', () => {
                hdr.classList.toggle('scrolled', window.scrollY > 60);
            });
        })();

        /* ── Hero bubble generator ── */
        (function () {
            const wrap = document.getElementById('heroBubbles');
            if (!wrap) return;
            for (let i = 0; i < 18; i++) {
                const b = document.createElement('span');
                const size = 8 + Math.random() * 28;
                b.style.width = size + 'px';
                b.style.height = size + 'px';
                b.style.left = Math.random() * 100 + '%';
                b.style.animationDuration = (12 + Math.random() * 18) + 's';
                b.style.animationDelay = (-Math.random() * 22) + 's';
                b.style.opacity = (0.25 + Math.random() * 0.45).toFixed(2);
                wrap.appendChild(b);
            }
        })();

        /* ── Footer bubble generator ── */
        (function () {
            const wrap = document.getElementById('footerBubbles');
            if (!wrap) return;
            for (let i = 0; i < 14; i++) {
                const b = document.createElement('span');
                const size = 6 + Math.random() * 22;
                b.style.width = size + 'px';
                b.style.height = size + 'px';
                b.style.left = Math.random() * 100 + '%';
                b.style.animationDuration = (14 + Math.random() * 16) + 's';
                b.style.animationDelay = (-Math.random() * 18) + 's';
                b.style.opacity = (0.2 + Math.random() * 0.35).toFixed(2);
                wrap.appendChild(b);
            }
        })();

        /* ── Mobile menu toggle ── */
        (function () {
            const mt = document.getElementById('mobileMenuToggle');
            const nm = document.getElementById('navMenu');
            if (mt && nm) {
                mt.addEventListener('click', () => {
                    mt.classList.toggle('active');
                    nm.classList.toggle('active');
                });
            }
        })();

        /* ── Counter animation ── */
        function animateCounter(el, target, duration) {
            let start = 0, step = target / (duration / 16);
            const timer = setInterval(() => {
                start += step;
                el.textContent = Math.floor(start);
                if (start >= target) { el.textContent = target + (el.dataset.suffix || ''); clearInterval(timer); }
            }, 16);
        }
        const counters = document.querySelectorAll('[data-count]');
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    animateCounter(e.target, parseInt(e.target.dataset.count), 1800);
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.3 });
        counters.forEach(c => obs.observe(c));

        /* ── Scroll reveal ── */
        const reveals = document.querySelectorAll('.reveal');
        const revObs = new IntersectionObserver(entries => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add('visible'), 80 * (Array.from(reveals).indexOf(e.target) % 4));
                    revObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        reveals.forEach(r => revObs.observe(r));

        /* ── Stat cards entrance ── */
        (function () {
            const cards = document.querySelectorAll('.stat-card');
            const io = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.15 });
            cards.forEach(c => io.observe(c));
        })();

        /* ── Form submit ── */
        function handleSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('submit-btn');
            const icon = document.getElementById('submit-icon');
            const text = document.getElementById('submit-text');
            btn.classList.add('loading');
            icon.className = 'fas fa-spinner';
            text.textContent = 'Sending…';
            setTimeout(() => {
                btn.classList.remove('loading');
                icon.className = 'fas fa-check';
                text.textContent = 'Sent Successfully!';
                btn.style.background = 'linear-gradient(135deg, #2ecc71, #27ae60)';
                document.getElementById('inquiry-form').reset();
                const toast = document.getElementById('toast');
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 4500);
                setTimeout(() => {
                    icon.className = 'fas fa-paper-plane';
                    text.textContent = 'Send Enquiry';
                    btn.style.background = '';
                }, 3000);
            }, 1800);
        }
    </script>
</body>

</html>