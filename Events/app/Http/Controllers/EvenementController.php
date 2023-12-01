<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("events.ajouter");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'libelle'=>'required|string|min:3',
            'date_limite_inscription'=>'required|date',
            'description'=>'required|string|min:10',
            "image_mise_en_avant"=> "required|image|max:10000",
            'cloture'=>'required',
            'date_evenement'=>'required|date',
        ],
        [
            'libelle'=>'Le libelle ne doit contenir que des lettres',
            'date_limite_inscription'=>'La date limite des inscription ne doit pas être null',
            'description'=>'La description ne doit pas être inférieur à 10 lettres',
            'image_mise_en_avant'=>'L\'image ne doit pas être supérieur à 10 Mo',
            'cloture'=>'Le libelle ne doit pas être null',
            'date_evenement'=>'La date del\'événement ne peut pas être null'
        ]
    );
        $evenement = new Evenement();
        $evenement->user_id = Auth::user()->id;
        $evenement->libelle = $request->get("libelle");
        $evenement->date_limite_inscription = $request->get("date_limite_inscription");
        $evenement->description = $request->get("description");
        $evenement->image_mise_en_avant = $this->storeImage($request->image_mise_en_avant);
        $evenement->cloture = $request->get("cloture");
        $evenement->date_evenement = $request->get("date_evenement");
        $evenement->save();
        return back()->with("success", "Vous avez ajouter un événement");
    }
    private function storeImage($image)
    {
        return $image->store("evenement", "public");
    }
    public function show()
    {
        $evenement = Evenement::all();
        $user = Auth::user()->id;
        // $evenement = Evenement::find([
        //     'user_id' => Auth::user()->id,
        // ]);
        // Je dois gerer aussi au niveau de la liste des clients je dois lister seulement les clients et l'événement que seulement le user connecter à publier et aussi pour les liste aussi
        return view("events.liste", compact("evenement", "user"));
    }

    public function showFront()
    {
        $evenement = Evenement::all();
        return view("welcome", compact("evenement"));
    }
    public function edit(Evenement $evenement, $id)
    {
        $evenement = Evenement::find($id);
        return view("events.modifier", compact("evenement"));
    }
    public function update(Request $request,  $id)
    {
        $request->validate([
            'libelle'=>'required|string|min:3',
            'date_limite_inscription'=>'required|date',
            'description'=>'required|string|min:10',
            // "image_mise_en_avant"=> "required|image|max:10000",
            'cloture'=>'required',
            'date_evenement'=>'required|date',
        ],
        [
            'libelle'=>'Le libelle ne doit contenir que des lettres',
            'date_limite_inscription'=>'La date limite des inscription ne doit pas être null',
            'description'=>'La description ne doit pas être inférieur à 10 lettres',
            'image_mise_en_avant'=>'L\'image ne doit pas être supérieur à 10 Mo',
            'cloture'=>'Le libelle ne doit pas être null',
            'date_evenement'=>'La date del\'événement ne peut pas être null'
        ]);

        $evenement = Evenement::find($id);
        $evenement->libelle = $request->get("libelle");
        $evenement->date_limite_inscription = $request->get("date_limite_inscription");
        $evenement->description = $request->get("description");
        if ($request->hasFile("image_mise_en_avant")) 
        {
            $evenement->image_mise_en_avant = $this->storeImage($request->image_mise_en_avant);
        }
        $evenement->cloture = $request->get("cloture");
        $evenement->date_evenement = $request->get("date_evenement");
        $evenement->save();
        return Redirect::to(route('showEvents'))->with('success', 'vous avez modifier ave success');
    }
    public function destroy($id)
    {
        $evenement = Evenement::find( $id );
        $evenement->destroy($id);
        if ($evenement->save()) {
            return back()->with("destroy","vous avez supprimer cette événement");
        }
    }
}
