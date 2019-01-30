<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Area Materium Add</h3>
            </div>
            <?php echo form_open('area_materium/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="area_nombre" class="control-label">Area Nombre</label>
						<div class="form-group">
							<input type="text" name="area_nombre" value="<?php echo $this->input->post('area_nombre'); ?>" class="form-control" id="area_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="area_fechareg" class="control-label">Area Fechareg</label>
						<div class="form-group">
							<input type="text" name="area_fechareg" value="<?php echo $this->input->post('area_fechareg'); ?>" class="form-control" id="area_fechareg" />
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