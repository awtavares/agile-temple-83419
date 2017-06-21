@extends('layouts.app')

@section('content')

    @if(Auth::check())

        @if(Auth::user()->roles == 1)

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $demandas }}</h3>

                                <p>Minhas Demandas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                        </div>


                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $oportunidades = DB::table('oportunidades')->count() }}</h3>

                                <p>Total de Oportunidades</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-network"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $eventos }}</h3>

                                <p>Eventos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-chatboxes-outline"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->



                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
            </section>


            @endif

            @if(Auth::user()->roles == 2)

                <!-- Main content -->
                    <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{$demandas}}</h3>

                                        <p>Demandas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-document-text"></i>
                                    </div>
                                </div>


                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{ $oportunidades = DB::table('oportunidades')->count() }}</h3>

                                        <p>Total de Oportunidades</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-network"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>{{ $eventos = DB::table('eventos')->where('status','aprovado')->count() }}</h3>

                                        <p>Eventos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-chatboxes-outline"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->

                        </div>
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->



                            <!-- /.Left col -->
                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                            <section class="col-lg-5 connectedSortable">







                            </section>
                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->

                    </section>
                    <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->

            @endif

            @if(Auth::user()->roles == 3)
                <!-- Main content -->
                    <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{ $alunos }}</h3>

                                        <p>Total de alunos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-university"></i>
                                    </div>
                                </div>


                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{ $oportunidades }}</h3>

                                        <p>Total de Oportunidades</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-network"></i>
                                    </div>
                                </div>

                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{ $mentores }}</h3>

                                        <p>Total de mentores</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ribbon-b"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>{{ $demandas }}</h3>

                                        <p>Total de demandas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-document-text"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                    </section>
             @endif
         @endif

@endsection
