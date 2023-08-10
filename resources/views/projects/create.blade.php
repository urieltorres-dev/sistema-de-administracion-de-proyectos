@extends('layouts.app')

@section('titulo')
    Registrar proyecto
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
                Nuevo proyecto
            </div>
            
            <div class="p-3">
                @if(session('create'))
                    <p class="bg-green-500 text-white rounded-lg text-center mb-6 p-2 uppercase font-bold" role="alert">
                        {{session('create')}}
                    </p>
                @endif
            
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
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @error('client')
                                border-red-500
                            @enderror"
                            id="client" name="client" required>
                                <option value="">Seleccione un cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}" @if(old('client') == $client->id) selected @endif>{{$client->name}}</option>
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
                                <option value="Alto" @if(old('priority') == 'Alto') selected @endif>Alto</option>
                                <option value="Medio" @if(old('priority') == 'Medio') selected @endif>Medio</option>
                                <option value="Bajo" @if(old('priority') == 'Bajo') selected @endif>Bajo</option>
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
                            id="admin" name="admin" required>
                                <option value="">Seleccione un lider del proyecto</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}" @if(old('admin') == $user->id) selected @endif>{{$user->name}}</option>
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
                                <option value="Finalizado" @if(old('status') == 'Finalizado') selected @endif>Finalizado</option>
                                <option value="En curso" @if(old('status') == 'En curso') selected @endif>En curso</option>
                                <option value="Pendiente" @if(old('status') == 'Pendiente') selected @endif>Pendiente</option>
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
                            value="{{old('description')}}"  id="description" name="description" type="textarea" placeholder="Descripcion breve" required>
                            @error('description')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <!-- Lista de colaboradores con casillas de verificación -->
                        <div class="mb-4 px-3">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Colaboradores del proyecto:</p>
                            <div class="flex flex-col">
                                @foreach ($users as $user)
                                    <div class="flex items-center">
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="collaborators[]" value="{{ $user->id }}"
                                                    {{ old('collaborators') ? (in_array($user->id, old('collaborators')) ? 'checked' : '') : '' }}
                                                    class="form-checkbox h-4 w-4 text-blue-600">
                                                <span class="ml-2">{{ $user->name }}</span>
                                            </label>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <input type="text" name="payment[{{ $user->id }}]" id="pay_{{ $user->id }}"
                                                placeholder="Pago" pattern="^\d+(\.\d{1,2})?$" inputmode="decimal"
                                                value="{{ old('payment.' . $user->id) }}"
                                                {{ old('collaborators') ? (in_array($user->id, old('collaborators')) ? '' : 'disabled') : 'disabled' }}
                                                class="ml-4 px-2 py-1 border rounded @if(old('collaborators') && in_array($user->id, old('collaborators'))) bg-white @else bg-gray-200 @endif">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('collaborators')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
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
                    </div>

                    <input type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full" value="Guardar proyecto"/>

                    <a href="{{route('projects')}}" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full ml-4">
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
