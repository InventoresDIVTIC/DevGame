<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;

class ApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index, store']);
    // }

    public function index(){
        return User::find(auth()->user()->id);
        //return User::find(1);
    }

    public function store(Request $request){
        
        $request->validate([
            'level'=>'required',
            'deads'=>'required',
            'errors'=>'required',
            'extraPoints'=>'required',
            'time'=>'required'
        ]);

        return Level::create($request->all());
    }
}
