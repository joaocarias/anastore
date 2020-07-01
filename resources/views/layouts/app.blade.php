<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ana Store') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('lib/select2-bootstrap4/select2-bootstrap4.css') }}" rel="stylesheet" />

    <!-- Fontawesome -->
    <link href="{{ asset('lib/fontawesome/css/all.css') }}" rel="stylesheet">

    <!-- DatePicker -->
    <link href="{{ asset('lib/datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    <!-- Summernote -->
    <link href="{{ asset('lib/summernote/summernote.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Ana Store') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @Auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Cadastro') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('clientes') }}">
                                    <i class="fas fa-person-booth"></i> &nbsp;
                                    {{ __('Cliente') }}
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('produtos') }}">
                                <i class="fab fa-product-hunt"></i> &nbsp;
                                    {{ __('Produto') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('categoria_produtos') }}">
                                    <i class="fas fa-atlas"></i> &nbsp;
                                    {{ __('Categorias de Produto') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('cores') }}">
                                    <i class="fas fa-bullseye"></i> &nbsp;
                                    {{ __('Cores de Produto') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('tamanho_produtos') }}">
                                    <i class="fab fa-diaspora"></i> &nbsp;
                                    {{ __('Tamanhos de Produto') }}
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('cidades') }}">
                                    <i class="fas fa-city"></i> &nbsp;
                                    {{ __('Cidade') }}
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('usuarios') }}">
                                    <i class="fas fa-chalkboard-teacher"></i> &nbsp;
                                    {{ __('Usuário') }}
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Estoque') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('estoque_produtos') }}">
                                <i class="fas fa-indent"></i> &nbsp;
                                    {{ __('Produtos em Estoque') }}
                                </a>

                            </div>
                        </li>

                    </ul>
                    @EndAuth

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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('lib/jquery-mask/jquery.mask.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="{{ asset('lib/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('lib/datepicker/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
    <script src="{{ asset('lib/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('lib/summernote/lang/summernote-pt-BR.min.js') }}"></script>

    @hasSection('javascript')
    @yield('javascript')
    @endif
</body>

</html>