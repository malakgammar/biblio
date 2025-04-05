@extends('layouts.app')

@section('content')
    <h1>Modifier le Livre</h1>
    <form action="{{ route('livres.update', $livre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomlivre">Nom du Livre</label>
            <input type="text" name="nomlivre" class="form-control" value="{{ $livre->nomlivre }}" required>
        </div>
        <div class="form-group">
            <label for="nomauteur">Auteur</label>
            <input type="text" name="nomauteur" class="form-control" value="{{ $livre->nomauteur }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $livre->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_pub">Date de Publication</label>
            <input type="date" name="date_pub" class="form-control" value="{{ $livre->date_pub }}" required>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label> 
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $livre->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nomcategorie }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image du Livre</label>
            @if($livre->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->nomlivre }}" style="max-width:150px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
@endsection
