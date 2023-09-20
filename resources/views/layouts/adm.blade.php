<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <!-- DESCRIPTION -->
    <meta name="description" content="ADM | SEEC-PA" />
    <!-- OG -->
    <meta property="og:title" content="ADM | SEEC-PA" />
    <meta property="og:description" content="ADM | SEEC-PA" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.png')}}">
    <!-- PAGE TITLE HERE ============================================= -->
    <title>SEEC-PA | {{$titulo}}</title>
    <!-- FullCalendar -->
    @yield('calendar')
    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/assets.css">
    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/typography.css">
    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/shortcodes/shortcodes.css">
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/dashboard.css">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('src/admin')}}/assets/css/color/color-1.css">
    <!-- Font Awesome Style -->
    <link rel="stylesheet" href="{{asset('src/fontawesome/css/all.css')}}" >
    <script src="{{asset('src/fontawesome/js/all.js')}}"></script>
    <!-- FullCalendar -->
    <script src="{{asset('src/')}}/assets/jquery.min.js"></script>
    <script src="{{asset('fullcalendar-3.5.1')}}/lib/moment.min.js"></script>
    <link rel="stylesheet" href="{{asset('fullcalendar-3.5.1')}}/fullcalendar.css" />
    <script src="{{asset('fullcalendar-3.5.1')}}/fullcalendar.js"></script>
    <script src="{{asset('fullcalendar-3.5.1')}}/locale-all.js"></script>
    @yield('estilos')
