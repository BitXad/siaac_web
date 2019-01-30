<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Administrativo Add</h3>
            </div>
            <?php echo form_open('administrativo/add'); ?>
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
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
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
									$selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_id" class="control-label">Institucion</label>
						<div class="form-group">
							<select name="institucion_id" class="form-control">
								<option value="">select institucion</option>
								<?php 
								foreach($all_institucion as $institucion)
								{
									$selected = ($institucion['institucion_id'] == $this->input->post('institucion_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$institucion['institucion_id'].'" '.$selected.'>'.$institucion['institucion_nombre'].'</option>';
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
									$selected = ($genero['genero_id'] == $this->input->post('genero_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_nombre" class="control-label"><span class="text-danger">*</span>Administrativo Nombre</label>
						<div class="form-group">
							<input type="text" name="administrativo_nombre" value="<?php echo $this->input->post('administrativo_nombre'); ?>" class="form-control" id="administrativo_nombre" />
							<span class="text-danger"><?php echo form_error('administrativo_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_apellidos" class="control-label"><span class="text-danger">*</span>Administrativo Apellidos</label>
						<div class="form-group">
							<input type="text" name="administrativo_apellidos" value="<?php echo $this->input->post('administrativo_apellidos'); ?>" class="form-control" id="administrativo_apellidos" />
							<span class="text-danger"><?php echo form_error('administrativo_apellidos');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_fechanac" class="control-label">Administrativo Fechanac</label>
						<div class="form-group">
							<input type="text" name="administrativo_fechanac" value="<?php echo $this->input->post('administrativo_fechanac'); ?>" class="has-datepicker form-control" id="administrativo_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_edad" class="control-label">Administrativo Edad</label>
						<div class="form-group">
							<input type="text" name="administrativo_edad" value="<?php echo $this->input->post('administrativo_edad'); ?>" class="form-control" id="administrativo_edad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_ci" class="control-label">Administrativo Ci</label>
						<div class="form-group">
							<input type="text" name="administrativo_ci" value="<?php echo $this->input->post('administrativo_ci'); ?>" class="form-control" id="administrativo_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_extci" class="control-label">Administrativo Extci</label>
						<div class="form-group">
							<input type="text" name="administrativo_extci" value="<?php echo $this->input->post('administrativo_extci'); ?>" class="form-control" id="administrativo_extci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_codigo" class="control-label">Administrativo Codigo</label>
						<div class="form-group">
							<input type="text" name="administrativo_codigo" value="<?php echo $this->input->post('administrativo_codigo'); ?>" class="form-control" id="administrativo_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_direccion" class="control-label">Administrativo Direccion</label>
						<div class="form-group">
							<input type="text" name="administrativo_direccion" value="<?php echo $this->input->post('administrativo_direccion'); ?>" class="form-control" id="administrativo_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_telefono" class="control-label">Administrativo Telefono</label>
						<div class="form-group">
							<input type="text" name="administrativo_telefono" value="<?php echo $this->input->post('administrativo_telefono'); ?>" class="form-control" id="administrativo_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_celular" class="control-label">Administrativo Celular</label>
						<div class="form-group">
							<input type="text" name="administrativo_celular" value="<?php echo $this->input->post('administrativo_celular'); ?>" class="form-control" id="administrativo_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_cargo" class="control-label">Administrativo Cargo</label>
						<div class="form-group">
							<input type="text" name="administrativo_cargo" value="<?php echo $this->input->post('administrativo_cargo'); ?>" class="form-control" id="administrativo_cargo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_foto" class="control-label">Administrativo Foto</label>
						<div class="form-group">
							<input type="text" name="administrativo_foto" value="<?php echo $this->input->post('administrativo_foto'); ?>" class="form-control" id="administrativo_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_fechareg" class="control-label">Administrativo Fechareg</label>
						<div class="form-group">
							<input type="text" name="administrativo_fechareg" value="<?php echo $this->input->post('administrativo_fechareg'); ?>" class="form-control" id="administrativo_fechareg" />
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