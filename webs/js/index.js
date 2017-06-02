$(function() {

	var partidos = {
		inicio: function () {
			
			$('[data-toggle="tooltip"]').tooltip(); 
			partidos.detalleProgramacion();
		},
		detalleProgramacion: function () {
			$('.calendar-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/Index/programacion.php?id=" + element + "";
			});

			$('.calendar-category').on('click', function () {
			var element = $(this).attr('id');
			window.location.href = "webs/TorneoMunicipal/Categoria.php?id=" + element + "";
			});
				$('.calendar-court').on('click', function () {
			var element = $(this).attr('id');
			window.location.href = "webs/TorneoMunicipal/cancha.php?id=" + element + "";
			});

			$('.positions-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/TorneoMunicipal/Categoria.php?id=" + element + "";

			});
			$('.results-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/TorneoMunicipal/resultado.php?id=" + element + "";

			});

			$('.open-category').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/TorneoMunicipal/Categoria.php?id=" + element + "";
			});
			
			$('.news-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/Noticias/noticia.php?id=" + element + "";

			});

			$('#sendEmailBtn').on('click', function () {
					$.ajax({
					url: 'Admin/php/peticiones.php',
					type: 'POST',
					data: {
						bandera: "EnviarCorreo",
						nombre: $('#nombre').val(),
						email :$('#email').val(),
						asunto: $('#asunto').val(),
						mensaje: $('#mensaje').val()
					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "Tu mensaje se envió exitosamente, pronto nos comunicaremos contigo!",
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
							swal("", "Ha ocurrido un error al enviar el mensaje, intenta nuevamente.", "error");
						}
					}
				});

			});
	
		}	
	};

$(document).ready(function () {

	partidos.inicio();

});

});