<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Material</h3>
            </div>
			<?php echo form_open('material/edit/'.$material['materialest_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
                    <div class="col-md-6">
						<label for="material_titulo" class="control-label">T&iacute;tulo</label>
						<div class="form-group">
							<input type="text" name="material_titulo" value="<?= ($this->input->post('material_titulo') ? $this->input->post('material_titulo') : $material['material_titulo']); ?>" class="form-control" id="material_titulo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="material_descripcion" class="control-label">Descripci&oacute;n</label>
						<div class="form-group">
							<input type="text" name="material_descripcion" value="<?= ($this->input->post('material_descripcion') ? $this->input->post('material_descripcion') : $material['material_descripcion']); ?>" class="form-control" id="material_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="material_enlace" class="control-label">Enlace</label>
						<div class="form-group">
							<input type="url" name="material_enlace" value="<?= ($this->input->post('material_enlace') ? $this->input->post('material_enlace') : $material['material_enlace']); ?>" class="form-control" id="material_enlace" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="material_tipo" class="control-label">Tipo</label>
						<div class="form-group">
							<input type="text" name="material_tipo" value="<?= ($this->input->post('material_tipo') ? $this->input->post('material_tipo') : $material['material_tipo']); ?>" class="form-control" id="material_tipo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="material_recomendacion" class="control-label">Recomendaci&oacute;n</label>
						<div class="form-group">
							<input type="text" name="material_recomendacion" value="<?= ($this->input->post('material_recomendacion') ? $this->input->post('material_recomendacion') : $material['material_recomendacion'] ); ?>" class="form-control" id="material_recomendacion" />
						</div>
					</div>
                    <div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
                            <select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($estados as $estado){
									$selected = ($estado['estado_id'] == $material['estado_id']) ? ' selected="selected"' : "";
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
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>