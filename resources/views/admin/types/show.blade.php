@extends('layouts.admin')

@section('content')
    
    <h2 class="text-center mt-3">Dettagli di: {{ $type->name }}</h2>

    <h6>ID: {{ $type->id }}</h6>
    <h6>Slug: {{ $type->slug }}</h6>
@endsection