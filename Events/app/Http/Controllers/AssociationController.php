<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("associations.formulaire");
    }
    public function login()
    {
        return view("associations.connexion");
    }
    public function dashboard()
    {
        return view("associations.dashboardAssociation");
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
            "nom"=> "required",
            "slogan"=> "required",
            "date_creation"=> "required",
            "logo"=> "required",
            "mot_de_passe"=> "required",
            "email"=> "required",
        ]);
        $association = new Association();
        $association->nom = $request->nom;
        $association->email = $request->email;
        $association->logo = $this->storeImage($request->file("logo"));
        $association->mot_de_passe = $request->mot_de_passe;
        $association->slogan = $request->slogan;
        $association->date_creation = $request->date_creation;
        $association->save();
        // dd($association);
        return redirect("")->with("success","Vôtre inscription a réussi");
    }
    private function storeImage($image)
    {
        return $image->store('avatars', 'public');
    }

    /**
     * Display the specified resource.
     */
    public function show(Association $association, $id)
    {
        // $association = Association::find($id);
        // return view('/dashboard', compact('association'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
