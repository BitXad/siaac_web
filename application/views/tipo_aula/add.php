<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Aula Add</h3>
            </div>
            <?php echo form_open('tipo_aula/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipoaula_descripcion" class="control-label">Tipoaula Descripcion</label>
						<div class="form-group">
							<input type="text" name="tipoaula_descripcion" value="<?php echo $this->input->post('tipoaula_descripcion'); ?>" class="form-control" id="tipoaula_descripcion" />
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