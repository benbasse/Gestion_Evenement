<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    //Cette methode me permet de verifier si l'utilisateur existe dans la base de donnée
        public function login(Request $request)
        {
            // dd($request);
            $credentials = $request->only('email', 'mot_de_passe');
            // dd($credentials);
            $user = Client::where('email', $credentials['email'])->first();
            // dd($user->mot_de_passe);
            if ($user && password_verify ( $credentials['mot_de_passe'] , $user->mot_de_passe )) 
            {
                Auth::guard('client')->login($user);
                return view('/welcome');
            } else {
                return redirect('form')->with('error', 'Identifiants invalides. Veuillez vous inscrire.');
            }
            // return redirect('form')->with('error', 'Identifiants invalides. Veuillez vous inscrire.');
        }
    
}
