@extends('dashboard')
@section('contenue')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="col-12 m-4 p-4 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">libelle</th>
                <th scope="col">Description</th>
                <th scope="col">D. limite</th>
                <th scope="col">événement</th>
                <th scope="col">Cloture</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenement as $evenement)
                
            <tr>
            <td>{{$evenement->id}}</td>
                <td>
                    <img src="{{ asset('storage/' . $evenement->image_mise_en_avant) }}"
                alt="bien-avatar" style="max-width: 50px; max-height: 100px;">
                </td>
                <td>{{$evenement->libelle}}</td>
                <td>{{$evenement->description}}</td>
                <td>{{$evenement->date_limite_inscription}}</td>
                <td>{{$evenement->date_evenement}}</td>
                <td>{{$evenement->cloture}}</td>
                <td>
                    <form action="{{route('delete', [$evenement->id])}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                        {{-- <a href="#" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection