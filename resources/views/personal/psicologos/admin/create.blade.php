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
        <div class="header container" >
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>FORMATO DE ORIENTACIÓN PSICOLÓGICA</h2>
            </div>
        </div>

        <div class="body">
            <div id="wizard_horizontal">
                <h2>First Step</h2>
                <section>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas
                        arcu sem, hendrerit a tempor quis, sagittis accumsan tellus. In hac habitasse platea
                        dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus. Nam tellus
                        dolor, tristique ac tempus nec, iaculis quis nisi.
                    </p>
                </section>

                <h2>Second Step</h2>
                <section>
                    <p>
                        Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac
                        ligula elementum pellentesque. In lobortis sollicitudin felis non eleifend. Morbi
                        tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum dictum,
                        nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien
                        a diam adipiscing consectetur. In euismod augue ullamcorper leo dignissim quis elementum
                        arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum leo
                        velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis
                        iaculis nec, malesuada a diam. Donec non pulvinar urna. Aliquam id velit lacus.
                    </p>
                </section>

                <h2>Third Step</h2>
                <section>
                    <p>
                        Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo
                        condimentum dapibus. Fusce eros justo, pellentesque non euismod ac, rutrum sed quam.
                        Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                        Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui
                        commodo lectus sollicitudin in auctor mauris venenatis.
                    </p>
                </section>

                <h2>Forth Step</h2>
                <section>
                    <p>
                        Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula
                        vulputate. Aliquam sed sem tortor. Quisque sed felis ut mauris feugiat iaculis nec
                        ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae.
                        Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo
                        tortor.
                    </p>
                </section>
            </div>
        </div>




    </div>


</div>

@endsection


@section('scripts')

<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.steps-1.1.0/jquery.steps.min.js')}}"></script>

<script>

    $(function () {
    //Horizontal form basic
    $('#wizard_horizontal').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });



});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}

</script>
 

@endsection












