<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\levels;
use App\Models\Question;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiControll extends Controller
{

    //Obtiene el usuario loggeado
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

    public function show(){
        $questions = Question::all();
        return response($questions, 201);
    }
}
