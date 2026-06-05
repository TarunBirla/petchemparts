@extends('frontend.layouts.master')

@section('title', 'Petchemparts — Industrial & Petrochemical Parts Specialists')

@section('main-content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
/* ============================================================
   PETCHEMPARTS — PRO HOME PAGE
   Aesthetic: Dark Industrial Luxury
   Fonts: Syne (display) + DM Sans (body) + JetBrains Mono (labels)
   ============================================================ */

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --ink:       #060A0F;
    --ink-2:     #0D1420;
    --ink-3:     #131C2B;
    --steel:     #1C2A3F;
    --wire:      #253348;
    --slate:     #00D4FF;
    --mist:      #8A9BB5;
    --fog:       #C2CFDF;
    --paper:     #EEF2F7;
    --white:     #FFFFFF;
    --acid:      #00D4FF;      /* electric cyan accent */
    --acid-dim:  rgba(0,212,255,0.12);
    --acid-glow: rgba(0,212,255,0.25);
    --amber:     #FFB800;      /* warning amber */
    --amber-dim: rgba(255,184,0,0.10);
    --red-hot:   #FF4040;
    --font-d:    'Poppins', sans-serif;
    --font-b:    'Poppins', sans-serif;
    --font-m:    'Poppins', monospace;
    --r-sm:      8px;
    --r-md:      14px;
    --r-lg:      20px;
    --r-xl:      28px;
    --ease-out:  cubic-bezier(0.16, 1, 0.3, 1);
}

/* body { background: var(--ink); font-family: var(--font-b); color: var(--fog); } */

/* ── UTILITY ── */
.container { max-width: 1320px; margin: 0 auto; padding: 0 32px; }
@media (max-width: 768px) { .container { padding: 0 20px; } }

.label-tag {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: var(--font-m); font-size: 10.5px; font-weight: 500;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--acid); background: var(--acid-dim);
    border: 1px solid rgba(0,212,255,0.25); border-radius: 4px;
    padding: 5px 12px;
}
.label-tag::before { content: ''; width: 6px; height: 6px; background: var(--acid); border-radius: 50%; animation: blink 2s infinite; }
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

/* ── SECTION HEADING ── */
.sec-title {
    font-family: var(--font-d); font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800; color: var(--white); line-height: 1.08; letter-spacing: -0.02em;
}
.sec-title em { font-style: normal; color: var(--acid); }
.sec-sub {
    font-size: 15px; color: var(--mist); line-height: 1.7; max-width: 520px;
    margin-top: 12px;
}

/* ============================================================
   HERO
   ============================================================ */
.hero {
    position: relative; min-height: 100vh;
    display: flex; flex-direction: column;
    overflow: hidden;
    background: var(--ink);
}

/* background: diagonal grid + gradient */
.hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(0,212,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,212,255,0.04) 1px, transparent 1px);
    background-size: 64px 64px;
    mask-image: radial-gradient(ellipse 70% 70% at 60% 40%, black 0%, transparent 100%);
}
.hero::after {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 55% 65% at 72% 38%, rgba(0,212,255,0.09) 0%, transparent 65%),
                radial-gradient(ellipse 40% 50% at 15% 80%, rgba(255,184,0,0.05) 0%, transparent 55%);
    pointer-events: none;
}

/* Slide system */
.hero-slides { position: absolute; inset: 0; }
.hero-slide {
    position: absolute; inset: 0;
    background-size: cover; background-position: center;
    opacity: 0; transition: opacity 1.5s var(--ease-out);
}
.hero-slide.active { opacity: 1; }
.hero-slide::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(105deg, rgba(6,10,15,0.92) 0%, rgba(6,10,15,0.55) 55%, rgba(6,10,15,0.3) 100%);
}

/* Decorative vertical line */
.hero-vline {
    position: absolute; left: 80px; top: 0; bottom: 0; width: 1px;
    background: linear-gradient(to bottom, transparent, rgba(0,212,255,0.3) 30%, rgba(0,212,255,0.15) 70%, transparent);
    z-index: 3;
}
@media (max-width: 768px) { .hero-vline { display: none; } }

/* Content */
.hero-body {
    position: relative; z-index: 4;
    display: flex; flex-direction: column; justify-content: center;
    flex: 1; padding: 120px 80px 80px 120px;
    max-width: 760px;
}
@media (max-width: 1024px) { .hero-body { padding: 100px 40px 80px; max-width: 100%; } }
@media (max-width: 768px) { .hero-body { padding: 80px 20px 60px; } }

.hero-eyebrow { margin-bottom: 24px; animation: fadeUp 0.8s var(--ease-out) both; }

