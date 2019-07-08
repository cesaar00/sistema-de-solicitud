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

    @if ($message=Session::get('infono'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{$message}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
          </div>
    @endif

          <div class="card">
              <div class="card-header">Registro de los Vehiculos</div>
              <div class="card-body">
                    <table id="example" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Estatus</th>
                                <th scope="col">Nombre del Automovil</th>
                                <th scope="col">Capacidad del Tanque de Gasolina</th>
                                <th scope="col">Tipo de Gasolina</th>
                                <th scope="col">Modelo del Automovil</th>
                                <th scope="col">Descripcion del Automovil</th>
                                @role ('administrador')
                                <th scope="col">Acciones</th>
                                @endrole
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>
                                        {{$vehiculo->disponible ? 'Disponible' : 'En Mantenimiento'}}
                                    </td>
                                    <td> {{$vehiculo->nombre_vehiculo}} </td>
                                    <td class="text-right"> {{$vehiculo->capacidad_tanque_gasolina}} </td>
                                    <td> {{$vehiculo->tipo_gasolina}} </td>
                                    <td class="text-right"> {{$vehiculo->modelo_vehiculo}} </td>
                                    <td> {{$vehiculo->descripcion_vehiculo}} </td>
                                      @role('administrador')

                                      @componente([
                                      'route'=>'vehiculo',
                                      'id'=>$vehiculo->id,
                                      'name'=> $vehiculo->nombre_vehiculo,
                                      ])
                                      @endcomponente
                                      @endrole
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          @role ('administrador')
                          <a href=" {{route('vehiculo.create')}} " class="btn btn-primary">Crear</a>
                          {{$vehiculos->links()}}
                          @endrole

              </div>
          </div>

</div>

@endsection
