<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibliothèque</title>
    <!-- Ajouter le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter d'autres fichiers CSS ici -->
</head>
<body>

    <!-- Navbar de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Lien vers l'accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                    </li>
                    <!-- Lien vers les livres -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livres.index') }}">Livres</a>
                    </li>

                    <!-- Lien vers les réservations -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservations.index') }}">Réservations</a>
                        </li>
                    @endauth

                    <!-- Si l'utilisateur est connecté -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Profil</a>
                        </li>
                        <!-- Lien de déconnexion -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="border: none; background: none;">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <!-- Lien de connexion et d'inscription -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                        </li>
                    @endauth

                    <!-- Lien vers l'espace administrateur si l'utilisateur est un admin -->
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Ajouter les scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ajouter d'autres fichiers JS ici -->
</body>
</html>
