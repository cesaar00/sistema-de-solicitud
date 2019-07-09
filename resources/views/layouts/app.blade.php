<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sistema de solicitudes') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body class="
@yield('body','bg-crit')
">
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark shadow-sm crit-nav-color">
            <div class="container">
                @role('administrador')
                <a class="navbar-brand crit-color" href="{{ url('/user') }}">
                    {{ config('app.name', 'Sistema Control') }}
                </a>
                @endrole
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @role('administrador')
                        <li class="nav-item {{request()->is ('user*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('user.index')}} ">Usuarios <span
                            class="sr-only">(current)</span></a>
                        </li>
                        @endrole
                        <li class="nav-item {{request()->is ('tarjeta*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('tarjeta.index')}} ">Proveedor <span
                            class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{request()->is ('vehiculo*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('vehiculo.index')}}">Vehiculo <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{request()->is ('mantenimiento*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('mantenimiento.index')}}">Mantenimiento <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{request()->is ('abono*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('abono.index')}}">Cargo a Tarjeta <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{request()->is ('relaciontarjeta*') ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('relaciontarjeta.index')}}">Descuento a Tarjeta <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.editmypass') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('pass-form').submit();">
                                        {{ __('Cambiar contraseña') }}
                                    </a>
                                    {{-- <a class="dropdown-item" href="{{ route('user.editmypass') }}">Cambiar contraseña</a> --}}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="pass-form" action="{{ route('user.editmypass') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- Scripts --}}
    <script src="{{asset('./js/core/jquery.min.js')}}"></script>
    <script src="{{asset('./js/core/popper.min.js')}}"></script>
    <script src="{{asset('./js/core/moment.js')}}"></script>
    <script src="{{asset('./js/core/moment-es.js')}}"></script>
    <script src="{{asset('./js/core/bootstrap-material-design.min.js')}}"></script>
    <script src="{{asset('./js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('./js/plugins/sweetalert2.js')}}" ></script>
    <script src="{{asset('./js/plugins/tempusdominus-bootstrap-4.min.js')}}" ></script>
    <script src="{{asset('./js/plugins/datatables.min.js')}}" ></script>

    {{-- Script para el delete modal --}}
    <script>

        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nombrevehiculo = button.data('name')
        var id=button.data('id')
        var modal = $(this)
         modal.find('.modal-title').text('Eliminar ' + nombrevehiculo)
         modal.find('.modal-body #modalbody').text("Desea eliminar este registro")
         modal.find('.modal-footer #deleteId').val(id)
        })
    </script>

    {{-- Para las fechas --}}
    <script>
        $('#datetimepicker1').datetimepicker({
            format: 'L',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script>
    <script>
            $('#datetimepicker2').datetimepicker({
                format: 'L',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        </script>

    {{-- DataTable Library https://datatables.net/examples/styling/bootstrap4 --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                paging: false,
                select: true,
                language: {
                    info: "",
                }
            });
        });
    </script>
    <div class="footer-crit text-white">
            Fundación Teletón México A.C.
                Carretera Libramiento de Tráfico Pesado
                N° 1600 Col.Fidel Velázquez Altamira
                Tamaulipas C.P. 89607

    </div>
    {{-- <!-- Footer -->
        <footer class="page-footer font-small blue crit-nav-color text-center">
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm text-center">

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">
                   <h5 class="text-center"> FUNDACIÓN TELETÓN MÉXICO A.C</h5>
                    CARRETERA LIBRAMIENTO DE TRÁFICO PESADO N° 1600 COL. FIDEL VELÁZQUEZ CD.ALTAMIRA TAMAULIPAS C.P. 89607
                </div>
                <!-- Copyright -->

            </nav>

      </footer>
      <!-- Footer --> --}}
</body>
</html>
