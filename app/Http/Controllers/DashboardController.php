<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Constructor para verificar autenticación
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Función para mostrar la vista del dashboard
    public function index()
    {
        return view('dashboard');
    }
}
