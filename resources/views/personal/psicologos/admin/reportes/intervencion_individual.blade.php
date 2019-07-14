<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        div.general{
            margin:auto;
            margin-top: 50px;
            width: 800px;
            height: 800px;
        }
    </style>
</head>
<body>
  <div class="general">
    <div align="middle">
        <table cellspacing="0" cellpadding="2" border="2" style="width:97.5%">
            <tr align="middle">
                <td rowspan="3">
                   <center> <img width="80" height="60" src="{{ url('/images/logoU.png')}}" /></center>
                </td>
                <td rowspan="2"><center>UNIVERSIDAD POPULAR DEL CESAR</center></td>
                <td align="left">&nbsp;CODIGO: 120 102 124 234</td>
            </tr>
            <tr align="middle">
                <td align="left">&nbsp;VERSIÓN: 2</td>
            </tr>
            <tr align="middle">
                <td><center>FORMATO ORIENTACIÓN PSICOLOGICA</center></td>
                <td align="left">&nbsp;PAG: 1 de 3</td>
            </tr>
        </table>

        <br />
    </div>
    <div align="left">
        <div>
            <table cellspacing="0" cellpadding="3" border="1" style="width:50%">
                <tr>
                    <th align="left"><center>&nbsp;Historia Psicologica</center></th>
                    <th align="left">&nbsp;Fecha</th>
                </tr>
                <tr>
                    <td style="height: 25px"><center>{{$intervencion->id}}</center></td>
                    <td style="width:auto"><center>{{$intervencion->created_at}}</center></td>
                </tr>
            </table>

            <table cellspacing="0" cellpadding="2" border="1" style="width:97.8%">
                <tr style="background-color:rgb(53, 156, 53)">
                    <th colspan="2"><center>DATOS DEL ESTUDIANTE</center></th>
                </tr>
                <tr>
                    <td>&nbsp;NOMBRES Y APELLIDOS:  {{$intervencion->estudiante->nombres}}</td>
                    <td style="width: 110px">EDAD: {{$intervencion->edad}}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;FECHA DE NACIMIENTO:  DIA: {{strftime('%d',strtotime($intervencion->fecha_nacimiento))}} MES: {{strftime('%m',strtotime($intervencion->fecha_nacimiento))}} AÑO: {{strftime('%Y',strtotime($intervencion->fecha_nacimiento))}}
                        &nbsp;IDENTIFICACIÓN: {{$intervencion->estudiante->cedula}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;ESTADO CIVIL: {{$intervencion->estado_civil}} CELULAR: {{$intervencion->estudiante->celular}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;DIRECCIÓN DE RESIDENCIA: {{$intervencion->direccion}}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;PROCEDENCIA:{{$intervencion->procedencia}}</td>
                </tr>
                <tr>
                    <td style="border-color: black" colspan="2">
                        &nbsp;TRABAJA: {{ $intervencion->trabaja== 'si' ? 'SI * NO ___ ': 'SI____ NO  *' }} SI SU RESPUESTA ES NO DE DONDE
                        PROCEDEN LOS RECURSOS ECONOMICOS: {{ $intervencion->trabaja== 'no' ? $intervencion->procedencia_recursos : ''}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;TIPO DE FAMILIA EN LA QUE
                        VIVE:&nbsp;{{$intervencion->tipo_familia}}
                    </td>
                </tr>
                <tr style="background-color:rgb(53, 156, 53)">
                    <th colspan="2"><center>DATOS ACADÉMICOS</center></th>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;PROGRAMA:{{$intervencion->estudiante->programa}}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        FECHA DE INGRESO A LA
                        UNIVERSIDAD:&nbsp;AÑO: {{$intervencion->fecha_ingreso}}&nbsp;&nbsp;SEMESTRE:  {{$intervencion->estudiante->periodo_cronologico}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;PROMEDIO ACUMULADO:&nbsp;{{$intervencion->estudiante->promedio_general}}&nbsp;PROMEDIO
                        SEMESTRAL:&nbsp;{{$intervencion->estudiante->promedio_semestral}}&nbsp;&nbsp;RIESGO:{{substr($intervencion->estudiante->estado,2)}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;LA RELACIÓN CON SUS COMPAÑEROS DE CLASES
                        ES:&nbsp;&nbsp;{{$intervencion->relacion_compañeros}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;LA RELACIÓN CON SUS DOCENTES DE CLASES
                        ES:&nbsp;&nbsp;{{$intervencion->relacion_docente}}
                    </td>
                </tr>
                <tr style="background-color:rgb(53, 156, 53)">
                    <th colspan="2"><center>&nbsp;MOTIVO DE CONSULTA</center></th>
                </tr>
                <tr>
                    <td colspan="2" height="150px">&nbsp;{{$intervencion->motivo_consulta}}</td>
                </tr>
                <tr style="background-color:rgb(53, 156, 53)">
                    <th colspan="2"><center>&nbsp;ANTECEDENTES PERSONALES</center></th>
                </tr>
                <tr>
                    <td colspan="2" height="150px">&nbsp;{{$intervencion->antecedentes_personales}}</td>
                </tr>
                <tr style="background-color:rgb(53, 156, 53)">
                    <th colspan="2"><center>&nbsp;ANTECEDENTES FAMILIARES</center></th>
                </tr>
                <tr>
                    <td colspan="2" height="150px">&nbsp;{{$intervencion->antecedentes_familiares}}</td>
                </tr>
            </table>
        </div>
    </div>
  </div>
    <div style="page-break-after:always;"></div>
  <div class="general">
      <div align="middle">
          <table cellspacing="0" cellpadding="2" border="2" style="width:97.5%">
              <tr align="middle">
                  <td rowspan="3">
                      <center> <img width="80" height="60" src="{{ url('/images/logoU.png')}}" /></center>
                  </td>
                  <td rowspan="2"><center>UNIVERSIDAD POPULAR DEL CESAR</center></td>
                  <td align="left">&nbsp;CODIGO: 120 102 124 234</td>
              </tr>
              <tr align="middle">
                  <td align="left">&nbsp;VERSIÓN: 2</td>
              </tr>
              <tr align="middle">
                  <td><center>FORMATO ORIENTACIÓN PSICOLOGICA</center></td>
                  <td align="left">&nbsp;PAG: 2 de 3</td>
              </tr>
          </table>

          <br /><br />
      </div>
      <div align="left">
          <div>
              <table cellspacing="0" cellpadding="2" border="1" style="width:97.5%;">
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th style="padding-bottom: 12px" colspan="2">
                          <center>IMPRESIÓN DIAGNOSTICA</center>
                      </th>
                  </tr>
                  <tr style="border-color: black;">
                      <td style="padding-left: 30px;">
                          <ul>
                              @foreach($intervencion->impresiones as $impresion)
                              <li>{{$impresion->descripcion}}</li>
                              @endforeach
                          </ul>
                      </td>
                  </tr>
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th style="padding-bottom: 12px" colspan="2"><center>PLAN DE ACCIÓN</center></th>
                  </tr>
                  <tr>
                      <td colspan="2" height="150px">&nbsp;{{$intervencion->plan_de_accion}}</td>
                  </tr>
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th
                              style="padding-bottom: 12px"
                              style="height: 30px"
                              align="left"
                              colspan="2"
                      >
                          &nbsp;SEGUIMIENTO PRIMERA CITA
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          FECHA:
                      </th>
                  </tr>
                  <tr>
                      <td colspan="2" height="150px">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" colspan="2">&nbsp;FIRMA DEL ESTUDIANTE:</td>
                  </tr>
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th
                              style="padding-bottom: 12px"
                              style="height: 30px"
                              align="left"
                              colspan="2"
                      >
                          &nbsp;SEGUIMIENTO SEGUNDA CITA
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          FECHA:
                      </th>
                  </tr>
                  <tr>
                      <td colspan="2" height="150px">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" colspan="2">&nbsp;FIRMA DEL ESTUDIANTE:</td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
  <div style="page-break-after:always;"></div>
  <div class="general">
      <div align="middle">
          <table cellspacing="0" cellpadding="2" border="2" style="width:97.5%">
              <tr align="middle">
                  <td rowspan="3">
                      <center> <img width="80" height="60" src="{{ url('/images/logoU.png')}}" /></center>
                  </td>
                  <td rowspan="2"><center>UNIVERSIDAD POPULAR DEL CESAR</center></td>
                  <td align="left">&nbsp;CODIGO: 120 102 124 234</td>
              </tr>
              <tr align="middle">
                  <td align="left">&nbsp;VERSIÓN: 2</td>
              </tr>
              <tr align="middle">
                  <td><center>FORMATO ORIENTACIÓN PSICOLOGICA</center></td>
                  <td align="left">&nbsp;PAG: 3 de 3</td>
              </tr>
          </table>

          <br /><br>
      </div>
      <div align="left">
          <div>
              <table cellspacing="0" cellpadding="2" border="1" style="width:97.5%">
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th style="padding-bottom: 12px" style="height: 30px" align="left" colspan="2">&nbsp;SEGUIMIENTO TERCERA CITA
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          FECHA:
                      </th>
                  <tr>
                      <td colspan="2" height="150px">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" colspan="2">&nbsp;FIRMA DEL ESTUDIANTE:</td>
                  </tr>
                  <tr style="background-color:rgb(53, 156, 53)">
                      <th style="padding-bottom: 12px" style="height: 30px" align="left" colspan="2">&nbsp;CONCLUSIONES:</th>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" colspan="2">&nbsp;SE REMITE ATENCIÓN PSICOLOGICA IPS
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          SI_____ NO______</td>
                  </tr>
              </table><br>
              <br>
              <br>
              <table>
                  <tr>
                      <td>&nbsp;Nombres y Apellidos Profesional de Orientación:&nbsp;_________________________________________________________</td>
                  </tr>
                  <tr>
                      <td>T.P.&nbsp;________________________</td>
                  </tr>
              </table>
              <br>
              <br>
              <table>
                  <tr>
                      <td>Firma:&nbsp;____________________________________</td>
                  </tr>
              </table>
              <br><br>
              <table>
                  <tr>
                      <td>&nbsp;Nombres y Apellidos estudiante que recibe acompañamiento:&nbsp;________________________________________________</td>
                  </tr>
                  <tr>
                      <td>C.C&nbsp;________________________</td>
                  </tr>
              </table>
              <br><br>
              <table>
                  <tr>
                      <td>Firma:&nbsp;____________________________________</td>
                  </tr>
              </table>
          </div>
      </div>
  </div>
</body>
</html>

