<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

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
        // dd($client);

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
                    'est_accepter_ou_pas' => true,
                ]);
                return Redirect::to('/')->with('success','Vous avez réserver à cette événement');
            } else {
                return Redirect::to('/')->with('success', 'vous ne pouvez pas refaire une reservation');
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
        $reservation = Reservation::find($id);
        $reservation->est_accepter_ou_pas = false;
        if ($reservation->update()) 
        {
            // dd('reservation');
            return back();
        }
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
