<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Raj Mukut - Full-Stack Web Developer Portfolio">
    <title>{{ $profile->name ?? 'Raj Mukut' }} | Full-Stack Developer</title>

    <style>
        /* =========================================================
           01. ROOT / RESET
        ========================================================= */

        :root {
            --bg: #06070b;
            --bg-soft: #0b0d14;
            --card: rgba(255, 255, 255, 0.055);
            --card-hover: rgba(255, 255, 255, 0.09);
            --border: rgba(255, 255, 255, 0.10);
            --text: #f5f7ff;
            --muted: #9da4b7;
            --purple: #7c5cff;
            --purple-2: #a855f7;
            --blue: #38bdf8;
            --green: #34d399;
            --shadow: 0 30px 80px rgba(0, 0, 0, .35);
            --radius: 24px;
            --container: 1180px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background:
                radial-gradient(circle at 20% 10%, rgba(124, 92, 255, .08), transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(56, 189, 248, .06), transparent 30%),
                var(--bg);

            color: var(--text);
            overflow-x: hidden;
            line-height: 1.6;
        }

        body.menu-open {
            overflow: hidden;
        }

        ::selection {
            background: var(--purple);
            color: white;
        }

        ::-webkit-scrollbar {
            width: 9px;
        }

        ::-webkit-scrollbar-track {
            background: #05060a;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--purple), var(--purple-2));
            border-radius: 20px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            width: min(92%, var(--container));
            margin-inline: auto;
        }

        section {
            position: relative;
            padding: 110px 0;
        }

        /* =========================================================
           02. BACKGROUND
        ========================================================= */

        .background-grid {
            position: fixed;
            inset: 0;
            z-index: -8;
            pointer-events: none;

            background-image:
                linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);

            background-size: 55px 55px;

            mask-image:
                linear-gradient(
                    to bottom,
                    rgba(0,0,0,.8),
                    transparent 90%
                );
        }

        .noise {
            position: fixed;
            inset: 0;
            z-index: -6;
            pointer-events: none;
            opacity: .025;

            background-image:
                repeating-radial-gradient(
                    circle at 0 0,
                    transparent 0,
                    rgba(255,255,255,.9) 1px,
                    transparent 2px
                );

            background-size: 8px 8px;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(90px);
            opacity: .22;
            pointer-events: none;
            z-index: -7;
        }

        .orb-one {
            width: 380px;
            height: 380px;
            background: var(--purple);
            top: -120px;
            left: -100px;
            animation: orbOne 15s ease-in-out infinite alternate;
        }

        .orb-two {
            width: 450px;
            height: 450px;
            background: #2563eb;
            right: -180px;
            top: 35%;
            animation: orbTwo 19s ease-in-out infinite alternate;
        }

        .orb-three {
            width: 300px;
            height: 300px;
            background: var(--purple-2);
            left: 35%;
            bottom: -160px;
            animation: orbThree 17s ease-in-out infinite alternate;
        }

        @keyframes orbOne {
            to {
                transform: translate(220px, 170px) scale(1.2);
            }
        }

        @keyframes orbTwo {
            to {
                transform: translate(-200px, -120px) scale(.85);
            }
        }

        @keyframes orbThree {
            to {
                transform: translate(120px, -220px) scale(1.25);
            }
        }

        /* =========================================================
           03. PARTICLES
        ========================================================= */

        #particles {
            position: fixed;
            inset: 0;
            z-index: -5;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.65);
            animation: particleFloat linear infinite;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(110vh) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: .45;
            }

            80% {
                opacity: .25;
            }

            100% {
                transform: translateY(-20vh) translateX(100px);
                opacity: 0;
            }
        }

        /* =========================================================
           04. CURSOR GLOW
        ========================================================= */

        .cursor-glow {
            position: fixed;
            width: 350px;
            height: 350px;
            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(124,92,255,.13),
                    rgba(124,92,255,.03) 40%,
                    transparent 70%
                );

            pointer-events: none;
            z-index: -4;

            transform: translate(-50%, -50%);
            transition:
                left .08s linear,
                top .08s linear;
        }

        /* =========================================================
           05. NAVBAR
        ========================================================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;

            transition: .35s ease;
        }

        .navbar.scrolled {
            background: rgba(6, 7, 11, .75);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            height: 82px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .logo span {
            color: var(--purple);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 34px;
            list-style: none;
        }

        .nav-links a {
            position: relative;
            color: var(--muted);
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
        }

        .nav-links a::after {
            content: "";
            position: absolute;

            width: 0;
            height: 2px;

            left: 0;
            bottom: -7px;

            background: linear-gradient(
                90deg,
                var(--purple),
                var(--blue)
            );

            transition: .3s;
        }

        .nav-links a:hover {
            color: white;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-contact {
            padding: 11px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: rgba(255,255,255,.04);
        }

        .menu-button {
            display: none;

            width: 45px;
            height: 45px;

            border-radius: 12px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,.05);

            align-items: center;
            justify-content: center;

            flex-direction: column;
            gap: 5px;
        }

        .menu-button span {
            width: 20px;
            height: 2px;
            background: white;
            transition: .3s;
        }

        /* =========================================================
           06. HERO
        ========================================================= */

        .hero {
            min-height: 100vh;
            padding-top: 130px;

            display: flex;
            align-items: center;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            align-items: center;
            gap: 70px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .status-badge {
            width: fit-content;

            display: flex;
            align-items: center;
            gap: 10px;

            padding: 8px 14px;

            border: 1px solid rgba(52,211,153,.2);
            border-radius: 100px;

            background: rgba(52,211,153,.06);

            color: #a7f3d0;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;

            margin-bottom: 25px;

            animation: fadeUp .8s ease both;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);

            box-shadow:
                0 0 0 5px rgba(52,211,153,.08),
                0 0 20px rgba(52,211,153,.8);

            animation: statusPulse 2s infinite;
        }

        @keyframes statusPulse {
            50% {
                box-shadow:
                    0 0 0 9px rgba(52,211,153,0),
                    0 0 25px rgba(52,211,153,.9);
            }
        }

        .hero-small {
            color: #b3b8c8;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 16px;

            animation: fadeUp .8s .1s ease both;
        }

        .hero h1 {
            font-size: clamp(56px, 7vw, 100px);
            line-height: .93;
            letter-spacing: -6px;
            font-weight: 900;

            animation: fadeUp .9s .2s ease both;
        }

        .gradient-text {
            display: inline-block;

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #9d8cff,
                    #38bdf8,
                    #ffffff
                );

            background-size: 300% auto;

            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;

            animation: gradientMove 5s linear infinite;
        }

        @keyframes gradientMove {
            to {
                background-position: 300% center;
            }
        }

        .typing-row {
            min-height: 45px;

            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 25px;

            font-size: clamp(19px, 2vw, 26px);
            color: #c7cad4;

            animation: fadeUp .9s .3s ease both;
        }

        #typing {
            color: #a999ff;
            font-weight: 800;
        }

        .typing-cursor {
            width: 2px;
            height: 27px;
            background: var(--purple);
            animation: blink .8s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .hero-description {
            max-width: 630px;
            margin-top: 22px;

            color: var(--muted);
            font-size: 17px;
            line-height: 1.85;

            animation: fadeUp .9s .4s ease both;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-top: 34px;

            animation: fadeUp .9s .5s ease both;
        }

        .button {
            position: relative;
            overflow: hidden;

            min-height: 52px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            padding: 0 23px;

            border-radius: 13px;
            border: 1px solid var(--border);

            font-size: 14px;
            font-weight: 800;

            transition:
                transform .3s,
                box-shadow .3s,
                background .3s;
        }

        .button-primary {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    #6246ea
                );

            box-shadow:
                0 15px 40px rgba(124,92,255,.23);
        }

        .button-primary::before {
            content: "";
            position: absolute;
            top: -100%;
            left: -40%;

            width: 30%;
            height: 300%;

            transform: rotate(25deg);

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.35),
                    transparent
                );

            transition: .6s;
        }

        .button-primary:hover::before {
            left: 120%;
        }

        .button-primary:hover {
            transform: translateY(-4px);
            box-shadow:
                0 20px 50px rgba(124,92,255,.35);
        }

        .button-secondary {
            background: rgba(255,255,255,.04);
            backdrop-filter: blur(10px);
        }

        .button-secondary:hover {
            transform: translateY(-4px);
            background: rgba(255,255,255,.08);
        }

        .hero-socials {
            display: flex;
            align-items: center;
            gap: 20px;

            margin-top: 35px;

            color: #7f8597;
            font-size: 13px;

            animation: fadeUp .9s .6s ease both;
        }

        .hero-socials a {
            transition: .3s;
        }

        .hero-socials a:hover {
            color: white;
            transform: translateY(-2px);
        }

        /* =========================================================
           07. HERO VISUAL
        ========================================================= */

        .hero-visual {
            position: relative;
            height: 570px;

            display: flex;
            align-items: center;
            justify-content: center;

            animation: fadeIn 1.2s .4s ease both;
        }

        .visual-glow {
            position: absolute;

            width: 390px;
            height: 390px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(124,92,255,.28),
                    rgba(56,189,248,.06) 45%,
                    transparent 70%
                );

            filter: blur(10px);

            animation: visualGlow 5s ease-in-out infinite alternate;
        }

        @keyframes visualGlow {
            to {
                transform: scale(1.18);
                opacity: .7;
            }
        }

        .visual-ring {
            position: absolute;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            border:
                1px solid rgba(255,255,255,.09);

            animation: ringRotate 18s linear infinite;
        }

        .visual-ring::before,
        .visual-ring::after {
            content: "";
            position: absolute;
            border-radius: 50%;
        }

        .visual-ring::before {
            width: 11px;
            height: 11px;

            top: 40px;
            left: 70px;

            background: var(--purple);

            box-shadow:
                0 0 30px var(--purple);
        }

        .visual-ring::after {
            width: 8px;
            height: 8px;

            right: 45px;
            bottom: 80px;

            background: var(--blue);

            box-shadow:
                0 0 30px var(--blue);
        }

        .visual-ring-two {
            position: absolute;

            width: 330px;
            height: 330px;

            border-radius: 50%;

            border:
                1px dashed rgba(124,92,255,.2);

            animation: ringRotate 13s linear infinite reverse;
        }

        @keyframes ringRotate {
            to {
                transform: rotate(360deg);
            }
        }

        .developer-card {
            position: relative;
            z-index: 4;

            width: 300px;
            min-height: 365px;

            padding: 25px;

            border: 1px solid rgba(255,255,255,.12);
            border-radius: 30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.10),
                    rgba(255,255,255,.025)
                );

            backdrop-filter: blur(20px);

            box-shadow: var(--shadow);

            animation: cardFloat 5s ease-in-out infinite;
        }

        @keyframes cardFloat {
            50% {
                transform: translateY(-16px) rotate(1deg);
            }
        }

        .avatar {
            height: 210px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 22px;

            background:
                radial-gradient(
                    circle at 50% 30%,
                    rgba(124,92,255,.32),
                    rgba(20,20,30,.7) 65%
                );

            border: 1px solid var(--border);

            overflow: hidden;
        }

        .avatar-code {
            font-size: 72px;
            font-weight: 900;
            letter-spacing: -8px;

            background:
                linear-gradient(
                    135deg,
                    white,
                    var(--purple),
                    var(--blue)
                );

            -webkit-background-clip: text;
            color: transparent;
        }

        .developer-card h3 {
            margin-top: 20px;
            font-size: 20px;
        }

        .developer-card p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .developer-status {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 15px;

            color: #a7f3d0;
            font-size: 12px;
            font-weight: 700;
        }

        .floating-card {
            position: absolute;
            z-index: 6;

            padding: 13px 17px;

            border: 1px solid var(--border);
            border-radius: 15px;

            background: rgba(10,11,17,.75);
            backdrop-filter: blur(15px);

            box-shadow: var(--shadow);

            font-size: 12px;
            font-weight: 800;

            animation: floatingMini 4s ease-in-out infinite;
        }

        .float-one {
            top: 90px;
            left: 10px;
        }

        .float-two {
            right: 0;
            top: 200px;
            animation-delay: 1s;
        }

        .float-three {
            bottom: 75px;
            left: 30px;
            animation-delay: 2s;
        }

        @keyframes floatingMini {
            50% {
                transform: translateY(-12px);
            }
        }

        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;

            transform: translateX(-50%);

            color: #6f7484;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .scroll-down::after {
            content: "";
            display: block;

            width: 1px;
            height: 40px;

            margin: 12px auto 0;

            background:
                linear-gradient(
                    var(--purple),
                    transparent
                );

            animation: scrollLine 1.8s infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: scaleY(0);
                transform-origin: top;
            }

            50% {
                transform: scaleY(1);
                transform-origin: top;
            }

            51% {
                transform-origin: bottom;
            }

            100% {
                transform: scaleY(0);
                transform-origin: bottom;
            }
        }


        /* =========================================================
           DYNAMIC PROFILE / PROJECT IMAGES
        ========================================================= */

        /* =========================================
   PROFILE PHOTO - PORTRAIT FIT
========================================= */

