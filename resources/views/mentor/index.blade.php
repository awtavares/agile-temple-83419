@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Mentores
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de mentores</h3>

                        @if(Auth::check())
                            @if(Auth::user()->roles == 3)
                                <a href="{{ route('app.mentor.create') }}" class="btn btn-success pull-right" style="margin: 5px;">Novo mentor</a>
                            @endif
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($mentors) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mentors as $mentor)
                                    <tr>

                                        <td>{{ $mentor->name }}</td>
                                        <td>{{ $mentor->email }}</td>
                                        <td>
                                            <a href="{{ route('app.mentor.show', ['id' => $mentor->id])  }}"><button class="btn btn-success btn-sm">Visualizar</button></a>
                                            <a href="{{ route('app.mentor.edit', ['id' => $mentor->id])  }}"><button class="btn btn-warning btn-sm">Editar</button></a>
                                            <a href="{{ route('app.mentor.delete', ['id' => $mentor->id])  }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Paginação apenas para administrador !! Atualização 04/05 by jm !!  -->
                            @if(Auth::check())
                                @if(Auth::user()->roles == 3)
                                    {{ $mentors->render() }}
                                @endif
                            @endif

                        @else
                            <h2 class="text-center"> Não há mentores cadastrados.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
