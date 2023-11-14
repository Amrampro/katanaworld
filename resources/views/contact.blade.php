@extends('template')

@section('content')

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container bg-light">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information  </h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><span>Address:</span>Yaounde ,Awae</p>
                </div>
                <div class="col-md-3">
                    <p><span>Phone:</span> <a href="tel:+237696896758">+237 696 896 758</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Email:</span> <a><span>gouliben@gmail.com</span></a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Website</span> <a href="#">katanaworld.org</a></p>
                </div>
            </div>
            <div class="row block-9 justify-content-center">
                <div class="col-md-10 pr-md-5">
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
            </div>
        </div>
    </section>
@endsection

@section('home-section')
	@include('_partials.home-section',['hs_url' => __('contact'),'hs_name' => __('page contact')])
@endsection