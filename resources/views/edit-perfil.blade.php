@extends('layouts.app')

@section('content')

<section class="content-header">
    <h1>
        Editar perfil
        <small>detalhes</small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Atualize seus dados</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form', 'route' => 'app.perfil.store']) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('name', null, ['class' => 'form-control', 'name' => 'name', 'placeholder' => 'Nome']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('email', null, ['class' => 'form-control', 'name' => 'email', 'placeholder' => 'E-mail']) !!}
                        </div>
                    </div>

                    <div class="col-md-2">
                        {!! Form::submit('Atualizar dados', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 112%;']) !!}
                    </div>

                </div>

                {!! Form::close() !!}

            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Alterar Senha</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form', 'route' => 'app.perfil.update']) !!}

                <div class="box-body">

                   <div class="form-group">
                    {!! Form::label('password', 'Senha atual', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password', ['class' => 'form-control', 'password' => 'password', 'placeholder' => 'Senha atual']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('new_password', 'Nova senha', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('new_password', ['class' => 'form-control', 'password' => 'new_password', 'placeholder' => 'Nova senha']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirm', 'Nova senha', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password_confirm', ['class' => 'form-control', 'password' => 'password_confirm', 'placeholder' => 'Repetir nova senha']) !!}
                    </div>
                </div>

                <div class="col-md-2">
                    {!! Form::submit('Atualizar senha', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 112%;']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
</section>

@endsection
