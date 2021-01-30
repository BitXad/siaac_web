<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agregar Tarea</h3>
            </div>
            <?= form_open('tarea/add/'.$materia); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-8">
						<label for="tarea_titulo" class="control-label">T&iacute;tulo*</label>
						<div class="form-group">
							<input type="text" name="tarea_titulo" value="<?= $this->input->post('tarea_titulo'); ?>" class="form-control" id="tarea_titulo" required/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="tarea_fecha_entrega" class="control-label">Fecha de Entrega</label>
						<div class="form-group">
							<input type="date" name="tarea_fecha_entrega" value="<?php echo $this->input->post('tarea_fecha_entrega'); ?>" class="form-control" id="tarea_fecha_entrega" />
						</div>
					</div>
					<div class="col-md-8">
						<label for="tarea_enlace" class="control-label">Enlace</label>
						<div class="form-group">
							<input type="text" name="tarea_enlace" value="<?php echo $this->input->post('tarea_enlace'); ?>" class="form-control" id="tarea_enlace" />
						</div>
					</div>
                    <div class="col-md-4">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($estados as $estado){
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";
									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label for="tarea_descripcion" class="control-label">Descripci&oacute;n</label>
						<div class="form-group">
                            <textarea name="tarea_descripcion" value="<?php echo $this->input->post('tarea_descripcion'); ?>" class="form-control" id="tarea_descripcion" cols="30" rows="10"></textarea>
							<!-- <input type="text" name="tarea_descripcion" value="<?php echo $this->input->post('tarea_descripcion'); ?>" class="form-control" id="tarea_descripcion" /> -->
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
</div>