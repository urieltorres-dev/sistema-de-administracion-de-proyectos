<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
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
        // Obtener todos los usuarios colaboradores
        $collaboratorsCount = User::where('usertype', 'collaborator')->count();
        // Obtener todos los clientes
        $clientsCount = Client::count();
        // Obtener todos los proyectos
        $projectsCount = Project::count();

        // Obtener todos los proyectos
        $projects = Project::all();

        // Retornar la vista
        return view('dashboard', [
            'collaboratorsCount' => $collaboratorsCount,
            'clientsCount' => $clientsCount,
            'projectsCount' => $projectsCount,
            'projects' => $projects,
        ]);
    }
}