.hero-heading {
    font-family: var(--font-d); font-weight: 800;
    font-size: clamp(2.5rem, 5.5vw, 4.2rem);
    color: var(--white); line-height: 1.05; letter-spacing: -0.03em;
    margin-bottom: 22px;
    animation: fadeUp 0.8s 0.1s var(--ease-out) both;
}
.hero-heading span {
    display: inline-block; position: relative;
    background: linear-gradient(90deg, var(--acid), #38E8FF);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}

.hero-para {
    font-size: 16px; color: var(--mist); line-height: 1.75; max-width: 500px;
    margin-bottom: 40px;
    animation: fadeUp 0.8s 0.2s var(--ease-out) both;
}

.hero-actions {
    display: flex; gap: 14px; flex-wrap: wrap;
    animation: fadeUp 0.8s 0.3s var(--ease-out) both;
}
.btn-prime {
    display: inline-flex; align-items: center; gap: 9px;
    background: var(--acid); color: var(--ink);
    font-family: var(--font-d); font-weight: 700; font-size: 14px;
    padding: 14px 28px; border-radius: var(--r-sm);
    text-decoration: none; letter-spacing: 0.01em;
    transition: all 0.25s var(--ease-out);
    box-shadow: 0 0 0 0 var(--acid-glow);
}
.btn-prime:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 32px var(--acid-glow), 0 8px 24px rgba(0,212,255,0.25);
    color: var(--ink);
}
.btn-ghost {
    display: inline-flex; align-items: center; gap: 9px;
    background: transparent; color: var(--white);
    font-family: var(--font-d); font-weight: 600; font-size: 14px;
    padding: 13px 28px; border-radius: var(--r-sm);
    text-decoration: none; letter-spacing: 0.01em;
    border: 1.5px solid rgba(255,255,255,0.18);
    transition: all 0.25s var(--ease-out);
}
.btn-ghost:hover {
    background: rgba(255,255,255,0.06);
    border-color: rgba(255,255,255,0.35);
    transform: translateY(-3px);
    color: var(--white);
}

/* Floating stat cards */
.hero-stats {
    position: absolute; right: 64px; bottom: 80px;
    z-index: 5; display: flex; flex-direction: column; gap: 12px;
}
@media (max-width: 1024px) { .hero-stats { display: none; } }

.stat-card {
    background: rgba(13,20,32,0.75);
    border: 1px solid rgba(255,255,255,0.09);
    backdrop-filter: blur(20px);
    border-radius: var(--r-md);
    padding: 18px 24px; min-width: 210px;
    animation: fadeLeft 0.8s var(--ease-out) both;
    transition: transform 0.3s var(--ease-out), border-color 0.3s;
}
.stat-card:hover {
    transform: translateX(-4px);
    border-color: rgba(0,212,255,0.3);
}
.stat-card:nth-child(1) { animation-delay: 0.4s; }
.stat-card:nth-child(2) { animation-delay: 0.55s; }
.stat-card:nth-child(3) { animation-delay: 0.7s; }
.stat-top { display: flex; align-items: center; gap: 10px; margin-bottom: 4px; }
.stat-icon { color: var(--acid); font-size: 13px; }
.stat-label { font-family: var(--font-m); font-size: 10px; color: var(--mist); letter-spacing: 0.1em; text-transform: uppercase; }
.stat-val { font-family: var(--font-d); font-size: 28px; font-weight: 800; color: var(--white); line-height: 1; }
.stat-val sup { font-size: 14px; color: var(--acid); }

/* Slide dots */
.hero-nav {
    position: absolute; bottom: 36px; left: 120px;
    z-index: 5; display: flex; gap: 8px; align-items: center;
}
@media (max-width: 768px) { .hero-nav { left: 20px; } }
.hero-nav-dot {
    width: 8px; height: 8px;
    border-radius: 4px; background: rgba(255,255,255,0.25);
    cursor: pointer; border: none;
    transition: all 0.35s var(--ease-out);
}
.hero-nav-dot.active { background: var(--acid); width: 32px; }

/* ── Scroll cue ── */
.scroll-cue {
    position: absolute; bottom: 36px; right: 50%;
    transform: translateX(50%);
    z-index: 5; display: flex; flex-direction: column; align-items: center; gap: 6px;
    font-family: var(--font-m); font-size: 9px; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--mist);
    animation: fadeUp 1s 1s var(--ease-out) both;
}
.scroll-cue-line {
    width: 1px; height: 40px;
    background: linear-gradient(to bottom, var(--acid), transparent);
    animation: scrollPulse 2s infinite;
}
@keyframes scrollPulse { 0%,100%{opacity:1;transform:scaleY(1)} 50%{opacity:0.4;transform:scaleY(0.6)} }

/* ============================================================
   SEARCH BAR
   ============================================================ */
.search-belt {
    background: var(--ink-2);
    border-top: 1px solid rgba(255,255,255,0.06);
    border-bottom: 1px solid rgba(255,255,255,0.06);
    position: relative; z-index: 20;
    padding: 0;
}
.search-lift {
    max-width: 1320px; margin: 0 auto; padding: 0 32px;
    transform: translateY(-52px);
    margin-bottom: -52px;
}
@media (max-width: 768px) { .search-lift { padding: 0 20px; transform: translateY(-32px); margin-bottom: -32px; } }

.search-box {
    background: var(--ink-2);
    border: 1px solid var(--wire);
    border-radius: var(--r-lg);
    padding: 30px 36px;
    box-shadow: 0 32px 64px rgba(0,0,0,0.5), 0 0 0 1px rgba(0,212,255,0.06);
    position: relative;
}
.search-box::before {
    content: '';
    position: absolute; top: 0; left: 40px; right: 40px; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,212,255,0.4), transparent);
}
.search-ttl {
    font-family: var(--font-d); font-size: 19px; font-weight: 700;
    color: var(--white); margin-bottom: 18px;
}
.search-ttl span { color: var(--acid); }

.search-row { display: flex; gap: 10px; align-items: stretch; position: relative; }

.search-inp-wrap {
    flex: 1; position: relative;
}
.search-inp-wrap i {
    position: absolute; left: 18px; top: 50%; transform: translateY(-50%);
    color: var(--mist); font-size: 14px; pointer-events: none;
    transition: color 0.2s;
}
.search-inp-wrap:focus-within i { color: var(--acid); }

.search-inp {
    width: 100%; height: 52px;
    background: var(--ink-3); border: 1.5px solid var(--wire);
    border-radius: var(--r-sm); padding: 0 18px 0 46px;
    font-family: var(--font-b); font-size: 14.5px;
    color: var(--white); outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.search-inp::placeholder { color: var(--slate); }
.search-inp:focus {
    border-color: var(--acid);
    box-shadow: 0 0 0 3px var(--acid-dim);
    background: var(--ink);
}

.search-btn {
    height: 52px; padding: 0 30px;
    background: var(--acid); color: var(--ink);
    border: none; border-radius: var(--r-sm);
    font-family: var(--font-d); font-weight: 700; font-size: 14px;
    cursor: pointer; display: flex; align-items: center; gap: 8px;
    white-space: nowrap; letter-spacing: 0.02em;
    transition: all 0.2s var(--ease-out);
}
.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px var(--acid-glow);
}

