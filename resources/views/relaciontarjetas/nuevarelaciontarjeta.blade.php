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
    @if ($message=Session::get('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <p>{{$message}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
        </div>
        @endif
    <form method ="POST" action=" {{route('relaciontarjeta.store')}} ">
        @csrf
        <div class="form-group">
                <label for="monto">Monto</label>
                <input type="integer" class="form-control" name="monto" value=" {{old('monto')}}"  placeholder="Ingrese el Monto Cargado">
              </div>
                <div class="form-group">
                    <label for="id_tarjeta">Seleccione Benefactor</label>
                    <select class="browser-default custom-select" name="id_tarjeta">
                        @foreach ($tarjetas as $tarjeta)
                        <option value="{{$tarjeta->id}}">{{$tarjeta->benefactor}}</option>
                        @endforeach
                    </select>
                </div>


        <div class="form-group">
            <label for="tipo_gasolina">Tipo de Gasolina</label>
            <input type="integer" class="form-control" name="tipo_gasolina"   value=" {{old('tipo_gasolina')}}"  placeholder="Ingrese tipo Gasolina ">
        </div>
            <div class="form-group">
                <label for="id_vehiculo">Seleccione Benefactor</label>
                <select class="browser-default custom-select" name="id_vehiculo">
                    @foreach ($vehiculos as $vehiculo)
                    <option value="{{$vehiculo->id}}">{{$vehiculo->nombre_vehiculo}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <label for="fecha_carga">Fecha de Carga</label>
            <input type="integer" class="form-control" name="fecha_carga" value=" {{old('fecha_carga')}}"  placeholder="Ingrese la Fecha de Carga">
          </div>
    <div class="form-group">
            <div class="form-group">
                    <label for="litros">Litros</label>
                    <input type="integer" class="form-control" name="litros" value=" {{old('litros')}}"  placeholder="Ingrese los Litros Cargados">
                  </div>
            <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
