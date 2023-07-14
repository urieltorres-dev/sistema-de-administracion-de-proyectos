<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    //Método para almacenar imagenes
    public function store(Request $request){
        //Identificar el archivo que se sube en dropzone
        $file = $request->file('file');

        //Generar un ID úcico para cargarse al server
        $nombreFile = Str::uuid().'.'.$file->extension();

        //Redimensionar la imagen
        $file->move(public_path('uploads'), $nombreFile);

        //Verificar que el nombre del archivo sea único
        return response()->json(['file' => $nombreFile]);
    }
}
