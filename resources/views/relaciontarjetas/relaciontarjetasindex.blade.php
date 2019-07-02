@extends('layouts/app')
@section('content')
<div class="container">
        @if ($message=Session::get('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{$message}}</p>
        <a type="a" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
              </div>
        @endif

        <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Tipo de Gasolina</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Fecha de Carga</th>
                    <th scope="col">Litros</th>
                    <th scope="col">Precio Unitario</th>
                    @role('administrator')
                    <th scope="col">Estado</th>
                    @endrole


                  </tr>
                </thead>
                <tbody>
                  @foreach ($relaciontarjetas as $relaciontarjeta)
                      <tr>
                          <td> {{$relaciontarjeta->solicitante}}</td>
                          <td> {{$relaciontarjeta->monto}} </td>
                          {{-- @if (empty($relaciontarjeta->tarjeta->benefactor))
                              <td>si</td>
                          @else
                              no
                          @endif --}}

                          <td> {{$relaciontarjeta->tarjeta ? $relaciontarjeta->tarjeta->benefactor : $relaciontarjeta->id_tarjeta }} </td>
                          <td> {{$relaciontarjeta->tipo_gasolina}} </td>
                          <td> {{$relaciontarjeta->vehiculo ? $relaciontarjeta->vehiculo->nombre_vehiculo : $relaciontarjeta->id_vehiculo }} </td> </td>
                          <td> {{$relaciontarjeta->fecha_carga}} </td>
                          <td> {{$relaciontarjeta->litros}} </td>
                          <td>
                               {{round($relaciontarjeta->monto / $relaciontarjeta->litros, 2)}}
                          </td>
                          @role('administrator')
                          <td>
                          @if ($relaciontarjeta->aprobado == 2)
                          Rechazada
                          @elseif($relaciontarjeta->aprobado == 1)
                          Aprobada
                                @else
                                <a href=" {{route('relaciontarjetum.aprobar',$relaciontarjeta->id)}}"
                                    class="btn btn-primary btn-sm">
                                    Aprobar
                                  </a>
                                  <a href=" {{route('relaciontarjetum.cancelar',$relaciontarjeta->id)}}"
                                      class="btn btn-dark btn-sm">
                                      Cancelar
                                    </a>
                                @endif
                            </td>
                                @endrole
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('relaciontarjeta.create')}} " class="btn btn-primary">Crear</a>
              {{-- {{$relaciontarjetas->links()}} --}}
</div>
@endsection
