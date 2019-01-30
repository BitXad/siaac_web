<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Institucion Add</h3>
            </div>
            <?php echo form_open('institucion/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="institucion_nombre" class="control-label"><span class="text-danger">*</span>Institucion Nombre</label>
						<div class="form-group">
							<input type="text" name="institucion_nombre" value="<?php echo $this->input->post('institucion_nombre'); ?>" class="form-control" id="institucion_nombre" />
							<span class="text-danger"><?php echo form_error('institucion_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_direccion" class="control-label">Institucion Direccion</label>
						<div class="form-group">
							<input type="text" name="institucion_direccion" value="<?php echo $this->input->post('institucion_direccion'); ?>" class="form-control" id="institucion_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_telefono" class="control-label">Institucion Telefono</label>
						<div class="form-group">
							<input type="text" name="institucion_telefono" value="<?php echo $this->input->post('institucion_telefono'); ?>" class="form-control" id="institucion_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_fechacreacion" class="control-label">Institucion Fechacreacion</label>
						<div class="form-group">
							<input type="text" name="institucion_fechacreacion" value="<?php echo $this->input->post('institucion_fechacreacion'); ?>" class="has-datepicker form-control" id="institucion_fechacreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_logo" class="control-label">Institucion Logo</label>
						<div class="form-group">
							<input type="text" name="institucion_logo" value="<?php echo $this->input->post('institucion_logo'); ?>" class="form-control" id="institucion_logo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_ubicacion" class="control-label">Institucion Ubicacion</label>
						<div class="form-group">
							<input type="text" name="institucion_ubicacion" value="<?php echo $this->input->post('institucion_ubicacion'); ?>" class="form-control" id="institucion_ubicacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_distrito" class="control-label">Institucion Distrito</label>
						<div class="form-group">
							<input type="text" name="institucion_distrito" value="<?php echo $this->input->post('institucion_distrito'); ?>" class="form-control" id="institucion_distrito" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_zona" class="control-label">Institucion Zona</label>
						<div class="form-group">
							<input type="text" name="institucion_zona" value="<?php echo $this->input->post('institucion_zona'); ?>" class="form-control" id="institucion_zona" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_slogan" class="control-label">Institucion Slogan</label>
						<div class="form-group">
							<input type="text" name="institucion_slogan" value="<?php echo $this->input->post('institucion_slogan'); ?>" class="form-control" id="institucion_slogan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_departamento" class="control-label">Institucion Departamento</label>
						<div class="form-group">
							<input type="text" name="institucion_departamento" value="<?php echo $this->input->post('institucion_departamento'); ?>" class="form-control" id="institucion_departamento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_codigo" class="control-label">Institucion Codigo</label>
						<div class="form-group">
							<input type="text" name="institucion_codigo" value="<?php echo $this->input->post('institucion_codigo'); ?>" class="form-control" id="institucion_codigo" />
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