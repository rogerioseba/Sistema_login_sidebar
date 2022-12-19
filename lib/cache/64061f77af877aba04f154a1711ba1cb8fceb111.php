
<?php $__env->startSection('content'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item">Usuário</li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão Geral</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">


                                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                    <!-- Detalhes Edit Form -->
                                    <h5 class="card-title">Destalhes da Tag</h5>
                                    <form method="post" action="addtag" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Nº da Tag</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="hidden" name="userid" class="form-control" value="<?php echo e($_SESSION['iduser']); ?>">
                                                <div class="pt-2">
                                                    <input type="text" name="tag" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem do Pet</label>
                                            <div class="col-md-8 col-lg-9">

                                                <div class="pt-2">
                                                    <input type="file" name="imagem_pet" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Descrição</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="descricao" class="form-control" id="about" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nome_pet" class="col-md-4 col-lg-3 col-form-label">Nome do Pet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nome_pet" type="text" class="form-control" id="nome_pet" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="raca_pet" class="col-md-4 col-lg-3 col-form-label">Raça do Pet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="raca_pet" type="text" class="form-control" id="raca_pet" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="cor_pet" class="col-md-4 col-lg-3 col-form-label">Cor predominante do Pet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cor_pet" type="text" class="form-control" id="cor_pet" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="sexo_pet" class="col-md-4 col-lg-3 col-form-label">Sexo do Pet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="sexo_pet" type="text" class="form-control" id="sexo_pet">
                                                    <option value=""></option>
                                                    <option value="macho">macho</option>
                                                    <option value="fêmea">fêmea</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">País</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="pais" type="text" class="form-control" id="Country" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="cep" class="col-md-4 col-lg-3 col-form-label">CEP</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cep" onblur="pesquisacep(this.value);" type="text" class="form-control" id="cep" size="10" maxlength="9" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="rua" class="col-md-4 col-lg-3 col-form-label">Logradouro</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="logradouro" type="text" class="form-control" id="rua" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="numero_logradouro" class="col-md-4 col-lg-3 col-form-label">Nº</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="numero_logradouro" type="text" class="form-control" id="numero_logradouro" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bairro" class="col-md-4 col-lg-3 col-form-label">Bairro</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bairro" type="text" class="form-control" id="bairro" value="">
                                            </div>
                                        </div><div class="row mb-3">
                                            <label for="cidade" class="col-md-4 col-lg-3 col-form-label">Cidade</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cidade" type="text" class="form-control" id="cidade" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="uf" class="col-md-4 col-lg-3 col-form-label">Estado</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="estado" type="text" class="form-control" id="uf" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telefone" type="text" class="form-control phone_with_ddd" id="Phone" value="">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                        </div>
                                    </form>
                                    <!-- End Detalhes Edit Form -->

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tippet_Tag\views/add_tag.blade.php ENDPATH**/ ?>