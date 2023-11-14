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
    <h1 class="text-center">Les Categories</h1>
    <div class="float-right mb-3 border p-2 btn-link btn btn-light">
        <a href="{{ route('admin.sermonCategories.create') }}">Ajouter une Catégorie</a>
    </div>
    <div class="table-responsive mb-1">
        <table class="table  table-bordered">
            <caption>Listes des Catégories Enregistres</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                  <th>Description</th>

                    <th>Cree le </th>
             
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorySermons as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td> {{ $item->titre }} </td>
                    
                        <td>{{ Str::words($item->description??"Non definie",2) }}</td>
                        <td> {{ $item->created_at->isoFormat("LL") }} </td>
                    
                        <td>
                            <div class="btn-group">
                                <form method="POST"
                                    action="{{ route('admin.sermonCategories.destroy', ['sermonCategory' => $item->id]) }}"
                                    class="menu-icon">
                                    @csrf
                                    @method('delete')
                                    <button class="mdi mdi-delete mdi-30px btn btn-outline-warning" type="submit"> </button>
                                </form>
                                &nbsp;
                                <a href="{{ route('admin.sermonCategories.edit', ['sermonCategory' => $item->id]) }}"
                                    class="btn btn-outline-info"><i class="mdi mdi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
@endpush
@push('scripts')

    @if (session()->has('messages.info'))
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "rtl": false,
                "positionClass": "toast-top-full-width",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["info"](`{{ session("messages.info")  }}`,"Information")
        </script>
    @endif

@endpush
