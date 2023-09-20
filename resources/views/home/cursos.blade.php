@extends('layouts.edu')

<!-- Custom styles -->
@section('styles')
@endsection

<!-- Page content -->
@section('content')
<section>
    <div class="container bg-dark">
        <br><br><br>
    </div>
</section>
<br><br>
<section class="section gb nopadtop"><!-- Listagem de todos os cursos | style="margin-top: 120px" -->
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row blog-grid">
                <?php foreach ($aluno_cursos as $curso): ?>
                    <div class="col-md-4">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('edu/upload/cursos-geral/' . $curso->id . '.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <div class="course-details">
                                <h4>
                                    <small> {{$curso->categoria}} </small>
                                    <a href="#" title="<?php echo $curso->nome; ?>"> {{$curso->nome}} </a>
                                </h4>
                                <p>  {{$curso->descricao}}  </p>
                            </div>
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i>--</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> --</a></li>
                                        <li><a href="#"><i class="fa fa-eye"></i> --</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="pagination ">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


<!-- Custom scripts -->
@section('scripts')
@endsection
