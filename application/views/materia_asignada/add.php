<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Materia Asignada Add</h3>
            </div>
            <?php echo form_open('materia_asignada/add'); ?>
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
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kardexacad_id" class="control-label">Kardexacad Id</label>
						<div class="form-group">
							<input type="text" name="kardexacad_id" value="<?php echo $this->input->post('kardexacad_id'); ?>" class="form-control" id="kardexacad_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materiaasig_nombre" class="control-label">Materiaasig Nombre</label>
						<div class="form-group">
							<input type="text" name="materiaasig_nombre" value="<?php echo $this->input->post('materiaasig_nombre'); ?>" class="form-control" id="materiaasig_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materiaasig_codigo" class="control-label">Materiaasig Codigo</label>
						<div class="form-group">
							<input type="text" name="materiaasig_codigo" value="<?php echo $this->input->post('materiaasig_codigo'); ?>" class="form-control" id="materiaasig_codigo" />
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