<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\levels;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiControll extends Controller
{

    public function user(){
        $user = User::find(auth()->user()->id);
        return response($user, 201);
    }

    //funcion que registra los avances de los jugares
    public function store(Request $request){

        $request->validate([
            'user_id' => 'required',
            'level_id' => 'required',
            'deads' => 'required',
            'errors' => 'required',
            'extraPoints' => 'required',
            'time' => 'required',
        ]);

        return levels::create($request->all());
    }

    // public function register(Request $request){
        
    //     //Convierte a minusculas, elimina espacios y acentos 
    //     $request->request->add(['username'=> Str::slug($request->username)]);
        
    //     // --Validación--
    //     $this->validate($request, [
    //         'name'=> 'required|max:30',
    //         'username'=>'required|unique:users|min:3|max:20',
    //         'email'=>'required|unique:users|email|max:60',
    //         'password'=>'required|confirmed|min:6'
    //     ]);

      
    //     // Agrega usuario
    //     $user = User::create([
    //         'name'=> $request->name,
    //         'username'=> $request->username, 
    //         'email'=> $request->email,
    //         'password'=> Hash::make($request->password) //Hashea password 
    //     ]);


    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token'=> $token
    //     ];

    //     return response($response, 201);
    //  }

    // public function login(Request $request){ 

    //     // --Validación--
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $user = User::where('email', $request->email)->first();
    //                                                             //Mantiene la sesión
    //     if(!auth()->attempt($request->only('email', 'password'))){
    //         //Si las Credenciales para Inicio de Session manda mensaje a vista de login
    //         return back()->with('mensaje', 'Credenciales Incorrectas');
    //     }

    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     // zreturn redirect(route('posts.index', auth()->user()->username));
    //  }

    //  public function logout(Request $user){
     
        
    //     auth()->user()->tokens()->delete();
    //     return [
    //         'message'=>'Cerro sesion'
    //     ];

    //  }
}
