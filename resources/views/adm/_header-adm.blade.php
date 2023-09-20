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
                <a href="{{ url('/') }}" class="ttr-logo">
                    <img class="ttr-logo-mobile" alt=""
                        src="{{ asset('src') }}/admin/assets/images/logo-mobile.png" width="30" height="30">
                    <img class="ttr-logo-desktop" alt=""
                        src="{{ asset('src') }}/admin/assets/images/logo-white.png" width="160" height="27">
                </a>
            </div>
        </div>
        <!--logo end -->
        <div class="ttr-header-menu">
            <!-- header left menu start -->
            <ul class="ttr-header-navigation">
                <li>
                    <a href="" class="ttr-material-button ttr-submenu-toggle">
                        <i class="fa fa-paper-plane"></i> Mensagens</a>
                </li>
                <li>
                    <a href="" class="ttr-material-button ttr-submenu-toggle">
                        <i class="fa fa-calendar"></i> Eventos</a>
                </li>
            </ul>
            <!-- header left menu end -->
        </div>
        <div class="ttr-header-right ttr-with-seperator">
            <!-- header right menu start -->
            <ul class="ttr-header-navigation">
                <li>
                    <a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
                </li>


                <li>
                    @php
                        $usuario_logado = Auth::user();
                    @endphp
                    @if (!$usuario_logado->imagem)
                        <a href="#" class="ttr-material-button ttr-submenu-toggle">
                            <span class="ttr-user-avatar">
                                <img src="{{ asset('src') }}/assets/images/user-avatar.png" width="32"
                                    height="32" alt="">
                            </span>
                        </a>
                    @else
                        <a href="#" class="ttr-material-button ttr-submenu-toggle">
                            <span class="ttr-user-avatar">
                                <img src="{{ asset('storage/' . $usuario_logado->imagem) }}" width="32" height="32"
                                    alt="">
                            </span>
                        </a>
                    @endif
                    <div class="ttr-header-submenu">
                        <ul>
                            <li>
                                <a href="{{ url('adm/perfil/' . Auth::id()) }}">
                                    <i class="fa fa-user-circle"></i> Perfil {{ $usuario_logado->name }}
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-paper-plane"></i> Mensagens
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-primary" href="">
                                    <i class="fa fa-dashboard"></i> Painel ITQ
                                </a>
                            </li>
                            <hr>
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
