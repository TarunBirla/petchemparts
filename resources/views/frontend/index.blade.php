@extends('frontend.layouts.master')

@section('title', 'Petchemparts — Industrial & Petrochemical Parts Specialists')

@section('main-content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════
   PETCHEMPARTS — HOMEPAGE
   #C25A2A · #FFFFFF · #F6F1E9
═══════════════════════════════════════════ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

:root{
    --T:    #C25A2A;
    --T-dk: #9E4420;
    --T-lt: #D97040;
    --T-xs: rgba(194,90,42,0.07);
    --T-sm: rgba(194,90,42,0.13);
    --T-md: rgba(194,90,42,0.22);
    --T-gl: rgba(194,90,42,0.28);
    --CR:   #F6F1E9;
    --CR-dk:#EDE5D8;
    --CR-dr:#D9CEBC;
    --WH:   #FFFFFF;
    --INK:  #1C0E06;
    --INK2: #2E1A0E;
    --MID:  #7A5840;
    --FOG:  #A8896E;
    --AM:   #D4880A;
    --AM-d: rgba(212,136,10,0.12);
    --FN:   'Plus Jakarta Sans',sans-serif;
    --ease: cubic-bezier(0.16,1,0.3,1);
    --r-sm: 8px;
    --r-md: 14px;
    --r-lg: 20px;
}

.wrap{max-width:1360px;margin:0 auto;padding:0 28px;}
@media(max-width:768px){.wrap{padding:0 18px;}}

/* ─── CHIP LABEL ─── */
.chip{
    display:inline-flex;align-items:center;gap:7px;
    font-family:var(--FN);font-size:10.5px;font-weight:700;
    letter-spacing:0.12em;text-transform:uppercase;
    color:var(--T);background:var(--T-xs);
    border:1px solid var(--T-md);border-radius:4px;
    padding:5px 13px;
}
.chip::before{content:'';width:6px;height:6px;background:var(--T);border-radius:50%;animation:blink 2s infinite;}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}

/* ─── SECTION HEADING ─── */
.sh{font-family:var(--FN);font-size:clamp(1.9rem,3.6vw,2.8rem);font-weight:800;color:var(--WH);line-height:1.08;letter-spacing:-.02em;}
.sh em{font-style:normal;color:var(--T-lt);}
.sh-dark{color:var(--INK);}
.sh-dark em{color:var(--T);}
.sub-h{font-size:15px;color:var(--FOG);line-height:1.7;max-width:500px;margin-top:10px;}

.sec-row{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:48px;gap:16px;flex-wrap:wrap;}
.sec-row-left{display:flex;flex-direction:column;gap:10px;}
.see-all{
    display:inline-flex;align-items:center;gap:7px;
    font-family:var(--FN);font-size:11.5px;font-weight:700;
    letter-spacing:0.08em;text-transform:uppercase;
    color:var(--T-lt);text-decoration:none;
    border-bottom:1.5px solid var(--T-md);padding-bottom:3px;
    transition:gap .2s,border-color .2s;
}
.see-all:hover{gap:11px;border-color:var(--T);}

/* ─── REVEAL ─── */
[data-reveal]{opacity:0;transform:translateY(28px);transition:opacity .7s var(--ease),transform .7s var(--ease);}
[data-reveal].on{opacity:1;transform:none;}
[data-d1]{transition-delay:.08s;}[data-d2]{transition-delay:.16s;}
[data-d3]{transition-delay:.24s;}[data-d4]{transition-delay:.32s;}

/* ══════════════════════════════
   HERO
══════════════════════════════ */
.hero{
    position:relative;min-height:100vh;
    display:flex;flex-direction:column;overflow:hidden;
    background:var(--INK);
}
.hero::before{
    content:'';position:absolute;inset:0;
    background-image:
        linear-gradient(rgba(194,90,42,.04) 1px,transparent 1px),
        linear-gradient(90deg,rgba(194,90,42,.04) 1px,transparent 1px);
    background-size:56px 56px;
    mask-image:radial-gradient(ellipse 70% 70% at 58% 42%,black 0%,transparent 100%);
}
.hero::after{
    content:'';position:absolute;inset:0;pointer-events:none;
    background:
        radial-gradient(ellipse 55% 60% at 72% 38%,rgba(194,90,42,.11) 0%,transparent 65%),
        radial-gradient(ellipse 40% 45% at 12% 80%,rgba(212,136,10,.06) 0%,transparent 55%);
}
.hero-slides{position:absolute;inset:0;}
.hero-slide{
    position:absolute;inset:0;background-size:cover;background-position:center;
    opacity:0;transition:opacity 1.6s var(--ease);
}
.hero-slide.on{opacity:1;}
.hero-slide::after{
    content:'';position:absolute;inset:0;
    background:linear-gradient(108deg,rgba(28,14,6,.94) 0%,rgba(28,14,6,.56) 52%,rgba(28,14,6,.25) 100%);
}
.hero-vline{
    position:absolute;left:76px;top:0;bottom:0;width:1px;
    background:linear-gradient(to bottom,transparent,rgba(194,90,42,.35) 30%,rgba(194,90,42,.15) 70%,transparent);
    z-index:3;
}
@media(max-width:768px){.hero-vline{display:none;}}

.hero-body{
    position:relative;z-index:4;
    display:flex;flex-direction:column;justify-content:center;
    flex:1;padding:130px 80px 90px 116px;max-width:780px;
}
@media(max-width:1024px){.hero-body{padding:100px 40px 80px;max-width:100%;}}
@media(max-width:768px){.hero-body{padding:80px 18px 60px;}}

