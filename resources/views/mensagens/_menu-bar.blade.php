<div class="email-menu-bar">
    <div class="compose-mail">
        <a href="{{route('mensagens.create')}}" class="btn btn-block">
            <i class="fa-solid fa-file-circle-plus"></i> Enviar
        </a>
    </div>
    <div class="email-menu-bar-inner">
        <ul>
            <li class="active">
                <a href="{{route('mensagens.index')}}">
                    <i class="fa-solid fa-inbox"></i> Recebidas
                    <span class="badge badge-success">{{$qtd_entrada}}</span>
                </a>
            </li>
            <li>
                <a href="{{url('adm/msg_enviadas')}}">
                    <i class="fa-solid fa-paper-plane"></i> Enviadas
                    <span class="badge badge-success">{{$qtd_enviada}}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
