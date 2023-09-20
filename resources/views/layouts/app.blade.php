<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('src/fontawesome/css/all.css')}}">
    <script src="{{asset('src/fontawesome/js/all.js')}}"></script>
    <!-- FullCalendar -->
    <link href="{{asset('src')}}/fullcalendar/css/fullcalendar.min.css" rel='stylesheet' />
    <!-- FULLCALENDAR CSS ============================================= -->
    <link href='{{asset('src')}}/fullcalendar/css/core/main.min.css' rel='stylesheet' />
    <link href='{{asset('src')}}/fullcalendar/css/daygrid/main.min.css' rel='stylesheet' />
    <script src='{{asset('src')}}/fullcalendar/js/core/main.min.js'></script>
    <script src='{{asset('src')}}/fullcalendar/js/interaction/main.min.js'></script>
    <script src='{{asset('src')}}/fullcalendar/js/daygrid/main.min.js'></script>
    <script src='{{asset('src')}}/fullcalendar/js/core/locales/pt-br.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                plugins: ['interaction', 'dayGrid'],
                //defaultDate: '2019-04-12',
                editable: true,
                eventLimit: true,
                events: 'list_eventos.php',
                extraParams: function() {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                }
            });

            calendar.render();
        });
    </script>

    @yield('styles')
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('favicon.png') }}" alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="dropdown-menu dropdown-menu-left ml-4" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/sobre')}}">
                        {{-- <i class="fa-solid fa-table-columns"></i> --}}
                        <img src="{{ asset('favicon.png') }}" width="20px" alt="">
                        {{ __('Sobre Nós') }}
                    </a>
                    <a class="dropdown-item" href="{{ url('/departamentos') }}">
                        {{-- <i class="fa-solid fa-users-between-lines"></i> --}}
                        <img src="{{ asset('favicon.png') }}" width="20px" alt="">
                        {{ __('Departamentos') }}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars text-white pb-0"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{-- <i class="fa-solid fa-circle-user"></i> --}}
                                <img src="{{asset('favicon.png')}}" width="20px" alt="">
                                Links
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('/sobre')}}">
                                    <img src="{{ asset('favicon.png') }}" width="20px" alt="">
                                    {{ __('Sobre Nós') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/departamentos') }}">
                                    <img src="{{ asset('favicon.png') }}" width="20px" alt="">
                                    {{ __('Departamentos') }}
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-file-pen"></i>
                                ENAQ
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('/enaq')}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Orientações') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/enaq_notas') }}">
                                    <i class="fa-solid fa-paste"></i>
                                    {{ __('Resultados') }}
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-book-open-reader"></i>
                                Cursos
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('/itq')}}">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    {{ __('ITQ EAD') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/postulantes') }}">
                                    <i class="fa-solid fa-book-bible"></i>
                                    {{ __('Postulantes') }}
                                </a>

                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        {{ __('Entrar') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-warning text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-circle-user"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        <i class="fa-solid fa-table-columns"></i>
                                        {{ __('Painel ADM') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('usuarios.index') }}">
                                        <i class="fa-solid fa-users-between-lines"></i>
                                        {{ __('Usuarios') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @include('components.flash-message')
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('src/assets/jquery.js') }}" defer></script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
