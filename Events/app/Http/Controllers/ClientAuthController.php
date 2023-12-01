<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    //Cette methode me permet de verifier si l'utilisateur existe dans la base de donnée
        public function login(Request $request)
        {
            $evenement = Evenement::all();

            $credentials = $request->only('email', 'mot_de_passe');
            
            $user = Client::where('email', $credentials['email'])->first();
            
            if ($user && password_verify ( $credentials['mot_de_passe'] , $user->mot_de_passe )) 
            {
                Auth::guard('client')->login($user);
                return view('/welcome', compact('evenement'));
            } else {
                return redirect('form')->with('error', 'Identifiants invalides. Veuillez vous inscrire.');
            }
        }
        public function logout()
        {
            Auth::guard('client')->logout();
        
            return redirect('/'); // Redirige où vous le souhaitez après la déconnexion
        }
}
