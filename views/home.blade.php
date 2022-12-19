@extends('templates.default')
@section('content')
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
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
@if($_SESSION['imagem_tutor']=="IMAGE_DEFAULT" || $_SESSION['imagem_tutor']==null)
                                <img src="assets/img/avatar.png" alt="Profile" class="rounded-circle">
                            @else
                                <img src="data:image/jpeg;base64,{{$_SESSION['imagem_tutor']}}" alt="Profile" class="rounded-circle">
                            @endif

                            <h2>Tutor: {{$_SESSION['first_name']}}</h2>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão Geral</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                    <h5 class="card-title">Detalhes do Perfil</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nome Completo do Tutor</div>
                                        <div class="col-lg-9 col-md-8">{{$_SESSION['first_name']." ".$_SESSION['last_name']}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$_SESSION['email']}}</div>
                                    </div>

                                    <form method="post" id="delete_conta" class="mt-2" action="delete_user">
                                        <input type="hidden" name="idusers" value="{{$_SESSION['iduser']}}">
                                        <a onclick="deleteonclick('delete_conta')" class="btn btn-danger btn-sm rounded-pill">Excluir minha conta</a>
                                    </form>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <h5 class="card-title">Perfil</h5>
                                    <form method="post" action="update_user" enctype="multipart/form-data">
                                        <!-- Campo Hidden -->
                                        <input type="hidden" name="idusers" value="{{$_SESSION['iduser']}}">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem do Tutor</label>
                                            <div class="col-md-8 col-lg-9">

                                                <div class="pt-2">
                                                    <input type="file" name="imagem_tutor" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="first_name" class="col-md-4 col-lg-3 col-form-label">Seu Primeiro Nome</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="first_name" type="text" class="form-control" id="first_name" value="{{$_SESSION['first_name']}}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Seu Sobrenome</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="last_name" type="text" class="form-control" id="last_name" value="{{$_SESSION['last_name']}}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email" value="{{$_SESSION['email']}}">
                                                <span><small>Ao alterar esse e-mail, o seu login passará a ser realizado através do novo informado!</small></span>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                        </div>

                                    </form> <!-- END EDIT PROFILE -->



                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="post" action="update_password">

                                        <div class="row mb-3">
                                            <input type="hidden" name="update_pass" value="1">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control" id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control" id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repita Nova Senha</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Salvar Alteração</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
