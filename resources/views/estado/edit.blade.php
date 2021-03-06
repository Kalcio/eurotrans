@extends('adminlte::page')

@section('title', 'Editar Estado')

@section('content_header')
    <h1>Editar Estado</h1>
@stop

@section('content')
    
<form action="/estados/{{$estado->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Situacion</label>
        <input id="situacion" name="situacion" type="text" class="form-control" value="{{$estado->situacion}}" value="{{old('situacion')}}" autofocus>
        @if ($errors->has('situacion'))
            <span class="error text-danger" for="input-situacion">{{ $errors->first('situacion')}}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Observacion</label>
        <input id="observacion" name="observacion" type="tel" class="form-control" value="{{$estado->observacion}}" value="{{old('observacion')}}" autofocus>
        @if ($errors->has('observacion'))
            <span class="error text-danger" for="input-observacion">{{ $errors->first('observacion')}}</span>
        @endif
    </div>
    <a href="/estados" class="btn btn-secondary" tabindex="5">Cancelar</a>
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