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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark crit-nav-color shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/inicio') }}">
                    {{ config('app.name', 'Sistema Control') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li> --}}
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
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</body>
</html>
