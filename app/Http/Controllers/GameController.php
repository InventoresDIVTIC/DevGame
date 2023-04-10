<?php

namespace App\Http\Controllers;

use App\Models\levels;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        //Protege la pagina de perfil, es necesario inciar session antes
        $this->middleware('auth')->except(['davoData']);
    }
    
    //lo lleva a la vista del juego
    public function index(){
        $user = User::find(auth()->user()->id);
        $datas = Levels::where('user_id', auth()->user()->id)->get();
        $max = Levels::select('time')->where('user_id', auth()->user()->id)->orderBy('time', 'DESC')->get();
        $min = Levels::select('time')->where('user_id', auth()->user()->id)->orderBy('time', 'ASC')->first();
        
        $times = Levels::orderBy('time', 'ASC')->latest()->paginate(8);
        //Media
        $posicion = 0;

        if($max->count() % 2 ==0){
           $posicion = $max->count() / 2; 
        }else{
            $posicion = $max->count() + 1 / 2; 
        }

        $porcentaje = 0;
        $muertes = 0;
        $puntos_extras = 0;
        $veces = ($datas->count())? $datas->count() : 0;

        foreach ($datas as $data){
            $porcentaje += $data->errors;
            $muertes += $data->deads;
            $puntos_extras += $data->extraPoints;
        }

        $porcentaje_muertes = ($porcentaje > 0) ? $porcentaje / $datas->count(): 0;
        
        
        return view('game.index',[
            'user' => $user,
            'porcentaje' => $porcentaje_muertes,
            'muertes' => $muertes,
            'puntos_extras' => $puntos_extras,
            'veces' => $veces,
            'media' => $max[$posicion]->time,
            'mejorTiempo' => $min,
            'times' => $times,
        ]);
    }

    //toma los datos del usuario para ser mandados al juego
    public function userData(){
        $user = User::find(auth()->user()->id);
        return $user;
    }

    public function davoData(){
        $user = User::find(1);
        return $user;
    }

    


   
}
