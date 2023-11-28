<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view("clients.connexion");
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
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        // $client->mot_de_passe = $request->mot_de_passe;
        $client->mot_de_passe = Hash::make( $request->mot_de_passe );
        $client->telephone = $request->telephone;
        $client->save();
        return back()->with("success","vôtre inscription est réussi");
    }

    public function check()
    {
        //Verifier si l'utilisateur existe dans la base de donnée
        $client =  Client::all();
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
    public function show(Client $client)
    {
        //
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
