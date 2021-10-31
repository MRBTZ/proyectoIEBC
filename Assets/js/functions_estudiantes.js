
document.addEventListener('DOMContentLoaded', function(){
	
    if(document.querySelector("#formEstudiantes")){
        let formEstudiantes = document.querySelector("#formEstudiantes");
        formEstudiantes.onsubmit = function(e) {
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
            let ajaxUrl = base_url+'/Estudiantes/setEstudiante'; 
            let formData = new FormData(formEstudiantes);
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
                        $('#modalFormEstudiantes').modal("hide");
                        formEstudiantes.reset();
                        swal("Usuarios", objData.msg ,"success");
                        //tableUsuarios.api().ajax.reload();
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





window.addEventListener('load', function() {
    fntGradoEstudiantes();
}, false);

function fntGradoEstudiantes(){
    if(document.querySelector('#listGradoid')){
        let ajaxUrl = base_url+'/Estudiantes/getSelectGrado';
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
    document.querySelector("#formEstudiantes").reset();
    $('#modalFormEstudiantes').modal('show');
}