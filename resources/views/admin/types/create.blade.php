@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Crea una nuova tipologia</h2>

    <div class="container w-50 mt-5">
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <button type="submit" class="btn btn-success">Crea</button>
        </form>
    </div>
@endsection
