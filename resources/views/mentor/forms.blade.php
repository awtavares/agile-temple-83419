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

    <div class="form-group">
        {!! Form::label('password', 'Senha', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Digite o sua senha']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_confirm', 'Confirme sua senha', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password_confirm', ['class' => 'form-control', 'placeholder' => 'Confirme sua senha']) !!}
        </div>
    </div>

    <div class="col-md-2">
        {!! Form::submit('Cadastrar', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 110%;']) !!}
    </div>

</div>