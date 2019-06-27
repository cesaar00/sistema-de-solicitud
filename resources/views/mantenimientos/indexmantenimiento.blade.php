@extends('layouts/app')
@section('content')
<div class="container">
        <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Fecha </th>
                    <th scope="col">Fecha Proxima</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Costo</th>
                    @role ('administrator')
                    <th scope="col">Acciones</th>
                    @endrole
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mantenimientos as $mantenimiento)
                      <tr>
                          <td> {{$mantenimiento->vehiculo}} </td>
                          <td> {{$mantenimiento->descripcion}} </td>
                          <td> {{$mantenimiento->kilometraje}} </td>
                          <td> {{$mantenimiento->tipo ? 'Salida': 'Entrada'}}</td>
                          <td> {{$mantenimiento->fecha}} </td>
                          <td> {{$mantenimiento->fecha_prox}} </td>
                          <td> {{$mantenimiento->observaciones}} </td>
                          <td> {{$mantenimiento->costo}} </td>

                          @role('administrator')

                                @componente([
                                    'route'=>'mantenimiento',
                                    'id'=>$mantenimiento->id,
                                    'name'=> $mantenimiento->vehiculo,
                                ])
                                @endcomponente
                                @endrole
                      </tr>
                  @endforeach
                </tbody>
              </table>
             @role('administrator')
              <a href=" {{route('mantenimiento.create')}} " class="btn btn-primary">Crear</a>
             {{--  {{$mantenimientos->links()}} --}}
             @endrole
</div>
@endsection
