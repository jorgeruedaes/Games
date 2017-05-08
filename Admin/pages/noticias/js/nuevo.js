//	var Creador = '<?php echo $usuario['id_noticias']; ?>'
$(function() {
	var goblal='';
	var noticias = {
		inicio: function () {
			noticias.recargar();
			noticias.Inicial();
		},
		recargar: function () {
			noticias.enviarDatos();
			noticias.Nuevo();
			noticias.add();
			noticias.ModalImagen();
		},
		Eliminar : function (valor)
		{
			swal({title: "",
				text: " ¿ Esta seguro que desea eliminar esta noticia ?.",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "rgb(174, 222, 244)",
				confirmButtonText: "Ok",
				closeOnConfirm: false
			}, function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: 'pages/noticias/peticiones/peticiones.php',
						type: 'POST',
						data: {
							bandera: "eliminar",
							noticia: valor
						},
						success: function (resp) {

							var resp = $.parseJSON(resp);
							if (resp.salida === true && resp.mensaje === true) {
								swal({title: "",
									text: "La noticia se ha eliminado exitosamente!.",
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

				}
			});


},
Inicial: function()
{

	//CKEditor
	CKEDITOR.replace('ckeditor');
	CKEDITOR.config.height = 300;

	CKEDITOR.replace('ckeditor1');
	CKEDITOR.config.height = 300;

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
				titulo:	$('.n-titulo').val(),
				emcabezado:	$('.n-emcabezado').val(),
				fecha:	$('.n-fecha').val(),
				texto : CKEDITOR.instances['ckeditor'].getData(),
				torneo :$('.select-n-torneo option:selected').val()



			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					swal({title: "",
						text: "La noticia se ha creado exitosamente!.",
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
				titulo:	$('.titulo').val(),
				emcabezado:	$('.emcabezado').val(),
				fecha:	$('.fecha').val(),
				noticia:$('#defaultModal').data('id'),
				texto : CKEDITOR.instances['ckeditor1'].getData(),
				torneo :$('.select-torneo option:selected').val()
				


			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					swal({title: "",
						text: "La noticia  se ha modificado exitosamente!",
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
	CKEDITOR.instances['ckeditor1'].setData(texto);
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
		noticias.Eliminar(id);
	});
}
};
$(document).ready(function () {

	noticias.inicio();

});

});