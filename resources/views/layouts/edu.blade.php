<!doctype html>
<html class="no-js " lang="pt-br">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Meta -->
    <title>ITQ EAD | {{$titulo}}</title>
    @yield('calendar')
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('favicon.png')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">
    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="{{asset('edu')}}/css/bootstrap.min.css">
    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="{{asset('src/fontawesome/css/all.css')}}">
    <script src="{{asset('src/fontawesome/js/all.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('edu')}}/css/carousel.css">
    <link rel="stylesheet" href="{{asset('edu')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('edu')}}/style.css">
    <!-- FullCalendar -->
    <script src="{{asset('src/')}}/assets/jquery.min.js"></script>
    <script src="{{asset('fullcalendar-3.5.1')}}/lib/moment.min.js"></script>
    <link rel="stylesheet" href="{{asset('fullcalendar-3.5.1')}}/fullcalendar.css" />
    <script src="{{asset('fullcalendar-3.5.1')}}/fullcalendar.js"></script>
    <script src="{{asset('fullcalendar-3.5.1')}}/locale-all.js"></script>
    @yield('styles')
</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{asset('edu')}}/images/itqloader.gif" alt="">
    </div>
    <!-- END LOADER -->

    <div id="wrapper">

        <header class="header">

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="{{url('home')}}"><img src="{{asset('edu/logo.png')}}" width="100px" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('/')}}"><i class="fa-solid fa-house-user"></i></a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Meus Cursos <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach ($aluno_cursos as $curso) : ?>
                                        <li>
                                            <a href="<?php echo url('curso/' . $curso->id) ?>">
                                                <i class="fa-solid fa-book-open-reader"></i> <?php echo $curso->nome; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="<?php echo asset('edu/images/avatar.png') ?>" width="25px" alt="">
                                    <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->group == 'adm')
                                    <li>
                                        <a href="{{url('adm')}}">
                                            <i class="fa-solid fa-tv"></i> Painel ADM
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{url('/')}}">
                                            <i class="fa-solid fa-chalkboard-user"></i> Painel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('perfil')}}">
                                            <i class="fa-solid fa-address-card"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('cursos')}}">
                                            <i class="fa-solid fa-book-open-reader"></i> Cursos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('notas')}}">
                                            <i class="fa-solid fa-book-open-reader"></i> Notas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            {{ __('Sair') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="section footer noover">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-8">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Menu</h3>
                            <div class="tags-widget">
                                <ul class="list-inline">
                                    <li><a href="{{url('cursos')}}">Cursos</a></li>
                                    <li><a href="{{url('notas')}}">Notas</a></li>
                                    <li><a href="{{url('perfil')}}">Perfil</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Links</h3>
                            <div class="list-widget">
                                <ul>
                                    <li><a href="https://quadrangularpara.org/events/event/" target="_blank">IEQ Pará</a></li>
                                    <li><a href="https://www.quadrangular.com.br/" target="_blank">IEQ Brasil</a></li>
                                    <li><a href="https://www.sgecbrasil.com.br/" target="_blank">SGEC</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="copyrights">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="cop-logo">
                            <a href="{{url('home')}}">
                                <img src="<?php echo asset('edu/logo.png') ?>" width="80px" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="pull-right">
                        <div class="footer-links">
                            <ul class="list-inline">
                                <li><?php echo date('Y') ?> &copy; &nbsp; <a href="<?php echo url('/') ?>">SEEC-PA</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('modal')

    <!-- jQuery Files -->
    <script src="{{asset('edu')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('edu')}}/js/carousel.js"></script>
    <script src="{{asset('edu')}}/js/animate.js"></script>
    <script src="{{asset('edu')}}/js/custom.js"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{asset('edu')}}/js/videobg.js"></script>
    @yield('scripts')
    <script>
        async function recuperarQtdUsuariosOnline(){
            const dados = await fetch('{{url("usuarios_online")}}');
            const resposta = await dados.json();
            console.log(resposta);
            document.getElementById("qtd-usuario-online").innerHTML = resposta['qtd_usuarios'];
        }
        setInterval(() => {
            recuperarQtdUsuariosOnline();
        }, 5000);
    </script>

</body>

</html>
