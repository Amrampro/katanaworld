@extends('template')

@section('content')
    <section id="home" class="video-hero js-fullheight"
        style="height:400px;background:url({{ asset('images/bible/bible5.jpg') }});background-size:cover;background-position:center center;background-attachment:fixed"
        data-section="home">
        <div class="overlay js-fullheight"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <?php
                    $lang = LaravelLocalization::getCurrentLocale();
                    $langup = strtoupper($lang);
                    ?>
                    <h1 style="font-size: 20px" class="mb-2"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <span class="text-white">{{ __('It’s not illegal yet, but they’re working on it') }}</span>
                    </h1>
                    <h1 style="font-size: 50px" class="mb-3 text-capitalize mt-0 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        {{ __('Distribute a free Bible today') }}
                    </h1>
                    <span>Version :
                        <select class="select_b_v" name="" id="">
                            <option value="{{ $lang }}/KJV">King James v{{ $langup }}</option>
                        </select>
                        <a href="{{ asset('upload/free_bible/' . $lang . '/kjv.pdf') }}" download="kjv{{ $langup }}"
                            class="kt-button text_upper">{{ __('Download PDF') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('home-section')
    {{-- @include('_partials.home-section', ['hs_url' => __('sermons'), 'hs_name' => 'page sermon']) --}}
    {{-- @include('_partials.sermon-section', ['hs_url' => __('sermons'), 'hs_name' => 'page sermon']) --}}
@endsection
{{-- @section('footer')
@endsection --}}
