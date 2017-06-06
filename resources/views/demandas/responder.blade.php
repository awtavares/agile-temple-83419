@extends('layouts.app')

@section('content')


    <section class="content-header">
        <h1>
            Demandas
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Responder demanda</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.demand.ask') }}">
                        <div class="box-body">
                            <input type="hidden" value="{{ $demand->id }}" name="demand_id">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Resposta:</label>
                                <div class="col-sm-6">
                                    <textarea cols="100" rows="10" style=" resize: none;" name="answer" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-info btn-flat" style="margin-left: 110%;">Enviar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
