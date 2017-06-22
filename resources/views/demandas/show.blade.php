@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Demandas
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content-header">
        <a href="{{ route('app.demand.index') }}" class="btn btn-info">Voltar</a>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visualizar demanda</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form', 'route' => 'app.demand.responder']) !!}

                    <div class="box-body">

                        {!! Form::hidden('demand_id', $demand->id) !!}

                            <div class="form-group">
                                <div class="col-sm-6">
                                    {!! Form::hidden('email', $demand->email, ['class' => 'form-control', 'name' => 'email', 'disabled' => 'disabled']) !!}
                                </div>
                                    </div>

<<<<<<< HEAD
                                                    <div class="form-group">
                                                            {!! Form::label('aluno', 'Aluno', ['class' => 'col-sm-2 control-label']) !!}
                                                            <div class="col-sm-6">
                                                                {!! Form::text('aluno', $aluno->name, ['class' => 'form-control', 'name' => 'email', 'disabled' => 'disabled']) !!}
=======
                            <div class="form-group">
                                {!! Form::label('aluno', 'Aluno', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('aluno', $aluno->name, ['class' => 'form-control', 'name' => 'email', 'disabled' => 'disabled']) !!}
>>>>>>> 1a0d2ab0780a976d6d434640edd5a1973f65450f
                                </div>
                            </div>


                        @if($demand->status == 2)
                            @if($mentor)
                                    <div class="form-group">
                                        {!! Form::label('mentor', 'Mentor', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            {!! Form::text('mentor', $mentor->name, ['class' => 'form-control', 'name' => 'mentor', 'disabled' => 'disabled']) !!}
                                        </div>
                                    </div>
                            @endif
                        @endif

                            <div class="form-group">
                                {!! Form::label('title', 'Título', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('title', $demand->title, ['class' => 'form-control', 'name' => 'title', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('subject', 'Assunto', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('subject', $demand->subject, ['class' => 'form-control', 'name' => 'subject', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('doubt', 'Dúvida', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-6">
                                    {{ Form::textarea('doubt', $demand->doubt, ['class' => 'form-control', 'disabled' => 'disabled', 'style' => 'resize:none;']) }}
                                </div>
                            </div>

                        @if($demand->status == 3)
                                <div class="form-group">
                                    <h3 class="col-md-12" style="margin-left: 250px;">Respondido por:
                                        @if($mentor)
                                            {{ $mentor->name }}
                                        @endif
                                    </h3>
                                    {!! Form::label('answer', 'Resposta:', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-6">
                                        {{ Form::textarea('answer', $demand->answer, ['class' => 'form-control', 'disabled' => 'disabled', 'style' => 'resize:none;']) }}
                                    </div>
                            </div>
                        @endif

                        @if(Auth::check())
                            @if(Auth::user()->roles == 2)
                                @if($demand->status == 2)
                                        <div class="col-md-2">
                                            {!! Form::submit('Responder', ['class' => 'btn btn-block btn-success btn-flat', 'style' => 'margin-left: 0%;']) !!}
                                        </div>
                                @endif
                            @endif
                        @endif

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

@endsection