.avatar.has-photo {
    width: 190px;
    height: 230px;

    margin-left: auto;
    margin-right: auto;

    padding: 0;

    position: relative;
    overflow: hidden;

    border-radius: 22px;

    background: transparent;
}

.avatar.has-photo .avatar-photo {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
    object-position: center top;

    border-radius: 22px;

    transition:
        transform .5s ease,
        filter .5s ease;
}

.developer-card:hover .avatar.has-photo .avatar-photo {
    transform: scale(1.02);
}
        .project-real-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
            z-index: 2;
            transition: transform .55s ease;
        }

        .project-card:hover .project-real-image {
            transform: scale(1.045);
        }

        .featured-label {
            position: absolute;
            top: 18px;
            left: 18px;
            z-index: 5;
            padding: 7px 11px;
            border: 1px solid rgba(124,92,255,.35);
            border-radius: 100px;
            background: rgba(6,7,11,.82);
            backdrop-filter: blur(12px);
            color: #c4baff;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-alert {
            grid-column: 1 / -1;
            padding: 13px 15px;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .form-alert.success {
            border: 1px solid rgba(52,211,153,.25);
            background: rgba(52,211,153,.07);
            color: #a7f3d0;
        }

        .form-alert.error {
            border: 1px solid rgba(251,113,133,.25);
            background: rgba(251,113,133,.07);
            color: #fda4af;
        }

        /* =========================================================
           08. SECTION TITLES
        ========================================================= */

        .section-heading {
            margin-bottom: 55px;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            color: #9e8dff;

            font-size: 11px;
            font-weight: 900;

            letter-spacing: 3px;
            text-transform: uppercase;

            margin-bottom: 14px;
        }

        .section-label::before {
            content: "";
            width: 30px;
            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    var(--purple),
                    transparent
                );
        }

        .section-heading h2 {
            font-size: clamp(38px, 5vw, 64px);
            letter-spacing: -3px;
            line-height: 1.05;
        }

        .section-heading p {
            max-width: 610px;
            color: var(--muted);
            margin-top: 18px;
            line-height: 1.8;
        }

        /* =========================================================
           09. ABOUT
        ========================================================= */

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: center;
        }

        .about-card {
            position: relative;
            overflow: hidden;

            padding: 35px;

            border: 1px solid var(--border);
            border-radius: var(--radius);

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.065),
                    rgba(255,255,255,.02)
                );

            box-shadow: var(--shadow);
        }

        .about-card::before {
            content: "";
            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(124,92,255,.15);
            filter: blur(50px);

            top: -80px;
            right: -60px;
        }

        .code-window {
            position: relative;
            z-index: 2;
        }

        .window-top {
            display: flex;
            align-items: center;
            gap: 7px;

            padding-bottom: 18px;
            border-bottom: 1px solid var(--border);
        }

        .window-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #555;
        }

        .window-dot:nth-child(1) {
            background: #fb7185;
        }

        .window-dot:nth-child(2) {
            background: #facc15;
        }

        .window-dot:nth-child(3) {
            background: #4ade80;
        }

        .code-lines {
            padding-top: 25px;
            font-family: Consolas, monospace;
            font-size: 13px;
            line-height: 2;
            color: #9da4b7;
        }

        .code-purple {
            color: #c084fc;
        }

        .code-blue {
            color: #7dd3fc;
        }

        .code-green {
            color: #86efac;
        }

        .code-white {
            color: #e5e7eb;
        }

        .about-content h3 {
            font-size: 31px;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .about-content > p {
            color: var(--muted);
            line-height: 1.9;
            margin-bottom: 17px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;

            margin-top: 30px;
        }

        .stat {
            padding: 20px 14px;

            border: 1px solid var(--border);
            border-radius: 16px;

            background: rgba(255,255,255,.035);

            text-align: center;

            transition: .3s;
        }

        .stat:hover {
            transform: translateY(-6px);
            background: rgba(255,255,255,.065);
        }

        .stat-number {
            display: block;

            font-size: 27px;
            font-weight: 900;

            background:
                linear-gradient(
                    90deg,
                    white,
                    #a999ff
                );

            -webkit-background-clip: text;
            color: transparent;
        }

        .stat-label {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        /* =========================================================
           10. SKILLS
        ========================================================= */

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .skill-card {
            position: relative;
            overflow: hidden;

            padding: 26px;

            border: 1px solid var(--border);
            border-radius: 20px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.055),
                    rgba(255,255,255,.018)
                );

            transition:
                transform .35s,
                border-color .35s,
                background .35s;
        }

        .skill-card::after {
            content: "";
            position: absolute;

            width: 100px;
            height: 100px;

            border-radius: 50%;

            right: -50px;
            top: -50px;

            background: rgba(124,92,255,.12);
            filter: blur(30px);

            transition: .4s;
        }

        .skill-card:hover {
            transform: translateY(-8px);
            border-color: rgba(124,92,255,.35);
            background: rgba(255,255,255,.065);
        }

        .skill-card:hover::after {
            transform: scale(1.7);
        }

        .skill-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .skill-name {
            font-size: 16px;
            font-weight: 800;
        }

        .skill-percent {
            color: #9e8dff;
            font-size: 12px;
            font-weight: 800;
        }

        .skill-bar {
            height: 5px;
            border-radius: 20px;
            background: rgba(255,255,255,.07);
            overflow: hidden;
        }

        .skill-progress {
            width: 0;
            height: 100%;

            border-radius: inherit;

            background:
                linear-gradient(
                    90deg,
                    var(--purple),
                    var(--blue)
                );

            box-shadow:
                0 0 20px rgba(124,92,255,.4);

            transition: width 1.5s cubic-bezier(.2,.8,.2,1);
        }

        .skill-card p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 15px;
        }

        /* =========================================================
           11. SERVICES
        ========================================================= */

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .service-card {
            min-height: 280px;
            position: relative;
            overflow: hidden;

            padding: 30px;

            border: 1px solid var(--border);
            border-radius: 22px;

            background: rgba(255,255,255,.035);

            transition: .35s;
        }

        .service-card:hover {
            transform: translateY(-8px);
            border-color: rgba(124,92,255,.3);
        }

        .service-number {
            color: rgba(255,255,255,.12);
            font-size: 48px;
            font-weight: 900;
            line-height: 1;
        }

        .service-card h3 {
            font-size: 21px;
            margin-top: 45px;
        }

        .service-card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            margin-top: 12px;
        }

        .service-line {
            position: absolute;

            width: 80px;
            height: 2px;

            bottom: 30px;
            left: 30px;

            background:
                linear-gradient(
                    90deg,
                    var(--purple),
                    transparent
                );

            transition: .4s;
        }

        .service-card:hover .service-line {
            width: calc(100% - 60px);
        }

        /* =========================================================
           12. PROJECTS
        ========================================================= */

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .project-card {
            position: relative;
            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 25px;

            background: rgba(255,255,255,.035);

            transition:
                transform .4s,
                border-color .4s;
        }

        .project-card:hover {
            border-color: rgba(124,92,255,.35);
        }

        .project-image {
            height: 300px;
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    #10131c,
                    #0a0c12
                );

            border-bottom: 1px solid var(--border);
        }

        .project-image::before {
            content: "";
            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(124,92,255,.32),
                    transparent 68%
                );

            transition: .5s;
        }

        .project-card:hover .project-image::before {
            transform: scale(1.4);
        }

        .project-mockup {
            position: relative;
            z-index: 2;

            width: 72%;
            height: 62%;

            border: 1px solid rgba(255,255,255,.13);
            border-radius: 12px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.09),
                    rgba(255,255,255,.025)
                );

            box-shadow:
                0 25px 50px rgba(0,0,0,.4);

            transform:
                perspective(900px)
                rotateX(5deg)
                rotateY(-8deg);

            transition: .5s;
        }

        .project-card:hover .project-mockup {
            transform:
                perspective(900px)
                rotateX(0)
                rotateY(0)
                scale(1.04);
        }

        .mockup-bar {
            height: 25px;
            border-bottom: 1px solid var(--border);
        }

        .mockup-content {
            padding: 16px;
        }

        .mockup-line {
            height: 7px;
            border-radius: 10px;
            background: rgba(255,255,255,.1);
            margin-bottom: 10px;
        }

        .mockup-line:nth-child(1) {
            width: 55%;
            background: rgba(124,92,255,.5);
        }

        .mockup-line:nth-child(2) {
            width: 80%;
        }

        .mockup-line:nth-child(3) {
            width: 65%;
        }

        .mockup-boxes {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 8px;
            margin-top: 17px;
        }

        .mockup-box {
            height: 50px;
            border-radius: 7px;
            background: rgba(255,255,255,.055);
        }

        .project-content {
            padding: 28px;
        }

        .project-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
        }

        .project-number {
            color: #7365cb;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .project-content h3 {
            font-size: 24px;
            margin-top: 6px;
        }

        .project-content p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            margin-top: 12px;
        }

        .project-arrow {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 50%;

            transition: .3s;
        }

        .project-card:hover .project-arrow {
            transform: rotate(45deg);
            background: var(--purple);
            border-color: transparent;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;

            margin-top: 20px;
        }

        .tag {
            padding: 6px 10px;

            border: 1px solid var(--border);
            border-radius: 100px;

            color: #a8adbc;
            background: rgba(255,255,255,.03);

            font-size: 10px;
            font-weight: 700;
        }

        /* =========================================================
           13. TIMELINE
        ========================================================= */

        .timeline {
            position: relative;
            max-width: 850px;
            margin: auto;
        }

        .timeline::before {
            content: "";
            position: absolute;

            top: 0;
            bottom: 0;
            left: 19px;

            width: 1px;

            background:
                linear-gradient(
                    var(--purple),
                    rgba(255,255,255,.08),
                    transparent
                );
        }

        .timeline-item {
            position: relative;
            padding-left: 65px;
            padding-bottom: 45px;
        }

        .timeline-dot {
            position: absolute;

            left: 12px;
            top: 8px;

            width: 15px;
            height: 15px;

            border-radius: 50%;

            background: var(--bg);
            border: 3px solid var(--purple);

            box-shadow:
                0 0 20px rgba(124,92,255,.5);
        }

        .timeline-card {
            padding: 25px;

            border: 1px solid var(--border);
            border-radius: 18px;

            background: rgba(255,255,255,.035);

            transition: .3s;
        }

        .timeline-card:hover {
            transform: translateX(8px);
            border-color: rgba(124,92,255,.3);
        }

        .timeline-date {
            color: #9e8dff;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .timeline-card h3 {
            margin-top: 7px;
            font-size: 19px;
        }

        .timeline-card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            margin-top: 8px;
        }

        /* =========================================================
           14. CONTACT
        ========================================================= */

        .contact-box {
            position: relative;
            overflow: hidden;

            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 60px;

            padding: 55px;

            border: 1px solid var(--border);
            border-radius: 30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.06),
                    rgba(255,255,255,.018)
                );

            box-shadow: var(--shadow);
        }

        .contact-box::before {
            content: "";
            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(124,92,255,.14);
            filter: blur(80px);

            left: -120px;
            bottom: -150px;
        }

        .contact-info,
        .contact-form {
            position: relative;
            z-index: 2;
        }

        .contact-info h2 {
            font-size: clamp(38px,5vw,55px);
            letter-spacing: -3px;
            line-height: 1.05;
        }

        .contact-info > p {
            color: var(--muted);
            line-height: 1.8;
            margin-top: 20px;
        }

        .contact-details {
            margin-top: 35px;

            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .contact-detail {
            padding: 14px 16px;

            border: 1px solid var(--border);
            border-radius: 13px;

            background: rgba(255,255,255,.025);

            color: #c5c8d3;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2,1fr);
            gap: 13px;
        }

        .field {
            margin-bottom: 13px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;

            margin-bottom: 7px;

            color: #8e94a5;
            font-size: 11px;
            font-weight: 700;
        }

        .field input,
        .field textarea {
            width: 100%;

            border: 1px solid var(--border);
            outline: none;

            border-radius: 12px;

            background: rgba(0,0,0,.18);
            color: white;

            padding: 14px 15px;

            transition: .3s;
        }

        .field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: rgba(124,92,255,.65);

            box-shadow:
                0 0 0 4px rgba(124,92,255,.08);
        }

        .submit-button {
            width: 100%;
            min-height: 52px;

            border: none;
            border-radius: 12px;

            color: white;
            font-weight: 900;

            background:
                linear-gradient(
                    135deg,
                    var(--purple),
                    #5d45dc
                );

            transition: .3s;
        }

        .submit-button:hover {
            transform: translateY(-3px);

            box-shadow:
                0 15px 35px rgba(124,92,255,.25);
        }

        /* =========================================================
           15. FOOTER
        ========================================================= */

        footer {
            padding: 35px 0;
            border-top: 1px solid var(--border);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;

            color: #777d8d;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            transition: .3s;
        }

        .footer-links a:hover {
            color: white;
        }

        /* =========================================================
           16. REVEAL ANIMATION
        ========================================================= */

        .reveal {
            opacity: 0;
            transform: translateY(45px);

            transition:
                opacity .8s ease,
                transform .8s cubic-bezier(.2,.8,.2,1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* =========================================================
           17. BACK TO TOP
        ========================================================= */

        .back-top {
            position: fixed;

            right: 25px;
            bottom: 25px;

            width: 45px;
            height: 45px;

            z-index: 900;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 13px;

            background: rgba(10,11,17,.8);
            backdrop-filter: blur(15px);

            color: white;

            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);

            transition: .3s;
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-top:hover {
            background: var(--purple);
            border-color: transparent;
            transform: translateY(-4px);
        }

        /* =========================================================
           18. RESPONSIVE
        ========================================================= */

        @media (max-width: 1000px) {

            .hero-grid,
            .about-grid,
            .contact-box {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 150px;
            }

            .hero-content {
                text-align: center;
            }

            .status-badge {
                margin-inline: auto;
            }

            .hero-description {
                margin-inline: auto;
                margin-top: 22px;
            }

            .hero-buttons,
            .hero-socials,
            .typing-row {
                justify-content: center;
            }

            .hero-visual {
                height: 500px;
            }

            .skills-grid,
            .services-grid {
                grid-template-columns: repeat(2,1fr);
            }

            .contact-info {
                text-align: center;
            }

            .contact-details {
                max-width: 500px;
                margin-inline: auto;
                margin-top: 35px;
            }
        }

        @media (max-width: 760px) {

            section {
                padding: 80px 0;
            }

            .nav-links {
                position: fixed;

                top: 82px;
                left: 4%;
                right: 4%;

                padding: 25px;

                flex-direction: column;

                border: 1px solid var(--border);
                border-radius: 18px;

                background: rgba(7,8,12,.95);
                backdrop-filter: blur(20px);

                transform: translateY(-20px);
                opacity: 0;
                visibility: hidden;

                transition: .3s;
            }

            .nav-links.open {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .menu-button {
                display: flex;
            }

            .hero h1 {
                letter-spacing: -4px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .button {
                width: 100%;
                max-width: 350px;
            }

            .hero-visual {
                height: 450px;
            }

            .visual-ring {
                width: 340px;
                height: 340px;
            }

            .visual-ring-two {
                width: 275px;
                height: 275px;
            }

            .developer-card {
                width: 260px;
                min-height: 330px;
            }

            .avatar {
                height: 180px;
            }

            .float-one {
                left: -5px;
            }

            .float-two {
                right: -5px;
            }

            .projects-grid,
            .skills-grid,
            .services-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .contact-box {
                padding: 30px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {

            .hero h1 {
                font-size: 49px;
                letter-spacing: -3px;
            }

            .hero-visual {
                height: 410px;
            }

            .visual-ring {
                width: 300px;
                height: 300px;
            }

            .visual-ring-two {
                width: 245px;
                height: 245px;
            }

            .developer-card {
                width: 235px;
            }

            .floating-card {
                font-size: 10px;
                padding: 10px 12px;
            }

            .project-image {
                height: 230px;
            }
        }

       @media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
    }
}


/* ADMIN LOGIN FOOTER */

.footer-links a:last-child {
    opacity: .45;
    font-size: 10px;
}

.footer-links a:last-child:hover {
    opacity: 1;
    color: #b6aaff;
}


</style>
</head>

<body>

    @php
        $displayName = $profile->name ?? 'Raj Mukut';
        $displayTitle = $profile->title ?? 'Full-Stack Web Developer';
        $displayEmail = $profile->email ?? 'rajmukut791@gmail.com';
        $displayPhone = $profile->phone ?? '01770498791';
        $displayLocation = $profile->location ?? 'Dhaka, Bangladesh';
        $displayAvailability = $profile->availability ?? 'Available for work';

        $socialMap = $socialLinks
            ->keyBy(fn ($item) => strtolower(trim($item->platform)));

        $githubUrl = optional($socialMap->get('github'))->url
            ?? 'https://github.com/rajmukut1628';

        $facebookUrl = optional($socialMap->get('facebook'))->url
            ?? 'https://www.facebook.com/rajmukut791';

        $linkedinUrl = optional($socialMap->get('linkedin'))->url;

        $whatsappDigits = preg_replace('/\D+/', '', $displayPhone);
        if (str_starts_with($whatsappDigits, '0')) {
            $whatsappDigits = '88' . $whatsappDigits;
        }
        $whatsappUrl = 'https://wa.me/' . $whatsappDigits;
    @endphp


    <!-- Background Effects -->
    <div class="background-grid"></div>
    <div class="noise"></div>

    <div class="orb orb-one"></div>
    <div class="orb orb-two"></div>
    <div class="orb orb-three"></div>

    <div id="particles"></div>

    <div
        class="cursor-glow"
        id="cursorGlow"
    ></div>


    <!-- =========================================================
         NAVBAR
    ========================================================== -->

    <header class="navbar" id="navbar">

        <div class="container nav-inner">

            <a href="#home" class="logo">
                PORTFOLIO<span>.</span>
            </a>

            <ul class="nav-links" id="navLinks">

                <li>
                    <a href="#home">Home</a>
                </li>

                <li>
                    <a href="#about">About</a>
                </li>

                <li>
                    <a href="#skills">Skills</a>
                </li>

                <li>
                    <a href="#projects">Projects</a>
                </li>

                <li>
                    <a href="#experience">Experience</a>
                </li>

                <li>
                    <a href="#contact" class="nav-contact">
                        Contact
                    </a>
                </li>

            </ul>

            <button
                class="menu-button"
                id="menuButton"
                aria-label="Open Menu"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </header>


    <!-- =========================================================
         HERO
    ========================================================== -->

    <section class="hero" id="home">
        <div class="container hero-grid">
            <div class="hero-content">
                <div class="status-badge">
                    <span class="status-dot"></span>
                    {{ strtoupper($displayAvailability) }}
                </div>

                <div class="hero-small">
                    {{ $displayTitle }}
                </div>

                <h1>
                    Building
                    <br>
                    <span class="gradient-text">Digital</span>
                    <br>
                    Experiences.
                </h1>

                <div class="typing-row">
                    I build
                    <span id="typing"></span>
                    <span class="typing-cursor"></span>
                </div>

                <p class="hero-description">
                    {{ $profile->short_description ?? 'I create modern, responsive and user-friendly web applications with clean interfaces, efficient backend systems and meaningful digital experiences.' }}
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="button button-primary">
                        Explore My Work <span>↗</span>
                    </a>

                    @if(!empty($profile?->cv))
                        <a href="{{ asset('storage/' . $profile->cv) }}"
                           target="_blank"
                           class="button button-secondary">
                            View CV ↗
                        </a>
                    @else
                        <a href="#contact" class="button button-secondary">
                            Let's Talk
                        </a>
                    @endif
                </div>

                <div class="hero-socials">
                    <span>FIND ME ON</span>

                    <a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer">
                        GitHub
                    </a>

                    @if($linkedinUrl)
                        <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer">
                            LinkedIn
                        </a>
                    @endif

                    <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer">
                        Facebook
                    </a>

                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
                        WhatsApp
                    </a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-glow"></div>
                <div class="visual-ring"></div>
                <div class="visual-ring-two"></div>

                <div class="developer-card" data-tilt>
                    <div class="avatar {{ !empty($profile?->photo) ? 'has-photo' : '' }}">
                        @if(!empty($profile?->photo))
                            <img
                                src="{{ asset('storage/' . $profile->photo) }}"
                                alt="{{ $displayName }}"
                                class="avatar-photo"
                            >
                        @else
                            <div class="avatar-code">&lt;/&gt;</div>
                        @endif
                    </div>

                    <h3>{{ $displayName }}</h3>
                    <p>{{ $displayTitle }}</p>

                    <div class="developer-status">
                        <span class="status-dot"></span>
                        {{ $displayAvailability }}
                    </div>
                </div>

                <div class="floating-card float-one">Laravel</div>
                <div class="floating-card float-two">PHP + MySQL</div>
                <div class="floating-card float-three">Clean UI</div>
            </div>
        </div>

        <div class="scroll-down">Scroll</div>
    </section>


    <!-- =========================================================
         ABOUT
    ========================================================== -->

    <section id="about">
        <div class="container">
            <div class="section-heading reveal">
                <div class="section-label">About Me</div>
                <h2>
                    Code with purpose.
                    <br>
                    Design with clarity.
                </h2>
            </div>

            <div class="about-grid">
                <div class="about-card reveal">
                    <div class="code-window">
                        <div class="window-top">
                            <span class="window-dot"></span>
                            <span class="window-dot"></span>
                            <span class="window-dot"></span>
                        </div>

                        <div class="code-lines">
                            <div>
                                <span class="code-purple">class</span>
                                <span class="code-blue"> Developer</span>
                                <span class="code-white">{</span>
                            </div>
                            <div>
                                &nbsp;&nbsp;<span class="code-purple">public</span>
                                $name = <span class="code-green">"{{ $displayName }}"</span>;
                            </div>
                            <div>
                                &nbsp;&nbsp;<span class="code-purple">public</span>
                                $role = <span class="code-green">"{{ $displayTitle }}"</span>;
                            </div>
                            <div>
                                &nbsp;&nbsp;<span class="code-purple">public</span>
                                $location = <span class="code-green">"{{ $displayLocation }}"</span>;
                            </div>
                            <div>
                                &nbsp;&nbsp;<span class="code-purple">public</span>
                                $stack = [
                            </div>
                            @forelse($skills->take(4) as $skill)
                                <div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="code-green">"{{ $skill->name }}"</span>{{ !$loop->last ? ',' : '' }}
                                </div>
                            @empty
                                <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-green">"Laravel"</span>,</div>
                                <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-green">"PHP"</span>,</div>
                                <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-green">"MySQL"</span></div>
                            @endforelse
                            <div>&nbsp;&nbsp;];</div>
                            <div><span class="code-white">}</span></div>
                        </div>
                    </div>
                </div>

                <div class="about-content reveal">
                    <h3>Turning ideas into functional digital products.</h3>

                    <p>
                        {{ $profile->about ?? "I'm Raj Mukut, a Computer Science and Engineering graduate from Northern University Bangladesh, focused on building modern and practical web applications." }}
                    </p>

                    <p>
                        I enjoy creating responsive interfaces and reliable backend systems using modern web technologies.
                    </p>

                    <div class="stats">
                        <div class="stat">
                            <span class="stat-number counter" data-target="{{ $projects->count() }}">0</span>
                            <span class="stat-label">Projects</span>
                        </div>

                        <div class="stat">
                            <span class="stat-number counter" data-target="{{ $skills->count() }}">0</span>
                            <span class="stat-label">Skills</span>
                        </div>

                        <div class="stat">
                            <span class="stat-number counter" data-target="100">0</span>
                            <span class="stat-label">Dedication %</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================
         SKILLS
    ========================================================== -->

    <section id="skills">
        <div class="container">
            <div class="section-heading reveal">
                <div class="section-label">My Skills</div>
                <h2>Technologies I work with.</h2>
                <p>
                    My current technical skills and tools for building
                    modern, maintainable and responsive web applications.
                </p>
            </div>

            <div class="skills-grid">
                @forelse($skills as $skill)
                    @php
                        $percentage = max(0, min(100, (int) ($skill->percentage ?? 0)));
                    @endphp

                    <div class="skill-card reveal" data-tilt>
                        <div class="skill-top">
                            <span class="skill-name">{{ $skill->name }}</span>
                            <span class="skill-percent">{{ $percentage }}%</span>
                        </div>

                        <div class="skill-bar">
                            <div
                                class="skill-progress"
                                data-width="{{ $percentage }}%"
                            ></div>
                        </div>

                        <p>
                            {{ $skill->description ?: ($skill->category ? $skill->category . ' skill.' : 'Technical skill and development experience.') }}
                        </p>
                    </div>
                @empty
                    <div class="skill-card reveal">
                        <div class="skill-top">
                            <span class="skill-name">Laravel</span>
                            <span class="skill-percent">90%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-width="90%"></div>
                        </div>
                        <p>Add your skills from Admin → Skills.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- =========================================================
         SERVICES
    ========================================================== -->

    <section>

        <div class="container">

            <div class="section-heading reveal">

                <div class="section-label">
                    What I Do
                </div>

                <h2>
                    Services & expertise.
                </h2>

            </div>


            <div class="services-grid">

                <article class="service-card reveal">

                    <div class="service-number">
                        01
                    </div>

                    <h3>
                        Web Development
                    </h3>

                    <p>
                        Building complete web applications
                        with Laravel, PHP and MySQL.
                    </p>

                    <div class="service-line"></div>

                </article>


                <article class="service-card reveal">

                    <div class="service-number">
                        02
                    </div>

                    <h3>
                        Backend Systems
                    </h3>

                    <p>
                        Developing authentication,
                        role management, databases and
                        application logic.
                    </p>

                    <div class="service-line"></div>

                </article>


                <article class="service-card reveal">

                    <div class="service-number">
                        03
                    </div>

                    <h3>
                        Responsive UI
                    </h3>

                    <p>
                        Creating clean interfaces that work
                        smoothly across desktop, tablet
                        and mobile devices.
                    </p>

                    <div class="service-line"></div>

                </article>

            </div>

        </div>

    </section>


    <!-- =========================================================
         PROJECTS
    ========================================================== -->

    <section id="projects">
        <div class="container">
            <div class="section-heading reveal">
                <div class="section-label">Selected Work</div>
                <h2>Projects I've built.</h2>
                <p>
                    A selection of applications and digital products
                    from my development journey.
                </p>
            </div>

            <div class="projects-grid">
                @forelse($projects as $project)
                    <article class="project-card reveal" data-tilt>
                        <div class="project-image">
                            @if($project->featured)
                                <span class="featured-label">Featured</span>
                            @endif

                            @if($project->image)
                                <img
                                    src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}"
                                    class="project-real-image"
                                >
                            @else
                                <div class="project-mockup">
                                    <div class="mockup-bar"></div>
                                    <div class="mockup-content">
                                        <div class="mockup-line"></div>
                                        <div class="mockup-line"></div>
                                        <div class="mockup-line"></div>
                                        <div class="mockup-boxes">
                                            <div class="mockup-box"></div>
                                            <div class="mockup-box"></div>
                                            <div class="mockup-box"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="project-content">
                            <div class="project-top">
                                <div>
                                    <div class="project-number">
                                        PROJECT {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                                    <h3>{{ $project->title }}</h3>
                                </div>

                                @if($project->live_url || $project->github_url)
                                    <a
                                        href="{{ $project->live_url ?: $project->github_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="project-arrow"
                                        aria-label="Open {{ $project->title }}"
                                    >↗</a>
                                @endif
                            </div>

                            <p>{{ $project->description ?: 'Project details will be added soon.' }}</p>

                            @if($project->technologies)
                                <div class="project-tags">
                                    @foreach(explode(',', $project->technologies) as $technology)
                                        @if(trim($technology))
                                            <span class="tag">{{ trim($technology) }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @if($project->github_url || $project->live_url)
                                <div class="hero-socials" style="margin-top:20px;">
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer">
                                            GitHub ↗
                                        </a>
                                    @endif

                                    @if($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer">
                                            Live Demo ↗
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <article class="project-card reveal">
                        <div class="project-image">
                            <div class="project-mockup">
                                <div class="mockup-bar"></div>
                                <div class="mockup-content">
                                    <div class="mockup-line"></div>
                                    <div class="mockup-line"></div>
                                    <div class="mockup-line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-number">PROJECTS</div>
                            <h3>Your projects will appear here.</h3>
                            <p>Add projects from Admin → Projects.</p>
                        </div>
                    </article>
                @endforelse
            </div>
        </div>
    </section>


    <!-- =========================================================
         EXPERIENCE
    ========================================================== -->

    <section id="experience">
        <div class="container">
            <div class="section-heading reveal">
                <div class="section-label">My Journey</div>
                <h2>Education & experience.</h2>
            </div>

            <div class="timeline">
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card">
                        <div class="timeline-date">PRESENT</div>
                        <h3>{{ $displayTitle }}</h3>
                        <p>
                            Building and improving web applications with Laravel,
                            PHP, MySQL, JavaScript and modern frontend technologies.
                        </p>
                    </div>
                </div>

                @foreach($education as $item)
                    <div class="timeline-item reveal">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="timeline-date">
                                {{ $item->start_year ?: 'EDUCATION' }}
                                @if($item->end_year)
                                    — {{ $item->end_year }}
                                @endif
                            </div>

                            <h3>{{ $item->degree }}</h3>

                            <p>
                                @if($item->field_of_study)
                                    {{ $item->field_of_study }} ·
                                @endif
                                {{ $item->institution }}
                                @if($item->location)
                                    · {{ $item->location }}
                                @endif
                            </p>

                            @if($item->description)
                                <p>{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach

                @if($education->isEmpty())
                    <div class="timeline-item reveal">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="timeline-date">EDUCATION</div>
                            <h3>Computer Science and Engineering (CSE)</h3>
                            <p>Northern University Bangladesh</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <!-- =========================================================
         CONTACT
    ========================================================== -->

    <section id="contact">
        <div class="container">
            <div class="contact-box reveal">
                <div class="contact-info">
                    <div class="section-label">Contact</div>

                    <h2>
                        Let's build
                        something great.
                    </h2>

                    <p>
                        Have a project, opportunity or idea?
                        Send me a message and let's talk.
                    </p>

                    <div class="contact-details">
                        <a class="contact-detail" href="mailto:{{ $displayEmail }}">
                            Email: {{ $displayEmail }}
                        </a>

                        <a class="contact-detail" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
                            WhatsApp: {{ $displayPhone }}
                        </a>

                        <div class="contact-detail">
                            Location: {{ $displayLocation }}
                        </div>

                        <div class="contact-detail">
                            Status: {{ $displayAvailability }}
                        </div>
                    </div>
                </div>

                <form
                    class="contact-form"
                    id="contactForm"
                    method="POST"
                    action="{{ route('contact.store') }}"
                >
                    @csrf

                    <div class="form-grid">
                        @if(session('contact_success'))
                            <div class="form-alert success">
                                {{ session('contact_success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="form-alert error">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="field">
                            <label>YOUR NAME</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your Name"
                                required
                            >
                        </div>

                        <div class="field">
                            <label>EMAIL ADDRESS</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                required
                            >
                        </div>

                        <div class="field full">
                            <label>SUBJECT</label>
                            <input
                                type="text"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="Project discussion"
                            >
                        </div>

                        <div class="field full">
                            <label>MESSAGE</label>
                            <textarea
                                name="message"
                                placeholder="Tell me about your project..."
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="field full">
                            <button type="submit" class="submit-button">
                                Send Message →
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- =========================================================
         FOOTER
    ========================================================== -->

    <footer>
        <div class="container footer-inner">
            <div>
                © <span id="year"></span>
                {{ $displayName }}. All rights reserved.
            </div>

            <div class="footer-links">

    <a
        href="{{ $githubUrl }}"
        target="_blank"
        rel="noopener noreferrer"
    >
        GitHub
    </a>

    @if($linkedinUrl)

        <a
            href="{{ $linkedinUrl }}"
            target="_blank"
            rel="noopener noreferrer"
        >
            LinkedIn
        </a>

    @endif

    <a
        href="{{ $facebookUrl }}"
        target="_blank"
        rel="noopener noreferrer"
    >
        Facebook
    </a>

    <a
        href="{{ $whatsappUrl }}"
        target="_blank"
        rel="noopener noreferrer"
    >
        WhatsApp
    </a>


    @auth

        <a href="{{ route('admin.dashboard') }}">
            Admin Dashboard
        </a>

    @else

        <a href="{{ route('admin.login') }}">
            Admin Login
        </a>

    @endauth

</div>
        </div>
    </footer>


    <!-- Back To Top -->

    <a
        href="#home"
        class="back-top"
        id="backTop"
        aria-label="Back to top"
    >
        ↑
    </a>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>

        /* =========================================================
           NAVBAR SCROLL
        ========================================================= */

        const navbar =
            document.getElementById('navbar');

        const backTop =
            document.getElementById('backTop');

        window.addEventListener(
            'scroll',
            () => {

                if (window.scrollY > 50) {

                    navbar.classList.add(
                        'scrolled'
                    );

                } else {

                    navbar.classList.remove(
                        'scrolled'
                    );

                }


                if (window.scrollY > 600) {

                    backTop.classList.add(
                        'show'
                    );

                } else {

                    backTop.classList.remove(
                        'show'
                    );

                }

            }
        );


        /* =========================================================
           MOBILE MENU
        ========================================================= */

        const menuButton =
            document.getElementById(
                'menuButton'
            );

        const navLinks =
            document.getElementById(
                'navLinks'
            );

        menuButton.addEventListener(
            'click',
            () => {

                navLinks.classList.toggle(
                    'open'
                );

                document.body.classList.toggle(
                    'menu-open'
                );

            }
        );


        document
            .querySelectorAll(
                '.nav-links a'
            )
            .forEach(
                link => {

                    link.addEventListener(
                        'click',
                        () => {

                            navLinks.classList.remove(
                                'open'
                            );

                            document.body.classList.remove(
                                'menu-open'
                            );

                        }
                    );

                }
            );


        /* =========================================================
           TYPING ANIMATION
        ========================================================= */

        const typingElement =
            document.getElementById(
                'typing'
            );

        const typingWords = [

            'Laravel applications.',
            'responsive websites.',
            'modern interfaces.',
            'backend systems.',
            'digital experiences.'

        ];

        let wordIndex = 0;
        let charIndex = 0;
        let deleting = false;


        function typingAnimation() {

            const currentWord =
                typingWords[wordIndex];


            if (!deleting) {

                typingElement.textContent =
                    currentWord.substring(
                        0,
                        charIndex + 1
                    );

                charIndex++;


                if (
                    charIndex ===
                    currentWord.length
                ) {

                    deleting = true;

                    setTimeout(
                        typingAnimation,
                        1400
                    );

                    return;

                }

            } else {

                typingElement.textContent =
                    currentWord.substring(
                        0,
                        charIndex - 1
                    );

                charIndex--;


                if (charIndex === 0) {

                    deleting = false;

                    wordIndex =
                        (
                            wordIndex + 1
                        )
                        %
                        typingWords.length;

                }

            }


            const typingSpeed =
                deleting
                    ? 35
                    : 70;


            setTimeout(
                typingAnimation,
                typingSpeed
            );

        }


        typingAnimation();


        /* =========================================================
           PARTICLES
        ========================================================= */

        const particleContainer =
            document.getElementById(
                'particles'
            );


        function createParticles() {

            const particleCount =
                window.innerWidth < 700
                    ? 20
                    : 45;


            for (
                let i = 0;
                i < particleCount;
                i++
            ) {

                const particle =
                    document.createElement(
                        'span'
                    );

                particle.classList.add(
                    'particle'
                );


                const size =
                    Math.random() * 2.5 + .7;


                particle.style.width =
                    size + 'px';

                particle.style.height =
                    size + 'px';


                particle.style.left =
                    Math.random() * 100 + '%';


                particle.style.animationDuration =
                    (
                        Math.random() * 15
                        + 10
                    )
                    + 's';


                particle.style.animationDelay =
                    (
                        Math.random() * 10
                    )
                    + 's';


                particle.style.opacity =
                    Math.random() * .5;


                particleContainer.appendChild(
                    particle
                );

            }

        }


        createParticles();


        /* =========================================================
           CURSOR GLOW
        ========================================================= */

        const cursorGlow =
            document.getElementById(
                'cursorGlow'
            );


        if (
            window.matchMedia(
                '(pointer: fine)'
            ).matches
        ) {

            window.addEventListener(
                'mousemove',
                event => {

                    cursorGlow.style.left =
                        event.clientX + 'px';

                    cursorGlow.style.top =
                        event.clientY + 'px';

                }
            );

        } else {

            cursorGlow.style.display =
                'none';

        }


        /* =========================================================
           SCROLL REVEAL
        ========================================================= */

        const revealElements =
            document.querySelectorAll(
                '.reveal'
            );


        const revealObserver =
            new IntersectionObserver(

                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                entry.isIntersecting
                            ) {

                                entry.target
                                    .classList
                                    .add(
                                        'visible'
                                    );

                                revealObserver
                                    .unobserve(
                                        entry.target
                                    );

                            }

                        }
                    );

                },

                {
                    threshold: .12
                }

            );


        revealElements.forEach(
            element => {

                revealObserver.observe(
                    element
                );

            }
        );


        /* =========================================================
           SKILL BAR ANIMATION
        ========================================================= */

        const skillCards =
            document.querySelectorAll(
                '.skill-card'
            );


        const skillObserver =
            new IntersectionObserver(

                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                entry.isIntersecting
                            ) {

                                const progress =
                                    entry.target
                                        .querySelector(
                                            '.skill-progress'
                                        );


                                if (progress) {

                                    progress.style.width =
                                        progress.dataset.width;

                                }


                                skillObserver.unobserve(
                                    entry.target
                                );

                            }

                        }
                    );

                },

                {
                    threshold: .35
                }

            );


        skillCards.forEach(
            card => {

                skillObserver.observe(
                    card
                );

            }
        );


        /* =========================================================
           COUNTER ANIMATION
        ========================================================= */

        const counters =
            document.querySelectorAll(
                '.counter'
            );


        function animateCounter(
            counter
        ) {

            const target =
                Number(
                    counter.dataset.target
                );

            const duration =
                1400;

            const startTime =
                performance.now();


            function updateCounter(
                currentTime
            ) {

                const progress =
                    Math.min(
                        (
                            currentTime
                            -
                            startTime
                        )
                        /
                        duration,
                        1
                    );


                const eased =
                    1
                    -
                    Math.pow(
                        1 - progress,
                        3
                    );


                counter.textContent =
                    Math.floor(
                        target * eased
                    );


                if (
                    progress < 1
                ) {

                    requestAnimationFrame(
                        updateCounter
                    );

                } else {

                    counter.textContent =
                        target;

                }

            }


            requestAnimationFrame(
                updateCounter
            );

        }


        const counterObserver =
            new IntersectionObserver(

                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                entry.isIntersecting
                            ) {

                                animateCounter(
                                    entry.target
                                );

                                counterObserver
                                    .unobserve(
                                        entry.target
                                    );

                            }

                        }
                    );

                },

                {
                    threshold: .5
                }

            );


        counters.forEach(
            counter => {

                counterObserver.observe(
                    counter
                );

            }
        );


        /* =========================================================
           3D TILT EFFECT
        ========================================================= */

        const tiltElements =
            document.querySelectorAll(
                '[data-tilt]'
            );


        if (
            window.matchMedia(
                '(pointer: fine)'
            ).matches
        ) {

            tiltElements.forEach(
                element => {

                    element.addEventListener(
                        'mousemove',
                        event => {

                            const rect =
                                element
                                    .getBoundingClientRect();


                            const x =
                                event.clientX
                                -
                                rect.left;

                            const y =
                                event.clientY
                                -
                                rect.top;


                            const centerX =
                                rect.width / 2;

                            const centerY =
                                rect.height / 2;


                            const rotateX =
                                (
                                    y
                                    -
                                    centerY
                                )
                                /
                                25;


                            const rotateY =
                                (
                                    centerX
                                    -
                                    x
                                )
                                /
                                25;


                            element.style.transform =
                                `
                                perspective(1000px)
                                rotateX(${rotateX}deg)
                                rotateY(${rotateY}deg)
                                translateY(-4px)
                                `;

                        }
                    );


                    element.addEventListener(
                        'mouseleave',
                        () => {

                            element.style.transform =
                                '';

                        }
                    );

                }
            );

        }


        /* =========================================================
           SUBTLE HERO PARALLAX
        ========================================================= */

        const heroVisual =
            document.querySelector(
                '.hero-visual'
            );


        if (
            window.matchMedia(
                '(pointer: fine)'
            ).matches
        ) {

            window.addEventListener(
                'mousemove',
                event => {

                    const moveX =
                        (
                            event.clientX
                            -
                            window.innerWidth / 2
                        )
                        /
                        70;


                    const moveY =
                        (
                            event.clientY
                            -
                            window.innerHeight / 2
                        )
                        /
                        70;


                    heroVisual.style.transform =
                        `
                        translate(
                            ${moveX}px,
                            ${moveY}px
                        )
                        `;

                }
            );

        }




        /* =========================================================
           FOOTER YEAR
        ========================================================= */

        document.getElementById(
            'year'
        ).textContent =
            new Date().getFullYear();


        /* =========================================================
           ACTIVE NAVIGATION
        ========================================================= */

        const sections =
            document.querySelectorAll(
                'section[id]'
            );

        const navigationLinks =
            document.querySelectorAll(
                '.nav-links a'
            );


        window.addEventListener(
            'scroll',
            () => {

                let currentSection =
                    'home';


                sections.forEach(
                    section => {

                        const sectionTop =
                            section.offsetTop
                            -
                            150;


                        if (
                            window.scrollY
                            >=
                            sectionTop
                        ) {

                            currentSection =
                                section
                                    .getAttribute(
                                        'id'
                                    );

                        }

                    }
                );


                navigationLinks.forEach(
                    link => {

                        const href =
                            link.getAttribute(
                                'href'
                            );


                        if (
                            href
                            ===
                            '#'
                            +
                            currentSection
                        ) {

                            link.style.color =
                                '#ffffff';

                        } else {

                            link.style.color =
                                '';

                        }

                    }
                );

            }
        );

    </script>

</body>
</html>