<?php

namespace App\Http\Controllers;

use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Http\Request;

class PromoteurController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $verification = $request->validate(
            [
                'nom' => ['required', 'string', 'max:100'],
                'prenom' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'max:200'],
                'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],

            ]
        );

        if ($verification) {
            $user = User::create(
                [
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'Promoteur'

                ]
            );
        }

        if ($user) {
            $promoteur = Promoteur::create([
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'userId' => $user->id,
            ]);

            return redirect('/');
        }
    }
}
