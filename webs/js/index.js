$(function() {

	var partidos = {
		inicio: function () {
			
			partidos.detalleProgramacion();
		},
		detalleProgramacion: function () {
			$('.calendar-detail').on('click', function () {
			var element = $(this).attr('id');
		 	window.location.href = "webs/Index/programacion.php?id=" + element + "";

			});
		}	
	};

$(document).ready(function () {

	partidos.inicio();

});

});