/* Search dropdown */
#searchDrop {
    position: absolute; top: calc(100% + 10px); left: 0; right: 0;
    background: var(--ink-2); border: 1.5px solid var(--wire);
    border-radius: var(--r-md); z-index: 999; display: none;
    overflow: hidden; box-shadow: 0 24px 60px rgba(0,0,0,0.6);
    max-height: 340px; overflow-y: auto;
}
#searchDrop::-webkit-scrollbar { width: 4px; }
#searchDrop::-webkit-scrollbar-thumb { background: var(--wire); border-radius: 4px; }
.drop-item {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 18px; text-decoration: none;
    color: var(--fog); font-size: 13.5px;
    border-bottom: 1px solid rgba(255,255,255,0.04);
    transition: background 0.15s;
}
.drop-item:hover { background: var(--ink-3); color: var(--acid); }
.drop-item i { color: var(--acid); font-size: 12px; flex-shrink: 0; }
.drop-pn {
    font-family: var(--font-m); font-size: 11px;
    background: var(--ink-3); color: var(--mist);
    padding: 2px 8px; border-radius: 4px; border: 1px solid var(--wire);
    margin-left: auto; flex-shrink: 0;
}
.drop-empty { padding: 18px; color: var(--mist); font-size: 13.5px; }

@media (max-width: 640px) {
    .search-row { flex-direction: column; }
    .search-btn { width: 100%; justify-content: center; }
    .search-box { padding: 24px 20px; }
}

/* ============================================================
   TICKER / ANNOUNCEMENT BAR
   ============================================================ */
.ticker-bar {
    background: var(--acid); padding: 10px 0; overflow: hidden;
    position: relative; z-index: 10;
}
.ticker-inner {
    display: flex; align-items: center; gap: 0;
    white-space: nowrap; animation: tickerRoll 30s linear infinite;
}
.ticker-item {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-m); font-size: 11px; font-weight: 500;
    letter-spacing: 0.08em; text-transform: uppercase;
    color: var(--ink); padding: 0 48px;
}
.ticker-dot { width: 5px; height: 5px; background: var(--ink); border-radius: 50%; opacity: 0.4; }
@keyframes tickerRoll { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }

/* ============================================================
   BRANDS CAROUSEL
   ============================================================ */
.brands-sec {
    padding: 80px 0 72px;
    background: var(--ink-2);
    border-bottom: 1px solid rgba(255,255,255,0.05);
}
.brands-head {
    display: flex; flex-direction: column; align-items: center;
    gap: 10px; margin-bottom: 44px;
}

.brands-runway { position: relative; overflow: hidden; }
.brands-runway::before,
.brands-runway::after {
    content: ''; position: absolute; top: 0; bottom: 0; width: 100px;
    z-index: 2; pointer-events: none;
}
.brands-runway::before { left: 0; background: linear-gradient(to right, var(--ink-2), transparent); }
.brands-runway::after { right: 0; background: linear-gradient(to left, var(--ink-2), transparent); }

.brands-track {
    display: flex; gap: 14px;
    transition: transform 0.7s cubic-bezier(0.25,0.1,0.25,1);
}
.brand-pill {
    flex-shrink: 0; min-width: 176px; height: 66px;
    background: var(--ink-3); border: 1px solid var(--wire);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    padding: 0 22px;
    font-family: var(--font-d); font-weight: 700; font-size: 13px;
    color: var(--mist); letter-spacing: 0.04em;
    transition: all 0.25s var(--ease-out); cursor: default;
}
.brand-pill:hover {
    border-color: var(--acid);
    color: var(--acid);
    background: var(--acid-dim);
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,212,255,0.12);
}

/* ============================================================
   CATEGORIES
   ============================================================ */
.cats-sec {
    padding: 96px 0;
    background: var(--ink);
    position: relative;
}
.cats-sec::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent 0%, rgba(0,212,255,0.2) 50%, transparent 100%);
}

.sec-hd {
    display: flex; justify-content: space-between; align-items: flex-end;
    margin-bottom: 52px; gap: 20px; flex-wrap: wrap;
}
.sec-hd-left { display: flex; flex-direction: column; gap: 10px; }
.sec-hd-right a {
    font-family: var(--font-m); font-size: 11px; font-weight: 500;
    letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--acid); text-decoration: none;
    display: flex; align-items: center; gap: 7px;
    border-bottom: 1px solid var(--acid-dim); padding-bottom: 3px;
    transition: gap 0.2s, border-color 0.2s;
}
.sec-hd-right a:hover { gap: 12px; border-color: var(--acid); }

.cats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;
}
@media (max-width: 1024px) { .cats-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .cats-grid { grid-template-columns: 1fr; } }

.cat-card {
    background: var(--ink-2);
    border: 1px solid var(--wire);
    border-radius: var(--r-md);
    padding: 26px;
    position: relative; overflow: hidden;
    transition: all 0.3s var(--ease-out);
}
.cat-card::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, var(--acid), #38E8FF);
    transform: scaleX(0); transform-origin: left;
    transition: transform 0.35s var(--ease-out);
}
.cat-card:hover {
    border-color: rgba(0,212,255,0.3);
    background: var(--ink-3);
    transform: translateY(-5px);
    box-shadow: 0 20px 48px rgba(0,0,0,0.4), 0 0 0 1px rgba(0,212,255,0.1);
}
.cat-card:hover::after { transform: scaleX(1); }

/* Number accent */
.cat-num {
    position: absolute; top: 20px; right: 20px;
    font-family: var(--font-m); font-size: 11px;
    color: var(--slate); letter-spacing: 0.08em;
}

.cat-ico {
    width: 50px; height: 50px;
    background: var(--acid-dim); border: 1px solid rgba(0,212,255,0.18);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: var(--acid);
    margin-bottom: 18px;
    transition: all 0.3s;
}
.cat-card:hover .cat-ico {
    background: var(--acid);
    color: var(--ink);
    border-color: var(--acid);
    box-shadow: 0 0 24px var(--acid-glow);
}

.cat-title {
    font-family: var(--font-d); font-size: 16px; font-weight: 700;
    color: var(--white); text-decoration: none; display: block;
    margin-bottom: 16px;
    transition: color 0.2s;
}
.cat-title:hover { color: var(--acid); }

