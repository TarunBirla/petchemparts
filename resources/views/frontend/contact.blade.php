@extends('frontend.layouts.master')

@section('title','Petchemparts || Contact Us')

@section('main-content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap');

    .cu-scope {
        --font-display: 'Fraunces', Georgia, serif;
        --font-body: 'Inter', -apple-system, sans-serif;
        --font-mono: 'IBM Plex Mono', ui-monospace, monospace;
        background: var(--paper);
        color: var(--ink);
    }

    .cu-scope * { box-sizing: border-box; }

    /* ---------- Hero ---------- */
    .pg-hero {
        background: var(--green-3);
        background-image:
            linear-gradient(180deg, var(--green-3) 0%, var(--green) 130%);
        position: relative;
        padding: 96px 24px 64px;
        overflow: hidden;
    }
    .pg-hero::before {
        content: "";
        position: absolute;
        left: 0; right: 0; bottom: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--brass) 20%, var(--brass-2) 50%, var(--brass) 80%, transparent);
    }
    .pg-hero::after {
        content: "";
        position: absolute;
        top: -120px; right: -120px;
        width: 340px; height: 340px;
        border: 1px solid rgba(224,177,94,0.14);
        border-radius: 50%;
    }
    .pg-hero-inner {
        max-width: 1120px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .pg-breadcrumb {
        font-family: var(--font-mono);
        font-size: 11px;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--brass-2);
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 22px;
    }
    .pg-breadcrumb a {
        color: rgba(246,243,235,0.55);
        text-decoration: none;
        transition: color .2s var(--ease);
    }
    .pg-breadcrumb a:hover { color: var(--paper); }
    .pg-breadcrumb i { font-size: 9px; color: rgba(224,177,94,0.5); }

    .pg-hero-inner h1 {
        font-family: var(--font-display);
        font-weight: 500;
        font-size: clamp(36px, 5vw, 52px);
        color: var(--paper);
        letter-spacing: -0.01em;
        margin: 0 0 14px;
    }
    .pg-hero-inner p {
        font-family: var(--font-body);
        font-size: 16px;
        line-height: 1.6;
        color: rgba(246,243,235,0.62);
        max-width: 480px;
        margin: 0;
    }

    /* ---------- Section shell ---------- */
    .contact-section {
        padding: 72px 24px 100px;
    }
    .contact-inner {
        max-width: 1120px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 32px;
        align-items: start;
    }
    @media (max-width: 860px) {
        .contact-inner { grid-template-columns: 1fr; }
    }

    /* ---------- Form card: styled like a requisition slip ---------- */
    .contact-form-card {
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: var(--radius);
        box-shadow: var(--shadow-md);
        padding: 44px 40px 40px;
        position: relative;
    }
    .contact-form-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--brass) 0%, var(--brass-2) 100%);
    }
    .form-title {
        font-family: var(--font-mono);
        font-size: 11px;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--brass);
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 4px;
    }
    .form-title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: var(--line);
    }
    .form-title-lg {
        font-family: var(--font-display);
        font-size: 26px;
        font-weight: 500;
        color: var(--ink);
        margin: 6px 0 34px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }
    @media (max-width: 520px) {
        .form-row { grid-template-columns: 1fr; }
    }

    .form-group {
        margin-bottom: 24px;
        position: relative;
    }
    .form-group label {
        display: flex;
        align-items: baseline;
        gap: 8px;
        font-family: var(--font-mono);
        font-size: 11px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--ink-soft);
        margin-bottom: 9px;
    }
    .form-group label span {
        color: var(--clay);
        font-family: var(--font-body);
    }
    .form-control-custom {
        width: 100%;
        border: none;
        border-bottom: 1px solid var(--line);
        background: transparent;
        padding: 9px 2px 11px;
        font-family: var(--font-body);
        font-size: 15px;
        color: var(--ink);
        border-radius: 0;
        transition: border-color .2s var(--ease), background .2s var(--ease);
    }
    .form-control-custom::placeholder { color: var(--muted-2); }
    .form-control-custom:focus {
        outline: none;
        border-bottom: 1.5px solid var(--brass);
        background: var(--brass-dim);
    }
    textarea.form-control-custom {
        min-height: 110px;
        resize: vertical;
        line-height: 1.6;
        padding-top: 10px;
    }

    .submit-btn {
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--green);
        color: var(--paper);
        border: none;
        border-radius: var(--radius);
        padding: 15px 30px;
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.02em;
        cursor: pointer;
        transition: background .2s var(--ease), transform .2s var(--ease);
    }
    .submit-btn i { font-size: 13px; color: var(--brass-2); }
    .submit-btn:hover { background: var(--green-2); transform: translateY(-1px); }
    .submit-btn:active { transform: translateY(0); }

    /* ---------- Sidebar: spec-plate cards ---------- */
    .contact-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .info-card {
        background: var(--paper-2);
        border: 1px solid var(--line);
        border-radius: var(--radius);
        padding: 26px 26px 22px;
    }
    .info-card-title {
        font-family: var(--font-mono);
        font-size: 11px;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--green-2);
        padding-bottom: 14px;
        margin-bottom: 18px;
        border-bottom: 1px solid var(--line);
    }

    .info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        margin-bottom: 18px;
    }
    .info-item:last-child { margin-bottom: 0; }
    .info-icon {
        flex: 0 0 auto;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--green-dim);
        color: var(--green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }
    .info-text { display: flex; flex-direction: column; gap: 3px; padding-top: 3px; }
    .info-text strong {
        font-family: var(--font-mono);
        font-size: 10px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--muted);
        font-weight: 500;
    }
    .info-text a, .info-text span {
        font-family: var(--font-body);
        font-size: 14.5px;
        color: var(--ink);
        text-decoration: none;
        line-height: 1.5;
    }
    .info-text a:hover { color: var(--clay); }

    .hours-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed var(--line);
        font-family: var(--font-body);
        font-size: 14px;
    }
    .hours-row:last-child { border-bottom: none; padding-bottom: 0; }
    .hours-row .day { color: var(--ink-soft); }
    .hours-row .time { font-family: var(--font-mono); font-size: 12.5px; color: var(--green-2); font-weight: 500; }

    .social-row { display: flex; gap: 10px; }
    .social-btn {
        width: 36px; height: 36px;
        border-radius: 50%;
        border: 1px solid var(--line);
        background: var(--white);
        color: var(--ink-soft);
        display: flex; align-items: center; justify-content: center;
        font-size: 13px;
        text-decoration: none;
        transition: all .2s var(--ease);
    }
    .social-btn:hover {
        background: var(--brass);
        border-color: var(--brass);
        color: var(--white);
        transform: translateY(-2px);
    }
</style>

<div class="cu-scope">

    <!-- Hero -->
    <div class="pg-hero">
        <div class="pg-hero-inner">
            <div class="pg-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Contact Us</span>
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
                <div class="form-title">Enquiry Form</div>
                <div class="form-title-lg">Send Us a Message</div>
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name <span>*</span></label>
                            <input type="text" class="form-control-custom" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name <span>*</span></label>
                            <input type="text" class="form-control-custom" placeholder="Doe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address <span>*</span></label>
                        <input type="email" class="form-control-custom" placeholder="john.doe@example.com" required>
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
                        <input type="text" class="form-control-custom" placeholder="How can we help?" required>
                    </div>
                    <div class="form-group">
                        <label>Message <span>*</span></label>
                        <textarea class="form-control-custom" placeholder="Tell us more about your inquiry, part numbers needed, quantity etc..." required></textarea>
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

</div>

@endsection