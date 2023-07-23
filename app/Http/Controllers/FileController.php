<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //Método para almacenar archivos
    public function store(Request $request){
        //Identificar el archivo que se sube en dropzone
        $file = $request->file('file');

        //Generar un ID úcico para cargarse al server
        $nombreFile = Str::uuid().'.'.$file->extension();

        //Redimensionar el archivo
        $file->move(public_path('uploads'), $nombreFile);

        //Verificar que el nombre del archivo sea único
        return response()->json(['file' => $nombreFile]);
    }

    //Método para eliminar archivos
    public function destroy(Request $request){
        //Identificar el archivo que se sube en dropzone
        $filename = $request->input('fileName');
        //Identificamos la ruta del archivo
        $path = public_path('uploads') . '/' . $filename;

        //Verificamos si el archivo existe
        if(file_exists($path)){
            //Eliminamos el archivo
            unlink($path);
            //Retornamos un mensaje de éxito
            return response()->json(['message' => 'Archivo eliminado']);
        } else {
            //Si el archivo no existe, retornamos un error
            return response()->json(['message' => 'Archivo no encontrado']);
        }
    }
}
