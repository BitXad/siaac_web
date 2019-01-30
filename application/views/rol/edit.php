<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rol Edit</h3>
            </div>
			<?php echo form_open('rol/edit/'.$rol['rol_id']); ?>
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
									$selected = ($estado['estado_id'] == $rol['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rol_nombre" class="control-label"><span class="text-danger">*</span>Rol Nombre</label>
						<div class="form-group">
							<input type="text" name="rol_nombre" value="<?php echo ($this->input->post('rol_nombre') ? $this->input->post('rol_nombre') : $rol['rol_nombre']); ?>" class="form-control" id="rol_nombre" />
							<span class="text-danger"><?php echo form_error('rol_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rol_descripcion" class="control-label">Rol Descripcion</label>
						<div class="form-group">
							<input type="text" name="rol_descripcion" value="<?php echo ($this->input->post('rol_descripcion') ? $this->input->post('rol_descripcion') : $rol['rol_descripcion']); ?>" class="form-control" id="rol_descripcion" />
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