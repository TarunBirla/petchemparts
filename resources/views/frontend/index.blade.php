<!-- New code -->

@extends('frontend.layouts.master')

@section('title', 'Petchemparts || Home')

@section('main-content')

    <style>
        /* ---------- hero : color-blocked split ---------- */
        .hero {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            min-height: 100vh;
            max-width: 1380px;
            margin: 0 auto;

        }

        .hero-left {
            padding: 180px 5vw 80px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            width: fit-content;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: 2px;
            color: var(--green);
            border: 1px solid var(--green-dim2);
            background: var(--green-dim);
            padding: 8px 14px;
            border-radius: 20px;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeUp .8s var(--ease) .1s forwards;
        }

        .eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--brass);
            animation: pulse 2s infinite;
        }

        h1.headline {
            font-family: 'Fraunces', serif;
            font-weight: 450;
            color: var(--ink);
            font-size: clamp(42px, 5vw, 76px);
            line-height: 1.02;
            letter-spacing: -1.5px;
            opacity: 0;
            animation: fadeUp .9s var(--ease) .25s forwards;
        }

        h1.headline em {
            font-style: italic;
            font-weight: 450;
            color: var(--green);
        }

        .hero-sub {
            margin-top: 28px;
            font-size: 17px;
            line-height: 1.7;
            color: var(--ink-soft);
            max-width: 460px;
            font-weight: 400;
            opacity: 0;
            animation: fadeUp .9s var(--ease) .4s forwards;
        }

        .hero-search {
            margin-top: 40px;
            display: flex;
            max-width: 500px;
            border: 1px solid var(--line);
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            transition: border-color .25s, box-shadow .25s;
            box-shadow: var(--shadow-sm);
            opacity: 0;
            animation: fadeUp .9s var(--ease) .55s forwards;
        }

        .hero-search:focus-within {
            border-color: var(--green);
            box-shadow: 0 0 0 4px var(--green-dim);
        }

        .hero-search input {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: var(--ink);
            padding: 17px 18px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
        }

        .hero-search input::placeholder {
            color: var(--muted-2);
        }

        .hero-search button {
            background: var(--ink);
            color: #fff;
            border: none;
            padding: 0 24px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            letter-spacing: .3px;
            transition: background .25s;
        }

        .hero-search button:hover {
            background: var(--green);
        }

        .hero-stats {
            display: flex;
            gap: 38px;
            margin-top: 52px;
            opacity: 0;
            animation: fadeUp .9s var(--ease) .7s forwards;
        }

        .hero-stats div {
            border-left: 2px solid var(--brass);
            padding-left: 14px;
        }

        .hero-stats .num {
            font-family: 'Fraunces', serif;
            font-weight: 560;
            font-size: 26px;
            color: var(--ink);
        }

        .hero-stats .lbl {
            font-size: 10.5px;
            color: var(--muted);
            margin-top: 3px;
            letter-spacing: .5px;
            font-family: 'JetBrains Mono', monospace;
        }

        /* right green panel */
        .hero-right {
            position: relative;
            background: linear-gradient(155deg, var(--green-3), var(--green) 60%, var(--green-2));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-right .tex {
            position: absolute;
            inset: 0;
            opacity: .5;
            background-image: linear-gradient(rgba(255, 255, 255, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .06) 1px, transparent 1px);
            background-size: 52px 52px;
            mask-image: radial-gradient(ellipse 70% 60% at 50% 45%, black 30%, transparent 85%);
        }

        .hero-right svg {
            position: relative;
            width: 88%;
            max-width: 480px;
            height: auto;
        }

        .draw {
            stroke-dasharray: 1400;
            stroke-dashoffset: 1400;
            animation: draw 2.6s var(--ease) .5s forwards;
        }

        .draw-slow {
            stroke-dasharray: 2200;
            stroke-dashoffset: 2200;
            animation: draw 3.4s var(--ease) .7s forwards;
        }

        .fade-in-diagram {
            opacity: 0;
            animation: fadeIn 1s ease 1.1s forwards;
        }

        .callout {
            opacity: 0;
            animation: fadeIn .8s ease forwards;
        }

        .callout.c1 {
            animation-delay: 2.3s;
        }

        .callout.c2 {
            animation-delay: 2.55s;
        }

        .callout.c3 {
            animation-delay: 2.8s;
        }

        .spin-slow {
            animation: spin 44s linear infinite;
            transform-origin: center;
        }

        .spin-rev {
            animation: spinRev 34s linear infinite;
            transform-origin: center;
        }

        .float-badge {
            position: absolute;
            background: #fff;
            color: var(--ink);
            padding: 11px 16px;
            border-radius: 8px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 10.5px;
            letter-spacing: .4px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            z-index: 2;
            animation: fadeIn .6s ease 2.6s forwards, floatY 4.5s ease-in-out 3.2s infinite;
        }

        .float-badge.b1 {
            top: 14%;
            left: 6%;
        }

        .float-badge.b2 {
            bottom: 12%;
            right: 7%;
            background: var(--brass);
            color: #fff;
        }

        .float-badge .dot2 {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #2E9E5B;
        }

        @keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .3;
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spinRev {
            from {
                transform: rotate(360deg);
            }

            to {
                transform: rotate(0deg);
            }
        }

        @keyframes marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* ---------- section shell ---------- */
        section {
            position: relative;
            z-index: 1;
            padding: 50px 48px;
        }

        .section-inner {
            max-width: 1380px;
            margin: 0 auto;
        }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 40px;
            margin-bottom: 64px;
            flex-wrap: wrap;
        }

        .section-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: 2.5px;
            color: var(--brass);
            margin-bottom: 16px;
            display: block;
            text-transform: uppercase;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-weight: 450;
            font-size: clamp(30px, 3.2vw, 46px);
            letter-spacing: -1px;
            max-width: 660px;
            color: var(--ink);
            line-height: 1.08;
        }

        .section-title em {
            color: var(--green);
            font-style: italic;
        }

        .section-desc {
            color: var(--ink-soft);
            max-width: 360px;
            font-size: 15px;
            line-height: 1.65;
        }

        .reveal {
            opacity: 0;
            transform: translateY(34px);
            transition: opacity .9s var(--ease), transform .9s var(--ease);
        }

        .reveal.in {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- marquee ---------- */
        .marquee-section {
            padding: 28px 0;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            overflow: hidden;
            background: var(--paper);
        }

        .marquee-track {
            display: flex;
            width: max-content;
            gap: 60px;
            animation: marquee 300s linear infinite;
        }

        .marquee-track span {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12.5px;
            letter-spacing: 2px;
            color: var(--muted);
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
        }

        .marquee-track span::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--brass);
            border-radius: 50%;
        }

        /* ---------- category : editorial asymmetric grid ---------- */
        .cat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 240px);
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
        }

        .cat-card {
            background: var(--white);
            padding: 34px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: background .4s var(--ease);
            display: flex;
            flex-direction: column;
        }

        .cat-card.big {
            grid-column: span 2;
            grid-row: span 2;
            padding: 44px;
        }

        .cat-card:hover {
            background: var(--paper);
        }

        .cat-card.featured {
            background: var(--green);
            color: #fff;
        }

        .cat-card.featured:hover {
            background: var(--green-2);
        }

        .cat-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--muted);
            letter-spacing: 1px;
        }

        .cat-card.featured .cat-num {
            color: rgba(255, 255, 255, .55);
        }

        .cat-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--green-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 22px 0 auto;
            transition: transform .4s var(--ease);
        }

        .cat-card.big .cat-icon-wrap {
            width: 62px;
            height: 62px;
            margin-bottom: 0;
        }

        .cat-card.featured .cat-icon-wrap {
            background: rgba(255, 255, 255, .14);
        }

        .cat-card:hover .cat-icon-wrap {
            transform: rotate(-8deg) scale(1.06);
        }

        .cat-icon {
            width: 22px;
            height: 22px;
            color: var(--green);
        }

        .cat-card.big .cat-icon {
            width: 28px;
            height: 28px;
        }

        .cat-card.featured .cat-icon {
            color: #fff;
        }

        .cat-title {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 19px;
            margin: 18px 0 8px;
            color: var(--ink);
        }

        .cat-card.big .cat-title {
            font-size: 26px;
            margin-top: 26px;
        }

        .cat-card.featured .cat-title {
            color: #fff;
        }

        .cat-desc {
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.55;
        }

        .cat-card.featured .cat-desc {
            color: rgba(255, 255, 255, .75);
        }

        .cat-count-row {
            display: flex;
            align-items: center;
            margin-top: auto;
            padding-top: 16px;
        }

        .cat-count {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--muted);
            letter-spacing: .5px;
        }

        .cat-card.featured .cat-count {
            color: rgba(255, 255, 255, .6);
        }

        .cat-card .arrow {
            margin-left: auto;
            transition: transform .3s var(--ease);
            color: var(--muted);
        }

        .cat-card:hover .arrow {
            transform: translateX(5px);
            color: var(--brass);
        }

        .cat-card.featured .arrow {
            color: rgba(255, 255, 255, .6);
        }

        /* ---------- product grid ---------- */
        .prod-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
        }

        .prod-card {
            background: var(--white);
            padding: 26px;
            position: relative;
            transition: background .4s var(--ease);
        }

        .prod-card:hover {
            background: var(--paper);
        }

        .prod-thumb {
            height: 150px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--paper-2);
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .prod-thumb svg {
            width: 56px;
            height: 56px;
            color: var(--green);
            transition: transform .55s var(--ease);
            opacity: .9;
        }

        .prod-card:hover .prod-thumb svg {
            transform: scale(1.14) rotate(-6deg);
        }

        .stock-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 9px;
            letter-spacing: .5px;
            padding: 4px 9px;
            border-radius: 12px;
            background: #fff;
            color: #1F8F52;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
        }

        .prod-brand {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .prod-title {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 16px;
            margin: 9px 0 4px;
            line-height: 1.3;
            color: var(--ink);
        }

        .prod-ref {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10.5px;
            color: var(--muted);
            margin-bottom: 16px;
        }

        .prod-foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--line-soft);
            padding-top: 16px;
        }

        .prod-price {
            font-family: 'Fraunces', serif;
            font-weight: 560;
            font-size: 18px;
            color: var(--ink);
        }

        .prod-price span {
            font-size: 10.5px;
            color: var(--muted);
            font-weight: 400;
            display: block;
            font-family: 'Inter';
        }

        .add-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s var(--ease);
        }

        .add-btn:hover {
            background: var(--brass);
            border-color: var(--brass);
            transform: rotate(90deg);
        }

        .add-btn:hover svg {
            stroke: #fff;
        }

        .add-btn svg {
            width: 15px;
            height: 15px;
            stroke: var(--ink);
            transition: stroke .3s;
        }

        /* ---------- why : editorial numbered list ---------- */
        .why-wrap {
            display: grid;
            grid-template-columns: 0.9fr 1.6fr;
            gap: 60px;
        }

        .why-list {
            display: flex;
            flex-direction: column;
        }

        .why-item {
            display: grid;
            grid-template-columns: 80px 1fr;
            gap: 26px;
            padding: 36px 0;
            border-top: 1px solid var(--line);
            transition: padding-left .4s var(--ease);
        }

        .why-item:last-child {
            border-bottom: 1px solid var(--line);
        }

        .why-item:hover {
            padding-left: 14px;
        }

        .why-num {
            font-family: 'Fraunces', serif;
            font-weight: 450;
            font-style: italic;
            font-size: 30px;
            color: var(--brass);
        }

        .why-title {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 20px;
            color: var(--ink);
            margin-bottom: 8px;
        }

        .why-desc {
            font-size: 14px;
            color: var(--ink-soft);
            line-height: 1.65;
            max-width: 460px;
        }

        .why-visual {
            position: relative;
            border-radius: 6px;
            overflow: hidden;
            background: linear-gradient(160deg, var(--green-3), var(--green));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            min-height: 480px;
        }

        .why-visual .tex {
            position: absolute;
            inset: 0;
            opacity: .4;
            background-image: linear-gradient(rgba(255, 255, 255, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .06) 1px, transparent 1px);
            background-size: 44px 44px;
        }

        .why-visual-content {
            position: relative;
            text-align: center;
            color: #fff;
        }

        .why-visual-content .big-num {
            font-family: 'Fraunces', serif;
            font-size: 96px;
            font-weight: 450;
            line-height: 1;
            color: var(--brass-2);
        }

        .why-visual-content .cap {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            margin-top: 14px;
            color: rgba(255, 255, 255, .7);
        }

        .why-visual-content .sub {
            font-size: 14px;
            color: rgba(255, 255, 255, .55);
            margin-top: 20px;
            max-width: 280px;
            line-height: 1.6;
        }

        /* ---------- stats band ---------- */
        .stats-band {
            background: var(--ink);
            position: relative;
            overflow: hidden;
        }

        .stats-band::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(168, 124, 63, .18), transparent 70%);
            top: -260px;
            right: -160px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            text-align: center;
            position: relative;
        }

        .stat-item {
            padding: 80px 20px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-item:first-child {
            border-left: none;
        }

        .stat-num {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: clamp(34px, 3.6vw, 52px);
            color: #fff;
        }

        .stat-lbl {
            margin-top: 10px;
            font-size: 11px;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, .5);
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
        }

        /* ---------- process : alternating timeline ---------- */
        .process-list {
            position: relative;
            max-width: 820px;
            margin: 0 auto;
        }

        .process-list::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 1px;
            background: var(--line);
            transform: translateX(-50%);
        }

        .process-item {
            display: grid;
            grid-template-columns: 1fr 40px 1fr;
            align-items: center;
            gap: 0;
            padding: 44px 0;
        }

        .process-col {
            padding: 0 36px;
        }

        .process-item:nth-child(even) .process-col.left {
            grid-column: 1;
            visibility: hidden;
        }

        .process-item:nth-child(even) .process-col.right {
            grid-column: 3;
            visibility: visible;
            text-align: left;
        }

        .process-item:nth-child(odd) .process-col.right {
            visibility: hidden;
        }

        .process-item:nth-child(odd) .process-col.left {
            text-align: right;
        }

        .process-marker {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--white);
            border: 1.5px solid var(--brass);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            color: var(--brass);
            position: relative;
            z-index: 1;
        }

        .process-title {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 21px;
            color: var(--ink);
            margin-bottom: 8px;
        }

        .process-desc {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.65;
        }

        /* ---------- cta ---------- */
        .cta-section {
            margin: 0 48px;
            border-radius: 8px;
            background: linear-gradient(140deg, var(--green-3), var(--green) 55%, var(--green-2));
            padding: 90px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(200, 154, 90, .28), transparent 70%);
            top: -300px;
            right: -200px;
        }

        .cta-title {
            font-family: 'Fraunces', serif;
            font-weight: 450;
            font-size: clamp(30px, 3.8vw, 50px);
            letter-spacing: -1px;
            position: relative;
            color: #fff;
        }

        .cta-title em {
            font-style: italic;
            color: var(--brass-2);
        }

        .cta-desc {
            color: rgba(255, 255, 255, .65);
            max-width: 480px;
            margin: 20px auto 36px;
            font-size: 15.5px;
            position: relative;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            position: relative;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--brass-2);
            color: var(--ink);
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 14px;
            transition: transform .3s var(--ease), box-shadow .3s var(--ease);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px -10px rgba(200, 154, 90, .55);
        }

        .btn-ghost {
            border: 1px solid rgba(255, 255, 255, .3);
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            color: #fff;
            transition: border-color .25s, background .25s;
        }

        .btn-ghost:hover {
            border-color: #fff;
            background: rgba(255, 255, 255, .08);
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




    <section class="hero" style="padding:0;">
        <div class="hero-left">
            <div class="eyebrow"><span class="dot"></span>500+ MANUFACTURER BRANDS · GLOBAL STOCK</div>
            <h1 class="headline">Every part your<br>plant depends on,<br><em>sourced right.</em></h1>
            <p class="hero-sub">The global parts platform for petrochemical, oil &amp; gas and industrial maintenance
                teams — engineered sourcing for electrical, mechanical, process and safety equipment, backed by real
                engineers.</p>
            <!-- <form class="hero-search" onsubmit="return false;">
                <input type="text" placeholder="Search by part number, e.g. SRP981 or brand..." />
                <button type="submit">Search</button>
            </form> -->
            <div class="hero-stats">
                <div>
                    <div class="num">2M+</div>
                    <div class="lbl">PARTS LISTED</div>
                </div>
                <div>
                    <div class="num">500+</div>
                    <div class="lbl">TRUSTED BRANDS</div>
                </div>
                <div>
                    <div class="num">48HR</div>
                    <div class="lbl">AVG. DISPATCH</div>
                </div>
                <div>
                    <div class="num">16YR</div>
                    <div class="lbl">IN OPERATION</div>
                </div>
            </div>
        </div>

        <div class="hero-right">
            <div class="tex"></div>
            <div class="float-badge b1"><span class="dot2"></span>Verified in stock</div>
            <div class="float-badge b2">⚡ Quote in &lt; 1 business day</div>
            <svg viewBox="0 0 500 500" fill="none">
                <g class="spin-slow" opacity="0.25">
                    <circle cx="250" cy="250" r="210" stroke="#ffffff" stroke-width="1" stroke-dasharray="2 8" />
                </g>
                <g class="spin-rev" opacity="0.18">
                    <circle cx="250" cy="250" r="175" stroke="#ffffff" stroke-width="1" stroke-dasharray="1 6" />
                </g>
                <path class="draw" d="M175 150 L325 150 L325 210 L365 250 L365 330 L135 330 L135 250 L175 210 Z"
                    stroke="#ffffff" stroke-width="1.6" stroke-linejoin="round" />
                <path class="draw" d="M195 150 L195 100 L305 100 L305 150" stroke="#ffffff" stroke-width="1.6" />
                <rect class="draw" x="185" y="82" width="130" height="20" stroke="#C89A5A" stroke-width="1.6" />
                <circle class="fade-in-diagram" cx="198" cy="92" r="4" stroke="#C89A5A" stroke-width="1.2" />
                <circle class="fade-in-diagram" cx="250" cy="92" r="4" stroke="#C89A5A" stroke-width="1.2" />
                <circle class="fade-in-diagram" cx="302" cy="92" r="4" stroke="#C89A5A" stroke-width="1.2" />
                <circle class="draw-slow" cx="250" cy="240" r="46" stroke="#C89A5A" stroke-width="1.8" />
                <circle class="fade-in-diagram" cx="250" cy="240" r="10" fill="#123822" stroke="#C89A5A"
                    stroke-width="1.4" />
                <path class="draw" d="M135 260 L70 260 L70 290 L135 290" stroke="#ffffff" stroke-width="1.6" />
                <path class="draw" d="M365 260 L430 260 L430 290 L365 290" stroke="#ffffff" stroke-width="1.6" />
                <line class="fade-in-diagram" x1="30" y1="240" x2="470" y2="240" stroke="rgba(255,255,255,.35)"
                    stroke-width="1" stroke-dasharray="6 4" />
                <line class="fade-in-diagram" x1="250" y1="40" x2="250" y2="460" stroke="rgba(255,255,255,.35)"
                    stroke-width="1" stroke-dasharray="6 4" />
                <g class="fade-in-diagram" stroke="rgba(255,255,255,.45)" stroke-width="1">
                    <line x1="135" y1="350" x2="365" y2="350" />
                    <line x1="135" y1="345" x2="135" y2="355" />
                    <line x1="365" y1="345" x2="365" y2="355" />
                </g>
                <text class="mono fade-in-diagram" x="225" y="372" fill="rgba(255,255,255,.55)" font-size="11"
                    font-family="JetBrains Mono, monospace">DN230 / PN40</text>
                <g class="callout c1">
                    <line x1="365" y1="200" x2="420" y2="170" stroke="#ffffff" stroke-width="1" />
                    <circle cx="365" cy="200" r="2.5" fill="#ffffff" />
                    <text x="424" y="174" fill="rgba(255,255,255,.7)" font-size="11"
                        font-family="JetBrains Mono, monospace">BODY — A216 WCB</text>
                </g>
                <g class="callout c2">
                    <line x1="135" y1="270" x2="55" y2="320" stroke="#C89A5A" stroke-width="1" />
                    <circle cx="135" cy="270" r="2.5" fill="#C89A5A" />
                    <text x="10" y="336" fill="rgba(255,255,255,.7)" font-size="11"
                        font-family="JetBrains Mono, monospace">SEAT — PTFE</text>
                </g>
                <g class="callout c3">
                    <line x1="290" y1="150" x2="340" y2="115" stroke="#ffffff" stroke-width="1" />
                    <circle cx="290" cy="150" r="2.5" fill="#ffffff" />
                    <text x="330" y="112" fill="rgba(255,255,255,.7)" font-size="11"
                        font-family="JetBrains Mono, monospace">FLANGED — ANSI</text>
                </g>
            </svg>
        </div>
    </section>

    @php $brands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get(); @endphp

    <div class="marquee-section">
        <div class="marquee-track" id="marquee">
            {{-- Set 1 --}}
         @foreach($brands as $b)

                <span>{{ strtoupper($b->title) }}</span>
            @endforeach

            
        </div>
    </div>

    {{-- ======= CATEGORIES SECTION (dynamic) ======= --}}
    @php
        $categories = DB::table('categories')
            ->where('status', 'active')
            ->whereNull('parent_id')
            ->limit(9)
            ->get();

        $catProductCounts = DB::table('products')
            ->where('status', 'active')
            ->selectRaw('cat_id, count(*) as total')
            ->groupBy('cat_id')
            ->pluck('total', 'cat_id');

        $catIcons = [
            '<path d="M9 3h6v4H9zM7 7h10l1 4H6zM6 11h12v10H6z"/>',
            '<path d="M4 14l6-10 6 10h-4l4 8-9-8h3z"/>',
            '<circle cx="12" cy="12" r="3.2"/><path d="M12 2v3M12 19v3M22 12h-3M5 12H2M19.07 4.93l-2.12 2.12M7.05 16.95l-2.12 2.12M19.07 19.07l-2.12-2.12M7.05 7.05L4.93 4.93"/>',
            '<circle cx="12" cy="12" r="7"/><circle cx="12" cy="12" r="2.4"/><path d="M12 2v3M12 19v3"/>',
            '<path d="M12 2l7 4v6c0 5-3.2 8.5-7 10-3.8-1.5-7-5-7-10V6z"/>',
            '<path d="M3 18c2 1.2 4 1.2 6 0s4-1.2 6 0 4 1.2 6 0M4 14l1-7h14l1 7"/>',
        ];
    @endphp

    <section id="categories">
        <div class="section-inner">
            <div class="section-head reveal">
                <div>
                    <span class="section-tag">01 — Catalog</span>
                    <h2 class="section-title">{{ $categories->count() }} disciplines. <em>One sourcing desk.</em></h2>
                    <p class="section-desc">From control-room instrumentation to marine-rated hazardous equipment —
                        organised the way your plant is organised.</p>
                </div>
                {{-- YEH LINE ADD KARO --}}
                <a href="{{ url('/frontend/showcategory') }}" style="font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:1.5px;
                        color:var(--brass);text-transform:uppercase;text-decoration:none;
                        border-bottom:1px solid var(--brass);padding-bottom:2px;">
                    All Categories →
                </a>

            </div>

            <div class="cat-grid reveal">
                @foreach($categories as $i => $cat)
                    @php
                        $count = $catProductCounts[$cat->id] ?? 0;
                        $iconSvg = $catIcons[$i % count($catIcons)];
                        $refNum = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                        $isFeatured = $i === 0;
                        $isBig = $i === 0;
                    @endphp

                    <div class="cat-card {{ $isBig ? 'big' : '' }} {{ $isFeatured ? 'featured' : '' }}"
                        onclick="window.location='{{ route('product-cat', $cat->slug) }}'" style="cursor:pointer;">

                        <div class="cat-num mono">REF. {{ $refNum }}</div>

                        <div class="cat-icon-wrap">
                            <svg class="cat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                {!! $iconSvg !!}
                            </svg>
                        </div>

                        <div class="cat-title">{{ $cat->title }}</div>

                        {{-- FIX: isset se check karo --}}
                        @if(isset($cat->description) && $cat->description)
                            <div class="cat-desc">{{ Str::limit(strip_tags($cat->description), 90) }}</div>
                        @else
                            <div class="cat-desc">Browse our complete range of {{ $cat->title }} components and equipment.</div>
                        @endif

                        <div class="cat-count-row">
                            <div class="cat-count mono">
                                {{ number_format($count) }} PART{{ $count != 1 ? 'S' : '' }}
                            </div>
                            <svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ======= PRODUCTS SECTION (dynamic) ======= --}}
    @php
        $featuredProducts = DB::table('products')
            ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
            ->where('products.status', 'active')
            ->select(
                'products.id',
                'products.title',
                'products.slug',
                'products.photo',
                'products.price',
                'products.discount',
                'products.part_number',
                'manufacturers.name as manufacturer_name'
            )
            ->orderBy('products.id', 'DESC')
            ->limit(8)
            ->get();
    @endphp

    <section id="products" style="background:var(--paper);">
        <div class="section-inner">
            <div class="section-head reveal">
                <div>
                    <span class="section-tag">02 — Catalog Picks</span>
                    <h2 class="section-title">Frequently sourced <em>this month.</em></h2>
                    <p class="section-desc">Live availability across our global partner warehouses — every listing verified
                        by our engineering desk.</p>
                </div>

                {{-- YEH LINE ADD KARO --}}
                <a href="{{ url('/frontend/showproduct') }}" style="font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:1.5px;
                        color:var(--brass);text-transform:uppercase;text-decoration:none;
                        border-bottom:1px solid var(--brass);padding-bottom:2px;">
                    All Products →
                </a>
            </div>

            {{-- Row 1: first 4 products --}}
            @if($featuredProducts->count() > 0)
                <div class="prod-grid reveal">
                    @foreach($featuredProducts->take(4) as $product)
                        @php
                            $photos = json_decode($product->photo, true);
                            $hasImg = !empty($photos[0]);
                            $discPrice = $product->discount > 0
                                ? $product->price - ($product->price * $product->discount / 100)
                                : $product->price;
                            $isNew = \Carbon\Carbon::parse(
                                DB::table('products')->where('id', $product->id)->value('created_at')
                            )->diffInDays(now()) < 30;
                        @endphp
                        <div class="prod-card" style="cursor:pointer;"
                            onclick="window.location='{{ route('product-detail', $product->slug) }}'">
                            <div class="prod-thumb">
                                @if($isNew)
                                    <span class="stock-tag">NEW IN</span>
                                @elseif($product->discount > 0)
                                    <span class="stock-tag" style="color:var(--brass);">-{{ $product->discount }}% OFF</span>
                                @else
                                    <span class="stock-tag">IN STOCK</span>
                                @endif

                                @if($hasImg)
                                    <img src="{{ $photos[0] }}" alt="{{ $product->title }}"
                                        style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                        <circle cx="12" cy="12" r="7" />
                                        <circle cx="12" cy="12" r="2.4" />
                                        <path d="M12 2v3M12 19v3M2 12h3M19 12h3" />
                                    </svg>
                                @endif
                            </div>

                            <div class="prod-brand">{{ $product->manufacturer_name ?? 'Petchemparts' }}</div>
                            <div class="prod-title">{{ Str::limit($product->title, 55) }}</div>

                            @if($product->part_number)
                                <div class="prod-ref mono">REF. {{ $product->part_number }}</div>
                            @else
                                <div class="prod-ref mono">&nbsp;</div>
                            @endif

                            <div class="prod-foot">
                                <div class="prod-price">
                                    £{{ number_format($discPrice, 0) }}
                                    <span>excl. VAT</span>
                                </div>
                                <button type="button" class="add-btn" title="Request Quote"
                                    onclick="event.stopPropagation(); addToQuote({{ $product->id }});" style="border:none;cursor:pointer;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Row 2: next 4 products --}}
            @if($featuredProducts->count() > 4)
                <br>
                <div class="prod-grid reveal">
                    @foreach($featuredProducts->skip(4)->take(4) as $product)
                        @php
                            $photos = json_decode($product->photo, true);
                            $hasImg = !empty($photos[0]);
                            $discPrice = $product->discount > 0
                                ? $product->price - ($product->price * $product->discount / 100)
                                : $product->price;
                            $isNew = \Carbon\Carbon::parse(
                                DB::table('products')->where('id', $product->id)->value('created_at')
                            )->diffInDays(now()) < 30;
                        @endphp
                        <div class="prod-card" style="cursor:pointer;"
                            onclick="window.location='{{ route('product-detail', $product->slug) }}'">
                            <div class="prod-thumb">
                                @if($isNew)
                                    <span class="stock-tag">NEW IN</span>
                                @elseif($product->discount > 0)
                                    <span class="stock-tag" style="color:var(--brass);">-{{ $product->discount }}% OFF</span>
                                @else
                                    <span class="stock-tag">IN STOCK</span>
                                @endif

                                @if($hasImg)
                                    <img src="{{ $photos[0] }}" alt="{{ $product->title }}"
                                        style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                        <rect x="4" y="8" width="16" height="10" rx="1" />
                                        <path d="M8 8V6a4 4 0 018 0v2" />
                                    </svg>
                                @endif
                            </div>

                            <div class="prod-brand">{{ $product->manufacturer_name ?? 'Petchemparts' }}</div>
                            <div class="prod-title">{{ Str::limit($product->title, 55) }}</div>

                            @if($product->part_number)
                                <div class="prod-ref mono">REF. {{ $product->part_number }}</div>
                            @else
                                <div class="prod-ref mono">&nbsp;</div>
                            @endif

                            <div class="prod-foot">
                                <div class="prod-price">
                                    £{{ number_format($discPrice, 0) }}
                                    <span>excl. VAT</span>
                                </div>
                                <button type="button" class="add-btn" title="Request Quote"
                                    onclick="event.stopPropagation(); addToQuote({{ $product->id }});" style="border:none;cursor:pointer;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <section id="why">
        <div class="section-inner">
            <div class="section-head reveal">
                <div>
                    <span class="section-tag">03 — Why Petchem</span>
                    <h2 class="section-title">An ecommerce platform with <em>an engineering desk</em> behind it.</h2>
                </div>
            </div>

            <div class="why-wrap reveal">
                <div class="why-list">
                    <div class="why-item">
                        <div class="why-num">01</div>
                        <div>
                            <div class="why-title">Verified Sourcing</div>
                            <div class="why-desc">Every listing is checked by our technical team against manufacturer
                                spec before it reaches the catalog.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-num">02</div>
                        <div>
                            <div class="why-title">500+ Brand Network</div>
                            <div class="why-desc">Direct relationships across Europe, North America and Asia mean
                                genuine parts, not grey-market substitutes.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-num">03</div>
                        <div>
                            <div class="why-title">48hr Dispatch</div>
                            <div class="why-desc">Real-time stock across partner warehouses so urgent breakdown orders
                                move the same day.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-num">04</div>
                        <div>
                            <div class="why-title">Engineer-Led Support</div>
                            <div class="why-desc">Speak to a technical engineer, not a call centre, when a spec doesn't
                                quite match your equipment.</div>
                        </div>
                    </div>
                </div>
                <div class="why-visual">
                    <div class="tex"></div>
                    <div class="why-visual-content">
                        <div class="big-num serif">98%</div>
                        <div class="cap">ORDER ACCURACY</div>
                        <div class="sub">Measured across every quote we've fulfilled since 2009 — because the wrong part
                            costs more than downtime.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding:0 48px;">
        <div class="stats-band reveal" style="border-radius:8px;">
            <div class="stats-grid section-inner">
                <div class="stat-item">
                    <div class="stat-num">16</div>
                    <div class="stat-lbl">Years Supplying Plants</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">500+</div>
                    <div class="stat-lbl">Manufacturer Brands</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">40+</div>
                    <div class="stat-lbl">Countries Served</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">98%</div>
                    <div class="stat-lbl">Order Accuracy Rate</div>
                </div>
            </div>
        </div>
    </section>

    <section id="process">
        <div class="section-inner">
            <div class="section-head reveal" style="justify-content:center;text-align:center;">
                <div style="margin:0 auto;">
                    <span class="section-tag">04 — How Sourcing Works</span>
                    <h2 class="section-title" style="margin:0 auto;">From part number <em>to plant floor.</em></h2>
                </div>
            </div>
            <div class="process-list reveal">
                <div class="process-item">
                    <div class="process-col left">
                        <div class="process-title">Submit the spec</div>
                        <div class="process-desc">Search by part number, upload a drawing, or describe the equipment.
                        </div>
                    </div>
                    <div class="process-marker">01</div>
                    <div class="process-col right"></div>
                </div>
                <div class="process-item">
                    <div class="process-col left"></div>
                    <div class="process-marker">02</div>
                    <div class="process-col right">
                        <div class="process-title">Engineer verifies the match</div>
                        <div class="process-desc">A technical engineer confirms fit, rating and compliance against your
                            plant's exact requirement.</div>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-col left">
                        <div class="process-title">Quote &amp; source globally</div>
                        <div class="process-desc">We price across our 500+ brand network and secure stock from the
                            nearest verified warehouse.</div>
                    </div>
                    <div class="process-marker">03</div>
                    <div class="process-col right"></div>
                </div>
                <div class="process-item">
                    <div class="process-col left"></div>
                    <div class="process-marker">04</div>
                    <div class="process-col right">
                        <div class="process-title">Dispatch &amp; track</div>
                        <div class="process-desc">Priority orders ship within 48 hours with full tracking through to
                            site delivery.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="cta-section reveal">
            <div class="section-tag" style="text-align:center;display:block;color:var(--brass-2);">Get Started</div>
            <h2 class="cta-title">Send us a spec.<br><em>We'll send back a quote.</em></h2>
            <p class="cta-desc">No account required to get pricing — our engineering desk responds to most requests
                within one working day.</p>
            <div class="cta-buttons">
                {{-- REPLACE KARO IS SE --}}
                <a href="{{ url('/frontend/contact') }}" class="btn-primary">Contact Us →</a>
                <a href="{{ url('/frontend/showproduct') }}" class="btn-ghost">Browse Full Catalog</a>
            </div>
        </div>
    </section>



    <script>
        const revealEls = document.querySelectorAll('.reveal');
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
        }, { threshold: 0.12 });
        revealEls.forEach(el => io.observe(el));

        const marquee = document.getElementById('marquee');
        marquee.innerHTML += marquee.innerHTML;

        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            header.style.padding = window.scrollY > 40 ? '14px 48px' : '22px 48px';
            header.classList.toggle('scrolled', window.scrollY > 40);
        });
    </script>
@endsection