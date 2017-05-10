//	var Creador = '<?php echo $usuario['id_campeonatos']; ?>'
$(function() {

	var campeonatos = {
		inicio: function () {
			campeonatos.recargar();
		},
		recargar: function () {
			campeonatos.enviarDatos();
			campeonatos.editarCampeonato();
			campeonatos.addPerfil();
			campeonatos.Nuevo();
			campeonatos.reglamento();
			campeonatos.ModalImagen();
		},

		reglamento :  function ()
		{
			$('.guardar-reglamentos').off('click').on('click', function () {	
				var formData = new FormData($("#frmFileUpload")[0]);
				$.ajax({
					url: 'pages/campeonatos/peticiones/peticiones.php',
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El reglamento se modificos de manera Exitosa!",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "rgb(174, 222, 244)",
								confirmButtonText: "Ok",
								closeOnConfirm: false
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.reload();
								}
							});
						} else {
							swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
						}
					}
				});

			});
		}
		,
		Nuevo : function ()
		{
			$('.guardar-nuevo').off('click').on('click', function () {	
				$.ajax({
					url: 'pages/clubs/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "nuevo",
						nombre:	$('.n-nombre').val(),
						presidente :$('.n-presidente').val(),
						direccion: $('.n-direccion').val(),
						telefono:$('.n-telefono').val(),
						email:$('.n-email').val(),
						horario:$('.n-horario').val(),
						cancha:$('.n-cancha').val(),
						estado :$('.select-n-estado option:selected').val()
						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El club se ha creado exitosamente!.",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "rgb(174, 222, 244)",
								confirmButtonText: "Ok",
								closeOnConfirm: false
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.reload();
								}
							});
						} else {
							swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
						}
					}
				});

			});
		},
		
		enviarDatos: function () {
			$('.guardar').off('click').on('click', function () {
				$.ajax({
					url: 'pages/clubs/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "modificar",
						nombre:	$('.nombre').val(),
						presidente :$('.presidente').val(),
						direccion: $('.direccion').val(),
						telefono:$('.telefono').val(),
						email:$('.email').val(),
						horario:$('.horario').val(),
						cancha:$('.cancha').val(),
						estado :$('.select-estado option:selected').val(),
						club : $('#defaultModal').data('club')
						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El club se ha modificado exitosamente!",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "rgb(174, 222, 244)",
								confirmButtonText: "Ok",
								closeOnConfirm: false
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.reload();
								}
							});
						} else {
							swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
						}
					}
				});
});

},
cargarModal: function(club,nombre,presidente,direccion,telefono,email,horario,cancha,estado)
{
	$('.nombre').val(nombre);
	$('.presidente').val(presidente);
	$('.direccion').val(direccion);
	$('.telefono').val(telefono);
	$('.email').val(email);
	$('.horario').val(horario);
	$('.cancha').val(cancha);
	$('.select-estado').val(estado);
	$('.select-estado').change();
	$('#defaultModal').data('club',club);
	$('#defaultModal').modal('show'); 
	campeonatos.recargar();
},
addPerfil : function()
{
	$('.add-perfil').off('click').on('click', function () {	
		$('#nuevoPerfil').modal('show'); 
	});

},

editarCampeonato : function()
{
	$('.edit-item').off('click').on('click', function () {
		var nombre = $(this).data('nombre');
		var presidente = $(this).data('presidente');
		var direccion = $(this).data('direccion');
		var telefono = $(this).data('telefono');
		var email = $(this).data('correo');
		var horario = $(this).data('horario');
		var cancha = $(this).data('cancha');
		var club = $(this).data('club');
		var estado = $(this).data('estado');
		campeonatos.cargarModal(club,nombre,presidente,direccion,telefono,email,horario,cancha,estado);
	});
},
ModalImagen :function()
{
	$('#tabla-clubs').on("click", ".ver", function(){

			$('#imagenes').attr('src',$(this).data('logo'))
	 		$('#imagenesvisor').modal('show'); 
	});

	$('#tabla-clubs').on("click", ".edit-item", function(){
		var tabla = $(this);
		var nombre = $(this).data('nombre');
		var presidente = $(this).data('presidente');
		var direccion = $(this).data('direccion');
		var telefono = $(this).data('telefono');
		var email = $(this).data('correo');
		var horario = $(this).data('horario');
		var cancha = $(this).data('cancha');
		var club = $(this).data('club');
		var estado = $(this).data('estado');
		campeonatos.cargarModal(club,nombre,presidente,direccion,telefono,email,horario,cancha,estado);
	});
}
};
$(document).ready(function () {

	campeonatos.inicio();

});

});