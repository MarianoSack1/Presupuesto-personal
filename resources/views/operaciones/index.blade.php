@extends('layouts.plantillaBase')

@section('contenido')
<h1 class="bg-secondary text-white text-center p-3">Presupuesto</h1>
<div>
    <h2 class="bg-warning text-dark text-center p-3" >Balance actual: {{$balance}} pesos</h2>

</div>
<!-- <a href="operaciones/create" class="btn btn-primary">Crear</a> -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear nuevo registro
</button>

<table class="table table-dark table-striped mt-2">
    <thead> 
        <tr>
            <th scope="col" class="text-center">Concepto</th>
            <th scope="col" class="text-center">Monto</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col" class="text-center">Tipo</th>
            <th scope="col" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($operaciones as $operacion)
             <tr>
                 <td class="text-center">{{$operacion->concepto}}</td>
                 <td class="text-center">{{$operacion->monto}}</td>
                 <td class="text-center">{{$operacion->fecha}}</td>
                 <td class="text-center">{{$operacion->tipo}}</td>
                 <td class="text-center">
                     <form action="{{route ('operaciones.destroy',$operacion->id) }}" method="POST">
                            <a href="/api/operaciones/{{$operacion->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                     </form>     
                 </td>
             </tr>
         @endforeach

    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Crear nuevo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="/api/operaciones" method="POST" class="mt-0">
                <!-- action=ruta a donde van los datos -->
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label text-primary">Concepto</label>
                    <input type="text" class="form-control" name="concepto" id="concepto" tabindex="1">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-primary">Monto</label>
                    <input type="number" step="any" range="100" class="form-control" name="monto" id="monto" tabindex="2">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-primary" >Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" tabindex="3">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-primary">Tipo</label>
                    <select class="form-control" name="tipo" id="tipo" tabindex="4">
                        <option value="" selected disabled hidden>Tipo</option>
                        <option value="ingreso">ingreso</option>
                        <option value="egreso">egreso</option>
                    </select>
                </div>
                <!-- <a href="/api/operaciones" class="btn btn-secondary" tabindex="5">Cancelar</a> -->
                <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
            </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection