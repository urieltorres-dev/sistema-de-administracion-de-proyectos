<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImagenController extends Controller
{
    //Método para almacenar imagenes
    public function store(Request $request){
        //Identificar el archivo que se sube en dropzone
        $file = $request->file('file');
        //Convertir el array de la imagen a formato Json
        //return response()->json(['imagen' => $imagen->extension()]);

        //Generar un ID úcico para cargarse al server
        $nombreFile = Str::uuid().'.'.$file->extension();

        $fileServidor = Storage::make($imagen);

        //Agregamos efectos a la imagen
        $fileServidor->fit(1000, 1000);

        //Movemos la imagen de memoria (Contenedor Dropzone) a una ubicación fisica del server
        //La guardamos en "public/uploads"
        $filePath = public_path('uploads').'/'.$nombreFile;
        $fileServidor->save($filePath);

        //Verificar que el nombre del archivo sea único
        return response()->json(['imagen' => $nombreFile]);
    }
}
