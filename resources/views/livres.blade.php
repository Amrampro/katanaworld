@extends('template')

@section('content')
<section id="home" class="video-hero"
   style="height:400px;background-image:url({{asset('images/background/library.jpg')}});background-size:cover;background-position:center center;background-attachment:fixed"
    data-section="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="{{ route('home') }}">Home</a></span>
					<i class="fa text-white fa-chevron-right"></i>
					<span class="d-inline-block ml-2">
                        @if(isset($hs_url))
                            {{$hs_url}}
						@else
							@if (!Route::is('home'))
								@if (Route::is('events.*'))
									Event
								@elseif (Route::is('sermons.*'))
									Sermon
								@elseif(Route::is('livres.*'))
									Livre
								@else
									{{Str::upper(Route::current()->uri) }}
								@endif
							@endif
						@endif

                    </span>
                </p>
                <h1 class="mb-3 text-capitalize mt-0 bread"
                    data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    @if(isset($hs_name))
						{{$hs_name}}
					@else
						@if (Route::is('events.show'))
							Event Details
						@elseif (Route::is('sermons.show'))
							Sermon Details
						@elseif(Route::is('livres.show'))
							Livre Details
						@elseif (Route::is('home'))
							Acceuil
						@else
							{{ Str::upper(Route::current()->uri) }}
						@endif
                    @endif
                </h1>
            </div>
        </div>
    </div>
</section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($livres as $livre)
                    <div class="col-md-4 ftco-animate shadow">
                        <x-livre-element class="border p-2" :poster="asset('storage/' . $livre->poster_url)" :title="$livre->titre" :link="route('livres.index')">
                            <button class="btn btn-primary">voir</button>
                            <a  href="{{route('book.download',['id'=>$livre->id])}}" class="ml-4 border btn download-button" onclick="download" >
                                <span class="icon">
                                    <span class="icon-laptop"></span>
                                </span>
                                Telecharger
                            </a>
                        </x-livre-element>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section("home-section")
@endsection
@push("scripts")
    <script defer>
        const downloadButton = document.querySelecter(".download-button")
        downloadButton.forEach(element => {
            element.onclick = function(event){
                let res = confirm("voulez vous telecharger ?")
                if(!res){
                    event.preventDefault()
                }
            }
        });
        function download(event){
            let response = confirm("voulez vous telecharger le document ? ")
            event.preventDefault();


        }
    </script>

@endpush
