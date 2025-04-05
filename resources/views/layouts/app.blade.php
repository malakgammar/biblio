<!DOCTYPE html> 
<html lang="fr"> 
<head> 
<meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>LecturaMundo
    </title> 
    <!-- Bootstrap CSS --> 
    <link 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
 " rel="stylesheet"> 
    <!-- Styles personnalisés --> 
    <style> 
        body { 
            padding-top: 56px; /* Pour la navbar fixe */ 
        } 
        .navbar { 
            margin-bottom: 20px; 
        } 
    </style> 
</head> 
<body> 
    <!-- Barre de navigation --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> 
        <a class="navbar-brand" href="{{ url('/') }}">LecturaMundo
        </a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria
label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarNav"> 
            <ul class="navbar-nav ml-auto"> 
                @auth 
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('categories.index') 
                        }}">Categorie</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('livres.index') 
}}">Livres</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('reservations.index') 
                        }}">reservations</a> 
                    </li> 
                    <!-- <li class="nav-item"> 
                        <a class="nav-link" href="#">Tableau</a> 
                    </li>  -->
                    <li class="nav-item"> 
                        <form action="{{ route('logout') }}" method="POST" 
class="d-inline"> 
                            @csrf 
                            <button type="submit" class="btn btn-link nav
link">Déconnexion</button> 
                        </form> 
                    </li> 
                @else 
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('login') 
}}">Connexion</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('register') 
}}">Inscription</a> 
                    </li> 
                @endauth 
            </ul> 
        </div> 
    </nav> 
 
    <!-- Contenu principal --> 
    <div class="container"> 
        @yield('content') 
    </div> 
 
    <!-- Bootstrap JS et dépendances --> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script 
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
 ></script> 
    <script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><
 /script> 
</body> 
</html> 