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
                    @role ('administrador')
                    <td scope="col">Acciones</td>
                    @endrole
                  </tr>
                </thead>
                <tbody>
                  @foreach ($abonos as $abono)
                      <tr>
                          <td> {{$abono->folio}} </td>
                          <td class="text-right"> ${{$abono->monto}} </td>
                          <td> {{$abono->fecha}} </td>
                          <td> {{$abono->benefactor}} </td>
                          @role('administrador')
                          <td>
                              @if ($abono->estado == 2)
                              Rechazada
                              @elseif($abono->estado == 1)
                              Aprobada
                              @else
                              <a href=" {{route('abono.aprobar',$abono->id)}}"
                                  class="btn btn-primary btn-sm">
                                  Aprobar
                              </a>
                              <a href=" {{route('abono.cancelar',$abono->id)}}"
                                  class="btn btn-dark btn-sm">
                                  Cancelar
                              </a>
                              @endif
                          </td>
                          @endrole
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
              @role('administrador')
              <a href=" {{route('abono.create')}} " class="btn btn-primary">Crear</a>
              @endrole
              {{-- {{$abonos->links()}} --}}
</div>
@endsection
