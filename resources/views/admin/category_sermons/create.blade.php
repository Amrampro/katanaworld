@extends('admin.template')
@section('main')
    @if ($errors->any())
        <div class="alert alert-secondary alert-dismissible">
            <div class="alert-heading">des Erreurs on ete detectes</div>
            @foreach ($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    <div class="container border p-2">
        <div class="row">
            <h1>Creation d'une nouvelle catégorie</h1>
            <form action="{{ route('admin.sermonCategories.store') }}" class="col-12" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control">
                </div>
              
                <div class="mb-4">
                    <label for="titre">Description Categorie</label>
                    <textarea name="description" class="form-control border p-2"></textarea>
                </div>
                <input type="hidden" name="cropdata" value="" id="inputHide">
                <div>
                    <button type="reset" class="btn btn-danger">Reinitialiser</button>
                    <button type="submit" class="btn btn-success">Creer</button>
                </div>
            </form>
    
        </div>
    </div>
@endsection

@push('scripts')
  
@endpush


