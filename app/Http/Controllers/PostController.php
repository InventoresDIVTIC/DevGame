<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    public function __construct()
    {
        //Verifica que haya un usuario autenticado
        $this->middleware('auth');
    }

    public function index(){
        return view('index');
    }
    
}
