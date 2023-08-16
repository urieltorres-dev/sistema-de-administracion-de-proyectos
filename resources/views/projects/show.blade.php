@extends('layouts.app')

@section('titulo')
    Proyectos
@endsection

@section('contenido')
<div class="flex flex-col">
    <!--Header-->
    <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
        <div class="px-6 py-2 border-b border-light-grey flex justify-between items-center">
            <div class="font-bold text-xl">Proyectos</div>
            <a href="{{route('projects')}}" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">
                Regresar
            </a>
        </div>
    </div>

    <!--Body-->
    <div class="flex flex-col mt-2 mx-2">
        <div class="rounded overflow-hidden shadow bg-white">
            <div class="px-6 py-2 border-b border-light-grey flex justify-between items-center">
                <div class="font-bold text-xl">Proyecto: </div>
                <p class="text-grey-darker text-base">{{$project->name}}</p>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Descripción</div>
                <p class="text-grey-darker text-base">{{$project->description}}</p>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Fecha de inicio</div>
                <p class="text-grey-darker text-base">{{$project->start_date}}</p>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Fecha de fin</div>
                <p class="text-grey-darker text-base">{{$project->end_date}}</p>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Estado</div>
                <p class="text-grey-darker text-base">{{$project->status}}</p>
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Cliente</div>
                @foreach ($clients as $client)
                    @if ($client->id == $project->client)
                        <p class="text-grey-darker text-base">{{$client->name}}</p>
                    @endif
                @endforeach
            </div>
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Colaboradores</div>
                <ul>
                    @foreach ($project->collaborators as $employee)
                        <li class="text-grey-darker text-base">{{$employee->name}}</li>
                    @endforeach
                </ul>
            </div>
            <!-- Mostramos el archivo del proyecto -->
            @if ($project->file != null)
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Archivo del proyecto</div>
                <div class="py-6">
                    <a href="{{route('projects.showFile', $project->file)}}" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full" target="_blank">Ver archivo</a>
                    <a href="{{route('projects.download', $project->file)}}" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">Descargar</a>
                </div>
            </div>
            @endif
            <!-- Mostramos la ganacia del colaborador autenticado -->
            @if (in_array(auth()->user()->id, $project->collaborators->pluck('id')->toArray()))
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Ganancia</div>
                <p class="text-grey-darker text-base">{{$project->collaboratorPayments->where('id', auth()->user()->id)->first()->pivot->payment ?? ''}}</p>
            </div>
            @endif
        </div>
    </div>
    
</div>
@endsection
