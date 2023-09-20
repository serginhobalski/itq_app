@extends('layouts.base-login')

@section('content')
{{-- <div class="account-container">
    <div class="heading-bx left">
        <h2 class="title-head">Faça login com <span>sua conta</span></h2>
        <p>Não possui acesso? <a href="#">fale conosco</a></p>
    </div>

    <form class="contact-bx" id="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row placeani">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <label>Seu login</label>
                        <input name="login" type="email" required="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <label>Sua senha</label>
                        <input name="password" type="password" class="form-control" required="">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group form-forget">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" checked>
                        <label class="custom-control-label" for="customControlAutosizing">Lembar</label>
                    </div>
                    <a href="#" class="ml-auto">Esqueceu a senha?</a>
                </div>
            </div>
            <div class="col-lg-12 m-b30">
                <input id="btn-login" name="btn-login" type="submit" value="Entrar" class="btn button-md">
            </div>
        </div>
    </form>
</div> --}}
@endsection
