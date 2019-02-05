<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Factura Add</h3>
            </div>
            <?php echo form_open('factura/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="matricula_id" class="control-label">Matricula</label>
						<div class="form-group">
							<select name="matricula_id" class="form-control">
								<option value="">select matricula</option>
								<?php 
								foreach($all_matricula as $matricula)
								{
									$selected = ($matricula['matricula_id'] == $this->input->post('matricula_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$matricula['matricula_id'].'" '.$selected.'>'.$matricula['matricula_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mensualidad_id" class="control-label">Mensualidad</label>
						<div class="form-group">
							<select name="mensualidad_id" class="form-control">
								<option value="">select mensualidad</option>
								<?php 
								foreach($all_mensualidad as $mensualidad)
								{
									$selected = ($mensualidad['mensualidad_id'] == $this->input->post('mensualidad_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$mensualidad['mensualidad_id'].'" '.$selected.'>'.$mensualidad['mensualidad_id'].'</option>';
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