.cat-subs { list-style: none; display: flex; flex-direction: column; gap: 5px; }
.cat-subs li a {
    font-size: 13px; color: var(--mist); text-decoration: none;
    display: flex; align-items: center; gap: 8px;
    padding: 3px 0; transition: color 0.2s, gap 0.2s;
}
.cat-subs li a::before {
    content: '';
    width: 14px; height: 1px; background: var(--slate);
    flex-shrink: 0; transition: background 0.2s, width 0.2s;
}
.cat-subs li a:hover { color: var(--acid); }
.cat-subs li a:hover::before { background: var(--acid); width: 20px; }

.cat-more { font-size: 11.5px; color: var(--slate); padding: 6px 0 0 22px; }

.cat-foot {
    margin-top: 20px; padding-top: 16px;
    border-top: 1px solid rgba(255,255,255,0.05);
}
.cat-foot a {
    font-family: var(--font-m); font-size: 10.5px; font-weight: 500;
    letter-spacing: 0.1em; text-transform: uppercase;
    color: var(--acid); text-decoration: none;
    display: inline-flex; align-items: center; gap: 6px;
    transition: gap 0.2s;
}
.cat-foot a:hover { gap: 10px; }

/* ============================================================
   PRODUCTS
   ============================================================ */
.prods-sec {
    padding: 96px 0;
    background: var(--ink-2);
    border-top: 1px solid rgba(255,255,255,0.05);
}

.prods-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
@media (max-width: 1200px) { .prods-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 860px)  { .prods-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px)  { .prods-grid { grid-template-columns: 1fr; } }

.prod-card {
    background: var(--ink-3);
    border: 1px solid var(--wire);
    border-radius: var(--r-md);
    display: flex; flex-direction: column;
    overflow: hidden;
    transition: all 0.3s var(--ease-out);
    position: relative;
}
.prod-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,212,255,0.4), transparent);
    opacity: 0; transition: opacity 0.3s;
}
.prod-card:hover {
    border-color: rgba(0,212,255,0.25);
    transform: translateY(-5px);
    box-shadow: 0 24px 60px rgba(0,0,0,0.45), 0 0 0 1px rgba(0,212,255,0.08);
}
.prod-card:hover::before { opacity: 1; }

/* Badge strip */
.prod-badge-strip {
    position: absolute; top: 16px; left: 0;
    display: flex; flex-direction: column; gap: 4px;
}
.prod-badge {
    font-family: var(--font-m); font-size: 9px; font-weight: 500;
    letter-spacing: 0.1em; text-transform: uppercase;
    padding: 3px 9px 3px 12px;
    border-radius: 0 4px 4px 0;
}
.badge-new { background: var(--acid); color: var(--ink); }
.badge-sale { background: var(--amber); color: var(--ink); }

/* Image area (no image — pattern) */
.prod-img {
    height: 170px; position: relative; overflow: hidden;
    background: var(--ink);
    display: flex; align-items: center; justify-content: center;
}
.prod-img-pattern {
    position: absolute; inset: 0;
    background-image:
        repeating-linear-gradient(45deg, rgba(0,212,255,0.03) 0px, rgba(0,212,255,0.03) 1px, transparent 1px, transparent 18px),
        repeating-linear-gradient(-45deg, rgba(0,212,255,0.03) 0px, rgba(0,212,255,0.03) 1px, transparent 1px, transparent 18px);
}
.prod-img img { width: 100%; height: 100%; object-fit: cover; position: relative; z-index: 1; }
.prod-img-icon {
    font-size: 36px; color: var(--wire); position: relative; z-index: 1;
    transition: color 0.3s, transform 0.3s;
}
.prod-card:hover .prod-img-icon { color: var(--slate); transform: scale(1.1); }

.prod-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }

.prod-bc {
    display: flex; align-items: center; gap: 5px;
    font-family: var(--font-m); font-size: 10px;
    color: var(--slate); margin-bottom: 10px; flex-wrap: wrap;
    letter-spacing: 0.05em;
}
.prod-bc i { font-size: 8px; }

.prod-name {
    font-family: var(--font-d); font-size: 15px; font-weight: 700;
    color: var(--white); line-height: 1.4; margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.prod-desc {
    font-size: 12.5px; color: var(--mist); line-height: 1.6;
    margin-bottom: 14px; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}

/* Meta table */
.prod-meta { margin-bottom: 16px; display: flex; flex-direction: column; gap: 5px; }
.prod-meta-row {
    display: flex; align-items: center; gap: 8px;
    font-family: var(--font-m); font-size: 11px; color: var(--mist);
}
.prod-meta-row i { color: var(--acid); font-size: 10px; width: 12px; }
.meta-k { color: var(--slate); margin-right: 2px; }

/* PDF link */
.prod-pdf a {
    display: inline-flex; align-items: center; gap: 6px;
    font-family: var(--font-m); font-size: 10.5px; color: var(--amber);
    text-decoration: none;
    transition: color 0.2s;
}
.prod-pdf a:hover { color: #FFD54F; }

/* Price */
.prod-price {
    display: flex; align-items: baseline; gap: 8px; margin-bottom: 16px;
}
.price-now {
    font-family: var(--font-d); font-size: 22px; font-weight: 800;
    color: var(--acid);
}
.price-was {
    font-family: var(--font-m); font-size: 13px;
    color: var(--slate); text-decoration: line-through;
}
.price-save {
    font-family: var(--font-m); font-size: 10px;
    background: var(--amber-dim); color: var(--amber);
    padding: 2px 7px; border-radius: 4px; border: 1px solid rgba(255,184,0,0.2);
}

/* Actions */
.prod-actions { display: flex; gap: 8px; }
.pa-icon {
    width: 42px; height: 42px; flex-shrink: 0;
    background: var(--ink); border: 1px solid var(--wire);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--mist); font-size: 14px; text-decoration: none;
    transition: all 0.2s;
}
.pa-icon:hover {
    background: var(--acid-dim); border-color: var(--acid); color: var(--acid);
}
.pa-btn {
    flex: 1; height: 42px;
    background: var(--acid); color: var(--ink);
    border: none; border-radius: var(--r-sm);
    font-family: var(--font-d); font-weight: 700; font-size: 13px;
    cursor: pointer; text-decoration: none;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    letter-spacing: 0.02em;
    transition: all 0.2s var(--ease-out);
}
.pa-btn:hover {
    background: #33DAFF; color: var(--ink);
    box-shadow: 0 6px 20px var(--acid-glow);
    transform: translateY(-1px);
}

/* ============================================================
   SHOW ALL BUTTON
   ============================================================ */
.center-cta { display: flex; justify-content: center; margin-top: 48px; }
.cta-all {
    display: inline-flex; align-items: center; gap: 10px;
    padding: 14px 40px;
    background: transparent; color: var(--acid);
    border: 1.5px solid rgba(0,212,255,0.35);
    border-radius: 100px;
    font-family: var(--font-d); font-weight: 700; font-size: 14px;
    text-decoration: none; letter-spacing: 0.04em;
    transition: all 0.25s var(--ease-out);
}
.cta-all:hover {
    background: var(--acid-dim);
    border-color: var(--acid);
    color: var(--acid);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px var(--acid-glow);
}

/* ============================================================
   TRUST STRIP
   ============================================================ */
.trust-sec {
    background: var(--ink);
    border-top: 1px solid rgba(255,255,255,0.05);
    border-bottom: 1px solid rgba(255,255,255,0.05);
    padding: 80px 0;
    position: relative; overflow: hidden;
}
.trust-sec::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(0,212,255,0.04) 0%, transparent 70%);
}

