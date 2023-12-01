<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Événement</title>

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
                        {{-- <li class="nav-item">
                            <a class="nav-link active" href="{{ route('connexion') }}">Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscription') }}">S'inscrire</a>
                        </li> --}}
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
                                        type="submit">Inscrire</a>
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
    @if (session()->has('success'))
        <div class="alert alert-dismissible alert-primary">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-dismissible alert-success">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="row m-1">
        @foreach ($evenement as $evenement)
            <div class="col-md-4 mb-6 p-2">
                <div class="card">
                    <img src="{{ asset('storage/' . $evenement->image_mise_en_avant) }}" alt="bien-avatar"
                        style="max-width: 600px; max-height: 300px;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $evenement->libelle }}</h5>

                        <p class="card-text">{{ $evenement->description }}</p>

                        <div class="card-footer bg-transparent border-success">
                            Date Événement: {{ $evenement->date_evenement }}
                        </div>

                        <div class="card-footer bg-transparent border-success">
                            Date Limite: {{ $evenement->date_limite_inscription }}
                        </div>

                        <div class="card-footer bg-transparent border-success">
                            Publé par: {{ $evenement->user_id }}
                        </div>

                        <form method="POST" action="{{ route('reserver', ['evenement_id' => $evenement->id]) }}">
                            @csrf
                            <div class="card-footer bg-transparent border-success">

                                <x-text-input id="nombre_place" type="number" name="nombre_place" :value="old('nombre_place')" />

                                <x-input-label for="nombre_place" :value="__('Nombre de place')" />

                                <x-input-error :messages="$errors->get('nombre_place')" class="mt-2" />

                                <button class="btn btn-primary" type="submit">Réserver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
