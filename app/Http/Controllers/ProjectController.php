<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
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
        $projects = Project::all();
        // Obtener todos los clientes
        $clients = Client::all();
        // Obtenemos los proyectos en el que el colaborador está asignado
        $projects_collaborator = [];
        if (auth()->user()->usertype === 'collaborator') {
            $projects_collaborator = auth()->user()->collaborators;
        }
        // Regresar la vista de proyectos
        return view('projects', [
            'projects' => $projects,
            'clients' => $clients,
            'projects_collaborator' => $projects_collaborator,
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

        // Obtener todos los clientes
        $clients = Client::all();
        // Obtener todos los usuarios
        $users = User::all();

        // Regresar la vista de creación de proyectos
        return view('projects.create', [
            'clients' => $clients,
            'users' => $users,
        ]);
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
            'client' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'priority' => 'required|min:4|max:100',
            'admin' => 'required',
            'collaborators' => 'required|array|min:1',
            'description' => 'required',
            'payment' => 'required|array|min:1',
            'status' => 'required',
            'file' => 'required',
        ]);

        // Creación de un nuevo proyecto
        $project = Project::create([
            'name' => $request->name,
            'client' => $request->client,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'priority' => $request->priority,
            'admin' => $request->admin,
            'description' => $request->description,
            'status' => $request->status,
            'file' => $request->file,
        ]);

        // Asignar los colaboradores seleccionados al proyecto
        $collaborators = $request->input('collaborators', []);
        $project->collaborators()->attach($collaborators);

        // Guardar los pagos de los colaboradores
        $payments = $request->input('payment', []);
        foreach ($payments as $collaboratorId => $paymentAmount) {
            $project->collaborators()->updateExistingPivot($collaboratorId, ['payment' => $paymentAmount]);
        }

        // Regresar al formulario de creación de proyectos con un mensaje de éxito
        return redirect()->route('projects')->with('create', '¡Registro exitoso!');
    }
    
    // Función para eliminar un proyecto
    public function destroy(Project $project)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Eliminamos el archivo del servidor
        $path = public_path('uploads'). '/' .$project->file;
        // Verificamos si el archivo existe
        if(file_exists($path)){
            // Eliminamos el archivo
            unlink($path);
        }else{
            // Si el archivo no existe, regresamos a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡El archivo no existe!');
        }

        // Eliminar el proyecto
        $project->delete();

        // Regresamos a la vista de proyectos con un mensaje de éxito
        return back()->with('delete', '¡Eliminación exitosa!');
    }

    // Función para mostrar la vista de edición de proyectos
    public function edit(Project $project)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Obtener todos los clientes
        $clients = Client::all();
        // Obtener todos los usuarios
        $users = User::all();

        // Regresar la vista de edición de proyectos
        return view('projects.edit', [
            'project' => $project,
            'users' => $users,
            'clients' => $clients,
        ]);
    }

    // Función para enviar datos al servidor y actualizar un proyecto
    public function update(Request $request, Project $project)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de proyectos con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request, [
            'name' => 'required|min:4|max:100',
            'client' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'priority' => 'required|min:4|max:100',
            'admin' => 'required',
            'collaborators' => 'required|array|min:1',
            'description' => 'required',
            'payment' => 'required|array|min:1',
            'status' => 'required',
            'file' => 'required',
        ]);

        // Actualización de un proyecto
        $project->update([
            'name' => $request->name,
            'client' => $request->client,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'priority' => $request->priority,
            'admin' => $request->admin,
            'description' => $request->description,
            'status' => $request->status,
            'file' => $request->file,
        ]);

        // Eliminar los colaboradores anteriores del proyecto
        $project->collaborators()->detach();

        // Asignar los colaboradores seleccionados al proyecto
        $collaborators = $request->input('collaborators', []);
        $project->collaborators()->attach($collaborators);

        // Guardar los pagos de los colaboradores
        $payments = $request->input('payment', []);
        foreach ($payments as $collaboratorId => $paymentAmount) {
            $project->collaborators()->updateExistingPivot($collaboratorId, ['payment' => $paymentAmount]);
        }

        // Regresar a la vista de proyectos con un mensaje de éxito
        return redirect()->route('projects')->with('update', '¡Actualización exitosa!');
    }

    // Función para mostrar la vista de detalles de un proyecto
    public function show(Project $project)
    {
        // Obtener todos los admins
        $admins = User::where('usertype', 'admin')->get();
        // Obtener todos los colaboradores
        $collaborators = User::where('usertype', 'collaborator')->get();
        // Obtener todos los clientes
        $clients = Client::all();

        // Regresar la vista de detalles de un proyecto
        return view('projects.show', [
            'project' => $project,
            'admins' => $admins,
            'collaborators' => $collaborators,
            'clients' => $clients,
        ]);
    }
}
?>
