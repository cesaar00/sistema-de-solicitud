@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message=Session::get('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{$message}}</p>
        <a type="a" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <a href="" class="btn ptn-primary pull-right">Nuevo usuario</a> --}}
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20px">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo electrónico</th>
                                @role ('administrator')
                                <th scope="col">Acciones</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                @role('administrator')

                                @componente([
                                    'route'=>'user',
                                    'id'=>$user->id,
                                    'name'=> $user->name,
                                ])
                                @endcomponente

                                @endrole
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @role ('administrator')
                    <a href=" {{route('user.create')}} " class="btn btn-primary">Crear</a>
                    @endrole
                </div>
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
