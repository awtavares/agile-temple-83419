<p> Olá, {{$aluno->name}}!</p>

<p> Você já viu os novos eventos cadastrados no
    <a href="{{ asset('http://agile-temple-83419.herokuapp.com') }}">Sistema Mentoring.</a> ? </p>
<ul>
    @foreach($eventos[0] as $evento)
        <li> {{ $evento->nome }} </li>
    @endforeach
</ul>
<p> Para visualizar, acesse o <a href="{{ asset('http://agile-temple-83419.herokuapp.com') }}">Sistema Mentoring.</a> </p>