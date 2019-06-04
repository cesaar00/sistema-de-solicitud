@extends('layouts/app')
.@section('content')
<div class="container">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">litros</th>
                    <th scope="col">Id_chofer</th>
                    <th scope="col">id_automovil</th>
                    <th scope="col">id_admin</th>
                    <th scope="col">estado</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($vales as $vale)
                      <tr>
                          <td> {{$vale->litros}} </td>
                          <td> {{$vale->id_chofer}} </td>
                          <td> {{$vale->id_automovil}} </td>
                          <td> {{$vale->id_admin}} </td>
                          <td> {{$vale->estado}} </td>
                          <td>
                              <form action="{{route('vale.destroy', $vale->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link">Eliminar</button>
                            </form></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <a href=" {{route('vale.create')}} " class="btn btn-primary">Crear</a>
              {{$vales->links()}}
</div>
@endsection
