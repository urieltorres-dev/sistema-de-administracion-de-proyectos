@extends('layouts.app')

@section('titulo')
    Registrar proyecto
@endsection

@section('contenido')
<div class="flex flex-col">
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Nuevo proyecto
            </div>
            
            <div class="p-3">
                @if(session('create'))
                    <p class="bg-green-500 text-white rounded-lg text-center mb-6 p-2 uppercase font-bold" role="alert">
                        {{session('create')}}
                    </p>
                @endif
                </form>
                <div class="md:w-1/2 px-10">
                        <form action="{{route('imagenes')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                            @csrf
                        </form>
                </div>
                <form action="{{route('projects')}}" class="w-full" method="POST" novalidate>
                    @csrf
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                                Nombre del proyecto
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('name')
                                border-red-500
                            @enderror"
                            value="{{old('name')}}"  id="name" name="name" type="text" placeholder="Nombre del proyecto" required>
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
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('client')
                                border-red-500
                            @enderror"
                            value="{{old('client')}}"  id="client" name="client" type="text" placeholder="Cliente" required>
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
                            value="{{old('start_date')}}"  id="start_date" name="start_date" type="date" required>
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
                            value="{{old('end_date')}}"  id="end_date" name="end_date" type="date" required>
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
                            value="{{old('price')}}"  id="price" name="price" type="text" placeholder="Precio" pattern="^\d+(\.\d{1,2})?$" inputmode="decimal" required>
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
                                <option value="alto" @if(old('priority') == 'alto') selected @endif>Alto</option>
                                <option value="medio" @if(old('priority') == 'medio') selected @endif>Medio</option>
                                <option value="bajo" @if(old('priority') == 'bajo') selected @endif>Bajo</option>
                            </select>
                            @error('priority')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="admin">
                                Administrador
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('admin')
                                border-red-500
                            @enderror"
                            value="{{old('admin')}}"  id="admin" name="admin" type="text" placeholder="Nombre del administrador" required>
                            @error('admin')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="collaborator">
                                Colaborador
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('collaborator')
                                border-red-500
                            @enderror"
                            value="{{old('collaborator')}}"  id="collaborator" name="collaborator" type="text" placeholder="Nombre del colaborador" required>
                            @error('collaborator')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>


                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="collaborator">
                                Decripción
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('description')
                                border-red-500
                            @enderror"
                            value="{{old('description')}}"  id="description" name="description" type="text" placeholder="Descripcion breve" required>
                            @error('description')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <br/>

                                       <!-- Creamos un campo oculto para guardar el valor de la imagen -->
                        <div class="mb-5">
                            <input type="hidden" name="file" value="{{old('file')}}"/>
                            @error('file')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>


                        <div class="flex justify-center mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                Guardar proyecto
                            </button>

                            <a href="{{route('projects')}}" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full ml-4">
                                Regresar
                            </a>
                        </div>
            </div>
    </div>
    <!--/Grid Form-->
</div>
@endsection

@section('scripts')
@if(session('create'))
<script>
Swal.fire({
    title: '¡Registro exitoso!',
    text: 'Proyecto guardado correctamente!',
    icon: 'success',
    confirmButtonText: 'Aceptar'
});
</script>
@endif
@endsection
