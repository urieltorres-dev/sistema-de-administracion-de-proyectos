<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Constructor para verificar autenticación
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Función para mostrar la vista de clientes
    public function index()
    {
        // Obtener todos los clientes
        $clients = Client::all();

        // Regresar la vista de clientes
        return view('clients', [
            'clients' => $clients,
        ]);
    }

    // Función para mostrar la vista con el formulario de creación de clientes
    public function create()
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de clientes con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Regresar la vista de creación de clientes
        return view('clients.create');
    }

    // Función para enviar datos al servidor y crear un nuevo cliente
    public function store(Request $request)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'email' => 'required|email|unique:clients|max:60',
            'phone' => 'required|unique:clients|size:10|regex:/^[0-9]{10}$/',
            'company' => 'required|min:4|max:100',
        ]);

        // Creación de un nuevo cliente
        Client::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        // Regresamos al formulario de creación de clientes con un mensaje de éxito
        return redirect()->route('clients')->with('create', '¡Registro exitoso!');
    }

    // Función para eliminar un cliente
    public function destroy(Client $client)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Eliminamos el cliente
        $client->delete();

        // Regresamos a la vista de clientes con un mensaje de éxito
        return back()->with('destroy', '¡Eliminación exitosa!');
    }

    // Función para mostrar la vista de edición de clientes
    public function edit(Client $client)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de clientes con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }
        
        // Regresamos la vista de edición de clientes
        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    // Función para enviar datos al servidor y actualizar un cliente
    public function update(Request $request, Client $client)
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->usertype != 'admin') {
            // Regresar a la vista de colaboradores con un mensaje de error
            return back()->with('error', '¡No tienes permiso para realizar esta acción!');
        }

        // Validación de datos
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'email' => 'required|email|max:60',
            'phone' => 'required|size:10|regex:/^[0-9]{10}$/',
            'company' => 'required|min:4|max:100',
        ]);

        // Actualización de un cliente
        $client->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        // Regresamos a la vista de clientes con un mensaje de éxito
        return redirect()->route('clients')->with('update', '¡Actualización exitosa!');
    }
}
