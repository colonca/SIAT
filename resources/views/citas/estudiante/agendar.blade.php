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
                        <form action="{{route('agendarcita')}}" method="post">
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
                                                <input type="hidden" id="id"  name="id">
                                                <input type="hidden" name="fecha" id="fecha" value="{{strftime('%Y-%m-%d',strtotime($nuevafecha))}}">
                                                <input type="text" id="hora"  name="hora" class="form-control date" placeholder="" disabled required>
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
                                                <input type="text"  id="psicologo" name="psicologo" class="form-control date" placeholder="" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <div class="panel-group" id="accordion_10" role="tablist" aria-multiselectable="true">
                                            @if(count($psicologos) == 0 )
                                                <div class="col-md-12" style="display: flex; justify-content: center;align-items: center;">
                                                    <p class="col-red">No hay psicologos disponibles para la fecha</p>
                                                </div>
                                            @endif
                                            <?php
                                                $i = 1;
                                                $j=1;
                                            ?>
                                            @foreach($psicologos as $psicologo )
                                                @if($psicologo['horarios']->count() == 0)
                                                    <div class="panel panel-col-red">
                                                @else
                                                    <div class="panel panel-col-green">
                                                @endif
                                                    <div class="panel-heading" role="tab" id="{{'heading'.$i}}">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion_10" href="#{{'collapse'.$i}}" aria-expanded="false" aria-controls="{{'collapse'.$i}}" class="collapsed col-black">
                                                                <i class="material-icons">
                                                                    account_circle
                                                                </i>
                                                               {{$psicologo['nombre']}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{'collapse'.$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{'heading'.$i}}" aria-expanded="false" style="height: 0px;">
                                                            @if($psicologo['horarios']->count() == 0)
                                                            <div class="panel-body" style="overflow-y: scroll; height: 125px;display: flex;justify-content: center;align-items: center;">
                                                                <p class="text-center">Sin Disponibilidad</p>
                                                            @else
                                                            <div class="panel-body" style="overflow-y: scroll; height: 125px;">
                                                                    <div class="demo-radio-button">
                                                                        @foreach($psicologo['horarios'] as $horario)
                                                                            <div  data-hora="{{$horario->hora}}" data-psicologo-id="{{$psicologo['id']}}"  data-psicologo-name="{{$psicologo['nombre']}}" class="col-md-12" >
                                                                                <input name="{{'grupo'.$i}}" type="radio" id="{{'radio'.$j}}" class="radio-col-blue" checked="" value="{{$horario->hora}}">
                                                                                <label for="{{'radio'.$j}}" onclick="selecionarHora(event)">{{$horario->hora}}:00</label>
                                                                            </div>
                                                                            <?php $j++; ?>
                                                                        @endforeach
                                                                    </div>
                                                             @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i++; ?>
                                            @endforeach

                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn bg-green pull-right" width="150px" onclick="solicitar(event)">
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

@section('scripts')
   <script>
       $(document).ready(function () {
           
       });

       function selecionarHora(event){
         const  hora = event.target.parentElement.getAttribute('data-hora') + ':00';
         const nombre  = event.target.parentElement.getAttribute('data-psicologo-name');
         const id = event.target.parentElement.getAttribute('data-psicologo-id');

         $('#id').val(id);
         $('#psicologo').val(nombre);
         $('#hora').val(hora);
         
       }

       function solicitar(event){

          event.preventDefault();
          let hora = $('#hora').val();
           hora =  hora.length == 5 ? hora.substring(0,2) : hora.substring(0,1) ;
           const nombre  =  $('#psicologo').val();
           const fecha = $('#fecha').val();
           const id =   $('#id').val();

           let data = new FormData();

           if(hora == '' && nombre == ''){

              $.notify('Por favor selecione un hora disponible'+'\n'+'para poder agendar una cita');

           }else{
                data.append('personal_id',id);
                data.append('fecha',fecha);
                data.append('hora',hora);

                axios.post('{{url('citas/estudiante/agendar')}}',data).then(response => {
                    let data = response.data;
                    if(data.status == 'ok'){
                        $.notify('Su Cita ha sido Agendada Correctamente','success');
                        setTimeout(function () {
                            location.reload();
                        },1000);
                    }else{
                        $.notify(data.message);
                    }

                }).catch(error => {
                    console.log(error);
                });
           }

       }

   </script>
@endsection
