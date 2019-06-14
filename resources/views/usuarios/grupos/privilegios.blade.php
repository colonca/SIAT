@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la grupo-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('privilegios')}}" style="color: white;">
                    <i class="material-icons">
                        lock_open
                    </i>Privilegios a Paginas de Grupo
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

    <!--menu de opciones-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header container">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>
                        <i class="material-icons">
                            security
                        </i>
                        Privilegios a Paginas
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <h4>Gestionar las Paginas de un Grupo de Usuario</h4>
                <div class="form-group">
                    <select name="grupo" id="select" class="form-control">
                        <option value="">Seleccione el Grupo o Rol de Usuario</option>
                       @foreach($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="card">
                        <div class="body">
                            <div class="demo-checkbox">
                                <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-light-green" checked disabled>
                                <label for="md_checkbox_21" style="margin-right: 10px;">PAGINAS DEL SISTEMA SELECIONADAS</label>
                                <input type="checkbox" id="basic_checkbox_3" checked="" disabled="">
                                <label for="basic_checkbox_3">PAGINAS DEL SISTEMA SIN SELECIONAR</label>
                            </div>
                        </div>
                    </div>

                    <div class="alert bg-green">
                        <i class="material-icons">
                            import_contacts
                        </i>
                        Paginas del Sistema
                    </div>

                    <table class="table table-striped table-hover" id="table">
                        <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>nombre</th>
                            <th>descripcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginas as $pagina)
                            <tr>
                                <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="{{'checkbox'.$pagina->id}}" name="paginas[]" value="{{$pagina->id}}">
                                    <label for="{{'checkbox'.$pagina->id}}"></label>
                                </span>
                                </td>
                                <td>{{$pagina->nombre}}</td>
                                <td>{{$pagina->descripcion}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <button id="guardar" class="btn btn-success btn-lg pull-right">Guardar los Cambios para el Grupo Selecionado</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Row -->
@endsection

@section('scripts')
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script>
        $('#table').dataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });

        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;
                    this.parentElement.parentElement.parentElement.classList = 'bg-light-green';
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;
                    this.parentElement.parentElement.parentElement.classList = '';
                });
            }
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
                this.parentElement.parentElement.parentElement.classList = '';
            }else{
                this.parentElement.parentElement.parentElement.classList = 'bg-light-green';
            }
        });

        //evento para cargar las paginas asignadas al grupo
        $('#select').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            let id = this.options[this.selectedIndex].value;
            let url = 'privilegios/paginas/'+id;
            axios.get(url).then(response => {
                let data = response.data;

                checkbox.each(function(){
                    this.checked = false;
                    this.parentElement.parentElement.parentElement.classList = '';
                });

                data.forEach(function (x) {
                    checkbox.each(function(){
                        if(this.value == x.id){
                            this.checked = true;
                            this.parentElement.parentElement.parentElement.classList = 'bg-light-green';
                        }
                    });
                });

            });
0        });

        $('#guardar').click(function () {
            let paginas = [];
            $("table tbody input[type=checkbox]:checked").each(function(){
                paginas.push($(this).val());
            });
            console.log(paginas);

            let select = document.getElementById('select');
            let objectSelecionado = select.options[select.selectedIndex].value;

            if(objectSelecionado !=''){
                let url = 'privilegios/paginas';
                axios({
                    method: 'post',
                    url: url,
                    data: {
                        paginas: paginas,
                        id: objectSelecionado
                    }
                }).then(response => {

                    data = response.data;

                    if(data.status == 'ok'){

                        $.notify('Privilegios Guardados Correctamente','success');
                    }

                 });
            }else{
                $.notify('por favor seleciones el grupo');
            }

        });
    </script>
@endsection

