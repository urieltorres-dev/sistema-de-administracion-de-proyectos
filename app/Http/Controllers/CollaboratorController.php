<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CollaboratorController extends Controller
{
    // Constructor para verificar autenticación
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Función para mostrar la vista de colaboradores
    public function index()
    {
        // Obtener todos los colaboradores
        $collaborators = User::where('usertype', 'collaborator')->get();

        // Regresar la vista de colaboradores
        return view('collaborators', [
            'collaborators' => $collaborators,
        ]);
    }

    // Función para mostrar la vista con el formulario de creación de colaboradores
    public function create()
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Regresar la vista de creación de colaboradores
        return view('collaborators.create');
    }

    // Función para enviar datos al servidor y crear un nuevo colaborador
    public function store(Request $request)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request,[
            'name' => 'required|min:4|max:20',
            'lastname' => 'required|min:4|max:20',
            'email' => 'required|unique:users|email|max:60',
            'phone' => 'nullable|unique:users|size:10|regex:/^[0-9]{10}$/',
            'job' => 'nullable|min:4|max:20',
            'company' => 'nullable|min:4|max:100',
            'password' => 'required|confirmed|min:6',
        ]);

        // Creación de un nuevo colaborador
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'job' => $request->job,
            'company' => $request->company,
            'password' => Hash::make($request->password),
            'usertype' => 'collaborator',
        ]);

        // Regresamos al formulario de creación de colaboradores con un mensaje de éxito
        return redirect()->route('collaborators')->with('create', '¡Registro exitoso!');
    }

    // Función para eliminar un colaborador
    public function destroy(User $collaborator)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Eliminar el colaborador
        $collaborator->delete();

        // Regresamos a la vista de colaboradores con un mensaje de éxito
        return back()->with('delete', '¡Eliminación exitosa!');
    }

    // Función para mostrar la vista con el formulario de edición de colaboradores
    public function edit(User $collaborator)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }
        
        // Regresar la vista de edición de colaboradores
        return view('collaborators.edit', [
            'collaborator' => $collaborator,
        ]);
    }

    // Función para enviar datos al servidor y actualizar un colaborador
    public function update(Request $request, User $collaborator)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request, [
            'name' => 'required|min:4|max:20',
            'lastname' => 'required|min:4|max:20',
            'email' => 'required|email|max:60',
            'phone' => 'nullable|size:10|regex:/^[0-9]{10}$/',
            'job' => 'nullable|min:4|max:20',
            'company' => 'nullable|min:4|max:20',
            'password' => 'nullable|confirmed',
        ]);

        // Obtener los datos a actualizar
        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'job' => $request->job,
            'company' => $request->company,
        ];

        // Verificar si se proporcionó una nueva contraseña
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Actualización de un colaborador
        $collaborator->update($data);

        // Regresamos al formulario de edición de colaboradores con un mensaje de éxito
        return redirect()->route('collaborators')->with('update', '¡Actualización exitosa!');
    }
}
