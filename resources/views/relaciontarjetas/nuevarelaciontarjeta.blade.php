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
    <form method ="POST" action=" {{route('relaciontarjeta.store')}} ">
        @csrf
        <div class="form-group">
                <label for="monto">Monto</label>
                <input type="integer" class="form-control" name="monto" value=" {{old('monto')}}"  placeholder="Ingrese el Monto Cargado">
              </div>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  @foreach ($tarjetas as $tarjeta)
                  <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> {{$tarjeta->benefactor}}
                      </label>
                  @endforeach

            </div>
        <div class="form-group">
            <label for="tipo_gasolina">Tipo de Gasolina</label>
            <input type="integer" class="form-control" name="tipo_gasolina"   value=" {{old('tipo_gasolina')}}"  placeholder="Ingrese tipo Gasolina ">
        </div>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @foreach ($vehiculos as $vehiculo)
                <label class="btn btn-secondary active">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked> {{$vehiculo->nombre_vehiculo}}
                    </label>
                @endforeach

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
