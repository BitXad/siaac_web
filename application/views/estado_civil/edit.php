<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Estado Civil Edit</h3>
            </div>
			<?php echo form_open('estado_civil/edit/'.$estado_civil['estadocivil_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estadocivil_descripcion" class="control-label"><span class="text-danger">*</span>Estadocivil Descripcion</label>
						<div class="form-group">
							<input type="text" name="estadocivil_descripcion" value="<?php echo ($this->input->post('estadocivil_descripcion') ? $this->input->post('estadocivil_descripcion') : $estado_civil['estadocivil_descripcion']); ?>" class="form-control" id="estadocivil_descripcion" />
							<span class="text-danger"><?php echo form_error('estadocivil_descripcion');?></span>
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