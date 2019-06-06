@extends('layouts/app')
.@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre del Automovil</th>
                    <th scope="col">Capacidad del Tanque de Gasolina</th>
                    <th scope="col">Tipo de Gasolina</th>
                    <th scope="col">Modelo del Automovil</th>
                    <th scope="col">Descripcion del Automovil</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($vehiculos as $vehiculo)
                      <tr>
                          <td> {{$vehiculo->nombre_vehiculo}} </td>
                          <td> {{$vehiculo->capacidad_tanque_gasolina}} </td>
                          <td> {{$vehiculo->tipo_gasolina}} </td>
                          <td> {{$vehiculo->modelo_vehiculo}} </td>
                          <td> {{$vehiculo->descripcion_vehiculo}} </td>
                          <td>
                               <a href="{{route('vehiculo.edit', $vehiculo->id)}}">Editar</a>
                          <td>
                              <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('vehiculo.create')}} " class="btn btn-primary">Crear</a>
              {{$vehiculos->links()}}
</div>
@endsection
