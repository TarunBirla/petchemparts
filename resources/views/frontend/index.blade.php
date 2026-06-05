@extends('frontend.layouts.master')

@section('title', 'Petchemparts — Industrial & Petrochemical Parts Specialists')

@section('main-content')

<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
/* ============================================================
   PETCHEMPARTS — HOME PAGE
   Theme: Light Blue / White — Clean Professional
   Fonts: Sora (display) + Manrope (body)
   ============================================================ */

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --sky:        #0EA5E9;
    --sky-deep:   #0284C7;
    --sky-navy:   #075985;
    --sky-pale:   #E0F2FE;
    --sky-ultra:  #F0F9FF;
    --sky-mid:    #BAE6FD;
    --ink:        #0C1B2E;
    --ink-2:      #1E3A5F;
    --body-txt:   #374151;
    --muted:      #6B7280;
    --border:     #CBD5E1;
    --border-lt:  #E2E8F0;
    --white:      #FFFFFF;
    --bg:         #F8FAFC;
    --amber:      #F59E0B;
    --green:      #10B981;
    --font-d:     'Sora', sans-serif;
    --font-b:     'Manrope', sans-serif;
    --ease:       cubic-bezier(0.16, 1, 0.3, 1);
    --r-sm:       8px;
    --r-md:       14px;
    --r-lg:       20px;
    --shadow-sm:  0 1px 4px rgba(14,165,233,0.08), 0 1px 2px rgba(0,0,0,0.04);
    --shadow-md:  0 4px 20px rgba(14,165,233,0.15), 0 2px 8px rgba(0,0,0,0.06);
    --shadow-lg:  0 12px 48px rgba(14,165,233,0.18), 0 4px 16px rgba(0,0,0,0.08);
    --shadow-xl:  0 24px 80px rgba(14,165,233,0.22), 0 8px 24px rgba(0,0,0,0.1);
}

body { font-family: var(--font-b); color: var(--body-txt); background: var(--bg); }

.pg-wrap { overflow-x: hidden; }

/* ── UTILITY ── */
.container { max-width: 1280px; margin: 0 auto; padding: 0 32px; }
@media (max-width: 768px) { .container { padding: 0 20px; } }

.badge-tag {
    display: inline-flex; align-items: center; gap: 8px;
    font-family: var(--font-b); font-size: 11px; font-weight: 700;
    letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--sky-deep); background: var(--sky-pale);
    border: 1px solid var(--sky-mid); border-radius: 100px;
    padding: 5px 14px;
}
.badge-tag i { font-size: 9px; color: var(--sky); }

.sec-label {
    font-family: var(--font-b); font-size: 11px; font-weight: 700;
    letter-spacing: 0.14em; text-transform: uppercase; color: var(--sky);
    margin-bottom: 10px; display: block;
}

.sec-heading {
    font-family: var(--font-d); font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 800; color: var(--ink); line-height: 1.12; letter-spacing: -0.02em;
}
.sec-heading em { font-style: normal; color: var(--sky); }

.sec-desc {
    font-size: 15px; color: var(--muted); line-height: 1.75; max-width: 500px;
    margin-top: 12px;
}

/* ── REVEAL ── */
[data-rv] {
    opacity: 0; transform: translateY(30px);
    transition: opacity 0.65s var(--ease), transform 0.65s var(--ease);
}
[data-rv].vis { opacity: 1; transform: none; }
[data-rv][data-d="1"] { transition-delay: 0.08s; }
[data-rv][data-d="2"] { transition-delay: 0.16s; }
[data-rv][data-d="3"] { transition-delay: 0.24s; }
[data-rv][data-d="4"] { transition-delay: 0.32s; }

/* ============================================================
   HERO
   ============================================================ */
.hero {
    position: relative;
    background: var(--ink);
    min-height: 92vh;
    display: flex; align-items: stretch;
    overflow: hidden;
}

/* Grid overlay */
.hero-grid {
    position: absolute; inset: 0; z-index: 1;
    background-image:
        linear-gradient(rgba(14,165,233,0.07) 1px, transparent 1px),
        linear-gradient(90deg, rgba(14,165,233,0.07) 1px, transparent 1px);
    background-size: 56px 56px;
}

/* Gradient blobs */
.hero-blob-1 {
    position: absolute; top: -120px; right: -80px;
    width: 600px; height: 600px; z-index: 1;
    background: radial-gradient(circle, rgba(14,165,233,0.18) 0%, transparent 65%);
    border-radius: 50%;
}
.hero-blob-2 {
    position: absolute; bottom: -100px; left: -120px;
    width: 500px; height: 500px; z-index: 1;
    background: radial-gradient(circle, rgba(7,89,133,0.14) 0%, transparent 65%);
    border-radius: 50%;
}

/* Slides */
.hero-slides { position: absolute; inset: 0; z-index: 0; }
.hero-slide {
    position: absolute; inset: 0;
    background-size: cover; background-position: center;
    opacity: 0; transition: opacity 1.6s ease;
}
.hero-slide.active { opacity: 1; }
.hero-slide::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(110deg, rgba(12,27,46,0.93) 0%, rgba(12,27,46,0.65) 50%, rgba(12,27,46,0.35) 100%);
}

.hero-inner {
    position: relative; z-index: 5;
    display: grid; grid-template-columns: 1fr 380px;
    gap: 60px; align-items: center;
    max-width: 1280px; margin: 0 auto; padding: 0 32px;
    width: 100%; min-height: 92vh;
}
@media (max-width: 1100px) { .hero-inner { grid-template-columns: 1fr; } }
@media (max-width: 768px) { .hero-inner { padding: 80px 20px; } }

/* Left content */
.hero-content { padding: 60px 0; }

.hero-chip {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(14,165,233,0.14); border: 1px solid rgba(14,165,233,0.3);
    color: #7DD3FC; border-radius: 100px;
    font-family: var(--font-b); font-size: 11.5px; font-weight: 600;
    letter-spacing: 0.1em; text-transform: uppercase;
    padding: 6px 16px; margin-bottom: 28px;
    animation: fadeUp 0.7s var(--ease) both;
}
.hero-chip-dot { width: 6px; height: 6px; background: #38BDF8; border-radius: 50%; animation: pulse-dot 2s infinite; }
@keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(0.7)} }

