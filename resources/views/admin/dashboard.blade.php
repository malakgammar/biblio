@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Bienvenue dans l'Espace Administrateur</h2>

    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.users.index') }}" class="card card-body shadow text-decoration-none text-dark hover-shadow">
                <h5 class="mb-0">Gestion des utilisateurs</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.livres.index') }}" class="card card-body shadow text-decoration-none text-dark hover-shadow">
                <h5 class="mb-0">Gestion des livres</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.categories.index') }}" class="card card-body shadow text-decoration-none text-dark hover-shadow">
                <h5 class="mb-0">Gestion des catégories</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.reservations.manage') }}" class="card card-body shadow text-decoration-none text-dark hover-shadow">
                <h5 class="mb-0">Gérer les réservations</h5>
            </a>
        </div>
    </div>
</div>

<style>
    .hover-shadow:hover {
        background-color: #f8f9fa;
        transition: 0.3s ease;
    }
</style>
@endsection
