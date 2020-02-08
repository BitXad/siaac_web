<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Area-Materia</h3>
            </div>
			<?php echo form_open('area_materium/edit/'.$area_materium['area_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="area_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="area_nombre" value="<?php echo ($this->input->post('area_nombre') ? $this->input->post('area_nombre') : $area_materium['area_nombre']); ?>" class="form-control" id="area_nombre" required/>
						</div>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('area_materium/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>