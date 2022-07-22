<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct(){
        //Verifica que haya un usuario autenticado
        $this->middleware('auth');
    }

    public function index(){
        return view('game.index');
    }
}
