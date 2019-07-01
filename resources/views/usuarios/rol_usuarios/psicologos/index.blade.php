@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
         
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-teal hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">equalizer</i>
                            </div>
                            <div class="content">
                                <div class="text">INTERVENCIONES MES ACTUAL</div>
                                <div class="number">62%</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">group</i>
                            </div>
                            <div class="content">
                                <div class="text">CITAS NO ASISTIDAS MES ACTUAL</div>
                                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">1225</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">assignment_turned_in</i>
                            </div>
                            <div class="content">
                                <div class="text">CITAS DEL DIA</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">account_circle</i>
                            </div>
                            <div class="content">
                                <div class="text">CITAS NO ASISTIDAS</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>CALENDARIO</h2>              
            </div>
            <div class="body">
                    <div id='calendar'></div>


            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script src='{{asset('packages/core/main.js')}}'></script>
<script src='{{asset('packages/core/locales-all.js')}}'></script>
<script src='{{asset('packages/interaction/main.js')}}'></script>
<script src='{{asset('packages/daygrid/main.js')}}'></script>
<script src='{{asset('packages/timegrid/main.js')}}'></script>
<script src='{{asset('packages/list/main.js')}}'></script>
 <script>
document.addEventListener('DOMContentLoaded', function() {
  cargarEventos();
  var initialLocaleCode = 'es';
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    defaultDate: '2019-06-12',
    locale: initialLocaleCode,
    buttonIcons: false, // show the prev/next text
    weekNumbers: true,
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: '{{url('citas/estudiante/citasAgendadas')}}'
  });

  calendar.render();

});

function cargarEventos(){
    var eventos = [];
    axios.get('{{url('citas/estudiante/citasAgendadas')}}')
        .then(response => {
            eventos =  response.data;
        });

    console.log(eventos);
}

</script>

@endsection

@section('styles')

<link href='{{asset('packages/core/main.css')}}'rel='stylesheet' />
<link href='{{asset('packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('packages/list/main.css')}}' rel='stylesheet' />


<style>

        body {
          margin: 0;
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }
      
        #top {
          background: #eee;
          border-bottom: 1px solid #ddd;
          padding: 0 10px;
          line-height: 40px;
          font-size: 12px;
        }
      
        #calendar {
          max-width: 900px;
          margin: 40px auto;
          padding: 0 10px;
        }
      
      </style>

@endsection