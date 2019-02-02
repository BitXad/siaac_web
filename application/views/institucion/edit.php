<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Institución</h3>
            </div>
                <?php echo form_open_multipart('institucion/edit/'.$institucion['institucion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="institucion_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="institucion_nombre" value="<?php echo ($this->input->post('institucion_nombre') ? $this->input->post('institucion_nombre') : $institucion['institucion_nombre']); ?>" class="form-control" id="institucion_nombre" required />
							<span class="text-danger"><?php echo form_error('institucion_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_direccion" class="control-label">Dirección</label>
						<div class="form-group">
							<input type="text" name="institucion_direccion" value="<?php echo ($this->input->post('institucion_direccion') ? $this->input->post('institucion_direccion') : $institucion['institucion_direccion']); ?>" class="form-control" id="institucion_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_telefono" class="control-label">Teléfono</label>
						<div class="form-group">
							<input type="text" name="institucion_telefono" value="<?php echo ($this->input->post('institucion_telefono') ? $this->input->post('institucion_telefono') : $institucion['institucion_telefono']); ?>" class="form-control" id="institucion_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_fechacreacion" class="control-label">Fecha Creación</label>
						<div class="form-group">
							<input type="date" name="institucion_fechacreacion" value="<?php echo ($this->input->post('institucion_fechacreacion') ? $this->input->post('institucion_fechacreacion') : $institucion['institucion_fechacreacion']); ?>" class="form-control" id="institucion_fechacreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_logo" class="control-label">Logo</label>
						<div class="form-group">
                                                    <input type="file" name="institucion_logo" value="<?php echo ($this->input->post('institucion_logo') ? $this->input->post('institucion_logo') : $institucion['institucion_logo']); ?>" class="form-control" id="institucion_logo" accept="image/png, image/jpeg, jpg, image/gif" />
                                                    <input type="hidden" name="institucion_logo1" value="<?php echo ($this->input->post('institucion_logo') ? $this->input->post('institucion_logo') : $institucion['institucion_logo']); ?>" class="form-control" id="institucion_logo1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_ubicacion" class="control-label">Ubicación</label>
						<div class="form-group">
							<input type="text" name="institucion_ubicacion" value="<?php echo ($this->input->post('institucion_ubicacion') ? $this->input->post('institucion_ubicacion') : $institucion['institucion_ubicacion']); ?>" class="form-control" id="institucion_ubicacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_distrito" class="control-label">Distrito</label>
						<div class="form-group">
							<input type="text" name="institucion_distrito" value="<?php echo ($this->input->post('institucion_distrito') ? $this->input->post('institucion_distrito') : $institucion['institucion_distrito']); ?>" class="form-control" id="institucion_distrito" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_zona" class="control-label">Zona</label>
						<div class="form-group">
							<input type="text" name="institucion_zona" value="<?php echo ($this->input->post('institucion_zona') ? $this->input->post('institucion_zona') : $institucion['institucion_zona']); ?>" class="form-control" id="institucion_zona" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_slogan" class="control-label">Slogan</label>
						<div class="form-group">
							<input type="text" name="institucion_slogan" value="<?php echo ($this->input->post('institucion_slogan') ? $this->input->post('institucion_slogan') : $institucion['institucion_slogan']); ?>" class="form-control" id="institucion_slogan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_departamento" class="control-label">Departamento</label>
						<div class="form-group">
							<input type="text" name="institucion_departamento" value="<?php echo ($this->input->post('institucion_departamento') ? $this->input->post('institucion_departamento') : $institucion['institucion_departamento']); ?>" class="form-control" id="institucion_departamento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_codigo" class="control-label">Código</label>
						<div class="form-group">
							<input type="text" name="institucion_codigo" value="<?php echo ($this->input->post('institucion_codigo') ? $this->input->post('institucion_codigo') : $institucion['institucion_codigo']); ?>" class="form-control" id="institucion_codigo" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>Guardar
                </button>
                <a href="<?php echo site_url('institucion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>