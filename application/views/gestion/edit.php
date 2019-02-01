<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Gestion Edit</h3>
            </div>
			<?php echo form_open('gestion/edit/'.$gestion['gestion_id']); ?>
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
									$selected = ($estado['estado_id'] == $gestion['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_semestre" class="control-label">Gestion Semestre</label>
						<div class="form-group">
							<input type="text" name="gestion_semestre" value="<?php echo ($this->input->post('gestion_semestre') ? $this->input->post('gestion_semestre') : $gestion['gestion_semestre']); ?>" class="form-control" id="gestion_semestre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_inicio" class="control-label">Gestion Inicio</label>
						<div class="form-group">
							<input type="text" name="gestion_inicio" value="<?php echo ($this->input->post('gestion_inicio') ? $this->input->post('gestion_inicio') : $gestion['gestion_inicio']); ?>" class="has-datepicker form-control" id="gestion_inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_fin" class="control-label">Gestion Fin</label>
						<div class="form-group">
							<input type="text" name="gestion_fin" value="<?php echo ($this->input->post('gestion_fin') ? $this->input->post('gestion_fin') : $gestion['gestion_fin']); ?>" class="has-datepicker form-control" id="gestion_fin" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_estado" class="control-label">Gestion Estado</label>
						<div class="form-group">
							<input type="text" name="gestion_estado" value="<?php echo ($this->input->post('gestion_estado') ? $this->input->post('gestion_estado') : $gestion['gestion_estado']); ?>" class="form-control" id="gestion_estado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_descripcion" class="control-label">Gestion Descripcion</label>
						<div class="form-group">
							<input type="text" name="gestion_descripcion" value="<?php echo ($this->input->post('gestion_descripcion') ? $this->input->post('gestion_descripcion') : $gestion['gestion_descripcion']); ?>" class="form-control" id="gestion_descripcion" />
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