.hero-eyebrow{margin-bottom:22px;animation:fUp .8s var(--ease) both;}
.hero-h1{
    font-family:var(--FN);font-weight:800;
    font-size:clamp(2.4rem,5.2vw,4rem);
    color:var(--WH);line-height:1.05;letter-spacing:-.03em;
    margin-bottom:20px;
    animation:fUp .8s .1s var(--ease) both;
}
.hero-h1 span{
    display:inline-block;
    background:linear-gradient(90deg,var(--T-lt),#E8956A);
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
}
.hero-p{
    font-size:16px;color:var(--FOG);line-height:1.78;max-width:480px;
    margin-bottom:40px;animation:fUp .8s .2s var(--ease) both;
}
.hero-btns{display:flex;gap:14px;flex-wrap:wrap;animation:fUp .8s .3s var(--ease) both;}

.btn-solid{
    display:inline-flex;align-items:center;gap:9px;
    background:var(--T);color:var(--WH);
    font-family:var(--FN);font-weight:700;font-size:14px;
    padding:13px 28px;border-radius:var(--r-sm);
    text-decoration:none;letter-spacing:.01em;
    transition:all .25s var(--ease);
}
.btn-solid:hover{background:var(--T-dk);transform:translateY(-3px);box-shadow:0 10px 28px var(--T-gl);color:var(--WH);}
.btn-outline{
    display:inline-flex;align-items:center;gap:9px;
    background:transparent;color:var(--WH);
    font-family:var(--FN);font-weight:600;font-size:14px;
    padding:12px 28px;border-radius:var(--r-sm);
    text-decoration:none;letter-spacing:.01em;
    border:1.5px solid rgba(255,255,255,.22);
    transition:all .25s var(--ease);
}
.btn-outline:hover{background:rgba(255,255,255,.07);border-color:rgba(255,255,255,.42);transform:translateY(-3px);color:var(--WH);}

/* Stat cards */
.hero-stats{position:absolute;right:60px;bottom:80px;z-index:5;display:flex;flex-direction:column;gap:12px;}
@media(max-width:1100px){.hero-stats{display:none;}}
.sc{
    background:rgba(28,14,6,.76);
    border:1px solid rgba(194,90,42,.20);
    backdrop-filter:blur(22px);
    border-radius:var(--r-md);
    padding:18px 24px;min-width:218px;
    animation:fLt .8s var(--ease) both;
    transition:transform .3s var(--ease),border-color .3s;
}
.sc:hover{transform:translateX(-5px);border-color:rgba(194,90,42,.45);}
.sc:nth-child(1){animation-delay:.4s;}.sc:nth-child(2){animation-delay:.55s;}.sc:nth-child(3){animation-delay:.70s;}
.sc-top{display:flex;align-items:center;gap:10px;margin-bottom:4px;}
.sc-icon{color:var(--T-lt);font-size:12px;}
.sc-label{font-family:var(--FN);font-size:10px;color:var(--FOG);letter-spacing:.10em;text-transform:uppercase;font-weight:600;}
.sc-val{font-family:var(--FN);font-size:30px;font-weight:800;color:var(--WH);line-height:1;}
.sc-val sup{font-size:14px;color:var(--T-lt);}

/* Slide dots */
.hero-nav{position:absolute;bottom:34px;left:116px;z-index:5;display:flex;gap:8px;align-items:center;}
@media(max-width:768px){.hero-nav{left:18px;}}
.hero-dot{
    width:8px;height:8px;border-radius:4px;
    background:rgba(255,255,255,.25);
    cursor:pointer;border:none;
    transition:all .35s var(--ease);
}
.hero-dot.on{background:var(--T);width:32px;}

/* Scroll cue */
.scroll-cue{
    position:absolute;bottom:34px;left:50%;transform:translateX(-50%);
    z-index:5;display:flex;flex-direction:column;align-items:center;gap:6px;
    font-family:var(--FN);font-size:9px;letter-spacing:.15em;
    text-transform:uppercase;color:var(--FOG);
    animation:fUp 1s 1s var(--ease) both;
}
.scroll-line{
    width:1px;height:38px;
    background:linear-gradient(to bottom,var(--T),transparent);
    animation:sp 2s infinite;
}
@keyframes sp{0%,100%{opacity:1;transform:scaleY(1)}50%{opacity:.4;transform:scaleY(.6)}}

/* ══════════════════════════════
   SEARCH CARD (overlaps hero)
══════════════════════════════ */
.search-lift-wrap{background:linear-gradient(to bottom,var(--INK) 52px,var(--CR) 52px);position:relative;z-index:20;}
.search-lift{
    max-width:1360px;margin:0 auto;padding:0 28px;
    transform:translateY(-58px);margin-bottom:-58px;
}
@media(max-width:768px){.search-lift{padding:0 18px;transform:translateY(-36px);margin-bottom:-36px;}}
.search-box{
    background:var(--WH);
    border:1.5px solid var(--CR-dk);
    border-radius:var(--r-lg);
    padding:32px 38px;
    box-shadow:0 20px 60px rgba(28,14,6,.14),0 0 0 1px rgba(194,90,42,.06);
    position:relative;
}
.search-box::before{
    content:'';position:absolute;top:0;left:40px;right:40px;height:2.5px;
    background:linear-gradient(90deg,transparent,var(--T),transparent);
    border-radius:2px;
}
.s-ttl{font-family:var(--FN);font-size:18px;font-weight:800;color:var(--INK);margin-bottom:16px;}
.s-ttl span{color:var(--T);}
.s-row{display:flex;gap:10px;align-items:stretch;position:relative;}
.s-inp-wrap{flex:1;position:relative;}
.s-inp-wrap i{position:absolute;left:17px;top:50%;transform:translateY(-50%);color:var(--FOG);font-size:14px;pointer-events:none;transition:color .2s;}
.s-inp-wrap:focus-within i{color:var(--T);}
.s-inp{
    width:100%;height:52px;
    background:var(--CR);border:1.5px solid var(--CR-dr);
    border-radius:var(--r-sm);padding:0 18px 0 46px;
    font-family:var(--FN);font-size:14px;color:var(--INK);outline:none;
    transition:border-color .2s,box-shadow .2s;
}
.s-inp::placeholder{color:var(--MID);}
.s-inp:focus{border-color:var(--T);box-shadow:0 0 0 3px var(--T-xs);background:var(--WH);}
.s-btn{
    height:52px;padding:0 30px;
    background:var(--T);color:var(--WH);
    border:none;border-radius:var(--r-sm);
    font-family:var(--FN);font-weight:700;font-size:14px;
    cursor:pointer;display:flex;align-items:center;gap:8px;
    white-space:nowrap;letter-spacing:.02em;
    transition:all .2s var(--ease);
}
.s-btn:hover{background:var(--T-dk);transform:translateY(-2px);box-shadow:0 8px 24px var(--T-gl);}
#srchDrop{
    position:absolute;top:calc(100% + 10px);left:0;right:0;
    background:var(--WH);border:1.5px solid var(--CR-dk);
    border-radius:var(--r-md);z-index:999;display:none;
    overflow:hidden;box-shadow:0 20px 52px rgba(28,14,6,.13);
    max-height:320px;overflow-y:auto;
}
#srchDrop::-webkit-scrollbar{width:4px;}
#srchDrop::-webkit-scrollbar-thumb{background:var(--CR-dr);border-radius:4px;}
.drp-item{
    display:flex;align-items:center;gap:12px;
    padding:12px 18px;text-decoration:none;
    color:var(--INK2);font-size:13.5px;font-family:var(--FN);font-weight:500;
    border-bottom:1px solid var(--CR);transition:background .15s;
}
.drp-item:hover{background:var(--CR);color:var(--T);}
.drp-item i{color:var(--T);font-size:11px;flex-shrink:0;}
.drp-pn{
    font-size:11px;background:var(--CR);color:var(--MID);
    padding:2px 8px;border-radius:4px;border:1px solid var(--CR-dr);
    margin-left:auto;flex-shrink:0;font-family:var(--FN);font-weight:600;
}
.drp-empty{padding:18px;color:var(--FOG);font-size:13.5px;font-family:var(--FN);}
@media(max-width:640px){.s-row{flex-direction:column;}.s-btn{width:100%;justify-content:center;}.search-box{padding:24px 18px;}}

