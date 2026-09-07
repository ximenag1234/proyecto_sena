<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="description"
        content="Petschool — Gestión inteligente para el cuidado de tus mascotas."
    >

    <title>Petschool — Cuidado inteligente para mascotas</title>

    <style>
        :root {
            --bg: #08080a;
            --bg-soft: #0d0d10;
            --card: rgba(24, 24, 28, .72);
            --card-border: rgba(255, 255, 255, .08);

            --text: #f5f5f7;
            --muted: #9a9aa5;

            --primary: #7067ff;
            --primary-light: #8d86ff;
            --cyan: #55d6ff;

            --glow: rgba(112, 103, 255, .28);

            --radius: 24px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at 75% 15%,
                    rgba(112, 103, 255, .13),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 10% 70%,
                    rgba(85, 214, 255, .07),
                    transparent 25%
                ),
                var(--bg);

            color: var(--text);

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        /* =========================================================
           BACKGROUND
        ========================================================= */

        .background {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            opacity: .35;
        }

        .orb-1 {
            width: 420px;
            height: 420px;
            background: #5d55ff;
            top: -180px;
            right: -100px;
        }

        .orb-2 {
            width: 320px;
            height: 320px;
            background: #147da0;
            bottom: 5%;
            left: -180px;
            opacity: .18;
        }

        .grid {
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255,255,255,.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.025) 1px,
                    transparent 1px
                );

            background-size: 70px 70px;

            mask-image: linear-gradient(
                to bottom,
                black,
                transparent 85%
            );
        }

        /* =========================================================
           NAVBAR
        ========================================================= */

        nav {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;

            height: 82px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;

            display: grid;
            place-items: center;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    #5149dc
                );

            box-shadow:
                0 8px 30px rgba(112,103,255,.35);
        }

        .brand-icon svg {
            width: 21px;
            height: 21px;
        }

        .brand span {
            color: #fff;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-user {
            color: var(--muted);
            font-size: 14px;
            margin-right: 5px;
        }

        /* =========================================================
           BUTTONS
        ========================================================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            min-height: 44px;
            padding: 0 18px;

            border-radius: 12px;

            font-size: 14px;
            font-weight: 700;

            border: 1px solid transparent;

            cursor: pointer;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease,
                border-color .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    var(--primary),
                    #5148dc
                );

            box-shadow:
                0 10px 30px rgba(112,103,255,.22);
        }

        .btn-primary:hover {
            box-shadow:
                0 14px 38px rgba(112,103,255,.38);
        }

        .btn-secondary {
            color: #dddde5;

            background: rgba(255,255,255,.04);

            border-color: rgba(255,255,255,.10);

            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,.08);
            border-color: rgba(255,255,255,.16);
        }

        .btn svg {
            width: 17px;
            height: 17px;
        }

        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            width: min(1180px, calc(100% - 40px));

            min-height: 650px;

            margin: 0 auto;

            display: grid;
            grid-template-columns: 1.05fr .95fr;

            align-items: center;

            gap: 50px;
        }

        .hero-content {
            padding: 70px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 7px 12px;

            border-radius: 999px;

            color: #bcb8ff;

            background: rgba(112,103,255,.08);

            border: 1px solid rgba(112,103,255,.20);

            font-size: 12px;
            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 25px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #766cff;

            box-shadow:
                0 0 12px #766cff;
        }

        .hero h1 {
            max-width: 720px;

            font-size:
                clamp(48px, 6vw, 78px);

            line-height: .98;

            letter-spacing: -4px;

            font-weight: 850;

            margin-bottom: 26px;
        }

        .hero h1 .gradient {
            background:
                linear-gradient(
                    110deg,
                    #ffffff 0%,
                    #b9b5ff 42%,
                    #7770ff 75%,
                    #55d6ff 100%
                );

            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-description {
            max-width: 590px;

            color: var(--muted);

            font-size: 18px;
            line-height: 1.7;

            margin-bottom: 32px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-top: 25px;

            color: #71717b;

            font-size: 12px;
        }

        .hero-note svg {
            width: 15px;
            height: 15px;
            color: #7770ff;
        }

        /* =========================================================
           HERO VISUAL
        ========================================================= */

        .visual {
            position: relative;

            min-height: 470px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual-glow {
            position: absolute;

            width: 330px;
            height: 330px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(112,103,255,.32),
                    transparent 68%
                );

            filter: blur(10px);
        }

        .pet-card {
            position: relative;

            width: min(410px, 100%);

            padding: 24px;

            border-radius: 28px;

            background:
                linear-gradient(
                    145deg,
                    rgba(34,34,40,.88),
                    rgba(17,17,20,.84)
                );

            border: 1px solid rgba(255,255,255,.10);

            box-shadow:
                0 40px 100px rgba(0,0,0,.45),
                0 0 70px rgba(112,103,255,.10);

            backdrop-filter: blur(22px);

            transform: rotate(2deg);
        }

        .pet-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 22px;
        }

        .pet-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pet-avatar {
            width: 48px;
            height: 48px;

            display: grid;
            place-items: center;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    #7168ff,
                    #4f46c9
                );

            font-size: 23px;

            box-shadow:
                0 10px 25px rgba(112,103,255,.25);
        }

        .pet-name {
            font-size: 15px;
            font-weight: 800;
        }

        .pet-type {
            color: #777780;
            font-size: 12px;
            margin-top: 3px;
        }

        .status {
            padding: 6px 10px;

            color: #7ee5b1;

            background: rgba(63, 196, 128, .08);

            border: 1px solid rgba(63,196,128,.16);

            border-radius: 999px;

            font-size: 11px;
            font-weight: 700;
        }

        .pet-image {
            height: 205px;

            display: grid;
            place-items: center;

            border-radius: 21px;

            background:
                radial-gradient(
                    circle at 50% 35%,
                    rgba(112,103,255,.18),
                    transparent 55%
                ),
                #111116;

            border: 1px solid rgba(255,255,255,.05);

            overflow: hidden;
        }

        .dog {
            font-size: 120px;

            filter:
                drop-shadow(
                    0 20px 25px rgba(0,0,0,.45)
                );

            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(-2deg);
            }

            50% {
                transform: translateY(-9px) rotate(2deg);
            }
        }

        .activity-list {
            margin-top: 18px;

            display: grid;
            gap: 9px;
        }

        .activity {
            display: flex;
            align-items: center;
            gap: 11px;

            padding: 11px;

            border-radius: 13px;

            background: rgba(255,255,255,.035);

            border: 1px solid rgba(255,255,255,.045);
        }

        .activity-icon {
            width: 32px;
            height: 32px;

            display: grid;
            place-items: center;

            border-radius: 9px;

            background: rgba(112,103,255,.12);

            color: #918bff;
        }

        .activity-icon svg {
            width: 16px;
            height: 16px;
        }

        .activity-text {
            flex: 1;

            font-size: 12px;
            font-weight: 650;
        }

        .activity-time {
            color: #6e6e78;
            font-size: 10px;
        }

        .floating-card {
            position: absolute;

            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 15px;

            background: rgba(25,25,30,.88);

            border: 1px solid rgba(255,255,255,.09);

            border-radius: 15px;

            box-shadow:
                0 20px 50px rgba(0,0,0,.35);

            backdrop-filter: blur(18px);

            font-size: 11px;
            font-weight: 700;

            z-index: 2;
        }

        .floating-card svg {
            width: 18px;
            height: 18px;

            color: #827bff;
        }

        .floating-1 {
            left: -20px;
            top: 100px;
        }

        .floating-2 {
            right: -20px;
            bottom: 105px;
        }

        /* =========================================================
           FEATURES
        ========================================================= */

        .features-section {
            width: min(1180px, calc(100% - 40px));

            margin: 30px auto 0;

            padding: 100px 0;
        }

        .section-heading {
            max-width: 650px;
            margin-bottom: 45px;
        }

        .section-label {
            color: #807aff;

            font-size: 12px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1.5px;

            margin-bottom: 13px;
        }

        .section-heading h2 {
            font-size: clamp(32px, 4vw, 48px);

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 15px;
        }

        .section-heading p {
            color: var(--muted);

            line-height: 1.7;
            font-size: 15px;
        }

        .features {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;
        }

        .feature {
            padding: 27px;

            min-height: 205px;

            border-radius: var(--radius);

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.018)
                );

            border: 1px solid var(--card-border);

            transition:
                transform .25s ease,
                border-color .25s ease,
                background .25s ease;
        }

        .feature:hover {
            transform: translateY(-5px);

            border-color:
                rgba(112,103,255,.25);

            background:
                linear-gradient(
                    145deg,
                    rgba(112,103,255,.08),
                    rgba(255,255,255,.02)
                );
        }

        .feature-icon {
            width: 45px;
            height: 45px;

            display: grid;
            place-items: center;

            border-radius: 13px;

            color: #928cff;

            background:
                rgba(112,103,255,.10);

            border:
                1px solid rgba(112,103,255,.14);

            margin-bottom: 20px;
        }

        .feature-icon svg {
            width: 21px;
            height: 21px;
        }

        .feature h3 {
            font-size: 15px;
            margin-bottom: 9px;
        }

        .feature p {
            color: #777781;

            font-size: 13px;
            line-height: 1.65;
        }

        /* =========================================================
           CTA
        ========================================================= */

        .cta {
            width: min(1180px, calc(100% - 40px));

            margin: 0 auto 90px;

            padding: 65px 40px;

            text-align: center;

            border-radius: 30px;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(112,103,255,.20),
                    transparent 55%
                ),
                rgba(255,255,255,.025);

            border: 1px solid rgba(255,255,255,.08);

            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(85,214,255,.08);

            filter: blur(80px);

            left: -100px;
            bottom: -180px;
        }

        .cta h2 {
            font-size: clamp(30px, 4vw, 44px);

            letter-spacing: -2px;

            margin-bottom: 13px;

            position: relative;
        }

        .cta p {
            color: var(--muted);

            font-size: 15px;

            margin-bottom: 25px;

            position: relative;
        }

        .cta .btn {
            position: relative;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        footer {
            border-top: 1px solid rgba(255,255,255,.06);

            padding: 25px 20px;

            color: #5e5e68;

            font-size: 12px;
        }

        .footer-inner {
            width: min(1180px, 100%);

            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .footer-brand {
            color: #85858e;
            font-weight: 750;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .hero {
                grid-template-columns: 1fr;

                padding-top: 30px;

                text-align: center;
            }

            .hero-content {
                padding-bottom: 20px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-note {
                justify-content: center;
            }

            .visual {
                min-height: 430px;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 620px) {

            nav {
                width: min(100% - 28px, 1180px);
                height: 70px;
            }

            .nav-user {
                display: none;
            }

            .brand {
                font-size: 17px;
            }

            .brand-icon {
                width: 35px;
                height: 35px;
            }

            .hero,
            .features-section,
            .cta {
                width: calc(100% - 28px);
            }

            .hero {
                min-height: auto;

                padding-top: 50px;
                padding-bottom: 40px;
            }

            .hero h1 {
                font-size: 47px;
                letter-spacing: -2.5px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-actions .btn {
                width: 100%;
            }

            .visual {
                min-height: 400px;
            }

            .pet-card {
                width: 100%;
            }

            .floating-1 {
                left: -5px;
                top: 70px;
            }

            .floating-2 {
                right: -5px;
                bottom: 70px;
            }

            .features-section {
                padding: 65px 0;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .cta {
                padding: 45px 22px;
                margin-bottom: 60px;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    {{-- =========================================================
         BACKGROUND
    ========================================================== --}}
    <div class="background">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="grid"></div>
    </div>


    {{-- =========================================================
         NAVIGATION
    ========================================================== --}}
    <nav>

        <a href="{{ url('/') }}" class="brand">

            <span class="brand-icon">
                {{-- Paw --}}
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M8.5 11.5c-1.9 0-3.5 1.5-3.5 3.4 0 1.7 1.2 3.1 2.8 3.1 1.2 0 1.8-.7 2.7-.7s1.5.7 2.7.7c1.6 0 2.8-1.4 2.8-3.1 0-1.9-1.6-3.4-3.5-3.4-1.5 0-2.2.9-2.5.9s-1-.9-2.5-.9Z"/>
                    <circle cx="7" cy="8" r="1.7"/>
                    <circle cx="12" cy="6.5" r="1.7"/>
                    <circle cx="17" cy="8" r="1.7"/>
                </svg>
            </span>

            <span>Petschool</span>

        </a>


        <div class="nav-actions">

            @auth

                <span class="nav-user">
                    Hola, {{ auth()->user()->name ?? 'usuario' }}
                </span>

                {{-- Ir al panel --}}
                <a
                    href="{{ filament()->getUrl() }}"
                    class="btn btn-secondary"
                >
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                    </svg>

                    Panel
                </a>

                {{-- Logout de Filament --}}
                <form
                    method="POST"
                    action="{{ filament()->getLogoutUrl() }}"
                    style="display:inline;"
                >
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M10 17l5-5-5-5"/>
                            <path d="M15 12H3"/>
                            <path d="M21 3v18"/>
                        </svg>

                        Cerrar sesión
                    </button>
                </form>

            @else

                {{-- Login de Filament --}}
                <a
                    href="{{ filament()->getLoginUrl() }}"
                    class="btn btn-primary"
                >
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M15 3h6v18h-6"/>
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M15 12H3"/>
                    </svg>

                    Iniciar sesión
                </a>

            @endauth

        </div>

    </nav>


    {{-- =========================================================
         HERO
    ========================================================== --}}
    <main>

        <section class="hero">

            <div class="hero-content">

                <div class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    Gestión inteligente para mascotas
                </div>


                <h1>
                    Todo el cuidado de tu mascota,
                    <span class="gradient">
                        en un solo lugar.
                    </span>
                </h1>


                <p class="hero-description">
                    Petschool centraliza la información, las actividades,
                    la alimentación, la salud y los cuidados de tus mascotas
                    para que puedas gestionarlo todo de forma sencilla.
                </p>


                <div class="hero-actions">

                    @auth

                        <a
                            href="{{ filament()->getUrl() }}"
                            class="btn btn-primary"
                        >
                            Ir al panel

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>
                            </svg>
                        </a>

                    @else

                        <a
                            href="{{ filament()->getLoginUrl() }}"
                            class="btn btn-primary"
                        >
                            Entrar a Petschool

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>
                            </svg>
                        </a>

                    @endauth


                    <a
                        href="#funcionalidades"
                        class="btn btn-secondary"
                    >
                        Descubrir más
                    </a>

                </div>


                <div class="hero-note">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>

                    Una experiencia segura, organizada y centralizada.

                </div>

            </div>


            {{-- =====================================================
                 VISUAL CARD
            ====================================================== --}}
            <div class="visual">

                <div class="visual-glow"></div>


                <div class="floating-card floating-1">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M12 2v20"/>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H7"/>
                    </svg>

                    Alimentación controlada

                </div>


                <div class="floating-card floating-2">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M20 11.5a8.38 8.38 0 0 1-1.9 5.4A8.5 8.5 0 1 1 20 11.5Z"/>
                        <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                        <path d="M9 9h.01"/>
                        <path d="M15 9h.01"/>
                    </svg>

                    Mascota feliz

                </div>


                <div class="pet-card">

                    <div class="pet-top">

                        <div class="pet-profile">

                            <div class="pet-avatar">
                                🐶
                            </div>

                            <div>
                                <div class="pet-name">
                                    Max
                                </div>

                                <div class="pet-type">
                                    Golden Retriever · 4 años
                                </div>
                            </div>

                        </div>

                        <div class="status">
                            Saludable
                        </div>

                    </div>


                    <div class="pet-image">

                        <div class="dog">
                            🐕
                        </div>

                    </div>


                    <div class="activity-list">

                        <div class="activity">

                            <div class="activity-icon">
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M20 11.5a8.38 8.38 0 0 1-1.9 5.4A8.5 8.5 0 1 1 20 11.5Z"/>
                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                                    <path d="M9 9h.01"/>
                                    <path d="M15 9h.01"/>
                                </svg>
                            </div>

                            <div class="activity-text">
                                Paseo
                            </div>

                            <div class="activity-time">
                                10:30
                            </div>

                        </div>


                        <div class="activity">

                            <div class="activity-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M12 2a10 10 0 1 0 10 10"/>
                                    <path d="M12 6v6l4 2"/>
                                </svg>

                            </div>

                            <div class="activity-text">
                                Veterinario
                            </div>

                            <div class="activity-time">
                                Mañana
                            </div>

                        </div>


                        <div class="activity">

                            <div class="activity-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M4 11h16"/>
                                    <path d="M6 15h12"/>
                                    <path d="M8 19h8"/>
                                    <path d="M12 3v8"/>
                                </svg>

                            </div>

                            <div class="activity-text">
                                Alimentación
                            </div>

                            <div class="activity-time">
                                18:00
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
             FEATURES
        ========================================================== --}}
        <section
            class="features-section"
            id="funcionalidades"
        >

            <div class="section-heading">

                <div class="section-label">
                    Todo conectado
                </div>

                <h2>
                    Cada detalle de tu mascota,
                    bajo control.
                </h2>

                <p>
                    Una plataforma diseñada para mantener organizada
                    toda la información importante y facilitar el
                    seguimiento diario de tus mascotas.
                </p>

            </div>


            <div class="features">

                {{-- Salud --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78Z"/>
                        </svg>

                    </div>

                    <h3>
                        Salud
                    </h3>

                    <p>
                        Mantén organizada la información relacionada
                        con el estado de salud y cuidados de cada mascota.
                    </p>

                </article>


                {{-- Alimentación --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M3 11h18"/>
                            <path d="M5 11v4a5 5 0 0 0 10 0v-4"/>
                            <path d="M9 11V7"/>
                            <path d="M13 11V5"/>
                            <path d="M17 11V7"/>
                        </svg>

                    </div>

                    <h3>
                        Alimentación
                    </h3>

                    <p>
                        Gestiona planes de alimentación y mantén
                        una rutina adecuada para cada mascota.
                    </p>

                </article>


                {{-- Actividades --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>

                    </div>

                    <h3>
                        Actividades
                    </h3>

                    <p>
                        Registra paseos, juegos, visitas veterinarias
                        y cualquier actividad importante.
                    </p>

                </article>


                {{-- Medicamentos --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="m10.5 20.5 9-9a4.95 4.95 0 0 0-7-7l-9 9a4.95 4.95 0 0 0 7 7Z"/>
                            <path d="m8 8 8 8"/>
                        </svg>

                    </div>

                    <h3>
                        Medicamentos
                    </h3>

                    <p>
                        Lleva un registro claro de medicamentos,
                        tratamientos y cuidados especiales.
                    </p>

                </article>


                {{-- Baño --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 12h16"/>
                            <path d="M6 12v6"/>
                            <path d="M18 12v6"/>
                            <path d="M5 18h14"/>
                            <path d="M8 7c0-1.1.9-2 2-2"/>
                            <path d="M12 7c0-1.1.9-2 2-2"/>
                        </svg>

                    </div>

                    <h3>
                        Rutina de baño
                    </h3>

                    <p>
                        Organiza las rutinas de higiene y cuidado
                        para mantener a tus mascotas siempre bien.
                    </p>

                </article>


                {{-- Recordatorios --}}
                <article class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>

                    </div>

                    <h3>
                        Recordatorios
                    </h3>

                    <p>
                        No olvides citas, actividades, medicamentos
                        o cualquier tarea relacionada con tu mascota.
                    </p>

                </article>

            </div>

        </section>


        {{-- =========================================================
             CTA
        ========================================================== --}}
        <section class="cta">

            <h2>
                Tu mascota merece una
                gestión inteligente.
            </h2>

            <p>
                Centraliza todo. Organiza mejor. Cuida más.
            </p>

            @auth

                <a
                    href="{{ filament()->getUrl() }}"
                    class="btn btn-primary"
                >
                    Abrir mi panel

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>

            @else

                <a
                    href="{{ filament()->getLoginUrl() }}"
                    class="btn btn-primary"
                >
                    Comenzar ahora

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </a>

            @endauth

        </section>

    </main>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}
    <footer>

        <div class="footer-inner">

            <div class="footer-brand">
                🐾 Petschool
            </div>

            <div>
                © {{ date('Y') }} Petschool. Todos los derechos reservados.
            </div>

            <div>
                Cuidado inteligente para mascotas.
            </div>

        </div>

    </footer>

</body>
</html>
