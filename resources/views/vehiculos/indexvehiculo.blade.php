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
                          @role('administrator')

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
              <a href=" {{route('vehiculo.create')}} " class="btn btn-primary">Crear</a>
              {{$vehiculos->links()}}
</div>

@endsection
