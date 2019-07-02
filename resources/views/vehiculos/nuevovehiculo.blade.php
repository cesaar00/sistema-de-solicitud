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
    <form method ="POST" action=" {{route('vehiculo.store')}} ">
        @csrf
        <div class="form-group">
                <label for="nombre_vehiculo">Nombre del Vehiculo</label>
                <input type="text" class="form-control" name="nombre_vehiculo" value=" {{old('nombre_vehiculo')}}"  placeholder="Ingrese el Nombre del Vehiculo">
              </div>
        <div class="form-group">
                <label for="capacidad_tanque_gasolina">Capacidad del  Tanque del Vehiculo</label>
                <input type="integer" class="form-control" name="capacidad_tanque_gasolina" value=" {{old('capacidad_tanque_gasolina')}}"  placeholder="Ingrese la Capacidad del Tanque de Gasolina">
              </div>
              <div class="form-group">
                    <label for="tipo_gasolina">Seleccione Tipo Gasolina</label>
                    <select class="browser-default custom-select" name="tipo_gasolina">
                        <option value="Magna">Magna</option>
                        <option value="Premium">Premium</option>
                        <option value="Diesel">Diesel</option>
                    </select>
                </div>
        <div class="form-group">
            <label for="modelo_vehiculo">Modelo del Vehiculo</label>
            <input type="integer" class="form-control" name="modelo_vehiculo"   value=" {{old('modelo_vehiculo')}}"  placeholder="Ingrese el Modelo del Vehiculo">
        </div>
        {{-- <div class="form-group">
            <label for="descripcion_vehiculo">Descripcion del Vehiculo</label>
            <input type="text" class="form-control" name="descripcion_vehiculo" value=" {{old('descripcion_vehiculo')}}"  placeholder="Ingrese Descripcion del Vehiculo">
        </div> --}}
        <div class="form-group">
                <label for="descripcion_vehiculo">Descripcion del Vehiculo</label>
                <textarea class="form-control" name="descripcion_vehiculo" rows="3"></textarea>
              </div>
              <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary "> Guardar</button>
                    <a class="btn btn-secondary " href=" {{route('vehiculo.index')}}">Regresar</a>
              </div>
      </form>
</div>
@endsection