/* ══════════════════════════════
   BRANDS
══════════════════════════════ */
.brands-sec{padding:80px 0 68px;background:var(--INK2);border-bottom:1px solid rgba(194,90,42,.12);}
.brands-hd{display:flex;flex-direction:column;align-items:center;gap:10px;margin-bottom:44px;text-align:center;}
.runway{position:relative;overflow:hidden;}
.runway::before,.runway::after{content:'';position:absolute;top:0;bottom:0;width:120px;z-index:2;pointer-events:none;}
.runway::before{left:0;background:linear-gradient(to right,var(--INK2),transparent);}
.runway::after{right:0;background:linear-gradient(to left,var(--INK2),transparent);}
.brand-track{display:flex;gap:14px;transition:transform .7s cubic-bezier(.25,.1,.25,1);}
.brand-pill{
    flex-shrink:0;min-width:180px;height:66px;
    background:rgba(255,255,255,.04);border:1px solid rgba(194,90,42,.15);
    border-radius:var(--r-sm);
    display:flex;align-items:center;justify-content:center;
    padding:0 22px;
    font-family:var(--FN);font-weight:700;font-size:13px;
    color:var(--FOG);letter-spacing:.04em;
    transition:all .25s var(--ease);cursor:default;
}
.brand-pill:hover{border-color:var(--T);color:var(--T-lt);background:var(--T-xs);transform:translateY(-3px);box-shadow:0 8px 24px rgba(194,90,42,.14);}

/* ══════════════════════════════
   CATEGORIES
══════════════════════════════ */
.cats-sec{padding:96px 0;background:var(--INK);position:relative;}
.cats-sec::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(194,90,42,.3),transparent);}

.cats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;}
@media(max-width:1100px){.cats-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:560px){.cats-grid{grid-template-columns:1fr;}}

