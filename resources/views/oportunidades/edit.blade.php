@extends('layouts.app')

@section('content')

    <section class="content-header">
		<a href="{{ route('app.oportunidades.index') }}" class="btn btn-info">Voltar</a>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visualizar oportunidade</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.oportunidades.update') }}">
                        <input type="hidden" name="oportunidade_id" value="{{$oportunidade->id }}">
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nome da oportunidade" 
										   name="nome" value="{{$oportunidade->nome }}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Local</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Local da oportunidade" name="local" value="{{$oportunidade->local }}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Remuneração</label>
                                <div class="col-sm-6">
									<input type="text" class="form-control" id="inputDate3" placeholder="Remuneração"
										   name="remuneracao" value="{{$oportunidade->remuneracao }}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Descrição</label>

                                <div class="col-sm-6">
									<textarea  cols="100" rows="10" style=" resize: none;" name="descricao" placeholder="Informe a descrição da oportunidade" >  {{$oportunidade->descricao }} </textarea>
                                </div>
                            </div>

                            

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 110%;"> Atualizar</button>
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
