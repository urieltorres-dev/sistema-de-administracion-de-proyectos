<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Función para mostrar la vista de registro
    public function index(){
        return view('auth.register');
    }

    // Función para enviar datos al servidor
    public function store(Request $request){
        // Validación de datos
        $this->validate($request,[
            'name' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        // Creación de usuario
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'admin',
        ]);

        // Autenticación de usuario
        auth()->attempt($request->only('email','password'));

        // Redirección a la página de inicio
        return redirect()->route('dashboard');
    }
}
