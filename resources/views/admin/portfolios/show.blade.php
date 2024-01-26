@extends('layouts.admin')

@section('content')
    <div class="mt-5 ms-3">
        <a href="{{ url()->previous() }}"> &leftarrow; Torna indietro</a>
    </div>

    <h2 class="text-center mt-5">Dettagli di:</h2>
    <h4 class="text-center mt-1">{{ $portfolio->title }}</h4>

    <div class="container mt-4">



        <h6>Descrizione: </h6>
        <p>
            {{ $portfolio->description }}
        </p>

        <h6 class="mt-4">Data di creazione: </h6>
        {{ $portfolio->created_at }}

        <h6 class="mt-4">Slug: </h6>
        {{ $portfolio->slug }}
    </div>


    <div class="mx-2 mt-3 d-flex">
        <a class="btn btn-warning me-2" href="{{ route('admin.portfolios.edit', ['portfolio' => $portfolio->slug]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <form action="{{ route('admin.portfolios.destroy', ['portfolio' => $portfolio->slug]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
@endsection
