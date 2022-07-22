<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        //Protege la pagina de perfil, es necesario inciar session antes
        $this->middleware('auth');
    }

    public function index(){
       return view('perfil.index');
    }

    public function store(Request $request){
        //Convierte a minusculas, elimina espacios y acentos 
         $request->request->add(['username'=> Str::slug($request->username)]);
        //Reglas de validación
        $request->validate([
            'username'=>['required', 
            'unique:users,username,'.auth()->user()->id, 
            'min:3', 
            'max:20', 
            'not_in:twitter,facebook,youtube,editar-perfil'],
        ]);

        //Valida si se esta subiendo una imagen
        if($request->imagen){
            $imagen = $request->file('imagen'); //obtenemos el archivo
        
            $nombreImagen = Str::uuid() . "." . $imagen->extension(); //Genera nombre unico a la imagen
            
            
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000); //Recorta la imagen en dado caso que sea muy grande
    
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen; //Crea la url donde se almacena la imagen
            $imagenServidor->save($imagenPath); //Guarda la imagen 
    
        }


        //Guardar los cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        //Redireccionar
        return redirect()->route('posts.index', $usuario->username);
        
    }
}
