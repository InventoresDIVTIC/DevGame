<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\levels;

class ApiController extends Controller
{
    public function index(){
        //return User::find(auth()->user()->id);
        return User::find(1);
    }

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
}
