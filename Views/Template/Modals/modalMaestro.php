<!-- Modal -->
<div class="modal fade" id="modalFormMaestro" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Agregar Maestro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form id="formMaestro" name="formMaestro" class="form-horizontal">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					<p class="text-primary">Los campos con asterisco (<span class="required">*</span>)son abligatorios</p>
					<p class="text primary">Datos del maestro</p>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="txtIdentificacion">DPI <span class="required">*</span></label>
							<input type="text" maxlength="13" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" oninput="maxlengtNumber(this);" onkeypress="return controlTag(event);">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="txtNombre">Nombres<span class="required">*</span></label>
							<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="" onkeypress="return controlTagt(event);">
						</div>
						<div class="form-group col-md-6">
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
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="listCursoid">Curso</label>
							<select class="form-control" data-live-search="true" id="listCursoid" name="listCursoid" required >
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="listStatus">Estado</label>
							<select class="form-control selectpicker" id="listStatus" name="listStatus" required >
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="txtCodigo">Código</label>
							<input type="text" class="form-control" id="txtCodigo" name="txtCodigo" required="">
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
<div class="modal fade" id="modalViewMaestro" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header header-primary">
				<h5 class="modal-title" id="titleModal">Datos del maestro</h5>
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
							<td>Nombres:</td>
							<td id="celNombre">Jacob</td>
						</tr>
						<tr>
							<td>Apellidos:</td>
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
							<td>Código:</td>
							<td id="celCodigo">Larry</td>
						</tr>
						<tr>
							<td>Estado:</td>
							<td id="celStatus">Larry</td>
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