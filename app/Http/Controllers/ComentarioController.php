<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){
        //Validar
        $this->validate($request, [
            
            'comentario' => 'required|max:255'
        ]);

        //Almacenar Resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario'=> $request->comentario
        ]);
        //Imprimir Mensaje

        return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }
}
