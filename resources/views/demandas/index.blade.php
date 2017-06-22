@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Demandas
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de demandas</h3>

                        @if(Auth::check())
                            @if(Auth::user()->roles == 1)
                                <a href="{{ route('app.demand.create') }}" class="btn btn-success pull-right"
                                   style="margin: 5px;">Nova demanda</a>
                            @endif
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($demands) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    {{--<th>Cód.</th>--}}
                                    <th>Assunto</th>
                                    <th>Postado em:</th>
                                    <th>Status</th>
                                    <th>Mudou o Status em:</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($demands as $demand)
                                    <tr>
                                        {{-- <td>{{ $demand->id }}</td> --}}
                                        <td>{{ $demand->subject }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($demand->created_at)) }}</td>
                                        <td>
                                            @if($demand->status == 0)
                                                <div class="label label-danger">
                                                    {{ "Declinada" }}
                                                </div>
                                                @elseif($demand->status == 1)
                                                    <div class="label label-info">
                                                        {{ "Em espera" }}
                                                    </div>
                                                @elseif($demand->status == 2)
                                                    <div class="label label-primary">
                                                        {{ "Encaminhado" }}
                                                    </div>
                                                @else
                                                    <div class="label label-success">
                                                        {{ "Avaliado" }}
                                                    </div>
                                                @endif
                                        </td>

                                        <td>{{ date('d/m/Y H:i:s', strtotime($demand->updated_at)) }}</td>

                                        <td>
                                            <a href="{{ route('app.demand.show', ['id' => $demand->id])  }}">
                                                <button class="btn btn-success btn-sm">Visualizar</button>
                                            </a>

                                            @if(Auth::check())
                                                @if(Auth::user()->roles == 1 && $demand->status == 1 || Auth::user()->roles == 3 && $demand->status == 1)
                                                    <a href="{{ route('app.demand.edit', ['id' => $demand->id])  }}">
                                                        <button class="btn btn-warning btn-sm">Editar</button>
                                                    </a>
                                                @endif
                                            @endif

                                            @if(Auth::check())
                                                @if(Auth::user()->roles == 3 && $demand->status == 1)
                                                    <a href="{{ route('app.demand.encaminhar', ['id' => $demand->id])  }}">
                                                        <button class="btn btn-primary btn-sm">Encaminhar</button>
                                                    </a>
                                                @endif
                                            @endif

                                            @if(Auth::check())
                                                @if(Auth::user()->roles == 1 || Auth::user()->roles == 3 && $demand->status == 1)
                                                    <a href="{{ route('app.demand.destroy', ['id' => $demand->id])  }}">
                                                        <button class="btn btn-danger btn-sm">Excluir</button>
                                                    </a>
                                                @endif
                                            @endif
                                            @if(Auth::check())
                                                @if(Auth::user()->roles == 2 && $demand->status == 2)
                                                    <a href="{{ route('app.demand.declinar', $demand->id)  }}">
                                                        <button class="btn btn-danger btn-sm">Declinar</button>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Paginação apenas para administrador ou mentor  !! Atualização 04/05 by jm !!  -->
                            @if(Auth::check())
                                @if(Auth::user()->roles == 3)
                                    {{ $demands->render() }}
                                @endif
                            @endif

                        @else
                            <h2 class="text-center"> Não há solicitação de demandas.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
