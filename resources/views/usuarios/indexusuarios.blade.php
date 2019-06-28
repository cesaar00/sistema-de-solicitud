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
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->email}}</td>
                                    @role('administrator')

                                    <td class="actions text-right" width="170px">

                                        <button class="btn btn-link" type="button" rel="tooltip" data-toggle="modal" data-target="#deleteModal"
                                            data-name="{{$user->name}}" data-id="{{$user->id}}">Eliminar
                                        </button>
                                    </td>
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
        <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalbody"></p>
                    </div>
                    <div class="modal-footer">
                        <form action=" {{route('user.destroy', 'null')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" id="deleteId" name="id">
                            <button type="submit" class="btn btn-primary" id="deletebutton">Eliminar</button>

                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
</div>
@endsection
