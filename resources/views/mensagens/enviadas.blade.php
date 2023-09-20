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
                        <div class="check-all">
                            <div class="custom-control custom-checkbox checkbox-st1">
                            </div>
                        </div>
                        <div class="mail-search-bar">
                            <h4> {{ $subtitulo }} </h4>
                        </div>
                        <div class="next-prev-btn">
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="mail-box-list">
                        @foreach ($msg_enviadas as $mensagem)
                        <div class="mail-list-info">
                            <div class="checkbox-list">
                                <div class="custom-control custom-checkbox checkbox-st1">
                                    <input type="checkbox" class="custom-control-input" id="check2">
                                    <label class="custom-control-label" for="check2"></label>
                                </div>
                            </div>
                            <div class="mail-rateing">
                                <span><i class="fa-regular fa-star"></i></span>
                            </div>
                            <div class="mail-list-title">
                                <h6> <a href="{{route('mensagens.show', $mensagem->principal_id)}}"> {{$mensagem->user_name}} </a> </h6>
                            </div>
                            <div class="mail-list-title-info">
                                <p>{{$mensagem->titulo}}</p>
                            </div>
                            <div class="mail-list-time">
                                <span>{{ date('d/m/Y - H:i', strtotime($mensagem->created_at)) }}</span>
                            </div>
                            <ul class="mailbox-toolbar">
                                <li data-toggle="tooltip" title="Deletar"><i class="fa fa-trash-o"></i></li>
                            </ul>
                        </div>
                        @endforeach

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
