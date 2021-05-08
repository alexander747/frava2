$(document).ready(function() {
    list();
    save();
    // saveUpPassword();
    // saveUp();
    // changeRol();
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
            url: "controller/ctr_persona.php",
            data: {
                accion: "listarusuarios"
            },
        },
        columns: [{
                data: "per_nombre"
            },
            {
                data: "per_apellidos"
            },
            {
                data: "per_fecha_nacimiento"
            },
            {
                data: "per_sexo"
            },
            {
                data: "per_estatura"
            },
            {
                data: "per_colombiano"
            },

            {
                defaultContent: "<button type='button' class='btn btn-info btn-circle editar' data-toggle='modal' data-target='#modalagregar' data-toggle='tooltip' data-placement='top'><i class='icons-Pencil'></i></button>&nbsp;<button type='button' class='btn btn-danger btn-circle borrar'><i class='icon-trash'></i></button>",
            },
        ],
        language: idiomatable,
    });
    $(
        ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
    ).addClass("btn btn-primary mr-1");
    dataedit("#datatable1 tbody", table);
    databorrar("#datatable1 tbody", table);


};


// ------------------------------SAVE
var save = () => {
    $("#fmradd").on("submit", function (e) {
      e.preventDefault();
      // console.log( $( this ).serialize() );
      var datos = new FormData($("#fmradd")[0]);
      $.ajax({
        method: "POST",
        url: "controller/ctr_persona.php",
        data: datos,
        contentType: false,
        processData: false,
        cache: false,
        success: function (resp) {
        console.log(resp);
            location.reload();
        },
      });
    });
  };

//-----------------------------EDIT
var dataedit = function(body, table) {
    $(body).on("click", "button.editar", function() {
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        $("#nombre").val(data.per_nombre);
        $("#apellidos").val(data.per_apellidos);
        $("#fecha").val(data.per_fecha_nacimiento);
        $("#sexo").val(data.per_sexo);
        $("#estatura").val(data.per_estatura);
        $("#colombiano").val(data.per_colombiano);
        $("#accion").val('editar');
        $("#idactualizar").val(data.per_id);
    });
};

// ---------------------------------Eliminar
var databorrar = function(body, table) {
    $(body).on("click", "button.borrar", function() {
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
       let confirmar = confirm("¿Esta seguro de borrar este usuario?");
       if(confirmar){
        $.ajax({
            method: "POST",
            url: "controller/ctr_persona.php",
            data: {accion:'eliminar',id:data.per_id},
            // contentType: false,
            // processData: false,
            // cache: false,
            success: function (resp) {
            console.log(resp);
                location.reload();
            },
          });   
       }
    });
};


