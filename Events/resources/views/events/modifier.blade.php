@extends('dashboard')
@section('contenue')
<legend>
    Modifier l'événement    
</legend>
@if (session()->has('success'))
<div class="alert alert-dismissible alert-primary">
    <strong>
        {{ session()->get('success') }}
    </strong>
</div>
@endif
    <form action="{{route('edit', [$evenement->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
            <fieldset >
                <div class="form-group">
                    <label for="disabledTextInput">Libellé </label>
                    <input name="libelle" type="text" id="disabledTextInput" class="form-control" value="{{$evenement->libelle}}">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">Description de l'événement</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$evenement->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date </label>
                    <input name="date_evenement" type="date" id="disabledTextInput" class="form-control" placeholder=" date de l'événement" value="{{$evenement->date_evenement}}">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date limite d'inscription </label>
                    <input name="date_limite_inscription" type="date" id="disabledTextInput" class="form-control" placeholder=" date de limite inscription" value="{{$evenement->date_limite_inscription}}">
                </div>

                {{-- l'ancien image --}}
                <div class="mb-3">
                    <label class="form-label mt-3">Image actuelle</label>
                    <img src="{{ asset('storage/' . $evenement->image_mise_en_avant) }}" alt="Current Image"
                        class="img-thumbnail" style="max-width: 100px;">
                </div>

                <div class="form-group">
                    <label for="disabledTextInput">Nouvelle image</label>
                    <input name="image_mise_en_avant" type="file" id="disabledTextInput" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cloture">Cloture</label>
                    <select name="cloture" id="cloture" class="form-control" value="{{$evenement->cloture}}">
                        <option value="oui">OUI</option>
                        <option value="non">NON</option>
                    </select>
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </fieldset>
        </div>
        </div>
    </form>
@endsection