.trust-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px;
    border: 1px solid var(--wire);
    border-radius: var(--r-lg);
    overflow: hidden;
    position: relative;
}
@media (max-width: 768px) {
    .trust-grid { grid-template-columns: repeat(2, 1fr); }
}

.trust-cell {
    background: var(--ink-2);
    padding: 40px 32px;
    display: flex; flex-direction: column; align-items: flex-start;
    gap: 0; position: relative;
    transition: background 0.3s;
}
.trust-cell::after {
    content: '';
    position: absolute; right: 0; top: 20%; bottom: 20%;
    width: 1px; background: var(--wire);
}
.trust-cell:last-child::after { display: none; }
@media (max-width: 768px) {
    .trust-cell:nth-child(2)::after { display: none; }
}

.trust-cell:hover { background: var(--ink-3); }

.trust-ico-wrap {
    width: 52px; height: 52px; margin-bottom: 20px;
    background: var(--acid-dim); border: 1px solid rgba(0,212,255,0.2);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; color: var(--acid);
    transition: all 0.3s;
}
.trust-cell:hover .trust-ico-wrap {
    background: var(--acid); color: var(--ink);
    box-shadow: 0 0 24px var(--acid-glow);
}

.trust-h {
    font-family: var(--font-d); font-size: 17px; font-weight: 700;
    color: var(--white); margin-bottom: 8px;
}
.trust-p { font-size: 13px; color: var(--mist); line-height: 1.65; }
.trust-accent {
    margin-top: 16px; padding-top: 16px;
    border-top: 1px solid rgba(255,255,255,0.05);
    font-family: var(--font-m); font-size: 22px; font-weight: 500;
    color: var(--acid);
}

/* ============================================================
   WHY US — FEATURE STRIP
   ============================================================ */
.why-sec {
    padding: 96px 0;
    background: var(--ink-2);
}
.why-layout {
    display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;
}
@media (max-width: 900px) { .why-layout { grid-template-columns: 1fr; gap: 48px; } }

.why-left { display: flex; flex-direction: column; gap: 10px; }
.why-left .sec-sub { max-width: 460px; }

.why-list { margin-top: 32px; display: flex; flex-direction: column; gap: 0; }
.why-item {
    display: flex; align-items: flex-start; gap: 16px;
    padding: 20px 0;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    transition: padding-left 0.2s var(--ease-out);
    cursor: default;
}
.why-item:last-child { border-bottom: none; }
.why-item:hover { padding-left: 8px; }

.why-item-ico {
    width: 38px; height: 38px; flex-shrink: 0;
    background: var(--acid-dim);
    border: 1px solid rgba(0,212,255,0.2);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--acid); font-size: 14px;
    transition: all 0.2s;
}
.why-item:hover .why-item-ico { background: var(--acid); color: var(--ink); }

.why-item-h {
    font-family: var(--font-d); font-size: 15px; font-weight: 700;
    color: var(--white); margin-bottom: 4px;
}
.why-item-p { font-size: 13px; color: var(--mist); line-height: 1.6; }

/* Right: big number panel */
.why-right {
    display: grid; grid-template-columns: 1fr 1fr; gap: 14px;
}
.num-card {
    background: var(--ink-3); border: 1px solid var(--wire);
    border-radius: var(--r-md); padding: 32px 24px;
    position: relative; overflow: hidden;
    transition: all 0.3s var(--ease-out);
}
.num-card::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(0,212,255,0.06) 0%, transparent 60%);
    opacity: 0; transition: opacity 0.3s;
}
.num-card:hover { border-color: rgba(0,212,255,0.25); transform: translateY(-4px); }
.num-card:hover::before { opacity: 1; }

.num-card .big {
    font-family: var(--font-d); font-size: 48px; font-weight: 800;
    color: var(--white); line-height: 1;
    margin-bottom: 6px;
}
.num-card .big span { color: var(--acid); }
.num-card .lbl { font-size: 13px; color: var(--mist); }

