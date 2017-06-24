@extends('layouts.app-auth')

<!-- Main Content -->
@section('content')

    <!-- Login -->
    <div class="mt-login">
        @if (session('status'))
            <div class="has-error">{{ session('status') }}</div>
        @endif

        <div class="mt-logo">
            <div class="mentoring-icon logoicon logoicon--mentoring"></div>
            <h2 class="mt-heading">Mentoring</h2>
        </div>

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{  Session::get('error') }}
            </div>
        @endif
        <div class="mt-login-content">

            {!! Form::open(['method' => 'POST', 'route' => ['login.newPasswordReset', 'id'=> $usuario->id]]) !!}

            {{ csrf_field() }}
            <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="senha" name="password" type="password" class="email" placeholder="Digite sua nova senha" />
                <input id="rSenha" name="rPassword" type="password" class="email" placeholder="Repita a seha informada" />
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="mt-login-btn">
                <div class="submit">
                    <input type="submit" value="ALTERAR SENHA"/>
                </div>

                <div class="clear"></div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
    </div>

@endsection
