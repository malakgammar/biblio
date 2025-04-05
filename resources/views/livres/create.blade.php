@extends('layouts.app')

@section('content')
    <h1>Ajouter un Livre</h1>
    <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nomlivre">Nom du Livre</label>
            <input type="text" name="nomlivre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nomauteur">Auteur</label>
            <input type="text" name="nomauteur" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date_pub">Date de Publication</label>
            <input type="date" name="date_pub" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image du Livre</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
