@extends('layouts/app')
.@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Monto</th>
                    <th scope="col">Tarjeta</th>
                    <th scope="col">Tipo de Gasolina</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Fecha de Carga</th>
                    <th scope="col">Litros</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($relaciontarjetas as $relaciontarjeta)
                      <tr>
                          <td> {{$relaciontarjeta->monto}} </td>
                          <td> {{$relaciontarjeta->benefactor}} </td>
                          <td> {{$relaciontarjeta->tipo_gasolina}} </td>
                          <td> {{$relaciontarjeta->nombre_vehiculo}} </td>
                          <td> {{$relaciontarjeta->fecha_carga}} </td>
                          <td> {{$relaciontarjeta->litros}} </td>
                          <td>
                            @role('administrator')

                            @componente([
                                'route'=>'relaciontarjeta',
                                'id'=>$relaciontarjeta->id,
                                'name'=> $relaciontarjeta->nombre_vehiculo,
                            ])
                            @endcomponente
                            @endrole</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('relaciontarjeta.create')}} " class="btn btn-primary">Crear</a>
              {{-- {{$relaciontarjetas->links()}} --}}
</div>
@endsection
