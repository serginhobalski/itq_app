@extends('layouts.adm')

@section('styles')
@endsection


@section('content')
<div class="row">
    <!-- Your Profile Views Chart -->
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="email-wrapper">
                @include('mensagens._menu-bar')
                <div class="mail-list-container">
                    <div class="mail-toolbar">
                        <div class="mail-search-bar">
                            <h4> {{ $subtitulo }} </h4>
                        </div>
                        <div class="next-prev-btn">
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="mailbox-view">
                        <div class="mailbox-view-title">
                            <h5 class="send-mail-title"> {{ $mensagem->titulo }} </h5>
                        </div>
                        <div class="send-mail-details">
                            <div class="d-flex">
                                <div class="send-mail-user">
                                    <div class="send-mail-user-pic">
                                        <img src="assets/images/testimonials/pic3.jpg" alt="">
                                    </div>
                                    <div class="send-mail-user-info">
                                        <h4>De: {{ $remetente->name }} </h4>
                                        <h5>E-mail: {{ $remetente->email }}</h5>
                                        <h4>Para: {{ $destinatario->name }} </h4>
                                        <h5>E-mail: {{ $destinatario->email }}</h5>
                                    </div>
                                </div>
                                <div class="ml-auto send-mail-full-info">
                                    <div class="time"><span>{{ date('d/m/Y - H:i', strtotime($mensagem->created_at)) }}</span></div>
                                    <span class="btn btn-info-icon">--</span>
                                    <div class="dropdown all-msg-toolbar ml-auto">
                                        <span class="btn btn-info-icon" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></span>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="fa fa-trash-o"></i> Deletar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="read-content-body">
                                <h5 class="read-content-title">{{ $mensagem->titulo }}</h5>
                                <p><strong>{{ $destinatario->name }}</strong>
                                    {{ $mensagem->mensagem }}
                                </p>

                                <h5 class="read-content-title">Atenciosamente</h5>
                                <p class="read-content-name">{{ $remetente->name }}</p>
                                <hr>
                                {{-- <h6> <i class="fa fa-download m-r5"></i> Anexos <span>(3)</span></h6>
                                <div class="mailbox-download-file">
                                    <a href="#"><i class="fa fa-file-image-o"></i> photo.png</a>
                                    <a href="#"><i class="fa fa-file-text-o"></i> dec.text</a>
                                    <a href="#"><i class="fa fa-file"></i> video.mkv</a>
                                </div> --}}
                                <hr>
                                <form action="{{route('mensagens.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h6>Responder</h6>
                                        <div class="m-b15">
                                            <input type="text" name="remetente_id" id="remetente_id" value="{{$remetente->id}}" hidden>
                                            <input type="text" name="destinatario_id" id="destinatario_id" value="{{$destinatario->id}}" hidden>
                                            <input type="text" name="titulo" id="titulo" value="Resposta: {{$mensagem->titulo}}" hidden>
                                            <textarea id="mensagem" name="mensagem" class="form-control"> </textarea>
                                        </div>
                                        <button class="btn">Responder agora</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Profile Views Chart END-->
</div>
@endsection

@section('scripts')
@endsection
