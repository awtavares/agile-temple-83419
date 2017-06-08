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
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar demanda</h3>
                    </div>
                    {!! Form::model($demand, ['route' => ['app.demand.update', 'id' => $demand->id], 'class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form']) !!}
                            @include('demandas.forms')
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </section>

@endsection
