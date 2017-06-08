@extends('layouts.app-auth')

@section('content')

    <!-- Reset Login -->
    <div class="mt-login">
        <div class="mt-logo">
            <div class="mentoring-icon logoicon logoicon--mentoring"></div>
            <h2 class="mt-heading">Mentoring</h2>
        </div>

        <div class="mt-login-content">
            <form method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="text" class="email" placeholder="E-mail" value="{{ $email or old('email') }}" />
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="form-password{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" name="password" type="password" class="password" placeholder="Senha" />
                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>
                
                <div class="form-comfirma{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="password-confirm" placeholder="Confirme a senha" />
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
                </div>

                <div class="mt-login-btn">
                    <div class="submit">
                        <input type="submit" value="COMFIRMAR"/>
                    </div>
                    <ul>
                        <li><a href="https://www.facebook.com/unipeoficial" target="_blank"><span class="face"></span></a></li>
                        <li><a href="https://twitter.com/unipeoficial" target="_blank"><span class="twit"></span></a></li>
                        <li><a href="https://plus.google.com/110704726396562900035" target="_blank"><span class="goog"></span></a></li>
                    </ul>
            
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>
            <li><p>Faça <a href="{{ url('/login') }}">login.</a></p></li>
            <span>|</span>
            <li><p>Não possui <a href="{{ url('/register') }}">conta?</a></p></li>
            <div class="clear"></div>
        </ul>
    </div>

@endsection
