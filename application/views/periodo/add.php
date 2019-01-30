<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Periodo Add</h3>
            </div>
            <?php echo form_open('periodo/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="periodo_nombre" class="control-label"><span class="text-danger">*</span>Periodo Nombre</label>
						<div class="form-group">
							<input type="text" name="periodo_nombre" value="<?php echo $this->input->post('periodo_nombre'); ?>" class="form-control" id="periodo_nombre" />
							<span class="text-danger"><?php echo form_error('periodo_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periodo_horainicio" class="control-label"><span class="text-danger">*</span>Periodo Horainicio</label>
						<div class="form-group">
							<input type="text" name="periodo_horainicio" value="<?php echo $this->input->post('periodo_horainicio'); ?>" class="form-control" id="periodo_horainicio" />
							<span class="text-danger"><?php echo form_error('periodo_horainicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periodo_horafin" class="control-label"><span class="text-danger">*</span>Periodo Horafin</label>
						<div class="form-group">
							<input type="text" name="periodo_horafin" value="<?php echo $this->input->post('periodo_horafin'); ?>" class="form-control" id="periodo_horafin" />
							<span class="text-danger"><?php echo form_error('periodo_horafin');?></span>
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