<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Biblio</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reservations.index') }}">Mes Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</body>
</html>
