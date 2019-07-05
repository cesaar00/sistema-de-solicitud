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
    <form method ="POST" action=" {{route('vehiculo.update', $vehiculo->id)}} ">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="form-group col-md-3">
                    <label for="nombre_vehiculo">Nombre del Vehiculo</label>
                    <input type="text" class="form-control" name="nombre_vehiculo" value=" {{$vehiculo->nombre_vehiculo}}"  placeholder="Ingrese el Nombre del Vehiculo">
                  </div>
            <div class="form-group col-md-3">
                    <label for="capacidad_tanque_gasolina">Capacidad del  Tanque del Vehiculo</label>
                    <input type="integer" class="form-control" name="capacidad_tanque_gasolina" value=" {{$vehiculo->capacidad_tanque_gasolina}}"  placeholder="Ingrese la Capacidad del Tanque de Gasolina">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tipo_gasolina">Seleccione Tipo Gasolina</label>
                    <select class="browser-default custom-select" name="tipo_gasolina">
                        <option value="Magna">Magna</option>
                        <option value="Premium">Premium</option>
                        <option value="Diesel">Diesel</option>
                    </select>
            </div>
            <div class="form-group col-md-3">
                <label for="modelo_vehiculo">Modelo del Vehiculo</label>
                <input type="integer" class="form-control" name="modelo_vehiculo"   value=" {{$vehiculo->modelo_vehiculo}}"  placeholder="Ingrese el Modelo del Vehiculo">
            </div>
             <div class="form-group col-md-12">
                <label for="descripcion_vehiculo">Descripcion del Vehiculo</label>
                <textarea input type="text" class="form-control" name="descripcion_vehiculo" value=" {{$vehiculo->descripcion_vehiculo}}"  placeholder="Ingrese Descripcion del Vehiculo"></textarea>
            </div>


        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </form>
</div>
@endsection
