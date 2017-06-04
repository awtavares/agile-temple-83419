@extends('layouts.app-auth')

@section('content')

    <!-- Register -->
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

                {!! Form::open(['method' => 'POST', 'route' => 'login.create']) !!}

                {{ csrf_field() }}

                <div class="form-nome{{ $errors->has('name') ? ' has-error' : '' }}">

                    {!! Form::text('name', null, ['class' => 'name', 'id' => 'name', 'placeholder' => 'Seu nome']) !!}

                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif

                </div>

                <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">

                    {!! Form::text('email', null, ['class' => 'email', 'id' => 'email', 'placeholder' => 'E-mail']) !!}

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

                <div class="form-comfirma{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    {!! Form::password('password_confirmation', ['class' => 'password_confirmation', 'id' => 'password_confirmation', 'placeholder' => 'Confirme a senha']) !!}

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
                </div>
            

                <div class="mt-login-btn">
                    <div class="submit">
                        <input type="submit" value="REGISTRAR"/>
                    </div>
                    <ul style="display: none;">
                        <li><a href="#"><span class="face"></span></a></li>
                        <li><a href="#"><span class="twit"></span></a></li>
                        <li><a href="#"><span class="goog"></span></a></li>
                    </ul>
            
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>{{ route('login.register') }}
            <li><p>Faça <a href="{{ route('login') }}">login.</a></p></li>
            <span>|</span>
            <li><p>Esqueceu a <a href="{{ url('/password/reset') }}">senha?</a></p></li>
            <div class="clear"></div>
        </ul>
    </div>

@endsection