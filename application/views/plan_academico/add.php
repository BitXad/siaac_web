<script type="text/javascript">
    function cambiarcodplan(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#planacad_codigo').val(anio+mes+dia+hora+min+seg);
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Plan Académico</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcodplan();" title="genera codigo">
			<i class="fa fa-edit"></i> Generar Código
		</button>
            </div>
            <?php echo form_open('plan_academico/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="planacad_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
                                                    <input type="text" name="planacad_nombre" value="<?php echo $this->input->post('planacad_nombre'); ?>" class="form-control" id="planacad_nombre" required />
							<span class="text-danger"><?php echo form_error('planacad_nombre');?></span>
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="planacad_feccreacion" class="control-label">Plan Academico Feccreacion</label>
						<div class="form-group">
							<input type="text" name="planacad_feccreacion" value="<?php //echo $this->input->post('planacad_feccreacion'); ?>" class="has-datepicker form-control" id="planacad_feccreacion" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="planacad_codigo" class="control-label">Código</label>
						<div class="form-group">
							<input type="text" name="planacad_codigo" value="<?php echo $this->input->post('planacad_codigo'); ?>" class="form-control" id="planacad_codigo" />
						</div>
					</div>
                                        <div class="col-md-6">
                                            <label for="carrera_id" class="control-label"><span class="text-danger">*</span>Carrera</label>
						<div class="form-group">
                                                    <select name="carrera_id" class="form-control" required>
								<option value="">- CARRERA -</option>
								<?php 
								foreach($all_carrera as $carrera)
								{
									$selected = ($carrera['carrera_id'] == $this->input->post('carrera_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="planacad_titmodalidad" class="control-label">Titulo/Modalidad</label>
						<div class="form-group">
							<input type="text" name="planacad_titmodalidad" value="<?php echo $this->input->post('planacad_titmodalidad'); ?>" class="form-control" id="planacad_titmodalidad" />
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="planacad_cantgestion" class="control-label">Cant. Gestion</label>
						<div class="form-group">
							<input type="number" step="any" min="0" name="planacad_cantgestion" value="<?php //echo $this->input->post('planacad_cantgestion'); ?>" class="form-control" id="planacad_cantgestion" />
						</div>
					</div>-->
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>Guardar
            	</button>
                <a href="<?php echo site_url('plan_academico'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>