@extends('citas.estudiante.index')

@section('content')
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            @if(session()->has('info'))
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-success">
                        <strong>Bien Hecho!</strong> {{session('info')}}
                    </div>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{session('error')}}
                    </div>
                </div>
            @endif

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <h1 style="margin-left: 10px;">Agendar Cita</h1>
                        </div>
                    </div>
                    <div class="body">
                        <form action="{{route('actualizarContraseña')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="cedula" value="{{session('estudiante')->cedula}}">
                            <div class="row clearfix">
                                <?php
                                      date_default_timezone_set('America/Bogota');
                                      setlocale(LC_TIME,"es_CO");;
                                      $fechaFFase = date('Y-m-d');
                                      $nuevafecha = date('Y-m-d',strtotime ( '+1 day' , strtotime ($fechaFFase )));
                                ?>
                                <span class="label label-danger pull-right m-r-20">{{strftime('%A %d de %B del %Y',strtotime($nuevafecha))}}</span>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <b>Hora</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">
                                                    alarm
                                                </i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Psicologo</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <div class="panel-group" id="accordion_10" role="tablist" aria-multiselectable="true">
                                            <?php
                                                $i = 1;
                                            ?>
                                            @foreach($psicologos as $psicologo )
                                                <div class="panel panel-col-green">
                                                    <div class="panel-heading" role="tab" id="{{'heading'.$i}}">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion_10" href="#{{'collapse'.$i}}" aria-expanded="false" aria-controls="{{'collapse'.$i}}" class="collapsed col-black">
                                                                <i class="material-icons">face</i>
                                                               {{$psicologo['nombre']}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{'collapse'.$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{'heading'.$i}}" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body" style="overflow-y: scroll; height: 125px;">
                                                            <ul class="list-group">
                                                                <?php $j= 1;?>
                                                                @foreach($psicologo['horarios'] as $horario)
                                                                    <li class="list-group-item">
                                                                        <input name="{{'grupo'}}" type="radio" id="{{'radio'.$j}}" class="with-gap radio-col-green" multiple>
                                                                        <label for="{{'radio'.$j}}">{{$horario->hora}}:00</label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i++; ?>
                                            @endforeach

                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-cyan waves-effect waves-light pull-right" width="150px">
                                           Solicitar Cita
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- Row -->
    </div>
@endsection
