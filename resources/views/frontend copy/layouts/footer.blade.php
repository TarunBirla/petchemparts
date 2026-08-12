{{-- resources/views/frontend/layouts/footer.blade.php --}}

<style>
    /* ==============================
       FOOTER — LIGHT BLUE/WHITE THEME
    ============================== */
    .site-footer {
        background: var(--white);
        border-top: 1px solid var(--gray-200);
        font-family: var(--font-body);
        color: var(--gray-600);
        margin-top: 0;
    }

    /* ── Newsletter Banner ── */
    .footer-newsletter-band {
        background: linear-gradient(135deg, #EFF8FF 0%, #DBEAFE 50%, #E0F2FE 100%);
        border-bottom: 1px solid var(--gray-200);
        padding: 40px 24px;
    }
    .newsletter-band-inner {
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap;
    }
    .newsletter-band-text h3 {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 4px;
    }
    .newsletter-band-text p {
        font-size: 14px;
        color: var(--gray-500);
    }
    .newsletter-band-form {
        display: flex;
        gap: 0;
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1.5px solid var(--gray-200);
        background: var(--white);
        box-shadow: var(--shadow-sm);
        min-width: 360px;
    }
    @media (max-width: 640px) { .newsletter-band-form { min-width: 100%; width: 100%; } }
    .newsletter-band-form input {
        flex: 1;
        padding: 12px 16px;
        border: none;
        outline: none;
        font-size: 14px;
        font-family: var(--font-body);
        color: var(--gray-900);
        background: transparent;
    }
    .newsletter-band-form input::placeholder { color: var(--gray-400); }
    .newsletter-band-form button {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0 22px;
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 7px;
        transition: background 0.2s;
    }
    .newsletter-band-form button:hover { background: var(--primary-dark); }

    /* ── Main footer grid ── */
    .footer-main {
        padding: 56px 24px 48px;
        max-width: 1280px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2.2fr 1fr 1fr 1.4fr;
        gap: 48px;
    }
    @media (max-width: 1024px) {
        .footer-main { grid-template-columns: 1fr 1fr; gap: 36px; }
    }
    @media (max-width: 600px) {
        .footer-main { grid-template-columns: 1fr; gap: 32px; }
    }

    /* Brand column */
    .footer-brand-logo { height: 40px; margin-bottom: 14px; display: block; }
    .footer-brand-name {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 800;
        color: var(--gray-900);
        margin-bottom: 4px;
    }
    .footer-brand-sub {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--primary);
        margin-bottom: 14px;
    }
    .footer-brand-desc {
        font-size: 13.5px;
        line-height: 1.75;
        color: var(--gray-500);
        max-width: 300px;
        margin-bottom: 22px;
    }
    .footer-social {
        display: flex;
        gap: 8px;
    }
    .footer-social a {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        border: 1.5px solid var(--gray-200);
        background: var(--white);
        color: var(--gray-500);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 14px;
        transition: var(--transition);
    }
    .footer-social a:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Column title */
    .footer-col-title {
        font-family: var(--font-display);
        font-size: 14px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--primary-light);
        position: relative;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .footer-col-title i {
        color: var(--primary);
        font-size: 13px;
    }

    /* Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 9px;
    }
    .footer-links a {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13.5px;
        color: var(--gray-500);
        text-decoration: none;
        transition: var(--transition);
    }
    .footer-links a i {
        color: var(--primary-light);
        font-size: 11px;
        width: 14px;
        transition: color 0.2s;
    }
    .footer-links a:hover {
        color: var(--primary);
    }
    .footer-links a:hover i {
        color: var(--primary);
    }

    /* Contact list */
    .footer-contact-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .footer-contact-row {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }
    .footer-contact-icon {
        width: 36px;
        height: 36px;
        background: var(--primary-xlight);
        border: 1px solid var(--primary-light);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--primary);
        font-size: 13px;
    }
    .footer-contact-label {
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--gray-400);
        margin-bottom: 2px;
    }
    .footer-contact-value {
        font-size: 13.5px;
        color: var(--gray-700);
        line-height: 1.5;
    }
    .footer-contact-value a {
        color: var(--gray-700);
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-contact-value a:hover { color: var(--primary); }

    /* Hours */
    .footer-hours {
        display: flex;
        flex-direction: column;
        gap: 0;
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        overflow: hidden;
    }
    .hours-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 9px 14px;
        font-size: 13px;
        background: var(--white);
        border-bottom: 1px solid var(--gray-100);
        transition: background 0.15s;
    }
    .hours-row:last-child { border-bottom: none; }
    .hours-row:hover { background: var(--primary-xlight); }
    .hours-day { color: var(--gray-600); font-weight: 500; }
    .hours-time { color: var(--primary-dark); font-weight: 600; font-size: 12.5px; }
    .hours-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        padding: 6px 14px;
        background: #DCFCE7;
        color: #15803D;
        border-radius: 100px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #BBF7D0;
        width: fit-content;
    }
    .hours-status i { font-size: 7px; }

    /* ── Bottom bar ── */
    .footer-bottom-wrap {
        border-top: 1px solid var(--gray-200);
        background: var(--gray-50);
    }
    .footer-bottom {
        max-width: 1280px;
        margin: 0 auto;
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 14px;
    }
    .footer-copyright {
        font-size: 13px;
        color: var(--gray-500);
    }
    .footer-copyright strong { color: var(--gray-700); }
    .footer-pay-badges {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    .pay-badge {
        background: var(--white);
        border: 1px solid var(--gray-200);
        color: var(--gray-600);
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        letter-spacing: 0.04em;
    }

    /* ── Disclaimer ── */
    .footer-disclaimer {
        background: var(--gray-100);
        border-top: 1px solid var(--gray-200);
        padding: 16px 24px;
    }
    .footer-disclaimer-inner {
        max-width: 1280px;
        margin: 0 auto;
        font-size: 11.5px;
        color: var(--gray-400);
        line-height: 1.7;
    }
    .footer-disclaimer-inner strong { color: var(--gray-500); }

    /* ── Back to top ── */
    #backToTop {
        position: fixed;
        bottom: 28px;
        right: 28px;
        width: 44px;
        height: 44px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius-md);
        font-size: 16px;
        cursor: pointer;
        z-index: 500;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #backToTop.visible { opacity: 1; visibility: visible; }
    #backToTop:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
    }
