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

            {!! Form::open(['method' => 'POST', 'route' => 'login.newPassword']) !!}
                {{ csrf_field() }}
                <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="text" class="email" placeholder="E-mail" value="{{ old('email') }}" />
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>          

                <div class="mt-login-btn">
                    <div class="submit">
                        <input type="submit" value="RECUPERAR"/>
                    </div>

                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>

            <li><p>Faça <a href="{{ url('/logar') }}">login.</a></p></li>
            <span>|</span>
            <li><p>Não possui <a href="{{ url('/logar/criar') }}">conta?</a></p></li>
            <div class="clear"></div>


        </ul>
    </div>

@endsection
