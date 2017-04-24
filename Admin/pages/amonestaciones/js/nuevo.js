
$(function() {
	var t='';
	var amonestaciones = {
		inicio: function () {
			amonestaciones.recargar();
			amonestaciones.Add_Resultado();
			amonestaciones.Cargar_Partidos();
		},
		recargar: function () {
			amonestaciones.TomarDatos_Resultados();
			amonestaciones.Tabla();
			amonestaciones.SeleccionPartidos();


		},
		Abrir_Amonestaciones: function () {
			$('.tabla-resultados').on("click", ".to-amonestaciones", function(){
				var partido = $(this).data('id');
				var	url = "pages/amonestaciones/agregaramonestaciones.php?id="+partido; 
				window.open(url, '_self');

			});
		},
		Tabla : function()
		{
			t = $('.tabla-resultados').DataTable();

		},
		SeleccionPartidos: function()
		{


			$('.selector-campeonato-amonestaciones').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getpartidosdobleestado",
						estado : '1',
						estado1 : '8',
						campeonato:  $('.selector-campeonato-amonestaciones  option:selected').val()

					},
					success: function (resp) {


							var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							for (var i = 0; i < resp.datos.length; i++) {
								t.row.add( [ 
									resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2,
									'<strong>'+resp.datos[i].nombre_estado+'</strong><br>'+resp.datos[i].fecha,	
									'<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group"><button data-partido="'+resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2+'" data-id="'+resp.datos[i].id_partido+'" data-nfecha="'+resp.datos[i].Nfecha+'" data-fecha="'+resp.datos[i].fecha+'" data-estado="'+resp.datos[i].estado+'" data-lugar="'+resp.datos[i].lugar+'" data-hora="'+resp.datos[i].hora+'"  type="button" class="btn bg-blue waves-effect to-amonestaciones" data-toggle="modal" > <i class="material-icons">edit</i></button></div>'
									] ).draw( false );

							}
							amonestaciones.Abrir_Amonestaciones();
						} else {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							swal("Importante", "No hay partidos para AGREGAR AMONESTACIONES para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		},
		Cargar_Partidos : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato-amonestaciones  option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato-amonestaciones').val(resp.datos);
						$('.selector-campeonato-amonestaciones').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
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
					objeto.push($(elemento).find('0').val());
					objeto.push($(elemento).find('.comentario').val());
					objeto.push($(elemento).find('.select-tarjeta option:selected').val());
					array.push(objeto);

				} ;
			}); 
			return array;
		},
		Add_Resultado: function () {
			$('.guardar-amonestaciones').on("click", function(){

				swal({title: "¿Esta seguro que desea GUARDAR los amonestaciones del partido?",
					text: "",
					type: "warning",
					confirmButtonText: "Aceptar",
					showCancelButton: true,
					confirmButtonColor: "rgb(174, 222, 244)",

					closeOnConfirm: false
				}, function (isConfirm) {
					if (isConfirm) {

						$.ajax({
							url: 'pages/amonestaciones/peticiones/peticiones.php',
							type: 'POST',
							data: {
								bandera: "agregardetalles-amonestaciones",
								partido: $('.guardar-amonestaciones').data('partido'),
								fecha: $('.guardar-amonestaciones').data('fecha'),
								estado : $('.guardar-amonestaciones').data('estado'),
								json  : amonestaciones.TomarDatos_Resultados(),
							},
							success: function (resp) {

								var resp = $.parseJSON(resp);
								if (resp.salida === true && resp.mensaje === true) {
									swal({title: "",
										text: "Se ha agregado los amonestaciones de manera exitosa!",
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

		amonestaciones.inicio();

	});

});