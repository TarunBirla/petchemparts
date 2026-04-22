@extends('frontend.layouts.master')

@section('title','Petchemparts || About Us')

@section('main-content')

<style>
    /* ── PAGE HERO ── */
    .pg-hero {
        background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 60%, #0EA5E9 100%);
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }
    .pg-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230EA5E9' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .pg-hero-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }
    .pg-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #94A3B8;
        margin-bottom: 20px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .pg-breadcrumb a { color: #94A3B8; text-decoration: none; }
    .pg-breadcrumb a:hover { color: #0EA5E9; }
    .pg-breadcrumb i { font-size: 10px; }
    .pg-hero h1 {
        font-family: 'Outfit', sans-serif;
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 14px;
        line-height: 1.1;
    }
    .pg-hero p {
        font-size: 17px;
        color: #94A3B8;
        max-width: 560px;
        line-height: 1.65;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── SHARED SECTION STYLES ── */
    .section-eyebrow {
        display: inline-block;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #0EA5E9;
        background: #E0F2FE;
        padding: 5px 14px;
        border-radius: 20px;
        margin-bottom: 12px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .section-heading {
        font-family: 'Outfit', sans-serif;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 16px;
        line-height: 1.15;
    }
    .section-body {
        font-size: 15.5px;
        color: #64748B;
        line-height: 1.75;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── STORY SECTION ── */
    .story-section {
        padding: 80px 0;
        background: #fff;
    }
    .story-grid {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
    }
    @media (max-width: 900px) { .story-grid { grid-template-columns: 1fr; gap: 40px; } }

    .story-img-wrap {
        position: relative;
    }
    .story-img-wrap img {
        width: 100%;
        border-radius: 20px;
        display: block;
        object-fit: cover;
        height: 420px;
    }
    .story-badge {
        position: absolute;
        bottom: -20px;
        left: 30px;
        background: #0EA5E9;
        color: #fff;
        border-radius: 14px;
        padding: 16px 24px;
        box-shadow: 0 12px 32px rgba(14,165,233,0.35);
        font-family: 'Outfit', sans-serif;
    }
    .story-badge .num { font-size: 28px; font-weight: 800; line-height: 1; }
    .story-badge .lbl { font-size: 13px; opacity: 0.9; }

    .story-content { padding-bottom: 20px; }
    .story-content p { margin-bottom: 16px; }
    .story-content p:last-child { margin-bottom: 0; }

    /* ── VALUES SECTION ── */
    .values-section {
        padding: 80px 0;
        background: #F8FAFC;
    }
    .values-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .values-header {
        text-align: center;
        margin-bottom: 52px;
    }
    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    @media (max-width: 768px) { .values-grid { grid-template-columns: 1fr; } }

    .value-card {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 18px;
        padding: 36px 28px;
        text-align: center;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .value-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, #0EA5E9, #38BDF8);
        transform: scaleX(0);
        transition: transform 0.3s;
    }
    .value-card:hover {
        border-color: #0EA5E9;
        box-shadow: 0 16px 48px rgba(14,165,233,0.12);
        transform: translateY(-5px);
    }
    .value-card:hover::after { transform: scaleX(1); }

    .value-icon {
        width: 64px;
        height: 64px;
        background: #E0F2FE;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 26px;
        color: #0EA5E9;
        transition: all 0.3s;
    }
    .value-card:hover .value-icon {
        background: #0EA5E9;
        color: #fff;
    }
    .value-card h4 {
        font-family: 'Outfit', sans-serif;
        font-size: 19px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 10px;
    }
    .value-card p {
        font-size: 14.5px;
        color: #64748B;
        line-height: 1.65;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 0;
    }

    /* ── TEAM SECTION ── */
    .team-section {
        padding: 80px 0;
        background: #fff;
    }
    .team-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .team-header { text-align: center; margin-bottom: 52px; }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 28px;
    }
    @media (max-width: 900px) { .team-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 500px) { .team-grid { grid-template-columns: 1fr; } }

    .team-card {
        text-align: center;
        padding: 32px 20px;
        background: #F8FAFC;
        border: 1.5px solid #E2E8F0;
        border-radius: 18px;
        transition: all 0.3s;
    }
    .team-card:hover {
        background: #fff;
        border-color: #0EA5E9;
        box-shadow: 0 16px 48px rgba(14,165,233,0.10);
        transform: translateY(-4px);
    }
    .team-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #E0F2FE;
        margin: 0 auto 16px;
        display: block;
        transition: border-color 0.3s;
    }
    .team-card:hover .team-avatar { border-color: #0EA5E9; }
    .team-card h4 {
        font-family: 'Outfit', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 5px;
    }
    .team-card .role {
        font-size: 13px;
        color: #0EA5E9;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── STATS SECTION ── */
    .stats-section {
        padding: 72px 0;
        background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 100%);
    }
    .stats-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
        text-align: center;
    }
    @media (max-width: 768px) { .stats-inner { grid-template-columns: repeat(2, 1fr); } }

    .stat-item {}
    .stat-num {
        font-family: 'Outfit', sans-serif;
        font-size: 3rem;
        font-weight: 900;
        color: #0EA5E9;
        line-height: 1;
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 14px;
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 500;
    }
</style>

<!-- Hero -->
<div class="pg-hero">
    <div class="pg-hero-inner">
        <div class="pg-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span style="color:#fff;">About Us</span>
        </div>
        <h1>About Our Story</h1>
        <p>Delivering quality industrial & petrochemical parts with exceptional service since 2010.</p>
    </div>
</div>

<!-- Story -->
<section class="story-section">
    <div class="story-grid">
        <div class="story-img-wrap">
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=700&h=500&fit=crop" alt="Our Story">
            <div class="story-badge">
                <div class="num">20+</div>
                <div class="lbl">Years of Excellence</div>
            </div>
        </div>
        <div class="story-content">
            <span class="section-eyebrow">Who We Are</span>
            <h2 class="section-heading">Specialists in Industrial Parts Supply</h2>
            <p class="section-body">Founded in 2005, Petchemparts began with a simple mission — to provide high-quality genuine parts that engineers and procurement teams can rely on. What started as a small distributor has grown into a trusted global destination for petrochemical and industrial parts.</p>
            <p class="section-body">We believe in the power of quality, authenticity, and customer satisfaction. Every product we offer is carefully sourced from authorized manufacturers, ensuring you receive only the best.</p>
            <p class="section-body">Today, we continue to expand our inventory while staying true to our core values of integrity, excellence, and customer-first service. We serve clients across the UK, Europe, and beyond.</p>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats-section">
    <div class="stats-inner">
        <div class="stat-item">
            <div class="stat-num">20+</div>
            <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">50K+</div>
            <div class="stat-label">Parts in Stock</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">1000+</div>
            <div class="stat-label">Happy Clients</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">7/7</div>
            <div class="stat-label">Customer Support</div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="values-section">
    <div class="values-inner">
        <div class="values-header">
            <span class="section-eyebrow">What Drives Us</span>
            <h2 class="section-heading">Our Core Values</h2>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Quality First</h4>
                <p>We never compromise on quality. Every part is rigorously verified against manufacturer specifications before it reaches you.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-users"></i></div>
                <h4>Customer Focused</h4>
                <p>Your satisfaction is our priority. Our team is available 7 days a week to ensure your procurement experience is seamless.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-bolt"></i></div>
                <h4>Fast & Reliable</h4>
                <p>We understand downtime is costly. We dispatch quickly and keep you informed every step of the way.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="team-section">
    <div class="team-inner">
        <div class="team-header">
            <span class="section-eyebrow">The People</span>
            <h2 class="section-heading">Meet Our Team</h2>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop" class="team-avatar" alt="John Smith">
                <h4>John Smith</h4>
                <div class="role">Founder & CEO</div>
            </div>
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=200&fit=crop" class="team-avatar" alt="Sarah Johnson">
                <h4>Sarah Johnson</h4>
                <div class="role">Head of Operations</div>
            </div>
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=200&h=200&fit=crop" class="team-avatar" alt="Michael Brown">
                <h4>Michael Brown</h4>
                <div class="role">Marketing Director</div>
            </div>
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&h=200&fit=crop" class="team-avatar" alt="Emily Davis">
                <h4>Emily Davis</h4>
                <div class="role">Customer Support Lead</div>
            </div>
        </div>
    </div>
</section>

@endsection