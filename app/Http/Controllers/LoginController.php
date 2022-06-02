<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
                                                                //Mantiene la sesión
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            //manda mensaje a vista de login
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        //Redireccionamos 
        return redirect(route('posts.index'));
    }
}
