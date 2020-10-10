<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>CodePen - Vuetify Responsive Datatable</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css" />

    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse" style="background:#337ab7; text-decoration-color: white;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <p class="navbar-brand" style="color:white">Cliente jsonplaceholder</p>
                </div>
            </div>
        </nav>


        <div class="row">
            <div class="col-xs-12" id="container-table">
                <table class="table table-bordered table-hover dt-responsive">
                </table>
            </div>
        </div>


        <!-- Post Modal -->
        <div class="modal fade" id="posts_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="post_title_modal">Datos del Post</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_post_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="post_title">Titulo*</label>
                                    <div class="col-md-6">
                                        <input id="post_title" name="post_title" type="text" placeholder="" class="form-control input-md" require>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="post_body">Contenido*</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="post_body" name="post_body" require></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newPost" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Album Modal -->
        <div class="modal fade" id="albums_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Datos del Album</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_album_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="album_title">Titulo*</label>
                                    <div class="col-md-6">
                                        <input id="album_title" name="album_title" type="text" placeholder="" class="form-control input-md" required>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newModal" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comment Modal  -->
        <div class="modal fade" id="comments_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Datos del Comentario</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_comment_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="comment_name">Nombre</label>
                                    <div class="col-md-6">
                                        <input id="comment_name" name="comment_name" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="comment_email">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="email" id="comment_email" name="comment_email" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="comment_body">Contenido</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="comment_body" name="comment_body"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newComment" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Photo Modal -->
        <div class="modal fade" id="photos_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Datos de la foto</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_photo_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="photo_title">Titulo*</label>
                                    <div class="col-md-6">
                                        <input id="photo_title" name="photo_title" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="photo_url">Url*</label>
                                    <div class="col-md-6">
                                        <input type="text" id="photo_url" name="photo_url" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="photo_thumbnail">Thumbnail Url*</label>
                                    <div class="col-md-6">
                                        <input type="text" id="photo_thumbnail" name="photo_thumbnail" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newPhoto" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Todo Modal  -->
        <div class="modal fade" id="todos_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Estado del titulo</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_todo_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="todo_title">Titulo*</label>
                                    <div class="col-md-6">
                                        <input id="todo_title" name="todo_title" type="text" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="radios">Completado</label>
                                    <div class="col-md-4">
                                        <div class="radio">
                                            <label for="radios-0">
                                    <input type="radio" name="radios" id="radios-0" value="true" checked="">
                                    Si
                                  </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radios-1">
                                    <input type="radio" name="radios" id="radios-1" value="false" checked="">
                                    No
                                  </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newTodo" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Modal -->
        <div class="modal fade" id="users_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Datos de Usuario</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_user_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="row">
                                    <div class="container col-md-12">
                                        <h6 class="title-address">Datos Personales</h6>
                                        <hr class="title-separator">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_name">Nombre*</label>
                                            <div class="col-md-9">
                                                <input id="user_name" name="user_name" type="text" placeholder="" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_email">Email*</label>
                                            <div class="col-md-9">
                                                <input id="user_email" name="user_email" type="text" placeholder="" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_web">Website*</label>
                                            <div class="col-md-9">
                                                <input id="user_web" name="user_web" type="text" placeholder="" class="form-control input-md" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_user">Usuario*</label>
                                            <div class="col-md-9">
                                                <input id="user_user" name="user_user" type="text" placeholder="" class="form-control input-md" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_phone">Telefono*</label>
                                            <div class="col-md-9">
                                                <input id="user_phone" name="user_phone" type="text" placeholder="" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container col-md-12">
                                        <h6 class="title-address">Direccion</h6>
                                        <hr class="title-separator">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_address">Direccion</label>
                                            <div class="col-md-9">
                                                <input id="user_address" name="user_address" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_city">Ciudad</label>
                                            <div class="col-md-9">
                                                <input id="user_city" name="user_city" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_lat">Latitud</label>
                                            <div class="col-md-9">
                                                <input id="user_lat" name="user_lat" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_apartment">Piso</label>
                                            <div class="col-md-9">
                                                <input id="user_apartment" name="user_apartment" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_zipcode">Zipcode</label>
                                            <div class="col-md-9">
                                                <input id="user_zipcode" name="user_zipcode" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_long">Longitud</label>
                                            <div class="col-md-9">
                                                <input id="user_long" name="user_long" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container col-md-12">
                                        <h6 class="title-address">Compañia</h6>
                                        <hr class="title-separator">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_company">Nombre</label>
                                            <div class="col-md-9">
                                                <input id="user_company" name="user_company" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_slogan">Slogan</label>
                                            <div class="col-md-9">
                                                <input id="user_slogan" name="user_slogan" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user_bs">Servicios</label>
                                            <div class="col-md-9">
                                                <input id="user_bs" name="user_bs" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="newUser" type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Se eliminara el siguiente registro</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <form class="form-horizontal" id="form_delete_modal">
                            <input name="registerId" type="hidden">
                            <input name="registerSecondId" type="hidden">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-10" for="delete_title" name="deleteTitle"></label>
                                    <!-- <div class="col-md-6">
                                        <input id="todo_title" name="todo_title" type="text" placeholder="" class="form-control input-md" required="">
                                    </div> -->
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button id="delete_modal" type="submit" class="btn .btn-danger">Eliminar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Alerts-->
        <div class="alert alert-success alert-dismissible" style='display:none;'>
            <button data-dismiss="alert" type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>

    <script>
        var category = 'users';
        var baseUrl = 'https://testplaceholder.herokuapp.com/';
        var columns = [];
        var table = null;
        var row = null;

        function capitalize(s) {
            if (typeof s !== 'string') return ''
            return s.charAt(0).toUpperCase() + s.slice(1)
        }

        async function getDataByCategory(category) {
            if (category === "") category = 'users';
            var data = null;
            await fetch(baseUrl + category)
                .then((response) =>
                    response.json()
                )
                .then((json) => {
                    data = json;
                })
            return data;
        }

        function getColumnNames(obj, category) {
            var columns = [];
            var columnNames = Object.keys(obj[0]);
            var iterator = 0;
            var visible = true;
            columnNames.forEach((column) => {
                iterator = iterator + 1;
                if (iterator < 4) {
                    columns.push({
                        data: column,
                        title: capitalize(column)
                    });
                }
            });
            visible = (category == 'users' || category == 'posts' || category == 'albums') ? true : false;
            if (visible)
                columns.push({
                    data: "opciones",
                    title: "Opciones"
                })
            columns.push({
                data: "acciones",
                title: "Acciones"
            })

            return columns;
        }

        function renderOptionsByCategory(category) {
            var btnOptions = {};
            switch (category) {
                case 'users':
                    btnOptions = {
                        "targets": -2,
                        "data": null,
                        "defaultContent": '<button id="fotos" class="btn btn-options btn-default btn-xs" type="button" onclick="getNestedData(event, \'users\', \'posts\')">Post</button>' +
                            '<button id="comentarios" class="btn btn-options btn-default btn-xs"  type="button" onclick="getNestedData(event, \'users\', \'albums\')">Albumes</button>' +
                            '<button id="posts" class="btn btn-options btn-default btn-xs"  type="button" onclick="getNestedData(event, \'users\', \'todos\')">Tareas</button>'
                    }
                    break;
                case 'posts':
                    btnOptions = {
                        "targets": -2,
                        "data": null,
                        "defaultContent": '<button id="fotos" class="btn btn-options btn-default btn-xs" type="button" onclick="getNestedData(event, \'posts\', \'comments\')">Comentarios</button>'
                    }
                    break;
                case 'albums':
                    btnOptions = {
                        "targets": -2,
                        "data": null,
                        "defaultContent": '<button id="fotos" class="btn btn-options btn-default btn-xs" type="button" onclick="getNestedData(event, \'albums\', \'photos\')">Fotos</button>'
                    }
                    break;
                default:
                    btnOptions = {
                        "targets": -2,
                        "data": null,
                        "defaultContent": ''
                    }
                    break;

            }
            return btnOptions;
        }

        async function getNestedData(event, type, nested) {
            var optionBtn = $(event.target);
            var category = nested;
            var row = optionBtn.closest('tr');
            var column = type == 'users' ? 0 : 1;
            var id = row.find("td").eq(column).html();
            var data = null;

            $("#" + category + "_modal input[name='registerId']").val(id);

            await fetch(baseUrl + type + '/' + id + '/' + nested)
                .then((response) =>
                    response.json()
                )
                .then((json) => {
                    data = json;
                })
            console.log(data);
            var columns = getColumnNames(data, category);
            createTable(data, columns, category);
            appendControls(category, true);
           
        }

        function createTable(data, columns, category) {

            var btnOptions = {};
            var visible = true;
            $('#container-table').empty();

            $("<table/>", {
                class: "table table-bordered table-hover dt-responsive"
            }).appendTo("#container-table");

            btnOptions = renderOptionsByCategory(category);

            var btnActions = {
                "targets": -1,
                "data": null,
                "defaultContent": '<button id="editar" class="btn btn-primary btn-xs glyphicon glyphicon-pencil" data-target="#todos_modal" data-toggle="modal" style="margin-right: 10px;" type="button" onclick="editRegisterAction(event)"></button>' +
                    '<button id="borrar" class="btn btn-danger btn-xs glyphicon glyphicon-trash" data-target="#todos_modal" data-toggle="modal" type="button" onclick="deleteRegisterAction(event)" ></button>'
            }

            btnOptions.visible = (category == 'users' || category == 'posts' || category == 'albums') ? true : false;



            table = $('table').DataTable({
                data: data,
                columns: columns,
                "columnDefs": [btnOptions, btnActions],
                "oLanguage": {
                    "sInfo": "De un total de _TOTAL_ registros se muestran (_START_ a _END_)",
                    "sSearch": "Filtrar:",
                    "sLengthMenu": "Mostrar _MENU_ "
                }
            });
        }

        async function initTable(category) {
            var data = await getDataByCategory(category);
            var columns = getColumnNames(data, category);

            createTable(data, columns, category);
            appendControls(category);
        }

        function appendControls(category, visible = false) {

            $('div[id$="_length"]').append(
                '<label style="margin-left: 20px; margin-right: 5px;">Categoria</label>' +
                '<select id="categoria" class="form-control input-sm" onchange="populateTable()" >' +
                '<option value="users">Usuarios</option>' +
                '<option value="comments">Comentarios</option>' +
                '<option value="albums">Albumes</option>' +
                '<option value="photos">Fotos</option>' +
                '<option value="posts">Posts</option>' +
                '<option value="todos">Todos</option>' +
                '</select> ');

            $("#categoria").val(category);

            if (category == 'users' || visible == true)    
                $('div[id$="_length"]').append(
                    '<button id="adicionar" type="button" class="btn btn-success btn-sm glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal" style="width:4rem; margin-left: 20px" onclick="createRegisterAction()"></button>');

            $("#adicionar").attr('data-target', '#' + category + '_modal');            

        }

        async function populateTable() {
            var category = document.getElementById("categoria").value;
            initTable(category);
        }

        async function getRegisterById(id, category) {

            if (category === "") category = 'users';
            var data = null;
            await fetch(baseUrl + category + '/' + id)
                .then((response) =>
                    response.json()
                )
                .then((json) => {
                    data = json;
                })
            return data;
        }

        async function editRegister(id, category, data) {            
            if (category === "") return;
            await fetch(baseUrl + category + '/' + id, {
                    method: 'PUT',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8',
                    },
                })
                .then((response) =>
                    response.json()
                )
                .then((json) => {
                    data = json;
                })
            return data;                       
        }

        async function craeteRegister(category, data) 
        {
            if (category === "") return;
            await fetch(baseUrl + category, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8',
                    },
                })
                .then((response) =>
                    response.json()
                )
                .then((json) => {
                    data = json;
                })
            return data;
        }

        function createRegisterAction() 
        {
            var category = $("#categoria").val();
            openModalClean(category);
            $('#' + category + '_modal input[name="registerSecondId"]').val("-1");
        }

        function editRegisterAction(event) {
            var editBtn = $(event.target);
            row = editBtn.closest('tr');
            var id = row.find("td").eq(0).html();
            var category = $("#categoria").val();
            editBtn.attr('data-target', '#' + category + '_modal');
            $('#' + category + '_modal input[name="registerId"]').val(id);

            if (category != 'users') {
                var secondId = row.find("td").eq(1).html();
                $('#' + category + '_modal input[name="registerSecondId"]').val(secondId);
            }

            openModalWithData(id, category);
        }

        function deleteRegisterAction(event) {
            var deleteBtn = $(event.target);
            row = deleteBtn.closest('tr');
            var id = row.find("td").eq(0).html();
            var name = row.find("td").eq(2).html();
            var category = $("#categoria").val();
            deleteBtn.attr('data-target', '#delete_modal');
            $('#delete_modal input[name="registerSecondId"]').val(id);
            $('#delete_modal label[name="deleteTitle"]').text(name);

            if (category != 'users') {
                var secondId = row.find("td").eq(1).html();
                $('#delete_modal input[name="registerSecondId"]').val(secondId);
            }

        }

        async function openModalClean(category) {
            
            var id = -1;
            var category = $("#categoria").val();            
            var data = {}
            switch (category) {
                case 'users':
                    data = {"name": "","username": "","email": "","address": {"street": "","suite": "","city": "","zipcode": "","geo": {"lat": "","lng": ""}},"phone": "","website": "","company": {"name": "","catchPhrase": "","bs": ""}};
                    loadDataUserModal(id, data)
                    break;
                case 'posts':
                    data = {"userId": "","title": "","body": ""};
                    loadDataPostModal(id, data)                    
                    break;
                case 'comments':
                    data = {"name": "","email": "","body": ""};
                    loadDataCommentModal(id, data)
                    break;
                case 'photos':
                    data = {"title": "","url": "","thumbnailUrl": ""};
                    loadDataPhotoModal(id, data)
                    break;
                case 'todos':
                    data = {"title": "", "completed": false};
                    loadDataTodoModal(id, data)
                    break;
                case 'albums':
                    data = {"title": ""};
                    loadDataAlbumModal(id, data)
                    break;
            }
        }

        async function openModalWithData(id, category) {
            var data = await getRegisterById(id, category);
            switch (category) {
                case 'users':
                    loadDataUserModal(id, data)
                    break;
                case 'posts':
                    loadDataPostModal(id, data)
                    break;
                case 'comments':
                    loadDataCommentModal(id, data)
                    break;
                case 'photos':
                    loadDataPhotoModal(id, data)
                    break;
                case 'todos':
                    loadDataTodoModal(id, data)
                    break;
                case 'albums':
                    loadDataAlbumModal(id, data)
                    break;
            }
        }

        function loadDataUserModal(id, data) {
            // put data on modal 
            $("#user_name").val(data.name);
            $("#user_user").val(data.username);
            $("#user_email").val(data.email);
            $("#user_phone").val(data.phone);
            $("#user_web").val(data.website);

            $("#user_address").val(data.address.street);
            $("#user_city").val(data.address.city);
            $("#user_lat").val(data.address.geo.lat);
            $("#user_apartment").val(data.address.suite);
            $("#user_zipcode").val(data.address.zipcode);
            $("#user_long").val(data.address.geo.lng);

            $("#user_company").val(data.company.name);
            $("#user_slogan").val(data.company.catchPhrase);
            $("#user_bs").val(data.company.bs);
        }

        function loadDataPostModal(id, data) {
            // put data on modal 
            $("#post_title").val(data.title);
            $("#post_body").val(data.body);
        }

        function loadDataCommentModal(id, data) {
            // put data on modal 
            $("#comment_name").val(data.name);
            $("#comment_email").val(data.email);
            $("#comment_body").val(data.body);
        }

        function loadDataPhotoModal(id, data) {
            // put data on modal 
            $("#photo_title").val(data.title);
            $("#photo_url").val(data.url);
            $("#photo_thumbnail").val(data.thumbnailUrl);
        }

        function loadDataTodoModal(id, data) {
            // put data on modal 
            $("#todo_title").val(data.title);
            if (data.completed)
                $("#radios-0").attr('checked', 'checked');
            $("#radios-1").attr('checked', 'checked');
        }

        function loadDataAlbumModal(id, data) {
            // put data on modal 
            $("#album_title").val(data.title);
        }

        async function submitUserForm(action = 'create') {   

            event.preventDefault();
            var data = {
                address: {
                    geo: {}
                },
                company: {}
            };
            var id = $("#users_modal input[name='registerId']").val();
            

            data.name = $("#user_name").val();
            data.username = $("#user_user").val();
            data.email = $("#user_email").val();
            data.phone = $("#user_phone").val();
            data.website = $("#user_web").val();

            data.address.city = $("#user_city").val();
            data.address.geo.lat = $("#user_lat").val();
            data.address.suite = $("#user_apartment").val();
            data.address.zipcode = $("#user_zipcode").val();
            data.address.geo.lng = $("#user_long").val();

            data.company.name = $("#user_company").val();
            data.company.catchPhrase = $("#user_slogan").val();
            data.company.bs = $("#user_bs").val();

            var category = $("#categoria").val();

            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#users_modal .close").click();
                $(".alert").text("Usuario creado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.id);
                var id = row.find("td").eq(1).html(response.name);
                var id = row.find("td").eq(2).html(response.username);
                $("#users_modal .close").click();
                $(".alert").text("Usuario editado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            }

                        
        }

        async function submitPostForm(action = 'create') {    

            event.preventDefault();
            var data = {};
            var userId = $("#posts_modal input[name='registerId']").val();
            var id = $("#posts_modal input[name='registerSecondId']").val();
            
            data.userId = userId;

            data.title = $("#post_title").val();
            data.body = $("#post_body").val();

            var category = $("#categoria").val();
            
            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#posts_modal .close").click();
                $(".alert").text("Post creado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.userId);
                var id = row.find("td").eq(1).html(response.id);
                var id = row.find("td").eq(2).html(response.title);
                $("#posts_modal .close").click();
                $(".alert").text("Post editado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            }
        }

        async function submitCommentForm(action = 'create') {  

            event.preventDefault();
            var data = {};
            var postId = $("#comments_modal input[name='registerId']").val();
            var id = $("#comments_modal input[name='registerSecondId']").val();
            
            data.postId = postId;

            data.name = $("#comment_name").val();
            data.email = $("#comment_email").val();
            data.body = $("#comment_body").val();

            var category = $("#categoria").val();
            
            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#comments_modal .close").click();
                $(".alert").text("Comentario creado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
                
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.postId);
                var id = row.find("td").eq(1).html(response.id);
                var id = row.find("td").eq(2).html(response.name);

                $("#comments_modal .close").click();
                $(".alert").text("Comentario editado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");   
            }

                     
        }

        async function submitPhotoForm(action = 'create') {
            
            event.preventDefault();
            var data = {};
            var albumId = $("#photos_modal input[name='registerId']").val();
            var id = $("#photos_modal input[name='registerSecondId']").val();
            
            data.albumId = albumId;

            data.title = $("#photo_title").val();
            data.email = $("#photo_url").val();
            data.thumbnailUrl = $("#photo_thumbnail").val();

            var category = $("#categoria").val();

            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#photos_modal .close").click();
                $(".alert").text("Foto creada exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.albumId);
                var id = row.find("td").eq(1).html(response.id);
                var id = row.find("td").eq(2).html(response.title);

                $("#photos_modal .close").click();
                $(".alert").text("Foto editada exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            }                        
        }

        async function submitTodoForm(action = 'create') {
            
            event.preventDefault();
            var data = {};
            var userId = $("#todos_modal input[name='registerId']").val();
            var id = $("#todos_modal input[name='registerSecondId']").val();
            
            data.userId = userId;

            data.title = $("#todo_title").val();
            data.completed = $("input[name='radios']:checked").val();

            var category = $("#categoria").val();

            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#todos_modal .close").click();
                $(".alert").text("Tarea creada exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.userId);
                var id = row.find("td").eq(1).html(response.id);
                var id = row.find("td").eq(2).html(response.title);
                $("#todos_modal .close").click();
                $(".alert").text("Tarea editada exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            }                        
        }

        async function submitAlbumForm(action = 'create') {
            
            event.preventDefault();
            var data = {};
            var response = null;
            var userId = $("#albums_modal input[name='registerId']").val();
            var id = $("#albums_modal input[name='registerSecondId']").val();
            
            data.userId = userId;

            data.title = $("#album_title").val();

            var category = $("#categoria").val();
            
            if (action == 'create') {
                response = await craeteRegister(category, data);
                createRowByCategory(category, response);
                $("#albums_modal .close").click();
                $(".alert").text("Album creado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            } else if(action == 'edit'){
                data.id = id;
                response = await editRegister(id, category, data);
                var id = row.find("td").eq(0).html(response.userId);
                var id = row.find("td").eq(1).html(response.id);
                var id = row.find("td").eq(2).html(response.title);

                $("#albums_modal .close").click();
                $(".alert").text("Album editado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            }            
        }

        async function deleteRegister() {
            $("#delete_modal").submit(async function(event) {
                event.preventDefault();
                var id = $("#delete_modal input[name='registerSecondId']").val();
                var category = $("#categoria").val();
                if (category === "") return;

                await fetch(baseUrl + category + '/' + id, {
                        method: 'DELETE',
                    })
                    .then((response) => { 
                        response.json()
                    })
                    .then((data) => { 
                        console.log(data) 
                    });
                                
                row.remove();

                $("#delete_modal .close").click();
                $(".alert").text("Registro eliminado exitosamente.");
                $(".alert").show().delay(2000).slideUp("slow");
            });
        }

        function createRowByCategory(category, response) 
        {            
                var dataRow = {};                
                switch(category) 
                {
                    case 'users'   :      
                        dataRow = {"id": response.id, "name": response.name, "username": response.username};  
                        break;
                    case 'posts'   :    
                        dataRow = {"userId": response.userId,"id": response.id, "title": response.title};  
                        break;
                    case 'albums'  :     
                        dataRow = {"userId": response.userId,"id": response.id, "title": response.title};
                        break;
                    case 'todos'   :      
                        dataRow = {"userId": response.userId,"id": response.id, "title": response.title};
                        break;            
                    case 'photos'  :    
                        dataRow = {"albumId": response.albumId,"id": response.id, "title": response.title};
                        break;
                    case 'comments':  
                        dataRow = {"postId": response.postId,"id": response.id, "name": response.name};
                        break;                    
                }
                if (table) {
                    table.row.add(dataRow).draw();
                    var lastRow = table.data().length-1;
                    var idx = table.row(lastRow).index();
                    
                    table.cell( idx, 3 ).data( '<button class="btn btn-options btn-default btn-xs"  type="button" disabled>No disponible</button>' ).draw();
                    if (category == 'users') 
                        table.order([ 0, 'desc' ]).draw();
                    else 
                        table.order([ 1, 'desc' ]).draw();
                }                
        }


        $(document).ready(function() {

            initTable('users');
            deleteRegister();

            $("#form_post_modal").validate({
                rules: {
                    post_title: {
                        required: true,
                        minlength: 3
                    },
                    post_body: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    post_title: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    post_body: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitPostForm('create');
                    else 
                        submitPostForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#form_album_modal").validate({
                rules: {
                    album_title: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    album_title: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitAlbumForm('create');
                    else 
                        submitAlbumForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#form_comment_modal").validate({
                rules: {
                    comment_name: {
                        required: true,
                        minlength: 3
                    },
                    comment_email: {
                        required: true,
                        email: true
                    },
                    comment_body: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    comment_name: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    comment_email: {
                        required: "Este campo es requerido",
                        email: "Ingresa un Email valido"
                    },
                    comment_body: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitCommentForm('create');
                    else 
                        submitCommentForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#form_photo_modal").validate({
                rules: {
                    photo_title: {
                        required: true,
                        minlength: 3
                    },
                    photo_url: {
                        required: true,
                        url: true
                    },
                    photo_thumbnail: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    photo_title: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    photo_url: {
                        required: "Este campo es requerido",
                        url: "Ingrese una url valida"
                    },
                    photo_thumbnail: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitPhotoForm('create');
                    else 
                        submitPhotoForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#form_todo_modal").validate({
                rules: {
                    todo_title: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    todo_title: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitTodoForm('create');
                    else 
                        submitTodoForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#form_user_modal").validate({
                rules: {
                    user_name: {
                        required: true,
                        minlength: 3
                    },
                    user_email: {
                        required: true,
                        email: true
                    },
                    user_user: {
                        required: true,
                        minlength: 3
                    },
                    user_phone: {
                        required: true,
                        minlength: 3
                    },
                    user_address: {
                        minlength: 3
                    },
                    user_web: {
                        required: true,
                        minlength: 3
                    },
                    user_city: {
                        minlength: 3
                    },
                    user_lat: {
                        number: true,
                        minlength: 3
                    },
                    user_apartment: {
                        minlength: 3
                    },
                    user_zipcode: {
                        minlength: 5
                    },
                    user_long: {
                        number: true,
                        minlength: 3
                    },
                    user_company: {
                        minlength: 3
                    },
                    user_slogan: {
                        minlength: 3
                    }

                },
                messages: {
                    user_name: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_email: {
                        required: "Este campo es requerido",
                        email: "Ingresa un Email valido"
                    },
                    user_user: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_phone: {
                        required: "Este campo es requerido",
                        number: "Ingrese un numero valido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_address: {
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_web: {
                        required: "Este campo es requerido",
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_city: {
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_lat: {
                        number: "Ingrese un numero valido",
                        minlength: "Debe tener al menos 3 numeros"
                    },
                    user_apartment: {
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_zipcode: {
                        number: "Ingrese un codigo postal valido",
                        maxlength: "Debe tener 5 numeros",
                        minlength: "Debe tener 5 numeros"
                    },
                    user_long: {
                        number: "Ingrese un numero valido",
                        minlength: "Debe tener al menos 3 numeros"
                    },
                    user_company: {
                        minlength: "Debe tener al menos 3 letras"
                    },
                    user_slogan: {
                        minlength: "Debe tener al menos 3 letras"
                    }
                },
                submitHandler: function(form) {
                    var category = $("#categoria").val();            
                    var action = $('#' + category + '_modal input[name="registerSecondId"]').val();
                    if (action == -1) 
                        submitUserForm('create');
                    else 
                        submitUserForm('edit');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

        });
    </script>
</body>

</html>