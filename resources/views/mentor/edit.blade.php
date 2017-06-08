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
                        <h3 class="box-title">Editar mentor</h3>
                    </div>
                        {!! Form::model($mentor, ['route' => ['app.mentor.update', 'id' => $mentor->id], 'class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form']) !!}
                            <div class="box-body">

                                <div class="form-group">
                                        {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o seu nome']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Digite o seu e-mail']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        {!! Form::submit('Editar', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 110%;']) !!}
                                    </div>
                            </div>
                        {!! Form::close() !!}
                </div>

            </div>

        </div>
    </section>

@endsection
