<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Carrera</h3>
            </div>
			<?php echo form_open('carrera/edit/'.$carrera['carrera_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="carrera_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="carrera_nombre" value="<?php echo ($this->input->post('carrera_nombre') ? $this->input->post('carrera_nombre') : $carrera['carrera_nombre']); ?>" class="form-control" id="carrera_nombre" />
							<span class="text-danger"><?php echo form_error('carrera_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_nombreinterno" class="control-label">Nombre Interno</label>
						<div class="form-group">
							<input type="text" name="carrera_nombreinterno" value="<?php echo ($this->input->post('carrera_nombreinterno') ? $this->input->post('carrera_nombreinterno') : $carrera['carrera_nombreinterno']); ?>" class="form-control" id="carrera_nombreinterno" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
						<div class="form-group">
                                                    <input type="text" name="carrera_codigo" value="<?php echo ($this->input->post('carrera_codigo') ? $this->input->post('carrera_codigo') : $carrera['carrera_codigo']); ?>" class="form-control" id="carrera_codigo" required />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_nivel" class="control-label">Nivel</label>
						<div class="form-group">
							<input type="text" name="carrera_nivel" value="<?php echo ($this->input->post('carrera_nivel') ? $this->input->post('carrera_nivel') : $carrera['carrera_nivel']); ?>" class="form-control" id="carrera_nivel" />
						</div>
					</div>
                                        <div class="col-md-6">
						<label for="areacarrera_id" class="control-label">Area</label>
						<div class="form-group">
							<select name="areacarrera_id" class="form-control">
								<!--<option value="">select carrera</option>-->
								<?php 
								foreach($all_areacarrera as $areacarrera)
								{
									$selected = ($areacarrera['areacarrera_id'] == $carrera['areacarrera_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$areacarrera['areacarrera_id'].'" '.$selected.'>'.$areacarrera['areacarrera_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_modalidad" class="control-label">Modalidad</label>
						<div class="form-group">
							<input type="text" name="carrera_modalidad" value="<?php echo ($this->input->post('carrera_modalidad') ? $this->input->post('carrera_modalidad') : $carrera['carrera_modalidad']); ?>" class="form-control" id="carrera_modalidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_plan" class="control-label">Plan</label>
						<div class="form-group">
							<input type="text" name="carrera_plan" value="<?php echo ($this->input->post('carrera_plan') ? $this->input->post('carrera_plan') : $carrera['carrera_plan']); ?>" class="form-control" id="carrera_plan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_fechacreacion" class="control-label">Fecha Creación</label>
						<div class="form-group">
							<input type="text" name="carrera_fechacreacion" value="<?php echo ($this->input->post('carrera_fechacreacion') ? $this->input->post('carrera_fechacreacion') : $carrera['carrera_fechacreacion']); ?>" class="has-datepicker form-control" id="carrera_fechacreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_codaprod" class="control-label">Cod. A. Prod.</label>
						<div class="form-group">
							<input type="text" name="carrera_codaprod" value="<?php echo ($this->input->post('carrera_codaprod') ? $this->input->post('carrera_codaprod') : $carrera['carrera_codaprod']); ?>" class="form-control" id="carrera_codaprod" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_matricula" class="control-label">Matrícula</label>
						<div class="form-group">
							<input type="number" step="any" min="0" name="carrera_matricula" value="<?php echo ($this->input->post('carrera_matricula') ? $this->input->post('carrera_matricula') : number_format($carrera['carrera_matricula'],2)); ?>" class="form-control" id="carrera_matricula" placeholder="0.00" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_mensualidad" class="control-label">Mensualidad</label>
						<div class="form-group">
							<input type="number" step="any" min="0" name="carrera_mensualidad" value="<?php echo ($this->input->post('carrera_mensualidad') ? $this->input->post('carrera_mensualidad') : number_format($carrera['carrera_mensualidad'],2)); ?>" class="form-control" id="carrera_mensualidad" placeholder="0.00" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="carrera_nummeses" class="control-label">Num. Meses</label>
						<div class="form-group">
							<input type="number" min="0" name="carrera_nummeses" value="<?php echo ($this->input->post('carrera_nummeses') ? $this->input->post('carrera_nummeses') : $carrera['carrera_nummeses']); ?>" class="form-control" id="carrera_nummeses" placeholder="0" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>Guardar
                </button>
                <a href="<?php echo site_url('carrera'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>