//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html

function init(){
  $('#profesor_form').on('submit', (e)=>{
    guardaeditaprofesor(e);
  })
}


$().ready(() => {
TablaProfesor();
});

var TablaProfesor = () => {
var html = "";
$.post(
  "../../controllers/profesor.controller.php?op=todos",{},(listaprofe) => {
    //console.log(JSON.parse(listausuarios));
    listaprofe = JSON.parse(listaprofe);
    $.each(listaprofe, (index, profesor) => {
      html +=
        `<tr>` +
        `<td>${index + 1}</td>` +
        `<td>${profesor.pro_cedula}</td>` +
        `<td>${profesor.pro_nombre}</td>` +
        `<td>` +
        `<button class='btn btn-success' onclick='uno(${profesor.id_profesor})'>Editar</button>` +
        `<button class='btn btn-danger' onclick='eliminar(${profesor.id_profesor})'>Eliminar</button>` +
        `</td>` +
        `</tr>`;
    });
    $('#TablaProfesor').html(html);
  }
);
};

var guardaeditaprofesor = (e) => {
  e.preventDefault();
var url = "";
var form_Data = new FormData($("#profesor_form")[0]);
var id_profesor= document.getElementById("id_profesor").value;
if (id_profesor === undefined || id_profesor === "") {
  url = "../../controllers/profesor.controller.php?op=insertar";
} else {
  url = "../../controllers/profesor.controller.php?op=actualizar";
}
for (var pair of form_Data.entries()) {
  console.log(pair[0]+ ', ' + pair[1]); 
}
$.ajax({
  url: url,
  type: "POST",
  data: form_Data,
  processData: false,
  contentType: false,
  cache: false,
  success: (respuesta) => {
     console.log(respuesta);
    respuesta = JSON.parse(respuesta);
    if (respuesta == "ok") {
      Swal.fire('Categoria de Profesor', 'Se guardo con exito','success');
      limpiar();
      TablaProfesor();
    } else {
      Swal.fire('Categoria de Profesor', 'Ocurrio un error','danger');
    }
  },
});
};

var uno = (id_profesor) => {
$.post('../../controllers/profesor.controller.php?op=uno', {
  id_profesor: id_profesor
}, (res) => {
    res = JSON.parse(res);
    $('#id_profesor').val(res.id_profesor);
    $('#pro_cedula').val(res.pro_cedula);
    $('#pro_nombre').val(res.pro_nombre);
})
document.getElementById('titulomodalprofesor').innerHTML = "Editar Profesor";
$('#Modalprofesor').modal('show');
};
var eliminar = (id_profesor) => {
Swal.fire({
    title: 'Profesor',
    text: "Esta seguro que desea eliminar...???",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Eliminar!!!'
}).then((result) => {
    if (result.isConfirmed) {
        $.post('../../controllers/profesor.controller.php?op=eliminar', {
          id_profesor: id_profesor
        }, (res) => {
            res = JSON.parse(res);
            if (res === 'ok') {
                Swal.fire('Profesor', 'Se eliminó con éxito', 'success');
                limpiar();
                TablaProfesor();
            }

        })
    }
})
};

var limpiar = () => { 
  $('#id_profesor').val('');
  $('#pro_cedula').val('');
  $('#pro_nombre').val('');
  $('#Modalprofesor').modal('hide');
  document.getElementById('titulomodalprofesor').innerHTML = "Nuevo Profesor";
};
init();