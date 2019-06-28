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
    <form method ="POST" action=" {{route('tarjeta.store')}} ">
        @csrf
        <div class="form-group">
                <label for="numero_tarjeta">Numero de Tarjeta</label>
                <input type="integer" class="form-control" name="numero_tarjeta" value=" {{old('numero_tarjeta')}}"  placeholder="Ingrese el tipo de monedero">
              </div>
              <div class="form-group">
                    <label for="id_tarjeta">Seleccione Tipo Monedero</label>
                    <select class="browser-default custom-select" name="tipo_monedero">
                        <option value="Debito">Debito</option>
                        <option value="Credito">Credito</option>
                    </select>
                </div>
        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="integer" class="form-control" name="saldo"   value=" {{old('saldo')}}"  placeholder="Ingrese Saldo de la Tarjeta">
        </div>
        <div class="form-group">
            <label for="benefactor">Proveedor</label>
            <input type="text" class="form-control" name="benefactor" value=" {{old('benefactor')}}"  placeholder="Ingrese el Benefactor">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
