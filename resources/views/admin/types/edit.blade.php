@extends('layouts.admin')

@section('content')
    <h2>Modifica la tipologia</h2>

    <form action="{{ route('admin.types.update', ['type' => $type->slug]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
        </div>

        <button type="submit" class="btn btn-warning">Modifica</button>
    </form>
@endsection