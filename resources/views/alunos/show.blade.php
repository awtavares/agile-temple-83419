@extends('layouts.app')

@section('content')

    <section class="content-header">
        <a href="{{ route('app.alunos.index') }}" class="btn btn-info">Voltar</a>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visualizar aluno</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.alunos.index') }}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nome do evento"
                                           name="nome" value="{{$aluno->name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">E-mail</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Local do evento"
                                           name="local" value="{{$aluno->email}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 110%; display:none;">
                                    Enviar
                                </button>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection
