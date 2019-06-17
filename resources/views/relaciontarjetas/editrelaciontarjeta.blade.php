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
    <form method ="POST" action=" {{route('relaciontarjeta.update', $relaciontarjetum->id)}} ">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="monto">Monto</label>
                <input type="integer" class="form-control" name="monto" value=" {{$relaciontarjetum->monto}}"  placeholder="Ingrese el monto">
              </div>
        <div class="form-group">
                <label for="benefactor">Benefactor</label>
                <input type="text" class="form-control" name="benefactor" value=" {{$relaciontarjetum->benefactor}}"  placeholder="Ingrese la Capacidad del Tanque de Gasolina">
              </div>
        <div class="form-group">
          <label for="tipo_gasolina">Tipo de Gasolina</label>
          <input type="text" class="form-control" name="tipo_gasolina" value=" {{$relaciontarjetum->tipo_gasolina}}"  placeholder="Ingrese el tipo de Gasolina">
        </div>
        <div class="form-group">
            <label for="nombre_vehiculo">Nombre Vehiculo</label>
            <input type="text" class="form-control" name="nombre_vehiculo"   value=" {{$relaciontarjetum->nombre_vehiculo}}"  placeholder="Ingrese el Nombre del Vehiculo">
        </div>
         <div class="form-group">
            <label for="fecha_carga">Fecha de Carga</label>
            <input type="text" class="form-control" name="fecha_carga" value=" {{$relaciontarjetum->fecha_carga}}"  placeholder="Ingrese la Fecha de Carga">
        </div>
        <div class="form-group">
            <label for="litros">Litros</label>
            <input type="integer" class="form-control" name="litros" value=" {{$relaciontarjetum->litros}}"  placeholder="Ingrese los Litros">
        </div>

        <button type="submit" class="btn btn-primary">Confirmar</button>
      </form>
</div>
@endsection
