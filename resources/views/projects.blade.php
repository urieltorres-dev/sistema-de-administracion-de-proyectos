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
            <a href="{{route('projects.create')}}" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                Agregar proyecto
            </a>
        </div>
    </div>

    <!--Profile Tabs-->
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-2 mt-2">
        @foreach ($projects as $project)
        <!--Top user 1-->
        <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs">
            <div class="text-center px-3 pb-6 pt-2">
                <h3 class="text-black text-sm bold font-sans">{{$project->name}}</h3>
                <p class="mt-2 font-sans font-light text-grey-700">{{$project->client}}</p>
            </div>
            <div class="flex justify-center pb-3 text-grey-dark">
                @if (auth()->user()->usertype == 'admin')
                <form action="{{route('projects.destroy', $project)}}" method="POST" novalidate class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
                        Eliminar proyecto
                    </button>
                </form>
                <form action="{{route('projects.edit', $project)}}" method="GET" novalidate>
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                        Editar proyecto
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <!--/Profile Tabs-->
</div>
@endsection

@section('scripts')
<script>
$('.delete-form').submit(function(e) {
    e.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
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

@if (session('destroy'))
<script>
Swal.fire({
    title: '¡Eliminado!',
    text: 'El proyecto ha sido eliminado.',
    icon: 'success',
    confirmButtonText: 'Aceptar'
});
</script>
@endif

@if (session('update'))
<script>
Swal.fire({
    title: '¡Actualizado!',
    text: 'El proyecto ha sido actualizado.',
    icon: 'success',
    confirmButtonText: 'Aceptar'
});
</script>
@endif

@if (session('error'))
<script>
Swal.fire({
    title: '¡Error!',
    text: 'Ha ocurrido un error.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
});
</script>
@endif
@endsection
