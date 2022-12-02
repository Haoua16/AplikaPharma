<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendeur;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function index()
    {
        return view('promoteur.nouveauvendeur');
    }

    public function store(Request $request)
    {
        $nagnana = $request->validate(
            [
        
                'profile_img' => 'required|mimes:png,jpg,jpeg|max:1000',
                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],                
                'email'=>['required','string','email','max:50','unique:users'],               
                'password'=>['required','string','min:5','confirmed']              
            ]
            );

            if($nagnana)
            {
                
                $user =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'email' =>$request['email'],
                        'password' => bcrypt($request['password']),
                        'status' => 'vendeur',
                    ]
                    
                    );

                    if($user)
                    {
                        $fileName = time().'.'.$request->profile_img->extension();  
                        $request->profile_img->move(public_path('profile/vendeurs'), $fileName);
                        $vendeur = Vendeur::create(
                            [
                                'profile_img'=>$fileName,
                                'id_users' => $user->id,
                                'nom'=>$request['nom'],
                                'email'=>$request['email'],
                                'prenom'=>$request['prenom'],
                                'password' => bcrypt($request['password']),
                            ]
                            );                          
                            return redirect('addnewvendeurpage')->with('success', 'vendeur ajouté avec succèss!!!');;                            
                    }
                }
    }
}
