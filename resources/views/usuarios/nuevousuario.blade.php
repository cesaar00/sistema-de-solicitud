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
    <form method ="POST" action=" {{route('user.store')}} ">
        @csrf
        <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value=" {{old('name')}}"  placeholder="Ingrese el name">
              </div>
        <div class="form-group">
          <label for="lastname">Apellido</label>
          <input type="text" class="form-control" name="lastname" value=" {{old('lastname')}}"  placeholder="Ingrese el lastname">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email"   value=" {{old('email')}}"  placeholder="Ingrese email del Abono">
        </div>
        <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password"   value=""  placeholder="Ingrese contraseña">
            </div>
            <div class="form-group">
                    <label for="password1">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="password1"   value=""  placeholder="Ingrese la contraseña otravez">
                </div>
        <div class="form-group">
                <label for="role_id">Seleccione Rol</label>
                <select class="browser-default custom-select" name="role_id">
                    @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
