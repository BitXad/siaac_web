<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Plan Académico</h3>
            </div>
			<?php echo form_open('plan_academico/edit/'.$planacad['planacad_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="planacad_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="planacad_nombre" value="<?php echo ($this->input->post('planacad_nombre') ? $this->input->post('planacad_nombre') : $planacad['planacad_nombre']); ?>" class="form-control" id="planacad_nombre" />
							<span class="text-danger"><?php echo form_error('planacad_nombre');?></span>
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="planacad_feccreacion" class="control-label">Plan Academico Feccreacion</label>
						<div class="form-group">
							<input type="text" name="planacad_feccreacion" value="<?php //echo ($this->input->post('planacad_feccreacion') ? $this->input->post('planacad_feccreacion') : $planacad['planacad_feccreacion']); ?>" class="has-datepicker form-control" id="planacad_feccreacion" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="planacad_codigo" class="control-label">Código</label>
						<div class="form-group">
							<input type="text" name="planacad_codigo" value="<?php echo ($this->input->post('planacad_codigo') ? $this->input->post('planacad_codigo') : $planacad['planacad_codigo']); ?>" class="form-control" id="planacad_codigo" />
						</div>
					</div>
                                        <div class="col-md-6">
						<label for="carrera_id" class="control-label">Carrera</label>
						<div class="form-group">
							<select name="carrera_id" class="form-control">
								<option value="">select carrera</option>
								<?php 
								foreach($all_carrera as $carrera)
								{
									$selected = ($carrera['carrera_id'] == $planacad['carrera_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="planacad_titmodalidad" class="control-label">Tit. Modalidad</label>
						<div class="form-group">
							<input type="text" name="planacad_titmodalidad" value="<?php echo ($this->input->post('planacad_titmodalidad') ? $this->input->post('planacad_titmodalidad') : $planacad['planacad_titmodalidad']); ?>" class="form-control" id="planacad_titmodalidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="planacad_cantgestion" class="control-label">Cant. Gestion</label>
						<div class="form-group">
							<input type="text" name="planacad_cantgestion" value="<?php echo ($this->input->post('planacad_cantgestion') ? $this->input->post('planacad_cantgestion') : $planacad['planacad_cantgestion']); ?>" class="form-control" id="planacad_cantgestion" />
						</div>
					</div>
                                        <div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $planacad['estado_id']) ? ' selected="selected"' : "";

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
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>