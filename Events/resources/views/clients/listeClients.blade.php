@extends('dashboard')
@section('contenue')
<div class="col-12 m-4 p-4 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cleints</th>
                <th scope="col">Evenement</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
@foreach ($reservation as $reservation)
<td>{{ $reservation->client_id }}</td>
<td>{{ $reservation->evenement_id }}</td>
<td>{{ $reservation->est_accepter_ou_pas }}</td>
    
Ici on aura la liste des clients qui ont fais des reservation
@endforeach
@endsection