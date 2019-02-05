<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Grupo Edit</h3>
            </div>
			<?php echo form_open('grupo/edit/'.$grupo['grupo_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="horario_id" class="control-label">Horario</label>
						<div class="form-group">
							<select name="horario_id" class="form-control">
								<option value="">select horario</option>
								<?php 
								foreach($all_horario as $horario)
								{
									$selected = ($horario['horario_id'] == $grupo['horario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$horario['horario_id'].'" '.$selected.'>'.$horario['horario_desde'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_id" class="control-label">Docente</label>
						<div class="form-group">
							<select name="docente_id" class="form-control">
								<option value="">select docente</option>
								<?php 
								foreach($all_docente as $docente)
								{
									$selected = ($docente['docente_id'] == $grupo['docente_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$docente['docente_id'].'" '.$selected.'>'.$docente['docente_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_id" class="control-label">Gestion</label>
						<div class="form-group">
							<select name="gestion_id" class="form-control">
								<option value="">select gestion</option>
								<?php 
								foreach($all_gestion as $gestion)
								{
									$selected = ($gestion['gestion_id'] == $grupo['gestion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $grupo['usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_id" class="control-label">Aula</label>
						<div class="form-group">
							<select name="aula_id" class="form-control">
								<option value="">select aula</option>
								<?php 
								foreach($all_aula as $aula)
								{
									$selected = ($aula['aula_id'] == $grupo['aula_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$aula['aula_id'].'" '.$selected.'>'.$aula['aula_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_id" class="control-label">Materia</label>
						<div class="form-group">
							<select name="materia_id" class="form-control">
								<option value="">select materia</option>
								<?php 
								foreach($all_materia as $materia)
								{
									$selected = ($materia['materia_id'] == $grupo['materia_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$materia['materia_id'].'" '.$selected.'>'.$materia['materia_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_nombre" class="control-label">Grupo Nombre</label>
						<div class="form-group">
							<input type="text" name="grupo_nombre" value="<?php echo ($this->input->post('grupo_nombre') ? $this->input->post('grupo_nombre') : $grupo['grupo_nombre']); ?>" class="form-control" id="grupo_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_descripcion" class="control-label">Grupo Descripcion</label>
						<div class="form-group">
							<input type="text" name="grupo_descripcion" value="<?php echo ($this->input->post('grupo_descripcion') ? $this->input->post('grupo_descripcion') : $grupo['grupo_descripcion']); ?>" class="form-control" id="grupo_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_horanicio" class="control-label">Grupo Horanicio</label>
						<div class="form-group">
							<input type="text" name="grupo_horanicio" value="<?php echo ($this->input->post('grupo_horanicio') ? $this->input->post('grupo_horanicio') : $grupo['grupo_horanicio']); ?>" class="form-control" id="grupo_horanicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_horafin" class="control-label">Grupo Horafin</label>
						<div class="form-group">
							<input type="text" name="grupo_horafin" value="<?php echo ($this->input->post('grupo_horafin') ? $this->input->post('grupo_horafin') : $grupo['grupo_horafin']); ?>" class="form-control" id="grupo_horafin" />
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