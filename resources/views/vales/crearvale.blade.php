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
    <form method ="POST" action=" {{route('vale.store')}} ">
        @csrf
        <div class="form-group">
          <label for="litros">Litros</label>
          <input type="integer" class="form-control" name="litros" value=" {{old('litros')}}"  placeholder="Ingrese Litros">
        </div>
        <div class="form-group">
            <label for="id_chofer">id_chofer</label>
            <input type="integer" class="form-control" name="id_chofer"   value=" {{old('id_chofer')}}"  placeholder="Ingrese id Chofer">
        </div>
        <div class="form-group">
            <label for="id_automovil">id_automovil</label>
            <input type="integer" class="form-control" name="id_automovil" value=" {{old('id_automovil')}}"  placeholder="Ingrese id Automovil">
        </div>
        <div class="form-group">
            <label for="id_admin">id_admin</label>
            <input type="integer" class="form-control" name="id_admin" value=" {{old('id_admin')}}"  placeholder="Ingrese id Admin">
        </div>
        <div class="form-group">
            <label for="estado">estado</label>
            <input type="integer" class="form-control" name="estado" value=" {{old('estado')}}"  placeholder="Ingrese Estado">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