.cat-card{
    background:rgba(255,255,255,.03);
    border:1px solid rgba(194,90,42,.13);
    border-radius:var(--r-md);
    padding:28px;
    position:relative;overflow:hidden;
    transition:all .3s var(--ease);
    display:flex;flex-direction:column;
}
.cat-card::after{
    content:'';position:absolute;bottom:0;left:0;right:0;height:2.5px;
    background:linear-gradient(90deg,var(--T),var(--T-lt));
    transform:scaleX(0);transform-origin:left;
    transition:transform .35s var(--ease);
}
.cat-card:hover{border-color:rgba(194,90,42,.35);background:rgba(255,255,255,.05);transform:translateY(-6px);box-shadow:0 24px 56px rgba(28,14,6,.45),0 0 0 1px rgba(194,90,42,.12);}
.cat-card:hover::after{transform:scaleX(1);}
.cat-num{position:absolute;top:20px;right:20px;font-family:var(--FN);font-size:11px;color:rgba(194,90,42,.35);letter-spacing:.08em;font-weight:700;}
.cat-ico{
    width:52px;height:52px;
    background:var(--T-xs);border:1px solid var(--T-md);
    border-radius:var(--r-sm);
    display:flex;align-items:center;justify-content:center;
    font-size:20px;color:var(--T-lt);
    margin-bottom:18px;transition:all .3s;flex-shrink:0;
}
.cat-card:hover .cat-ico{background:var(--T);color:var(--WH);border-color:var(--T);box-shadow:0 0 28px var(--T-gl);}
.cat-title{font-family:var(--FN);font-size:16px;font-weight:800;color:var(--WH);text-decoration:none;display:block;margin-bottom:16px;transition:color .2s;line-height:1.3;}
.cat-title:hover{color:var(--T-lt);}
.cat-subs{list-style:none;display:flex;flex-direction:column;gap:4px;flex:1;}
.cat-subs li a{
    font-size:12.5px;color:var(--FOG);text-decoration:none;
    display:flex;align-items:center;gap:9px;padding:4px 0;
    transition:color .2s,gap .2s;font-family:var(--FN);font-weight:500;
}
.cat-subs li a::before{content:'';width:16px;height:1px;background:rgba(194,90,42,.28);flex-shrink:0;transition:background .2s,width .2s;}
.cat-subs li a:hover{color:var(--T-lt);}
.cat-subs li a:hover::before{background:var(--T);width:22px;}
.cat-more{font-size:11.5px;color:rgba(194,90,42,.42);padding:6px 0 0 25px;font-family:var(--FN);font-weight:600;}
.cat-foot{margin-top:20px;padding-top:16px;border-top:1px solid rgba(194,90,42,.10);}
.cat-foot a{
    font-family:var(--FN);font-size:11px;font-weight:700;
    letter-spacing:.10em;text-transform:uppercase;
    color:var(--T-lt);text-decoration:none;
    display:inline-flex;align-items:center;gap:6px;
    transition:gap .2s;
}
.cat-foot a:hover{gap:10px;}

/* ══════════════════════════════
   PRODUCTS
══════════════════════════════ */
.prods-sec{padding:96px 0;background:var(--INK2);border-top:1px solid rgba(194,90,42,.10);}
.prods-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;}
@media(max-width:1200px){.prods-grid{grid-template-columns:repeat(3,1fr);}}
@media(max-width:860px){.prods-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:540px){.prods-grid{grid-template-columns:1fr;}}

.prod-card{
    background:var(--INK);
    border:1px solid rgba(194,90,42,.13);
    border-radius:var(--r-md);
    display:flex;flex-direction:column;
    overflow:hidden;
    transition:all .3s var(--ease);
    position:relative;
}
.prod-card::before{
    content:'';position:absolute;top:0;left:0;right:0;height:1.5px;
    background:linear-gradient(90deg,transparent,rgba(194,90,42,.55),transparent);
    opacity:0;transition:opacity .3s;
}
.prod-card:hover{border-color:rgba(194,90,42,.32);transform:translateY(-5px);box-shadow:0 24px 56px rgba(28,14,6,.45),0 0 0 1px rgba(194,90,42,.10);}
.prod-card:hover::before{opacity:1;}

/* Badge strip */
.badge-strip{position:absolute;top:14px;left:0;display:flex;flex-direction:column;gap:4px;}
.px-badge{font-family:var(--FN);font-size:9px;font-weight:700;letter-spacing:.10em;text-transform:uppercase;padding:3px 10px 3px 12px;border-radius:0 4px 4px 0;}
.badge-new{background:var(--T);color:var(--WH);}
.badge-sale{background:var(--AM);color:var(--WH);}

