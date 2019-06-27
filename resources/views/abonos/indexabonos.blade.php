@extends('layouts/app')
@section('content')
<div class="container">
        <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Proveedor</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($abonos as $abono)
                      <tr>
                          <td> {{$abono->folio}} </td>
                          <td> {{$abono->monto}} </td>
                          <td> {{$abono->fecha}} </td>
                          <td> {{$abono->benefactor}} </td>
                          {{-- <td>
                              <form action="{{route('abono.destroy', $abono->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td> --}}
                      </tr>
                  @endforeach
                </tbody>
              </table>
              @role('administrator')
              <a href=" {{route('abono.create')}} " class="btn btn-primary">Crear</a>
              @endrole
              {{-- {{$abonos->links()}} --}}
</div>
@endsection
