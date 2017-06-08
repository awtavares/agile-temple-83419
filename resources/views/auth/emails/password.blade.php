@extends('layouts.app-auth')

@section('content')

	<!-- Password -->
    <div class="mt-login">
		Clique aqui para alterar sua senha: 
		<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
	</div>
	
@endsection