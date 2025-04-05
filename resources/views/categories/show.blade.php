@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $categorie->nomcategorie }}</h1>
        <p><strong>Description :</strong> {{ $categorie->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection
