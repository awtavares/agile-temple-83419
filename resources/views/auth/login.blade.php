@extends('layouts.app-auth')

@section('content')

    <!-- Login -->
    <div class="mt-login">
        <div class="mt-logo">
            <div class="mentoring-icon logoicon logoicon--mentoring"></div>
            <h2 class="mt-heading">Mentoring</h2>
        </div>

        <div style="margin:10px"></div>

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{  Session::get('error') }}
            </div>
        @endif

        <div class="mt-login-content">

            {!! Form::open(['method' => 'POST', 'route' => 'login.auth']) !!}

                {{ csrf_field() }}

                <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">

                    {!! Form::text('email', null, ['class' => 'email',  'id' => 'email', 'placeholder' => 'E-mail']) !!}

                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif

                </div>

                <div class="form-password{{ $errors->has('password') ? ' has-error' : '' }}">

                    {!! Form::password('password', ['class' => 'password', 'id' => 'password', 'placeholder' => 'Senha']) !!}

                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif

                </div>

                <div class="mt-login-btn">
                    <div class="submit">
                       {!! Form::submit('ENTRAR') !!}
                    </div>
                    <div class="clear"></div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>
                <li><p>Não possui <a href="{{ route('login.index') }}">conta?</a></p></li>
            <span>|</span>
            <li><p>Esqueceu a <a href="{{ url('/password/reset') }}">senha?</a></p></li>
            <div class="clear"></div>
        </ul>
    </div>

@endsection