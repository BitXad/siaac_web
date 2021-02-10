<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Citaci&oacute;n</h3>
            </div>
            <?php echo form_open("citacion/edit/{$citacion['citacion_id']}"); ?>
            <div class="box-body">
                <div class="row clearfix">
					<div class="col-md-4">
						<label for="citacion_titulo" class="control-label">T&iacute;tulo</label>
						<div class="form-group">
							<input type="text" name="citacion_titulo" value="<?= ($this->input->post('citacion_titulo') ? $this->input->post('citacion_titulo') : $citacion['citacion_titulo']); ?>" class="form-control" id="citacion_titulo" required/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="citacion_razon" class="control-label">Raz&oacute;n</label>
						<div class="form-group">
							<input type="text" name="citacion_razon" value="<?= ($this->input->post('citacion_razon') ? $this->input->post('citacion_razon') : $citacion['citacion_razon']); ?>" class="form-control" id="citacion_razon"/>
						</div>
					</div>
					<div class="col-md-2">
						<label for="citacion_fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="date" name="citacion_fecha" value="<?= ($this->input->post('citacion_fecha') ? $this->input->post('citacion_fecha') : $citacion['citacion_fecha']); ?>" class="form-control" id="citacion_fecha"/>
						</div>
					</div>
					<div class="col-md-2">
						<label for="citacion_hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="time" name="citacion_hora" value="<?= ($this->input->post('citacion_hora') ? $this->input->post('citacion_hora') : $citacion['citacion_hora']); ?>" class="form-control" id="citacion_hora"/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_id" class="control-label">Materia</label>
						<div class="form-group">
							<!-- <input type="text" name="materia_id" value="<?php echo $this->input->post('materia_id'); ?>" class="form-control" id="materia_id" /> -->
                            <select name="materia_id" id="materia_id" class="form-control" onchange="get_estudiantes(this.value)">
                                <option value="">-MATERIA-</option>
                                <?php
                                    foreach($materias as $materia){
                                        $selected_m = ($materia['materia_id'] == $citacion['materia_id']) ? 'selected' : "";
                                        echo "<option value='{$materia['materia_id']}' $selected_m onclick='get_estudiantes({$materia['materia_id']})'>{$materia['materia_nombre']}</option>";
                                    } 
                                ?>
                            </select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="estudiante_id" class="control-label">Estudiante</label>
						<div class="form-group">
                            <select name="estudiante" id="estudiante" class="form-control">
                                <!-- <option value="">-ESTUDIANTE-</option> -->
                                <?php
                                    foreach($estudiantes as $estudiante){
                                        $selected_e = ($estudiante['estudiante_id'] == $citacion['estudiante_id']) ? 'selected' : "";
                                        echo "<option value='{$estudiante['estudiante_id']}' $selected_e>{$estudiante['estudiante_apellidos']} {$estudiante['estudiante_nombre']}</option>";
                                    } 
                                ?>
                            </select>
						</div>
					</div>
                    <div class="col-md-4">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<!-- <option value="">selecione estado</option> -->
								<?php 
								foreach($estados as $estado){
									$selected_es = (($estado['estado_id'] == $citacion['estado_id']) ? 'selected' : "");
									echo "<option value='{$estado['estado_id']}' $selected_es>{$estado['estado_descripcion']}</option>";
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label for="citacion_descripcion" class="control-label">Descripci&oacute;n</label>
						<div class="form-group">
							<!-- <input type="text" name="citacion_descripcion" value="<?php echo $this->input->post('citacion_descripcion'); ?>" class="form-control" id="citacion_descripcion"/> -->
							<textarea class="form-control" name="citacion_descripcion" id="citacion_descripcion" cols="30" rows="10"><?= ($this->input->post('citacion_descripcion') ? $this->input->post('citacion_descripcion') : $citacion['citacion_descripcion']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <script type="text/javascript">
        function get_estudiantes(materia_id){
            var base_url = document.getElementById('base_url').value;
            var controlador = base_url+'estudiantes/get_estudiantes';
        }
    </script>
</div>