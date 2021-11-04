let tableMaestro;
//let rowTable = ""; //paremetro del actualizar
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    //data tables
	tableMaestro = $('#tableMaestro').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
        "ajax":{
            "url": " "+base_url+"/Maestro/getMaestro",/*:P*/
            "dataSrc":""
		},
        "columns":[
            			//{"data":"idmaestro"},
							{"data":"identificacion"},
							{"data":"nombres"},
							{"data":"apellidos"},
							{"data":"telefono"},
							//{"data":"direccion"},
							{"data":"codigo"},
							{"data":"cursos"},
							{"data":"status"},
							{"data":"options"}
								],
								'dom': 'lBfrtip',
								'buttons': [
									{
										"extend": "excelHtml5",
										"text": "<i class='fas fa-file-excel'></i> Excel",
										"titleAttr":"Esportar a Excel",
										"className": "btn btn-success"
										},{
										"extend": "pdfHtml5",
										"text": "<i class='fas fa-file-pdf'></i> PDF",
										"titleAttr":"Esportar a PDF",
										"className": "btn btn-danger"
									}
								],
								"resonsieve":"true",
								"bDestroy": true,
								"iDisplayLength": 5,
								"autoWidth": true,
								"order":[[0,"asc"]]
								
							});


							if(document.querySelector("#formMaestro")){
								let formMaestro = document.querySelector("#formMaestro");
								formMaestro.onsubmit = function(e) {
									e.preventDefault();

									let strIdentificacion = document.querySelector('#txtIdentificacion').value;
									let strNombre = document.querySelector('#txtNombre').value;
									let strApellido = document.querySelector('#txtApellido').value;
									let intTelefono = document.querySelector('#txtTelefono').value;
									let strDireccion = document.querySelector('#txtDirección').value;
									let strCodigo = document.querySelector('#txtCodigo').value;
									let intCurso = document.querySelector('#listCursoid').value;
									let intStatus = document.querySelector('#listStatus').value;
									


									if(strIdentificacion == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strDireccion == '' || strCodigo == '' || intCurso == '' || intStatus == '' )
									{
										swal("Atención", "Todos los campos son obligatorios." , "error");
										return false;
									}

									let elementsValid = document.getElementsByClassName("valid");
									for (let i = 0; i < elementsValid.length; i++) {
										if(elementsValid[i].classList.contains('is-invalid')) {
											swal("Atención", "Por favor verifique los campos en rojo." , "error");
											return false;
										}
									}

									divLoading.style.display = "flex";
									let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
									let ajaxUrl = base_url+'/Maestro/setMaestro';
									let formData = new FormData(formMaestro);
									request.open("POST",ajaxUrl,true);
									request.send(formData);
									request.onreadystatechange = function(){
										if(request.readyState == 4 && request.status == 200){
											let objData = JSON.parse(request.responseText);
											if(objData.status)
											{
												/*if(rowTable == ""){
													tableUsuarios.api().ajax.reload();
													}else{
													htmlStatus = intStatus == 1 ?
													'<span class="badge badge-success">Activo</span>' :
													'<span class="badge badge-danger">Inactivo</span>';
													rowTable.cells[1].textContent = strNombre;
													rowTable.cells[2].textContent = strApellido;
													rowTable.cells[3].textContent = strEmail;
													rowTable.cells[4].textContent = intTelefono;
													rowTable.cells[5].textContent = document.querySelector("#listRolid").selectedOptions[0].text;
													rowTable.cells[6].innerHTML = htmlStatus;
													rowTable="";
												}*/
												$('#modalFormMaestro').modal("hide");
												formMaestro.reset();
												swal("Usuarios", objData.msg ,"success");
												tableMaestro.api().ajax.reload();//recarga la tabla
												}else{
												swal("Error", objData.msg , "error");
											}
										}
										divLoading.style.display = "none";
										return false;
									}
								}
							}
					}, false);



					/*-------------------------------------------------------------------------------------------------*/
					// consulta a la bd para el modal de visualizacion
					/*-------------------------------------------------------------------------------------------------*/
					function fntViewInfo(idpersona){  /*:p*/

						let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
						let ajaxUrl = base_url+'/Maestro/getMaestros/'+idpersona; /*:p*/
						request.open("GET",ajaxUrl,true);
						request.send();
						request.onreadystatechange = function(){
							if(request.readyState == 4 && request.status == 200){
								let objData = JSON.parse(request.responseText);

								if(objData.status)
								{
									let estadoMaestro = objData.data.status == 1 ?
									'<span class="badge badge-success">Activo</span>' :
									'<span class="badge badge-danger">Inactivo</span>';

									document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
									document.querySelector("#celNombre").innerHTML = objData.data.nombres;
									document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
									document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
									document.querySelector("#celDireccion").innerHTML = objData.data.direccion;
									document.querySelector("#celCodigo").innerHTML = objData.data.codigo;
									document.querySelector("#celStatus").innerHTML = estadoMaestro;

									$('#modalViewMaestro').modal('show');
									}else{
									swal("Error", objData.msg , "error");
								}
							}
						}
					}

					/*-------------------------------------------------------------------------------------------------*/
					// actualizacion de datos desde el modal
					/*-------------------------------------------------------------------------------------------------*/
					function fntEditInfo(/*element,*/ idpersona) //variable del parametro del inicio
					{

						//rowTable = element.parentNode.parentNode.parentNode; //variable del parametro del inicio
						//console.log (rowTable);
						document.querySelector('#titleModal').innerHTML ="Actualizar Maestro";
						document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
						document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
						document.querySelector('#btnText').innerHTML ="Actualizar";

						let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
						let ajaxUrl = base_url+'/Maestro/getMaestros/'+idpersona;/*:p*/
						request.open("GET",ajaxUrl,true);
						request.send();
						request.onreadystatechange = function(){

							if(request.readyState == 4 && request.status == 200){
								let objData = JSON.parse(request.responseText);

								if(objData.status)
								{
									document.querySelector("#idUsuario").value = objData.data.idmaestro; /*:p*/
									document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
									document.querySelector("#txtNombre").value = objData.data.nombres;
									document.querySelector("#txtApellido").value = objData.data.apellidos;
									document.querySelector("#txtTelefono").value = objData.data.telefono;
									document.querySelector("#txtDirección").value = objData.data.direccion;
									document.querySelector("#txtCodigo").value = objData.data.codigo;
									document.querySelector("#listCursoid").value =objData.data.cursoid;
									document.querySelector("#listStatus").value = objData.data.status;




									$('#listCursoid').selectpicker('render');

									if(objData.data.status == 1){
										document.querySelector("#listStatus").value = 1;
										}else{
										document.querySelector("#listStatus").value = 2;
									}
									$('#listStatus').selectpicker('render');
								}
							}

							$('#modalFormMaestro').modal('show');/*:p*/
						}
					}

					/*-------------------------------------------------------------------------------------------------*/
					// Eliminar estudiante
					/*-------------------------------------------------------------------------------------------------*/

					function fntDelInfo(idpersona){
						swal({
							title: "Eliminar Maestro",
							text: "¿Realmente quiere eliminar el Maestro?",
							type: "warning",
							showCancelButton: true,
							confirmButtonText: "Si, eliminar!",
							cancelButtonText: "No, cancelar!",
							closeOnConfirm: false,
							closeOnCancel: true
							}, function(isConfirm) {

							if (isConfirm)
							{
								let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
								let ajaxUrl = base_url+'/Maestro/delMaestro';/*:P*/
								let strData = "idUsuario="+idpersona;
								request.open("POST",ajaxUrl,true);
								request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								request.send(strData);
								request.onreadystatechange = function(){
									if(request.readyState == 4 && request.status == 200){
										let objData = JSON.parse(request.responseText);
										if(objData.status)
										{
											swal("Eliminar!", objData.msg , "success");
											tableMaestro.api().ajax.reload();
											}else{
											swal("Atención!", objData.msg , "error");
										}
									}
								}
							}

						});

					}



					window.addEventListener('load', function() {
						fntCursosMaestro();
						//fntEditEstudiante();
					}, false);

		/*-------------------------------------------------------------------------------------------------*/
		// extracion de cursos para las listas
		/*-------------------------------------------------------------------------------------------------*/
					function fntCursosMaestro(){
						if(document.querySelector('#listCursoid')){
							let ajaxUrl = base_url+'/Maestro/getSelectCursos';/*:P*/
							let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
							request.open("GET",ajaxUrl,true);
							request.send();

							request.onreadystatechange = function(){
								if(request.readyState == 4 && request.status == 200){
									document.querySelector('#listCursoid').innerHTML = request.responseText;
									document.querySelector('#listCursoid').value = 1;
									$('#listCursoid').selectpicker('render');
								}
							}

						}
					}

//boton de agregar 
					function openModal()
					{
						document.querySelector('#idUsuario').value ="";
						document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
						document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
						document.querySelector('#btnText').innerHTML ="Guardar";
						document.querySelector('#titleModal').innerHTML = "Nuevo Maestro";
						document.querySelector("#formMaestro").reset();
						$('#modalFormMaestro').modal('show');/*:P*/
					}
