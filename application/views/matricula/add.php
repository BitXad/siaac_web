<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Matricula Add</h3>
            </div>
            <?php echo form_open('matricula/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="inscripcion_id" class="control-label">Inscripcion</label>
						<div class="form-group">
							<select name="inscripcion_id" class="form-control">
								<option value="">select inscripcion</option>
								<?php 
								foreach($all_inscripcion as $inscripcion)
								{
									$selected = ($inscripcion['inscripcion_id'] == $this->input->post('inscripcion_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$inscripcion['inscripcion_id'].'" '.$selected.'>'.$inscripcion['inscripcion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_fechapago" class="control-label">Matricula Fechapago</label>
						<div class="form-group">
							<input type="text" name="matricula_fechapago" value="<?php echo $this->input->post('matricula_fechapago'); ?>" class="has-datepicker form-control" id="matricula_fechapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_horapago" class="control-label">Matricula Horapago</label>
						<div class="form-group">
							<input type="text" name="matricula_horapago" value="<?php echo $this->input->post('matricula_horapago'); ?>" class="form-control" id="matricula_horapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_fechalimite" class="control-label">Matricula Fechalimite</label>
						<div class="form-group">
							<input type="text" name="matricula_fechalimite" value="<?php echo $this->input->post('matricula_fechalimite'); ?>" class="has-datepicker form-control" id="matricula_fechalimite" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_monto" class="control-label">Matricula Monto</label>
						<div class="form-group">
							<input type="text" name="matricula_monto" value="<?php echo $this->input->post('matricula_monto'); ?>" class="form-control" id="matricula_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_descuento" class="control-label">Matricula Descuento</label>
						<div class="form-group">
							<input type="text" name="matricula_descuento" value="<?php echo $this->input->post('matricula_descuento'); ?>" class="form-control" id="matricula_descuento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="matricula_total" class="control-label">Matricula Total</label>
						<div class="form-group">
							<input type="text" name="matricula_total" value="<?php echo $this->input->post('matricula_total'); ?>" class="form-control" id="matricula_total" />
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