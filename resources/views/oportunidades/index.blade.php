@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Oportunidades
            <small>detalhes</small>
        </h1>
	</section>
	
	<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de oportunidades</h3>

                        @if(Auth::check())
                            @if(Auth::user()->roles > 1)
                                 <a href="{{ route('app.oportunidades.create') }}" class="btn btn-success  pull-right"> Cadastrar Oportunidade </a>
                            @endif
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($oportunidades) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{--<th>#</th>--}}
                                        <th>Nome</th>
                                        <th>Local</th>
                                        <th>Remuneração</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($oportunidades as $oportunidade)
                                            <tr>
												
{{--                                                <td>{{ $oportunidade->id }}</td>--}}
                                                <td>{{ $oportunidade->nome }}</td>
                                                <td>{{ $oportunidade->local }}</td>
                                                <td>{{ $oportunidade->remuneracao }}</td>
												<td>
                                                   <a href="{{ route('app.oportunidades.show', $oportunidade->id)  }}"><button class="btn btn-success btn-sm">Visualizar</button></a>

                                                    @if(Auth::check())
                                                        @if(Auth::user()->roles > 1)
                                                            <a href="{{ route('app.oportunidades.edit', $oportunidade->id)  }}"><button class="btn btn-info btn-sm">Editar</button></a>
                                                            <!-- Não é necessário enviar um req post, vou comentar isso e colocar o certo em baixo -->
                                                            {{--<form action="{{ route('app.oportunidades.delete')}}" method="post">--}}
                                                                {{--<input type="hidden" name="oportunidade_id" value="{{$oportunidade->id}}">--}}
                                                                {{--<a href="#"><button type="submit" class="btn btn-danger btn-sm">Excluir</button></a>--}}
                                                            {{--</form>--}}
                                                            <a href="{{ route('app.oportunidades.delete', ['id' => $oportunidade->id])  }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center"> Não há oportunidades de emprego no momento.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection