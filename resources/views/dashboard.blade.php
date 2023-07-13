@extends('layouts.app')

@section('titulo')
    Dashboard
@endsection

@section('contenido')
<div class="flex flex-col">
    @if (auth()->user()->usertype == 'admin')
    <p>Estas logueado como administrador</p>
    @else
    <p>Estas logueado como colaborador</p>
    @endif
</div>
@endsection
