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
                        <h3 class="box-title">Encaminhar para mentor</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" name="form" action="{{ route('app.demand.storeMe')}}">

                            <input type="hidden" value="{{ $demand->id }}" name="demand_id">

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Selecione o mentor:</label>
                                <div class="col-sm-6">
                                    {!! Form::select('mentor', $mentores , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <button class="btn btn-info">Enviar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection()
