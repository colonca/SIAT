@extends('layouts.app')

@section('styles')
    <style>
        #form3 table {
            font-weight: bold;
            border-collapse: separate;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }
        table thead th,tr{
            text-align: center;
            border-radius: 5px;
        }

        td:hover {
            cursor: pointer;
            color: black;
            opacity: 0.5;
        }

    </style>
@endsection

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('psicologos.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Gestion de Psicologos
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Nuevo Psicologo
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('info'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success">
                <strong>Bien Hecho!</strong> {{session('info')}}
            </div>
        </div>
    @endif

    <form id="formulario" action="psicologos">
        <div id="form1" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Información Personal
                            <small>Complete con precision la siguiente información para asegurarnos de mantener un registro actualizado de la informacion del personal</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <b>Numero de Identificacion</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="cedula" class="form-control nombre" placeholder="Ex: 7765848xxx" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <b>Primer Nombre</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="primer_nombre" class="form-control nombre" placeholder="Ex: daniel" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Segundo Nombre</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text"  name="segundo_nombre" class="form-control apellido" placeholder="Ex: andres">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Primer Apellido</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="primer_apellido" class="form-control time12" placeholder="Ex: aguirre" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Segundo Apellido</b>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="segundo_apellido" class="form-control " placeholder="Ex: morales">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <b>Celular</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="celular" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Telefono Domiciliario</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="telefono" class="form-control mobile-phone-number" placeholder="Ex: +000 (000) 00-00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Dirección</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">place</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="direccion" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Barrio</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">my_location</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text"  name="barrio" class="form-control money-euro" placeholder="Ex:villa ligia" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <b>Correo Electronico</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control email" placeholder="Ex: example@example.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Correo Institucional</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="email" name="email_institucional" class="form-control email" placeholder="Ex: example@example.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <b>Fecha de Nacimiento</b>
                                        <div class="input-group date">
                                            <div class="form-line ">
                                                <input type="text" name="fecha_nacimiento" class="form-control datepicker_component" placeholder="Please choose a date..." required>
                                            </div>
                                            <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-lg btn-success pull-right" onclick="irAdelante(event,1)">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form2" style="display: none" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Información de Contacto de Emergencia
                            <small>Siempre es importante saber a quien contactar en caso de una emergencia</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <b>Nombre del contacto de emergencia</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="nombre" class="form-control date" placeholder="Ex: daniel" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <b>Relación o parentezco (Conyuge,Padre,Amigo,ETC)</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="paretezco" class="form-control time24" placeholder="Ex: andres" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Celular</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="celular_parentezco" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-lg btn-success pull-right" onclick="irAdelante(event,2)">Siguiente</button>
                                    <button type="submit" class="btn btn-lg btn-success pull-right m-r-10" onclick="irAtras(event,2)">Anterior</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form3" style="display: none" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Disponibilidad
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, vel.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="cal">
                                        <table id="tabla" class="table table-responsive table-bordered">
                                            <thead class="bg-green">
                                            <th>Hora</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miercoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="bg-light-green text-center">8:00-9:00</td>
                                                <td data-value="11" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="12" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="13" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="14" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="15" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">09:00-10:00</td>
                                                <td data-value="21" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="22" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="23" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="24" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="25" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">10:00-11:00</td>
                                                <td data-value="31" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="32" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="33" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="34" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="35" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">11:00-12:00</td>
                                                <td data-value="41" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="42" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="43" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="44" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="45" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-center" style=" color: black;background-color: rgb(232, 234, 237); border-radius: 4px;">
                                                    <h6 class="white">DESCANSO</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">14:00-15:00</td>
                                                <td data-value="71" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="72" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="73" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="74" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="55" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">15:00-16:00</td>
                                                <td data-value="81" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="82" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="83" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="84" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="85" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">16:00-17:00</td>
                                                <td data-value="91" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="92" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="93" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="94" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="95" onclick="addDisponibilidad(event)"></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-light-green text-center">17:00-18:00</td>
                                                <td data-value="101" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="102" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="103" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="104" onclick="addDisponibilidad(event)"></td>
                                                <td data-value="105" onclick="addDisponibilidad(event)"></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" onclick="guardar(event)" class="btn btn-lg btn-success pull-right">Guardar Psicologo</button>
                                        <button type="submit" class="btn btn-lg btn-success pull-right m-r-10" onclick="irAtras(event,3)">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script>
        $(function () {
            //Datetimepicker plugin
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY - HH:mm',
                clearButton: true,
                weekStart: 1
            });

            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                clearButton: true,
                weekStart: 1,
                time: false
            });

            $('.timepicker').bootstrapMaterialDatePicker({
                format: 'HH:mm',
                clearButton: true,
                date: false
            });

            //Bootstrap datepicker plugin
            $('#bs_datepicker_container input').datepicker({
                autoclose: true,
                container: '#bs_datepicker_container'
            });

            $('.datepicker_component').datepicker({
                autoclose: true,
                dateFormat: 'yyyy/mm/dd'
            });
            //
            $('#bs_datepicker_range_container').datepicker({
                autoclose: true,
                container: '#bs_datepicker_range_container'
            });
        });

        var horario = [];
        function addDisponibilidad(event) {
            if(!horario.includes(event.target.getAttribute('data-value'))){
                horario.push(event.target.getAttribute('data-value'));
            }else{
                removeItemFromArr(horario,event.target.getAttribute('data-value'));
            }

            if(event.target.classList.contains('hora-activa')){
                event.target.innerHTML = '';
                event.target.classList = '';
                event.target.style.backgroundColor ="white";
            }else{
                event.target.innerHTML = 'Disponible';
                event.target.style.color = 'black';
                event.target.classList = 'hora-activa';
                event.target.style.backgroundColor ="rgb(253, 231, 112)";
            }
        }

        function removeItemFromArr ( arr, item ) {
            var i = arr.indexOf( item );

            if ( i !== -1 ) {
                arr.splice( i, 1 );
            }
        }

        //funciones para avanzar en los formularios
        function irAdelante(event,div){
            event.preventDefault();
            const form1 = 1,
                form2 = 2,
                form3 = 3;

            if(div == form1) {
                if(!validarformulario(form1)){
                    return;
                }
            }else if(div == form2){
                if(!validarformulario(form2)){
                    return;
                }
            }

            let divActual = document.getElementById('form'+(div));
            let divSiguiente= document.getElementById('form'+(div+1));
            divActual.style.display = 'none';
            divSiguiente.style.display = 'block';
        }
        function  irAtras(event,div) {
            event.preventDefault();
            let divActual = document.getElementById('form'+(div));
            let divAnterior= document.getElementById('form'+(div-1));
            divActual.style.display = 'none';
            divAnterior.style.display = 'block';
        }

        //esta funcion valida que todos los campos requeridos esten rellenados de acuerdo al formulario enviado
        function validarformulario(form){
            var band = false;
            let inputs = '#form'+form+' '+'input[required]';
            document.querySelectorAll(inputs).forEach(x => {
                if(x.value == ''){
                    let parent = x.parentElement.parentElement;
                    if(parent.querySelector("label") == null){
                        let label =  document.createElement('label');
                        label.classList = 'error';
                        label.innerText = 'Este campo es requerido';
                        label.id = x.getAttribute('name')+'-error';
                        label.setAttribute('for',x.getAttribute('name'));
                        parent.appendChild(label);
                    }
                    band = true;
                    x.parentElement.addEventListener('keypress',function (event) {
                        if(this.parentElement.querySelector("label") != null){
                            this.parentElement.removeChild(this.parentElement.querySelector("label"));
                        }
                    });
                }

            });

            if(band){
                $.notify('Debe rellenar los campos requeridos');
            }

            return !band;

        }

        function guardar(event) {
            event.preventDefault();
            let data = new FormData(document.getElementById('formulario'));
            data.append('disponibilidad',horario);
            console.log(data.get('disponibilidad'));

            axios.post('{{url('/psicologos')}}',data)
                .then(function (response) {
                    let data =  response.data;
                   if(data.status == 'ok'){
                       $.notify('Datos Guardados Correctamente','success');
                       setTimeout(function () {
                           location.reload();
                       },2000);
                   }else {
                       $.notify(data.message);
                   }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    </script>
@endsection