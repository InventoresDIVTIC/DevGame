<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{


    public function __construct()
    {
        //Verifica que haya un usuario autenticado
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user){
        $posts = Post::where('user_id', $user->id)->latest()->paginate(12); //Se trae las publicaciones

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
        
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(Request $request){
        //Validacion de las entradas
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion'=> 'required',
            'imagen' => 'required'
        ]);

        //otra forma de registrar
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        //Redireccionamos a su perfil
        return redirect(route('posts.index', auth()->user()->username));
    }

    //muetra una publicacion
    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user'=> $user
        ]);
    }

    public function destroy(Post $post){
        //Valida que un usuario solo pueda eliminar sus propias publicaciones 
        $this->authorize('delete', $post);

        //Elimina la publicacion
        $post->delete();

        //Eliminar la imagen
        $imagen_path = public_path('uploads/'. $post->imagen);
        //Valida que la imagen exista
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }
        //REdirecciona al usuario a su muro 
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