</style>

<footer class="site-footer">

    {{-- Newsletter Band --}}
    <div class="footer-newsletter-band">
        <div class="newsletter-band-inner">
            <div class="newsletter-band-text">
                <h3><i class="fas fa-paper-plane" style="color:var(--primary);margin-right:8px;font-size:17px;"></i>Stay Updated</h3>
                <p>Subscribe for new parts, price updates & exclusive offers</p>
            </div>
            <div class="newsletter-band-form">
                <input type="email" placeholder="Enter your email address…">
                <button type="submit">
                    <i class="fas fa-arrow-right"></i> Subscribe
                </button>
            </div>
        </div>
    </div>

    {{-- Main Footer --}}
    <div class="footer-main">

        {{-- Brand Column --}}
        <div>
            <img src="/brands/logo.png" alt="Petchemparts" class="footer-brand-logo" onerror="this.style.display='none'">
            <div class="footer-brand-name">Petchemparts</div>
            <div class="footer-brand-sub">Industrial Parts Specialists</div>
            <p class="footer-brand-desc">
                A leading supplier of genuine industrial & petrochemical parts. Trusted by engineers and procurement teams across the UK and globally since 2004.
            </p>
            <div class="footer-social">
                <a href="#" title="Facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Twitter / X" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="LinkedIn" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="YouTube" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        {{-- Quick Links --}}
        <div>
            <h4 class="footer-col-title"><i class="fas fa-link"></i> Quick Links</h4>
            <ul class="footer-links">
                <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a></li>
                <li><a href="{{ url('/shop') }}"><i class="fas fa-chevron-right"></i> Shop All Parts</a></li>
                <li><a href="/frontend/showcategory"><i class="fas fa-chevron-right"></i> Browse Categories</a></li>
                <li><a href="{{ url('/frontend/aboutus') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                <li><a href="{{ url('/frontend/contact') }}"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                <li><a href="{{ url('/frontend/contact') }}"><i class="fas fa-chevron-right"></i> Request a Quote</a></li>
                <li><a href="{{ url('/frontend/termcondition') }}"><i class="fas fa-chevron-right"></i> Terms & Conditions</a></li>
            </ul>
        </div>

        {{-- Contact Info --}}
        <div>
            <h4 class="footer-col-title"><i class="fas fa-map-marker-alt"></i> Contact Info</h4>
            <div class="footer-contact-list">
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <div class="footer-contact-label">Address</div>
                        <div class="footer-contact-value">Suite 211 Sterling House, Langston Road, Loughton, IG10 3TS, UK</div>
                    </div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <div class="footer-contact-label">Phone</div>
                        <div class="footer-contact-value"><a href="tel:+441234440530">+44 123 444 0530</a></div>
                    </div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                    <div>
                        <div class="footer-contact-label">Email</div>
                        <div class="footer-contact-value"><a href="mailto:sales@petchemparts.com">sales@petchemparts.com</a></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Business Hours --}}
        <div>
            <h4 class="footer-col-title"><i class="fas fa-clock"></i> Business Hours</h4>
            <div class="footer-hours">
                <div class="hours-row">
                    <span class="hours-day">Monday – Friday</span>
                    <span class="hours-time">9:00 – 19:00</span>
                </div>
                <div class="hours-row">
                    <span class="hours-day">Saturday</span>
                    <span class="hours-time">9:00 – 17:00</span>
                </div>
                <div class="hours-row">
                    <span class="hours-day">Sunday</span>
                    <span class="hours-time">10:00 – 16:00</span>
                </div>
            </div>
            <div class="hours-status">
                <i class="fas fa-circle" style="color:#22C55E;"></i> Currently Open
            </div>
        </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="footer-bottom-wrap">
        <div class="footer-bottom">
            <p class="footer-copyright">
                &copy; {{ date('Y') }} <strong>Petchemparts</strong> — A Brand Unit of Pearloon Business Services Ltd. (UK). All rights reserved.
            </p>
            <div class="footer-pay-badges">
                <span class="pay-badge">VISA</span>
                <span class="pay-badge">Mastercard</span>
                <span class="pay-badge">PayPal</span>
                <span class="pay-badge">Amex</span>
                <span class="pay-badge">Bank Transfer</span>
            </div>
        </div>
    </div>

    {{-- Legal Disclaimer --}}
    <div class="footer-disclaimer">
        <div class="footer-disclaimer-inner">
            <strong>Legal Disclaimer:</strong> Petchemparts is not an authorized dealer, agent or affiliate of any of the designers, brands, or manufacturers whose products are offered for sale on www.petchemparts.com. All trademarks, brand names, and logos are used for identification purposes only and are registered trademarks of their respective owners. All products are 100% genuine and legally purchased from authorized sources.
        </div>
    </div>

</footer>

{{-- Back to Top --}}
<button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to top" aria-label="Back to top">
    <i class="fas fa-arrow-up"></i>
</button>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 650, once: true, offset: 50 });

    window.addEventListener('scroll', () => {
        document.getElementById('backToTop').classList.toggle('visible', window.scrollY > 300);
    });
</script>
@stack('scripts')
