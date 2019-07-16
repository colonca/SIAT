@extends('layouts.app')

@section('content')

<div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard_psicologo')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li>
                <a href="{{route('intervenciones_individuales.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Intervenciones
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Nueva Intervención
                </a>
            </li>

        </ol>
    </div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2>FORMATO DE ORIENTACIÓN PSICOLÓGICA</h2>
            </div>
        </div>

        <div class="body">
            <form id="formulario" method="POST">
                <h3>Datos Personales del Estudiante</h3>
                <fieldset>
                        <div class="row clearfix">

                                 <!--<div class="col-md-8">
                                   <b>No. Historia Psicológica</b>
                                     <div class="input-group">
                                         <span class="input-group-addon">
                                             <i class="material-icons">blur_on</i>
                                         </span>
                                         <div class="form-line">
                                                 <input type="text" name="no_historia" class="form-control">
                                         </div>
                                     </div>

                                </div>
        
                                <div class="col-md-4">
                                    <b>Fecha</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="fecha_H" id="fecha_H" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>-->

                              
                                <div class="col-md-3">
                                        <b>Identificación</b>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                        <i class="material-icons">payment</i>
                                                    </span>
                                            <div class="form-line">
                                                <input type="hidden" name="estudiante_id" id="estudiante_id">
                                                <input type="text" name="identificacion" id ="identificacion" class="form-control" onblur="cargarEstudiante(event)" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-4">
                                                <b>Nombres y Apellidos</b>
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                                <i class="material-icons">perm_identity</i>
                                                            </span>
                                                    <div class="form-line">
                                                        <input type="text" name="nombres" id="nombres" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Fecha de Nacimiento</b>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line ">
                                                        <input type="text" name="fecha_nacimiento"
                                                            class="form-control datepicker_component"
                                                            placeholder="Escoja una fecha..." required>
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="col-md-2">
                                                <b>Edad</b>
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                                <i class="material-icons">person_outline</i>
                                                            </span>
                                                    <div class="form-line">
                                                        <input type="text" name="edad" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <b>Estado Civil</b>
                                                    <div class="input-group">
                                                        <select name="estado_Civil" class="form-control show-tick" required>
                                                                <option value="">Por favor,elija una opción</option>
                                                                <option>Soltero(a)</option>
                                                                <option>Casado(a)</option>
                                                                <option>Union Libre</option>
                                                                <option>Divorciado(a)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                            <b>Celular</b>
                                                            <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    <i class="material-icons">phone_android</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="celualr" id="celular" class="form-control" required disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Dirección de Residencia</b>
                                                            <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                            <i class="material-icons">add_location</i>
                                                                        </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <b>Procedencia</b>
                                                            <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                            <i class="material-icons">edit_location</i>
                                                                        </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="procedencia" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                                <b>¿Trabaja?</b>
                                                                <div class="form-check-inline"><br>
                                                                    <input name="trabaja" type="radio" class="form-check-input"
                                                                        id="radio_1" value="si">
                                                                    <label for="radio_1">Si</label>
                                                                    <input name="trabaja" type="radio" id="radio_2"
                                                                        class="form-check-input" value="no">
                                                                    <label for="radio_2">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <b>Si su respuesta es NO, ¿Dé dónde proceden los recursos
                                                                    económicos?</b>
                                                                <div class="input-group">
                                                                    <div class="form-line">
                                                                        <textarea rows="2" name="respuesta"
                                                                            class="form-control no-resize"
                                                                            placeholder="Escriba aquí..."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <b>Tipo de Familia en la que Vive</b>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="tipo_Familia" class="form-control show-tick" required>
                                                                    <option value="">Por favor, elija una opcion</option>
                                                                    <option value="MONOPORANTERAL">MONOPORANTERAL</option>
                                                                    <option value="NUCLEAR">NUCLEAR</option>
                                                                    <option value="EXTENSA">EXTENSA</option>
                                                                    <option value="INDIVIDUAL">INDIVIDUAL</option>
                                                                    <option value="OTRAS">OTRAS</option>
                                                                </select>
                                                            </div>
                    </div>
 
                </fieldset>

                <h3>Datos Académicos del Estudiante</h3>
                <fieldset>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <b>Programa</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">school</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" id="programa" name="programa" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <b>Fecha de Ingreso a la Universidad: Año</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="anio_ingreso" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Semestre</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">timeline</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" id="semestre" name="semestre" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <b>Promedio Acumulado</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assessment</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="promedioA" id="promedioA" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <b>Promedio Semestral</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assessment</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="promedioS" id="promedioS" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Riesgo</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">bookmark_border</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="riesgo" id="riesgo" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6"><b>La relación con sus compañeros de clases es: </b>
                            <div class="form-check-inline">
                                <br>
                                <input name="respuestac" type="radio" class="form-check-input" id="radio_3" value="MALA">
                                <label for="radio_3">Mala</label>
                                <input name="respuestac" type="radio" id="radio_4" class="form-check-input" value="REGULAR">
                                <label for="radio_4">Regular</label>
                                <input name="respuestac" type="radio" id="radio_5" class="form-check-input" value="BUENA">
                                <label for="radio_5">Buena</label>
                                <input name="respuestac" type="radio" id="radio_6" class="form-check-input" value="EXCELENTE">
                                <label for="radio_6">Excelente</label>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <b>La relación con sus docentes de clases es: </b>
                            <div class="input-group">
                                <div class="form-check-inline">
                                    <br>
                                    <input name="respuesta" type="radio" class="form-check-input" id="radio_7" value="MALA">
                                    <label for="radio_7">Mala</label>
                                    <input name="respuesta" type="radio" id="radio_8" class="form-check-input" value="REGULAR">
                                    <label for="radio_8">Regular</label>
                                    <input name="respuesta" type="radio" id="radio_9" class="form-check-input" value="BUENA">
                                    <label for="radio_9">Buena</label>
                                    <input name="respuesta" type="radio" id="radio_10" class="form-check-input" value="EXCELENTE">
                                    <label for="radio_10">Excelente</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Motivo de Consulta y Antecedentes</h3>
                <fieldset>
                        <div class="col-md-12">
                                <center><b>Motivo de la Consulta</b></center>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="motivo_Consulta"
                                            class="form-control no-resize"
                                            placeholder="Escriba aquí..." maxlength="250" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center><b>Antecedentes Personales</b></center>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="antecedentesPersonales"
                                                          class="form-control no-resize"
                                                          placeholder="Escriba aquí..."   maxlength="250" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center><b>Antecedentes Familiares</b></center>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea rows="3" name="antecedentesfamiliares"
                                                  class="form-control no-resize"
                                                  placeholder="Escriba aquí..."  maxlength="250" required></textarea>
                                    </div>
                                </div>
                            </div>
                </fieldset>

                <h3>Impresión Diagnostica y Plan de Acción</h3>
                <fieldset>
                        <div class="col-md-12">
                                <center><b>Impresión Diagnóstica</b></center>
                                <div class="input-group">
                                        <select name="impresion_Diagnostica[]" multiple class="form-control show-tick" required>
                                            <option>Por favor, elija una opción</option>
                                            @foreach($impresiones as $impresion)
                                                <option value="{{$impresion->id}}">{{$impresion->descripcion}}</option>
                                            @endforeach
                                        </select>                                       
                                </div>
                            </div>

                            <div class="col-md-12">
                                    <center><b>Plan de Acción</b></center>
                                    <div class="input-group">
                                            <div class="form-line">
                                                <textarea rows="3" name="plan"
                                                    class="form-control no-resize"
                                                    placeholder="Escriba aquí..." required></textarea>
                                            </div>
                                        </div>
                                   
                                </div>

                </fieldset>
            </form>
        </div>
    </div>

