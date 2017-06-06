@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Atuações
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nova área de atuação</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.area.store') }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Área de atuação</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Área de atuação" name="area">
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
