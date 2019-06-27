@extends('layouts/app')
@section('content')
<div class="container">
        <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Numero de Tarjeta</th>
                    <th scope="col">Tipo Monedero</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Benefactor</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tarjetas as $tarjeta)
                      <tr>
                          <td> {{$tarjeta->numero_tarjeta}} </td>
                          <td> {{$tarjeta->tipo_monedero}} </td>
                          <td> {{$tarjeta->saldo}} </td>
                          <td> {{$tarjeta->benefactor}} </td>
                          <td>
                                @role('administrator')

                                @componente([
                                    'route'=>'tarjeta',
                                    'id'=>$tarjeta->id,
                                    'name'=> $tarjeta->benefactor,
                                ])
                                @endcomponente
                                @endrole
                            </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('tarjeta.create')}} " class="btn btn-primary">Crear</a>
              {{$tarjetas->links()}}
</div>
@endsection
