
$(function() {
	var t='';
	var amonestaciones = {
		inicio: function () {
			amonestaciones.recargar();
			amonestaciones.Add_Resultado();
		},
		recargar: function () {
			amonestaciones.enviarDatos();
			amonestaciones.CargarModal_Editar_amonestaciones();
			amonestaciones.Modificaramonestaciones();
			amonestaciones.Eliminaramonestaciones();
			amonestaciones.AbrirAgregarResultado();
			amonestaciones.SeleccionCampeonato();
			amonestaciones.SeleccionCampeonato_Calendario();
			amonestaciones.SeleccionCampeonato_Resultados();
			amonestaciones.SeleccionCampeonato_Nuevo();
			amonestaciones.Tabla();
			amonestaciones.Cargar();
			amonestaciones.Cargar_Calendario();
			amonestaciones.Cargar_Resultados();
			amonestaciones.Cargar_Nuevo();
			amonestaciones.TomarDatos_Resultados();
			amonestaciones.Cargar_Goles();
			amonestaciones.SeleccionCampeonato_Goles();
		},SeleccionCampeonato_Goles : function()
		{


			$('.selector-campeonato-goles').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getcampeonato",
						estado : '1',
						campeonato:  $('.selector-campeonato-goles option:selected').val()

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							for (var i = 0; i < resp.datos.length; i++) {
								t.row.add( [ 
									resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2,
									'<strong>'+resp.datos[i].Nfecha+'</strong><br>'+resp.datos[i].fecha,	
									'<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group"><button data-amonestaciones="'+resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2+'" data-id="'+resp.datos[i].id_amonestaciones+'" data-nfecha="'+resp.datos[i].Nfecha+'" data-fecha="'+resp.datos[i].fecha+'" data-estado="'+resp.datos[i].estado+'" data-lugar="'+resp.datos[i].lugar+'" data-hora="'+resp.datos[i].hora+'"  type="button" class="btn bg-blue waves-effect edit-amonestaciones" data-toggle="modal" > <i class="material-icons">edit</i></button></div>'
									] ).draw( false );
								//amonestaciones.Eliminaramonestaciones();
								//amonestaciones.CargarModal_Editar_amonestaciones_Eesultado();

							}
						} else {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							swal("Importante", "No hay amonestaciones para AGREGAR GOLES para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		},
		Cargar_Goles : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato-goles option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato-goles').val(resp.datos);
						$('.selector-campeonato-goles').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
		},
		Add_Resultado: function () {
			$('.guardar-amonestaciones').on("click", function(){

				swal({title: "¿Esta seguro que desea GUARDAR los datos del amonestaciones?",
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
								bandera: "agregardetalles",
								amonestaciones: $('.guardar-amonestaciones').data('amonestaciones'),
								fecha: $('.guardar-amonestaciones').data('fecha'),
								json  : amonestaciones.TomarDatos_Resultados(),
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
					objeto.push($(elemento).find('.select-tarjeta option:selected').val());
					array.push(objeto);
				} ;
			}); 
			return array;
		},
		Validar : function()
		{
			var equipoa = $('.select-equipoa option:selected').val();
			var equipob  = $('.select-equipob option:selected').val();
			if(equipoa==equipob)
			{
				return false;
			}
			else
			{
				return true;
			}
		},

		Cargar_Nuevo : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato-nuevo option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato-nuevo').val(resp.datos);
						$('.selector-campeonato-nuevo').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
		},
		Cargar_Resultados : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato-resultados option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato-resultados').val(resp.datos);
						$('.selector-campeonato-resultados').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
		},
		Cargar_Calendario : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato-calendario option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato-calendario').val(resp.datos);
						$('.selector-campeonato-calendario').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
		},

		Cargar : function()
		{
			$.ajax({
				url: 'pages/amonestaciones/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "get_campeonato",
					campeonato:  $('.selector-campeonato option:selected').val()
				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						$('.selector-campeonato').val(resp.datos);
						$('.selector-campeonato').change();
					} else {
						swal("Importante", "Selecciona un campeonato.", "info");
					}
				}
			});
		},
		Tabla : function()
		{
			t = $('.tabla-resultados').DataTable();

		},
		SeleccionCampeonato_Nuevo : function()
		{


			$('.selector-campeonato-nuevo').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getequipos",
						campeonato:  $('.selector-campeonato-nuevo option:selected').val()

					},
					success: function (resp) {


						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							$('#select-equipoa').html('').selectpicker('refresh');
							$('#select-equipoa').append('<option value="0">--Selecciona un Equipo --</option>').selectpicker('refresh');
							$('#select-equipob').html('').selectpicker('refresh');
							$('#select-equipob').append('<option value="0">--Selecciona un Equipo --</option>').selectpicker('refresh');
							for (var i = 0; i < resp.datos.length; i++) {
								$('#select-equipoa').append('<option value='+resp.datos[i].id_equipo+'>'+resp.datos[i].nombre_equipo+'</option>').selectpicker('refresh');
								$('#select-equipob').append('<option value='+resp.datos[i].id_equipo+'>'+resp.datos[i].nombre_equipo+'</option>').selectpicker('refresh');
							}
						} else {
							$('#select-equipoa').html('').selectpicker('refresh');
							$('#select-equipoa').append('<option value="0">--Selecciona un Equipo --</option>').selectpicker('refresh');
							$('#select-equipob').html('').selectpicker('refresh');
							$('#select-equipob').append('<option value="0">--Selecciona un Equipo --</option>').selectpicker('refresh');
							swal("Importante", "No hay EQUIPOS para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		},
		SeleccionCampeonato_Resultados : function()
		{


			$('.selector-campeonato-resultados').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getcampeonato",
						estado : '2',
						campeonato:  $('.selector-campeonato-resultados option:selected').val()

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							for (var i = 0; i < resp.datos.length; i++) {
								t.row.add( [ 
									resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2,
									'<strong>'+resp.datos[i].nombre_estado+'</strong><br>'+resp.datos[i].fecha,	
									'<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group"><button data-amonestaciones="'+resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2+'" data-id="'+resp.datos[i].id_amonestaciones+'" data-nfecha="'+resp.datos[i].Nfecha+'" data-fecha="'+resp.datos[i].fecha+'" data-estado="'+resp.datos[i].estado+'" data-lugar="'+resp.datos[i].lugar+'" data-hora="'+resp.datos[i].hora+'"  type="button" class="btn bg-blue waves-effect edit-amonestaciones" data-toggle="modal" > <i class="material-icons">edit</i></button></div>'
									] ).draw( false );
								//amonestaciones.Eliminaramonestaciones();
								//amonestaciones.CargarModal_Editar_amonestaciones_Eesultado();

							}
						} else {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							swal("Importante", "No hay amonestaciones para EDITAR RESULTADOS para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		},
		SeleccionCampeonato_Calendario : function()
		{
			$('.selector-campeonato-calendario').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getcampeonato-diferente",
						estado : '2',
						campeonato:  $('.selector-campeonato-calendario option:selected').val()

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							for (var i = 0; i < resp.datos.length; i++) {
								t.row.add( [ 
									resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2,
									'<strong>'+resp.datos[i].nombre_estado+'</strong><br>'+resp.datos[i].fecha,	
									'<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group"><button data-amonestaciones="'+resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2+'" data-id="'+resp.datos[i].id_amonestaciones+'" data-nfecha="'+resp.datos[i].Nfecha+'" data-fecha="'+resp.datos[i].fecha+'" data-estado="'+resp.datos[i].estado+'" data-lugar="'+resp.datos[i].lugar+'" data-hora="'+resp.datos[i].hora+'"  type="button" class="btn bg-blue waves-effect edit-amonestaciones" data-toggle="modal" > <i class="material-icons">edit</i></button><button  data-amonestaciones="'+resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2+'"  data-id="'+resp.datos[i].id_amonestaciones+'" type="button" class="btn bg-red waves-effect delete-amonestaciones"> <i class="material-icons">delete</i></button></div>'
									] ).draw( false );
								amonestaciones.Eliminaramonestaciones();
								amonestaciones.CargarModal_Editar_amonestaciones();

							}
						} else {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							swal("Importante", "No hay amonestaciones para EDITAR CALENDARIO para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		},

		SeleccionCampeonato : function()
		{
			$('.selector-campeonato').on('change', function () {
				$.ajax({
					url: 'pages/amonestaciones/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "getcampeonato",
						estado : '1',
						campeonato:  $('.selector-campeonato option:selected').val()

					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							for (var i = 0; i < resp.datos.length; i++) {
								t.row.add( [ 
									resp.datos[i].nombre_equipo1+' vs '+resp.datos[i].nombre_equipo2,
									'<strong>'+resp.datos[i].Nfecha+'</strong> '+resp.datos[i].fecha,	
									'<div class="btn-group btn-group-xs" role="group" aria-label="Small button group"><button data-id="'+resp.datos[i].id_amonestaciones+'" type="button" class="btn btn-primary waves-effect to-amonestaciones"><i class="material-icons">edit</i></button></div>'

									] ).draw( false );
								amonestaciones.AbrirAgregarResultado();

							}
						} else {
							t.row($('.tabla-resultados').parents('tr') ).clear().draw();
							swal("Importante", "No hay amonestaciones para AGREGAR para este campeonato, o selecciona alguno.", "info");
						}
					}
				});


			});
		}
		,
		Eliminaramonestaciones: function () {
			$('.tabla-resultados').on("click", ".delete-amonestaciones", function(){
				var amonestaciones =$(this).data('id');
				var datos = $(this).data('amonestaciones');
				swal({title: "¿Esta seguro que desea ELIMINAR el amonestaciones?",
					text: datos,
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
								bandera: "eliminar",
								amonestaciones: amonestaciones

							},
							success: function (resp) {

								var resp = $.parseJSON(resp);
								if (resp.salida === true && resp.mensaje === true) {
									swal({title: "",
										text: "El amonestaciones se ha eliminado exitosamente!",
										type: "success",
										confirmButtonText: "Aceptar",
										showCancelButton: true,
										confirmButtonColor: "rgb(174, 222, 244)",
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


			});

		},
		enviarDatos: function () {


			$('.guardar').off('click').on('click', function () {
				if(amonestaciones.Validar()){
					$.ajax({
						url: 'pages/amonestaciones/peticiones/peticiones.php',
						type: 'POST',
						data: {
							bandera: "nuevo",
							equipoa: $('.select-equipoa option:selected').val(),
							equipob: $('.select-equipob option:selected').val(),
							fecha:   $('#fecha').val(),
							hora:    $('#hora').val(),
							lugar:   $('.select-lugar option:selected').val(),
							ronda:   $('#ronda').val()


						},
						success: function (resp) {

							var resp = $.parseJSON(resp);
							if (resp.salida === true && resp.mensaje === true) {
								swal({title: "",
									text: "El amonestaciones se ha creado exitosamente!",
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
				else
				{
					swal("", "No es valido el amonestaciones que intenta guardar, intenta nuevamente.", "error");
				}
			});


		},
		CargarModal_Editar_amonestaciones: function () {
			$('.tabla-resultados').on("click", ".edit-amonestaciones", function(){
				var amonestaciones = $(this).data('amonestaciones');
				var fecha = $(this).data('fecha');
				var hora = $(this).data('hora');
				var lugar = $(this).data('lugar');
				var estado = $(this).data('estado');
				var Nfecha = $(this).data('nfecha');
				var id = $(this).data('id');

				$('#defaultModalLabel').text(amonestaciones);
				$('#fecha').val(fecha);
				$('#hora').val(hora);
				$('.select-lugar').val(lugar);
				$('.select-lugar').change();
				$('.modificar').data('amonestaciones',id);
				$('.select-estado').val(estado);
				$('.select-estado').change();
				$('#ronda').val(Nfecha);
				$('#defaultModal').modal('show'); 
				amonestaciones.Modificaramonestaciones();
			});

		},
		Modificaramonestaciones: function () {
			$('.modificar').on("click", function(){
				swal({title: "",
					text: " ¿ Esta seguro que desea modificar el amonestaciones ?",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "rgb(174, 222, 244)",
					confirmButtonText: "Ok",
					closeOnConfirm: false
				}, function (isConfirm) {
					if (isConfirm) {

						$.ajax({
							url: 'pages/amonestaciones/peticiones/peticiones.php',
							type: 'POST',
							data: {
								bandera: "modificar",
								perfil:  $('#perfil').val(),
								modulo:  $('#modulo').val(),
								fecha:   $('#fecha').val(),
								hora:    $('#hora').val(),
								amonestaciones: $('.modificar').data('amonestaciones'),
								estado:  $('.select-estado option:selected').val(),
								lugar:   $('.select-lugar option:selected').val(),
								ronda:   $('#ronda').val()
							},
							success: function (resp) {

								var resp = $.parseJSON(resp);
								if (resp.salida === true && resp.mensaje === true) {
									swal({title: "",
										text: "El amonestaciones se ha mdificado exitosamente!",
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
			});

		},
		AbrirAgregarResultado: function () {
			$('.tabla-resultados').on("click", ".to-amonestaciones", function(){
				var amonestaciones = $(this).data('id');
				var	url = "pages/amonestaciones/agregarresultado.php?id="+amonestaciones; 
				window.open(url, '_self');

			});
		}
	};
	$(document).ready(function () {

		amonestaciones.inicio();

	});

});