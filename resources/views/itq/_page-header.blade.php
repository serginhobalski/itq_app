{{-- <div class="painel-header">
    <div class="container">
        <div class="page-banner-entry pt-5 text-left">
            <br><br>
            <h1 class="text-white mt-5">{{$titulo}}</h1>
            <h3 class="text-white">{{$subtitulo}}</h3>
            <a href="#" class="btn-painel" >
                Painel
            </a>
            <a href="#" class="btn-painel">Cursos</a>
        </div>
    </div>
</div> --}}
<div class="page-banner ovbl-dark" >
    <div class="container">
        <div class="page-banner-entry pt-5">
            <br><br>
            <h1 class="text-white mt-5">{{$titulo}}</h1>
            <h3 class="text-white">{{$subtitulo}}</h3>
            <a class="btn" href=""><i class="fa-solid fa-tv"></i> Painel</a>
            <a class="btn" href=""><i class="fa-solid fa-book-open"></i> Cursos</a>
        </div>
    </div>
</div>
@include('components.flash-message')
