@extends('layouts.app')

@section('titulo')
    Dashboard
@endsection

@section('contenido')
<div class="flex flex-col">
    @if (auth()->user()->usertype == 'admin')
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="{{route('projects')}}" class="no-underline text-white text-2xl">
                    {{$projectsCount}}
                </a>
                <a href="{{route('projects')}}" class="no-underline text-white text-lg">
                    Proyectos totales
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @php
                    $count = 0; // Declararamos el contador
                @endphp
                @foreach ($projects as $project)
                    @if ($project->admin == auth()->user()->id)
                        @php
                            $count += 1; // Incrementar el contador si el proyecto esta finalizado
                        @endphp
                    @endif
                @endforeach
                <a href="{{route('projects')}}" class="no-underline text-white text-2xl">
                    {{$count}}
                </a>
                <a href="{{route('projects')}}" class="no-underline text-white text-lg">
                    Proyectos administrados
                </a>
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                
                <a href="{{route('clients')}}" class="no-underline text-white text-2xl">
                    {{$clientsCount}}
                </a>
                <a href="{{route('clients')}}" class="no-underline text-white text-lg">
                    Clientes
                </a>
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="{{route('collaborators')}}" class="no-underline text-white text-2xl">
                    {{$collaboratorsCount}}
                </a>
                <a href="{{route('collaborators')}}" class="no-underline text-white text-lg">
                    Colaboradores
                </a>
            </div>
        </div>
    </div>
    <!-- /Stats Row Ends Here -->

    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Proyectos recientes
            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/4 px-4 py-2">Nombre del Proyecto</th>
                            <th class="border w-1/6 px-4 py-2">Administrador</th>
                            <th class="border w-1/6 px-4 py-2">Cliente</th>
                            <th class="border w-1/6 px-4 py-2">Fecha de finalizacion</th>
                            <th class="border w-1/7 px-4 py-2">Prioridad</th>
                            <th class="border w-1/5 px-4 py-2">Estado</th>
                            <th class="border w-1/5 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td class="border px-4 py-2">{{$project->name}}</td>
                            <td class="border px-4 py-2">@foreach ($users as $user)
                                @if ($user->id == $project->admin)
                                    {{$user->name}}
                                @endif
                            @endforeach</td>
                            <td class="border px-4 py-2">@foreach ($clients as $client)
                                @if ($client->id == $project->client)
                                    {{$client->name}}
                                @endif
                            @endforeach</td>
                            <td class="border px-4 py-2">{{$project->end_date}}</td>
                            <td class="border px-4 py-2">
                                {{$project->priority}}
                                <!-- <i class="fas fa-check text-green-500 mx-2"></i>
                                <i class="fas fa-times text-red-500 mx-2"></i> -->
                            </td>
                            <td class="border px-4 py-2">{{$project->status}}</td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                <a href="{{route('projects', $project)}}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                        <i class="fas fa-eye"></i></a>
                                <a href="{{route('projects.edit', $project)}}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                        <i class="fas fa-edit"></i></a>
                                <a href="{{route('projects', $project)}}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                        <i class="fas fa-trash"></i>
                                </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/Grid Form-->
    @else
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @php
                    $count = 0; // Declararamos el contador 
                @endphp
                @foreach ($projects as $project)
                    @if ($project->collaborators->contains(auth()->user()->id) && $project->status == 'En curso')
                        @php
                            $count += 1; // Incrementar el contador si el usuario es colaborador
                        @endphp
                    @endif
                @endforeach
                <a href="{{route('projects')}}" class="no-underline text-white text-2xl">
                    {{ $count }} <!-- Mostrar el valor del contador -->
                </a>
                <a href="{{route('projects')}}" class="no-underline text-white text-lg">
                    Proyectos en curso
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @php
                    $count = 0; // Declararamos el contador
                @endphp
                @foreach ($projects as $project)
                    @if ($project->collaborators->contains(auth()->user()->id))
                        @php
                            $count += 1; // Incrementar el contador si el proyecto esta finalizado
                        @endphp
                    @endif
                @endforeach
                <a href="{{route('projects')}}" class="no-underline text-white text-2xl">
                    {{$count}}
                </a>
                <a href="{{route('projects')}}" class="no-underline text-white text-lg">
                    Proyectos totales
                </a>
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @php
                    $count = 0; // Declararamos el contador
                @endphp
                @foreach ($projects as $project)
                    @if ($project->collaborators->contains(auth()->user()->id) && $project->status == 'En curso')
                        @php
                            $count += $project->collaboratorPayments->where('id', auth()->user()->id)->first()->pivot->payment;
                        @endphp
                    @endif
                @endforeach
                <a href="#" class="no-underline text-white text-2xl">
                    ${{$count}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Ganancias en curso
                </a>
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @php
                    $count = 0; // Declararamos el contador
                @endphp
                @foreach ($projects as $project)
                    @if ($project->collaborators->contains(auth()->user()->id))
                        @php
                            $count += $project->collaboratorPayments->where('id', auth()->user()->id)->first()->pivot->payment;
                        @endphp
                    @endif
                @endforeach
                <a href="#" class="no-underline text-white text-2xl">
                    ${{$count}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Ganancias totales
                </a>
            </div>
        </div>
    </div>
    <!-- /Stats Row Ends Here -->

    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Proyectos recientes
            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/4 px-4 py-2">Nombre del Proyecto</th>
                            <th class="border w-1/6 px-4 py-2">Administrador</th>
                            <th class="border w-1/6 px-4 py-2">Cliente</th>
                            <th class="border w-1/6 px-4 py-2">Fecha de finalizacion</th>
                            <th class="border w-1/7 px-4 py-2">Prioridad</th>
                            <th class="border w-1/5 px-4 py-2">Estado</th>
                            <th class="border w-1/5 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        @if ($project->collaborators->contains(auth()->user()->id))                        
                        <tr>
                            <td class="border px-4 py-2">{{$project->name}}</td>
                            <td class="border px-4 py-2">@foreach ($users as $user)
                                @if ($user->id == $project->admin)
                                    {{$user->name}}
                                @endif
                            @endforeach</td>
                            <td class="border px-4 py-2">@foreach ($clients as $client)
                                @if ($client->id == $project->client)
                                    {{$client->name}}
                                @endif
                            @endforeach</td>
                            <td class="border px-4 py-2">{{$project->end_date}}</td>
                            <td class="border px-4 py-2">
                                {{$project->priority}}
                                <!-- <i class="fas fa-check text-green-500 mx-2"></i>
                                <i class="fas fa-times text-red-500 mx-2"></i> -->
                            </td>
                            <td class="border px-4 py-2">{{$project->status}}</td>
                            <td class="border px-4 py-2">
                                <a href="{{route('projects', $project)}}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                        <i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/Grid Form-->
    @endif
</div>
@endsection
