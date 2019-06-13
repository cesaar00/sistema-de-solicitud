@extends('layouts/app')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
             @foreach ($errors->all() as $error)
                 <li> {{$error}} </li>
             @endforeach
            </ul>
        </div>
    @endif
    <form method ="POST" action=" {{route('mantenimiento.store')}} ">
        @csrf
        <div class="form-group">
                <label for="id_vehiculo">Nombre del Vehiculo</label>
                <input type="integer" class="form-control" name="id_vehiculo" value=" {{old('id_vehiculo')}}"  placeholder="Ingrese el Nombre del Vehiculo">
              </div>
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <input type="text" class="form-control" name="descripcion" value=" {{old('descripcion')}}"  placeholder="Ingrese una Descripcion">
        </div>
        <div class="form-group">
            <label for="kilometraje">kilometraje</label>
            <input type="integer" class="form-control" name="kilometraje"   value=" {{old('kilometraje')}}"  placeholder="Ingrese kilometraje del vehiculo">
        </div>
        <div class="form-group">
            <label for="fecha">fecha del Mantenimiento</label>
            <input type="text" class="form-control" name="fecha" value=" {{old('fecha')}}"  placeholder="Ingrese la fecha">
        </div>
        <div class="form-group">
            <label for="fecha_prox">fecha Proxima</label>
            <input type="text" class="form-control" name="fecha_prox" value=" {{old('fecha_prox')}}"  placeholder="Ingrese la fecha proxima">
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <input type="text" class="form-control" name="observaciones" value=" {{old('observaciones')}}"  placeholder="Ingrese observaciones">
        </div>
        <div class="form-group">
            <label for="costo">fecha</label>
            <input type="integer" class="form-control" name="costo" value=" {{old('costo')}}"  placeholder="Ingrese el costo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
