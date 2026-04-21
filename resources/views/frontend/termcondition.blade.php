@extends('frontend.layouts.master')

@section('title','Petchemparts || Terms & Conditions')

@section('main-content')
<script src="https://cdn.tailwindcss.com"></script>


<style>

    .theme-bg { background-color: #13A1F3; }
    .theme-text { color: #13A1F3; }
    .theme-border { border-color: #13A1F3; }
</style>

<!-- Hero Section -->
<section class="theme-bg text-white py-20 mt-[80px]">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms & Conditions</h1>
        <p class="text-lg text-gray-100">Last Updated: December 2024</p>
    </div>
</section>

<!-- Main Content -->
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="bg-white rounded-lg shadow-md p-8 md:p-12 space-y-10">

        <!-- Introduction -->
        <p class="text-gray-600 leading-relaxed">
            Welcome to E-Painting. These Terms and Conditions outline the rules and regulations
            for the use of our website and services. By accessing this website and making a
            purchase, you accept these terms in full.
        </p>

        <!-- Section 1 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">1. General Terms</h3>
            <p class="text-gray-600 leading-relaxed mb-3">
                By accessing and placing an order with E-Painting, you agree to be bound by
                these terms and conditions.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Under no circumstances shall E-Painting be liable for any indirect or
                consequential damages arising from the use of this website.
            </p>
        </div>

        <!-- Section 2 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">2. Products & Services</h3>
            <p class="text-gray-600 leading-relaxed mb-3">
                All products are subject to availability and may be modified or discontinued
                at any time without notice.
            </p>
            <p class="text-gray-600 leading-relaxed">
                We strive to display accurate product information but cannot guarantee exact
                color representation on all screens.
            </p>
        </div>

        <!-- Section 3 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">3. Pricing & Payment</h3>
            <p class="text-gray-600 leading-relaxed mb-3">
                Prices are listed in GBP (£) and include VAT where applicable.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Payments must be completed at checkout using approved payment methods.
            </p>
        </div>

        <!-- Section 4 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">4. Shipping & Delivery</h3>
            <p class="text-gray-600 leading-relaxed mb-3">
                Orders are usually dispatched within 1–3 business days.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Delivery delays caused by third-party couriers are beyond our control.
            </p>
        </div>

        <!-- Section 5 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">5. Returns & Refunds</h3>
            <p class="text-gray-600 leading-relaxed mb-3">
                Returns are accepted within 30 days of delivery, provided items are unused.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Refunds are processed within 7–10 business days after inspection.
            </p>
        </div>

        <!-- Section 6 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">6. Privacy Policy</h3>
            <p class="text-gray-600 leading-relaxed">
                Your personal information is handled securely and never sold to third parties.
            </p>
        </div>

        <!-- Section 7 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">7. Intellectual Property</h3>
            <p class="text-gray-600 leading-relaxed">
                All content on this website is owned by E-Painting and protected by law.
            </p>
        </div>

        <!-- Section 8 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">8. User Conduct</h3>
            <p class="text-gray-600 leading-relaxed">
                Users must not misuse the website or engage in harmful activities.
            </p>
        </div>

        <!-- Section 9 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">9. Limitation of Liability</h3>
            <p class="text-gray-600 leading-relaxed">
                Our liability is limited to the amount paid for the purchased service.
            </p>
        </div>

        <!-- Section 10 -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">10. Governing Law</h3>
            <p class="text-gray-600 leading-relaxed">
                These terms are governed by the laws of the United Kingdom.
            </p>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-2xl font-bold theme-text mb-4">Contact Information</h3>
            <div class="bg-gray-50 rounded-lg p-6 text-gray-700">
                <p><strong>Email:</strong> legal@epainting.com</p>
                <p><strong>Phone:</strong> +44 123 456 7890</p>
                <p><strong>Address:</strong> London, United Kingdom</p>
            </div>
        </div>

        <!-- Agreement -->
        <div class="bg-blue-50 border-l-4 theme-border p-6 rounded-r-lg">
            <p class="text-gray-700">
                By using our website, you agree to these Terms & Conditions.
            </p>
        </div>

    </div>
</section>

@endsection
