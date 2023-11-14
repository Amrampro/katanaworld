@extends('template')

@section('content')
    {{--    @includeIf("_partials.upcoming-event") --}}

    <section class="ftco-section" id="content">
        <div class="m-4 border p-2">
            <p>Categories:</p>
            <div class="" role="group" aria-label="Basic outlined example">
                <a href="{{ route('sermons.index') }}" type="button"
                    class="btn {{ $currentCat == null ? 'active' : '' }} btn-outline-primary">Tous</a>
                @foreach ($categories as $item)
                    <a href="{{ route('sermons.index', ['category' => $item->titre]) }}" type="button"
                        class="btn {{ $currentCat == $item->titre ? 'active' : '' }} btn-outline-primary">{{ $item->titre }}</a>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($sermons as $sermon)
                    <x-sermon-element :link="route('sermons.show', ['sermon' => $sermon->id])" :title="$sermon->titre" :pastor="$sermon->author" :description="Str::words($sermon->description, 5)"
                        :poster="asset($sermon->poster_url)" />
                @empty
                    <div class="col-12 alert alert-warning">
                        Aucune vide pour cette categorie
                    </div>
                @endforelse

            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{-- <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul> --}}
                        {{ $sermons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('home-section')
    {{-- @include('_partials.home-section', ['hs_url' => __('sermons'), 'hs_name' => 'page sermon']) --}}
    @include('_partials.sermon-section', ['hs_url' => __('sermons'), 'hs_name' => 'page sermon'])
@endsection
@section('footer')
@endsection
