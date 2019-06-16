@extends('layouts.app')

@section('styles')
    <style>
          table {
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

    <form action="">
        <div class="row clearfix">
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
                                <div class="col-md-3">
                                    <b>Primer Nombre</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Ex: daniel">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Segundo Nombre</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control time24" placeholder="Ex: andres">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Primer Apellido</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control time12" placeholder="Ex: aguirre">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Segundo Apellido</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control datetime" placeholder="Ex: morales">
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
                                            <input type="text" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00">
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
                                            <input type="text" class="form-control mobile-phone-number" placeholder="Ex: +000 (000) 00-00">
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
                                            <input type="text" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx">
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
                                            <input type="text" class="form-control money-euro" placeholder="Ex: 99,99 €">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Correo Electronico</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control email" placeholder="Ex: example@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
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
                                            <input type="text" class="form-control date" placeholder="Ex: daniel">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <b>Relación o parentezco (Conyuge,Padre,Amigo,ETC)</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control time24" placeholder="Ex: andres">
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
                                            <input type="text" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
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
                                               <td data-value="51" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="52" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="53" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="54" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="55" onclick="addDisponibilidad(event)"></td>
                                           </tr>
                                           <tr>
                                               <td class="bg-light-green text-center">15:00-16:00</td>
                                               <td data-value="61" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="62" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="63" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="64" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="65" onclick="addDisponibilidad(event)"></td>
                                           </tr>
                                           <tr>
                                               <td class="bg-light-green text-center">16:00-17:00</td>
                                               <td data-value="71" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="72" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="73" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="74" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="75" onclick="addDisponibilidad(event)"></td>
                                           </tr>
                                           <tr>
                                               <td class="bg-light-green text-center">17:00-18:00</td>
                                               <td data-value="81" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="82" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="83" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="84" onclick="addDisponibilidad(event)"></td>
                                               <td data-value="85" onclick="addDisponibilidad(event)"></td>
                                           </tr>

                                           </tbody>
                                       </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success pull-right">Guardar Psicologo</button>
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
    <script>

        var horario = [];

         function addDisponibilidad(event) {
             if(!horario.includes(event.target.getAttribute('data-value'))){
                 horario.push(event.target.getAttribute('data-value'));
             }else{
                 removeItemFromArr(horario,event.target.getAttribute('data-value'));
             }
             console.log(horario);

             if(event.target.classList.contains('hora-activa')){
                 event.target.innerHTML = '';
                 event.target.classList = '';
                 event.target.style.backgroundColor ="white";
             }else{
                 event.target.innerHTML = 'Asignado';
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
    </script>
@endsection