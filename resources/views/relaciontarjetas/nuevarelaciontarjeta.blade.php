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
                <label for="id_vehiculo">Seleccione Vehiculo</label>
                <select class="browser-default custom-select" name="id_vehiculo">
                    @foreach ($vehiculos as $vehiculo)
                    <option value="{{$vehiculo->id}}">{{$vehiculo->nombre_vehiculo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                    <label for="id_vehiculo">Fecha de carga</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="fecha_carga" />
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
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
