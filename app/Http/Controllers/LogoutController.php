<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // Función para cerrar sesión
    public function store(){
        // Cerrar sesión
        auth()->logout();

        // Redirección a la página principal
        return redirect()->route('login');
    }
}
