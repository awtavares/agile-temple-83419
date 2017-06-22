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
                <form class="form-horizontal" method="POST" name="form" action="{{ route('app.eventos.enviarEmail') }}">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Selecione os eventos</h3>


                            <input type="submit"
                               class="btn btn-success pull-right" value="Enviar e-mail">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if(count($eventos) > 0)
                                <table class="table table-bordered">
                                    @foreach($eventos as $evento)
                                        <tr>
                                            <td> <input type="checkbox" name="eventos[]" value="{{ $evento->id }}"
                                                        style="margin: 8px;width: 17px;height: 17px;"> </td>                                        {{--                                                <td>{{ $evento->id }}</td>--}}
                                            <td>{{ $evento->nome }}</td>
                                            <td>{{ $evento->local }}</td>
                                            <!-- Não funciona -->
                                            <td>{{ date('d/m/Y', strtotime($evento->data_do_evento)) }}</td>

                                    @endforeach
                                </table>
                            @else
                                <h2 class="text-center"> Não há eventos.</h2>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection