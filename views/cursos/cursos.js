//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html

function init(){
  $('#Llenado_form').on('submit', (e)=>{
    guardaeditatodo(e);
  })
}


$().ready(() => {
  Tablallena();
});

var Tablallena = () => {
var html = "";
$.post(
  "../../controllers/cursos.controller.php?op=todos",{},(listallenar) => {
    //console.log(JSON.parse(listausuarios));
    listallenar= JSON.parse(listallenar);
    $.each(listallenar, (index, curso) => {
      html +=
        `<tr>` +
        `<td>${index + 1}</td>` +
        `<td>${curso.materia}</td>` +
        `<td>${curso.pro_cedula}</td>` +
        `<td>${curso.pro_nombre}</td>` +
        `<td>` +
        `<button class='btn btn-success' onclick='uno(${curso.id_curso})'>Editar</button>` +
        `<button class='btn btn-danger' onclick='eliminar(${curso.id_curso})'>Eliminar</button>` +
        `</td>` +
        `</tr>`;
    });
    $('#Tablallendo').html(html);
  }
);
};


var cargaprofe = () => {
  var html = ' <option value="0">Seleccione una Opcion</option>';
  $.post("../../controllers/profesor.controller.php?op=todos", (listapr) => {
    listapr = JSON.parse(listapr);
    $.each(listapr, (index, profesores) => {
      html += `<option value="${profesores.id_profesor}">${profesores.pro_nombre}- Ci: ${profesores.pro_cedula}</option>`;
    });
    $("#id_profesor").html(html);
  });
};


var guardaeditatodo= (e) => {
  e.preventDefault();
var url = "";
var form_Data = new FormData($("#Llenado_form")[0]);
var id_curso = document.getElementById("id_curso").value;
if (id_curso === undefined || id_curso === "") {
  url = "../../controllers/cursos.controller.php?op=insertar";
} else {
  url = "../../controllers/cursos.controller.php?op=actualizar";
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
      Swal.fire('Categoria de Curso', 'Se guardo con exito','success');
      limpiar();
      Tablallena();
    } else {
      Swal.fire('Categoria de Curso', 'Ocurrio un error','danger');
    }
  },
});
};

var uno = (id_curso) => {
$.post('../../controllers/cursos.controller.php?op=uno', {
  id_curso: id_curso
}, (res) => {
    res = JSON.parse(res);
    $('#id_curso').val(res.id_curso);
    $('#materia').val(res.materia);
    $('#id_profesor').val(res.id_profesor);
})
document.getElementById('titulomodallenado').innerHTML = "Editar Curso";
$('#Modallenado').modal('show');
};
var eliminar = (id_curso) => {
Swal.fire({
    title: 'Cursos',
    text: "Esta seguro que desea eliminar...???",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Eliminar!!!'
}).then((result) => {
    if (result.isConfirmed) {
        $.post('../../controllers/cursos.controller.php?op=eliminar', {
          id_curso: id_curso
        }, (res) => {
            res = JSON.parse(res);
            if (res === 'ok') {
                Swal.fire('Cursos', 'Se eliminó con éxito', 'success');
                limpiar();
                Tablallena();
            }

        })
    }
})
};

var limpiar = () => { 
  $('#id_curso').val('');
  $('#materia').val('');
  $('#id_profesor').val('0');
  $('#Modallenado').modal('hide');
  document.getElementById('titulomodallenado').innerHTML = "Nuevo Curso";
};
init();