@extends("template")
@push("scripts")
	<!-- jsdelivr -->
<script src="https://cdn.jsdelivr.net/npm/artplayer/dist/artplayer.js"></script>

@endpush
@section("content")
	<section class="ftco-section ftco-section-3">
		<div class="container bg-light">
			<div class="row d-flex mb-5 contact-info">
				<div class="col-md-12 mb-4">
					<h2 class="h4">About Us  </h2>
				</div>
				<div class="w-100"></div>
				<div class="col-md-3">
					<p><span>Address:</span>Yaounde ,Awae</p>
				</div>
				<div class="col-md-3">
					<p><span>Phone:</span> <a href="tel://1234567920">+ 237 69956 8073</a></p>
				</div>
				<div class="col-md-3">
					<p><span>Email:</span> <a><span>lucchuala@gmail.com</span></a></p>
				</div>
				<div class="col-md-3">
					<p><span>Website</span> <a href="#">katana.com</a></p>
				</div>
			</div>
			<div class="row block-9">
				<div class="col-md-6 pr-md-5">
					<form action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>
				</div>
				<div class="col-md-6" id="map"></div>
			</div>
		</div>
	</section>
@endsection

@section("home-section")
    @include("_partials.home-section",['hs_name' => __("about page"),'hs_url' => __('about')])
@endsection
