@extends('layouts.admin')

@section('content')
    <div class="mt-5 ms-3">
        <a href="{{ url()->previous() }}"> &leftarrow; Torna indietro</a>
    </div>

    <h2 class="text-center mt-5">Crea un nuovo portfolio</h2>

    <div class="container w-50 my-5">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}">

                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description') }}</textarea>

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">Seleziona una tipologia</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Scegli l'immagine</label>
                <input id="image" type="file" class="form-control" name="cover_image">
                @error('cover_image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Crea</button>
        </form>
    </div>
@endsection
