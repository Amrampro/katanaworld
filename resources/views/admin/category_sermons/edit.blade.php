@extends('admin.template')

@section('main')
    <h4 class="text-center">Editions des Categories de sermons</h4>
    <div class="row">
        <form class="col-12" action="{{ route('admin.sermonCategories.update', [$categorySermon->id]) }}" method="post"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('put')
            <div class="my-2">
                <div class="mb-4">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" value="{{ $categorySermon->titre }}" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="titre">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ $categorySermon->description }}
                    </textarea>
                </div>
             

                <input type="hidden" value="" name="cropdata" id="inputHide">

                <div>
                    <button type="reset" class="btn btn-danger">Reinitialiser</button>
                    <button id="submit" type="submit" class="btn btn-outline-success">Editer
                    </button>
                </div>
            </div>
        </form>
 
    </div>
@endsection


@push('scripts')

@endpush
