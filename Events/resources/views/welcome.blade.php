<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Events</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04"
                aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse my-2 my-sm-0" id="navbarColor04">
                @auth('client')
                    <form method="post" action="{{ route('client.logout') }}">
                        @csrf
                        <button class="btn btn-primary " type="submit">Déconnexion</button>
                    </form>
                @endauth
                @guest('client')
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('connexion') }}">Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscription') }}">S'inscrire</a>
                        </li>
                    </ul>
                    {{-- Association --}}
                    <form class="d-flex">
                        @if (Route::has('login'))
                            @auth
                                {{-- <a href="{{ url('/dashboard') }}" --}}
                                <a href="#"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                <input class="form-control me-sm-2" type="search" placeholder="Search">
                            @else
                                {{-- <a href="{{ route('login') }}" class="btn btn-dark"> Connexion</a> --}}
                                <a href="{{ route('login') }}" class="btn btn-secondary my-2 my-sm-0" type="submit">Se
                                    connecter</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"class="btn btn-secondary my-2 my-sm-0"
                                        type="submit">Register</a>
                                @endif
                            @endauth
                        @endif
                    </form>
                @endguest
            </div>
        </div>
        </div>
    </nav>
</head>

<body>
    <div class="row m-1">
        @foreach ($evenement as $evenement)
            <div class="col-md-4 mb-6 p-2">
                <div class="card">
                    <img src="{{ asset('storage/' . $evenement->image_mise_en_avant) }}" alt="bien-avatar"
                                style="max-width: 600px; max-height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $evenement->id }}</h5>
                        <p class="card-text">{{ $evenement->description }}
                            Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                            <form method="POST" action="{{ route('reserver', ['evenement_id' => $evenement->id]) }}">
                                @csrf
                                <button class="btn btn-primary" type="submit">Réserver</button>
                            </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
