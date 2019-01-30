<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Horario Add</h3>
            </div>
            <?php echo form_open('horario/add'); ?>
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
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periodo_id" class="control-label">Periodo</label>
						<div class="form-group">
							<select name="periodo_id" class="form-control">
								<option value="">select periodo</option>
								<?php 
								foreach($all_periodo as $periodo)
								{
									$selected = ($periodo['periodo_id'] == $this->input->post('periodo_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$periodo['periodo_id'].'" '.$selected.'>'.$periodo['periodo_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="horario_desde" class="control-label">Horario Desde</label>
						<div class="form-group">
							<input type="text" name="horario_desde" value="<?php echo $this->input->post('horario_desde'); ?>" class="form-control" id="horario_desde" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="horario_hasta" class="control-label">Horario Hasta</label>
						<div class="form-group">
							<input type="text" name="horario_hasta" value="<?php echo $this->input->post('horario_hasta'); ?>" class="form-control" id="horario_hasta" />
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