<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nivel Edit</h3>
            </div>
			<?php echo form_open('nivel/edit/'.$nivel['nivel_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="plan_academico_id" class="control-label">Plan Academico</label>
						<div class="form-group">
							<select name="plan_academico_id" class="form-control">
								<option value="">select plan_academico</option>
								<?php 
								foreach($all_plan_academico as $plan_academico)
								{
									$selected = ($plan_academico['plan_academico_id'] == $nivel['plan_academico_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$plan_academico['plan_academico_id'].'" '.$selected.'>'.$plan_academico['plan_academico_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nivel_descripcion" class="control-label">Nivel Descripcion</label>
						<div class="form-group">
							<input type="text" name="nivel_descripcion" value="<?php echo ($this->input->post('nivel_descripcion') ? $this->input->post('nivel_descripcion') : $nivel['nivel_descripcion']); ?>" class="form-control" id="nivel_descripcion" />
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