<?php

namespace App\Http\Controllers;
use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Constructor para verificar autenticación
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Función para mostrar la vista de proyectos
    public function index()
    {
        // Obtener todos los proyectos
        $projects = projects::all();

        // Regresar la vista de proyectos
        return view('projects', [
            'projects' => $projects,
        ]);
    }

    // Función para mostrar la vista con el formulario de creación de proyectos
    public function create()
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Regresar la vista de creación de proyectos
        return view('projects.create');
    }

    // Función para enviar datos al servidor y crear un nuevo proyecto
    public function store(Request $request)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request, [
            'name' => 'required|min:4|max:100',
            'client' => 'required|min:4|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'priority' => 'required|min:4|max:100',
            'admin' => 'required',
            'collaborator' => 'required',
            'description' => 'required',
            'file' => 'nullable|array',
            'file.*' => 'file|mimes:doc,docx,pdf,jpg,jpeg,png|max:2048',
        ]);

        // Creación de un nuevo proyecto
        $project = projects::create([
            'name' => $request->name,
            'client' => $request->client,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'priority' => $request->priority,
            'admin' => $request->admin,
            'collaborator' => $request->collaborator,
            'description' => $request-> description,

        ]);

        // Manejo de archivos
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads', $filename);
                $project->files()->create([
                    'filename' => $filename,
                ]);
            }
        }

        // Regresar al formulario de creación de proyectos con un mensaje de éxito
        return back()->with('create', '¡Registro exitoso!');
    }
    
    // Resto de métodos del controlador...
}
?>