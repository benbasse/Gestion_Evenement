@extends('dashboard')
@section('contenue')
<legend>
    Ajouter Un Événement    
</legend>
@if (session()->has('success'))
<div class="alert alert-dismissible alert-primary">
    <strong>
        {{ session()->get('success') }}
    </strong>
</div>
@endif
    <form action="{{route('ajouter_evenement')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
            <fieldset >
                <div class="form-group">
                    <label for="disabledTextInput">Libellé </label>
                    <input name="libelle" type="text" id="disabledTextInput" class="form-control" placeholder=" Libellé de l'événement">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">Description de l'événement</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date </label>
                    <input name="date_evenement" type="date" id="disabledTextInput" class="form-control" placeholder=" date de l'événement">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date limite d'inscription </label>
                    <input name="date_limite_inscription" type="date" id="disabledTextInput" class="form-control" placeholder=" date de limite inscription">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Image mise en avant</label>
                    <input name="image_mise_en_avant" type="file" id="disabledTextInput" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cloture">Cloture</label>
                    <select name="cloture" id="cloture" class="form-control">
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