/* ============================================================
   KEYFRAMES
   ============================================================ */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeLeft {
    from { opacity: 0; transform: translateX(28px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* AOS-like scroll reveal */
[data-reveal] {
    opacity: 0; transform: translateY(32px);
    transition: opacity 0.7s var(--ease-out), transform 0.7s var(--ease-out);
}
[data-reveal].revealed { opacity: 1; transform: none; }
[data-reveal-delay="1"] { transition-delay: 0.1s; }
[data-reveal-delay="2"] { transition-delay: 0.2s; }
[data-reveal-delay="3"] { transition-delay: 0.3s; }
[data-reveal-delay="4"] { transition-delay: 0.4s; }
</style>


{{-- ════════════════════════════════════════
     TICKER
════════════════════════════════════════ --}}
<!-- <div class="ticker-bar" aria-hidden="true">
    <div class="ticker-inner">
        @foreach(range(0,1) as $r)
        <span class="ticker-item"><span class="ticker-dot"></span> Genuine OEM & Aftermarket Parts</span>
        <span class="ticker-item"><span class="ticker-dot"></span> 20+ Years Industry Experience</span>
        <span class="ticker-item"><span class="ticker-dot"></span> Worldwide Shipping Available</span>
        <span class="ticker-item"><span class="ticker-dot"></span> 50,000+ Part Numbers in Stock</span>
        <span class="ticker-item"><span class="ticker-dot"></span> Expert Technical Support 7 Days</span>
        <span class="ticker-item"><span class="ticker-dot"></span> Quality Inspected Before Dispatch</span>
        @endforeach
    </div>
</div> -->


{{-- ════════════════════════════════════════
     HERO
════════════════════════════════════════ --}}
@if(count($banners) > 0)
<section class="hero">
    <div class="hero-vline"></div>

    <div class="hero-slides">
        @foreach($banners as $key => $banner)
        <div class="hero-slide {{ $key == 0 ? 'active' : '' }}"
             style="background-image: url('{{ $banner->photo }}')"></div>
        @endforeach
    </div>

    <div class="hero-body">
        <div class="hero-eyebrow">
            <span class="label-tag">Industrial Parts Specialists</span>
        </div>

        <h1 class="hero-heading" id="heroTitle">
            {{ $banners[0]->title ?? 'Petrochemical &amp; Industrial Parts' }}
        </h1>

        @if(isset($banners[0]) && $banners[0]->description)
        <p class="hero-para">{!! html_entity_decode(strip_tags($banners[0]->description)) !!}</p>
        @else
        <p class="hero-para">Sourcing precision-engineered components for the world's most demanding industrial environments. Trusted by process engineers globally.</p>
        @endif

        <div class="hero-actions">
            <a href="{{ url('/shop') }}" class="btn-prime">
                <i class="fas fa-search"></i> Browse Parts
            </a>
            <a href="{{ url('/frontend/contact') }}" class="btn-ghost">
                <i class="fas fa-file-alt"></i> Request Quote
            </a>
        </div>
    </div>

    <!-- Floating stat cards -->
    <div class="hero-stats">
        <div class="stat-card">
            <div class="stat-top">
                <i class="fas fa-boxes stat-icon"></i>
                <span class="stat-label">Parts in Stock</span>
            </div>
            <div class="stat-val">50<sup>K+</sup></div>
        </div>
        <div class="stat-card">
            <div class="stat-top">
                <i class="fas fa-industry stat-icon"></i>
                <span class="stat-label">Manufacturers</span>
            </div>
            <div class="stat-val">200<sup>+</sup></div>
        </div>
        <div class="stat-card">
            <div class="stat-top">
                <i class="fas fa-globe stat-icon"></i>
                <span class="stat-label">Countries Served</span>
            </div>
            <div class="stat-val">45<sup>+</sup></div>
        </div>
    </div>

    <!-- Slide dots -->
    <div class="hero-nav" role="tablist" aria-label="Hero slides">
        @foreach($banners as $key => $banner)
        <button class="hero-nav-dot {{ $key == 0 ? 'active' : '' }}"
                data-slide="{{ $key }}"
                role="tab" aria-selected="{{ $key == 0 ? 'true' : 'false' }}"></button>
        @endforeach
    </div>

    <div class="scroll-cue" aria-hidden="true">
        <div class="scroll-cue-line"></div>
        <!-- scroll -->
    </div>
</section>

<script>
(function(){
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-nav-dot');
    const heroTitle = document.getElementById('heroTitle');
    const banners = @json($banners->map(fn($b) => ['title' => $b->title]));
    let cur = 0;
    if (!slides.length) return;

    function goTo(i) {
        slides[cur].classList.remove('active');
        dots[cur].classList.remove('active');
        dots[cur].setAttribute('aria-selected','false');
        cur = (i + slides.length) % slides.length;
        slides[cur].classList.add('active');
        dots[cur].classList.add('active');
        dots[cur].setAttribute('aria-selected','true');
        if (heroTitle && banners[cur]) heroTitle.textContent = banners[cur].title;
    }

    dots.forEach((d,i) => d.addEventListener('click', () => { goTo(i); clearInterval(timer); timer = setInterval(() => goTo(cur+1), 6000); }));
    let timer = setInterval(() => goTo(cur+1), 6000);
})();
</script>
@endif


{{-- ════════════════════════════════════════
     SEARCH CARD
════════════════════════════════════════ --}}
<div style="background: var(--ink-2); padding-top: 1px;">
    <div class="search-lift">
        <div class="search-box" data-reveal>
            <div class="search-ttl">Find by <span>Part Number</span> or Manufacturer</div>
            <form method="GET" action="{{ route('shop') }}" style="position:relative;">
                <div class="search-row">
                    <div class="search-inp-wrap">
                        <i class="fas fa-search"></i>
                        <input
                            type="text"
                            id="globalSearch"
                            name="search"
                            class="search-inp"
                            placeholder="Part Number, Model, Product Name, or Brand…"
                            autocomplete="off"
                            value="{{ request('search') }}"
                        >
                    </div>
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> Search Parts
                    </button>
                </div>
                <div id="searchDrop"></div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on('keyup','#globalSearch', function(){
    const q = $(this).val();
    if (q.length < 2) { $('#searchDrop').hide().html(''); return; }
    $.ajax({
        url: "{{ route('product.search') }}", type:'GET', data:{q},
        success: data => {
            if (!data.length) {
                $('#searchDrop').html(`<div class="drop-empty">No results found for "<strong>${q}</strong>"</div>`).show();
                return;
            }
            let html = '';
            data.forEach(item => {
                html += `<a href="/shop?search=${encodeURIComponent(item.title)}" class="drop-item">
                    <i class="fas fa-cog"></i>
                    <span style="flex:1;">${item.title}</span>
                    ${item.part_number ? `<span class="drop-pn">${item.part_number}</span>` : ''}
                </a>`;
            });
            $('#searchDrop').html(html).show();
        }
    });
});
$(document).click(e => { if (!$(e.target).closest('#globalSearch,#searchDrop').length) $('#searchDrop').hide(); });
</script>


{{-- ════════════════════════════════════════
     BRANDS
════════════════════════════════════════ --}}
<section class="brands-sec">
    <div class="container">
        <div class="brands-head" data-reveal>
            <span class="label-tag">Our Partners</span>
            <h2 class="sec-title" style="margin-top:10px;">Trusted by <em>Top Brands</em></h2>
        </div>
    </div>
    <div class="brands-runway">
        <div id="brandTrack" class="brands-track">
            @php $brands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get(); @endphp
            @foreach($brands as $brand)
            <div class="brand-pill">{{ $brand->title }}</div>
            @endforeach
        </div>
    </div>
</section>

<script>
(function(){
    const track = document.getElementById('brandTrack');
    if (!track) return;
    const itemW = 190; let idx = 0;
    const total = track.children.length;
    setInterval(() => {
        idx++;
        track.style.transform = `translateX(-${idx * itemW}px)`;
        if (idx >= total - 5) {
            setTimeout(() => {
                track.style.transition = 'none';
                track.style.transform = 'translateX(0)';
                idx = 0;
                setTimeout(() => track.style.transition = 'transform 700ms cubic-bezier(0.25,0.1,0.25,1)', 50);
            }, 700);
        }
    }, 2500);
})();
</script>


{{-- ════════════════════════════════════════
     CATEGORIES
════════════════════════════════════════ --}}
@php
$categories = DB::table('categories')->where('status','active')->whereNull('parent_id')->limit(4)->get();
$subcategories = DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
$catIcons = ['fa-cogs','fa-bolt','fa-tint','fa-thermometer-half','fa-wrench','fa-industry','fa-cube','fa-filter'];
@endphp

<section class="cats-sec">
    <div class="container">
        <div class="sec-hd" data-reveal>
            <div class="sec-hd-left">
                <span class="label-tag">Browse by Type</span>
                <h2 class="sec-title" style="margin-top:10px;">Product <em>Categories</em></h2>
            </div>
            <div class="sec-hd-right">
                <a href="/frontend/showcategory">All Categories <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="cats-grid">
            @foreach($categories as $i => $cat)
            <div class="cat-card" data-reveal data-reveal-delay="{{ $i + 1 }}">
                <span class="cat-num">0{{ $i + 1 }}</span>
                <div class="cat-ico"><i class="fas {{ $catIcons[$i % count($catIcons)] }}"></i></div>
                <a href="{{ route('product-cat', $cat->slug) }}" class="cat-title">{{ $cat->title }}</a>
                <ul class="cat-subs">
                    @if(isset($subcategories[$cat->id]))
                        @foreach($subcategories[$cat->id]->take(5) as $sub)
                        <li>
                            <a href="{{ route('product-sub-cat', ['slug' => $cat->slug, 'sub_slug' => $sub->slug]) }}">
                                {{ $sub->title }}
                            </a>
                        </li>
                        @endforeach
                        @if(count($subcategories[$cat->id]) > 5)
                        <li class="cat-more">+{{ count($subcategories[$cat->id]) - 5 }} more</li>
                        @endif
                    @else
                        <li style="font-size:12.5px;color:var(--slate);padding:3px 0;">No subcategories</li>
                    @endif
                </ul>
                <div class="cat-foot">
                    <a href="{{ route('product-cat', $cat->slug) }}">
                        View All <i class="fas fa-arrow-right" style="font-size:9px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════
     PRODUCTS
════════════════════════════════════════ --}}
@php
$products = DB::table('products')
    ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
    ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
    ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
    ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')
    ->where('products.status','active')
    ->orderBy('products.id','DESC')
    ->select('products.*','parent_cat.title as category_name','child_cat.title as subcategory_name','manufacturers.name as manufacturer_name','pdfs.file as pdf_file')
    ->limit(8)->get();
@endphp

<section class="prods-sec">
    <div class="container">
        <div class="sec-hd" data-reveal>
            <div class="sec-hd-left">
                <span class="label-tag">Our Inventory</span>
                <h2 class="sec-title" style="margin-top:10px;">Latest <em>Products</em></h2>
            </div>
            <div class="sec-hd-right">
                <a href="/frontend/showproduct">All Products <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="prods-grid">
            @foreach($products as $i => $product)
            @php
                $photos = json_decode($product->photo, true);
                $image = $photos[0] ?? null;
                $discountedPrice = $product->discount > 0
                    ? $product->price - ($product->price * $product->discount / 100)
                    : $product->price;
                $isNew = \Carbon\Carbon::parse($product->created_at)->diffInDays(now()) < 30;
            @endphp
            <div class="prod-card" data-reveal data-reveal-delay="{{ ($i % 4) + 1 }}">

                <!-- @if($isNew || $product->discount > 0)
                <div class="prod-badge-strip">
                    @if($isNew)<span class="prod-badge badge-new">New</span>@endif
                    @if($product->discount > 0)<span class="prod-badge badge-sale">-{{ $product->discount }}%</span>@endif
                </div>
                @endif -->

                <!-- <div class="prod-img">
                    <div class="prod-img-pattern"></div>
                    @if($image)
                        <img src="{{ $image }}" alt="{{ $product->title }}" loading="lazy">
                    @else
                        <i class="fas fa-cog prod-img-icon"></i>
                    @endif
                </div> -->

                <div class="prod-body">
                    <div class="prod-bc">
                        @if($product->category_name)<span>{{ $product->category_name }}</span>@endif
                        @if($product->subcategory_name)<i class="fas fa-chevron-right"></i><span>{{ $product->subcategory_name }}</span>@endif
                    </div>

                    <div class="prod-name">{{ $product->title }}</div>

                    @if($product->summary)
                    <div class="prod-desc">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 90) }}</div>
                    @endif

                    <div class="prod-meta">
                        @if($product->manufacturer_name)
                        <div class="prod-meta-row">
                            <i class="fas fa-industry"></i>
                            <span class="meta-k">MFR:</span>{{ $product->manufacturer_name }}
                        </div>
                        @endif
                        @if($product->part_number)
                        <div class="prod-meta-row">
                            <i class="fas fa-barcode"></i>
                            <span class="meta-k">Part#:</span>{{ $product->part_number }}
                        </div>
                        @endif
                        @if($product->model_number)
                        <div class="prod-meta-row">
                            <i class="fas fa-tag"></i>
                            <span class="meta-k">Model:</span>{{ $product->model_number }}
                        </div>
                        @endif
                        @if($product->pdf_file)
                        <div class="prod-meta-row prod-pdf">
                            <i class="fas fa-file-pdf" style="color:var(--amber);"></i>
                            <a href="{{ asset($product->pdf_file) }}" target="_blank" rel="noopener">
                                <i class="fas fa-file-pdf"></i> {{ basename($product->pdf_file) }}
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="prod-price">
                        <span class="price-now">£{{ number_format($discountedPrice, 2) }}</span>
                        @if($product->discount > 0)
                        <span class="price-was">£{{ number_format($product->price, 2) }}</span>
                        <span class="price-save">Save {{ $product->discount }}%</span>
                        @endif
                    </div>

                    <div class="prod-actions">
                        <a href="{{ route('product-detail', $product->slug) }}" class="pa-icon" title="View Details" aria-label="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('add-to-cart', $product->slug) }}" class="pa-btn" aria-label="Request Quote for {{ $product->title }}">
                            <i class="fas fa-file-invoice"></i> Request Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="center-cta" data-reveal>
            <a href="/frontend/showproduct" class="cta-all">
                View All Products <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════
     WHY US
