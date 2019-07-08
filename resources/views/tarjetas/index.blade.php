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
        @if ($message=Session::get('infono'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{$message}}</p>
        <a type="a" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
              </div>
        @endif

        <div class="card">

           <div class="card-header">
               Tarjetas
           </div>
           <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Numero de Tarjeta</th>
                            <th scope="col">Tipo Monedero</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Proveedor</th>
                            @role ('administrador')
                            <th scope="col">Acciones</th>
                            @endrole
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tarjetas as $tarjeta)
                              <tr>
                                  <td> {{$tarjeta->numero_tarjeta}} </td>
                                  <td> {{$tarjeta->tipo_monedero}} </td>
                                  <td class="text-right"> ${{$tarjeta->saldo}} </td>
                                  <td> {{$tarjeta->benefactor}} </td>
                                        @role('administrador')

                                        @componente([
                                            'route'=>'tarjeta',
                                            'id'=>$tarjeta->id,
                                            'name'=> $tarjeta->benefactor,
                                        ])
                                        @endcomponente
                                        @endrole
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @role ('administrador')
                      <a href=" {{route('tarjeta.create')}} " class="btn btn-primary">Crear</a>
                      {{$tarjetas->links()}}
                      @endrole
           </div>
        </div>
</div>
@endsection
