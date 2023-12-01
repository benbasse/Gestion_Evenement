
<legend>
    Ajouter Un Événement    
</legend>
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
