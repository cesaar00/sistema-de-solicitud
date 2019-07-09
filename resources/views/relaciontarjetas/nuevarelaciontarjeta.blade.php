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

        <div class="row ">


            <div class="form-group col-md-4 font-weight-bold">
                    <label for="monto">Monto</label>
                    <input type="integer" class="form-control" name="monto" value=" {{old('monto')}}"  placeholder="Ingrese el Monto Cargado">
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                <label for="id_tarjeta">Seleccione Proveedor</label>
                <select class="browser-default custom-select" name="id_tarjeta">
                    @foreach ($tarjetas as $tarjeta)
                    <option value="{{$tarjeta->id}}">{{$tarjeta->benefactor}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                    <label for="tipo_gasolina">Seleccione Tipo Gasolina</label>
                    <select class="browser-default custom-select" name="tipo_gasolina">
                        <option value="Magna">Magna</option>
                        <option value="Premium">Premium</option>
                        <option value="Diesel">Diesel</option>
                    </select>
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                <label for="id_vehiculo">Seleccione Vehiculo</label>
                <select class="browser-default custom-select" name="id_vehiculo">
                    @foreach ($vehiculos as $vehiculo)
                    <option value="{{$vehiculo->id}}">{{$vehiculo->nombre_vehiculo}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                    <label for="id_vehiculo">Fecha de carga</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="fecha_carga" />
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>


                <div class="form-group col-md-4 font-weight-bold">
                    <label for="litros">Litros</label>
                    <input type="integer" class="form-control" name="litros" value=" {{old('litros')}}"  placeholder="Ingrese los Litros Cargados">
                </div>


       </div>

                <div class="form-group  text-right">
                    <button type="submit" class="btn btn-primary "> Guardar</button>
                    <a class="btn btn-secondary " href=" {{route('relaciontarjeta.index')}}">Regresar</a>
                </div>


    </form>
</div>
@endsection
