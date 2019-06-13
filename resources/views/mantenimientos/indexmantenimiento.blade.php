@extends('layouts/app')
@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre del Vehiculo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Fecha del Mantenimiento</th>
                    <th scope="col">Fecha Proxima</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Costo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mantenimientos as $mantenimiento)
                      <tr>
                          <td> {{$mantenimiento->id_vehiculo}} </td>
                          <td> {{$mantenimiento->descripcion}} </td>
                          <td> {{$mantenimiento->kilometraje}} </td>
                          <td> {{$mantenimiento->fecha}} </td>
                          <td> {{$mantenimiento->fecha_prox}} </td>
                          <td> {{$mantenimiento->observaciones}} </td>
                          <td> {{$mantenimiento->costo}} </td>
                          <td>
                              <form action="{{route('mantenimiento.destroy', $mantenimiento->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('mantenimiento.create')}} " class="btn btn-primary">Crear</a>
              {{$mantenimientos->links()}}
</div>
@endsection
