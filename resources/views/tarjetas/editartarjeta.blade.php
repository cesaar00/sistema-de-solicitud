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
    <form method ="POST" action=" {{route('tarjeta.update', $tarjetum->id)}} ">
        @csrf
        @method('PUT')

        <div class="row">


                <div class="form-group col-md-3">
                    <label for="numero_tarjeta">Numero de Tarjeta</label>
                    <input type="integer" class="form-control" name="numero_tarjeta" value=" {{$tarjetum->numero_tarjeta}}"  placeholder="Ingrese el tipo de monedero">
                </div>
                <div class="form-group col-md-3">
                    <label for="tipo_monedero">Tipo de monedero</label>
                    <input type="text" class="form-control" name="tipo_monedero" value=" {{$tarjetum->tipo_monedero}}"  placeholder="Ingrese el tipo de monedero">
                </div>
                <div class="form-group col-md-3">
                    <label for="saldo">Saldo</label>
                    <input type="integer" class="form-control" name="saldo"   value=" {{$tarjetum->saldo}}"  placeholder="Ingrese Saldo de la Tarjeta">
                </div>
                <div class="form-group col-md-3">
                    <label for="benefactor">Proveedor</label>
                    <input type="text" class="form-control" name="benefactor" value=" {{$tarjetum->benefactor}}"  placeholder="Ingrese el Benefactor">
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </form>
</div>
@endsection