.hero-h1 {
    font-family: var(--font-d); font-weight: 800;
    font-size: clamp(2.4rem, 5vw, 3.8rem);
    color: #FFFFFF; line-height: 1.06; letter-spacing: -0.03em;
    margin-bottom: 22px;
    animation: fadeUp 0.7s 0.1s var(--ease) both;
}
.hero-h1 .hl {
    background: linear-gradient(90deg, #38BDF8, #0EA5E9);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}

.hero-p {
    font-size: 16px; color: #94A3B8; line-height: 1.8; max-width: 480px;
    margin-bottom: 40px;
    animation: fadeUp 0.7s 0.2s var(--ease) both;
}

.hero-btns {
    display: flex; gap: 14px; flex-wrap: wrap;
    animation: fadeUp 0.7s 0.3s var(--ease) both;
}
.btn-sky {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--sky); color: white;
    font-family: var(--font-b); font-weight: 700; font-size: 14px;
    padding: 13px 28px; border-radius: var(--r-sm);
    text-decoration: none; letter-spacing: 0.01em;
    transition: all 0.25s var(--ease);
    box-shadow: 0 4px 20px rgba(14,165,233,0.4);
}
.btn-sky:hover {
    background: var(--sky-deep); color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 32px rgba(14,165,233,0.5);
}
.btn-outline-w {
    display: inline-flex; align-items: center; gap: 8px;
    background: transparent; color: white;
    font-family: var(--font-b); font-weight: 600; font-size: 14px;
    padding: 12px 28px; border-radius: var(--r-sm);
    text-decoration: none; letter-spacing: 0.01em;
    border: 1.5px solid rgba(255,255,255,0.22);
    transition: all 0.25s var(--ease);
}
.btn-outline-w:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(255,255,255,0.5); color: white;
    transform: translateY(-3px);
}

/* Hero right: search + stats */
.hero-right { display: flex; flex-direction: column; gap: 16px; }
@media (max-width: 1100px) { .hero-right { display: none; } }

.hero-search-box {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.14);
    backdrop-filter: blur(20px);
    border-radius: var(--r-lg); padding: 24px;
    animation: fadeLeft 0.7s 0.4s var(--ease) both;
}
.hs-label {
    font-family: var(--font-b); font-size: 11px; font-weight: 700;
    letter-spacing: 0.1em; text-transform: uppercase; color: #7DD3FC;
    margin-bottom: 12px; display: block;
}
.hs-input-row { display: flex; gap: 8px; }
.hs-input {
    flex: 1; height: 44px;
    background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15);
    border-radius: var(--r-sm);
    padding: 0 16px; font-family: var(--font-b); font-size: 13.5px;
    color: white; outline: none;
    transition: border-color 0.2s, background 0.2s;
}
.hs-input::placeholder { color: #64748B; }
.hs-input:focus { border-color: var(--sky); background: rgba(255,255,255,0.1); }
.hs-btn {
    height: 44px; padding: 0 18px;
    background: var(--sky); color: white; border: none;
    border-radius: var(--r-sm); font-family: var(--font-b); font-weight: 700;
    font-size: 13px; cursor: pointer;
    transition: background 0.2s, transform 0.2s;
}
.hs-btn:hover { background: var(--sky-deep); transform: translateY(-1px); }

/* Stat pills */
.hero-stats-row {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;
    animation: fadeLeft 0.7s 0.55s var(--ease) both;
}
.hstat {
    background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
    backdrop-filter: blur(16px); border-radius: var(--r-md);
    padding: 16px; text-align: center;
    transition: border-color 0.25s, background 0.25s, transform 0.25s;
}
.hstat:hover { background: rgba(14,165,233,0.12); border-color: rgba(14,165,233,0.35); transform: translateY(-3px); }
.hstat-val { font-family: var(--font-d); font-size: 22px; font-weight: 800; color: #38BDF8; }
.hstat-lbl { font-size: 10.5px; color: #94A3B8; margin-top: 3px; font-weight: 500; }

/* Dots nav */
.hero-dots {
    position: absolute; bottom: 32px; left: 50%;
    transform: translateX(-50%);
    z-index: 6; display: flex; gap: 8px;
}
.hero-dot {
    width: 8px; height: 8px; border-radius: 4px;
    background: rgba(255,255,255,0.28); cursor: pointer; border: none;
    transition: all 0.3s var(--ease);
}
.hero-dot.active { background: var(--sky); width: 28px; }

@keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }
@keyframes fadeLeft { from{opacity:0;transform:translateX(24px)} to{opacity:1;transform:translateX(0)} }

/* ============================================================
   SEARCH SECTION (BELOW HERO)
   ============================================================ */
.search-section {
    background: var(--white);
    border-bottom: 1px solid var(--border-lt);
    padding: 0;
}
.search-card-wrap {
    max-width: 1280px; margin: 0 auto; padding: 0 32px;
    transform: translateY(-36px); margin-bottom: -36px;
}
@media (max-width: 768px) { .search-card-wrap { padding: 0 20px; transform: translateY(-24px); margin-bottom: -24px; } }

.search-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--r-lg);
    box-shadow: var(--shadow-xl);
    padding: 32px 36px;
    position: relative; overflow: hidden;
}
.search-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--sky), #38BDF8, var(--sky-deep));
}
.sc-head {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 20px; flex-wrap: wrap; gap: 10px;
}
.sc-title {
    font-family: var(--font-d); font-size: 18px; font-weight: 700; color: var(--ink);
}
.sc-title span { color: var(--sky); }
.sc-meta { display: flex; gap: 20px; flex-wrap: wrap; }
.sc-meta-item {
    display: flex; align-items: center; gap: 6px;
    font-size: 12px; color: var(--muted); font-weight: 500;
}
.sc-meta-item i { color: var(--sky); font-size: 11px; }

