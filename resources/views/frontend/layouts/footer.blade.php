<style>
     body{
           font-family: "Poppins", sans-serif;
            
        }
</style>

<footer class="bg-gray-800 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Footer Grid -->
        <div class="grid md:grid-cols-4 gap-8 mb-10">

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Quick Links</h4>
                <!--<ul class="space-y-2">-->
                <!--    <li><a href="/" class="hover:text-white transition">Your Account</a></li>-->
                <!--    <li><a href="{{ url('/frontend/aboutus') }}" class="hover:text-white transition">About Us</a></li>-->
                <!--    <li><a href="{{ url('/frontend/termcondition') }}" class="hover:text-white transition">Terms & Conditions</a></li>-->
                <!--    <li><a href="/" class="hover:text-white transition">Delivery</a></li>-->
                <!--    <li><a href="{{ url('/frontend/contact') }}" class="hover:text-white transition">Contact Us</a></li>-->
                <!--</ul>-->
                
                                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white transition">Your Account</a></li>
                    <li><a href="/" class="hover:text-white transition">About Us</a></li>
                    <li><a href="/" class="hover:text-white transition">Terms & Conditions</a></li>
                    <li><a href="/" class="hover:text-white transition">Delivery</a></li>
                    <li><a href="/" class="hover:text-white transition">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Contact Info</h4>
                <ul class="space-y-4 text-sm">

                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-[#13A1F3] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>
                            Suite 211 Sterling House,<br>
                            Langston Road, Loughton<br>
                            IG10 3TS, United Kingdom
                        </span>
                    </li>

                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#13A1F3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1"/>
                        </svg>
                        <span>+44 123 444 0530</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#13A1F3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>sales@petchemparts.com</span>
                    </li>
                </ul>
            </div>

            <!-- Business Hours -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Business Hours</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#13A1F3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>7 Days a week</span>
                    </li>
                    <li class="pl-7">9:00 AM – 7:00 PM</li>
                    <li class="pt-4">
                        <a href="{{ url('/frontend/contact') }}"
                           class="block bg-[#13A1F3] text-white text-center px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                            Request Quote
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social + Newsletter -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Follow Us</h4>

                <div class="flex space-x-4 mb-6">
                    @foreach(['facebook','twitter','linkedin','youtube'] as $icon)
                        <a href="#" class="w-10 h-10 bg-[#13A1F3] rounded-lg flex items-center justify-center hover:opacity-80 transition">
                            <i class="fab fa-{{ $icon }} text-white"></i>
                        </a>
                    @endforeach
                </div>

                <h4 class="text-white font-bold text-sm mb-2">Newsletter</h4>
                <p class="text-sm mb-3">Subscribe for updates</p>

                <form class="flex">
                    <input type="email" required
                           placeholder="Your email"
                           class="flex-1 px-4 py-2 rounded-l-lg text-gray-900 focus:outline-none">
                    <button type="submit"
                            class="bg-[#13A1F3] px-2 py-2 rounded-r-lg hover:shadow-lg transition text-white">
                        →
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
            © {{ date('Y') }} Petchemparts — A Brand Unit of Pearloon Business Services Ltd. (UK)
        </div>

    </div>
</footer>

<!-- Back to Top -->
<button id="backToTop"
        class="fixed bottom-8 right-8 bg-[#13A1F3] text-white p-4 rounded-full shadow-xl
               opacity-0 invisible transition-all duration-300">
    ↑
</button>
