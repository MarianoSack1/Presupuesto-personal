@extends('layouts.plantillaBase')

@section('contenido')
<h1 class="bg-secondary text-white text-center p-3">Presupuesto</h1>
<div>
                 <h2 class="bg-warning text-dark text-center p-3" >Balance actual: {{$balance}} pesos</h2>

</div>
<a href="operaciones/create" class="btn btn-primary">Crear</a>
<table class="table table-dark table-striped mt-4">
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
@endsection