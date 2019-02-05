<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kardex Economico Edit</h3>
            </div>
			<?php echo form_open('kardex_economico/edit/'.$kardex_economico['kardexeco_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="inscripcion_id" class="control-label">Inscripcion</label>
						<div class="form-group">
							<select name="inscripcion_id" class="form-control">
								<option value="">select inscripcion</option>
								<?php 
								foreach($all_inscripcion as $inscripcion)
								{
									$selected = ($inscripcion['inscripcion_id'] == $kardex_economico['inscripcion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$inscripcion['inscripcion_id'].'" '.$selected.'>'.$inscripcion['inscripcion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $kardex_economico['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_matricula" class="control-label">Kardexeco Matricula</label>
						<div class="form-group">
							<input type="text" name="kardexeco_matricula" value="<?php echo ($this->input->post('kardexeco_matricula') ? $this->input->post('kardexeco_matricula') : $kardex_economico['kardexeco_matricula']); ?>" class="form-control" id="kardexeco_matricula" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_mensualidad" class="control-label">Kardexeco Mensualidad</label>
						<div class="form-group">
							<input type="text" name="kardexeco_mensualidad" value="<?php echo ($this->input->post('kardexeco_mensualidad') ? $this->input->post('kardexeco_mensualidad') : $kardex_economico['kardexeco_mensualidad']); ?>" class="form-control" id="kardexeco_mensualidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_nummens" class="control-label">Kardexeco Nummens</label>
						<div class="form-group">
							<input type="text" name="kardexeco_nummens" value="<?php echo ($this->input->post('kardexeco_nummens') ? $this->input->post('kardexeco_nummens') : $kardex_economico['kardexeco_nummens']); ?>" class="form-control" id="kardexeco_nummens" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_observacion" class="control-label">Kardexeco Observacion</label>
						<div class="form-group">
							<input type="text" name="kardexeco_observacion" value="<?php echo ($this->input->post('kardexeco_observacion') ? $this->input->post('kardexeco_observacion') : $kardex_economico['kardexeco_observacion']); ?>" class="form-control" id="kardexeco_observacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_fecha" class="control-label">Kardexeco Fecha</label>
						<div class="form-group">
							<input type="text" name="kardexeco_fecha" value="<?php echo ($this->input->post('kardexeco_fecha') ? $this->input->post('kardexeco_fecha') : $kardex_economico['kardexeco_fecha']); ?>" class="has-datepicker form-control" id="kardexeco_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexeco_hora" class="control-label">Kardexeco Hora</label>
						<div class="form-group">
							<input type="text" name="kardexeco_hora" value="<?php echo ($this->input->post('kardexeco_hora') ? $this->input->post('kardexeco_hora') : $kardex_economico['kardexeco_hora']); ?>" class="form-control" id="kardexeco_hora" />
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