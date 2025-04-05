@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Catégories</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom de la catégorie</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->nomcategorie }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