.sc-form { position: relative; }
.sc-row { display: flex; gap: 10px; }
.sc-inp-wrap { flex: 1; position: relative; }
.sc-inp-wrap i.si-icon {
    position: absolute; left: 16px; top: 50%; transform: translateY(-50%);
    color: var(--muted); font-size: 14px; pointer-events: none;
}
.sc-inp {
    width: 100%; height: 52px;
    background: var(--bg); border: 1.5px solid var(--border);
    border-radius: var(--r-sm);
    padding: 0 16px 0 46px;
    font-family: var(--font-b); font-size: 14px; color: var(--ink);
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
}
.sc-inp::placeholder { color: var(--muted); }
.sc-inp:focus {
    border-color: var(--sky);
    box-shadow: 0 0 0 3px rgba(14,165,233,0.12);
    background: var(--white);
}
.sc-submit {
    height: 52px; padding: 0 32px;
    background: var(--sky); color: white; border: none;
    border-radius: var(--r-sm);
    font-family: var(--font-b); font-weight: 700; font-size: 14px;
    cursor: pointer; display: flex; align-items: center; gap: 8px;
    white-space: nowrap; transition: all 0.2s var(--ease);
}
.sc-submit:hover { background: var(--sky-deep); transform: translateY(-2px); box-shadow: var(--shadow-md); }

/* search dropdown */
#scDrop {
    position: absolute; top: calc(100% + 8px); left: 0; right: 0;
    background: var(--white); border: 1px solid var(--border);
    border-radius: var(--r-md); box-shadow: var(--shadow-lg);
    z-index: 999; display: none; overflow: hidden;
    max-height: 300px; overflow-y: auto;
}
.sd-item {
    display: flex; align-items: center; gap: 10px;
    padding: 11px 16px; text-decoration: none;
    color: var(--body-txt); font-size: 13.5px;
    border-bottom: 1px solid var(--border-lt);
    transition: background 0.15s;
}
.sd-item:last-child { border-bottom: none; }
.sd-item:hover { background: var(--sky-ultra); color: var(--sky-deep); }
.sd-item i { color: var(--sky); font-size: 12px; }
.sd-pn {
    margin-left: auto; font-size: 11px;
    background: var(--bg); color: var(--muted);
    padding: 2px 8px; border-radius: 4px; border: 1px solid var(--border);
}
.sd-empty { padding: 16px; color: var(--muted); font-size: 13.5px; }

@media (max-width: 600px) {
    .sc-row { flex-direction: column; }
    .sc-submit { justify-content: center; }
    .search-card { padding: 24px 20px; }
}

/* ============================================================
   BRANDS
   ============================================================ */
.brands-sec {
    background: var(--white);
    border-bottom: 1px solid var(--border-lt);
    padding: 72px 0 64px;
}
.brands-hd { text-align: center; margin-bottom: 40px; }

.brands-scroll { overflow: hidden; position: relative; }
.brands-scroll::before,
.brands-scroll::after {
    content: ''; position: absolute; top: 0; bottom: 0; width: 80px; z-index: 2;
}
.brands-scroll::before { left: 0; background: linear-gradient(to right, white, transparent); }
.brands-scroll::after  { right: 0; background: linear-gradient(to left, white, transparent); }
.brands-track {
    display: flex; gap: 12px;
    transition: transform 0.7s cubic-bezier(0.25,0.1,0.25,1);
}
.brand-chip {
    flex-shrink: 0; height: 58px; min-width: 164px;
    background: var(--bg); border: 1.5px solid var(--border-lt);
    border-radius: var(--r-md);
    display: flex; align-items: center; justify-content: center; padding: 0 20px;
    font-family: var(--font-b); font-weight: 700; font-size: 13px;
    color: var(--muted); letter-spacing: 0.03em;
    transition: all 0.25s var(--ease); cursor: default;
}
.brand-chip:hover {
    border-color: var(--sky); color: var(--sky-deep);
    background: var(--sky-ultra); transform: translateY(-3px);
    box-shadow: var(--shadow-sm);
}

/* ============================================================
   CATEGORIES
   ============================================================ */
.cats-sec {
    background: var(--bg);
    padding: 88px 0;
    border-bottom: 1px solid var(--border-lt);
}
.sec-hd-row {
    display: flex; justify-content: space-between; align-items: flex-end;
    margin-bottom: 44px; gap: 20px; flex-wrap: wrap;
}
.see-all-link {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: var(--font-b); font-size: 13px; font-weight: 700;
    color: var(--sky); text-decoration: none;
    border-bottom: 1.5px solid rgba(14,165,233,0.3);
    padding-bottom: 2px; transition: gap 0.2s, border-color 0.2s;
}
.see-all-link:hover { gap: 12px; border-color: var(--sky); }

/* Category layout: big card left + grid right */
.cats-layout {
    display: grid; grid-template-columns: 1.1fr 1fr;
    gap: 20px;
}
@media (max-width: 900px) { .cats-layout { grid-template-columns: 1fr; } }

/* Featured category card */
.cat-featured {
    background: linear-gradient(145deg, var(--sky-navy) 0%, var(--sky-deep) 60%, var(--sky) 100%);
    border-radius: var(--r-lg); padding: 40px;
    position: relative; overflow: hidden;
    display: flex; flex-direction: column; justify-content: flex-end;
    min-height: 380px;
    text-decoration: none;
    transition: transform 0.3s var(--ease), box-shadow 0.3s;
}
.cat-featured:hover { transform: translateY(-5px); box-shadow: var(--shadow-xl); }
.cat-featured::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px);
    background-size: 32px 32px;
}
.cf-ico {
    position: absolute; top: 32px; right: 32px;
    width: 64px; height: 64px;
    background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--r-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 26px; color: rgba(255,255,255,0.85);
}
.cf-num {
    position: absolute; top: 32px; left: 40px;
    font-family: var(--font-d); font-size: 80px; font-weight: 800; line-height: 1;
    color: rgba(255,255,255,0.06); pointer-events: none;
}
.cf-label {
    font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;
    color: #7DD3FC; margin-bottom: 10px; display: block;
}
.cf-title {
    font-family: var(--font-d); font-size: 26px; font-weight: 800;
    color: white; line-height: 1.2; margin-bottom: 12px;
}
.cf-desc { font-size: 14px; color: rgba(255,255,255,0.7); line-height: 1.6; margin-bottom: 20px; }
.cf-sub-list {
    display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 24px;
}
.cf-sub-chip {
    font-size: 11.5px; background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.85); padding: 4px 10px; border-radius: 100px;
}
.cf-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: white; color: var(--sky-deep);
    font-family: var(--font-b); font-weight: 700; font-size: 13px;
    padding: 10px 20px; border-radius: var(--r-sm);
    width: fit-content; transition: all 0.2s;
}
.cf-btn:hover { background: var(--sky-pale); }

