<h1>Bem vindo, {{ $mentor->name }}</h1>

Sua credencial:
<ul>
    <li> {{ $mentor->email }}</li>
    <li> {{ $mentor->password }}</li>
</ul>

<footer>
    Essa é uma senha padrão, é extremamente recomendo a mudança dessa senha!
    <br>
    Mentoring
</footer>