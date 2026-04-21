@extends('frontend.layouts.master')

@section('title','Petchemparts || About Us')

@section('main-content')
<script src="https://cdn.tailwindcss.com"></script>


<style>

    .theme-bg { background-color: #13A1F3; }
    .theme-text { color: #13A1F3; }
    .theme-border { border-color: #13A1F3; }
</style>

  <!-- Hero Section -->
    <div class="theme-bg text-white py-20 mt-[80px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">About Our Story</h2>
            <p class="text-xl text-gray-100 max-w-3xl mx-auto">Delivering quality products and exceptional service since 2010</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Our Story -->
        <div class="mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Founded in 2010, YourStore began with a simple mission: to provide high-quality products that enhance everyday life. What started as a small online shop has grown into a trusted destination for thousands of customers worldwide.
                    </p>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        We believe in the power of quality, authenticity, and customer satisfaction. Every product we offer is carefully selected to meet our high standards, ensuring that you receive only the best.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Today, we continue to innovate and expand our offerings while staying true to our core values of integrity, excellence, and customer-first service.
                    </p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop" 
                         alt="Our Store" 
                         class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>

        <!-- Our Values -->
        <div class="mb-16">
            <h3 class="text-3xl font-bold text-gray-900 text-center mb-12">Our Values</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 theme-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Quality First</h4>
                    <p class="text-gray-600">We never compromise on quality. Every product is rigorously tested to meet our high standards.</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 theme-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Customer Focused</h4>
                    <p class="text-gray-600">Your satisfaction is our priority. We're here to ensure your shopping experience is exceptional.</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 theme-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Innovation</h4>
                    <p class="text-gray-600">We continuously evolve to bring you the latest and best products in the market.</p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mb-16">
            <h3 class="text-3xl font-bold text-gray-900 text-center mb-12">Meet Our Team</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop" 
                         alt="Team Member" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h4 class="text-lg font-semibold text-gray-900">John Smith</h4>
                    <p class="theme-text text-sm">Founder & CEO</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop" 
                         alt="Team Member" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h4 class="text-lg font-semibold text-gray-900">Sarah Johnson</h4>
                    <p class="theme-text text-sm">Head of Operations</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=300&h=300&fit=crop" 
                         alt="Team Member" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h4 class="text-lg font-semibold text-gray-900">Michael Brown</h4>
                    <p class="theme-text text-sm">Marketing Director</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&h=300&fit=crop" 
                         alt="Team Member" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h4 class="text-lg font-semibold text-gray-900">Emily Davis</h4>
                    <p class="theme-text text-sm">Customer Support Lead</p>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-white rounded-lg shadow-md p-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold theme-text mb-2">15+</p>
                    <p class="text-gray-600">Years Experience</p>
                </div>
                <div>
                    <p class="text-4xl font-bold theme-text mb-2">50K+</p>
                    <p class="text-gray-600">Happy Customers</p>
                </div>
                <div>
                    <p class="text-4xl font-bold theme-text mb-2">1000+</p>
                    <p class="text-gray-600">Products</p>
                </div>
                <div>
                    <p class="text-4xl font-bold theme-text mb-2">24/7</p>
                    <p class="text-gray-600">Support</p>
                </div>
            </div>
        </div>
    </div>



@endsection