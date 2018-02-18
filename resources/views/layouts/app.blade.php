<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biblioteca</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/assets/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/bower/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Biblioteca
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a href="{{ route('books.index') }}"><i class="fa fa-book"></i> Livros</a></li>
                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> Categorias</a></li>
                        <li><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i> Clientes</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @can('manage_users')
                                    <li><a href="{{ route('users.index') }}"><i class="fa fa-btn fa-user"></i>Usuários</a></li>
                                @endcan
                                <li><a href="{{ route('profile.edit') }}"><i class="fa fa-btn fa-cog"></i>Meus Dados</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair do Sistema</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script type="text/javascript" src="/assets/bower/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bower/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/assets/bower/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/assets/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
