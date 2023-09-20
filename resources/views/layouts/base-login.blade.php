<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <!-- DESCRIPTION -->
    <meta name="description" content="ITQ EAD | Login">
    <!-- OG -->
    <meta property="og:title" content="ITQ EAD | Login">
    <meta property="og:description" content="ITQ EAD | Login">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <!-- PAGE TITLE HERE ============================================= -->
    <title>ITQ EAD | Login </title>
    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src') }}/assets/css/assets.css">
    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src') }}/assets/css/typography.css">
    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src') }}/assets/css/shortcodes/shortcodes.css">
    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="{{asset('src/fontawesome/css/all.css')}}">
    <script src="{{asset('src/fontawesome/js/all.js')}}"></script>
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src') }}/assets/css/style.css">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('src') }}/assets/css/color/color-1.css">
</head>

<body id="bg">
    <div class="page-wraper">

        <div class="account-form">
            <div class="account-head"
                style="background-image:url({{ asset('src') }}/assets/images/background/bg_.jpg);">
                <a href="/"><img src="{{ asset('') }}/logo.png" alt=""></a>
            </div>
            <div class="account-form-inner">

                <div class="account-container">
                    <div class="heading-bx left">
                        <h2 class="title-head">Faça login <span>para acessar</span></h2>
                        <p>Não possui acesso?
                            <a href="https://wa.me/5591991882187" target="_blank">
                                fale conosco
                            </a>
                        </p>
                    </div>
                    <form action="{{ route('login') }}" id="form" class="contact-bx" method="post"
                        accept-charset="utf-8">
                        @csrf
                        @include('components.flash-message')

                        <div class="row placeani">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <div class="input-group">
                                        <label>E-mail ou nome de usuário</label>
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <div class="input-group">
                                        <label>Sua senha</label>
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group form-forget">
                                    <div class="custom-control custom-checkbox">

                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="wm-forgot-btn" title="Solicitar alteração de senha"
                                    href="{{ route('password.request') }}">
                                        <i class="fa-solid fa-key"></i> {{ __('Esqueceu sua senha?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 m-b30">
                                <button type="submit" class="btn btn-md">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- External JavaScripts -->
    <script src="{{ asset('src') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/magnific-popup/magnific-popup.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/counter/waypoints-min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/counter/counterup.min.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/imagesloaded/imagesloaded.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/masonry/masonry.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/masonry/filter.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/owl-carousel/owl.carousel.js"></script>
    <script src="{{ asset('src') }}/assets/js/functions.js"></script>
    <script src="{{ asset('src') }}/assets/js/contact.js"></script>
    <script src="{{ asset('src') }}/assets/vendors/switcher/switcher.js"></script>

</body>

</html>