.prod-body{padding:22px;flex:1;display:flex;flex-direction:column;}
.prod-bc{display:flex;align-items:center;gap:5px;font-family:var(--FN);font-size:10px;font-weight:600;color:rgba(194,90,42,.55);margin-bottom:10px;flex-wrap:wrap;letter-spacing:.05em;}
.prod-bc i{font-size:8px;}
.prod-name{font-family:var(--FN);font-size:15px;font-weight:800;color:var(--WH);line-height:1.38;margin-bottom:8px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.prod-desc{font-size:12.5px;color:var(--FOG);line-height:1.65;margin-bottom:14px;flex:1;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;font-family:var(--FN);}

/* Meta rows */
.prod-meta{margin-bottom:16px;display:flex;flex-direction:column;gap:5px;}
.meta-row{display:flex;align-items:center;gap:8px;font-family:var(--FN);font-size:11px;color:var(--FOG);font-weight:500;}
.meta-row i{color:var(--T-lt);font-size:10px;width:13px;text-align:center;}
.meta-k{color:rgba(194,90,42,.55);margin-right:2px;font-weight:700;}
.prod-pdf a{display:inline-flex;align-items:center;gap:6px;font-family:var(--FN);font-size:10.5px;font-weight:600;color:var(--AM);text-decoration:none;transition:color .2s;}
.prod-pdf a:hover{color:#FFCA70;}

/* Price */
.prod-price{display:flex;align-items:baseline;gap:9px;margin-bottom:16px;}
.price-now{font-family:var(--FN);font-size:22px;font-weight:800;color:var(--T-lt);}
.price-was{font-family:var(--FN);font-size:13px;color:var(--MID);text-decoration:line-through;}
.price-save{font-family:var(--FN);font-size:10px;background:var(--AM-d);color:var(--AM);padding:2px 8px;border-radius:4px;border:1px solid rgba(212,136,10,.22);font-weight:700;}

/* Actions */
.prod-actions{display:flex;gap:9px;}
.pa-eye{
    width:44px;height:44px;flex-shrink:0;
    background:rgba(255,255,255,.04);border:1px solid rgba(194,90,42,.18);
    border-radius:var(--r-sm);
    display:flex;align-items:center;justify-content:center;
    color:var(--FOG);font-size:14px;text-decoration:none;
    transition:all .2s;
}
.pa-eye:hover{background:var(--T-xs);border-color:var(--T);color:var(--T-lt);}
.pa-quote{
    flex:1;height:44px;
    background:var(--T);color:var(--WH);
    border:none;border-radius:var(--r-sm);
    font-family:var(--FN);font-weight:700;font-size:13px;
    cursor:pointer;text-decoration:none;
    display:flex;align-items:center;justify-content:center;gap:7px;
    letter-spacing:.02em;
    transition:all .2s var(--ease);
}
.pa-quote:hover{background:var(--T-dk);color:var(--WH);box-shadow:0 6px 20px var(--T-gl);transform:translateY(-1px);}

/* Center CTA */
.center-cta{display:flex;justify-content:center;margin-top:52px;}
.cta-more{
    display:inline-flex;align-items:center;gap:10px;
    padding:14px 42px;
    background:transparent;color:var(--T-lt);
    border:1.5px solid rgba(194,90,42,.38);
    border-radius:100px;
    font-family:var(--FN);font-weight:700;font-size:14px;
    text-decoration:none;letter-spacing:.04em;
    transition:all .25s var(--ease);
}
.cta-more:hover{background:var(--T-xs);border-color:var(--T);color:var(--T-lt);transform:translateY(-3px);box-shadow:0 12px 32px var(--T-gl);}

/* ══════════════════════════════
   WHY US
══════════════════════════════ */
.why-sec{padding:96px 0;background:var(--INK);}
.why-layout{display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;}
@media(max-width:900px){.why-layout{grid-template-columns:1fr;gap:48px;}}

.why-list{margin-top:32px;display:flex;flex-direction:column;gap:0;}
.why-item{
    display:flex;align-items:flex-start;gap:16px;
    padding:20px 0;border-bottom:1px solid rgba(194,90,42,.09);
    transition:padding-left .22s var(--ease);cursor:default;
}
.why-item:last-child{border-bottom:none;}
.why-item:hover{padding-left:8px;}
.why-ico{
    width:40px;height:40px;flex-shrink:0;
    background:var(--T-xs);border:1px solid var(--T-md);
    border-radius:var(--r-sm);
    display:flex;align-items:center;justify-content:center;
    color:var(--T-lt);font-size:15px;transition:all .2s;
}
.why-item:hover .why-ico{background:var(--T);color:var(--WH);}
.why-h{font-family:var(--FN);font-size:15px;font-weight:800;color:var(--WH);margin-bottom:4px;}
.why-p{font-size:13px;color:var(--FOG);line-height:1.65;font-family:var(--FN);}

.num-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.num-card{
    background:rgba(255,255,255,.04);border:1px solid rgba(194,90,42,.14);
    border-radius:var(--r-md);padding:32px 24px;
    position:relative;overflow:hidden;transition:all .3s var(--ease);
}
.num-card::before{
    content:'';position:absolute;inset:0;
    background:linear-gradient(135deg,rgba(194,90,42,.07) 0%,transparent 60%);
    opacity:0;transition:opacity .3s;
}
.num-card:hover{border-color:rgba(194,90,42,.32);transform:translateY(-4px);}
.num-card:hover::before{opacity:1;}
.num-big{font-family:var(--FN);font-size:46px;font-weight:800;color:var(--WH);line-height:1;margin-bottom:6px;}
.num-big span{color:var(--T-lt);}
.num-lbl{font-size:13px;color:var(--FOG);font-family:var(--FN);font-weight:500;}

/* ══════════════════════════════
   TRUST STRIP (light section)
══════════════════════════════ */
.trust-sec{
    padding:88px 0;background:var(--CR);
    border-top:1px solid var(--CR-dr);border-bottom:1px solid var(--CR-dr);
    position:relative;overflow:hidden;
}
.trust-sec::before{
    content:'';position:absolute;inset:0;
    background:radial-gradient(ellipse 60% 80% at 50% 50%,rgba(194,90,42,.05) 0%,transparent 70%);
}
.trust-grid{
    display:grid;grid-template-columns:repeat(4,1fr);
    border:1px solid var(--CR-dr);border-radius:var(--r-lg);
    overflow:hidden;position:relative;
}
@media(max-width:768px){.trust-grid{grid-template-columns:repeat(2,1fr);}}
.trust-cell{
    background:var(--WH);
    padding:42px 30px;
    display:flex;flex-direction:column;align-items:flex-start;
    position:relative;transition:background .3s;
    border-right:1px solid var(--CR-dk);
}
.trust-cell:last-child{border-right:none;}
@media(max-width:768px){.trust-cell:nth-child(2){border-right:none;}.trust-cell:nth-child(3){border-right:none;}
.trust-cell:nth-child(3),.trust-cell:nth-child(4){border-top:1px solid var(--CR-dk);}}
.trust-cell:hover{background:var(--CR);}
.trust-ico-box{
    width:54px;height:54px;margin-bottom:20px;
    background:var(--T-xs);border:1px solid var(--T-md);
    border-radius:var(--r-sm);
    display:flex;align-items:center;justify-content:center;
    font-size:22px;color:var(--T);
    transition:all .3s;
}
.trust-cell:hover .trust-ico-box{background:var(--T);color:var(--WH);box-shadow:0 0 28px var(--T-gl);}
.trust-h{font-family:var(--FN);font-size:17px;font-weight:800;color:var(--INK);margin-bottom:8px;}
.trust-p{font-size:13px;color:var(--MID);line-height:1.65;font-family:var(--FN);}
.trust-accent{margin-top:18px;padding-top:16px;border-top:1px solid var(--CR-dk);font-family:var(--FN);font-size:24px;font-weight:800;color:var(--T);}

/* ══════════════════════════════
   KEYFRAMES
══════════════════════════════ */
@keyframes fUp{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:translateY(0)}}
@keyframes fLt{from{opacity:0;transform:translateX(26px)}to{opacity:1;transform:translateX(0)}}
</style>


{{-- ════════ HERO ════════ --}}
@if(count($banners) > 0)
<section class="hero">
    <div class="hero-vline"></div>
    <div class="hero-slides">
        @foreach($banners as $k => $banner)
        <div class="hero-slide {{ $k==0?'on':'' }}" style="background-image:url('{{ $banner->photo }}')"></div>
        @endforeach
    </div>
    <div class="hero-body">
        <div class="hero-eyebrow"><span class="chip">Industrial Parts Specialists</span></div>
        <h1 class="hero-h1" id="heroH1">{{ $banners[0]->title ?? 'Petrochemical & Industrial Parts' }}</h1>
        @if(isset($banners[0]) && $banners[0]->description)
            <p class="hero-p">{!! html_entity_decode(strip_tags($banners[0]->description)) !!}</p>
        @else
            <p class="hero-p">Sourcing precision-engineered components for the world's most demanding industrial environments. Trusted by process engineers globally.</p>
        @endif
        <div class="hero-btns">
            <a href="{{ url('/shop') }}" class="btn-solid"><i class="fas fa-search"></i> Browse Parts</a>
            <a href="{{ url('/frontend/contact') }}" class="btn-outline"><i class="fas fa-file-alt"></i> Request Quote</a>
        </div>
    </div>
    <div class="hero-stats">
        <div class="sc"><div class="sc-top"><i class="fas fa-boxes sc-icon"></i><span class="sc-label">Parts in Stock</span></div><div class="sc-val">50<sup>K+</sup></div></div>
        <div class="sc"><div class="sc-top"><i class="fas fa-industry sc-icon"></i><span class="sc-label">Manufacturers</span></div><div class="sc-val">200<sup>+</sup></div></div>
        <div class="sc"><div class="sc-top"><i class="fas fa-globe sc-icon"></i><span class="sc-label">Countries Served</span></div><div class="sc-val">45<sup>+</sup></div></div>
    </div>
    <div class="hero-nav" role="tablist">
        @foreach($banners as $k => $banner)
        <button class="hero-dot {{ $k==0?'on':'' }}" data-s="{{ $k }}" role="tab" aria-selected="{{ $k==0?'true':'false' }}"></button>
        @endforeach
    </div>
    <div class="scroll-cue" aria-hidden="true"><div class="scroll-line"></div></div>
</section>
<script>
(function(){
    const slides=document.querySelectorAll('.hero-slide'),dots=document.querySelectorAll('.hero-dot'),h1=document.getElementById('heroH1');
    const bd=@json($banners->map(fn($b)=>['title'=>$b->title]));
    let cur=0;if(!slides.length)return;
    function go(i){slides[cur].classList.remove('on');dots[cur].classList.remove('on');dots[cur].setAttribute('aria-selected','false');
        cur=(i+slides.length)%slides.length;slides[cur].classList.add('on');dots[cur].classList.add('on');dots[cur].setAttribute('aria-selected','true');
        if(h1&&bd[cur])h1.textContent=bd[cur].title;}
    dots.forEach((d,i)=>d.addEventListener('click',()=>{go(i);clearInterval(t);t=setInterval(()=>go(cur+1),6000);}));
    let t=setInterval(()=>go(cur+1),6000);
})();
</script>
@endif


{{-- ════════ SEARCH ════════ --}}
<div class="search-lift-wrap">
    <div class="search-lift">
        <div class="search-box" data-reveal>
            <div class="s-ttl">Find by <span>Part Number</span> or Manufacturer</div>
            <form method="GET" action="{{ route('shop') }}" style="position:relative;">
                <div class="s-row">
                    <div class="s-inp-wrap">
                        <i class="fas fa-search"></i>
                        <input type="text" id="globalSearch" name="search" class="s-inp"
                               placeholder="Part Number, Model, Product Name, or Brand…"
                               autocomplete="off" value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="s-btn"><i class="fas fa-search"></i> Search Parts</button>
                </div>
                <div id="srchDrop"></div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).on('keyup','#globalSearch',function(){
    const q=$(this).val();
    if(q.length<2){$('#srchDrop').hide().html('');return;}
    $.ajax({url:"{{ route('product.search') }}",type:'GET',data:{q},success:data=>{
        if(!data.length){$('#srchDrop').html(`<div class="drp-empty">No results for "<strong>${q}</strong>"</div>`).show();return;}
        let h='';data.forEach(i=>{h+=`<a href="/shop?search=${encodeURIComponent(i.title)}" class="drp-item"><i class="fas fa-cog"></i><span style="flex:1;">${i.title}</span>${i.part_number?`<span class="drp-pn">${i.part_number}</span>`:''}</a>`;});
        $('#srchDrop').html(h).show();
    }});
});
$(document).click(e=>{if(!$(e.target).closest('#globalSearch,#srchDrop').length)$('#srchDrop').hide();});
</script>


