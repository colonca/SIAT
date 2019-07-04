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
                <h3>Datos del Estudiante</h3>
                <fieldset>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <b>No. Historia Psicológica</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="no_historia" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>Fecha</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="fecha" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-3">
                                <b>Identificación</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="identificacion" class="form-control"">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <b>Nombres y Apellidos</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="nombre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Fecha de Nacimiento</b>
                                        <div class="input-group date">
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
                                            <div class="form-line">
                                                <input type="text" name="edad" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <b>Estado Civil</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="civil" class="form-control"">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                                <b>Celular</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="celualr" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Dirección de Residencia</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="direccion" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Procedencia</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="procedencia" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <b>¿Trabaja?</b>
                                                <div class="form-check-inline"><br>
                                                    <input name="respuesta" type="radio" class="form-check-input"
                                                        id="radio_1" checked="">
                                                    <label for="radio_1">Si</label>
                                                    <input name="respuesta" type="radio" id="radio_2"
                                                        class="form-check-input">
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

                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <b>Tipo de familia en la que vive</b>                                             
                                            </div>
                                            <div class="col-md-4">
                                                <select name="tipo_Familia" class="form-control show-tick">
                                                    <option>MONOPORANTERAL</option>
                                                    <option>NUCLEAR</option>
                                                    <option>EXTENSA</option>
                                                    <option>INDIVIDUAL</option>
                                                </select>
                                            </div>
                                        </div>
                    </div>
                </fieldset>

                <h3>Datos Académicos</h3>
                <fieldset>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <b>Programa</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">school</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="programa">
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
                                    <input type="text" name="anio_ingreso">
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
                                    <input type="text" name="semestre">
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
                                    <input type="text" name="promedioA">
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
                                    <input type="text" name="promedioS">
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
                                    <input type="text" name="riesgo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6"><b>La relación con sus compañeros de clases es: </b>
                            <div class="form-check-inline">
                                <br>
                                <input name="respuesta" type="radio" class="form-check-input" id="radio_3" checked="">
                                <label for="radio_3">Mala</label>
                                <input name="respuesta" type="radio" id="radio_4" class="form-check-input">
                                <label for="radio_4">Regular</label>
                                <input name="respuesta" type="radio" id="radio_5" class="form-check-input">
                                <label for="radio_5">Buena</label>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <b>La relación con sus docentes de clases es: </b>
                            <div class="input-group">
                                <div class="form-check-inline">
                                    <br>
                                    <input name="respuesta" type="radio" class="form-check-input" id="radio_6"
                                        checked="">
                                    <label for="radio_6">Mala</label>
                                    <input name="respuesta" type="radio" id="radio_7" class="form-check-input">
                                    <label for="radio_7">Regular</label>
                                    <input name="respuesta" type="radio" id="radio_8" class="form-check-input">
                                    <label for="radio_8">Buena</label>
                                </div>

                            </div>
                        </div>




                    </div>


                </fieldset>

                <h3>Motivo de Consulta y Antecedentes</h3>
                <fieldset>
                    
                </fieldset>

                <h3>Impresión Diagnostica y Plan de Acción</h3>
                <fieldset>
                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                </fieldset>
            </form>

        </div>
    </div>




    @endsection


    @section('scripts')

    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/jquery.steps-1.1.0/jquery.steps.min.js')}}"></script>

    <script>

        var form = $('#formulario').show();
        form.steps({
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
                console.log($('#formulario').serialize());
            }
        });



        function setButtonWavesEffect(event) {
            $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
            $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
        }

    </script>

    <script>
        $(function () {
            //Datetimepicker plugin
            //Bootstrap datepicker plugin

            $('.datepicker_component').datepicker({
                autoclose: true,
                dateFormat: 'yyyy/mm/dd'
            });
            //

        });
    </script>





    @endsection