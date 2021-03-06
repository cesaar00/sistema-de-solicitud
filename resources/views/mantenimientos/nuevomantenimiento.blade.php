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
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
        </div>
    @endif
    <form method ="POST" action=" {{route('mantenimiento.store')}} ">
        @csrf
        <div class="row ">

            <div class="form-group col-md-4 font-weight-bold">
                    <label for="id_vehiculo">Seleccione Vehiculo</label>
                    <select class="browser-default custom-select" name="id_vehiculo">
                        @foreach ($vehiculos as $vehiculo)
                        <option value="{{$vehiculo->id}}">{{$vehiculo->nombre_vehiculo}}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group col-md-4 font-weight-bold">
              <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control" name="descripcion" value=" {{old('descripcion')}}"  placeholder="Ingrese una Descripcion">
            </div>

            <div class="form-group col-md-4 font-weight-bold">
                <label for="kilometraje">kilometraje</label>
                <input type="integer" class="form-control" name="kilometraje"   value=" {{old('kilometraje')}}"  placeholder="Ingrese kilometraje del vehiculo">
            </div>



            <div class="form-group col-md-4 font-weight-bold">
                    <label for="tipo">Tipo</label>
                    <select class="browser-default custom-select" name="tipo">
                        <option value="0">Enviar  Mantenimiento</option>
                        <option value="1">Disponible para Circular</option>
                    </select>
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                    <label for="id_vehiculo">Fecha Asignada al Mantenimiento</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="fecha" />
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-4 font-weight-bold">
                    <label for="fecha_prox">Fecha del Proximo Mantenimiento</label>
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="fecha_prox" />
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-4  font-weight-bold text-right">
                <label for="agencia">Agencia</label>
                <input type="text" class="form-control" name="agencia" value=" {{old('agencia')}}"  placeholder="Ingrese una Descripcion">
              </div>


              <div class="form-group col-md-4 font-weight-bold">
                  <label for="observaciones">Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" value=" {{old('observaciones')}}"  placeholder="Ingrese observaciones">
              </div>

              <div class="form-group col-md-4 font-weight-bold">
                  <label for="costo">Costo</label>
                  <input type="integer" class="form-control" name="costo" value=" {{old('costo')}}"  placeholder="Ingrese el costo">
              </div>



            </div>
                  <div class="form-group  text-right">
                          <button type="submit" class="btn btn-primary "> Guardar</button>
                          <a class="btn btn-secondary " href=" {{route('mantenimiento.index')}}">Regresar</a>
                  </div>




      </form>
</div>
@endsection
