
@extends('frontend.layouts.master')

@section('title','Petchemparts || All categorys')

@section('main-content')

        <div class="container max-w-7xl mx-auto px-4 py-10 mt-[80px]">
    <!-- Account Info -->
    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <div class="flex justify-between items-center cursor-pointer">
            <h3 class="text-xl font-semibold">Account</h3>
            <i class="fas fa-chevron-up account-toggle"></i>
        </div>
        <div class="mt-4">
            @if(auth()->check())
                <p class="text-gray-700">{{ auth()->user()->name }}</p>
                <p class="text-gray-700">{{ auth()->user()->email }}</p>
                <a href="{{ url('/user/logout') }}" class="text-blue-600 hover:underline">Log out</a>
            @else
                <a href="{{ url('/user/login') }}" class="text-blue-600 hover:underline">Log in</a>
            @endif
        </div>
        <div class="mt-4 flex items-center gap-2">
            <input type="checkbox" id="newsletter" name="newsletter" class="form-checkbox h-4 w-4 text-blue-600">
            <label for="newsletter" class="text-gray-700">Email me with news and offers</label>
        </div>
    </div>

    <!-- Checkout Form -->
    <form method="POST" action="{{ route('cart.order') }}" class="flex flex-col lg:flex-row gap-8">
        @csrf

        <!-- LEFT -->
        <div class="lg:w-2/3 bg-white p-6 rounded-xl shadow space-y-6">
            <h2 class="text-2xl font-semibold mb-4">Petchemparts Checkout</h2>

            <!-- Country -->
            <div>
                <label for="country" class="block text-gray-700 font-medium mb-1">Country/Region</label>
                <select id="country" name="country" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="UK">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="AU">Australia</option>
                </select>
            </div>

            <!-- Name Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">First Name *</label>
                    <input type="text" name="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->first_name : old('first_name') }}">
                    @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Last Name *</label>
                    <input type="text" name="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->last_name : old('last_name') }}">
                    @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Email & Phone Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Phone *</label>
                    <input type="text" name="phone" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}">
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 mb-1">Address Line 1 *</label>
                <input type="text" name="address1" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('address1') }}">
                @error('address1') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-1">Address Line 2</label>
                <input type="text" name="address2" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('address2') }}">
                @error('address2') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- City & Postal Code -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">City *</label>
                    <input type="text" name="city" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('city') }}">
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Postal Code *</label>
                    <input type="text" name="post_code" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('post_code') }}">
                </div>
            </div>

            <!-- Hidden Payment Method -->
            <input type="radio" name="payment_method" value="cod" checked hidden>

            <!-- Submit -->
            <div class="text-center">
               <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transition font-semibold shadow-md">
                Place Order 
            </button>
            </div>
        </div>

        <!-- RIGHT: Summary -->
        <div class="lg:w-1/3 bg-white p-6 rounded-xl shadow sticky top-24">
            <h3 class="text-xl font-semibold mb-4 border-b pb-2">Order Summary</h3>
        
            <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2">
                @foreach ($cartItems as $item)
                    @php
                        $photos = json_decode($item->product->photo, true);
                        $img = $photos[0] ?? 'default.png';
                    @endphp
        
                    <div class="flex items-center gap-3 border-b pb-3">
        
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-800 line-clamp-2">
                                {{ $item->product->title }}
                            </h4>
                            <p class="text-gray-500 text-sm">
                                Qty: {{ $item->quantity }}
                            </p>
                        </div>
        
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">
                                £{{ number_format($item->amount, 2) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        
            <!-- Totals -->
            <div class="mt-4 space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Subtotal ({{ Helper::cartCount() }} items)</span>
                    <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                </div>
        
                <div class="flex justify-between font-bold text-lg border-t pt-3">
                    <span>Total</span>
                    <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                </div>
            </div>
        </div>
    </form>
</div>


                       <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
                <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
                <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
               
<script>
$(document).ready(function () {

    const $start = $("#start_date");
    const $end = $("#end_date");
    const $total = $("#total_price");
    const $subtotal = $("#subtotal_price");

    let weeklyPrice = parseFloat("{{ Helper::totalCartPrice() }}");

    let allowedDates = [];

    $end.prop("disabled", true);

    $start.on("change", function () {
        generateWeeklyEndDates();
        $end.prop("disabled", false);
        $end.val("");
        calculateTotal();
    });

    $end.on("change", function () {
        let val = $end.val();
        if (!allowedDates.includes(val)) {
            alert("Please select only weekly end dates:\n" + allowedDates.join("\n"));
            $end.val("");
            return;
        }
        calculateTotal();
    });

    function generateWeeklyEndDates() {
        let startDate = $start.val();
        if (!startDate) return;

        let start = new Date(startDate);

        allowedDates = [
            formatYMD(addDays(start, 7)),
            formatYMD(addDays(start, 14)),
            formatYMD(addDays(start, 21)),
            formatYMD(addDays(start, 28))
        ];

        $end.attr("min", allowedDates[0]);
    }

    function addDays(date, days) {
        let d = new Date(date);
        d.setDate(d.getDate() + days);
        return d;
    }

    function formatYMD(d) {
        return d.toISOString().split("T")[0];
    }

    function calculateTotal() {
        let start = $start.val();
        let end = $end.val();
        if (!start || !end) return;

        let s = new Date(start);
        let e = new Date(end);

        // EXACT DAYS (NO +1)
        let diffDays = Math.floor((e - s) / (1000 * 60 * 60 * 24));

        // WEEK = diffDays / 7 because only weekly allowed
        let weeks = diffDays / 7;

        let rentTotal = weeklyPrice * weeks;

        $subtotal.text("£" + rentTotal.toFixed(2));
        $total.text("£" + rentTotal.toFixed(2));
    }
});
</script>







    </body>
</html>


@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush


@endsection