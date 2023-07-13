<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Función para mostrar la vista del login
    public function index(){
        return view('auth.login');
    }

    // Función para enviar datos al servidor
    public function store(Request $request){
        // Validación de datos
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticación de usuario
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Datos incorrectos');
        }

        // Redirección a la página principal
        return redirect()->route('dashboard');
    }
}
