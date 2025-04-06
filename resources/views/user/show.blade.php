@extends('layouts.app')

@section('content')
    <h1>{{ $livre->titre }}</h1>
    <p><strong>Auteur :</strong> {{ $livre->nomauteur }}</p>
    <p><strong>Description :</strong> {{ $livre->description }}</p>
    <p><strong>Date de Publication :</strong> {{ $livre->date_pub }}</p>
    <a href="{{ route('livres.index') }}" class="btn btn-secondary">Retour à la liste</a>

    @if($livre->estDisponible() && auth()->check())
    <a href="{{ route('reservations.create', $livre) }}" class="btn btn-primary">Réserver ce livre</a>
@else
    <button class="btn btn-secondary" disabled>Non disponible</button>
@endif
@endsection
