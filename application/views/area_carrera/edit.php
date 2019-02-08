<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Area-Carrera</h3>
            </div>
			<?php echo form_open('area_carrera/edit/'.$area_carrera['areacarrera_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="areacarrera_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
                                                    <input type="text" name="areacarrera_nombre" value="<?php echo ($this->input->post('areacarrera_nombre') ? $this->input->post('areacarrera_nombre') : $area_carrera['areacarrera_nombre']); ?>" class="form-control" id="areacarrera_nombre" required />
							<span class="text-danger"><?php echo form_error('areacarrera_nombre');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>Guardar
                </button>
                <a href="<?php echo site_url('area_carrera/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>