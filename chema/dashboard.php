<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Chema</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- datatables -->
    <link rel="stylesheet" type="text/css"
        href="../assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="../assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
</head>

<body class="skin-megna fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Chema</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">Chema</span></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">

                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/users/1.jpg" alt="user" class=""> <span
                                    class="hidden-md-down">Mark &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My
                                    Profile</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My
                                    Balance</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account
                                    Setting</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->



















        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="nav-small-cap">--- PROFESSIONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-calendar"></i><span
                                    class="hide-menu">Appointment</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="doctor-schedule.html">Doctor Schedule</a></li>
                                <li><a href="book-appointment.html">Book Appointment</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-user-md"></i><span
                                    class="hide-menu">Doctors</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="doctors.html">All Doctors</a></li>
                                <li><a href="add-doctor.html">Add Doctor</a></li>
                                <li><a href="edit-doctor.html">Edit Doctor</a></li>
                                <li><a href="doctor-profile.html">Doctor Profile</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive m-t-40">
                                                    <table id="datatable1"
                                                        class="display nowrap table table-hover table-striped table-bordered"
                                                        cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Rol</th>
                                                                <th>Puntaje</th>
                                                                <th>Nombre</th>
                                                                <th>Estado</th>
                                                                <th>Telefono</th>
                                                                <th>Correo</th>
                                                                <th>Dirección</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- /row modal cambiar password-->
                <div class="row">
                    <div id="cambiarpassword" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Cambiar Contraseña</h3>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                </div>
                                <form id="frmDatospassword" method="POST">
                                    <div class="modal-body">

                                        <div id="contenedor">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 mt-12">
                                                    <h4>Nueva Contraseña:</h4>
                                                    <input required type="password" class="form-control"
                                                        name="passchange1" id="passchange1" placeholder="Contraseña">
                                                </div>

                                                <div class="col-md-12 col-sm-12 mt-12">
                                                    <h4>Confirmar Contraseña:</h4>
                                                    <input class="form-control" required type="password"
                                                        name="passchange2" id="passchange2"
                                                        placeholder="Repita contraseña">
                                                </div>
                                            </div>

                                            <div>
                                                <input type="hidden" name="iduserchangepassword"
                                                    id="iduserchangepassword">
                                                <input type="hidden" name="accion" value="cambiarpassword">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect btncerrar"
                                                    id="btncerrar" data-dismiss="modal">Cancelar</button>
                                                <button id="btnchangepass"
                                                    class="btn btn-info waves-effect waves-light">Confirmar</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /fin row modal -->


                <!-- MODAL  EDITAR-->
                <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <form class=" form-horizontal" id="fmredit" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Rol</label>
                                        <select class="form-control" name="rolup" id="rolup">
                                            <option value="Usuario">Usuario</option>
                                            <option value="Barbero">Barbero</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estadoup" id="estadoup">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" placeholder="Nombre" id="nombreup"
                                            name="nombreup" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" type="text" placeholder="Telefono" id="telefonoup"
                                            name="telefonoup" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input class="form-control" type="text" placeholder="Dirección" id="direccion"
                                            name="direccion" required>
                                    </div>

                                    <div class="form-group" id="contenedordescripcionbarbero">
                                        <label>Descripción barbero</label>
                                        <textarea class="form-control" name="descripcionbarbero" id="descripcionbarbero"
                                            cols="20" rows="10"></textarea>
                                    </div>

                                    <div>
                                        <input type="hidden" id="idusuario" name="idusuario">
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger waves-effect"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="btnsubmitup"
                                            class="btn btn-info waves-effect waves-light">Guardar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>





                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2021 Chema
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>

    <!-- This is data table -->
    <script src="../assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        list();
        saveUpPassword();
        saveUp();
        changeRol();
    });

    var idiomatable = {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: ">>",
            sPrevious: "<<",
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente",
        },
    };

    var list = function() {
        var table = $("#datatable1").DataTable({
            destroy: true,
            scrollX: true,
            dom: "Blfrtip",
            buttons: ["excel", "pdf"],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"],
            ],
            ajax: {
                method: "POST",
                url: "ctr_dashboard.php",
                data: {
                    accion: "listarusuarios"
                },
            },
            columns: [{
                    data: "usu_rol"
                },
                {
                    data: "usu_barberoPuntaje"
                },
                {
                    data: "usu_nombre"
                },
                {
                    data: "estado"
                },
                {
                    data: "usu_telefono"
                },
                {
                    data: "usu_correo"
                },
                {
                    data: "usu_direccion"
                },

                {
                    defaultContent: "<button type='button' class='btn btn-info btn-circle editar' data-toggle='modal' data-target='#modaleditar' data-toggle='tooltip' data-placement='top'><i class='icons-Pencil'></i></button>&nbsp;<button type='button' class='btn btn-warning btn-circle clave' data-toggle='modal' data-target='#cambiarpassword'><i class='icon-key'></i></button>",
                },
            ],
            language: idiomatable,
        });
        $(
            ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");
        dataedit("#datatable1 tbody", table);
        datachangepass("#datatable1 tbody", table);
    };
    //-----------------------------CHANGE PASSWORD
    var datachangepass = function(body, table) {
        $(body).on("click", "button.clave", function() {
            var data = table.row($(this).parents("tr")).data();
            console.log(data);
            $("#iduserchangepassword").val(data.usu_id);
        });
    };
    var saveUpPassword = () => {
        $("#frmDatospassword").on("submit", function(e) {
            e.preventDefault();
            // console.log( $( this ).serialize() );
            var datos = new FormData($("#frmDatospassword")[0]);
            console.log("click");
            if (datos.get("passchange1") == datos.get("passchange2")) {
                $.ajax({
                    method: "POST",
                    url: "ctr_dashboard.php",
                    data: datos,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(resp) {
                        var resp = JSON.parse(resp);
                        if (resp.respuesta == "BIEN") {
                            alert("Las contraseña se modifico correctamente");
                            $("#cambiarpassword").modal("hide");
                        } else {
                            alert("Verifique su conexión a internet e intente de nuevo");
                        }
                    },
                });
            } else {
                alert("Las contraseñas no coinciden");
            }
        });
    };

    //-----------------------------EDIT
    var dataedit = function(body, table) {
        $(body).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            console.log(data);
            $("#rolup").val(data.usu_rol);
            $("#estadoup").val(data.usu_estado);
            $("#nombreup").val(data.usu_nombre);
            $("#telefonoup").val(data.usu_telefono);
            $("#direccion").val(data.usu_direccion);

            if (data.usu_rol == "Barbero") {
                $("#descripcionbarbero").val(data.usu_barberoDescripcion);
                $("#contenedordescripcionbarbero").css("display", "block");
            } else {
                $("#contenedordescripcionbarbero").css("display", "none");
                $("#descripcionbarbero").val("");
            }
            $("#idusuario").val(data.usu_id);
        });
    };

    var saveUp = () => {
        $("#fmredit").on("submit", function(e) {
            e.preventDefault();
            // console.log( $( this ).serialize() );
            var datos = new FormData($("#fmredit")[0]);
            datos.append("accion", "editarUsuario");
            $.ajax({
                method: "POST",
                url: "ctr_dashboard.php",
                data: datos,
                contentType: false,
                processData: false,
                cache: false,
                success: function(resp) {
                    var resp = JSON.parse(resp);
                    console.log(resp);
                    if (resp.respuesta == "BIEN") {
                        alert("Cambio realizado exitosamente");
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        alert("Compruebe su conexión a internet e intente de nuevo");
                    }
                },
            });
        });
    };

    var changeRol = () => {
        $("#rolup").change(() => {
            console.log();
            let rol = $("#rolup").val();
            if (rol == 'Barbero') {
                $("#contenedordescripcionbarbero").css("display", "block");
            } else {
                $("#contenedordescripcionbarbero").css("display", "none");
            }

        });
    }
    </script>
</body>

</html>