<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar Aula</h3>
            </div>
            <?php echo form_open('aula/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="aula_nombre" class="control-label"><span class="text-danger">*</span>Nombre Aula</label>
						<div class="form-group">
							<input type="text" name="aula_nombre" value="<?php echo $this->input->post('aula_nombre'); ?>" class="form-control" id="aula_nombre" required/>
							<span class="text-danger"><?php echo form_error('aula_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_descripcion" class="control-label">Descripcion Aula</label>
						<div class="form-group">
							<input type="text" name="aula_descripcion" value="<?php echo $this->input->post('aula_descripcion'); ?>" class="form-control" id="aula_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_capacidad" class="control-label">Capacidad (No. limite)</label>
						<div class="form-group">
							<input type="number" name="aula_capacidad" value="<?php echo $this->input->post('aula_capacidad'); ?>" class="form-control" id="aula_capacidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aula_tipo" class="control-label">Tipo</label>
						<div class="form-group">
								<select name="aula_tipo" class="form-control" required>
								<option value="">- TIPO AULA -</option>
								<?php 
								foreach($all_tipo_aula as $tipoaula)
								{
									$selected = ($tipoaula['tipoaula_id'] == $this->input->post('tipoaula_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipoaula['tipoaula_id'].'" '.$selected.'>'.$tipoaula['tipoaula_descripcion'].'</option>';
								} 
								?>
							</select>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	 <a href="<?php echo site_url('aula/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>