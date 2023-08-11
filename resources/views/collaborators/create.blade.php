@extends('layouts.app')

@section('titulo')
    Registrar colaborador
@endsection

@section('contenido')
<div class="flex flex-col">
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Nuevo colaborador
            </div>
            
            <div class="p-3">
                @if(session('create'))
                    <p class="bg-green-500 text-white rounded-lg text-center mb-6 p-2 uppercase font-bold" role="alert">
                        {{session('create')}}
                    </p>
                @endif

                <form action="{{route('collaborators')}}" class="w-full" method="POST" novalidate>
                    @csrf
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                                Nombre
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('name')
                                border-red-500
                            @enderror"
                            value="{{old('name')}}"  id="name" name="name" type="text" placeholder="Nombre" required>
                            @error('name')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="lastname">
                                Apellido
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('lastname')
                                border-red-500
                            @enderror"
                            value="{{old('lastname')}}"  id="lastname" name="lastname" type="text" placeholder="Apellido" required>
                            @error('lastname')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="email">
                                Correo electrónico
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('email')
                                border-red-500
                            @enderror"
                            value="{{old('email')}}"  id="email" name="email" type="email" placeholder="Correo electrónico" required>
                            @error('email')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="phone">
                                Numero de teléfono
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('phone')
                                border-red-500
                            @enderror"
                            value="{{old('phone')}}" id="phone" name="phone" type="tel" pattern="[0-9]{10}" placeholder="Numero de teléfono" required>
                            @error('phone')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="job">
                                Puesto de trabajo
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('job')
                                border-red-500
                            @enderror"
                            value="{{old('job')}}"  id="job" name="job" type="text" placeholder="Puesto de trabajo" required>
                            @error('job')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="company">
                                Compañia
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('company')
                                border-red-500
                            @enderror"
                            value="{{old('company')}}"  id="company" name="company" type="text" placeholder="Compañia" required>
                            @error('company')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="password">
                                Contraseña
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('password')
                                border-red-500
                            @enderror"
                            id="password" name="password" type="password" placeholder="Contraseña" required>
                            @error('password')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="password_confirmation">
                                Repite tu contraseña
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('password_confirmation')
                                border-red-500
                            @enderror"
                            id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu contraseña" required>
                            @error('password_confirmation')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Creamos un campo oculto para guardar el valor de la imagen -->
                    <div class="mb-5">
                        <input type="hidden" name="file" value="{{old('file')}}"/>
                        @error('file')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                        Guardar colaborador
                    </button>

                    <a href="{{route('collaborators')}}" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">
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
