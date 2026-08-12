@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<style>
		.payment-card {
			/* width: 300px; */
			padding: 24px;
			margin-top: 20px;
			border: 1px solid #eee;
			border-radius: 12px;
			font-family: Arial, sans-serif;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.05);
			}

			.payment-card h4 {
			font-size: 18px;
			margin-bottom: 20px;
			font-weight: 600;
			}

			.payment-row {
			display: flex;
			justify-content: space-between;
			margin: 10px 0;
			font-size: 15px;
			}

			.payment-row.total {
			font-weight: bold;
			border-top: 1px solid #ddd;
			padding-top: 10px;
			margin-top: 15px;
			}

			.discount {
			color: green;
			}

			.savings-text {
			color: green;
			font-size: 14px;
			margin-top: 10px;
			font-weight: 500;
			text-align: right;
			}

			.place-order-btn {
			width: 100%;
			margin-top: 20px;
			padding: 14px 0;
			background-color: #D64933;
			color: white;
			border: none;
			border-radius: 30px;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
			transition: background-color 0.3s ease;
			}

			.place-order-btn:hover {
			background-color: #bf3e2b;
			}

	</style>
	<section class="cart-sec sectionpadding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-heading">
						<h3 class="mb-4">My Cart</h3>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="cart-areas">
						<div class="cart-heading">
							<div class="c-head-text">
								<h6>Hyperlocal Basket (2)</h6>
								<span>Free delivery on order above $500</span>
							</div>
							<div class="c-head-text">
								<h6 class="ct-price">{{number_format(Helper::totalCartPrice(),2)}}</h6>
							</div>
						</div>
						@php
							$cart_items = Helper::getAllProductFromCart();
						@endphp
						<div class="cart-item">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
									@if(count($cart_items) > 0)
											@foreach(Helper::getAllProductFromCart() as $key=>$cart)
													@php
													$photos = json_decode($cart->product['photo']);
													@endphp
											<div class="cart-img-ct">
												<div class="cart-img">
													<img src="{{$photos[0]}}" class="img-fluid">
												</div>
												<div class="cart-item-content">
													<h6 class="cart-pd-heading">{{$cart->product['title']}}</h6>
													<h6>Code: HF4328754</h6>
													<p>Size: 36 X 36 in <br>{!!($cart['summary']) !!}</p>
													<h4>${{number_format($cart['price'],2)}}</h4>
													<p class="save-price" data-title="Price">You Save $20.00</p>
												</div>
												<div class="cart-qty">
													<div class="qty-container">
														<button class="qty-btn-minus" type="button" data-type="minus" data-field="quant[{{$key}}]" >
															<i class="fa fa-minus"></i></button>
														<!-- <input type="text" name="qty" value="1" class="input-qty"/> -->
														<input type="text" name="quant[{{$key}}]" class="input-number input-qty"  data-min="1" data-max="100" value="{{$cart->quantity}}">
														<button class="qty-btn-plus" type="button"  data-type="plus" data-field="quant[{{$key}}]"><i class="fa fa-plus"></i></button>
													</div>
													<p>Save for Later</p>
												</div>
											</div>
											@endforeach
									@else
										<tr>
											<td class="text-center">
												There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>
											</td>
										</tr>
									@endif

							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-progress">
						<ul>
							<li><span class="active"><i class="fas fa-check"></i></span><p>Login</p></li>
							<li><span>2</span><p>Submit</p></li>
							<li><span>3</span><p>Submit</p></li>
						</ul>
					</div>
					<div class="payment-card">
						<h4>Payment Details</h4>
						<div class="payment-row">
							<span>MRP Total</span>
							<span>{{number_format(Helper::totalCartPrice(),2)}}</span>
						</div>
						<div class="payment-row">
							<span>Product Discount</span>
							<span class="discount">-$20.00</span>
						</div>
						<div class="payment-row">
							<span>Delivery Fee</span>
							<span>$20.00</span>
						</div>
						@php
							$total_amount=Helper::totalCartPrice();
							if(session()->has('coupon')){
								$total_amount=$total_amount-Session::get('coupon')['value'];
							}
						@endphp
					
						<div class="payment-row total">
							<span>Total</span>
							@if(session()->has('coupon'))
								<span>${{number_format($total_amount,2)}}</span>
							@else
								<span>${{number_format($total_amount,2)}}</span>
							@endif
						</div>
						@if(session()->has('coupon'))
							<div class="savings-text" data-price="{{Session::get('coupon')['value']}}">You Save<<strong>
								${{number_format(Session::get('coupon')['value'],2)}}</strong>
							</div>
						@endif
						<form action="{{ route('checkout') }}" method="GET">
							<button type="submit" class="place-order-btn">Place Order</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
{{-- 
		<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php
											$photo=explode(',',$cart->product['photo']);
											@endphp
											<td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name">
													<a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>
											<td class="price" data-title="Price"><span>${{number_format($cart['price'],2)}}</span></td>
											<td class="qty" data-title="Qty"><!-- Input Order -->
												<div class="input-group">
													<div class="button minus">
														<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$key}}]">
															<i class="ti-minus"></i>
														</button>
													</div>
													<input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
													<div class="button plus">
														<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$key}}]">
															<i class="ti-plus"></i>
														</button>
													</div>
												</div>
												<!--/ End Input Order -->
											</td>
											<td class="total-amount cart_single_price" data-title="Total"><span class="money">${{$cart['amount']}}</span></td>

											<td class="action" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
											<button class="btn float-right" type="submit">Update</button>
										</td>
									</track>
								@else
									<tr>
										<td class="text-center">
											There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>
										</td>
									</tr>
								@endif

							</form>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
									<form action="{{route('coupon-store')}}" method="POST">
											@csrf
											<input name="code" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">`
										@php
											$shipping=DB::table('shippings')->where('status','active')->limit(1)->get();
										@endphp
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox" onchange="showMe('shipping');"> Shipping</label>
									</div> 
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Cart Subtotal<span>${{number_format(Helper::totalCartPrice(),2)}}</span></li>

										@if(session()->has('coupon'))
										<li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">You Save<span>${{number_format(Session::get('coupon')['value'],2)}}</span></li>
										@endif
										@php
											$total_amount=Helper::totalCartPrice();
											if(session()->has('coupon')){
												$total_amount=$total_amount-Session::get('coupon')['value'];
											}
										@endphp
										@if(session()->has('coupon'))
											<li class="last" id="order_total_price">You Pay<span>${{number_format($total_amount,2)}}</span></li>
										@else
											<li class="last" id="order_total_price">You Pay<span>${{number_format($total_amount,2)}}</span></li>
										@endif
									</ul>
									<div class="button5">
										<a href="{{route('checkout')}}" class="btn">Checkout</a>
										<a href="{{route('product-grids')}}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	--}}
	<!-- End Shop Newsletter -->

	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->

@endsection
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
