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
                        <h3 class="box-title">Visualizar mentor</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.demand.responder') }}">
                        <div class="box-body">

                            <div style="margin: 20px"></div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Digite o seu nome" name="name" value="{{ $mentor->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">E-mail</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Digite o seu e-mail" name="email" value="{{ $mentor->email }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('app.mentor.area', ['id' => $mentor->id]) }}">
                                    <button type="button" class="btn btn-block btn-info btn-flat" style="margin-left: 110%;">Nova área de conhecimento</button>
                                </a>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('app.mentor.area', ['id' => $mentor->id]) }}">
                                    <button type="button" class="btn btn-block btn-success btn-flat" style="margin-left: 110%;" disabled>Área de conhecimento existente</button>
                                </a>
                            </div>

                        </div>
                            <!-- /.box-body -->
                            <!-- /.box-footer -->
                    </form>

                </div>


            </div>


        </div>
    </section>

    @if(count($act) > 0)
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Área de conhecimento</h3>
                        </div>
                            <div class="box-body">
                                    @foreach($act as $item)
                                        <div class="label label-default" style="margin-left: 10px;">
                                            {{ $item->name }}
                                        </div>
                                    @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection


