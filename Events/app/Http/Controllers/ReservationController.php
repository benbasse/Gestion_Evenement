<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all(); 
        return view("clients.listeClients", compact("reservation"));
    }
   
    public function reserver($evenement_id)
    {
        // Récupérez l'utilisateur connecté (client)
        $client = Auth::guard('client')->user();

        if ($client) {
            // Vérifiez si la réservation existe déjà
            $reservationExistante = Reservation::where('client_id', $client->id)
                ->where('evenement_id', $evenement_id)
                ->first();

            if (!$reservationExistante) {
                // Créez une nouvelle réservation
                Reservation::create([
                    'client_id' => $client->id,
                    'evenement_id' => $evenement_id,
                    'est_accepter_ou_pas' => false,
                ]);
                return back()->with('success','Vous avez réserver à cette événement');
            } else {
                // Ajoutez une logique pour gérer le cas où la réservation existe déjà
                // Peut-être une redirection avec un message d'erreur, par exemple
            }
        } else {
            // L'utilisateur n'est pas connecté, ajoutez une logique de redirection ou de message d'erreur
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
