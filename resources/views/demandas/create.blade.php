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
                        <h3 class="box-title">Nova demanda</h3>
                    </div>


                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form', 'route' => 'app.demand.store']) !!}
                        @include('demandas.forms')
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>

@endsection
