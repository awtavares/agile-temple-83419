@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Eventos
            <small>detalhes</small>

        </h1>


    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo evento</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.eventos.store') }}">
                        <div class="box-body">


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nome do evento" name="nome" value="{{old('nome')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Local</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Local do evento" name="local" value="{{old('local')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Data do evento</label>
                                <div class="col-sm-6">
									<input type="date" class="form-control" id="inputDate3" placeholder="Data do evento" name="data_do_evento" value="{{old('data_do_evento')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Telefone" name="telefone" value="{{old('telefone')}}">
                                </div>
                            </div>

                            

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 0%;">Enviar</button>
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
