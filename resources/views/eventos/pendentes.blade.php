@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Eventos Pendentes
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de eventos pendentes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($eventos) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Evento</th>
                                    <th>Local</th>
                                    <th>Data do Evento</th>
                                    <th>Telefone do Evento</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eventos as $evento)
                                    <tr>

                                        <td>{{ $evento->id }}</td>
                                        <td>{{ $evento->nome }}</td>
                                        <td>{{ $evento->local }}</td>
                                        <td>{{ $evento->data_do_evento }}</td>
                                        <td>{{ $evento->telefone }}</td>

                                        <td>
                                            <!-- está sendo usado? -->
                                            @if(Auth::check() && Auth::user()->roles > 1)
                                                <form action="{{ route('app.eventos.aprovar')}}" method="post">
                                                    <input type="hidden" name="evento_id" value="{{$evento->id}}">
                                                    <a href="#"><button type="submit" class="btn btn-success btn-sm">Aprovar</button></a>
                                                </form>
                                                <form action="{{ route('app.eventos.rejeitar')}}" method="post">
                                                    <input type="hidden" name="evento_id" value="{{$evento->id}}">
                                                    <a href="#"><button type="submit" class="btn btn-danger btn-sm">Rejeitar</button></a>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center"> Não há eventos pendentes.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection