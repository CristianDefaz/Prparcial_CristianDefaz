//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html

function init(){
    $('#estudiante_form').on('submit', (e)=>{
      guardaeditaestudiante(e);
    })
}


$().ready(() => {
  TablaEstudiantes();
});

var TablaEstudiantes = () => {
  var html = "";
  $.post(
    "../../controllers/estudiante.controller.php?op=todos",{},(listaestudiante) => {
      //console.log(JSON.parse(listausuarios));
      listaestudiante = JSON.parse(listaestudiante);
      $.each(listaestudiante, (index, estudiante) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${estudiante.es_cedula}</td>` +
          `<td>${estudiante.es_nombre}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${estudiante.id_estudiante})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${estudiante.id_estudiante})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $('#Tablaestudiante').html(html);
    }
  );
};

var guardaeditaestudiante = (e) => {
    e.preventDefault();
  var url = "";
  var form_Data = new FormData($("#estudiante_form")[0]);
  var id_estudiante = document.getElementById("id_estudiante").value;
  if (id_estudiante === undefined || id_estudiante === "") {
    url = "../../controllers/estudiante.controller.php?op=insertar";
  } else {
    url = "../../controllers/estudiante.controller.php?op=actualizar";
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
        Swal.fire('Categoria de Estudiante', 'Se guardo con exito','success');
        limpiar();
        TablaEstudiantes();
      } else {
        Swal.fire('Categoria de Estudiante', 'Ocurrio un error','danger');
      }
    },
  });
};

var uno = (id_estudiante) => {
  $.post('../../controllers/estudiante.controller.php?op=uno', {
    id_estudiante: id_estudiante
  }, (res) => {
      res = JSON.parse(res);
      $('#id_estudiante').val(res.id_estudiante);
      $('#es_cedula').val(res.es_cedula);
      $('#es_nombre').val(res.es_nombre);
  })
  document.getElementById('titulomodalestudiante').innerHTML = "Editar Estudiante";
  $('#Modalestudiante').modal('show');
};
var eliminar = (id_estudiante) => {
  Swal.fire({
      title: 'Estudiante',
      text: "Esta seguro que desea eliminar...???",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar!!!'
  }).then((result) => {
      if (result.isConfirmed) {
          $.post('../../controllers/estudiante.controller.php?op=eliminar', {
            id_estudiante: id_estudiante
          }, (res) => {
              res = JSON.parse(res);
              if (res === 'ok') {
                  Swal.fire('Estudiante', 'Se eliminó con éxito', 'success');
                  limpiar();
                  TablaEstudiantes();
              }

          })
      }
  })
};

var limpiar = () => { 
    $('#id_estudiante').val('');
    $('#es_cedula').val('');
    $('#es_nombre').val('');
    $('#Modalestudiante').modal('hide');
    document.getElementById('titulomodalestudiante').innerHTML = "Nuevo Estudiante";
};
init();