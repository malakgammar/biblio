@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une catégorie</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomcategorie">Nom de la catégorie</label>
                <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description (optionnel)</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
        </form>
    </div>
@endsection
