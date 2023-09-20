@extends('layouts.adm')

@section('styles')
<link rel="stylesheet" href="{{ asset('src/assets/selectize/selectize.bootstrap4.css') }}">
@endsection


@section('content')
<div class="row">
    <!-- Your Profile Views Chart -->
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="email-wrapper">
                @include('mensagens._menu-bar')
                <div class="mail-list-container">
                    <form class="mail-compose" method="POST" action="{{route('mensagens.store')}}">
                        @csrf
                        <div class="form-group col-12">
                            <input class="form-control"
                            type="text" value="{{$usuario->id}}" name="remetente_id"
                            id="remetente_id" readonly>
                            <select name="destinatario_id" id="destinatario_id">
                                @foreach ($destinatarios as $destinatario)
                                <option value="{{$destinatario->id}}">{{$destinatario->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <input name="titulo" id="titulo" class="form-control" type="text" value="Assunto">
                        </div>
                        <div class="form-group col-12">
                            <div class="summernote">
                                <textarea id="mensagem" name="mensagem" class="form-control"> </textarea>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <input name="image" id="image" type="file" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-lg">
                                <i class="fa-solid fa-paper-plane"></i> Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Profile Views Chart END-->
</div>
@endsection

@section('scripts')
@endsection
