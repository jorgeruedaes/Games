
$(function() {

	var goles = {
		inicio: function () {
			goles.recargar();
			goles.Add_Resultado();
		},
		recargar: function () {
			goles.TomarDatos_Resultados();


		},
		TomarDatos_Resultados : function ()
		{
			var array =[];
			var objeto =[];

			$('.fila-tabla').each(function(indice, elemento) {
				if($(elemento).find('.confirmacion').is(':checked'))
				{ 
					var objeto =[];
					objeto.push($(elemento).data('jugador'));
					objeto.push($(elemento).find('.gol').val());
					objeto.push($(elemento).find('.autogol').val());
					objeto.push('5');
					array.push(objeto);
				} ;
			}); 
			return array;
		},
		Add_Resultado: function () {
			$('.guardar-goles').on("click", function(){

				swal({title: "¿Esta seguro que desea GUARDAR los goles del partido?",
					text: "",
					type: "warning",
					confirmButtonText: "Aceptar",
					showCancelButton: true,
					confirmButtonColor: "rgb(174, 222, 244)",

					closeOnConfirm: false
				}, function (isConfirm) {
					if (isConfirm) {

						$.ajax({
							url: 'pages/partidos/peticiones/peticiones.php',
							type: 'POST',
							data: {
								bandera: "agregardetalles-goles",
								partido: $('.guardar-goles').data('partido'),
								fecha: $('.guardar-goles').data('fecha'),
								estado : $('.guardar-goles').data('estado'),
								json  : goles.TomarDatos_Resultados(),
								resultado1 : $('#resultado1').val(),
								resultado2 : $('#resultado2').val(),

							},
							success: function (resp) {

								var resp = $.parseJSON(resp);
								if (resp.salida === true && resp.mensaje === true) {
									swal({title: "",
										text: "Se ha agregado el resultado de manera exitosa!",
										type: "success",
										confirmButtonText: "Aceptar",
										showCancelButton: true,
										confirmButtonColor: "rgb(174, 222, 244)",
										closeOnConfirm: false
									}, function (isConfirm) {
										if (isConfirm) {
											history.back();
										}
									});

								} else {
									swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
								}
							}
						});
					}
				});


			});

		}
	};
	$(document).ready(function () {

		goles.inicio();

	});

});