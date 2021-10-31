let tableEstudiantest;
//let rowTable = ""; //paremetro del actualizar
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
	
    //data tables 
	tableEstudiantest = $('#tableEstudiantest').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
        "ajax":{
            "url": " "+base_url+"/Estudiantest/getEstudiantes",/*:P*/
            "dataSrc":""
		},
        "columns":[
            //{"data":"idestudiante"},
				//{"data":"identificacion"},
					//{"data":"nombres"},
						//{"data":"apellidos"},
							
							{"data":"nombresE"},
							{"data":"apellidosE"},
							{"data":"telefono"},
							{"data":"direccion"},
							{"data":"fechaN"},
							{"data":"papeleria"},
							//{"data":"descripcionP"},
								//{"data":"grado"},
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
								"order":[[0,"asc"]]  
							});
							
							
							if(document.querySelector("#formEstudiantest")){
								let formEstudiantest = document.querySelector("#formEstudiantest");
								formEstudiantest.onsubmit = function(e) {
									e.preventDefault();
									
									let strIdentificacion = document.querySelector('#txtIdentificacion').value;
									let strNombre = document.querySelector('#txtNombre').value;
									let strApellido = document.querySelector('#txtApellido').value;
									let intTelefono = document.querySelector('#txtTelefono').value;
									let strDireccion = document.querySelector('#txtDirección').value;
									
									let strNombreE = document.querySelector('#txtNombreE').value;
									let strApellidoE = document.querySelector('#txtApellidoE').value;
									let strFechaN = document.querySelector('#txtFecha').value;
									let intCiclo = document.querySelector('#txtCiclo').value;
									let intGrado = document.querySelector('#listGradoid').value;
									let strPapeleria = document.querySelector('#listPapeleria').value;
									let strDescripcion = document.querySelector('#txtDescripcion').value;
									
									
									if(strIdentificacion == '' || strNombre == '' || strApellido == '' || strDireccion == '' || strNombreE == '' || strApellidoE == '' || intCiclo == '' || intGrado == '' || strPapeleria == '')
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
									let ajaxUrl = base_url+'/Estudiantest/setEstudiante'; /*:P*/
									let formData = new FormData(formEstudiantest);
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
												$('#modalFormEstudiantest').modal("hide");
												formEstudiantest.reset();
												swal("Usuarios", objData.msg ,"success");
												tableEstudiantest.api().ajax.reload();//recarga la tabla
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
						let ajaxUrl = base_url+'/Estudiantest/getEstudiante/'+idpersona; /*:p*/
						request.open("GET",ajaxUrl,true);
						request.send();
						request.onreadystatechange = function(){
							if(request.readyState == 4 && request.status == 200){
								let objData = JSON.parse(request.responseText);
								
								if(objData.status)
								{
									let estadoUsuario = objData.data.papeleria == 1 ? 
									'<span class="badge badge-success">Completo</span>' : 
									'<span class="badge badge-danger">Incompleto</span>';
									
									document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
									document.querySelector("#celNombre").innerHTML = objData.data.nombres;
									document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
									document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
									document.querySelector("#celDireccion").innerHTML = objData.data.direccion;
									document.querySelector("#celNombreE").innerHTML = objData.data.nombresE;
									document.querySelector("#celApellidoE").innerHTML = objData.data.apellidosE;
									document.querySelector("#celFechaN").innerHTML = objData.data.fechaN;
									document.querySelector("#celCiclo").innerHTML = objData.data.ciclo;
									document.querySelector("#celPapeleria").innerHTML = estadoUsuario;
									document.querySelector("#celDetalle").innerHTML = objData.data.descripcionP; 
									$('#modalViewEstudiantesp').modal('show');
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
						document.querySelector('#titleModal').innerHTML ="Actualizar Estudiante";
						document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
						document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
						document.querySelector('#btnText').innerHTML ="Actualizar";
						
						let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
						let ajaxUrl = base_url+'/Estudiantest/getEstudiante/'+idpersona;/*:p*/
						request.open("GET",ajaxUrl,true);
						request.send();
						request.onreadystatechange = function(){
							
							if(request.readyState == 4 && request.status == 200){
								let objData = JSON.parse(request.responseText);
								
								if(objData.status)
								{
									document.querySelector("#idUsuario").value = objData.data.idestudiante; /*:p*/
									document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
									document.querySelector("#txtNombre").value = objData.data.nombres;
									document.querySelector("#txtApellido").value = objData.data.apellidos;
									document.querySelector("#txtTelefono").value = objData.data.telefono;
									document.querySelector("#txtDirección").value = objData.data.direccion;
									
									document.querySelector("#txtNombreE").value = objData.data.nombresE;
									document.querySelector("#txtApellidoE").value = objData.data.apellidosE;
									document.querySelector("#txtFecha").value = objData.data.fechaN;
									document.querySelector("#txtCiclo").value = objData.data.ciclo;
									
									document.querySelector("#listPapeleria").value = objData.data.papeleria;
									document.querySelector("#txtDescripcion").value = objData.data.descripcionP;
									document.querySelector("#listGradoid").value =objData.data.gradoid;
									
									
									$('#listGradoid').selectpicker('render');
									
									if(objData.data.papeleria == 1){
										document.querySelector("#listPapeleria").value = 1;
										}else{
										document.querySelector("#listPapeleria").value = 2;
									}
									$('#listPapeleria').selectpicker('render');
								}
							}
							
							$('#modalFormEstudiantest').modal('show');/*:p*/
						}
					}
					
					/*-------------------------------------------------------------------------------------------------*/
					// Eliminar estudiante
					/*-------------------------------------------------------------------------------------------------*/ 
					
					function fntDelInfo(idpersona){
						swal({
							title: "Eliminar Estudiante",
							text: "¿Realmente quiere eliminar el Estudiante?",
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
								let ajaxUrl = base_url+'/Estudiantest/delEstudiante';/*:P*/
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
											tableEstudiantest.api().ajax.reload();
											}else{
											swal("Atención!", objData.msg , "error");
										}
									}
								}
							}
							
						});
						
					}
					
					
					
					window.addEventListener('load', function() {
						fntGradoEstudiantes();
						//fntEditEstudiante();
					}, false);
					
					function fntGradoEstudiantes(){
						if(document.querySelector('#listGradoid')){
							let ajaxUrl = base_url+'/Estudiantest/getSelectGrado';/*:P*/
							let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
							request.open("GET",ajaxUrl,true);
							request.send();
							
							request.onreadystatechange = function(){
								if(request.readyState == 4 && request.status == 200){
									document.querySelector('#listGradoid').innerHTML = request.responseText;
									document.querySelector('#listGradoid').value = 1;
									$('#listGradoid').selectpicker('render');
								}
							}
							
						}
					}
					
					function openModal()
					{
						document.querySelector('#idUsuario').value ="";
						document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
						document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
						document.querySelector('#btnText').innerHTML ="Guardar";
						document.querySelector('#titleModal').innerHTML = "Nuevo Estudiante";
						document.querySelector("#formEstudiantest").reset();
						$('#modalFormEstudiantest').modal('show');/*:P*/
					}										