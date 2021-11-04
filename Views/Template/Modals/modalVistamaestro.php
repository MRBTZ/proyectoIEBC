<!-- Modal -->
<div class="modal fade" id="modalFormVistaMaestro" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">QR</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formVistasMaestros" name="formEstudiantesp" class="form-horizontal">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					
						<!--extracion de los nombres de maestros-->
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="listGradoid">Maestros</label>
								<select class="form-control" data-live-search="true" id="listGradoid" name="listGradoid" required >
								</select>
							</div>
						</div>
						<!--Generador QR-->
						<br>
						<br>
						<div class="form-group">
							<label class="control-label">Generador QR</label>
							<input type="text" id="texto_usuario" name="texto_usuario" value="">
							<button type="button" id="enviar" onclick="javascript:texto_usuario();">Generar QR</button>
							<br clear="all"><br clear="all">
							<div id="cont_img">
								
							</div>
						</div>

	

					<div class="tile-footer">
						<button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>


<!-- Modal de visualizacion-->
<div class="modal fade" id="modalViewEstudiantesp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header header-primary">
				<h5 class="modal-title" id="titleModal">Datos de Estudiantes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Identificación:</td>
							<td id="celIdentificacion">654654654</td>
						</tr>
						<tr>
							<td>Nombres Encargado:</td>
							<td id="celNombre">Jacob</td>
						</tr>
						<tr>
							<td>Apellidos Encargado:</td>
							<td id="celApellido">Jacob</td>
						</tr>
						<tr>
							<td>Teléfono:</td>
							<td id="celTelefono">Larry</td>
						</tr>
						<tr>
							<td>Direccioón:</td>
							<td id="celDireccion">Larry</td>
						</tr>
						<tr>
							<td>Nombres Estudiante:</td>
							<td id="celNombreE">Jacob</td>
						</tr>
						<tr>
							<td>Apellidos Estudiante:</td>
							<td id="celApellidoE">Jacob</td>
						</tr>
						<tr>
							<td>Fecha de Nacimiento:</td>
							<td id="celFechaN">Larry</td>
						</tr>
						<tr>
							<td>Ciclo:</td>
							<td id="celCiclo">Larry</td>
						</tr>
						<tr>
							<td>Papeleria:</td>
							<td id="celPapeleria">Larry</td>
						</tr>
						<tr>
							<td>Detalle de papeleria</td>
							<td id="celDetalle">Larry</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>