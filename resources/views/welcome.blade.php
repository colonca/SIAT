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
                                <div class="text">BOUNCE RATE</div>
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
                                <div class="text">INT. GRUPALES</div>
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
                                <div class="text">INT. INDIVIDUALES</div>
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
                                <div class="text">ESTUDIANTES A.R.</div>
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
  var initialLocaleCode = 'es';
  var localeSelectorEl = document.getElementById('locale-selector');
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
    events: [
      {
        title: 'All Day Event',
        start: '2019-06-01',
        color: '#257e4a'
      },
      {
        title: 'Long Event',
        start: '2019-06-07',
        end: '2019-06-10',
        color: '#257e4a'
      },
      {
        groupId: 999,
        title: 'Repeating Event',
        start: '2019-06-09T16:00:00',
        color: '#257e4a'
      },
      {
        groupId: 999,
        title: 'Repeating Event',
        start: '2019-06-16T16:00:00',
        color: '#257e4a'
      },
      {
        title: 'Conference',
        start: '2019-06-11',
        end: '2019-06-13',
        color: '#257e4a'
      },
      {
        title: 'Meeting',
        start: '2019-06-12T10:30:00',
        end: '2019-06-12T12:30:00',
        color: '#257e4a'
      },
      {
        title: 'Lunch',
        start: '2019-06-12T12:00:00',
        color: '#257e4a'
      },
      {
        title: 'Meeting',
        start: '2019-06-12T14:30:00',
        color: '#257e4a'
      },
      {
        title: 'Happy Hour',
        start: '2019-06-12T17:30:00',
        color: '#257e4a'
      },
      {
        title: 'Dinner',
        start: '2019-06-12T20:00:00',
        color: '#257e4a'

      },
      {
        title: 'Birthday Party',
        start: '2019-06-13T07:00:00',
        color: '#257e4a'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2019-06-28',
        color: '#257e4a'
      }
    ]
  });

  calendar.render();

  // build the locale selector's options
  calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
    var optionEl = document.createElement('option');
    optionEl.value = localeCode;
    optionEl.selected = localeCode == initialLocaleCode;
    optionEl.innerText = localeCode;
    localeSelectorEl.appendChild(optionEl);
  });

  // when the selected option changes, dynamically change the calendar option
  localeSelectorEl.addEventListener('change', function() {
    if (this.value) {
      calendar.setOption('locale', this.value);
    }
  });

});

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