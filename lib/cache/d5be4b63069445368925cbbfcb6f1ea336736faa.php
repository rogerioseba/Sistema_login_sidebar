<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tippet - Painel TAG</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo URL_BASE; ?>/assets/img/logo-tippet.png" rel="icon">
    <link href="<?php echo URL_BASE; ?>/assets/img/logo-tippet.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo URL_BASE; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo URL_BASE; ?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo URL_BASE; ?>/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.2.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <script src="<?php echo URL_BASE; ?>/assets/js/viacep.js"></script>
</head>

<body>


        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="data:image/jpeg;base64,<?php echo e($tag->imagem_pet); ?>" alt="Profile" class="rounded-circle">
                            <h2>Nome do Pet: <?php echo e($tag->nome_pet); ?></h2>
                            <h3>Tutor: <?php echo e($tag->first_name); ?> <?php echo e($tag->last_name); ?></h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Informações</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Descrição</h5>
                                    <p class="small fst-italic"><?php echo e($tag->descricao); ?></p>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Raça</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($tag->raca_pet); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Cor</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($tag->cor_pet); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Sexo</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($tag->sexo_pet); ?></div>
                                    </div>

                                    <h5 class="card-title">Contato - Encontre meu dono</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">País</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($tag->pais); ?></div>
                                    </div>

                                    <div class="row">
                                        <?php
                                            $lugar = $tag->logradouro.', '.$tag->numero_logradouro.', '.$tag->bairro.', '.$tag->cep.', '.$tag->cidade;
                                    $maps = "https://www.google.com.br/maps/place/".$lugar;
                                        ?>
                                        <div class="col-lg-3 col-md-4 label">Endereço - <i class="bi bi-pin-map"></i></div>
                                        <div class="col-lg-9 col-md-8"><a href="<?php echo e($maps); ?>" target=\"_blank\" rel="noopener noreferrer"><?php echo e($tag->logradouro); ?>, <?php echo e($tag->numero_logradouro); ?>, <?php echo e($tag->bairro); ?>, <?php echo e($tag->cep); ?> ,<?php echo e($tag->cidade); ?>,<?php echo e($tag->estado); ?></a></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Telefone </div>
                                        <div class="col-lg-9 col-md-8"><i title="chamar no WhatsApp" class="bi bi-whatsapp"></i> <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo e($tag->telefone); ?>&text=Ol%C3%A1%20encontrei%20seu%20Pet!"><?php echo e($tag->telefone); ?></a></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($tag->email); ?></div>
                                    </div>

                                </div>



                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>



<footer id="footer" class="footer">
    <div class="copyright">
        Todos os direitos reservados
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Criado por <a href="https://primeseo.com.br/">Primeseo</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo URL_BASE; ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/quill/quill.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo URL_BASE; ?>/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo URL_BASE; ?>/assets/js/main.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js" integrity="sha512-2Pv9x5icS9MKNqqCPBs8FDtI6eXY0GrtBy8JdSwSR4GVlBWeH5/eqXBFbwGGqHka9OABoFDelpyDnZraQawusw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><?php /**PATH C:\xampp\htdocs\Tippet_Tag\views/viewtag.blade.php ENDPATH**/ ?>