{{-- ════════ BRANDS ════════ --}}
<section class="brands-sec">
    <div class="wrap">
        <div class="brands-hd" data-reveal>
            <span class="chip">Our Partners</span>
            <h2 class="sh" style="margin-top:10px;">Trusted by <em>Top Brands</em></h2>
        </div>
    </div>
    <div class="runway">
        <div id="brandTrack" class="brand-track">
            @php $brands=DB::table('brands')->where('status','active')->orderBy('title','asc')->get(); @endphp
            @foreach($brands as $brand)
            <div class="brand-pill">{{ $brand->title }}</div>
            @endforeach
        </div>
    </div>
</section>
<script>
(function(){const t=document.getElementById('brandTrack');if(!t)return;const w=194;let i=0,tot=t.children.length;
setInterval(()=>{i++;t.style.transform=`translateX(-${i*w}px)`;if(i>=tot-5){setTimeout(()=>{t.style.transition='none';t.style.transform='translateX(0)';i=0;setTimeout(()=>t.style.transition='transform 700ms cubic-bezier(.25,.1,.25,1)',50);},700);}},2500);})();
</script>


{{-- ════════ CATEGORIES ════════ --}}
@php
$categories=DB::table('categories')->where('status','active')->whereNull('parent_id')->limit(4)->get();
$subcategories=DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
$catIcons=['fa-cogs','fa-bolt','fa-tint','fa-thermometer-half','fa-wrench','fa-industry','fa-cube','fa-filter'];
@endphp