</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
    <!-- header start -->
    <header class="ttr-header">
        <div class="ttr-header-wrapper">
            <!--sidebar menu toggler start -->
            <div class="ttr-toggle-sidebar ttr-material-button">
                <i class="ti-close ttr-open-icon"></i>
                <i class="ti-menu ttr-close-icon"></i>
            </div>
            <!--sidebar menu toggler end -->
            <!--logo start -->
            <div class="ttr-logo-box">
                <div>
                    <a href="{{url('adm')}}" class="ttr-logo">
                        <img class="ttr-logo-mobile" alt="" src="{{asset('favicon.png')}}" width="30" height="30">
                        <img class="ttr-logo-desktop" alt="" src="{{asset('logo.png')}}" width="140" height="27">
                    </a>
                </div>
            </div>
            <!--logo end -->
            <div class="ttr-header-menu">
                <!-- header left menu start -->
                <ul class="ttr-header-navigation">
                    <li>
                        <a href="{{url('adm/mensagens')}}" class="ttr-material-button ttr-submenu-toggle">
                            <i class="fa fa-paper-plane"></i> Mensagens</a>
                    </li>
                    <li>
                    <a href="{{url('adm/eventos')}}" class="ttr-material-button ttr-submenu-toggle">
                            <i class="fa fa-calendar"></i> Eventos</a>
                    </li>
                                            <li>
                            <a href="{{url('adm/cursos')}}" class="ttr-material-button ttr-submenu-toggle">
                                <i class="fa fa-paste"></i> Cursos</a>
                        </li>
                                    </ul>
                <!-- header left menu end -->
            </div>
            <div class="ttr-header-right ttr-with-seperator">
                @php
                    $usuario_logado = Auth::user();
                @endphp
                <!-- header right menu start -->
                <ul class="ttr-header-navigation">
                    <li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa-solid fa-envelope"></i></a>
						<div class="ttr-header-submenu noti-menu">
                            @php
                                $usuario_id = Auth::id();
                                $qtd_mensagens = DB::table('mensagems')->where('destinatario_id', $usuario_id)->count();
                                $mensagens = DB::table('mensagems')->where('destinatario_id', $usuario_id)->get();
                            @endphp
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">{{$qtd_mensagens}} Nova(s)</span>
								<span class="ttr-notify-text">Mensagem(ns)</span>
							</div>
							<div class="noti-box-list">
								<ul>
                                    @foreach ($mensagens as $mensagem)
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa-solid fa-envelope"></i>
										</span>
										<span class="notification-text">
											<span><a href="{{route('mensagens.show', $mensagem->id)}}">{{$mensagem->titulo}}</a> </span> {{$mensagem->remetente_id}}.
										</span>
										<span class="notification-time">
											<a href="#" class="fa"></a>
											<span> {{ date('d/m/Y | H:i', strtotime($mensagem->created_at)) }}</span>
										</span>
									</li>
                                    @endforeach

								</ul>
							</div>
						</div>
					</li>
                    <li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa-solid fa-bell"></i></a>
						<div class="ttr-header-submenu noti-menu">
                            @php
                                $qtd_avisos = DB::table('avisos')->count();
                                $avisos = DB::table('avisos')->get();
                            @endphp
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">{{$qtd_avisos}} Novo(s)</span>
								<span class="ttr-notify-text">Aviso(s)</span>
							</div>
							<div class="noti-box-list">
								<ul>
                                    @foreach ($avisos as $aviso)
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa-solid fa-bullhorn"></i>
										</span>
										<span class="notification-text">
											<span><a href="{{route('avisos.show', $aviso->id)}}">{{$aviso->titulo}}</a> </span> {{$aviso->grupo}}.
										</span>
										<span class="notification-time">
											<a href="#" class="fa"></a>
											<span> {{ date('d/m/Y | H:i', strtotime($aviso->created_at)) }}</span>
										</span>
									</li>
                                    @endforeach

								</ul>
							</div>
						</div>
					</li>
                    <li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa-solid fa-message"></i></a>
						<div class="ttr-header-submenu noti-menu">
                            @php
                                $qtd_contatos = DB::table('contatos')->count();
                                $contatos = DB::table('contatos')->get();
                            @endphp
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">{{$qtd_contatos}} Novo(s)</span>
								<span class="ttr-notify-text">Contato(s)</span>
							</div>
							<div class="noti-box-list">
								<ul>
                                    @foreach ($contatos as $contato)
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa-solid fa-comment"></i>
										</span>
										<span class="notification-text">
											<span><a href="{{route('contatos.show', $contato->id)}}">{{$contato->nome}}</a> </span> {{$contato->assunto}}.
										</span>
										<span class="notification-time">
											<a href="#" class="fa"></a>
											<span> {{ date('d/m/Y | H:i', strtotime($contato->created_at)) }}</span>
										</span>
									</li>
                                    @endforeach

								</ul>
							</div>
						</div>
					</li>

                    <li>

                        @if (!isset($usuario_logado->image))
                        <a href="#" class="ttr-material-button ttr-submenu-toggle">
                            <span class="ttr-user-avatar">
                                <img src="{{ asset('src') }}/assets/images/user-avatar.png" width="32" height="32" alt="">
                            </span>
                        </a>
                        @else
                        <a href="#" class="ttr-material-button ttr-submenu-toggle">
                            <span class="ttr-user-avatar">
                                <img src="{{asset('storage/'.$usuario_logado->image) }}" width="32" height="32" alt="">
                            </span>
                        </a>
                        @endif
                        <div class="ttr-header-submenu">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user-circle"></i> {{(isset($usuario_logado->name) ? $usuario_logado->name : 'User')}}
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-screwdriver-wrench"></i> Gerenciar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('adm/usuarios')}}">
                                                <i class="fa-solid fa-users-between-lines"></i> Usuários
                                            </a>
                                            <a class="dropdown-item" href="{{url('adm/eventos')}}">
                                                <i class="fa-solid fa-calendar-days"></i> Eventos
                                            </a>
                                            <a class="dropdown-item" href="{{url('adm/avisos')}}">
                                                <i class="fa-solid fa-bullhorn"></i> Avisos
                                            </a>
                                            <a class="dropdown-item" href="{{url('adm/cursos')}}">
                                                <i class="fa-solid fa-book"></i> Cursos
                                            </a>
                                        </div>
                                      </div>
                                </li>
                                <li>
                                    <a class="dropdown-item text-primary" href="{{url('adm')}}">
                                        <i class="fa-solid fa-tv"></i> Painel ADM
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-primary" href="{{url('home')}}">
                                        <i class="fa-solid fa-tv"></i> Painel ITQ
                                    </a>
                                </li>
                                <hr>
                                <li>

                                    <a href="{{url('adm/perfil/'. Auth::user()->id)}}">
                                        <i class="fa-solid fa-id-card"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('SAIR') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!-- header right menu end -->
            </div>
            <!--header search panel start -->
            <div class="ttr-search-bar">
                <form method="POST" class="ttr-search-form">
                    <div class="ttr-search-input-wrapper">
                        <input type="text" name="termo" placeholder="Pesquisar..." class="ttr-search-input">
                        <button type="submit" name="pesquisa" class="ttr-search-submit">
                            <i class="ti-arrow-right"></i>
                        </button>
                    </div>
                    <span class="ttr-search-close ttr-search-toggle">
                        <i class="ti-close"></i>
                    </span>
                </form>
            </div>
            <!--header search panel end -->
        </div>
    </header>
    <!-- header end -->
    <!-- Left sidebar menu start -->
    <div class="ttr-sidebar">
        <div class="ttr-sidebar-wrapper content-scroll">
            <!-- side menu logo start -->
            <div class="ttr-sidebar-logo">
                <a href="#"><img alt="" src="{{asset('logo-dark.png')}}" width="122" height="27"></a>
                <div class="ttr-sidebar-toggle-button">
                    <i class="ti-arrow-left"></i>
                </div>
            </div>
            <!-- side menu logo end -->
            <!-- sidebar menu start -->
            <nav class="ttr-sidebar-navi">
                <ul>
                    <li> <!-- Painel -->
                        <a href="{{url('/adm')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-tv"></i></span>
                            <span class="ttr-label">Painel</span>
                        </a>
                    </li>
                    <li> <!-- Cursos -->
                        <a href="#" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-book"></i></span>
                            <span class="ttr-label">Cursos</span>
                            <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('adm/cursos')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-layer-group"></i></span>
                                    <span class="ttr-label">Gerenciar Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/alunos_cursos')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-address-book"></i></span>
                                    <span class="ttr-label">Alunos x Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/notas')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-address-book"></i></span>
                                    <span class="ttr-label">Alunos x Notas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/disciplinas')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-book-bookmark"></i></span>
                                    <span class="ttr-label">Disciplinas x Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/aulas')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-bookmark"></i></span>
                                    <span class="ttr-label">Aulas x Disciplinas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/pdfs')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-bookmark"></i></span>
                                    <span class="ttr-label">PDFs x Disciplinas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/atividades')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-book-open-reader"></i></span>
                                    <span class="ttr-label">Atividades x Disciplinas</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><!-- ITQ -->
                        <a href="{{url('itq/painel')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                            <span class="ttr-label">Painel ITQ</span>
                        </a>
                    </li>
                    <li> <!-- Mensagens -->
                        <a href="{{url('adm/mensagens')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-paper-plane"></i></span>
                            <span class="ttr-label">Mensagens</span>
                        </a>
                    </li>
                    <li> <!-- Eventos -->
                        <a href="{{url('adm/eventos')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-calendar"></i></span>
                            <span class="ttr-label">Eventos</span>
                        </a>
                    </li>
                    <li> <!-- Avisos -->
                        <a href="{{url('adm/avisos')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-bullhorn"></i></span>
                            <span class="ttr-label">Avisos</span>
                        </a>
                    </li>
                    <li class="ttr-seperate"></li>
                    <li>
                        <a href="{{url('adm/perfil/'.Auth::id())}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-id-card"></i></span>
                            <span class="ttr-label">Meu perfil</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end -->
            </nav>
        </div>
    </div>
    <!-- Left sidebar menu end -->

    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">{{(isset(Auth::user()->name) ? Auth::user()->name : 'Painel')}}</h4>
                <ul class="db-breadcrumb-list">
                    <li>{{$titulo}}</li>
                    <li id="hora-atual"></li>
                </ul>
            </div>

            @include('adm._flash-message')

            @yield('content')

        </div>
    </main>
    <div class="ttr-overlay"></div>
    @yield('modal')

    <!-- External JavaScripts -->
    {{-- <script src="{{asset('src/')}}/assets/jquery.min.js"></script> --}}
    <script src="{{asset('src/admin')}}/assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/magnific-popup/magnific-popup.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/counter/waypoints-min.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/counter/counterup.min.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/imagesloaded/imagesloaded.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/masonry/masonry.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/masonry/filter.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/owl-carousel/owl.carousel.js"></script>
    <script src='{{asset('src/admin')}}/assets/vendors/scroll/scrollbar.min.js'></script>
    <script src="{{asset('src/admin')}}/assets/js/functions.js"></script>
    <script src="{{asset('src/admin')}}/assets/vendors/chart/chart.min.js"></script>
    <script src="{{asset('src/admin')}}/assets/js/admin.js"></script>
    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/33b01659b8.js" crossorigin="anonymous"></script>
    <!-- Render custom scripts -->
    @yield('scripts')
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
            });
        })

        $('.alert').alert();
    </script>
    <script>
        horaAtual = setInterval(() => {
            document.getElementById('hora-atual').innerHTML = '<i class="fa-solid fa-clock"></i> ' + new Date().toLocaleString();
        }, 1000);
    </script>
</body>

</html>
