{{-- resources/views/frontend/layouts/footer.blade.php --}}

<style>
    /* ===== FOOTER ===== */
    .site-footer {
        background: var(--dark);
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-top: 0;
    }

    .footer-top {
        border-bottom: 1px solid #1E293B;
        padding: 64px 0 48px;
    }

    .footer-grid {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 48px;
    }

    @media (max-width: 1024px) {
        .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
    }
    @media (max-width: 640px) {
        .footer-grid { grid-template-columns: 1fr; gap: 32px; }
    }

    /* Brand column */
    .footer-brand-logo { height: 44px; margin-bottom: 16px; }
    .footer-brand-desc {
        font-size: 14px;
        line-height: 1.75;
        color: #64748B;
        max-width: 320px;
        margin-bottom: 24px;
    }
    .footer-social {
        display: flex;
        gap: 10px;
    }
    .footer-social a {
        width: 38px;
        height: 38px;
        background: #1E293B;
        color: #94A3B8;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 15px;
        transition: all 0.2s;
    }
    .footer-social a:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
    }

    /* Column headings */
    .footer-col-title {
        font-family: 'Outfit', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        letter-spacing: 0.02em;
        position: relative;
        padding-bottom: 12px;
    }
    .footer-col-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 32px;
        height: 2px;
        background: var(--primary);
        border-radius: 2px;
    }

    /* Footer links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .footer-links a {
        color: #64748B;
        text-decoration: none;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 7px;
        transition: all 0.2s;
    }
    .footer-links a::before {
        content: '';
        width: 5px;
        height: 5px;
        background: #334155;
        border-radius: 50%;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .footer-links a:hover {
        color: var(--primary);
        padding-left: 4px;
    }
    .footer-links a:hover::before { background: var(--primary); }

    /* Contact items */
    .footer-contact-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-bottom: 16px;
    }
    .footer-contact-icon {
        width: 34px;
        height: 34px;
        background: #1E293B;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--primary);
        font-size: 14px;
    }
    .footer-contact-text {
        font-size: 13.5px;
        color: #64748B;
        line-height: 1.6;
    }
    .footer-contact-text strong {
        display: block;
        color: #CBD5E1;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 2px;
    }

    /* Newsletter */
    .footer-newsletter {
        margin-top: 4px;
    }
    .newsletter-form {
        display: flex;
        gap: 0;
        border: 1px solid #1E293B;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 12px;
        background: #1E293B;
    }
    .newsletter-form input {
        flex: 1;
        padding: 11px 14px;
        background: transparent;
        border: none;
        color: white;
        font-size: 13px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        outline: none;
    }
    .newsletter-form input::placeholder { color: #475569; }
    .newsletter-form button {
        background: var(--primary);
        border: none;
        color: white;
        padding: 0 16px;
        font-size: 15px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .newsletter-form button:hover { background: var(--primary-dark); }

    /* Hours */
    .hours-row {
        display: flex;
        justify-content: space-between;
        font-size: 13.5px;
        padding: 8px 0;
        border-bottom: 1px solid #1E293B;
        color: #64748B;
    }
    .hours-row:last-of-type { border-bottom: none; }
    .hours-row .day { color: #94A3B8; font-weight: 500; }
    .hours-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 12px;
        background: rgba(14,165,233,0.1);
        color: var(--primary);
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        border: 1px solid rgba(14,165,233,0.2);
    }

    /* Bottom bar */
    .footer-bottom {
        padding: 20px 24px;
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .footer-bottom-text {
        font-size: 13px;
        color: #475569;
    }
    .footer-payment-badges {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .payment-badge {
        background: #1E293B;
        color: #94A3B8;
        font-size: 11.5px;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 6px;
        letter-spacing: 0.04em;
        border: 1px solid #334155;
    }

    /* Disclaimer */
    .footer-disclaimer {
        background: #0A0F1A;
        padding: 20px 24px;
    }
    .footer-disclaimer-inner {
        max-width: 1280px;
        margin: 0 auto;
        font-size: 12px;
        color: #334155;
        line-height: 1.7;
    }
    .footer-disclaimer-inner strong { color: #475569; }

    /* Back to top */
    #backToTop {
        position: fixed;
        bottom: 28px;
        right: 28px;
        width: 46px;
        height: 46px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 18px;
        cursor: pointer;
        z-index: 500;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        box-shadow: 0 8px 20px rgba(14,165,233,0.35);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #backToTop.visible {
        opacity: 1;
        visibility: visible;
    }
    #backToTop:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
    }
</style>

<footer class="site-footer">
    <div class="footer-top">
        <div class="footer-grid">

            <!-- Brand Column -->
            <div>
                <img src="/brands/logo.png" alt="Petchemparts" class="footer-brand-logo">
                <p class="footer-brand-desc">
                    A leading supplier of genuine industrial & petrochemical parts. Trusted by engineers and procurement teams across the UK and globally.
                </p>
                <div class="footer-social">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="footer-col-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="/">Your Account</a></li>
                    <li><a href="{{ url('/frontend/aboutus') }}">About Us</a></li>
                    <li><a href="{{ url('/frontend/termcondition') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('/frontend/contact') }}">Contact Us</a></li>
                    <li><a href="{{ url('/shop') }}">Shop All Parts</a></li>
                    <li><a href="{{ url('/frontend/contact') }}">Request a Quote</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="footer-col-title">Contact Info</h4>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="footer-contact-text">
                        <strong>Address</strong>
                        Suite 211 Sterling House, Langston Road,<br>Loughton, IG10 3TS, UK
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="footer-contact-text">
                        <strong>Phone</strong>
                        +44 123 444 0530
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="footer-contact-text">
                        <strong>Email</strong>
                        sales@petchemparts.com
                    </div>
                </div>
            </div>

            <!-- Hours & Newsletter -->
            <div>
                <h4 class="footer-col-title">Business Hours</h4>
                <div class="hours-row"><span class="day">Monday – Friday</span><span>9:00 – 19:00</span></div>
                <div class="hours-row"><span class="day">Saturday</span><span>9:00 – 17:00</span></div>
                <div class="hours-row"><span class="day">Sunday</span><span>10:00 – 16:00</span></div>
                <div class="hours-badge">
                    <i class="fas fa-circle" style="font-size:7px;"></i>
                    Currently Open
                </div>

                <div class="footer-newsletter" style="margin-top:24px;">
                    <p style="font-size:13px; color:#64748B; margin-bottom:0;">Subscribe for updates & offers</p>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div style="border-top:1px solid #1E293B;">
        <div class="footer-bottom">
            <p class="footer-bottom-text">
                &copy; {{ date('Y') }} <strong style="color:#64748B;">Petchemparts</strong> — A Brand Unit of Pearloon Business Services Ltd. (UK)
            </p>
            <div class="footer-payment-badges">
                <span class="payment-badge">VISA</span>
                <span class="payment-badge">Mastercard</span>
                <span class="payment-badge">PayPal</span>
                <span class="payment-badge">Amex</span>
                <span class="payment-badge">Bank Transfer</span>
            </div>
        </div>
    </div>

    <!-- Disclaimer -->
    <div class="footer-disclaimer">
        <div class="footer-disclaimer-inner">
            <strong>Legal Disclaimer:</strong> Petchemparts is not an authorized dealer, agent or affiliate of any of the designers, brands, or manufacturers whose products are offered for sale on www.petchemparts.com. All trademarks, brand names, and logos are used for identification purposes only and are registered trademarks of their respective owners. All products are 100% genuine and legally purchased from authorized sources.
        </div>
    </div>
</footer>

<!-- Back to Top -->
<button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 60 });

    window.addEventListener('scroll', () => {
        document.getElementById('backToTop').classList.toggle('visible', window.scrollY > 300);
    });
</script>
@stack('scripts')
</body>
</html>