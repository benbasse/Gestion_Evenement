<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::all(); 
        return view("clients.listeClients", compact("reservation"));
    }
    public function reserver(Request $request, $evenement_id)
    {
        if($client = Auth::guard('client')->user())
        {
        // }
        // if ($client) 
        // {
        //     $reservationExistante = Reservation::where('client_id', $client->id)
        //         ->where('evenement_id', $evenement_id)
        //         ->first();
        //     if (!$reservationExistante) 
        //     {
            $request->validate(
                [
                    'nombre_place'=>'required|integer'
                ],
                [   
                    'nombre_place'=>'Le nombre de place ne peut pas être null'
                ]
            );
                Reservation::create
                (
                    [
                    'client_id' => $client->id,
                    'evenement_id' => $evenement_id,
                    'nombre_place' => $request->nombre_place,
                    'est_accepter_ou_pas' => true,
                    ]
                );
                Mail::to('basse@gmail.com')->send(new ReservationMail());
                return Redirect::to('/')->with('success','Vous avez réserver à cette événement');
                
        //     } 
        //     else 
        //     {
        //         return Redirect::to('/')->with('error', 'vous ne pouvez pas refaire une reservation');
        //     }
        // } 
        // else 
        // {
        //     return Redirect::to('connexion');
        }
        
        return Redirect::to('connexion');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $reservation = Reservation::find($id);
        $reservation->est_accepter_ou_pas = false;
        if ($reservation->update()) 
        {
            return back()->with("success", "Vous avez réfuser la demande de réservation");
        }
        Mail::to('basse@gmail.com')->send(new ReservationMail());

    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
