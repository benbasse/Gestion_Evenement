<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("clients.form");
    }
    public function connexion()
    {
        $evenement = Evenement::all();
        return view("clients.connexion", compact("evenement"));
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
        //Les validations des donnés 
        $request->validate(
            [
                'nom'=>'required|string|min:3',
                'prenom'=>'required|string|min:3',
                'email'=>'required|string',
                'mot_de_passe'=>'required|min:8',
                'telephone'=>'required|integer',
            ],[
                'nom'=>'Le nom doit supérieur à 3 et doit être composé par des lettres',
                'prenom'=>'Le prenom doit supérieur à 3',
                'email'=>'L\'email que vous essayez d\'entrer est invalid',
                'mot_de_passe'=>'Le mot de passe doit être supérieur à huit lettre ou chiffres ',
                'telephone'=>'Le numéro de téléphone que vous entrez doit être égale à 9',
            ]
            );
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->mot_de_passe = Hash::make( $request->mot_de_passe );
        $client->telephone = $request->telephone;
        $client->save();
        return Redirect::to('/')->with("success","vôtre inscription est réussi");
    }

    public function check()
    {
        //Verifier si l'utilisateur existe dans la base de donnée
        $client =  Client::find();
        if(!$client)
        {
            return view('clients.form');
        }else {
            return view("clients.connexion");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("clients.listeClients");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
