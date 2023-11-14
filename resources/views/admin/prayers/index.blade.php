@extends('admin.template')

@section('main')
    <h1 class="text-center">Les Prières</h1>
    <div class="table-responsive mb-1">
        <table class="table  table-bordered">
            <caption>Listes des prayers</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Tel</th>
                    <th>Topic</th>
                    <th>Creation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prayers as $prayer)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td> {{ $prayer->name }} </td>
                        <td>{{ $prayer->email }}</td>
                        <td> {{ $prayer->adress }} </td>
                        <td> {{ $prayer->tel }} </td>
                        <td> {{ $prayer->topic }} </td>
                        <td>{{ $prayer->created_at }} </td>
                        <td>
                            <div class="btn-group">
                                <form method="POST" action="{{ route('admin.prayers.destroy', ['prayer' => $prayer->id]) }}"
                                    class="menu-icon">
                                    @csrf
                                    @method('delete')
                                    <button class="mdi mdi-delete mdi-30px btn btn-outline-warning" type="submit"> </button>
                                </form>
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
    @includeIf('_partials.session_messages')
@endpush
