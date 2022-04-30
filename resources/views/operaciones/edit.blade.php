@extends('layouts.plantillaBase')

@section('contenido')
<h2 class="bg-primary text-white text-center p-3">Editar registro</h2>
<form action="/api/operaciones/{{$operacion->id}}" method="POST" class="mt-0">
    <!-- action=ruta a donde van los datos -->
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label text-primary">Concepto</label>
        <input type="text" class="form-control" name="concepto" id="concepto" tabindex="1" value="{{$operacion->concepto}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label text-primary">Monto</label>
        <input type="number" step="any" class="form-control" name="monto" id="monto" tabindex="2" value="{{$operacion->monto}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label text-primary" >Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fecha" tabindex="3" value="{{$operacion->fecha}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label text-primary">Tipo</label>
        <select class="form-control" name="tipo" id="tipo" tabindex="4">
            <option value="" selected disabled hidden>Tipo</option>
            <option value="ingreso">ingreso</option>
            <option value="egreso">egreso</option>
        </select>
    </div>
    <a href="/api/operaciones" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>

@endsection