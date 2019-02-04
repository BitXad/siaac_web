<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">

      $(document).ready(function () {
          $('#administrativo_nombre').keyup(function () {
             var value = $(this).val();
            var cad1 = value.substring(0,3);
             var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
            var cad = cad1+cad3;
              $('#administrativo_codigo').val(cad);
          });
      });


</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Administrativo</h3>
            </div>
			<?php echo form_open_multipart('administrativo/edit/'.$administrativo['administrativo_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="administrativo_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="administrativo_nombre" value="<?php echo ($this->input->post('administrativo_nombre') ? $this->input->post('administrativo_nombre') : $administrativo['administrativo_nombre']); ?>" class="form-control" id="administrativo_nombre" />
							<span class="text-danger"><?php echo form_error('administrativo_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_apellidos" class="control-label"><span class="text-danger">*</span>Apellidos</label>
						<div class="form-group">
							<input type="text" name="administrativo_apellidos" value="<?php echo ($this->input->post('administrativo_apellidos') ? $this->input->post('administrativo_apellidos') : $administrativo['administrativo_apellidos']); ?>" class="form-control" id="administrativo_apellidos" />
							<span class="text-danger"><?php echo form_error('administrativo_apellidos');?></span>
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
									$selected = ($estado['estado_id'] == $administrativo['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estadocivil_id" class="control-label">Estado Civil</label>
						<div class="form-group">
							<select name="estadocivil_id" class="form-control">
								<option value="">- ESTADO CIVIL -</option>
								<?php 
								foreach($all_estado_civil as $estado_civil)
								{
									$selected = ($estado_civil['estadocivil_id'] == $administrativo['estadocivil_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="institucion_id" class="control-label">Institucion</label>
						<div class="form-group">
							<select name="institucion_id" class="form-control">
								<option value="">- INSTITUCION -</option>
								<?php 
								foreach($all_institucion as $institucion)
								{
									$selected = ($institucion['institucion_id'] == $administrativo['institucion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$institucion['institucion_id'].'" '.$selected.'>'.$institucion['institucion_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="genero_id" class="control-label">Genero</label>
						<div class="form-group">
							<select name="genero_id" class="form-control">
								<option value="">- GENERO -</option>
								<?php 
								foreach($all_genero as $genero)
								{
									$selected = ($genero['genero_id'] == $administrativo['genero_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_fechanac" class="control-label">Fecha de Nacimiento</label>
						<div class="form-group">
							<input type="date" name="administrativo_fechanac" value="<?php echo ($this->input->post('administrativo_fechanac') ? $this->input->post('administrativo_fechanac') : $administrativo['administrativo_fechanac']); ?>" class="form-control" id="administrativo_fechanac" />
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="administrativo_edad" class="control-label">Administrativo Edad</label>
						<div class="form-group">
							<input type="text" name="administrativo_edad" value="<?php echo ($this->input->post('administrativo_edad') ? $this->input->post('administrativo_edad') : $administrativo['administrativo_edad']); ?>" class="form-control" id="administrativo_edad" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="administrativo_ci" class="control-label">C. I.</label>
						<div class="form-group">
							<input type="text" name="administrativo_ci" value="<?php echo ($this->input->post('administrativo_ci') ? $this->input->post('administrativo_ci') : $administrativo['administrativo_ci']); ?>" class="form-control" id="administrativo_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_extci" class="control-label">Extension</label>
						<div class="form-group">
							<select name="administrativo_extci" class="form-control"  value="<?php echo $this->input->post('administrativo_extci'); ?>" id="administrativo_extci" required>
								<option value="">- EXTENSION -</option>
							  <option value="CBBA" <?php if($administrativo['administrativo_extci']=='CBBA'){ ?> selected <?php } ?>>CBBA</option>
							  <option value="LPZ" <?php if($administrativo['administrativo_extci']=='LPZ'){ ?> selected <?php } ?>>LPZ</option>
							  <option value="POT" <?php if($administrativo['administrativo_extci']=='POT'){ ?> selected <?php } ?>>POT</option>
							  <option value="ORU" <?php if($administrativo['administrativo_extci']=='ORU'){ ?> selected <?php } ?>>ORU</option>
							  <option value="STCZ" <?php if($administrativo['administrativo_extci']=='STCZ'){ ?> selected <?php } ?>>STCZ</option>
							  <option value="BEN" <?php if($administrativo['administrativo_extci']=='BEN'){ ?> selected <?php } ?>>BEN</option>
							  <option value="PAN" <?php if($administrativo['administrativo_extci']=='PAN'){ ?> selected <?php } ?>>PAN</option>
							  <option value="CHQ" <?php if($administrativo['administrativo_extci']=='CHQ'){ ?> selected <?php } ?>>CHQ</option>
							  <option value="TRJ" <?php if($administrativo['administrativo_extci']=='TRJ'){ ?> selected <?php } ?>>TRJ</option>
							</select> 

						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="administrativo_codigo" value="<?php echo ($this->input->post('administrativo_codigo') ? $this->input->post('administrativo_codigo') : $administrativo['administrativo_codigo']); ?>" class="form-control" id="administrativo_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="administrativo_direccion" value="<?php echo ($this->input->post('administrativo_direccion') ? $this->input->post('administrativo_direccion') : $administrativo['administrativo_direccion']); ?>" class="form-control" id="administrativo_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="number" name="administrativo_telefono" value="<?php echo ($this->input->post('administrativo_telefono') ? $this->input->post('administrativo_telefono') : $administrativo['administrativo_telefono']); ?>" class="form-control" id="administrativo_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="number" name="administrativo_celular" value="<?php echo ($this->input->post('administrativo_celular') ? $this->input->post('administrativo_celular') : $administrativo['administrativo_celular']); ?>" class="form-control" id="administrativo_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_cargo" class="control-label">Cargo</label>
						<div class="form-group">
							<input type="text" name="administrativo_cargo" value="<?php echo ($this->input->post('administrativo_cargo') ? $this->input->post('administrativo_cargo') : $administrativo['administrativo_cargo']); ?>" class="form-control" id="administrativo_cargo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="administrativo_foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="file" name="administrativo_foto" value="<?php echo ($this->input->post('administrativo_foto') ? $this->input->post('administrativo_foto') : $administrativo['administrativo_foto']); ?>" class="form-control" id="administrativo_foto" accept="image/png, image/jpeg, jpg, image/gif"/>
							<input type="hidden" name="administrativo_foto1" value="<?php echo ($this->input->post('administrativo_foto') ? $this->input->post('administrativo_foto') : $administrativo['administrativo_foto']); ?>" class="form-control" id="administrativo_foto1" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="administrativo_fechareg" class="control-label">Fechareg</label>
						<div class="form-group">
							<input type="text" name="administrativo_fechareg" value="<?php echo ($this->input->post('administrativo_fechareg') ? $this->input->post('administrativo_fechareg') : $administrativo['administrativo_fechareg']); ?>" class="form-control" id="administrativo_fechareg" readonly/>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('administrativo/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>