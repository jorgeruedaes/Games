//	var Creador = '<?php echo $usuario['id_campeonatos']; ?>'
$(function() {

	var campeonatos = {
		inicio: function () {
			campeonatos.recargar();
		},
		recargar: function () {
			campeonatos.enviarDatos();
			campeonatos.borrarUsuario();
			campeonatos.editarItem();
			campeonatos.editarModulos();
			campeonatos.addPerfil();
			campeonatos.Nuevo();
			campeonatos.reglamento();
			campeonatos.ModalArchivos();
		},

		reglamento :  function ()
		{
				$('.guardar-reglamentos').off('click').on('click', function () {	
					var formData = new FormData($("#frmFileUpload")[0]);
				$.ajax({
					url: 'pages/campeonatos/peticiones/peticiones.php',
					type: 'POST',
					data: formData,
                	contentType: false,
               	    processData: false,
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El reglamento se modificos de manera Exitosa!",
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
		}
		,
		Nuevo : function ()
		{
		$('.guardar-nuevo').off('click').on('click', function () {	
				$.ajax({
					url: 'pages/campeonatos/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "nuevo",
						nombre: $('.nuevo-nombre').val(),
						nivel:$('.nuevo-nivel').val(),
						descripcion: $('.detalle').val()
						
			
					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El perfil se ha creado exitosamente!",
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
					url: 'pages/campeonatos/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "modificar-perfil",
						nombre: $('.nombre').val(),
						nivel:$('.nivel').val(),
						id_perfil: $('#defaultModal').data('perfil')
						
			
					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El perfil se ha modificado exitosamente!",
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
		borrarUsuario: function () {
			$('.delete-item').off('click').on('click', function () {
				var valor = $(this);
				swal({
					title: "¿ Esta seguro ?",
					text: "Todos los usuarios que tengan este perfil seran eliminados, esta seguro ?!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Si,Eliminalo!",
					cancelButtonText: "No,Cancelalo!",
					closeOnConfirm: false,
					closeOnCancel: false
				}, function (isConfirm) {
					if (isConfirm) {
						campeonatos.desactivar(valor);
					} else {
						swal("Cancelado", "", "error");
					}
				});

			});


		},
		desactivar: function(valor)
		{
			$.ajax({
				url: 'pages/campeonatos/peticiones/peticiones.php',
				type: 'POST',
				data: {
					bandera: "eliminar",
					id_campeonatos: valor.data('id')

				},
				success: function (resp) {

					var resp = $.parseJSON(resp);
					if (resp.salida === true && resp.mensaje === true) {
						swal({
							title: "",
							text: "El perfil se ha eliminado exitosamente!",
							type: "info",
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
		},
		cargarModal: function(nombre,nivel,perfil)
		{
			$('.nombre').val(nombre);
			$('.nivel').val(nivel);
			$('#defaultModal').data('perfil',perfil);
			$('#defaultModal').modal('show'); 
			campeonatos.recargar();
		},
		cargarModalModulos: function(nombre,perfil,modulos)
		{
			$('#defaultModalLabel1').text('Editar Permisos del perfil : ' + nombre);
			$('#ModalModulos').data('perfil',perfil);
			campeonatos.Selecionarmodulos(modulos);
			$('#ModalModulos').modal('show'); 
			campeonatos.recargar();
		},
		addPerfil : function()
		{
			$('.add-perfil').off('click').on('click', function () {	
				$('#nuevoPerfil').modal('show'); 
			});

		},
		editarModulos : function()
		{
			$('.edit-modulos').off('click').on('click', function () {	
				var nombre = $(this).data('nombre');
				var perfil = $(this).data('id');
				var modulos = $(this).data('modulos');
				campeonatos.cargarModalModulos(nombre,perfil,modulos);
			});
		},

		editarItem : function()
		{
			$('.edit-item').off('click').on('click', function () {
				var nombre = $(this).data('nombre');
				var nivel = $(this).data('nivel');
				var perfil = $(this).data('id');
				campeonatos.cargarModal(nombre,nivel,perfil);
			});
		},
		Selecionarmodulos : function(modulos)
		{
			$('input').prop("checked", "");
			for (i = 0; i < modulos.length; i++) { 
				$('div').find("[data-id='"+modulos[i]+"']").prop("checked", "checked");
			}


		},
		ModalArchivos :function()
		{
			$('.add-pdf').off('click').on('click', function () {
				//campeonatos.cargarModal(nombre,nivel,perfil);
				$('#defaultModalReglamentos').modal('show'); 
			});
		}
	};
	$(document).ready(function () {

		campeonatos.inicio();

	});

});