════════════════════════════════════════ --}}
<section class="why-sec">
    <div class="container">
        <div class="why-layout">
            <div class="why-left" data-reveal>
                <span class="label-tag">Why Petchemparts</span>
                <h2 class="sec-title" style="margin-top:10px;">The <em>Trusted</em> Partner for Critical Parts</h2>
                <p class="sec-sub">From upstream exploration to downstream refining, we supply verified industrial components that keep your operations running without interruption.</p>

                <div class="why-list">
                    <div class="why-item">
                        <div class="why-item-ico"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <div class="why-item-h">100% Genuine Parts</div>
                            <div class="why-item-p">All components sourced directly from authorized distributors and OEM manufacturers. No counterfeits, no compromise.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-ico"><i class="fas fa-microscope"></i></div>
                        <div>
                            <div class="why-item-h">Rigorous Quality Control</div>
                            <div class="why-item-p">Every part passes multi-point inspection before dispatch. Full traceability documentation available on request.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-ico"><i class="fas fa-shipping-fast"></i></div>
                        <div>
                            <div class="why-item-h">Fast Global Shipping</div>
                            <div class="why-item-p">Express worldwide delivery with real-time tracking. Emergency same-day dispatch available for critical spares.</div>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-ico"><i class="fas fa-headset"></i></div>
                        <div>
                            <div class="why-item-h">Expert Technical Support</div>
                            <div class="why-item-p">Our specialist engineers are on hand 7 days a week to assist with part identification, specification, and selection.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="why-right" data-reveal data-reveal-delay="2">
                <div class="num-card">
                    <div class="big">20<span>+</span></div>
                    <div class="lbl">Years of Industry Experience</div>
                </div>
                <div class="num-card">
                    <div class="big">50<span>K</span></div>
                    <div class="lbl">Part Numbers in Inventory</div>
                </div>
                <div class="num-card">
                    <div class="big">200<span>+</span></div>
                    <div class="lbl">Global Manufacturers</div>
                </div>
                <div class="num-card">
                    <div class="big">45<span>+</span></div>
                    <div class="lbl">Countries Served Worldwide</div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════
     TRUST STRIP
