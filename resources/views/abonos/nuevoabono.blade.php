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
            <label for="fecha">Fecha</label>
            <input type="text" class="form-control" name="fecha"   value=" {{old('fecha')}}"  placeholder="Ingrese fecha del Abono">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" value=" {{old('estado')}}"  placeholder="Ingrese el estado">
        </div>
        <div class="form-group">
                <label for="id_tarjeta">Seleccione Benefactor</label>
                <select class="browser-default custom-select" name="id_tarjeta">
                    @foreach ($tarjetas as $tarjeta)
                    <option value="{{$tarjeta->id}}">{{$tarjeta->benefactor}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
