@extends('layouts/app')
.@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tipo Monedero</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Benefactor</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tarjetas as $tarjeta)
                      <tr>
                          <td> {{$tarjeta->tipo_monedero}} </td>
                          <td> {{$tarjeta->saldo}} </td>
                          <td> {{$tarjeta->benefactor}} </td>
                          <td>
                              <form action="{{route('tarjeta.destroy', $tarjeta->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('tarjeta.create')}} " class="btn btn-primary">Crear</a>
              {{$tarjetas->links()}}
</div>
@endsection
