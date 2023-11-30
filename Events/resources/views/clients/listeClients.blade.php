@extends('dashboard')
@section('contenue')
    <div class="col-12 m-4 p-4 ">
        <table class="table">
            <thead class="thead-dark">                
                <tr>
                    <th scope="col">Id_reservation</th>
                    <th scope="col">Cleints</th>
                    <th scope="col">Evenement</th>
                    <th scope="col">Place Réserver</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservation as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->client->nom }}</td>
                        <td>{{ $reservation->evenement->libelle }}</td>
                        <td>{{ $reservation->nombre_place }}</td>
                        <td>{{ $reservation->est_accepter_ou_pas ? 'Accepter' : 'Refuser' }}</td>
                        <td>
                            <form action="{{ route('update', [$reservation->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Refuser
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                @if (session()->has('update'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('update')}}
                </div>
                @endif
            @endsection