════════════════════════════════════════ --}}
<section class="trust-sec">
    <div class="container">
        <div style="text-align:center; margin-bottom:52px;" data-reveal>
            <span class="label-tag">Our Commitment</span>
            <h2 class="sec-title" style="margin-top:12px;">Built on <em>Trust</em></h2>
        </div>
        <div class="trust-grid" data-reveal>
            <div class="trust-cell">
                <div class="trust-ico-wrap"><i class="fas fa-certificate"></i></div>
                <div class="trust-h">Certified Authentic</div>
                <div class="trust-p">Every product carries full certification and traceability back to the original manufacturer.</div>
                <div class="trust-accent">100%</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-wrap"><i class="fas fa-award"></i></div>
                <div class="trust-h">Two Decades</div>
                <div class="trust-p">Serving global process industries since 2004 with unbroken commitment to quality and reliability.</div>
                <div class="trust-accent">20 Yrs</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-wrap"><i class="fas fa-check-double"></i></div>
                <div class="trust-h">Verified Quality</div>
                <div class="trust-p">Multi-point inspection on every single part. If it doesn't meet spec, it doesn't leave our warehouse.</div>
                <div class="trust-accent">100%</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-wrap"><i class="fas fa-headset"></i></div>
                <div class="trust-h">7-Day Support</div>
                <div class="trust-p">Technical experts available every day of the week. No waiting, no bots — real engineers on call.</div>
                <div class="trust-accent">7/7</div>
            </div>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════
     SCROLL REVEAL SCRIPT
════════════════════════════════════════ --}}
<script>
(function(){
    const els = document.querySelectorAll('[data-reveal]');
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('revealed'); io.unobserve(e.target); } });
    }, { threshold: 0.12 });
    els.forEach(el => io.observe(el));
})();
</script>

@endsection