<section class="cats-sec">
    <div class="wrap">
        <div class="sec-row" data-reveal>
            <div class="sec-row-left">
                <span class="chip">Browse by Type</span>
                <h2 class="sh" style="margin-top:10px;">Product <em>Categories</em></h2>
            </div>
            <a href="/frontend/showcategory" class="see-all">All Categories <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="cats-grid">
            @foreach($categories as $i => $cat)
            <div class="cat-card" data-reveal data-d{{ ($i%4)+1 }}>
                <span class="cat-num">0{{ $i+1 }}</span>
                <div class="cat-ico"><i class="fas {{ $catIcons[$i % count($catIcons)] }}"></i></div>
                <a href="{{ route('product-cat', $cat->slug) }}" class="cat-title">{{ $cat->title }}</a>
                <ul class="cat-subs">
                    @if(isset($subcategories[$cat->id]))
                        @foreach($subcategories[$cat->id]->take(5) as $sub)
                        <li><a href="{{ route('product-sub-cat',['slug'=>$cat->slug,'sub_slug'=>$sub->slug]) }}">{{ $sub->title }}</a></li>
                        @endforeach
                        @if(count($subcategories[$cat->id])>5)
                        <li class="cat-more">+{{ count($subcategories[$cat->id])-5 }} more</li>
                        @endif
                    @else
                        <li style="font-size:12.5px;color:rgba(194,90,42,.4);padding:3px 0;font-family:var(--FN);">No subcategories</li>
                    @endif
                </ul>
                <div class="cat-foot">
                    <a href="{{ route('product-cat', $cat->slug) }}">View All <i class="fas fa-arrow-right" style="font-size:9px;"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ════════ PRODUCTS ════════ --}}
@php
$products=DB::table('products')
    ->leftJoin('categories as parent_cat','products.cat_id','=','parent_cat.id')
    ->leftJoin('categories as child_cat','products.child_cat_id','=','child_cat.id')
    ->leftJoin('manufacturers','products.manufacturer_id','=','manufacturers.id')
    ->leftJoin('pdfs','products.pdf_id','=','pdfs.id')
    ->where('products.status','active')
    ->orderBy('products.id','DESC')
    ->select('products.*','parent_cat.title as category_name','child_cat.title as subcategory_name','manufacturers.name as manufacturer_name','pdfs.file as pdf_file')
    ->limit(8)->get();
@endphp

<section class="prods-sec">
    <div class="wrap">
        <div class="sec-row" data-reveal>
            <div class="sec-row-left">
                <span class="chip">Our Inventory</span>
                <h2 class="sh" style="margin-top:10px;">Latest <em>Products</em></h2>
            </div>
            <a href="/frontend/showproduct" class="see-all">All Products <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="prods-grid">
            @foreach($products as $i => $product)
            @php
                $photos=json_decode($product->photo,true);
                $image=$photos[0]??null;
                $discountedPrice=$product->discount>0?$product->price-($product->price*$product->discount/100):$product->price;
                $isNew=\Carbon\Carbon::parse($product->created_at)->diffInDays(now())<30;
            @endphp
            <div class="prod-card" data-reveal data-d{{ ($i%4)+1 }}>
                <!-- @if($isNew || $product->discount > 0)
                <div class="badge-strip">
                    @if($isNew)<span class="px-badge badge-new">New</span>@endif
                    @if($product->discount > 0)<span class="px-badge badge-sale">-{{ $product->discount }}%</span>@endif
                </div>
                @endif -->
                <!-- <div class="prod-img">...</div> -->
                <div class="prod-body">
                    <div class="prod-bc">
                        @if($product->category_name)<span>{{ $product->category_name }}</span>@endif
                        @if($product->subcategory_name)<i class="fas fa-chevron-right"></i><span>{{ $product->subcategory_name }}</span>@endif
                    </div>
                    <div class="prod-name">{{ $product->title }}</div>
                    @if($product->summary)
                    <div class="prod-desc">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary),90) }}</div>
                    @endif
                    <div class="prod-meta">
                        @if($product->manufacturer_name)
                        <div class="meta-row"><i class="fas fa-industry"></i><span class="meta-k">MFR:</span>{{ $product->manufacturer_name }}</div>
                        @endif
                        @if($product->part_number)
                        <div class="meta-row"><i class="fas fa-barcode"></i><span class="meta-k">Part#:</span>{{ $product->part_number }}</div>
                        @endif
                        @if($product->model_number)
                        <div class="meta-row"><i class="fas fa-tag"></i><span class="meta-k">Model:</span>{{ $product->model_number }}</div>
                        @endif
                        @if($product->pdf_file)
                        <div class="meta-row prod-pdf"><i class="fas fa-file-pdf" style="color:var(--AM);"></i>
                            <a href="{{ asset($product->pdf_file) }}" target="_blank" rel="noopener"><i class="fas fa-file-pdf"></i> {{ basename($product->pdf_file) }}</a>
                        </div>
                        @endif
                    </div>
                    <div class="prod-price">
                        <span class="price-now">£{{ number_format($discountedPrice,2) }}</span>
                        @if($product->discount>0)
                        <span class="price-was">£{{ number_format($product->price,2) }}</span>
                        <span class="price-save">Save {{ $product->discount }}%</span>
                        @endif
                    </div>
                    <div class="prod-actions">
                        <a href="{{ route('product-detail',$product->slug) }}" class="pa-eye" title="View Details"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('add-to-cart',$product->slug) }}" class="pa-quote"><i class="fas fa-file-invoice"></i> Request Quote</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="center-cta" data-reveal>
            <a href="/frontend/showproduct" class="cta-more">View All Products <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>


