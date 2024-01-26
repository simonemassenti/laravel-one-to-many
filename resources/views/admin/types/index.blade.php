@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Lista delle Tipologie</h2>

    @if (session('message'))
        <div class="alert alert-warning w-50 mx-auto">
            {{ session('message') }}
        </div>
    @endif

    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.types.create') }}">Crea una nuova tipologia</a>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th>{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary" href="{{ route('admin.types.show', ['type' => $type->slug])}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning mx-2" href="{{ route('admin.types.edit', ['type' => $type->slug])}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}" method="POSt">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
