<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        //Protege la pagina de perfil, es necesario inciar session antes
        $this->middleware('auth');
    }
    
    //lo lleva a la vista del juego
    public function index(){
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
       
        return view('game.index',[
            'user' => $user
        ]);
    }

    //toma los datos del usuario para ser mandados al juego
    public function userData(){
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
        return $user;
    }

   
}
