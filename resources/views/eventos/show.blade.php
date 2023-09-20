@extends('layouts.adm')

@section('styles')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title">
                <h4>Informações do Evento</h4>
            </div>
            <div class="widget-inner">
                <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Título') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $evento->title }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Descrição do Evento') }}</label>

                        <div class="col-md-6">
                            <div class="summernote">
                                <textarea id="description" name="description" class="form-control" value=""> {{ $evento->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('Local') }}</label>

                        <div class="col-md-6">
                            <input id="place" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $evento->place }}" required autocomplete="place">

                            @error('place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Endereço') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $evento->address }}" required autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('Cor') }}</label>

                        <div class="col-md-6">
                            <input id="color" type="color" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ $evento->color }}" autocomplete="color">

                            @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>

                        <div class="col-md-6">
                            @if ($evento->image)
                                <img src="{{ asset('storage/'.$evento->image) }}" width="100%" alt="">
                            @else
                                <span>Nenhuma imagem cadastrada.</span>
                            @endif
                            <input id="image" class="form-control"  type="file" name="image" id="" value="{{ old('Image') }}"  autocomplete="image" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Início') }}</label>

                        <div class="col-md-6">
                            <input id="start" class="form-control"  type="datetime" name="start" id="" autocomplete="start" value="{{ $evento->start }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="end" class="col-md-4 col-form-label text-md-end">{{ __('Fim') }}</label>

                        <div class="col-md-6">
                            <input id="end" class="form-control"  type="datetime" name="end" id="" autocomplete="end" value="{{ $evento->end }}" required>
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

                            <a class="btn btn-dark" href="{{route('eventos.index')}}">
                                <i class="fa-solid fa-rotate-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
          <form action="{{route('usuarios.destroy', $evento->id)}}" method="post">
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
