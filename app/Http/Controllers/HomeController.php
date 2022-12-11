<?php

namespace App\Http\Controllers;

use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::User();
        if($user->statut=='promoteur'){
            $promoteur = Promoteur::where ('userId', $user->id)->first();
            return view('promoteur.dashboard');
        }
    }
}