</div>

<!-- Modal -->
@endsection


    @section('scripts')

    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/jquery.steps-1.1.0/jquery.steps.min.js')}}"></script>

    <script>
        $(function () {

            let now =new Date();
            let mes = now.getMonth().toString().length < 2 ? '0'+(now.getMonth()+1) : (now.getMonth()+1);
            let dia = now.getDay().toString().length < 2 ? '0'+now.getDay() : now.getDay();
            $('#fecha_H').val(now.getFullYear()+'-'+mes+'-'+dia);
            //Datetimepicker plugin
            //Bootstrap datepicker plugin

            $('.datepicker_component').datepicker({
                autoclose: true,
                dateFormat: 'yyyy/mm/dd'
            });
            //

        });
        var form = $('#formulario').show();

        form.steps({
            labels: {
            finish: "Guardar",
            next: "Siguiente",
            previous: "Atrás"
            },
            headerTag: 'h3',
            bodyTag: 'fieldset',
            transitionEffect: 'slideLeft',
            onInit: function (event, currentIndex) {
                $.AdminBSB.input.activate();

                //Set tab width
                var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
                var tabCount = $tab.length;
                $tab.css('width', (100 / tabCount) + '%');

                //set button waves effect
                setButtonWavesEffect(event);
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                if (currentIndex > newIndex) { return true; }

                if (currentIndex < newIndex) {
                    form.find('.body:eq(' + newIndex + ') label.error').remove();
                    form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
                }

                form.validate().settings.ignore = ':disabled,:hidden';
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                setButtonWavesEffect(event);
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ':disabled';
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                    axios.post('{{url('intervenciones_individuales')}}',$('#formulario').serialize())
                        .then(response => {
                            let data = response.data;
                            if(data.status == 'error'){
                                $.notify(data.message);
                            }else{
                                $.notify('Historia Psicosocial Guardada Correctamente','success');
                                setTimeout(function () {
                                    // location.reload();
                                },2000);
                            }


                    });
            }
        });

        function setButtonWavesEffect(event) {
            $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
            $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
        }

        function cargarEstudiante(event){
          let cedula = event.target.value;
          const url = 'estudiantes/'+cedula;
          axios.get('{{url('/')}}/estudiante/'+cedula).then(response => {
             let data = response.data;
             $('#nombres').val(data.nombres);
             $('#promedioS').val(data.promedio_general);
             $('#promedioA').val(data.promedio_semestral);
             $('#celular').val(data.celular);
             $('#direccion').val(data.direccion);
             $('#riesgo').val(data.estado.substr(2));
             $('#programa').val(data.programa);
             $('#semestre').val(data.periodo_cronologico);
             $('#estudiante_id').val(data.id);
          });
        }


    </script>

@endsection