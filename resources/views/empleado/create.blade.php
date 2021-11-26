@extends('adminlte::page')

@section('title', 'Ingresar empleado')

@section('content_header')
    <h1>Ingresar Empleado</h1>
@stop

@section('content')

<form action="/empleados" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">RUT</label>
        <input id="rut" name="rut" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Número de contacto</label>
        <input id="numero" name="numero" type="tel" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo Electronico</label>
        <input id="correo" name="correo" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4">
    </div>
    <a href="/clientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" type="image/png" sizes="57x57" href="{{ asset('favicons/Logo_E.png') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop