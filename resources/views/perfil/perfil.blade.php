@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Editar perfil
            <small>detalhes</small>
        </h1>
    </section>
    @if(Session::has('error'))
        <div class="alert alert-danger">
            <?=  Session::get('error') ?>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">
            <?=  Session::get('success') ?>
        </div>
    @endif
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Atualize seus dados</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.perfil.atualizarDados') }}">

                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text"  class="form-control" id="inputEmail3" placeholder="Nome"
                                           name="name" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">E-mail</label>

                                <div class="col-sm-6">
                                    <input type="text"  class="form-control" id="inputEmail3" placeholder="E-mail"
                                           name="email" value="{{$user->email}}">
                                </div>

                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 112%;">Atualizar dados</button>
                            </div>


                        </div>


                    </form>

                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alterar Senha</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.perfil.atualizarSenha') }}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Senha atual</label>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control" class ="password" id="inputPassword3"
                                           placeholder="Digite sua senha atual" name="senhaAtual">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nova Senha</label>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control" class ="password" id="inputPassword3"
                                           placeholder="Digite a nova senha" name="novaSenha">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Repetir nova senha</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" class ="password"
                                           placeholder="Digite novamente a senha" name="confirmacaoSenha">
                                </div>
                            </div>




                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 111%;">Atualizar Senha</button>
                            </div>
                        </div>

                </div>
            </div>

        </div>

    </section>

@endsection