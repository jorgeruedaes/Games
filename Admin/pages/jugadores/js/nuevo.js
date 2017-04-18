//	var Creador = '<?php echo $usuario['id_jugadores']; ?>'
$(function() {

	var jugadores = {
		inicio: function () {
			jugadores.recargar();
		},
		recargar: function () {
			jugadores.enviarDatos();
			jugadores.editarCampeonato();
			jugadores.Nuevo();
			jugadores.add();
			jugadores.evento_cambiosclub();
			jugadores.ModalImagen();
		},
		evento_cambiosclub : function ()
		{
			$('.select-n-club').on('change', function() {

				$.ajax({
					url: 'pages/jugadores/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "equiposxclub",
						club :$('.select-n-club option:selected').val()
						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							for (var i = 0; i<= resp.datos.length; i++) {
								$('.select-n-equipos').first().append('<option value="'+resp.datos[i].id_equipo+'">"'+resp.datos[i].nombre_equipo+'"</option>')
						   
							};


						} else {
							swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
						}
					}
				});

		});
		},
		add : function()
		{
			$('.add-perfil').off('click').on('click', function () {	
				$('#nuevoPerfil').modal('show'); 
			});

		}
		,
		Nuevo : function ()
		{
			$('.guardar-nuevo').off('click').on('click', function () {	
				$.ajax({
					url: 'pages/jugadores/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "nuevo",

						nombre:	$('.n-nombre').val(),
						grupo :$('.n-tecnico').val(),
						direccion: $('.n-grupo').val(),
						tecnico: $('.n-tecnico').val(),
						torneo :$('.select-n-torneo option:selected').val(),
						estado :$('.select-n-estado option:selected').val(),
						club :$('.select-n-club option:selected').val()
						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El equipo se ha creado exitosamente!.",
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
			url: 'pages/jugadores/peticiones/peticiones.php',
			type: 'POST',
			data: {
				bandera: "modificar",
				nombre:	$('.nombre').val(),
				tecnico :$('.tecnico').val(),
				grupo: $('.grupo').val(),
				tecnico: $('.tecnico').val(),
				torneo :$('.select-torneo option:selected').val(),
				estado :$('.select-estado option:selected').val(),
				club :$('.select-club option:selected').val(),
				equipo : $('#defaultModal').data('equipo')


			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					swal({title: "",
						text: "El equipo se ha modificado exitosamente!",
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
cargarModal: function(club,nombre,tecnico,torneo,grupo,estado,equipo)
{
	$('.nombre').val(nombre);
	$('.tecnico').val(tecnico);
	$('.grupo').val(grupo);
	$('.select-torneo').val(torneo);
	$('.select-torneo').change();
	$('.select-club').val(club);
	$('.select-club').change();
	$('.select-estado').val(estado);
	$('.select-estado').change();

	$('#defaultModal').data('equipo',equipo);
	$('#defaultModal').modal('show'); 
	jugadores.recargar();
},

editarCampeonato : function()
{
	// $('.edit-item').off('click').on('click', function () {
	// 	var nombre = $(this).data('nombre');
	// 	var presidente = $(this).data('presidente');
	// 	var direccion = $(this).data('direccion');
	// 	var telefono = $(this).data('telefono');
	// 	var email = $(this).data('correo');
	// 	var horario = $(this).data('horario');
	// 	var cancha = $(this).data('cancha');
	// 	var club = $(this).data('club');
	// 	var estado = $(this).data('estado');
	// 	jugadores.cargarModal(club,nombre,presidente,direccion,telefono,email,horario,cancha,estado);
//	});
},
ModalImagen :function()
{
	$('#tabla-clubs').on("click", ".ver", function(){

		$('#imagenes').attr('src','../images/Escudos/'+$(this).data('logo'))
		$('#imagenesvisor').modal('show'); 
	});

	$('#tabla-clubs').on("click", ".edit-item", function(){
		var nombre = $(this).data('nombre');
		var tecnico = $(this).data('tecnico');
		var club = $(this).data('club');
		var torneo = $(this).data('torneo');
		var grupo = $(this).data('grupo');
		var estado = $(this).data('estado');
		var equipo = $(this).data('id');
		jugadores.cargarModal(club,nombre,tecnico,torneo,grupo,estado,equipo);
	});
}
};
$(document).ready(function () {

	jugadores.inicio();

});

});