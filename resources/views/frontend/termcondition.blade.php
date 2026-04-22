@extends('frontend.layouts.master')

@section('title','Petchemparts || Terms & Conditions')

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
    }
    .pg-hero p {
        font-size: 15px;
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── TERMS LAYOUT ── */
    .terms-section {
        padding: 72px 0 80px;
        background: #F8FAFC;
    }
    .terms-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 36px;
        align-items: start;
    }
    @media (max-width: 900px) { .terms-inner { grid-template-columns: 1fr; } }

    /* Sticky TOC sidebar */
    .terms-toc {
        position: sticky;
        top: 90px;
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }
    @media (max-width: 900px) { .terms-toc { display: none; } }

    .toc-title {
        font-family: 'Outfit', sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: #0F172A;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 14px;
        padding-bottom: 10px;
        border-bottom: 1.5px solid #F1F5F9;
    }
    .toc-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 3px;
    }
    .toc-list a {
        display: block;
        padding: 7px 10px;
        font-size: 13px;
        color: #64748B;
        text-decoration: none;
        border-radius: 7px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
        font-weight: 500;
    }
    .toc-list a:hover {
        background: #E0F2FE;
        color: #0EA5E9;
        padding-left: 14px;
    }

    /* Main content */
    .terms-content {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 20px;
        padding: 44px 48px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }
    @media (max-width: 640px) { .terms-content { padding: 28px 20px; } }

    .terms-intro {
        font-size: 15.5px;
        color: #64748B;
        line-height: 1.75;
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding-bottom: 28px;
        border-bottom: 1.5px solid #F1F5F9;
        margin-bottom: 36px;
    }

    .terms-block {
        margin-bottom: 36px;
        padding-bottom: 36px;
        border-bottom: 1.5px solid #F1F5F9;
        scroll-margin-top: 100px;
    }
    .terms-block:last-of-type { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

    .terms-block h3 {
        font-family: 'Outfit', sans-serif;
        font-size: 19px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .terms-block h3 .sec-num {
        width: 30px;
        height: 30px;
        background: #E0F2FE;
        color: #0EA5E9;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .terms-block p {
        font-size: 14.5px;
        color: #64748B;
        line-height: 1.75;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 10px;
    }
    .terms-block p:last-child { margin-bottom: 0; }

    /* Contact box */
    .terms-contact-box {
        background: #F8FAFC;
        border: 1.5px solid #E2E8F0;
        border-radius: 12px;
        padding: 20px 24px;
        font-size: 14px;
        color: #334155;
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.8;
    }
    .terms-contact-box strong { color: #0F172A; }

    /* Agreement box */
    .terms-agreement {
        background: #E0F2FE;
        border-left: 4px solid #0EA5E9;
        border-radius: 0 12px 12px 0;
        padding: 18px 20px;
        font-size: 14.5px;
        color: #0F172A;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-top: 36px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .terms-agreement i { color: #0EA5E9; font-size: 20px; flex-shrink: 0; }
</style>

<!-- Hero -->
<div class="pg-hero">
    <div class="pg-hero-inner">
        <div class="pg-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span style="color:#fff;">Terms & Conditions</span>
        </div>
        <h1>Terms & Conditions</h1>
        <p>Last Updated: December 2024</p>
    </div>
</div>

<!-- Terms Section -->
<section class="terms-section">
    <div class="terms-inner">

        <!-- TOC Sidebar -->
        <div class="terms-toc">
            <div class="toc-title">Contents</div>
            <ul class="toc-list">
                <li><a href="#sec1">1. General Terms</a></li>
                <li><a href="#sec2">2. Products & Services</a></li>
                <li><a href="#sec3">3. Pricing & Payment</a></li>
                <li><a href="#sec4">4. Shipping & Delivery</a></li>
                <li><a href="#sec5">5. Returns & Refunds</a></li>
                <li><a href="#sec6">6. Privacy Policy</a></li>
                <li><a href="#sec7">7. Intellectual Property</a></li>
                <li><a href="#sec8">8. User Conduct</a></li>
                <li><a href="#sec9">9. Limitation of Liability</a></li>
                <li><a href="#sec10">10. Governing Law</a></li>
                <li><a href="#sec-contact">Contact</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="terms-content">

            <p class="terms-intro">
                Welcome to Petchemparts. These Terms and Conditions outline the rules and regulations for the use of our website and services. By accessing this website and making a purchase, you accept these terms in full. Please read them carefully before proceeding.
            </p>

            <div class="terms-block" id="sec1">
                <h3><span class="sec-num">1</span> General Terms</h3>
                <p>By accessing and placing an order with Petchemparts, you confirm that you are of legal age and agree to be bound by these terms and conditions.</p>
                <p>Under no circumstances shall Petchemparts be liable for any indirect or consequential damages arising from the use of this website or the products purchased through it.</p>
            </div>

            <div class="terms-block" id="sec2">
                <h3><span class="sec-num">2</span> Products & Services</h3>
                <p>All products listed are subject to availability and may be modified or discontinued at any time without prior notice.</p>
                <p>We strive to display accurate product information but cannot guarantee exact representation. Images and descriptions are for illustrative purposes only.</p>
            </div>

            <div class="terms-block" id="sec3">
                <h3><span class="sec-num">3</span> Pricing & Payment</h3>
                <p>All prices displayed are in GBP (£) and are subject to change without notice. VAT is included where applicable.</p>
                <p>Payments must be completed at checkout using our approved payment methods. We reserve the right to cancel orders if payment cannot be verified.</p>
            </div>

            <div class="terms-block" id="sec4">
                <h3><span class="sec-num">4</span> Shipping & Delivery</h3>
                <p>Orders are typically dispatched within 1–3 business days of confirmed payment. Estimated delivery times are provided as a guide only.</p>
                <p>Delivery delays caused by third-party courier services, customs clearance, or force majeure events are beyond our reasonable control.</p>
            </div>

            <div class="terms-block" id="sec5">
                <h3><span class="sec-num">5</span> Returns & Refunds</h3>
                <p>Returns are accepted within 30 days of delivery, provided items are unused, in original packaging, and accompanied by proof of purchase.</p>
                <p>Refunds are processed within 7–10 business days after the returned item has been received and inspected by our team.</p>
            </div>

            <div class="terms-block" id="sec6">
                <h3><span class="sec-num">6</span> Privacy Policy</h3>
                <p>Your personal information is handled securely and in accordance with our Privacy Policy. We do not sell, trade, or otherwise transfer your data to third parties without your consent, except as required by law.</p>
            </div>

            <div class="terms-block" id="sec7">
                <h3><span class="sec-num">7</span> Intellectual Property</h3>
                <p>All content on this website — including text, images, logos, and code — is the property of Petchemparts and is protected by applicable intellectual property laws. Unauthorised reproduction is prohibited.</p>
            </div>

            <div class="terms-block" id="sec8">
                <h3><span class="sec-num">8</span> User Conduct</h3>
                <p>Users must not misuse the website by introducing viruses, attempting unauthorised access, or engaging in harmful, fraudulent, or abusive activities. We reserve the right to terminate access for violations.</p>
            </div>

            <div class="terms-block" id="sec9">
                <h3><span class="sec-num">9</span> Limitation of Liability</h3>
                <p>Our total liability to you for any claims arising out of or in connection with these terms shall not exceed the amount paid by you for the relevant product or service.</p>
            </div>

            <div class="terms-block" id="sec10">
                <h3><span class="sec-num">10</span> Governing Law</h3>
                <p>These terms and conditions are governed by and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
            </div>

            <div class="terms-block" id="sec-contact">
                <h3><span class="sec-num" style="background:#F0FDF4; color:#16A34A;">✉</span> Contact Information</h3>
                <div class="terms-contact-box">
                    <div><strong>Email:</strong> sales@petchemparts.com</div>
                    <div><strong>Phone:</strong> +44 123 444 0530</div>
                    <div><strong>Address:</strong> Suite 211 Sterling House, Langston Road, Loughton, IG10 3TS, United Kingdom</div>
                </div>
            </div>

            <div class="terms-agreement">
                <i class="fas fa-check-circle"></i>
                <span>By using our website and placing orders, you confirm that you have read, understood, and agree to be bound by these Terms & Conditions.</span>
            </div>

        </div>
    </div>
</section>

@endsection