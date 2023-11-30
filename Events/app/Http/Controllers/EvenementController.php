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
            "image_mise_en_avant"=> "required|image|max:5000",
        ]);
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $evenement = Evenement::all();
        $user = Auth::user()->id;
        return view("events.liste", compact("evenement", "user"));
    }

    public function showFront()
    {
        $evenement = Evenement::all();
        return view("welcome", compact("evenement"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement, $id)
    {
        $evenement = Evenement::find($id);
        return view("events.modifier", compact("evenement"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evenement = Evenement::find( $id );
        $evenement->destroy($id);
        if ($evenement->save()) {
            return back()->with("destroy","vous avez supprimer cette événement");
        }
    }
}
