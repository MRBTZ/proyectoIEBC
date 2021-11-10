<!-- Modal -->
<div class="modal fade" id="modalFormEstudiantess" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nuevo Estudiante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formEstudiantess" name="formEstudiantess" class="form-horizontal">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					<p class="text-primary">Los campos con asterisco (<span class="required">*</span>)son abligatorios</p>
					<p class="text primary">Datos del encargado</p>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="txtIdentificacion">DPI <span class="required">*</span></label>
							<input type="text" maxlength="13" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" oninput="maxlengtNumber(this);" onkeypress="return controlTag(event);">
						</div>
						<div class="form-group col-md-4">
							<label for="txtNombre">Nombres<span class="required">*</span></label>
							<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="" onkeypress="return controlTagt(event);">
						</div>
						<div class="form-group col-md-4">
							<label for="txtApellido">Apellidos<span class="required">*</span></label>
							<input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="" onkeypress="return controlTagt(event);">
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="txtTelefono">Teléfono</label>
							<input type="text" maxlength="8" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" oninput="maxlengtNumber(this);" onkeypress="return controlTag(event);">
						</div>
						<div class="form-group col-md-6">
							<label for="txtDirección">Dirección</label>
							<input type="text" class="form-control" id="txtDirección" name="txtDirección" required="">
						</div>
					</div>
					
					<hr>
					<p class="text primary">Datos del estudiantes</p>
					
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="txtNombreE">Nombres<span class="required">*</span></label>
							<input type="text" class="form-control valid validText" id="txtNombreE" name="txtNombreE" required="" onkeypress="return controlTagt(event);">
						</div>
						<div class="form-group col-md-4">
							<label for="txtApellidoE">Apellidos<span class="required">*</span></label>
							<input type="text" class="form-control valid validText" id="txtApellidoE" name="txtApellidoE" required="" onkeypress="return controlTagt(event);">
						</div>
						<div class="form-group col-md-4">
							<label for="txtFecha">Fecha Nacimiento</label>
							<input type="date" class="form-control" id="txtFecha" name="txtFecha" required="">
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="txtCiclo">Ciclo escolar</label>
							<input type="text" maxlength="4" class="form-control valid validNumber" id="txtCiclo" name="txtCiclo" required="" oninput="maxlengtNumber(this);" onkeypress="return controlTag(event);">
						</div>
						<div class="form-group col-md-5">
							<label for="listGradoid">Grado</label>
							<select class="form-control" data-live-search="true" id="listGradoid" name="listGradoid" required >
							</select>
						</div>
						<div class="form-group col-md-5">
							<label for="listPapeleria">Papeleria</label>
							<select class="form-control selectpicker" id="listPapeleria" name="listPapeleria" required >
								<option value="1">Completo</option>
								<option value="2">Incompleto</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Detalles de papeleria faltante</label>
						<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción" ></textarea>
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