/* Mini category grid */
.cats-mini-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 14px;
}
.cat-mini {
    background: var(--white); border: 1.5px solid var(--border-lt);
    border-radius: var(--r-md); padding: 24px;
    text-decoration: none;
    transition: all 0.25s var(--ease);
    display: flex; flex-direction: column; gap: 12px;
    position: relative; overflow: hidden;
}
.cat-mini::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, var(--sky), #38BDF8);
    transform: scaleX(0); transform-origin: left;
    transition: transform 0.3s var(--ease);
}
.cat-mini:hover {
    border-color: var(--sky-mid);
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}
.cat-mini:hover::after { transform: scaleX(1); }
.cm-icon {
    width: 44px; height: 44px;
    background: var(--sky-ultra); border: 1px solid var(--sky-mid);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; color: var(--sky);
    transition: all 0.25s;
}
.cat-mini:hover .cm-icon { background: var(--sky); color: white; }
.cm-title {
    font-family: var(--font-d); font-size: 14px; font-weight: 700; color: var(--ink);
    transition: color 0.2s;
}
.cat-mini:hover .cm-title { color: var(--sky-deep); }
.cm-count {
    font-size: 11.5px; color: var(--muted); font-weight: 500;
    display: flex; align-items: center; gap: 5px;
}
.cm-count i { color: var(--sky); font-size: 10px; }

/* ============================================================
   PRODUCTS
   ============================================================ */
.prods-sec {
    background: var(--white);
    padding: 88px 0;
    border-bottom: 1px solid var(--border-lt);
}

.prods-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px;
}
@media (max-width: 1200px) { .prods-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 860px)  { .prods-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 540px)  { .prods-grid { grid-template-columns: 1fr; } }

.prod-card {
    background: var(--white);
    border: 1.5px solid var(--border-lt);
    border-radius: var(--r-lg);
    display: flex; flex-direction: column;
    overflow: hidden;
    transition: all 0.28s var(--ease);
    position: relative;
}
.prod-card:hover {
    border-color: var(--sky-mid);
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}

/* Top color bar */
.prod-bar {
    height: 4px;
    background: linear-gradient(90deg, var(--sky), #38BDF8);
    transform: scaleX(0); transform-origin: left;
    transition: transform 0.35s var(--ease);
}
.prod-card:hover .prod-bar { transform: scaleX(1); }

/* Badge */
.prod-badges { position: absolute; top: 14px; left: 14px; display: flex; gap: 5px; z-index: 2; }
.p-badge {
    font-size: 9.5px; font-weight: 700; letter-spacing: 0.08em;
    text-transform: uppercase; padding: 3px 8px; border-radius: 4px;
}
.p-badge-new  { background: var(--sky); color: white; }
.p-badge-sale { background: var(--amber); color: white; }

/* Product image area */
.prod-thumb {
    height: 160px; background: var(--sky-ultra);
    display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden;
}
.prod-thumb img { width: 100%; height: 100%; object-fit: cover; }
.prod-thumb-icon { font-size: 40px; color: var(--sky-mid); transition: transform 0.3s; }
.prod-card:hover .prod-thumb-icon { transform: scale(1.12); color: var(--sky); }

/* Quick action overlay */
.prod-overlay {
    position: absolute; inset: 0;
    background: rgba(14,165,233,0.08);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.2s;
}
.prod-card:hover .prod-overlay { opacity: 1; }
.po-view {
    background: white; color: var(--sky-deep);
    border: none; padding: 9px 20px; border-radius: 100px;
    font-family: var(--font-b); font-weight: 700; font-size: 12.5px;
    cursor: pointer; display: flex; align-items: center; gap: 6px;
    box-shadow: var(--shadow-md); text-decoration: none;
    transition: background 0.2s;
}
.po-view:hover { background: var(--sky-pale); }

/* Body */
.prod-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }

.prod-cats {
    display: flex; align-items: center; gap: 5px;
    font-size: 10.5px; color: var(--muted); margin-bottom: 10px;
    font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase;
}
.prod-cats i { font-size: 8px; color: var(--sky); }

.prod-name {
    font-family: var(--font-d); font-size: 14.5px; font-weight: 700;
    color: var(--ink); line-height: 1.4; margin-bottom: 10px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}

.prod-specs { display: flex; flex-direction: column; gap: 5px; margin-bottom: 14px; flex: 1; }
.spec-row {
    display: flex; align-items: center; gap: 7px;
    font-size: 11.5px; color: var(--muted);
}
.spec-row i { color: var(--sky); font-size: 10px; width: 12px; flex-shrink: 0; }
.spec-key { color: var(--muted); font-weight: 600; margin-right: 2px; }
.spec-val { color: var(--body-txt); }

.prod-pdf-link {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11px; color: var(--amber); font-weight: 600;
    text-decoration: none; margin-bottom: 14px;
}
.prod-pdf-link:hover { color: #D97706; }

/* Price row */
.prod-price-row {
    display: flex; align-items: baseline; gap: 8px; margin-bottom: 14px;
}
.price-main {
    font-family: var(--font-d); font-size: 22px; font-weight: 800; color: var(--sky-deep);
}
.price-old {
    font-size: 13px; color: var(--muted); text-decoration: line-through; font-weight: 500;
}
.price-save-tag {
    font-size: 10px; font-weight: 700;
    background: #FEF3C7; color: #92400E;
    padding: 2px 7px; border-radius: 4px; border: 1px solid #FDE68A;
}

/* Actions */
.prod-acts { display: flex; gap: 8px; }
.pa-view-btn {
    width: 42px; height: 42px; flex-shrink: 0;
    background: var(--sky-ultra); border: 1.5px solid var(--sky-mid);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--sky); font-size: 15px; text-decoration: none;
    transition: all 0.2s;
}
.pa-view-btn:hover { background: var(--sky); color: white; border-color: var(--sky); }
.pa-cart-btn {
    flex: 1; height: 42px;
    background: var(--sky); color: white; border: none;
    border-radius: var(--r-sm);
    font-family: var(--font-b); font-weight: 700; font-size: 13px;
    cursor: pointer; text-decoration: none;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    transition: all 0.2s var(--ease);
}
.pa-cart-btn:hover { background: var(--sky-deep); color: white; box-shadow: var(--shadow-md); transform: translateY(-1px); }

