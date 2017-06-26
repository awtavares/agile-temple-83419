@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Eventos
            <small>detalhes</small>
        </h1>
	</section>

	<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de eventos</h3>
                        @if(Auth::check())
                            @if(Auth::user()->roles == 3)
                                <a href="{{ route('app.eventos.preparativoEmail') }}"
                                   class="btn btn-info pull-right"
                                   style=" margin-left: 5px; "> Enviar E-mail Informativo
                                </a>
                            @endif
                        @endif

                        <a href="{{ route('app.eventos.create') }}"
                           class="btn btn-success pull-right"
                           style=" margin-right: 5px;"> Cadastrar Evento
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($eventos) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{--<th>#</th>--}}
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
{{--                                                <td>{{ $evento->id }}</td>--}}
                                                <td>{{ $evento->nome }}</td>
                                                <td>{{ $evento->local }}</td>
                                                <!-- Não funciona -->
                                                <td>{{ date('d/m/Y', strtotime($evento->data_do_evento)) }}</td>
                                                <td>{{ $evento->telefone }}</td>

                                                <td>
                                                   <a href="{{ route('app.eventos.show', $evento->id)  }}"><button class="btn btn-success btn-sm"> <i class='glyphicon glyphicon-eye-open'> </i> Visualizar</button></a>

                                                    @if(Auth::check())
                                                        @if(Auth::user()->roles == 3 && 2)

                                                         <a href="{{ route('app.eventos.edit', $evento->id)  }}"><button class="btn btn-info btn-sm"> <i class='glyphicon glyphicon-edit'> </i> Editar</button></a>

                                                         <a href="{{ route('app.eventos.delete', ['id' => $evento->id])  }}"><button class="btn btn-danger btn-sm"> <i class='glyphicon glyphicon-trash'> </i> Excluir</button></a>
                                                        <!-- CORRIGINDO... -->
                                                         {{--<form action="{{ route('app.eventos.delete')}}" method="post">--}}
                                                             {{--<input type="hidden" name="evento_id" value="{{$evento->id}}">--}}
                                                             {{--<a href="#"><button type="submit" class="btn btn-danger btn-sm">Excluir</button></a>--}}
                                                         {{--</form>--}}
                                                        @endif
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center"> Não há eventos.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection