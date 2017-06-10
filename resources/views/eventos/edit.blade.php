@extends('layouts.app')

@section('content')

    <section class="content-header">
		<a href="{{ route('app.eventos.index') }}" class="btn btn-info">Voltar</a>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visualizar evento</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.eventos.update') }}">
						
                        <input type="hidden" name="evento_id" value="{{$evento->id}}" >
						
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nome do evento" 
										   name="nome" value="{{$evento->nome}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Local</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Local do evento"
										   name="local" value="{{$evento->local}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Data</label>
                                <div class="col-sm-6">
									<input type="date" class="form-control" id="inputDate3" placeholder="Data do evento" name="data_do_evento" value="{{$evento->data_do_evento}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Telefone" 
										   name="telefone" value="{{$evento->telefone}}" >
                                </div>
                            </div>
						

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 0%;">
									Atualizar</button>
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