/* All products btn */
.center-cta { display: flex; justify-content: center; margin-top: 48px; }
.all-btn {
    display: inline-flex; align-items: center; gap: 9px;
    padding: 13px 40px;
    background: var(--sky-ultra); color: var(--sky-deep);
    border: 1.5px solid var(--sky-mid); border-radius: 100px;
    font-family: var(--font-b); font-weight: 700; font-size: 14px;
    text-decoration: none; transition: all 0.25s var(--ease);
}
.all-btn:hover {
    background: var(--sky); color: white; border-color: var(--sky);
    box-shadow: var(--shadow-md); transform: translateY(-3px);
}

/* ============================================================
   TRUST STRIP — HORIZONTAL CARDS
   ============================================================ */
.trust-sec {
    background: var(--sky-ultra);
    border-top: 1px solid var(--sky-pale);
    border-bottom: 1px solid var(--sky-pale);
    padding: 72px 0;
}
.trust-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px;
}
@media (max-width: 960px) { .trust-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 520px) { .trust-grid { grid-template-columns: 1fr; } }

.trust-card {
    background: var(--white); border: 1.5px solid var(--sky-pale);
    border-radius: var(--r-lg); padding: 28px 24px;
    display: flex; flex-direction: column; gap: 0;
    transition: all 0.25s var(--ease);
    position: relative; overflow: hidden;
}
.trust-card::after {
    content: '';
    position: absolute; left: 0; top: 0; bottom: 0; width: 3px;
    background: linear-gradient(to bottom, var(--sky), #38BDF8);
    transform: scaleY(0); transform-origin: top;
    transition: transform 0.3s var(--ease);
}
.trust-card:hover { border-color: var(--sky-mid); box-shadow: var(--shadow-md); transform: translateY(-4px); }
.trust-card:hover::after { transform: scaleY(1); }

.tc-icon {
    width: 50px; height: 50px;
    background: var(--sky-ultra); border: 1px solid var(--sky-mid);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: var(--sky);
    margin-bottom: 16px; transition: all 0.25s;
}
.trust-card:hover .tc-icon { background: var(--sky); color: white; }

.tc-title { font-family: var(--font-d); font-size: 16px; font-weight: 700; color: var(--ink); margin-bottom: 8px; }
.tc-desc { font-size: 13px; color: var(--muted); line-height: 1.65; flex: 1; margin-bottom: 16px; }
.tc-stat { font-family: var(--font-d); font-size: 26px; font-weight: 800; color: var(--sky); }

/* ============================================================
   WHY CHOOSE US — SPLIT LAYOUT
   ============================================================ */
.why-sec {
    background: var(--white);
    padding: 96px 0;
}
.why-split {
    display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;
}
@media (max-width: 900px) { .why-split { grid-template-columns: 1fr; gap: 52px; } }

.why-left {}
.why-features { margin-top: 36px; display: flex; flex-direction: column; gap: 0; }

.wf-item {
    display: flex; align-items: flex-start; gap: 16px;
    padding: 20px 0; border-bottom: 1px solid var(--border-lt);
    cursor: default; transition: padding-left 0.25s var(--ease);
}
.wf-item:last-child { border-bottom: none; }
.wf-item:hover { padding-left: 6px; }
.wf-ico {
    width: 42px; height: 42px; flex-shrink: 0;
    background: var(--sky-ultra); border: 1.5px solid var(--sky-mid);
    border-radius: var(--r-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--sky); font-size: 16px; transition: all 0.2s;
}
.wf-item:hover .wf-ico { background: var(--sky); color: white; }
.wf-title { font-family: var(--font-d); font-size: 15px; font-weight: 700; color: var(--ink); margin-bottom: 4px; }
.wf-desc { font-size: 13px; color: var(--muted); line-height: 1.65; }

/* Right: numbers */
.why-right { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.wn-card {
    background: var(--sky-ultra); border: 1.5px solid var(--sky-pale);
    border-radius: var(--r-lg); padding: 32px 24px;
    position: relative; overflow: hidden;
    transition: all 0.25s var(--ease);
}
.wn-card:hover { border-color: var(--sky-mid); box-shadow: var(--shadow-md); transform: translateY(-4px); }
.wn-card:nth-child(even) { background: linear-gradient(145deg, var(--sky-deep), var(--sky-navy)); border-color: transparent; }
.wn-num {
    font-family: var(--font-d); font-size: 44px; font-weight: 800; line-height: 1;
    color: var(--sky-deep); margin-bottom: 6px;
}
.wn-card:nth-child(even) .wn-num { color: #7DD3FC; }
.wn-num sup { font-size: 20px; }
.wn-label { font-size: 13px; font-weight: 500; color: var(--muted); }
.wn-card:nth-child(even) .wn-label { color: rgba(255,255,255,0.65); }

/* ============================================================
   CONTACT BAND
   ============================================================ */
.cta-band {
    background: linear-gradient(135deg, var(--sky-deep) 0%, var(--sky-navy) 50%, var(--ink-2) 100%);
    padding: 72px 0; position: relative; overflow: hidden;
}
.cta-band::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px);
    background-size: 48px 48px;
}
.cta-inner {
    position: relative; z-index: 2;
    display: flex; align-items: center; justify-content: space-between;
    gap: 40px; flex-wrap: wrap;
}
.cta-text {}
.cta-text h2 {
    font-family: var(--font-d); font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 800; color: white; margin-bottom: 10px; letter-spacing: -0.02em;
}
.cta-text p { font-size: 15px; color: rgba(255,255,255,0.7); max-width: 480px; line-height: 1.7; }
.cta-btns { display: flex; gap: 12px; flex-wrap: wrap; }
.cta-btn-w {
    display: inline-flex; align-items: center; gap: 8px;
    background: white; color: var(--sky-deep);
    font-family: var(--font-b); font-weight: 700; font-size: 14px;
    padding: 13px 28px; border-radius: var(--r-sm);
    text-decoration: none; transition: all 0.2s var(--ease);
}
.cta-btn-w:hover { background: var(--sky-pale); color: var(--sky-deep); transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.15); }
.cta-btn-border {
    display: inline-flex; align-items: center; gap: 8px;
    background: transparent; color: white;
    font-family: var(--font-b); font-weight: 600; font-size: 14px;
    padding: 12px 28px; border-radius: var(--r-sm);
    border: 1.5px solid rgba(255,255,255,0.3);
    text-decoration: none; transition: all 0.2s var(--ease);
}
.cta-btn-border:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); color: white; transform: translateY(-3px); }

