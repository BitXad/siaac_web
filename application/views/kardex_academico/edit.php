<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kardex Academico Edit</h3>
            </div>
			<?php echo form_open('kardex_academico/edit/'.$kardex_academico['kardexacad_id']); ?>
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
									$selected = ($inscripcion['inscripcion_id'] == $kardex_academico['inscripcion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$inscripcion['inscripcion_id'].'" '.$selected.'>'.$inscripcion['inscripcion_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal1" class="control-label">Kardexacad Notfinal1</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal1" value="<?php echo ($this->input->post('kardexacad_notfinal1') ? $this->input->post('kardexacad_notfinal1') : $kardex_academico['kardexacad_notfinal1']); ?>" class="form-control" id="kardexacad_notfinal1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal2" class="control-label">Kardexacad Notfinal2</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal2" value="<?php echo ($this->input->post('kardexacad_notfinal2') ? $this->input->post('kardexacad_notfinal2') : $kardex_academico['kardexacad_notfinal2']); ?>" class="form-control" id="kardexacad_notfinal2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal3" class="control-label">Kardexacad Notfinal3</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal3" value="<?php echo ($this->input->post('kardexacad_notfinal3') ? $this->input->post('kardexacad_notfinal3') : $kardex_academico['kardexacad_notfinal3']); ?>" class="form-control" id="kardexacad_notfinal3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal4" class="control-label">Kardexacad Notfinal4</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal4" value="<?php echo ($this->input->post('kardexacad_notfinal4') ? $this->input->post('kardexacad_notfinal4') : $kardex_academico['kardexacad_notfinal4']); ?>" class="form-control" id="kardexacad_notfinal4" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal5" class="control-label">Kardexacad Notfinal5</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal5" value="<?php echo ($this->input->post('kardexacad_notfinal5') ? $this->input->post('kardexacad_notfinal5') : $kardex_academico['kardexacad_notfinal5']); ?>" class="form-control" id="kardexacad_notfinal5" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_notfinal" class="control-label">Kardexacad Notfinal</label>
						<div class="form-group">
							<input type="text" name="kardexacad_notfinal" value="<?php echo ($this->input->post('kardexacad_notfinal') ? $this->input->post('kardexacad_notfinal') : $kardex_academico['kardexacad_notfinal']); ?>" class="form-control" id="kardexacad_notfinal" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_estado" class="control-label">Kardexacad Estado</label>
						<div class="form-group">
							<input type="text" name="kardexacad_estado" value="<?php echo ($this->input->post('kardexacad_estado') ? $this->input->post('kardexacad_estado') : $kardex_academico['kardexacad_estado']); ?>" class="form-control" id="kardexacad_estado" />
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