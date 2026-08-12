@extends('frontend.layouts.master')

@section('title','Petchemparts || Contact Us')

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

    /* ── CONTACT LAYOUT ── */
    .contact-section {
        padding: 72px 0 80px;
        background: #F8FAFC;
    }
    .contact-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 36px;
        align-items: start;
    }
    @media (max-width: 1024px) {
        .contact-inner { grid-template-columns: 1fr; }
    }

    /* ── FORM CARD ── */
    .contact-form-card {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 20px;
        padding: 40px 44px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.05);
    }
    @media (max-width: 640px) { .contact-form-card { padding: 28px 20px; } }

    .form-title {
        font-family: 'Outfit', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 28px;
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }
    @media (max-width: 640px) { .form-row { grid-template-columns: 1fr; } }

    .form-group { margin-bottom: 16px; }
    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 6px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: 0.02em;
    }
    .form-group label span { color: #EF4444; margin-left: 2px; }

    .form-control-custom {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #E2E8F0;
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0F172A;
        background: #F8FAFC;
        transition: all 0.2s;
        outline: none;
    }
    .form-control-custom:focus {
        border-color: #0EA5E9;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(14,165,233,0.08);
    }
    .form-control-custom::placeholder { color: #94A3B8; }
    textarea.form-control-custom { resize: vertical; min-height: 130px; }

    .submit-btn {
        width: 100%;
        padding: 14px 24px;
        background: #0EA5E9;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s;
        margin-top: 8px;
    }
    .submit-btn:hover {
        background: #0284C7;
        transform: translateY(-1px);
        box-shadow: 0 8px 24px rgba(14,165,233,0.30);
    }

    /* ── SIDEBAR CARDS ── */
    .contact-sidebar { display: flex; flex-direction: column; gap: 20px; }

    .info-card {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }
    .info-card-title {
        font-family: 'Outfit', sans-serif;
        font-size: 17px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1.5px solid #F1F5F9;
    }

    .info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        margin-bottom: 18px;
    }
    .info-item:last-child { margin-bottom: 0; }
    .info-icon {
        width: 40px;
        height: 40px;
        background: #E0F2FE;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 16px;
        color: #0EA5E9;
    }
    .info-text {}
    .info-text strong {
        display: block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 3px;
    }
    .info-text span {
        font-size: 14px;
        color: #334155;
        line-height: 1.6;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .info-text a {
        font-size: 14px;
        color: #334155;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .info-text a:hover { color: #0EA5E9; }

    /* Hours table */
    .hours-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #F1F5F9;
        font-size: 13.5px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .hours-row:last-child { border-bottom: none; }
    .hours-row .day { color: #475569; font-weight: 500; }
    .hours-row .time { color: #0F172A; font-weight: 600; }
    .hours-row .closed { color: #EF4444; font-weight: 600; }

    /* Social icons */
    .social-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 4px;
    }
    .social-btn {
        width: 40px;
        height: 40px;
        background: #E0F2FE;
        color: #0EA5E9;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        text-decoration: none;
        transition: all 0.2s;
    }
    .social-btn:hover {
        background: #0EA5E9;
        color: #fff;
        transform: translateY(-2px);
    }
</style>

<!-- Hero -->
<div class="pg-hero">
    <div class="pg-hero-inner">
        <div class="pg-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span style="color:#fff;">Contact Us</span>
        </div>
        <h1>Get In Touch</h1>
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section">
    <div class="contact-inner">

        <!-- Form -->
        <div class="contact-form-card">
            <div class="form-title">Send Us a Message</div>
            <form>
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name <span>*</span></label>
                        <input type="text" class="form-control-custom" placeholder="John">
                    </div>
                    <div class="form-group">
                        <label>Last Name <span>*</span></label>
                        <input type="text" class="form-control-custom" placeholder="Doe">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email Address <span>*</span></label>
                    <input type="email" class="form-control-custom" placeholder="john.doe@example.com">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control-custom" placeholder="+44 123 456 7890">
                </div>
                <div class="form-group">
                    <label>Company / Organisation</label>
                    <input type="text" class="form-control-custom" placeholder="Your Company Ltd.">
                </div>
                <div class="form-group">
                    <label>Subject <span>*</span></label>
                    <input type="text" class="form-control-custom" placeholder="How can we help?">
                </div>
                <div class="form-group">
                    <label>Message <span>*</span></label>
                    <textarea class="form-control-custom" placeholder="Tell us more about your inquiry, part numbers needed, quantity etc..."></textarea>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    Send Message
                </button>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="contact-sidebar">

            <!-- Contact Info -->
            <div class="info-card">
                <div class="info-card-title">Contact Information</div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-text">
                        <strong>Phone</strong>
                        <a href="tel:+441234440530">+44 123 444 0530</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-text">
                        <strong>Email</strong>
                        <a href="mailto:sales@petchemparts.com">sales@petchemparts.com</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-text">
                        <strong>Address</strong>
                        <span>Suite 211 Sterling House,<br>Langston Road, Loughton<br>IG10 3TS, United Kingdom</span>
                    </div>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="info-card">
                <div class="info-card-title">Business Hours</div>
                <div class="hours-row">
                    <span class="day">Monday – Friday</span>
                    <span class="time">9:00 – 19:00</span>
                </div>
                <div class="hours-row">
                    <span class="day">Saturday</span>
                    <span class="time">9:00 – 17:00</span>
                </div>
                <div class="hours-row">
                    <span class="day">Sunday</span>
                    <span class="time">10:00 – 16:00</span>
                </div>
            </div>

            <!-- Social -->
            <div class="info-card">
                <div class="info-card-title">Follow Us</div>
                <div class="social-row">
                    <a href="#" class="social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection