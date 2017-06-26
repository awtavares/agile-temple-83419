@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Alunos
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de alunos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($alunos) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alunos as $aluno)
                                    <tr>
                                        <td>{{ $aluno->name }}</td>
                                        <td>
                                            <a href="{{ route('app.alunos.show', $aluno->id)  }}">
                                                <button class="btn btn-success btn-sm"> <i class='glyphicon glyphicon-eye-open'> </i> Visualizar</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            @if(Auth::check())
                                @if(Auth::user()->roles == 3)
                                    {{ $alunos->render() }}
                                @endif
                            @endif

                        @else
                            <h2 class="text-center"> Não há alunos cadastrados.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection