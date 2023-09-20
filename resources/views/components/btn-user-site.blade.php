<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button"
        data-toggle="dropdown" aria-expanded="false">
        @if (!Auth::user()->image)
            <img src="{{asset('src/assets/images/user-avatar.png')}}" class="rounded-circle" width="25px" alt="">
        @else
            <img src="{{asset('storage/'.Auth::user()->image)}}" class="rounded-circle" width="25px" alt="">

        @endif
        {{ Auth::user()->name }}
    </button>
    <div class="dropdown-menu"
    style="background-color: #333333d7">
        @if (Auth::user()->group == 'adm')
            <a class="dropdown-item text-warning" href="{{ url('/adm') }}">
                <i class="fa-solid fa-tv text-warning"></i>
                <b class="text-warning p-1">Painel ADM</b>
            </a>
        @endif
        @if (Auth::user()->group == 'uetp')
            <a class="dropdown-item text-warning" href="{{ url('/uetp') }}"><i class="fa-solid fa-tv text-warning"></i><b class="text-warning p-1">Painel UETP</b>
            </a>
        @endif
        @if (Auth::user()->group == 'aluno_itq')
            <a class="dropdown-item text-warning"
                href="{{ url('itq/painel') }}"><i class="fa-solid fa-tv text-warning"></i><b class="text-warning p-1">Painel do Aluno</b>
            </a>
        @endif
        @if (Auth::user()->group == 'aluno_postulante')
            <a class="dropdown-item text-warning"
                href="{{ url('/postulantes/painel') }}"><i class="fa-solid fa-tv text-warning"></i><b class="text-warning p-1">Painel do Aluno</b>
            </a>
        @endif
        <hr>
        <a class="dropdown-item text-warning" href="{{url('perfil/'.Auth::id())}}">
            <i class="fa fa-wrench text-warning"></i>
            <b class="text-warning p-1">Meu Perfil</b>
        </a>
        <a class="dropdown-item text-warning" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out text-warning"></i>
            <b class="text-warning p-1">{{ __('Sair') }}</b>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            class="d-none">
            @csrf
        </form>
    </div>
</div>