{{-- ════════ WHY US ════════ --}}
<section class="why-sec">
    <div class="wrap">
        <div class="why-layout">
            <div data-reveal>
                <span class="chip">Why Petchemparts</span>
                <h2 class="sh" style="margin-top:10px;">The <em>Trusted</em> Partner for Critical Parts</h2>
                <p class="sub-h">From upstream exploration to downstream refining, we supply verified industrial components that keep your operations running without interruption.</p>
                <div class="why-list">
                    <div class="why-item">
                        <div class="why-ico"><i class="fas fa-shield-alt"></i></div>
                        <div><div class="why-h">100% Genuine Parts</div><div class="why-p">All components sourced directly from authorized distributors and OEM manufacturers. No counterfeits, no compromise.</div></div>
                    </div>
                    <div class="why-item">
                        <div class="why-ico"><i class="fas fa-microscope"></i></div>
                        <div><div class="why-h">Rigorous Quality Control</div><div class="why-p">Every part passes multi-point inspection before dispatch. Full traceability documentation available on request.</div></div>
                    </div>
                    <div class="why-item">
                        <div class="why-ico"><i class="fas fa-shipping-fast"></i></div>
                        <div><div class="why-h">Fast Global Shipping</div><div class="why-p">Express worldwide delivery with real-time tracking. Emergency same-day dispatch available for critical spares.</div></div>
                    </div>
                    <div class="why-item">
                        <div class="why-ico"><i class="fas fa-headset"></i></div>
                        <div><div class="why-h">Expert Technical Support</div><div class="why-p">Our specialist engineers are on hand 7 days a week to assist with part identification, specification, and selection.</div></div>
                    </div>
                </div>
            </div>
            <div class="num-grid" data-reveal>
                <div class="num-card"><div class="num-big">20<span>+</span></div><div class="num-lbl">Years of Industry Experience</div></div>
                <div class="num-card"><div class="num-big">50<span>K</span></div><div class="num-lbl">Part Numbers in Inventory</div></div>
                <div class="num-card"><div class="num-big">200<span>+</span></div><div class="num-lbl">Global Manufacturers</div></div>
                <div class="num-card"><div class="num-big">45<span>+</span></div><div class="num-lbl">Countries Served Worldwide</div></div>
            </div>
        </div>
    </div>
</section>


{{-- ════════ TRUST STRIP ════════ --}}
<section class="trust-sec">
    <div class="wrap">
        <div style="text-align:center;margin-bottom:52px;" data-reveal>
            <span class="chip">Our Commitment</span>
            <h2 class="sh sh-dark" style="margin-top:12px;">Built on <em>Trust</em></h2>
        </div>
        <div class="trust-grid" data-reveal>
            <div class="trust-cell">
                <div class="trust-ico-box"><i class="fas fa-certificate"></i></div>
                <div class="trust-h">Certified Authentic</div>
                <div class="trust-p">Every product carries full certification and traceability back to the original manufacturer.</div>
                <div class="trust-accent">100%</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-box"><i class="fas fa-award"></i></div>
                <div class="trust-h">Two Decades</div>
                <div class="trust-p">Serving global process industries since 2004 with unbroken commitment to quality and reliability.</div>
                <div class="trust-accent">20 Yrs</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-box"><i class="fas fa-check-double"></i></div>
                <div class="trust-h">Verified Quality</div>
                <div class="trust-p">Multi-point inspection on every single part. If it doesn't meet spec, it doesn't leave our warehouse.</div>
                <div class="trust-accent">100%</div>
            </div>
            <div class="trust-cell">
                <div class="trust-ico-box"><i class="fas fa-headset"></i></div>
                <div class="trust-h">7-Day Support</div>
                <div class="trust-p">Technical experts available every day of the week. No waiting, no bots — real engineers on call.</div>
                <div class="trust-accent">7/7</div>
            </div>
        </div>
    </div>
</section>


{{-- ════════ REVEAL SCRIPT ════════ --}}
<script>
(function(){
    const io=new IntersectionObserver(entries=>{
        entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('on');io.unobserve(e.target);}});
    },{threshold:.11});
    document.querySelectorAll('[data-reveal]').forEach(el=>io.observe(el));
})();
</script>

@endsection