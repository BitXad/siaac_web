<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Inscripcion Edit</h3>
            </div>
			<?php echo form_open('inscripcion/edit/'.$inscripcion['inscripcion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $inscripcion['usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
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
									$selected = ($gestion['gestion_id'] == $inscripcion['gestion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_id" class="control-label">Estudiante</label>
						<div class="form-group">
							<select name="estudiante_id" class="form-control">
								<option value="">select estudiante</option>
								<?php 
								foreach($all_estudiante as $estudiante)
								{
									$selected = ($estudiante['estudiante_id'] == $inscripcion['estudiante_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estudiante['estudiante_id'].'" '.$selected.'>'.$estudiante['estudiante_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="paralelo_id" class="control-label">Paralelo</label>
						<div class="form-group">
							<select name="paralelo_id" class="form-control">
								<option value="">select paralelo</option>
								<?php 
								foreach($all_paralelo as $paralelo)
								{
									$selected = ($paralelo['paralelo_id'] == $inscripcion['paralelo_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$paralelo['paralelo_id'].'" '.$selected.'>'.$paralelo['paralelo_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nivel_id" class="control-label">Nivel</label>
						<div class="form-group">
							<select name="nivel_id" class="form-control">
								<option value="">select nivel</option>
								<?php 
								foreach($all_nivel as $nivel)
								{
									$selected = ($nivel['nivel_id'] == $inscripcion['nivel_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$nivel['nivel_id'].'" '.$selected.'>'.$nivel['nivel_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="turno_id" class="control-label">Turno</label>
						<div class="form-group">
							<select name="turno_id" class="form-control">
								<option value="">select turno</option>
								<?php 
								foreach($all_turno as $turno)
								{
									$selected = ($turno['turno_id'] == $inscripcion['turno_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$turno['turno_id'].'" '.$selected.'>'.$turno['turno_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_fecha" class="control-label">Inscripcion Fecha</label>
						<div class="form-group">
							<input type="text" name="inscripcion_fecha" value="<?php echo ($this->input->post('inscripcion_fecha') ? $this->input->post('inscripcion_fecha') : $inscripcion['inscripcion_fecha']); ?>" class="has-datepicker form-control" id="inscripcion_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_hora" class="control-label">Inscripcion Hora</label>
						<div class="form-group">
							<input type="text" name="inscripcion_hora" value="<?php echo ($this->input->post('inscripcion_hora') ? $this->input->post('inscripcion_hora') : $inscripcion['inscripcion_hora']); ?>" class="form-control" id="inscripcion_hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_fechainicio" class="control-label">Inscripcion Fechainicio</label>
						<div class="form-group">
							<input type="text" name="inscripcion_fechainicio" value="<?php echo ($this->input->post('inscripcion_fechainicio') ? $this->input->post('inscripcion_fechainicio') : $inscripcion['inscripcion_fechainicio']); ?>" class="has-datepicker form-control" id="inscripcion_fechainicio" />
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