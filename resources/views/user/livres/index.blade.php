@extends('layouts.app') 

@section('content') 
    <h1>Liste des Livres</h1> 

    <!-- Formulaire de recherche -->
    <form action="{{ route('livres.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un livre" aria-label="Rechercher un livre">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
        </div>
    </form>

    <table class="table"> 
        <thead> 
            <tr> 
                <th>Image</th> 
                <th>Titre</th> 
                <th>Auteur</th> 
                <th>Description</th>
                <th>Date de Publication</th> 
                <th>Actions</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($livres as $livre) 
                <tr> 
                    <td><img src="{{ asset($livre->image) }}" alt="Image de {{ $livre->nomlivre }}" style="width: 100px; height: auto;"></td> 
                    <td>{{ $livre->nomlivre }}</td> 
                    <td>{{ $livre->nomauteur }}</td> 
                    <td>{{ $livre->description }}</td> 
                    <td>{{ $livre->date_pub }}</td> 
                    <td> 
                        <a href="{{ route('livres.show', $livre) }}" class="btn btn-info">Voir</a> 
                        </form> 
                    </td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
@endsection