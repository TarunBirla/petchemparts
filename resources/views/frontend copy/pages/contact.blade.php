@extends('frontend.layouts.master')
@section('main-content')
<style>
h2, h3 {
  text-align: center;
  margin-top: 20px;
}

.contact-section {
  padding: 40px 20px;
}

.contact-container {
  display: flex;
  flex-wrap: wrap;
  max-width: 1100px;
  margin: 0 auto;
  gap: 20px;
  justify-content: center;
}

.map {
  flex: 1;
  min-width: 300px;
}

.contact-info {
  flex: 1;
  min-width: 300px;
}

.contact-info p {
  margin: 10px 0;
}

.social-icons {
  margin-top: 10px;
}

.social-icons a {
  display: inline-block;
  margin-right: 10px;
}

.social-icons img {
  width: 20px;
  height: 20px;
}

.form-section {
  background: #f5f5f5;
  padding: 50px 20px;
}

.form-container {
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}

.form-group {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.form-group input {
  flex: 1;
  padding: 10px;
  font-size: 16px;
}

textarea {
  width: 100%;
  height: 150px;
  padding: 10px;
  font-size: 16px;
  resize: vertical;
}

button {
  margin-top: 20px;
  padding: 10px 30px;
  background: #000;
  color: #fff;
  border: none;
  cursor: pointer;
}

button:hover {
  background: #333;
}
</style>

	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	 <section class="contact-section">
  <h2>Contact Us</h2>

  <div class="contact-container">
    <div class="map">
      <iframe src="https://www.google.com/maps?q=London,UK&output=embed" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="contact-info">
      <h3>Visit Our Store</h3>
      <p><strong>Address:</strong><br>86 Mott St, New York, New York, Zip Code: 10008, AS</p>
      <p><strong>Phone:</strong><br>(623) 934-2400</p>
      <p><strong>Email:</strong><br>ECcomputer@example.com</p>
      <p><strong>Open Time:</strong><br>Our store has re-opened for shopping, exchange every day 11am to 7pm</p>
      <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
      </div>
    </div>
  </div>
</section>

<section class="form-section">
  <div class="form-container">
    <h3>Get in Touch</h3>
    <p>If you've got great products you're making or looking to work with us then drop us a line.</p>
    
    <form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
        @csrf   
       <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Your Subject">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Your Email Address">
        </div>
		<div class="form-group">
            <input type="number" class="form-control" name="phone" placeholder="Your Contact number">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Message"></textarea>
        </div>
       <div class="col-lg-6 right-btn">
			<button type="submit" class="theme-btn">Send Message</button>
        </div>
    </form>
  </div>
</section>
	<!-- Start Contact -->
	<!-- <section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									@php
										$settings=DB::table('settings')->get();
									@endphp
									<h4>Get in touch</h4>
									<h3>Write us a message @auth @else<span style="font-size:12px;" class="text-danger">[You need to login first]</span>@endauth</h3>
								</div>
								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input name="name" id="name" type="text" placeholder="Enter your name">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Subjects<span>*</span></label>
												<input name="subject" type="text" id="subject" placeholder="Enter Subject">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="email" type="email" id="email" placeholder="Enter email address">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input id="phone" name="phone" type="number" placeholder="Enter your phone">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>your message<span>*</span></label>
												<textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section> -->
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<!-- <div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.857353934944!2d85.36529494999999!3d27.6952226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sne!2snp!4v1595323330171!5m2!1sne!2snp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div> -->
	<!--/ End Map Section -->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">Thank you!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">Your message is successfully sent...</p>
			</div>
		  </div>
		</div>
	</div>
	
	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">Sorry!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">Something went wrong.</p>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush