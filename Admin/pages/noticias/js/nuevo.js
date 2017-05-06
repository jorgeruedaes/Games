//	var Creador = '<?php echo $usuario['id_noticias']; ?>'
$(function() {

	var noticias = {
		inicio: function () {
			noticias.recargar();
		},
		recargar: function () {
			noticias.enviarDatos();
			noticias.Nuevo();
			noticias.add();
			noticias.ModalImagen();
		},
		add : function()
		{
			$('.add-noticia').off('click').on('click', function () {	
				$('#nuevanoticias').modal('show'); 
			});

		}
		,
		Nuevo : function ()
		{
			$('.guardar-nuevo').off('click').on('click', function () {	
				$.ajax({
					url: 'pages/noticias/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "nuevo",

						nombre:	$('.n-nombre').val(),
						estado :$('.select-n-estado option:selected').val()

						

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "La canchas se ha creado exitosamente!.",
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
			url: 'pages/noticias/peticiones/peticiones.php',
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
					swal({title: "",
						text: "La cancha se ha modificado exitosamente!",
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
cargarModal: function(titulo,emcabezado,fecha,id,texto,torneo)
{
	$('.titulo').val(titulo);
	$('.select-torneo').val(torneo);
	$('.select-torneo').change();
	$('.texto').val(texto);
	$('.fecha').val(fecha);
	$('.emcabezado').val(emcabezado);
	$('#defaultModal').data('id',id);
	$('#defaultModal').modal('show'); 
	noticias.recargar();
},
ModalImagen :function()
{

	$('#tabla-noticias').on("click", ".edit-item", function(){
		var titulo = $(this).data('titulo');
		var fecha = $(this).data('fecha');
		var emcabezado = $(this).data('emcabezado');
		var texto = $(this).data('texto');
		var id = $(this).data('id');
			var torneo = $(this).data('torneo');
		noticias.cargarModal(titulo,emcabezado,fecha,id,texto,torneo);
	});
	$('#tabla-noticias').on("click", ".delete-item", function(){
		var id = $(this).data('id');
		noticias.DeleteItems(id);
	});
}
};
$(document).ready(function () {

	noticias.inicio();

});

});