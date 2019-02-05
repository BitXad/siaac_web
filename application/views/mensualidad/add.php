<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Mensualidad Add</h3>
            </div>
            <?php echo form_open('mensualidad/add'); ?>
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
						<label for="kardexeco_id" class="control-label">Kardex Economico</label>
						<div class="form-group">
							<select name="kardexeco_id" class="form-control">
								<option value="">select kardex_economico</option>
								<?php 
								foreach($all_kardex_economico as $kardex_economico)
								{
									$selected = ($kardex_economico['kardexeco_id'] == $this->input->post('kardexeco_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$kardex_economico['kardexeco_id'].'" '.$selected.'>'.$kardex_economico['kardexeco_mensualidad'].'</option>';
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
									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_numero" class="control-label">Mensualidad Numero</label>
						<div class="form-group">
							<input type="text" name="mensualidad_numero" value="<?php echo $this->input->post('mensualidad_numero'); ?>" class="form-control" id="mensualidad_numero" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_montoparcial" class="control-label">Mensualidad Montoparcial</label>
						<div class="form-group">
							<input type="text" name="mensualidad_montoparcial" value="<?php echo $this->input->post('mensualidad_montoparcial'); ?>" class="form-control" id="mensualidad_montoparcial" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_descuento" class="control-label">Mensualidad Descuento</label>
						<div class="form-group">
							<input type="text" name="mensualidad_descuento" value="<?php echo $this->input->post('mensualidad_descuento'); ?>" class="form-control" id="mensualidad_descuento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_montototal" class="control-label">Mensualidad Montototal</label>
						<div class="form-group">
							<input type="text" name="mensualidad_montototal" value="<?php echo $this->input->post('mensualidad_montototal'); ?>" class="form-control" id="mensualidad_montototal" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_fechalimite" class="control-label">Mensualidad Fechalimite</label>
						<div class="form-group">
							<input type="text" name="mensualidad_fechalimite" value="<?php echo $this->input->post('mensualidad_fechalimite'); ?>" class="has-datepicker form-control" id="mensualidad_fechalimite" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_mora" class="control-label">Mensualidad Mora</label>
						<div class="form-group">
							<input type="text" name="mensualidad_mora" value="<?php echo $this->input->post('mensualidad_mora'); ?>" class="form-control" id="mensualidad_mora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_fechapago" class="control-label">Mensualidad Fechapago</label>
						<div class="form-group">
							<input type="text" name="mensualidad_fechapago" value="<?php echo $this->input->post('mensualidad_fechapago'); ?>" class="has-datepicker form-control" id="mensualidad_fechapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_horapago" class="control-label">Mensualidad Horapago</label>
						<div class="form-group">
							<input type="text" name="mensualidad_horapago" value="<?php echo $this->input->post('mensualidad_horapago'); ?>" class="form-control" id="mensualidad_horapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_nombre" class="control-label">Mensualidad Nombre</label>
						<div class="form-group">
							<input type="text" name="mensualidad_nombre" value="<?php echo $this->input->post('mensualidad_nombre'); ?>" class="form-control" id="mensualidad_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_ci" class="control-label">Mensualidad Ci</label>
						<div class="form-group">
							<input type="text" name="mensualidad_ci" value="<?php echo $this->input->post('mensualidad_ci'); ?>" class="form-control" id="mensualidad_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_glosa" class="control-label">Mensualidad Glosa</label>
						<div class="form-group">
							<input type="text" name="mensualidad_glosa" value="<?php echo $this->input->post('mensualidad_glosa'); ?>" class="form-control" id="mensualidad_glosa" />
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