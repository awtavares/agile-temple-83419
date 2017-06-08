@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Cadastrar oportunidades
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nova Oportunidade</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.oportunidade.store') }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">Empresa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmpresa" placeholder="Digite aqui a empresa" name="empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label">Função</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputFuncao" placeholder="Digite aqui a função" name="funcao">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label">Local</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputLocal" placeholder="Digite aqui a local" name="local">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label">Descrição do trabalho</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputRequisito" placeholder="Digite aqui a descrição de trabalho" name="Descricao">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input5" class="col-sm-2 control-label">Remuneração</label>
                                <div class="col-sm-6">
                                    <input type= "nu" class="form-control" id="inputRequisito" placeholder="Digite aqui a remuneração" name="valor">
                                </div>
                            </div>


                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 110%;">Cadastrar</button>
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