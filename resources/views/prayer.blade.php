@extends('template')

@section('content')
    <section class="ftco-section ftco-degree-bg"
        style="background-image:url({{ asset('images/background/breakchains.jpg') }});background-size:cover;background-position:center center;background-attachment:fixed">
        <div class="container bg-light p-5">
            <div class="row d-flex mb-2 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">{{ __('Prayer request form') }} </h2>
                </div>
            </div>
            <div class="row block-9 justify-content-center">
                <div class="col-md-10 pr-md-5">
                    <form action="{{ route('prayer/store') }}" method="POST" id="form_id">
                        @csrf
                        @if (session()->has('success'))
                            <div id="success" class="alert alert-success" role="alert">
                                {{ __('Prayer request submitted successfully. Our prayer team is standing before God on your behalf. #KATANA_WORLD') }}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="{{ __('Your Name') }}*" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="email" class="form-control"
                                    placeholder="{{ __('Your Email') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="adress" class="form-control" placeholder="{{ __('Adress') }}(ou {{ __('Country')}})">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="tel" name="tel" type="number" class="form-control" placeholder="Tel">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="topic" id="prayer" cols="30" rows="7" class="form-control"
                                placeholder="{{ __('Prayer topics') }}*" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{ __('Submit Prayer') }}"
                                class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('home-section')
    {{-- @include('_partials.home-section',['hs_url' => __('contact'),'hs_name' => __('page contact')]) --}}
@endsection
