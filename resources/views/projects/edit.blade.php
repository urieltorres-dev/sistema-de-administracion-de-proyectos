@extends('layouts.app')

@section('titulo')
    Editar proyecto
@endsection

@section('styles')
    <!--Insertar estilo de dropzone-->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('contenido')
<div class="flex flex-col">
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Editar proyecto
            </div>
            
            <div class="p-3">
                @if(session('update'))
                    <p class="bg-green-500 text-white rounded-lg text-center mb-6 p-2 uppercase font-bold" role="alert">
                        {{session('update')}}
                    </p>
                @endif

                <form action="{{route('projects.update', $project)}}" class="w-full update-form" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                                Nombre del proyecto
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('name')
                                border-red-500
                            @enderror"
                            value="{{old('name', $project->name)}}" id="name" name="name" type="text" placeholder="Nombre" required>
                            @error('name')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="lastname">
                                Cliente
                            </label>
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('client')
                                border-red-500
                            @enderror"
                            id="client" name="client" required>
                                <option value="">Seleccione una opcion</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if($project->client == $client->id) selected @endif>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @error('client')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="start_date">
                                Fecha de inicio
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('start_date')
                                border-red-500
                            @enderror"
                            value="{{old('start_date', $project->start_date)}}" id="start_date" name="start_date" type="date" required>
                            @error('start_date')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="end_date">
                                Fecha de fin
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('end_date')
                                border-red-500
                            @enderror"
                            value="{{old('end_date', $project->end_date)}}" id="end_date" name="end_date" type="date" required>
                            @error('end_date')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="price">
                                Precio
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('price')
                                border-red-500
                            @enderror"
                            value="{{old('price', $project->price)}}" id="price" name="price" type="text" placeholder="Precio" pattern="^\d+(\.\d{1,2})?$" inputmode="decimal" required>
                            @error('price')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="priority">
                                Prioridad
                            </label>
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('priority')
                                border-red-500
                            @enderror"
                            id="priority" name="priority" required>
                                <option value="">Seleccione una opcion</option>
                                <option value="Alto" @if($project->priority == 'Alto') selected @endif>Alto</option>
                                <option value="Medio" @if($project->priority == 'Medio') selected @endif>Medio</option>
                                <option value="Bajo" @if($project->priority == 'Bajo') selected @endif>Bajo</option>
                            </select>
                            @error('priority')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="admin">
                                Lider del proyecto
                            </label>
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('admin')
                                border-red-500
                            @enderror"
                            id="admin" name="admin" type="text" required>
                                <option value="">Seleccione una opcion</option>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}" @if($project->admin == $admin->id) selected @endif>{{ $admin->name }}</option>
                                @endforeach
                            </select>
                            @error('admin')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="status">
                                Estado del proyecto
                            </label>
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('status')
                                border-red-500
                            @enderror"
                            id="status" name="status" required>
                                <option value="">Seleccione una opcion</option>
                                <option value="Finalizado" @if($project->status == 'Finalizado') selected @endif>Finalizado</option>
                                <option value="En curso" @if($project->status == 'En curso') selected @endif>En curso</option>
                                <option value="Pendiente" @if($project->status == 'Pendiente') selected @endif>Pendiente</option>
                            </select>
                            @error('status')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full px-3 mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="collaborator">
                                Decripción
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('description')
                                border-red-500
                            @enderror"
                            value="{{$project->description}}" id="description" name="description" type="textarea" placeholder="Descripcion breve" required>
                            @error('description')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <!-- Lista de colaboradores con casillas de verificación -->
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Colaboradores del proyecto:</p>
                            <div class="flex flex-col">
                                @foreach ($collaborators as $collaborator)
                                    <div class="flex items-center">
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="collaborators[]" value="{{ $collaborator->id }}"
                                                    @if(in_array($collaborator->id, old('collaborators', $project->collaborators->pluck('id')->toArray()))) checked @endif
                                                    class="form-checkbox h-4 w-4 text-blue-600">
                                                <span class="ml-2">{{ $collaborator->name }}</span>
                                            </label>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <input type="text" name="payment[{{ $collaborator->id }}]" id="pay_{{ $collaborator->id }}"
                                                placeholder="Pago"
                                                value="{{ old('payment.' . $collaborator->id, $project->collaboratorPayments->where('id', $collaborator->id)->first()->pivot->payment ?? '') }}"
                                                @if(!in_array($collaborator->id, old('collaborators', $project->collaborators->pluck('id')->toArray()))) disabled @endif
                                                class="ml-4 px-2 py-1 border rounded @if(in_array($collaborator->id, old('collaborators', $project->collaborators->pluck('id')->toArray()))) bg-white @else bg-gray-200 @endif">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('collaborators')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Creamos un campo oculto para guardar el valor de la imagen -->
                        <div class="mb-5 px-3">
                            <input type="hidden" name="file" value="{{$project->file}}"/>
                            @error('file')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                        Guardar proyecto
                    </button>

                    <a href="{{route('projects')}}" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">
                        Regresar
                    </a>
                </form>

                <div class="md:w-1/2 px-10 pt-5">
                    <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Grid Form-->
</div>
@endsection

@section('scripts')
<script>
    $('.update-form').submit(function(e) {
        e.preventDefault();
    
        Swal.fire({
            title: '¿Estas seguro?',
            text: "¿Deseas guardar los cambios realizados?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, estoy seguro',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>

<script>
const collaborators = document.querySelectorAll('input[name="collaborators[]"]');
collaborators.forEach((collaborator) => {
    collaborator.addEventListener('change', (e) => {
        const pay = document.querySelector(`#pay_${e.target.value}`);
        pay.disabled = !e.target.checked;
        pay.value = '';
        pay.classList.toggle('bg-gray-200');
        pay.classList.toggle('bg-white');
    });
});
</script>
@endsection
