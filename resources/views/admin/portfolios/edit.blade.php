@extends('layouts.admin')

@section('content')

<div class="mt-5 ms-3">
<a href="{{ url()->previous() }}"> &leftarrow; Torna indietro</a>
</div>
    

    <h2 class="text-center mt-5">Modifica il Portfolio</h2>

    <div class="container w-50">
        <form action="{{ route('admin.portfolios.update', ['portfolio' => $portfolio->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title' ,$portfolio->title) }}">
                
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            
            </div>
            <div class="mb-3 has-validation">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $portfolio->description) }}</textarea>
            
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">Seleziona una tipologia</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $portfolio->type_id) value="{{ $type->id }}">{{ $type->name }}</option>
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

            <button class="btn btn-warning" type="submit">Modifica</button>
        </form>
    </div>

@endsection