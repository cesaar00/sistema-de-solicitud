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
        <a type="a" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
    @endif
    <form method="POST" action=" {{route('user.storemypass')}} ">
        @csrf
        {{-- @method('POST') --}}

        <h5 class="text-center">Editar contraseña de {{$user->name}} </h5>

        <div class="row text-center">
                <div class="form-group col-md-4 font-weight-bold text-center">
                        <label for="name">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                    </div>


                    <div class="form-group col-md-4 font-weight-bold text-center">
                            <label for="lastname">Confirmar contraseña</label>
                            <input type="password" class="form-control" name="password1">
                        </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
            <a class="btn btn-secondary" href=" {{route('user.index')}}">Regresar</a>
        </div>

    </form>
</div>
@endsection
