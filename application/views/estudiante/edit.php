<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Estudiante Edit</h3>
            </div>
			<?php echo form_open('estudiante/edit/'.$estudiante['estudiante_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $estudiante['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="genero_id" class="control-label">Genero</label>
						<div class="form-group">
							<select name="genero_id" class="form-control">
								<option value="">select genero</option>
								<?php 
								foreach($all_genero as $genero)
								{
									$selected = ($genero['genero_id'] == $estudiante['genero_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estadocivil_id" class="control-label">Estado Civil</label>
						<div class="form-group">
							<select name="estadocivil_id" class="form-control">
								<option value="">select estado_civil</option>
								<?php 
								foreach($all_estado_civil as $estado_civil)
								{
									$selected = ($estado_civil['estadocivil_id'] == $estudiante['estadocivil_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_nombre" class="control-label"><span class="text-danger">*</span>Estudiante Nombre</label>
						<div class="form-group">
							<input type="text" name="estudiante_nombre" value="<?php echo ($this->input->post('estudiante_nombre') ? $this->input->post('estudiante_nombre') : $estudiante['estudiante_nombre']); ?>" class="form-control" id="estudiante_nombre" />
							<span class="text-danger"><?php echo form_error('estudiante_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apellidos" class="control-label"><span class="text-danger">*</span>Estudiante Apellidos</label>
						<div class="form-group">
							<input type="text" name="estudiante_apellidos" value="<?php echo ($this->input->post('estudiante_apellidos') ? $this->input->post('estudiante_apellidos') : $estudiante['estudiante_apellidos']); ?>" class="form-control" id="estudiante_apellidos" />
							<span class="text-danger"><?php echo form_error('estudiante_apellidos');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_fechanac" class="control-label">Estudiante Fechanac</label>
						<div class="form-group">
							<input type="text" name="estudiante_fechanac" value="<?php echo ($this->input->post('estudiante_fechanac') ? $this->input->post('estudiante_fechanac') : $estudiante['estudiante_fechanac']); ?>" class="has-datepicker form-control" id="estudiante_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_edad" class="control-label">Estudiante Edad</label>
						<div class="form-group">
							<input type="text" name="estudiante_edad" value="<?php echo ($this->input->post('estudiante_edad') ? $this->input->post('estudiante_edad') : $estudiante['estudiante_edad']); ?>" class="form-control" id="estudiante_edad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_ci" class="control-label">Estudiante Ci</label>
						<div class="form-group">
							<input type="text" name="estudiante_ci" value="<?php echo ($this->input->post('estudiante_ci') ? $this->input->post('estudiante_ci') : $estudiante['estudiante_ci']); ?>" class="form-control" id="estudiante_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_extci" class="control-label">Estudiante Extci</label>
						<div class="form-group">
							<input type="text" name="estudiante_extci" value="<?php echo ($this->input->post('estudiante_extci') ? $this->input->post('estudiante_extci') : $estudiante['estudiante_extci']); ?>" class="form-control" id="estudiante_extci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_direccion" class="control-label">Estudiante Direccion</label>
						<div class="form-group">
							<input type="text" name="estudiante_direccion" value="<?php echo ($this->input->post('estudiante_direccion') ? $this->input->post('estudiante_direccion') : $estudiante['estudiante_direccion']); ?>" class="form-control" id="estudiante_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_telefono" class="control-label">Estudiante Telefono</label>
						<div class="form-group">
							<input type="text" name="estudiante_telefono" value="<?php echo ($this->input->post('estudiante_telefono') ? $this->input->post('estudiante_telefono') : $estudiante['estudiante_telefono']); ?>" class="form-control" id="estudiante_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_celular" class="control-label">Estudiante Celular</label>
						<div class="form-group">
							<input type="text" name="estudiante_celular" value="<?php echo ($this->input->post('estudiante_celular') ? $this->input->post('estudiante_celular') : $estudiante['estudiante_celular']); ?>" class="form-control" id="estudiante_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_foto" class="control-label">Estudiante Foto</label>
						<div class="form-group">
							<input type="text" name="estudiante_foto" value="<?php echo ($this->input->post('estudiante_foto') ? $this->input->post('estudiante_foto') : $estudiante['estudiante_foto']); ?>" class="form-control" id="estudiante_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_lugarnac" class="control-label">Estudiante Lugarnac</label>
						<div class="form-group">
							<input type="text" name="estudiante_lugarnac" value="<?php echo ($this->input->post('estudiante_lugarnac') ? $this->input->post('estudiante_lugarnac') : $estudiante['estudiante_lugarnac']); ?>" class="form-control" id="estudiante_lugarnac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_nacionalidad" class="control-label">Estudiante Nacionalidad</label>
						<div class="form-group">
							<input type="text" name="estudiante_nacionalidad" value="<?php echo ($this->input->post('estudiante_nacionalidad') ? $this->input->post('estudiante_nacionalidad') : $estudiante['estudiante_nacionalidad']); ?>" class="form-control" id="estudiante_nacionalidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_establecimiento" class="control-label">Estudiante Establecimiento</label>
						<div class="form-group">
							<input type="text" name="estudiante_establecimiento" value="<?php echo ($this->input->post('estudiante_establecimiento') ? $this->input->post('estudiante_establecimiento') : $estudiante['estudiante_establecimiento']); ?>" class="form-control" id="estudiante_establecimiento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_distrito" class="control-label">Estudiante Distrito</label>
						<div class="form-group">
							<input type="text" name="estudiante_distrito" value="<?php echo ($this->input->post('estudiante_distrito') ? $this->input->post('estudiante_distrito') : $estudiante['estudiante_distrito']); ?>" class="form-control" id="estudiante_distrito" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apoderado" class="control-label">Estudiante Apoderado</label>
						<div class="form-group">
							<input type="text" name="estudiante_apoderado" value="<?php echo ($this->input->post('estudiante_apoderado') ? $this->input->post('estudiante_apoderado') : $estudiante['estudiante_apoderado']); ?>" class="form-control" id="estudiante_apoderado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="apoderado_foto" class="control-label">Apoderado Foto</label>
						<div class="form-group">
							<input type="text" name="apoderado_foto" value="<?php echo ($this->input->post('apoderado_foto') ? $this->input->post('apoderado_foto') : $estudiante['apoderado_foto']); ?>" class="form-control" id="apoderado_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apodireccion" class="control-label">Estudiante Apodireccion</label>
						<div class="form-group">
							<input type="text" name="estudiante_apodireccion" value="<?php echo ($this->input->post('estudiante_apodireccion') ? $this->input->post('estudiante_apodireccion') : $estudiante['estudiante_apodireccion']); ?>" class="form-control" id="estudiante_apodireccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apoparentesco" class="control-label">Estudiante Apoparentesco</label>
						<div class="form-group">
							<input type="text" name="estudiante_apoparentesco" value="<?php echo ($this->input->post('estudiante_apoparentesco') ? $this->input->post('estudiante_apoparentesco') : $estudiante['estudiante_apoparentesco']); ?>" class="form-control" id="estudiante_apoparentesco" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apotelefono" class="control-label">Estudiante Apotelefono</label>
						<div class="form-group">
							<input type="text" name="estudiante_apotelefono" value="<?php echo ($this->input->post('estudiante_apotelefono') ? $this->input->post('estudiante_apotelefono') : $estudiante['estudiante_apotelefono']); ?>" class="form-control" id="estudiante_apotelefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_nit" class="control-label">Estudiante Nit</label>
						<div class="form-group">
							<input type="text" name="estudiante_nit" value="<?php echo ($this->input->post('estudiante_nit') ? $this->input->post('estudiante_nit') : $estudiante['estudiante_nit']); ?>" class="form-control" id="estudiante_nit" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_razon" class="control-label">Estudiante Razon</label>
						<div class="form-group">
							<input type="text" name="estudiante_razon" value="<?php echo ($this->input->post('estudiante_razon') ? $this->input->post('estudiante_razon') : $estudiante['estudiante_razon']); ?>" class="form-control" id="estudiante_razon" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>