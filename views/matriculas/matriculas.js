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
  "../../controllers/matricula.controller.php?op=todos",{},(listallenar) => {
    //console.log(JSON.parse(listausuarios));
    listallenar= JSON.parse(listallenar);
    $.each(listallenar, (index, matricula) => {
      html +=
        `<tr>` +
        `<td>${index + 1}</td>` +
        `<td>${matricula.es_nombre}</td>` +
        `<td>${matricula.es_cedula}</td>` +
        `<td>${matricula.materia}</td>` +
        `<td>${matricula.pro_nombre}</td>` +
        `<td>` +
        `<button class='btn btn-success' onclick='uno(${matricula.id_matricula})'>Editar</button>` +
        `<button class='btn btn-danger' onclick='eliminar(${matricula.id_matricula})'>Eliminar</button>` +
        `</td>` +
        `</tr>`;
    });
    $('#Tablallendo').html(html);
  }
);
};

var cargatipo = () => {
  var htmlestudiante = '<option value="0">Seleccione una Opción</option>';
  var htmlcurso = '<option value="0">Seleccione una Opción</option>';
  

  // Cargar datos desde el archivo estudiante.controller.php
  $.post("../../controllers/estudiante.controller.php?op=todos", (listaestu) => {
    listaestu = JSON.parse(listaestu);
    $.each(listaestu, (index, estudiante) => {
      htmlestudiante += `<option value="${estudiante.id_estudiante}">${estudiante.es_nombre}- Ci: ${estudiante.es_cedula}</option>`;
    });
    $("#id_estudiante").html(htmlestudiante);
  });

  // Cargar datos desde el archivo cursos.controller.php
  $.post("../../controllers/cursos.controller.php?op=todos", (listacur) => {
    listacur = JSON.parse(listacur);
    $.each(listacur, (index, cursos) => {
      htmlcurso += `<option value="${cursos.id_curso}">${cursos.materia}</option>`;
    });
    $("#id_curso").html(htmlcurso);
  });
};




var guardaeditatodo= (e) => {
  e.preventDefault();
var url = "";
var form_Data = new FormData($("#Llenado_form")[0]);
var id_matricula = document.getElementById("id_matricula").value;
if (id_matricula === undefined || id_matricula === "") {
  url = "../../controllers/matricula.controller.php?op=insertar";
} else {
  url = "../../controllers/matricula.controller.php?op=actualizar";
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

var uno = (id_matricula) => {
$.post('../../controllers/matricula.controller.php?op=uno', {
  id_matricula: id_matricula
}, (res) => {
    res = JSON.parse(res);
    $('#id_matricula').val(res.id_matricula);
    $('#id_estudiante').val(res.id_estudiante);
    $('#id_curso').val(res.id_curso);
})
document.getElementById('titulomodallenado').innerHTML = "Editar matricula";
$('#Modallenado').modal('show');
};
var eliminar = (id_matricula) => {
Swal.fire({
    title: 'Matricula',
    text: "Esta seguro que desea eliminar...???",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Eliminar!!!'
}).then((result) => {
    if (result.isConfirmed) {
        $.post('../../controllers/matricula.controller.php?op=eliminar', {
          id_matricula: id_matricula
        }, (res) => {
            res = JSON.parse(res);
            if (res === 'ok') {
                Swal.fire('Matricula', 'Se eliminó con éxito', 'success');
                limpiar();
                Tablallena();
            }

        })
    }
})
};

var limpiar = () => { 
  $('#id_matricula').val('');
  $('#id_estudiante').val('0');
  $('#id_curso').val('0');
  $('#Modallenado').modal('hide');
  document.getElementById('titulomodallenado').innerHTML = "Nuevo Matricula";
};
init();