<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button"
        data-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
    </button>
    <div class="dropdown-menu bg-primary">

            <a class="dropdown-item bg-primary"
                href="{{ route('aulas-postulantes') }}"><i
                    class="fa fa-dashboard"></i><b class="text-white p-1">Meu
                    painel</b>
            </a>

        <a class="dropdown-item bg-primary" href="#">
            <i class="fa fa-wrench"></i>
            <b class="text-white p-1">Atualizar meus dados</b>
        </a>
        <a class="dropdown-item bg-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            <b class="text-white p-1">{{ __('Sair') }}</b>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            class="d-none">
            @csrf
        </form>
    </div>
</div>
