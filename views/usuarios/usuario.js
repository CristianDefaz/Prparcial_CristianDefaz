//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html

function init(){
    $('#usuarios_form').on('submit', (e)=>{
      guardaeditaUsuarios(e);
    })
}


$().ready(() => {
  TablaUsuarios();
});

var TablaUsuarios = () => {
  var html = "";
  $.post(
    "../../controllers/usuario.controller.php?op=todos",{},(listausuarios) => {
      //console.log(JSON.parse(listausuarios));
      listausuarios = JSON.parse(listausuarios);
      $.each(listausuarios, (index, usuario) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${usuario.usu_nombre}</td>` +
          `<td>${usuario.usu_apellido}</td>` +
          `<td>${usuario.usu_cedula}</td>` +
          `<td>${usuario.usu_telefono}</td>` +
          `<td>${usuario.usu_correo}</td>` +
          `<td>${usuario.rol_nombre}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${usuario.id_usuario})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${usuario.id_usuario})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $('#TablaUsuario').html(html);
    }
  );
};

var cargaSelectRoles = () => {
  var html = ' <option value="0">Seleccione una Opcion</option>';
  $.post("../../controllers/roles.controller.php?op=todos", (listaroles) => {
    listaroles = JSON.parse(listaroles);
    $.each(listaroles, (index, rol) => {
      html += `<option value="${rol.id_rol}">${rol.rol_nombre}</option>`;
    });
    $("#id_rol").html(html);
  });
};

var guardaeditaUsuarios = (e) => {
    e.preventDefault();
  var url = "";
  var form_Data = new FormData($("#usuarios_form")[0]);
  var id_usuario = document.getElementById("id_usuario").value;
  if (id_usuario === undefined || id_usuario === "") {
    url = "../../controllers/usuario.controller.php?op=insertar";
  } else {
    url = "../../controllers/usuario.controller.php?op=actualizar";
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
        Swal.fire('Categoria de Usuario', 'Se guardo con exito','success');
        limpiar();
        TablaUsuarios();
      } else {
        Swal.fire('Categoria de Usuario', 'Ocurrio un error','danger');
      }
    },
  });
};

var uno = (id_usuario) => {
  $.post('../../controllers/usuario.controller.php?op=uno', {
    id_usuario: id_usuario
  }, (res) => {
      res = JSON.parse(res);
      $('#id_usuario').val(res.id_usuario);
      $('#usu_nombre').val(res.usu_nombre);
      $('#usu_apellido').val(res.usu_apellido);
      $('#usu_telefono').val(res.usu_telefono);
      $('#usu_cedula').val(res.usu_cedula);
      $('#usu_correo').val(res.usu_correo);
      $('#usu_contrasena').val(res.usu_contrasena);
      $('#id_rol').val(res.id_rol);
  })
  document.getElementById('titulomodalusuario').innerHTML = "Editar Usuario";
  $('#Modalusuario').modal('show');
};
var eliminar = (id_usuario) => {
  Swal.fire({
      title: 'Usuario',
      text: "Esta seguro que desea eliminar...???",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar!!!'
  }).then((result) => {
      if (result.isConfirmed) {
          $.post('../../controllers/usuario.controller.php?op=eliminar', {
            id_usuario: id_usuario
          }, (res) => {
              res = JSON.parse(res);
              if (res === 'ok') {
                  Swal.fire('Usuario', 'Se eliminó con éxito', 'success');
                  limpiar();
                  TablaUsuarios();
              }

          })
      }
  })
};

var limpiar = () => { 
    $('#id_usuario').val('');
    $('#usu_nombre').val('');
    $('#usu_apellido').val('');
    $('#usu_telefono').val('');
    $('#usu_cedula').val('');
    $('#usu_correo').val('');
    $('#usu_contrasena').val('');
    $('#id_rol').val('0');
    $('#modalUsuarios').modal('hide');
    document.getElementById('titulomodalusuario').innerHTML = "Nuevo Usuario";
};
init();