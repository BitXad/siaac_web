<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Turno Edit</h3>
            </div>
			<?php echo form_open('turno/edit/'.$turno['turno_id']); ?>
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
									$selected = ($estado['estado_id'] == $turno['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="turno_nombre" class="control-label"><span class="text-danger">*</span>Turno Nombre</label>
						<div class="form-group">
							<input type="text" name="turno_nombre" value="<?php echo ($this->input->post('turno_nombre') ? $this->input->post('turno_nombre') : $turno['turno_nombre']); ?>" class="form-control" id="turno_nombre" />
							<span class="text-danger"><?php echo form_error('turno_nombre');?></span>
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