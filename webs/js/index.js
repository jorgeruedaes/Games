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

			$('.positions-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/TorneoMunicipal/Categoria.php?id=" + element + "";

			});
			$('.results-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/TorneoMunicipal/resultado.php?id=" + element + "";

			});

			$('.download-calendar').on('click', function () {
			var element = $(this).attr('id');
		 	window.open("webs/Pdf/Calendario.php?id=" + element + "");

			});
			$('.news-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/Noticias/noticia.php?id=" + element + "";

			});
	
		}	
	};

$(document).ready(function () {

	partidos.inicio();

});

});