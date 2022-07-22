<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file'); //obtenemos el archivo
        
        $nombreImagen = Str::uuid() . "." . $imagen->extension(); //Genera nombre unico a la imagen
        
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000); //Recorta la imagen en dado caso que sea muy grande

        $imagenPath = public_path('uploads') . '/' . $nombreImagen; //Crea la url donde se almacena la imagen
        $imagenServidor->save($imagenPath); //Guarda la imagen 

        //Extrae las extensiones de las imagenes que se suban
        return response()->json(['imagen' => $nombreImagen]);
    }
}
