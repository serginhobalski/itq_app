@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR EVENTO') }}</h3>
                </div>

                <div class="card-body">
                    <div class="widget-inner">
                        <form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus>

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
                                        <textarea id="description" name="description" class="form-control" value=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('Local') }}</label>

                                <div class="col-md-6">
                                    <input id="place" type="text" class="form-control @error('place') is-invalid @enderror" name="place" value="" required autocomplete="place">

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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address">

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
                                    <input id="color" type="color" class="form-control @error('color') is-invalid @enderror" name="color" value="" autocomplete="color">

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
                                    <input id="image" class="form-control"  type="file" name="image" id="" value="{{ old('Image') }}"  autocomplete="image" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Início') }}</label>

                                <div class="col-md-6">
                                    <input id="start" class="form-control"  type="datetime" name="start" id="" value="{{ old('Início') }}"  autocomplete="start" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end" class="col-md-4 col-form-label text-md-end">{{ __('Fim') }}</label>

                                <div class="col-md-6">
                                    <input id="end" class="form-control"  type="datetime" name="end" id="" value="{{ old('Fim') }}"  autocomplete="end" required>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        {{ __('Cadastrar') }}
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
    </div>
</div>
@endsection

@section('scripts')
@endsection
