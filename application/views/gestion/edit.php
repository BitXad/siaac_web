<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Gestion</h3>
            </div>
			<?php echo form_open('gestion/edit/'.$gestion['gestion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="gestion_semestre" class="control-label">Semestre</label>
						<div class="form-group">
							<input type="text" name="gestion_semestre" value="<?php echo ($this->input->post('gestion_semestre') ? $this->input->post('gestion_semestre') : $gestion['gestion_semestre']); ?>" class="form-control" id="gestion_semestre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_inicio" class="control-label">Inicio</label>
						<div class="form-group">
							<input type="date" name="gestion_inicio" value="<?php echo ($this->input->post('gestion_inicio') ? $this->input->post('gestion_inicio') : $gestion['gestion_inicio']); ?>" class="form-control" id="gestion_inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_fin" class="control-label">Fin</label>
						<div class="form-group">
							<input type="date" name="gestion_fin" value="<?php echo ($this->input->post('gestion_fin') ? $this->input->post('gestion_fin') : $gestion['gestion_fin']); ?>" class="form-control" id="gestion_fin" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_descripcion" class="control-label">Descripcion</label>
						<div class="form-group">
							<input type="text" name="gestion_descripcion" value="<?php echo ($this->input->post('gestion_descripcion') ? $this->input->post('gestion_descripcion') : $gestion['gestion_descripcion']); ?>" class="form-control" id="gestion_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">- ESTADO -</option>
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
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
              <a href="<?php echo site_url('gestion/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>