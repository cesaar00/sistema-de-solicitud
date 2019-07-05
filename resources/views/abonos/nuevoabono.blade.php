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
    <form method ="POST" action=" {{route('abono.store')}} ">
        @csrf
        <div class="form-group">
                <label for="folio">Folio</label>
                <input type="integer" class="form-control" name="folio" value=" {{old('folio')}}"  placeholder="Ingrese el folio">
              </div>
        <div class="form-group">
          <label for="monto">Monto</label>
          <input type="integer" class="form-control" name="monto" value=" {{old('monto')}}"  placeholder="Ingrese el Monto">
        </div>
        <div class="form-group">
                <label for="id_vehiculo">Fecha </label>
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="fecha" />
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        {{-- <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" value=" {{old('estado')}}"  placeholder="Ingrese el estado">
        </div> --}}
        <div class="form-group">
                <label for="id_tarjeta">Seleccione Proveedor</label>
                <select class="browser-default custom-select" name="id_tarjeta">
                    @foreach ($tarjetas as $tarjeta)
                    <option value="{{$tarjeta->id}}">{{$tarjeta->benefactor}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary "> Guardar</button>
                    <a class="btn btn-secondary " href=" {{route('abono.index')}}">Regresar</a>
            </div>
      </form>
</div>
@endsection
