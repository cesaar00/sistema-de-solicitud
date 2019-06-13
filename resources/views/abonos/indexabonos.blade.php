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
                          <td> {{$abonos->folio}} </td>
                          <td> {{$abonos->monto}} </td>
                          <td> {{$abonos->estado}} </td>
                          <td> {{$abonos->fecha}} </td>
                          <td> {{$abonos->benefactor}} </td>
                          <td>
                              <form action="{{route('abonos.destroy', $abonos->id)}}" method="post">
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
