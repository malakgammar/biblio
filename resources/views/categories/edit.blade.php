@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST">


            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="nomcategorie">Nom de la catégorie</label>
                <input type="text" name="nomcategorie" class="form-control" value="{{ $category->nomcategorie }}" required>
            </div>
        
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $category->description }}</textarea>
            </div>
        
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection









