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
              	<h3 class="box-title">Registrar Docente</h3>
            </div>
            <?php echo form_open('docente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<!--<div class="col-md-6">
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
					</div>-->
					
					<div class="col-md-6">
						<label for="docente_nombre" class="control-label">Nombre *</label>
						<div class="form-group">
							<input type="text" name="docente_nombre" value="<?php echo $this->input->post('docente_nombre'); ?>" class="form-control" id="docente_nombre" required/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_apellidos" class="control-label">Apellidos *</label>
						<div class="form-group">
							<input type="text" name="docente_apellidos" value="<?php echo $this->input->post('docente_apellidos'); ?>" class="form-control" id="docente_apellidos" required/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="genero_id" class="control-label">Genero</label>
						<div class="form-group">
							<select name="genero_id" class="form-control">
								<option value="">select genero</option>
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
						<label for="docente_fechanac" class="control-label">Fecha Nacimiento</label>
						<div class="form-group">
							<input type="date" name="docente_fechanac" value="<?php echo $this->input->post('docente_fechanac'); ?>" class=" form-control" id="docente_fechanac" required/>
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="docente_edad" class="control-label">Docente Edad</label>
						<div class="form-group">
							<input type="text" name="docente_edad" value="<?php echo $this->input->post('docente_edad'); ?>" class="form-control" id="docente_edad" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="docente_ci" class="control-label">Docente Ci</label>
						<div class="form-group">
							<input type="text" name="docente_ci" value="<?php echo $this->input->post('docente_ci'); ?>" class="form-control" id="docente_ci" required/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_extci" class="control-label">Extension CI</label>
						<div class="form-group">
							<select name="docente_extci" class="form-control"  value="<?php echo $this->input->post('docente_extci'); ?>" id="docente_extci" required>
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
						<label for="docente_codigo" class="control-label">Docente Codigo</label>
						<div class="form-group">
							<input type="text" name="docente_codigo" value="<?php echo $this->input->post('docente_codigo'); ?>" class="form-control" id="docente_codigo" readonly/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_direccion" class="control-label">Docente Direccion</label>
						<div class="form-group">
							<input type="text" name="docente_direccion" value="<?php echo $this->input->post('docente_direccion'); ?>" class="form-control" id="docente_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_telefono" class="control-label">Docente Telefono</label>
						<div class="form-group">
							<input type="number" name="docente_telefono" value="<?php echo $this->input->post('docente_telefono'); ?>" class="form-control" id="docente_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_celular" class="control-label">Docente Celular</label>
						<div class="form-group">
							<input type="number" name="docente_celular" value="<?php echo $this->input->post('docente_celular'); ?>" class="form-control" id="docente_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_titulo" class="control-label">Docente Titulo</label>
						<div class="form-group">
							<input type="text" name="docente_titulo" value="<?php echo $this->input->post('docente_titulo'); ?>" class="form-control" id="docente_titulo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_especialidad" class="control-label">Docente Especialidad</label>
						<div class="form-group">
							<input type="text" name="docente_especialidad" value="<?php echo $this->input->post('docente_especialidad'); ?>" class="form-control" id="docente_especialidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_foto" class="control-label">Docente Foto</label>
						<div class="form-group">
							<input type="file" name="docente_foto" value="<?php echo $this->input->post('docente_foto'); ?>" class="form-control" id="docente_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="docente_email" class="control-label">Docente Email</label>
						<div class="form-group">
							<input type="email" name="docente_email" value="<?php echo $this->input->post('docente_email'); ?>" class="form-control" id="docente_email" />
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