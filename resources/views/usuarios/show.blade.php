@extends('layouts.adm')

@section('styles')
@endsection

@section('content')
<div class="row">
    <!-- Your Profile Views Chart -->
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title">
                <h4>Detalhes de {{$usuario->nome}}</h4>
            </div>
            <div class="widget-inner">
                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Nome de usuário') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $usuario->username }}" required autocomplete="username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="group" class="col-md-4 col-form-label text-md-end">{{ __('Grupo') }}</label>

                        <div class="col-md-6">
                            <select name="group" id="group" class="form-control">
                                <option value="uetp"
                                {{ ($usuario->group == 'uetp' ? 'selected' : '') }}>
                                    UETP
                                </option>
                                <option value="aluno_itq"
                                {{ ($usuario->group == 'aluno_itq' ? 'selected' : '') }}>
                                    ITQ EAD</option>
                                <option value="aluno_postulante"
                                {{ ($usuario->group == 'aluno_postulante' ? 'selected' : '') }}>
                                    Postulante</option>
                                <option value="adm"
                                {{ ($usuario->group == 'adm' ? 'selected' : '') }}>
                                    ADM</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>

                        <div class="col-md-6">
                            @if ($usuario->image)
                                <img src="{{ asset('storage/'.$usuario->image) }}" width="150px" alt="">
                                {{-- <span>{{ $usuario->image }}</span> --}}
                            @else
                                <span>Nenhuma imagem cadastrada.</span>
                            @endif
                            <input id="image" class="form-control"  type="file" name="image" id="" value="{{ old('Image') }}"  autocomplete="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('Atualizar') }}
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"    data-bs-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i> Deletar
                            </button>

                            <a class="btn btn-dark" href="{{route('usuarios.index')}}">
                                <i class="fa-solid fa-rotate-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Your Profile Views Chart END-->
</div>
<!-- Modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar usuário?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Esta ação apagará o usuário do sistema.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{route('usuarios.destroy', $usuario->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                    {{ __('Deletar') }}
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })
</script>
@endsection
