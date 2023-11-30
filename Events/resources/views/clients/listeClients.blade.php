@extends('dashboard')
@section('contenue')
<div class="col-12 m-4 p-4 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id_reservation</th>
                <th scope="col">Cleints</th>
                <th scope="col">Evenement</th>
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
<td>{{ $reservation->est_accepter_ou_pas }}</td>
<td>
<form action="{{ route('update', [$reservation->id]) }}" method="POST">
    {{-- @method('update') --}}
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i> Refuser
</form>
</td>
</tr>
@endforeach
@endsection