<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">

      $(document).ready(function () {
          $('#estudiante_nombre').keyup(function () {
             var value = $(this).val();
            var cad1 = value.substring(0,3);
             var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
            var cad = cad1+cad3;
              $('#estudiante_codigo').val(cad);
          });
      });

</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar Estudiante</h3>
            </div>
            <?php echo form_open_multipart('estudiante/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
          			<div class="col-md-6">
						<label for="estudiante_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="estudiante_nombre" value="<?php echo $this->input->post('estudiante_nombre'); ?>" class="form-control" id="estudiante_nombre" required/>
							<span class="text-danger"><?php echo form_error('estudiante_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apellidos" class="control-label"><span class="text-danger">*</span>Apellidos</label>
						<div class="form-group">
							<input type="text" name="estudiante_apellidos" value="<?php echo $this->input->post('estudiante_apellidos'); ?>" class="form-control" id="estudiante_apellidos" required/>
							<span class="text-danger"><?php echo form_error('estudiante_apellidos');?></span>
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
									$selected = ($genero['genero_id'] == $this->input->post('genero_id')) ? ' selected="selected"' : "";

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
									$selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="estudiante_fechanac" class="control-label">Fecha de Nacimiento</label>
						<div class="form-group">
							<input type="date" name="estudiante_fechanac" value="<?php echo $this->input->post('estudiante_fechanac'); ?>" class="form-control" id="estudiante_fechanac" />
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="estudiante_edad" class="control-label">Estudiante Edad</label>
						<div class="form-group">
							<input type="text" name="estudiante_edad" value="<?php echo $this->input->post('estudiante_edad'); ?>" class="form-control" id="estudiante_edad" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="estudiante_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input type="text" name="estudiante_ci" value="<?php echo $this->input->post('estudiante_ci'); ?>" class="form-control" id="estudiante_ci" required/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_extci" class="control-label">Extension</label>
						<div class="form-group">
							<select name="estudiante_extci" class="form-control"  value="<?php echo $this->input->post('estudiante_extci'); ?>" id="estudiante_extci" required>
							  <option value="">- EXTENSION -</option>
							  <option value="CBBA">CBBA</option>
							  <option value="LPZ">LPZ</option>
							  <option value="POT">POT</option>
							  <option value="ORU">ORU</option>
							  <option value="STCZ">STCZ</option>
							  <option value="BEN">BEN</option>
							  <option value="PAN">PAN</option>
							  <option value="CHQ">CHQ</option>
							  <option value=TRJ>TRJ</option>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="estudiante_codigo" value="<?php echo $this->input->post('estudiante_codigo'); ?>" class="form-control" id="estudiante_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="estudiante_direccion" value="<?php echo $this->input->post('estudiante_direccion'); ?>" class="form-control" id="estudiante_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="number" name="estudiante_telefono" value="<?php echo $this->input->post('estudiante_telefono'); ?>" class="form-control" id="estudiante_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="number" name="estudiante_celular" value="<?php echo $this->input->post('estudiante_celular'); ?>" class="form-control" id="estudiante_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="file" name="estudiante_foto" value="<?php echo $this->input->post('estudiante_foto'); ?>" class="form-control" id="estudiante_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_lugarnac" class="control-label">Lugar de Nacimiento</label>
						<div class="form-group">
							<input type="text" name="estudiante_lugarnac" value="<?php echo $this->input->post('estudiante_lugarnac'); ?>" class="form-control" id="estudiante_lugarnac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_nacionalidad" class="control-label">Nacionalidad</label>
						<div class="form-group">
							<input type="text" name="estudiante_nacionalidad" value="<?php echo $this->input->post('estudiante_nacionalidad'); ?>" class="form-control" id="estudiante_nacionalidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_establecimiento" class="control-label">Establecimiento</label>
						<div class="form-group">
							<input type="text" name="estudiante_establecimiento" value="<?php echo $this->input->post('estudiante_establecimiento'); ?>" class="form-control" id="estudiante_establecimiento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_distrito" class="control-label">Distrito</label>
						<div class="form-group">
							<input type="text" name="estudiante_distrito" value="<?php echo $this->input->post('estudiante_distrito'); ?>" class="form-control" id="estudiante_distrito" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apoderado" class="control-label">Apoderado</label>
						<div class="form-group">
							<input type="text" name="estudiante_apoderado" value="<?php echo $this->input->post('estudiante_apoderado'); ?>" class="form-control" id="estudiante_apoderado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="apoderado_foto" class="control-label">Foto de Apoderado</label>
						<div class="form-group">
							<input type="file" name="apoderado_foto" value="<?php echo $this->input->post('apoderado_foto'); ?>" class="form-control" id="apoderado_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apodireccion" class="control-label">Direccion de Apoderado</label>
						<div class="form-group">
							<input type="text" name="estudiante_apodireccion" value="<?php echo $this->input->post('estudiante_apodireccion'); ?>" class="form-control" id="estudiante_apodireccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apoparentesco" class="control-label">Parentesco Apoderado</label>
						<div class="form-group">
							<input type="text" name="estudiante_apoparentesco" value="<?php echo $this->input->post('estudiante_apoparentesco'); ?>" class="form-control" id="estudiante_apoparentesco" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_apotelefono" class="control-label">Telefono Apoderado</label>
						<div class="form-group">
							<input type="number" name="estudiante_apotelefono" value="<?php echo $this->input->post('estudiante_apotelefono'); ?>" class="form-control" id="estudiante_apotelefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_nit" class="control-label">Nit</label>
						<div class="form-group">
							<input type="text" name="estudiante_nit" value="<?php echo $this->input->post('estudiante_nit'); ?>" class="form-control" id="estudiante_nit" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estudiante_razon" class="control-label">Razon Social</label>
						<div class="form-group">
							<input type="text" name="estudiante_razon" value="<?php echo $this->input->post('estudiante_razon'); ?>" class="form-control" id="estudiante_razon" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('estudiante/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>