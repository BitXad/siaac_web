<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Aula Add</h3>
            </div>
            <?php echo form_open('aula/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="aula_nombre" class="control-label"><span class="text-danger">*</span>Aula Nombre</label>
						<div class="form-group">
							<input type="text" name="aula_nombre" value="<?php echo $this->input->post('aula_nombre'); ?>" class="form-control" id="aula_nombre" />
							<span class="text-danger"><?php echo form_error('aula_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_descripcion" class="control-label">Aula Descripcion</label>
						<div class="form-group">
							<input type="text" name="aula_descripcion" value="<?php echo $this->input->post('aula_descripcion'); ?>" class="form-control" id="aula_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_capacidad" class="control-label">Aula Capacidad</label>
						<div class="form-group">
							<input type="text" name="aula_capacidad" value="<?php echo $this->input->post('aula_capacidad'); ?>" class="form-control" id="aula_capacidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_tipo" class="control-label">Aula Tipo</label>
						<div class="form-group">
							<input type="text" name="aula_tipo" value="<?php echo $this->input->post('aula_tipo'); ?>" class="form-control" id="aula_tipo" />
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