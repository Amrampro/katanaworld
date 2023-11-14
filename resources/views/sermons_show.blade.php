@extends('template')

@push('stylesheets')
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet">
    <style>
        body {
            background: #0F0F0F !important
        }

        .btn-player {
            display: inline-block;
            position: relative;
        }

        .btn-player[data-current='true'] {
            color: #0b0b0b;
            place-content: end;
            content: "en cours";
            /*visibility: hidden;*/
        }

        .btn-player[data-current='true']::after {
            content: 'En cours de lecture....';
            overflow-x: hidden;
            position: absolute;
            top: 0;
            text-wrap: normal;
            right: 0;
            width: 100%;
            height: 100%;
            margin: 0;

            background-color: #00a045;
            color: #0b0b0b;

        }

        #ftco-navbar {
            background: #000;
        }

        .twhite {
            color: #fff;
        }

        .card {
            background: none;
            box-shadow: 0;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        #videoPlayer {
            box-shadow: 0px 0px 50px 20px rgba(255, 255, 255, .1);
        }

        .els{
            width: 100%;
        }

        .els li {
            display: inline-block;
            /* height: auto; */
        }
        .els li span{
            color: #007CC4;
        }

        .els:hover{
            background: rgba(255, 255, 255, .1);
        }
        .els.active{
            background: rgba(12, 76, 125, .1);
        }
    </style>
@endpush
@section('content')
    <br><br>
    <section class="ftco-animate mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    <div class="">
                        {{-- <div class="card-header">
                            <h3 class="twhite" id="titre-video">Titre: {{ $sermon->titre }}</h3>
                        </div> --}}
                        <div class="card-body">
                            <iframe id="videoPlayer" style="object-fit: cover;" width="100%" height="400"
                                src="{{ $sermon->custom_link }}" title="{{ $sermon->titre }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="twhite card-footer">
                            <h4 class="twhite" id="titre-video">Titre: {{ $sermon->titre }}</h4>
                            <span id="author-video" class="position">Par: <b>{{ $sermon->author }}</b></span>
                            <p id="description-video">Description: <br>
                                {{ $sermon->description }}.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="twhite">Autres vidéos</h3>
                    @foreach ($other as $item)
                        {{-- <div class="mb-3 d-flex align-items-center justify-content-around p-2 bg-warning" style="width: 100%;">
                            <img src="{{ asset('storage/' . $item->poster_url) }}" class="" alt="{{ $item->titre }}"
                                height="80" width="80" max-width="200">
                            &nbsp;
                            <h6 class="twhite">{{ $item->titre }}</h6> --}}
                        {{-- <span class="badge bg-secondary ml-3">{{ Str::substr($item->titre,0,10) }} ...</span> --}}
                        {{-- <a href="{{route('sermons.show',['sermon'=>$item->id])}}" @if ($item->id == $sermon->id) data-current="true" @endif
                                data-poster="{{ asset('storage/' . $item->poster_url) }}"
                                data-description="{{ $item->description }}" data-author="{{ $item->author }}"
                                data-titre="{{ $item->titre }}" data-video="{{ $item->custom_link }}"
                                class="change-video btn-player rounded-0 btn btn-primary">Suivre</a> 
                        </div> --}}
                        <a href="{{ $item->id == $sermon->id ? '#' : route('sermons.show', ['sermon' => $item->id]) }}">
                            <div class="els mb-3 {{ $item->id == $sermon->id ? 'active' : '' }}">
                                <li style="margin-top: 0px">
                                    <img src="{{ asset($item->poster_url) }}" class=""
                                        alt="{{ $item->titre }}" height="80" width="80" max-width="200">
                                </li>
                                <li style="">
                                    <h6 class="twhite">{{ $item->titre }}</h6>
                                    <span>
                                        @if ($item->id == $sermon->id)
                                            En cours...
                                        @else
                                            Suivre
                                        @endif
                                    </span>
                                </li>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('home-section')
    <div class="my-4"></div>
@endsection

@push('scripts')
    <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".change-video").click(function() {
                //je desactive tout les data-current a true
                $("[data-current]").each(function(index, elt) {
                    $(elt).data("current", false)
                    // elt.removeAttribute("data-current")
                })
                $(this).data("current", true)
                let poster = $(this).data("poster")
                let src = $(this).data("video")
                let titre = $(this).data("titre")
                let desc = $(this).data("description")
                let auteur = $(this).data("author")

                $("#videoPlayer").attr("src", src)
                $("#description-video").text(desc)
                $("#titre-video").text(titre)
                $("#author-video").text(auteur)
            })
        })
    </script>
    <script>
        $('#ftco-navbar').addClass('awake').addClass('scrolled')
        // scroll
        var scrollWindow = function() {
            $(window).scroll(function() {
                $('#ftco-navbar').addClass('awake').addClass('scrolled')
            });
        };
        scrollWindow();
    </script>
@endpush