</style>

<div class="pg-wrap">

{{-- ═══════════════════ HERO ═══════════════════ --}}
@if(count($banners) > 0)
<section class="hero">
    <div class="hero-grid"></div>
    <div class="hero-blob-1"></div>
    <div class="hero-blob-2"></div>

    <div class="hero-slides">
        @foreach($banners as $k => $banner)
        <div class="hero-slide {{ $k == 0 ? 'active' : '' }}"
             style="background-image: url('{{ $banner->photo }}')"></div>
        @endforeach
    </div>

    <div class="hero-inner">
        <div class="hero-content">
            <div class="hero-chip">
                <span class="hero-chip-dot"></span>
                Industrial Parts Specialists · Est. 2004
            </div>
            <h1 class="hero-h1" id="heroH1">
                {{ $banners[0]->title ?? 'Precision Parts for' }}<br>
                <span class="hl">Industrial Excellence</span>
            </h1>
            <p class="hero-p">
                @if(isset($banners[0]) && $banners[0]->description)
                    {!! html_entity_decode(strip_tags($banners[0]->description)) !!}
                @else
                    Sourcing verified components for the world's most demanding petrochemical, refinery, and process plant environments. Trusted by engineers in 45+ countries.
                @endif
            </p>
            <div class="hero-btns">
                <a href="{{ url('/shop') }}" class="btn-sky">
                    <i class="fas fa-search"></i> Browse Parts
                </a>
                <a href="{{ url('/frontend/contact') }}" class="btn-outline-w">
                    <i class="fas fa-file-alt"></i> Request Quote
                </a>
            </div>
        </div>

        <div class="hero-right">
            <div class="hero-search-box">
                <span class="hs-label"><i class="fas fa-search" style="margin-right:6px;"></i> Quick Part Search</span>
                <form method="GET" action="{{ route('shop') }}">
                    <div class="hs-input-row">
                        <input type="text" name="search" class="hs-input" placeholder="Part number, brand, model…" autocomplete="off">
                        <button type="submit" class="hs-btn"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="hero-stats-row">
                <div class="hstat">
                    <div class="hstat-val">50K+</div>
                    <div class="hstat-lbl">Parts Stocked</div>
                </div>
                <div class="hstat">
                    <div class="hstat-val">200+</div>
                    <div class="hstat-lbl">Manufacturers</div>
                </div>
                <div class="hstat">
                    <div class="hstat-val">45+</div>
                    <div class="hstat-lbl">Countries</div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-dots">
        @foreach($banners as $k => $banner)
        <button class="hero-dot {{ $k == 0 ? 'active' : '' }}" data-slide="{{ $k }}"></button>
        @endforeach
    </div>
</section>

<script>
(function(){
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.hero-dot');
    const h1     = document.getElementById('heroH1');
    const data   = @json($banners->map(fn($b) => ['title' => $b->title]));
    let cur = 0;
    if (!slides.length) return;

    function go(i){
        slides[cur].classList.remove('active'); dots[cur].classList.remove('active');
        cur = (i + slides.length) % slides.length;
        slides[cur].classList.add('active'); dots[cur].classList.add('active');
        if (h1 && data[cur]?.title) h1.innerHTML = data[cur].title + '<br><span class="hl">Industrial Excellence</span>';
    }
    dots.forEach((d,i) => d.addEventListener('click', () => { go(i); resetTimer(); }));
    let timer = setInterval(() => go(cur + 1), 6000);
    function resetTimer(){ clearInterval(timer); timer = setInterval(() => go(cur+1), 6000); }
})();
</script>
@endif


{{-- ═══════════════════ SEARCH CARD ═══════════════════ --}}
<div style="background: var(--white); padding-top: 1px;">
    <div class="search-card-wrap">
        <div class="search-card" data-rv>
            <div class="sc-head">
                <div class="sc-title">Search by <span>Part Number</span> or Manufacturer</div>
                <div class="sc-meta">
                    <div class="sc-meta-item"><i class="fas fa-boxes"></i> 50,000+ Parts</div>
                    <div class="sc-meta-item"><i class="fas fa-industry"></i> 200+ Brands</div>
                    <div class="sc-meta-item"><i class="fas fa-shipping-fast"></i> Worldwide Shipping</div>
                </div>
            </div>
            <form method="GET" action="{{ route('shop') }}" class="sc-form">
                <div class="sc-row">
                    <div class="sc-inp-wrap">
                        <i class="fas fa-search si-icon"></i>
                        <input type="text" id="scInput" name="search" class="sc-inp"
                               placeholder="Enter part number, product name, model or brand…"
                               autocomplete="off" value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="sc-submit">
                        <i class="fas fa-search"></i> Search Parts
                    </button>
                </div>
                <div id="scDrop"></div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on('keyup','#scInput', function(){
    const q = $(this).val();
    if (q.length < 2) { $('#scDrop').hide().html(''); return; }
    $.ajax({
        url: "{{ route('product.search') }}", type:'GET', data:{q},
        success: data => {
            if (!data.length) {
                $('#scDrop').html(`<div class="sd-empty">No results for "<strong>${q}</strong>"</div>`).show();
                return;
            }
            let html = '';
            data.forEach(item => {
                html += `<a href="/shop?search=${encodeURIComponent(item.title)}" class="sd-item">
                    <i class="fas fa-cog"></i>
                    <span style="flex:1;">${item.title}</span>
                    ${item.part_number ? `<span class="sd-pn">${item.part_number}</span>` : ''}
                </a>`;
            });
            $('#scDrop').html(html).show();
        }
    });
});
$(document).click(e => { if (!$(e.target).closest('#scInput,#scDrop').length) $('#scDrop').hide(); });
</script>





{{-- ═══════════════════ CATEGORIES ═══════════════════ --}}
@php
$categories   = DB::table('categories')->where('status','active')->whereNull('parent_id')->limit(5)->get();
$subcategories = DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
$catIcons = ['fa-cogs','fa-bolt','fa-tint','fa-thermometer-half','fa-wrench','fa-industry','fa-cube','fa-filter'];
@endphp

