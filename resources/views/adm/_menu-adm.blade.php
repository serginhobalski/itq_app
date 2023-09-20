<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#"><img alt="" src="{{asset('src')}}/admin/assets/images/logo.png" width="122" height="27"></a>
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
            <nav class="ttr-sidebar-navi">
                <ul>
                    <li>
                        <a href="{{url('/adm')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-dashboard"></i></span>
                            <span class="ttr-label">Painel</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-book"></i></span>
                            <span class="ttr-label">Cursos</span>
                            <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('adm/cursos')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-layer-group"></i></span>
                                    <span class="ttr-label">Todos os Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{'adm/disciplinas'}}" class="ttr-material-button">
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
                                <a href="{{url('adm/atividades')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-book-open-reader"></i></span>
                                    <span class="ttr-label">Atividades x Disciplinas</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-user-graduate"></i></span>
                            <span class="ttr-label">Alunos</span>
                            <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('adm/usuarios')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa fa-users"></i></span>
                                    <span class="ttr-label">Todos os Alunos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/alunos_cursos')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-address-book"></i></span>
                                    <span class="ttr-label">Alunos x Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa-solid fa-address-book"></i></span>
                                    <span class="ttr-label">Notas x Alunos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('adm/mensagens')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-paper-plane"></i></span>
                            <span class="ttr-label">Mensagens</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('adm/eventos')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-calendar"></i></span>
                            <span class="ttr-label">Eventos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('adm/avisos')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa-solid fa-bullhorn"></i></span>
                            <span class="ttr-label">Avisos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('adm/usuarios')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-users"></i></span>
                            <span class="ttr-label">Usuários</span>
                            <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('adm/usuarios')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa fa-users"></i></span>
                                    <span class="ttr-label">Todos os Usuários</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('adm/alunos_cursos')}}" class="ttr-material-button">
                                    <span class="ttr-icon"><i class="fa fa-graduation-cap"></i></span>
                                    <span class="ttr-label">Alunos ITQ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('adm/perfil')}}" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-user"></i></span>
                            <span class="ttr-label">Meu perfil</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end -->
            </nav>

                    <!-- sidebar menu end -->
    </div>
</div>
