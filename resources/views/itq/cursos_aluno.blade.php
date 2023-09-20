<?php echo $this->extend('Layout/edu'); ?>

<!-- Custom styles -->
<?php echo $this->section('estilos'); ?>
<?php $this->endSection(); ?>

<!-- Page content -->
<?php echo $this->section('conteudo'); ?>
<?php echo $this->include('Itq/_header_page') ?>
<section class="section gb nopadtop"><!-- Listagem de todos os cursos -->
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row blog-grid">
                <?php foreach ($aluno_cursos as $curso) : ?>
                    <div class="col-md-4">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="<?php echo site_url('edu/upload/cursos-geral/' . $curso->id . '.jpg') ?>" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <div class="course-details">
                                <h4>
                                    <small><?php echo $curso->categoria; ?></small>
                                    <a href="#" title="<?php echo $curso->nome; ?>"><?php echo $curso->nome; ?></a>
                                </h4>
                                <p><?php echo $curso->descricao; ?> </p>
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
                        <!-- <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">...</a></li> -->
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>


<!-- Custom scripts -->
<?php echo $this->section('scripts'); ?>
<?php $this->endSection(); ?>
