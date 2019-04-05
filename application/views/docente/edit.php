<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">

      $(document).ready(function () {
          $('#docente_nombre').keyup(function () {
             var value = $(this).val();
            var cad1 = value.substring(0,3);
             var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
            var cad = cad1+cad3;
              $('#docente_codigo').val(cad);
          });
      });


</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Docente</h3>
            </div>
			<?php echo form_open_multipart('docente/edit/'.$docente['docente_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="docente_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="docente_nombre" value="<?php echo ($this->input->post('docente_nombre') ? $this->input->post('docente_nombre') : $docente['docente_nombre']); ?>" class="form-control" id="docente_nombre" required/>
							<input type="hidden" name="usuario_id" value="<?php echo ($this->input->post('usuario_id') ? $this->input->post('usuario_id') : $docente['usuario_id']); ?>" class="form-control" id="usuario_id" readonly/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_apellidos" class="control-label">Apellidos</label>
						<div class="form-group">
							<input type="text" name="docente_apellidos" value="<?php echo ($this->input->post('docente_apellidos') ? $this->input->post('docente_apellidos') : $docente['docente_apellidos']); ?>" class="form-control" id="docente_apellidos" required/>
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
									$selected = ($estado['estado_id'] == $docente['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
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
									$selected = ($genero['genero_id'] == $docente['genero_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$genero['genero_id'].'" '.$selected.'>'.$genero['genero_nombre'].'</option>';
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
									$selected = ($estado_civil['estadocivil_id'] == $docente['estadocivil_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_fechanac" class="control-label">Fecha de Nacimiento</label>
						<div class="form-group">
							<input type="date" name="docente_fechanac" value="<?php echo ($this->input->post('docente_fechanac') ? $this->input->post('docente_fechanac') : $docente['docente_fechanac']); ?>" class="form-control" id="docente_fechanac" required/>
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="docente_edad" class="control-label">Docente Edad</label>
						<div class="form-group">
							<input type="text" name="docente_edad" value="<?php echo ($this->input->post('docente_edad') ? $this->input->post('docente_edad') : $docente['docente_edad']); ?>" class="form-control" id="docente_edad" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="docente_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input type="text" name="docente_ci" value="<?php echo ($this->input->post('docente_ci') ? $this->input->post('docente_ci') : $docente['docente_ci']); ?>" class="form-control" id="docente_ci" required/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_extci" class="control-label">Extension</label>
						<div class="form-group">
							<select name="docente_extci" class="form-control"  value="<?php echo $this->input->post('docente_extci'); ?>" id="docente_extci" required>
							  <option value="">- EXTENSION -</option>
							  <option value="CBBA" <?php if($docente['docente_extci']=='CBBA'){ ?> selected <?php } ?>>CBBA</option>
							  <option value="LPZ" <?php if($docente['docente_extci']=='LPZ'){ ?> selected <?php } ?>>LPZ</option>
							  <option value="POT" <?php if($docente['docente_extci']=='POT'){ ?> selected <?php } ?>>POT</option>
							  <option value="ORU" <?php if($docente['docente_extci']=='ORU'){ ?> selected <?php } ?>>ORU</option>
							  <option value="STCZ" <?php if($docente['docente_extci']=='STCZ'){ ?> selected <?php } ?>>STCZ</option>
							  <option value="BEN" <?php if($docente['docente_extci']=='BEN'){ ?> selected <?php } ?>>BEN</option>
							  <option value="PAN" <?php if($docente['docente_extci']=='PAN'){ ?> selected <?php } ?>>PAN</option>
							  <option value="CHQ" <?php if($docente['docente_extci']=='CHQ'){ ?> selected <?php } ?>>CHQ</option>
							  <option value="TRJ" <?php if($docente['docente_extci']=='TRJ'){ ?> selected <?php } ?>>TRJ</option>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="docente_codigo" value="<?php echo ($this->input->post('docente_codigo') ? $this->input->post('docente_codigo') : $docente['docente_codigo']); ?>" class="form-control" id="docente_codigo"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="docente_direccion" value="<?php echo ($this->input->post('docente_direccion') ? $this->input->post('docente_direccion') : $docente['docente_direccion']); ?>" class="form-control" id="docente_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="number" name="docente_telefono" value="<?php echo ($this->input->post('docente_telefono') ? $this->input->post('docente_telefono') : $docente['docente_telefono']); ?>" class="form-control" id="docente_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="number" name="docente_celular" value="<?php echo ($this->input->post('docente_celular') ? $this->input->post('docente_celular') : $docente['docente_celular']); ?>" class="form-control" id="docente_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_titulo" class="control-label">Titulo</label>
						<div class="form-group">
							<input type="text" name="docente_titulo" value="<?php echo ($this->input->post('docente_titulo') ? $this->input->post('docente_titulo') : $docente['docente_titulo']); ?>" class="form-control" id="docente_titulo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_especialidad" class="control-label">Especialidad</label>
						<div class="form-group">
							<input type="text" name="docente_especialidad" value="<?php echo ($this->input->post('docente_especialidad') ? $this->input->post('docente_especialidad') : $docente['docente_especialidad']); ?>" class="form-control" id="docente_especialidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="file" name="docente_foto" value="<?php echo ($this->input->post('docente_foto') ? $this->input->post('docente_foto') : $docente['docente_foto']); ?>" class="form-control" id="docente_foto" accept="image/png, image/jpeg, jpg, image/gif" />
							<input type="hidden" name="docente_foto1" value="<?php echo ($this->input->post('docente_foto') ? $this->input->post('docente_foto') : $docente['docente_foto']); ?>" class="form-control" id="docente_foto1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_email" class="control-label">Email</label>
						<div class="form-group">
							<input type="email" name="docente_email" value="<?php echo ($this->input->post('docente_email') ? $this->input->post('docente_email') : $docente['docente_email']); ?>" class="form-control" id="docente_email" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('docente/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>