@extends('layouts/app')
@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Benefactor</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($abonos as $abono)
                      <tr>
                          <td> {{$abono->folio}} </td>
                          <td> {{$abono->monto}} </td>
                          <td> {{$abono->estado}} </td>
                          <td> {{$abono->fecha}} </td>
                          <td> {{$abono->id_tarjeta}} </td>
                          <td>
                              <form action="{{route('abono.destroy', $abono->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('abono.create')}} " class="btn btn-primary">Crear</a>
              {{$abonos->links()}}
</div>
@endsection
