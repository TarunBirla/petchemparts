{{-- resources/views/frontend/layouts/head.blade.php --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Petchem Parts — Industrial & Petrochemical Parts, Sourced Right.')</title>
<meta name="description" content="@yield('meta_description', 'Global spare parts sourcing for petrochemical, industrial and oil & gas infrastructure. 500+ manufacturer brands, verified stock, 48hr dispatch.')">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,450;0,9..144,560;0,9..144,650;1,9..144,450&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    :root {
            --white: #FFFFFF;
            --paper: #F6F3EB;
            --paper-2: #EEE9DB;
            --ink: #14150F;
            --ink-soft: #42463C;
            --muted: #83887B;
            --muted-2: #B0B4A5;
            --green: #0E3D2A;
            --green-2: #1D6146;
            --green-3: #082A1C;
            --green-dim: rgba(14, 61, 42, 0.07);
            --green-dim2: rgba(14, 61, 42, 0.12);
            --brass: #AD8036;
            --brass-2: #E0B15E;
            --brass-dim: rgba(173, 128, 54, 0.15);
            --clay: #B4552C;
            --clay-2: #D97544;
            --clay-dim: rgba(180, 85, 44, 0.12);
            --line: #E3DFCF;
            --line-soft: #EBE7D9;
            --radius: 2px;
            --ease: cubic-bezier(.16, .84, .44, 1);
            --shadow-sm: 0 2px 14px -6px rgba(13, 15, 12, 0.10);
            --shadow-md: 0 24px 50px -20px rgba(13, 15, 12, 0.16);
            --shadow-lg: 0 40px 90px -30px rgba(13, 15, 12, 0.22);
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
            background: var(--white);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        ::selection {
            background: var(--green);
            color: #fff;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img,
        svg {
            display: block;
            max-width: 100%;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .serif {
            font-family: 'Fraunces', serif;
        }

        /* ---------- nav ---------- */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            padding: 22px 48px;

            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(14px) saturate(1.3);
            border-bottom: 1px solid transparent;
            transition: padding .35s var(--ease), border-color .35s var(--ease), box-shadow .35s var(--ease);
            
        }
        .header-inner {
    width: 100%;
    max-width: 1380px;
    margin: 0 auto;


    display: flex;
    align-items: center;
    justify-content: space-between;
}

        header.scrolled {
            border-color: var(--line);
            box-shadow: 0 6px 24px -18px rgba(13, 15, 12, .2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo img {
            height: 34px;
            width: auto;
            object-fit: contain;
            transition: transform .35s var(--ease);
        }

        .logo:hover img {
            transform: scale(1.03);
        }

        .logo .sub {
            color: var(--muted);
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            letter-spacing: 1.5px;
            font-weight: 500;
        }

        nav ul {
            display: flex;
            gap: 38px;
            list-style: none;
        }

        nav a {
            font-size: 13px;
            font-weight: 500;
            color: var(--ink-soft);
            position: relative;
            padding: 4px 0;
            transition: color .25s;
        }

        nav a:hover {
            color: var(--ink);
        }

        nav a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 1.5px;
            background: var(--brass);
            transition: width .35s var(--ease);
        }

        nav a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .btn-quote {
            background: var(--green);
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            padding: 12px 24px;
            border-radius: 30px;
            letter-spacing: .2px;
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), background .35s;
        }

        .btn-quote:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -10px rgba(18, 56, 34, .45);
            background: var(--green-2);
        }

        .nav-links-wrap {
            display: flex;
            align-items: center;
            gap: 42px;
        }

                /* ---------- footer ---------- */
        footer {
            padding: 90px 48px 34px;
            border-top: 1px solid var(--line);
            margin-top: 60px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr repeat(3, 1fr);
            gap: 40px;
            max-width: 1380px;
            margin: 0 auto;
        }

        .footer-col h4 {
            font-size: 11px;
            letter-spacing: 1.5px;
            color: var(--muted);
            font-family: 'JetBrains Mono', monospace;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .footer-col a {
            font-size: 14px;
            color: var(--ink-soft);
            transition: color .2s;
        }

        .footer-col a:hover {
            color: var(--green);
        }

        .footer-bottom {
            max-width: 1380px;
            margin: 70px auto 0;
            padding-top: 26px;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            color: var(--muted);
            font-size: 12px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-logo img {
            height: 30px;
            margin-bottom: 18px;
        }

         /* ---------- responsive ---------- */
        @media(max-width:1100px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .hero-left {
                padding: 150px 32px 60px;
            }

            .hero-right {
                min-height: 60vh;
                padding: 60px 32px;
            }

            .cat-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: auto;
            }

            .cat-card.big {
                grid-column: span 2;
                grid-row: span 1;
            }

            .prod-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .why-wrap {
                grid-template-columns: 1fr;
            }

            .why-visual {
                min-height: 320px;
                order: -1;
            }

            nav ul {
                display: none;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

            .process-item {
                grid-template-columns: 1fr;
                text-align: left !important;
            }

            .process-list::before {
                left: 20px;
            }

            .process-marker {
                margin-bottom: 16px;
            }

            .process-item:nth-child(even) .process-col.left,
            .process-item:nth-child(odd) .process-col.right {
                display: none;
                visibility: visible;
            }

            .process-item:nth-child(even) .process-col.right,
            .process-item:nth-child(odd) .process-col.left {
                grid-column: 1;
                text-align: left !important;
                padding-left: 56px;
            }
        }

        @media(max-width:640px) {
            header {
                padding: 16px 22px;
            }

            section {
                padding: 80px 22px;
            }

            .cat-grid,
            .prod-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .cat-card.big {
                grid-column: span 1;
            }

            .stat-item {
                border-left: none;
                border-top: 1px solid rgba(255, 255, 255, .1);
            }

            .stat-item:first-child {
                border-top: none;
            }

            .cta-section {
                padding: 56px 26px;
                margin: 0 22px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                flex-wrap: wrap;
                row-gap: 22px;
            }

            .float-badge {
                display: none;
            }

            .hero-left {
                padding: 140px 22px 50px;
            }
        }

        @media(prefers-reduced-motion:reduce) {
            * {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
</style>
@stack('styles')