<section class="cats-sec">
    <div class="container">
        <div class="sec-hd-row" data-rv>
            <div>
                <span class="sec-label">Browse by Type</span>
                <h2 class="sec-heading">Product <em>Categories</em></h2>
            </div>
            <a href="/frontend/showcategory" class="see-all-link">All Categories <i class="fas fa-arrow-right"></i></a>
        </div>

        @if(count($categories) > 0)
        <div class="cats-layout" data-rv>
            {{-- Featured: first category --}}
            @php $fc = $categories[0]; @endphp
            <a href="{{ route('product-cat', $fc->slug) }}" class="cat-featured">
                <span class="cf-num">01</span>
                <div class="cf-ico"><i class="fas {{ $catIcons[0] }}"></i></div>
                <span class="cf-label">Featured Category</span>
                <div class="cf-title">{{ $fc->title }}</div>
                <div class="cf-desc">Explore our complete range of {{ $fc->title }} components, sourced from leading manufacturers worldwide.</div>
                @if(isset($subcategories[$fc->id]) && $subcategories[$fc->id]->count() > 0)
                <div class="cf-sub-list">
                    @foreach($subcategories[$fc->id]->take(4) as $sub)
                    <span class="cf-sub-chip">{{ $sub->title }}</span>
                    @endforeach
                </div>
                @endif
                <span class="cf-btn">Browse Category <i class="fas fa-arrow-right"></i></span>
            </a>

            {{-- Mini grid: remaining categories --}}
            <div class="cats-mini-grid">
                @foreach($categories->skip(1)->take(4) as $i => $cat)
                <a href="{{ route('product-cat', $cat->slug) }}" class="cat-mini" data-rv data-d="{{ $i + 1 }}">
                    <div class="cm-icon"><i class="fas {{ $catIcons[($i+1) % count($catIcons)] }}"></i></div>
                    <div class="cm-title">{{ $cat->title }}</div>
                    <div class="cm-count">
                        <i class="fas fa-layer-group"></i>
                        {{ isset($subcategories[$cat->id]) ? $subcategories[$cat->id]->count() : 0 }} Subcategories
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>


{{-- ═══════════════════ PRODUCTS ═══════════════════ --}}
@php
$products = DB::table('products')
    ->leftJoin('categories as pc', 'products.cat_id', '=', 'pc.id')
    ->leftJoin('categories as cc', 'products.child_cat_id', '=', 'cc.id')
    ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
    ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')
    ->where('products.status','active')
    ->orderBy('products.id','DESC')
    ->select('products.*','pc.title as category_name','cc.title as subcategory_name',
             'manufacturers.name as manufacturer_name','pdfs.file as pdf_file')
    ->limit(8)->get();
@endphp

<section class="prods-sec">
    <div class="container">
        <div class="sec-hd-row" data-rv>
            <div>
                <span class="sec-label">Our Inventory</span>
                <h2 class="sec-heading">Latest <em>Products</em></h2>
            </div>
            <a href="/frontend/showproduct" class="see-all-link">All Products <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="prods-grid">
            @foreach($products as $i => $product)
            @php
                $photos = json_decode($product->photo, true);
                $image  = $photos[0] ?? null;
                $disc   = $product->discount > 0
                    ? $product->price - ($product->price * $product->discount / 100)
                    : $product->price;
                $isNew  = \Carbon\Carbon::parse($product->created_at)->diffInDays(now()) < 30;
            @endphp
            <div class="prod-card" data-rv data-d="{{ ($i % 4) + 1 }}">
                <div class="prod-bar"></div>

                @if($isNew || $product->discount > 0)
                <div class="prod-badges">
                    @if($isNew)<span class="p-badge p-badge-new">New</span>@endif
                    @if($product->discount > 0)<span class="p-badge p-badge-sale">-{{ $product->discount }}%</span>@endif
                </div>
                @endif

                <div class="prod-thumb">
                    @if($image)
                        <img src="{{ $image }}" alt="{{ $product->title }}" loading="lazy">
                    @else
                        <i class="fas fa-cog prod-thumb-icon"></i>
                    @endif
                    <div class="prod-overlay">
                        <a href="{{ route('product-detail', $product->slug) }}" class="po-view">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </div>
                </div>

                <div class="prod-body">
                    <div class="prod-cats">
                        @if($product->category_name)<span>{{ $product->category_name }}</span>@endif
                        @if($product->subcategory_name)<i class="fas fa-chevron-right"></i><span>{{ $product->subcategory_name }}</span>@endif
                    </div>

                    <div class="prod-name">{{ $product->title }}</div>

                    <div class="prod-specs">
                        @if($product->manufacturer_name)
                        <div class="spec-row">
                            <i class="fas fa-industry"></i>
                            <span class="spec-key">MFR:</span>
                            <span class="spec-val">{{ $product->manufacturer_name }}</span>
                        </div>
                        @endif
                        @if($product->part_number)
                        <div class="spec-row">
                            <i class="fas fa-barcode"></i>
                            <span class="spec-key">Part#:</span>
                            <span class="spec-val">{{ $product->part_number }}</span>
                        </div>
                        @endif
                        @if($product->model_number)
                        <div class="spec-row">
                            <i class="fas fa-tag"></i>
                            <span class="spec-key">Model:</span>
                            <span class="spec-val">{{ $product->model_number }}</span>
                        </div>
                        @endif
                    </div>

                    @if($product->pdf_file)
                    <a href="{{ asset($product->pdf_file) }}" target="_blank" class="prod-pdf-link">
                        <i class="fas fa-file-pdf"></i> {{ basename($product->pdf_file) }}
                    </a>
                    @endif

                    <div class="prod-price-row">
                        <span class="price-main">£{{ number_format($disc, 2) }}</span>
                        @if($product->discount > 0)
                        <span class="price-old">£{{ number_format($product->price, 2) }}</span>
                        <span class="price-save-tag">Save {{ $product->discount }}%</span>
                        @endif
                    </div>

                    <div class="prod-acts">
                        <a href="{{ route('product-detail', $product->slug) }}" class="pa-view-btn" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('add-to-cart', $product->slug) }}" class="pa-cart-btn">
                            <i class="fas fa-file-invoice"></i> Request Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="center-cta" data-rv>
            <a href="/frontend/showproduct" class="all-btn">
                <i class="fas fa-th-large"></i> View All Products <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════ BRANDS ═══════════════════ --}}
