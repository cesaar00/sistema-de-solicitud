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

        <div class="row">

            <div class="form-group col-md-3 font-weight-bold">
                    <label for="numero_tarjeta">Numero de Tarjeta</label>
                    <input type="integer" class="form-control" name="numero_tarjeta" value=" {{old('numero_tarjeta')}}"  placeholder="Ingrese el tipo de monedero">
            </div>
                  <div class="form-group col-md-3 font-weight-bold">
                        <label for="id_tarjeta">Seleccione Tipo Monedero</label>
                        <select class="browser-default custom-select" name="tipo_monedero">
                            <option value="Debito">Debito</option>
                            <option value="Credito">Credito</option>
                        </select>
                  </div>
            <div class="form-group col-md-3 font-weight-bold">
                <label for="saldo">Saldo</label>
                <input type="integer" class="form-control" name="saldo"   value=" {{old('saldo')}}"  placeholder="Ingrese Saldo de la Tarjeta">
            </div>
            <div class="form-group col-md-3 font-weight-bold">
                <label for="benefactor">Proveedor</label>
                <input type="text" class="form-control" name="benefactor" value=" {{old('benefactor')}}"  placeholder="Ingrese el Benefactor">
            </div>


        </div>
        <div class="form-group text-right">
                <button type="submit" class="btn btn-primary "> Guardar</button>
                <a class="btn btn-secondary " href=" {{route('tarjeta.index')}}">Regresar</a>
        </div>
      </form>
</div>
@endsection
