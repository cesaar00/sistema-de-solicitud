@extends('layouts/app')
@section('content')
<div class="container">
    @if ($message=Session::get('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{$message}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
          </div>
    @endif
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

                                <button class="btn btn-link"
                                    type="button"
                                    rel="tooltip"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-name="{{$vehiculo->nombre_vehiculo}}"
                                    data-id="{{$vehiculo->id}}">Eliminar</button>
                            </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('vehiculo.create')}} " class="btn btn-primary">Crear</a>
              {{$vehiculos->links()}}
</div>
<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="modalbody"></p>
            </div>
            <div class="modal-footer">
            <form action=" {{route('vehiculo.destroy', 'null')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" id="deleteId" name="id">
            <button type="submit" class="btn btn-primary" id="deletebutton">Eliminar</button>

            </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
@endsection
