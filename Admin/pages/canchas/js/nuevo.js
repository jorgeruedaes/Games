//	var Creador = '<?php echo $usuario['id_canchass']; ?>'
$(function() {

	var canchass = {
		inicio: function () {
			canchass.recargar();
		},
		recargar: function () {
			canchass.enviarDatos();
			canchass.Nuevo();
			canchass.add();
			canchass.ModalImagen();
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
					url: 'pages/canchas/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "nuevo",

						nombre:	$('.n-nombre').val(),
						estado :$('.select-n-estado option:selected').val()

						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "Información",
								text: "La cancha se ha creado exitosamente!.",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "rgb(174, 222, 244)",
								confirmButtonText: "Aceptar",
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
			url: 'pages/canchas/peticiones/peticiones.php',
			type: 'POST',
			data: {
				bandera: "modificar",
				nombre:	$('.nombre').val(),
				estado :$('.select-estado option:selected').val(),
				cancha: $('#defaultModal').data('cancha')


			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					swal({title: "Información",
						text: "La cancha se ha modificado exitosamente!",
						type: "success",
						showCancelButton: false,
						confirmButtonColor: "rgb(174, 222, 244)",
						confirmButtonText: "Aceptar",
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
cargarModal: function(cancha,nombre,estado)
{
	$('.nombre').val(nombre);
	$('.select-estado').val(estado);
	$('.select-estado').change();

	$('#defaultModal').data('cancha',cancha);
	$('#defaultModal').modal('show'); 
	canchass.recargar();
},
ModalImagen :function()
{

	$('#tabla-clubs').on("click", ".edit-item", function(){
		var nombre = $(this).data('nombre');
		var estado = $(this).data('estado');
		var cancha = $(this).data('id');
		canchass.cargarModal(cancha,nombre,estado);
	});
}
};
$(document).ready(function () {

	canchass.inicio();

});

});