<section class="brands-sec">
    <div class="container">
        <div class="brands-hd" data-rv>
            <span class="sec-label">Our Partners</span>
            <h2 class="sec-heading">Trusted by <em>Top Manufacturers</em></h2>
        </div>
    </div>
    <div class="brands-scroll">
        <div id="brandTrack" class="brands-track" style="padding: 0 80px;">
            @php $brands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get(); @endphp
            @foreach($brands as $b)
            <div class="brand-chip">{{ $b->title }}</div>
            @endforeach
        </div>
    </div>
</section>

<script>
(function(){
    const track = document.getElementById('brandTrack');
    if (!track || !track.children.length) return;
    const W = 176; let idx = 0;
    const total = track.children.length;
    setInterval(function(){
        idx++;
        track.style.transition = 'transform 700ms cubic-bezier(0.25,0.1,0.25,1)';
        track.style.transform = `translateX(-${idx * W}px)`;
        if (idx >= total - 4){
            setTimeout(function(){
                track.style.transition = 'none';
                track.style.transform = 'translateX(0)';
                idx = 0;
            }, 720);
        }
    }, 2600);
})();
</script>
{{-- ═══════════════════ TRUST ═══════════════════ --}}
<section class="trust-sec">
    <div class="container">
        <div style="text-align:center; margin-bottom:48px;" data-rv>
            <span class="sec-label">Our Commitment</span>
            <h2 class="sec-heading">Why Engineers <em>Trust</em> Us</h2>
        </div>
        <div class="trust-grid">
            <div class="trust-card" data-rv data-d="1">
                <div class="tc-icon"><i class="fas fa-certificate"></i></div>
                <div class="tc-title">100% Genuine Parts</div>
                <div class="tc-desc">Every component sourced directly from authorized distributors. Full OEM traceability on every order.</div>
                <div class="tc-stat">100%</div>
            </div>
            <div class="trust-card" data-rv data-d="2">
                <div class="tc-icon"><i class="fas fa-award"></i></div>
                <div class="tc-title">20+ Years Experience</div>
                <div class="tc-desc">Trusted by process engineers and procurement teams globally since 2004. Consistent, reliable, professional.</div>
                <div class="tc-stat">Since 2004</div>
            </div>
            <div class="trust-card" data-rv data-d="3">
                <div class="tc-icon"><i class="fas fa-microscope"></i></div>
                <div class="tc-title">Quality Inspected</div>
                <div class="tc-desc">Multi-point inspection before every dispatch. If it doesn't meet specification, it stays in our warehouse.</div>
                <div class="tc-stat">Zero Defects</div>
            </div>
            <div class="trust-card" data-rv data-d="4">
                <div class="tc-icon"><i class="fas fa-headset"></i></div>
                <div class="tc-title">7-Day Expert Support</div>
                <div class="tc-desc">Real engineers available 7 days a week. Part identification, spec matching, and technical guidance on demand.</div>
                <div class="tc-stat">7 Days/Week</div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════ WHY US ═══════════════════ --}}
<section class="why-sec">
    <div class="container">
        <div class="why-split">
            <div class="why-left" data-rv>
                <span class="sec-label">Why Petchemparts</span>
                <h2 class="sec-heading">The <em>Trusted Choice</em> for Critical Industrial Parts</h2>
                <p class="sec-desc">From upstream exploration to downstream refining, we supply verified components that keep your operations running without interruption.</p>

                <div class="why-features">
                    <div class="wf-item">
                        <div class="wf-ico"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <div class="wf-title">Genuine OEM & Aftermarket</div>
                            <div class="wf-desc">No grey market, no counterfeits. Every part comes with full certification and provenance documentation.</div>
                        </div>
                    </div>
                    <div class="wf-item">
                        <div class="wf-ico"><i class="fas fa-shipping-fast"></i></div>
                        <div>
                            <div class="wf-title">Express Global Delivery</div>
                            <div class="wf-desc">Emergency same-day dispatch for critical spares. Real-time tracking across all major shipping networks.</div>
                        </div>
                    </div>
                    <div class="wf-item">
                        <div class="wf-ico"><i class="fas fa-file-contract"></i></div>
                        <div>
                            <div class="wf-title">Competitive Quote System</div>
                            <div class="wf-desc">Request a quote online in minutes. Our team responds with pricing and availability within hours.</div>
                        </div>
                    </div>
                    <div class="wf-item">
                        <div class="wf-ico"><i class="fas fa-globe"></i></div>
                        <div>
                            <div class="wf-title">Serving 45+ Countries</div>
                            <div class="wf-desc">A trusted international partner with established logistics routes across Europe, Middle East, Asia, and beyond.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="why-right" data-rv data-d="2">
                <div class="wn-card">
                    <div class="wn-num">20<sup>+</sup></div>
                    <div class="wn-label">Years of Industry Experience</div>
                </div>
                <div class="wn-card">
                    <div class="wn-num">50<sup>K</sup></div>
                    <div class="wn-label">Part Numbers in Inventory</div>
                </div>
                <div class="wn-card">
                    <div class="wn-num">200<sup>+</sup></div>
                    <div class="wn-label">Global Manufacturers</div>
                </div>
                <div class="wn-card">
                    <div class="wn-num">45<sup>+</sup></div>
                    <div class="wn-label">Countries Served Worldwide</div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════ CTA BAND ═══════════════════ --}}
<section class="cta-band">
    <div class="container">
        <div class="cta-inner">
            <div class="cta-text" data-rv>
                <h2>Ready to Source Your Parts?</h2>
                <p>Our team of specialists is available 7 days a week to help you find exactly what you need, at the right price, shipped anywhere in the world.</p>
            </div>
            <div class="cta-btns" data-rv data-d="2">
                <a href="{{ url('/frontend/contact') }}" class="cta-btn-w">
                    <i class="fas fa-file-invoice"></i> Request a Quote
                </a>
                <a href="tel:+441234440530" class="cta-btn-border">
                    <i class="fas fa-phone-alt"></i> +44 123 444 0530
                </a>
            </div>
        </div>
    </div>
</section>


</div>{{-- .pg-wrap --}}

{{-- Scroll reveal --}}
<script>
(function(){
    const els = document.querySelectorAll('[data-rv]');
    const io  = new IntersectionObserver(function(entries){
        entries.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('vis'); io.unobserve(e.target); } });
    }, { threshold: 0.1 });
    els.forEach(function(el){ io.observe(el); });
})();
</script>

@endsection