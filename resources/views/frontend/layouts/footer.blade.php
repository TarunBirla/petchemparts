{{-- resources/views/frontend/layouts/footer.blade.php --}}

<style>
/* ── FOOTER — Terracotta & Cream Design System ── */

.site-footer {
    background: var(--ink, #1A0F08);
    color: var(--fog, #B89880);
    font-family: 'Plus Jakarta Sans', sans-serif;
    margin-top: 0;
}

/* ── TOP SECTION ── */
.footer-top {
    border-bottom: 1px solid rgba(194,90,42,0.2);
    padding: 72px 0 56px;
}
.footer-grid {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 52px;
}
@media (max-width: 1024px) { .footer-grid { grid-template-columns: 1fr 1fr; gap: 36px; } }
@media (max-width: 640px)  { .footer-grid { grid-template-columns: 1fr; gap: 36px; } }

/* Brand column */
.footer-brand-logo {
    height: 44px;
    margin-bottom: 18px;
    display: block;
}
.footer-brand-desc {
    font-size: 13.5px;
    line-height: 1.8;
    color: var(--fog, #B89880);
    max-width: 310px;
    margin-bottom: 28px;
}
.footer-social {
    display: flex;
    gap: 10px;
}
.footer-social a {
    width: 38px;
    height: 38px;
    background: rgba(194,90,42,0.12);
    border: 1px solid rgba(194,90,42,0.2);
    color: var(--fog, #B89880);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.22s;
}
.footer-social a:hover {
    background: var(--terra, #C25A2A);
    border-color: var(--terra, #C25A2A);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(194,90,42,0.28);
}

/* Column headings */
.footer-col-title {
    font-size: 14px;
    font-weight: 800;
    color: #F6F1E9;
    margin-bottom: 22px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    position: relative;
    padding-bottom: 14px;
}
.footer-col-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 28px;
    height: 2.5px;
    background: var(--terra, #C25A2A);
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
    color: var(--fog, #B89880);
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}
.footer-links a::before {
    content: '';
    width: 5px;
    height: 5px;
    background: rgba(194,90,42,0.35);
    border-radius: 50%;
    flex-shrink: 0;
    transition: background 0.2s;
}
.footer-links a:hover {
    color: var(--terra-lt, #D97B50);
    padding-left: 4px;
}
.footer-links a:hover::before { background: var(--terra, #C25A2A); }

/* Contact items */
.footer-contact-item {
    display: flex;
    gap: 13px;
    align-items: flex-start;
    margin-bottom: 18px;
}
.footer-contact-icon {
    width: 36px;
    height: 36px;
    background: rgba(194,90,42,0.12);
    border: 1px solid rgba(194,90,42,0.2);
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--terra, #C25A2A);
    font-size: 13px;
    transition: all 0.22s;
}
.footer-contact-item:hover .footer-contact-icon {
    background: var(--terra, #C25A2A);
    color: #fff;
}
.footer-contact-text {
    font-size: 13.5px;
    color: var(--fog, #B89880);
    line-height: 1.65;
}
.footer-contact-text strong {
    display: block;
    color: #F6F1E9;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 3px;
}

/* Newsletter */
.footer-newsletter { margin-top: 4px; }
.newsletter-label {
    font-size: 12.5px;
    color: var(--fog, #B89880);
    margin-bottom: 10px;
    font-weight: 500;
}
.newsletter-form {
    display: flex;
    border: 1.5px solid rgba(194,90,42,0.25);
    border-radius: 10px;
    overflow: hidden;
    background: rgba(194,90,42,0.07);
}
.newsletter-form input {
    flex: 1;
    padding: 11px 14px;
    background: transparent;
    border: none;
    color: #F6F1E9;
    font-size: 13px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    outline: none;
}
.newsletter-form input::placeholder { color: rgba(184,152,128,0.55); }
.newsletter-form button {
    background: var(--terra, #C25A2A);
    border: none;
    color: #fff;
    padding: 0 18px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.2s;
}
.newsletter-form button:hover { background: var(--terra-dk, #A34921); }

/* Hours */
.hours-row {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    padding: 9px 0;
    border-bottom: 1px solid rgba(194,90,42,0.12);
    color: var(--fog, #B89880);
}
.hours-row:last-of-type { border-bottom: none; }
.hours-row .day { color: #F6F1E9; font-weight: 600; }
.hours-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 14px;
    background: rgba(194,90,42,0.12);
    color: var(--terra-lt, #D97B50);
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 20px;
    border: 1px solid rgba(194,90,42,0.25);
    letter-spacing: 0.03em;
}

/* ── BOTTOM BAR ── */
.footer-bottom-wrap {
    border-top: 1px solid rgba(194,90,42,0.15);
}
.footer-bottom {
    padding: 22px 24px;
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
}
.footer-bottom-text {
    font-size: 13px;
    color: var(--fog, #B89880);
}
.footer-bottom-text strong { color: #F6F1E9; }
.footer-payment-badges {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.payment-badge {
    background: rgba(194,90,42,0.1);
    border: 1px solid rgba(194,90,42,0.2);
    color: var(--fog, #B89880);
    font-size: 10.5px;
    font-weight: 800;
    padding: 5px 12px;
    border-radius: 7px;
    letter-spacing: 0.06em;
    transition: all 0.18s;
}
.payment-badge:hover {
    background: rgba(194,90,42,0.18);
    color: #F6F1E9;
    border-color: rgba(194,90,42,0.4);
}

/* ── DISCLAIMER ── */
.footer-disclaimer {
    background: rgba(0,0,0,0.25);
    padding: 18px 24px;
    border-top: 1px solid rgba(194,90,42,0.10);
}
.footer-disclaimer-inner {
    max-width: 1280px;
    margin: 0 auto;
    font-size: 11.5px;
    color: rgba(184,152,128,0.55);
    line-height: 1.75;
}
.footer-disclaimer-inner strong { color: rgba(184,152,128,0.75); }

/* ── BACK TO TOP ── */
#backToTop {
    position: fixed;
    bottom: 28px;
    right: 28px;
    width: 46px;
    height: 46px;
    background: var(--terra, #C25A2A);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 17px;
    cursor: pointer;
    z-index: 500;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
    box-shadow: 0 8px 24px rgba(194,90,42,0.38);
    display: flex;
    align-items: center;
    justify-content: center;
}
#backToTop.visible {
    opacity: 1;
    visibility: visible;
}
#backToTop:hover {
    background: var(--terra-dk, #A34921);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(194,90,42,0.45);
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
                    <i class="fas fa-circle" style="font-size:6px;"></i>
                    Currently Open
                </div>

                <div class="footer-newsletter" style="margin-top:28px;">
                    <p class="newsletter-label">Subscribe for updates & offers</p>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom-wrap">
        <div class="footer-bottom">
            <p class="footer-bottom-text">
                &copy; {{ date('Y') }} <strong>Petchemparts</strong> — A Brand Unit of Pearloon Business Services Ltd. (UK)
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