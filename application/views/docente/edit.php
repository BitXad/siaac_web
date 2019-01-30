<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Docente Edit</h3>
            </div>
			<?php echo form_open('docente/edit/'.$docente['docente_id']); ?>
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
									$selected = ($estado['estado_id'] == $docente['estado_id']) ? ' selected="selected"' : "";

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
									$selected = ($genero['genero_id'] == $docente['genero_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="est_estado_id" class="control-label">Est Estado Id</label>
						<div class="form-group">
							<input type="text" name="est_estado_id" value="<?php echo ($this->input->post('est_estado_id') ? $this->input->post('est_estado_id') : $docente['est_estado_id']); ?>" class="form-control" id="est_estado_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_nombre" class="control-label">Docente Nombre</label>
						<div class="form-group">
							<input type="text" name="docente_nombre" value="<?php echo ($this->input->post('docente_nombre') ? $this->input->post('docente_nombre') : $docente['docente_nombre']); ?>" class="form-control" id="docente_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_apellidos" class="control-label">Docente Apellidos</label>
						<div class="form-group">
							<input type="text" name="docente_apellidos" value="<?php echo ($this->input->post('docente_apellidos') ? $this->input->post('docente_apellidos') : $docente['docente_apellidos']); ?>" class="form-control" id="docente_apellidos" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_fechanac" class="control-label">Docente Fechanac</label>
						<div class="form-group">
							<input type="text" name="docente_fechanac" value="<?php echo ($this->input->post('docente_fechanac') ? $this->input->post('docente_fechanac') : $docente['docente_fechanac']); ?>" class="has-datepicker form-control" id="docente_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_edad" class="control-label">Docente Edad</label>
						<div class="form-group">
							<input type="text" name="docente_edad" value="<?php echo ($this->input->post('docente_edad') ? $this->input->post('docente_edad') : $docente['docente_edad']); ?>" class="form-control" id="docente_edad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_ci" class="control-label">Docente Ci</label>
						<div class="form-group">
							<input type="text" name="docente_ci" value="<?php echo ($this->input->post('docente_ci') ? $this->input->post('docente_ci') : $docente['docente_ci']); ?>" class="form-control" id="docente_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_extci" class="control-label">Docente Extci</label>
						<div class="form-group">
							<input type="text" name="docente_extci" value="<?php echo ($this->input->post('docente_extci') ? $this->input->post('docente_extci') : $docente['docente_extci']); ?>" class="form-control" id="docente_extci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_codigo" class="control-label">Docente Codigo</label>
						<div class="form-group">
							<input type="text" name="docente_codigo" value="<?php echo ($this->input->post('docente_codigo') ? $this->input->post('docente_codigo') : $docente['docente_codigo']); ?>" class="form-control" id="docente_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_direccion" class="control-label">Docente Direccion</label>
						<div class="form-group">
							<input type="text" name="docente_direccion" value="<?php echo ($this->input->post('docente_direccion') ? $this->input->post('docente_direccion') : $docente['docente_direccion']); ?>" class="form-control" id="docente_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_telefono" class="control-label">Docente Telefono</label>
						<div class="form-group">
							<input type="text" name="docente_telefono" value="<?php echo ($this->input->post('docente_telefono') ? $this->input->post('docente_telefono') : $docente['docente_telefono']); ?>" class="form-control" id="docente_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_celular" class="control-label">Docente Celular</label>
						<div class="form-group">
							<input type="text" name="docente_celular" value="<?php echo ($this->input->post('docente_celular') ? $this->input->post('docente_celular') : $docente['docente_celular']); ?>" class="form-control" id="docente_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_titulo" class="control-label">Docente Titulo</label>
						<div class="form-group">
							<input type="text" name="docente_titulo" value="<?php echo ($this->input->post('docente_titulo') ? $this->input->post('docente_titulo') : $docente['docente_titulo']); ?>" class="form-control" id="docente_titulo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_especialidad" class="control-label">Docente Especialidad</label>
						<div class="form-group">
							<input type="text" name="docente_especialidad" value="<?php echo ($this->input->post('docente_especialidad') ? $this->input->post('docente_especialidad') : $docente['docente_especialidad']); ?>" class="form-control" id="docente_especialidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_foto" class="control-label">Docente Foto</label>
						<div class="form-group">
							<input type="text" name="docente_foto" value="<?php echo ($this->input->post('docente_foto') ? $this->input->post('docente_foto') : $docente['docente_foto']); ?>" class="form-control" id="docente_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_email" class="control-label">Docente Email</label>
						<div class="form-group">
							<input type="text" name="docente_email" value="<?php echo ($this->input->post('docente_email') ? $this->input->post('docente_email') : $docente['docente_email']); ?>" class="form-control" id="docente_email" />
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