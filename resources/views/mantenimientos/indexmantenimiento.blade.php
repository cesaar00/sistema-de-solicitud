@extends('layouts/app')
@section('content')
<div class="container">
        <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Fecha </th>
                    <th scope="col">Fecha Proxima</th>
                    <th scope="col">Agencia</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Costo</th>
                    @role ('administrador')
                    <th scope="col">Acciones</th>
                    @endrole
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mantenimientos as $mantenimiento)
                      <tr>
                          <td> {{$mantenimiento->vehiculo}} </td>
                          <td> {{$mantenimiento->descripcion}} </td>
                          <td class="text-right"> {{$mantenimiento->kilometraje}} </td>
                          <td> {{$mantenimiento->tipo ? 'Disponible para Circular': 'Enviar a Mantenimento'}}</td>
                          <td> {{$mantenimiento->fecha}} </td>
                          <td> {{$mantenimiento->fecha_prox}} </td>
                          <td> {{$mantenimiento->agencia}} </td>
                          <td> {{$mantenimiento->observaciones}} </td>
                          <td class="text-right"> ${{$mantenimiento->costo}} </td>

                          @role('administrador')
                          <td>
                              @if ($mantenimiento->estado == 0)
                              <a href=" {{route('mantenimiento.aprobar', $mantenimiento->id)}} "
                                  class="btn btn-primary btn-sm">
                                  Aprobar
                              </a>
                              <form action="{{route('mantenimiento.destroy', $mantenimiento->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm">Eliminar</button>
                              </form>
                              @endif
                          </td>
                          @endrole

                      </tr>
                  @endforeach
                </tbody>
              </table>
             @role('administrador')
              <a href=" {{route('mantenimiento.create')}} " class="btn btn-primary">Crear</a>
             {{--  {{$mantenimientos->links()}} --}}
             @endrole
</div>
@endsection
