<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Plan Academico Edit</h3>
            </div>
			<?php echo form_open('plan_academico/edit/'.$plan_academico['plan_academico_id']); ?>
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
									$selected = ($estado['estado_id'] == $plan_academico['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
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
									$selected = ($carrera['carrera_id'] == $plan_academico['carrera_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="plan_academico_nombre" class="control-label"><span class="text-danger">*</span>Plan Academico Nombre</label>
						<div class="form-group">
							<input type="text" name="plan_academico_nombre" value="<?php echo ($this->input->post('plan_academico_nombre') ? $this->input->post('plan_academico_nombre') : $plan_academico['plan_academico_nombre']); ?>" class="form-control" id="plan_academico_nombre" />
							<span class="text-danger"><?php echo form_error('plan_academico_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="plan_academico_feccreacion" class="control-label">Plan Academico Feccreacion</label>
						<div class="form-group">
							<input type="text" name="plan_academico_feccreacion" value="<?php echo ($this->input->post('plan_academico_feccreacion') ? $this->input->post('plan_academico_feccreacion') : $plan_academico['plan_academico_feccreacion']); ?>" class="has-datepicker form-control" id="plan_academico_feccreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="plan_academico_codigo" class="control-label">Plan Academico Codigo</label>
						<div class="form-group">
							<input type="text" name="plan_academico_codigo" value="<?php echo ($this->input->post('plan_academico_codigo') ? $this->input->post('plan_academico_codigo') : $plan_academico['plan_academico_codigo']); ?>" class="form-control" id="plan_academico_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="plan_academico_titmodalidad" class="control-label">Plan Academico Titmodalidad</label>
						<div class="form-group">
							<input type="text" name="plan_academico_titmodalidad" value="<?php echo ($this->input->post('plan_academico_titmodalidad') ? $this->input->post('plan_academico_titmodalidad') : $plan_academico['plan_academico_titmodalidad']); ?>" class="form-control" id="plan_academico_titmodalidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="plan_academico_cantgestion" class="control-label">Plan Academico Cantgestion</label>
						<div class="form-group">
							<input type="text" name="plan_academico_cantgestion" value="<?php echo ($this->input->post('plan_academico_cantgestion') ? $this->input->post('plan_academico_cantgestion') : $plan_academico['plan_academico_cantgestion']); ?>" class="form-control" id="plan_academico_cantgestion" />
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