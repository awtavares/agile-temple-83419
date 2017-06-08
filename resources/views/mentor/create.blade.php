@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Mentor
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo mentor</h3>
                    </div>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{  Session::get('error') }}
                        </div>
                    @endif
                    {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'name' => 'form', 'route' => 'app.mentor.store']) !!}
                    @include('mentor.forms')
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </section>

@endsection
