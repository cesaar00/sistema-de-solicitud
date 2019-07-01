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
    <form method="POST" action=" {{route('user.update', $user->id)}} ">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value=" {{$user->name}}">
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input type="text" class="form-control" name="lastname" value=" {{$user->lastname}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value=" {{$user->email}}">
        </div>
        <div class="form-group">
            <label for="role_id">Seleccione Rol</label>
            <select class="browser-default custom-select" name="role_id">
                @foreach ($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group text-right">
            <a class="btn btn-warning" href="{{route('user.editpass', $user->id)}}">Cambiar contraseña</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href=" {{route('user.index')}}">Regresar</a>
        </div>

    </form>
</div>
@endsection
