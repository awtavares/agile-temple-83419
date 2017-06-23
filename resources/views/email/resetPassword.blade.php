<p>Olá {{$usuario->name}}, </p>

<p>Para realizar a alteração da sua senha, </p>
    <a href="{{ route('login.resetPassword', ['id'=> $usuario->id]) }}"
       style=" margin-left: 5px; "> Clique Aqui
    </a>
</p>