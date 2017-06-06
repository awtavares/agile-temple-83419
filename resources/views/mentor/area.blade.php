@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Mentor
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Adicionar área de conhecimento</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.mentor.area.store') }}">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ $mentor->id }}">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Digite a área de conhecimento" name="name" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-info btn-flat" style="margin-left: 110%;">Adicionar para esse mentor</button>
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
