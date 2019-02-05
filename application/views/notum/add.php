<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Notum Add</h3>
            </div>
            <?php echo form_open('notum/add'); ?>
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
						<label for="materiaasig_id" class="control-label">Materia Asignada</label>
						<div class="form-group">
							<select name="materiaasig_id" class="form-control">
								<option value="">select materia_asignada</option>
								<?php 
								foreach($all_materia_asignada as $materia_asignada)
								{
									$selected = ($materia_asignada['materiaasig_id'] == $this->input->post('materiaasig_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$materia_asignada['materiaasig_id'].'" '.$selected.'>'.$materia_asignada['materiaasig_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_aistencia" class="control-label">Nota Aistencia</label>
						<div class="form-group">
							<input type="text" name="nota_aistencia" value="<?php echo $this->input->post('nota_aistencia'); ?>" class="form-control" id="nota_aistencia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_trabinv" class="control-label">Nota Trabinv</label>
						<div class="form-group">
							<input type="text" name="nota_trabinv" value="<?php echo $this->input->post('nota_trabinv'); ?>" class="form-control" id="nota_trabinv" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_dps" class="control-label">Nota Dps</label>
						<div class="form-group">
							<input type="text" name="nota_dps" value="<?php echo $this->input->post('nota_dps'); ?>" class="form-control" id="nota_dps" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pruebprac" class="control-label">Nota Pruebprac</label>
						<div class="form-group">
							<input type="text" name="nota_pruebprac" value="<?php echo $this->input->post('nota_pruebprac'); ?>" class="form-control" id="nota_pruebprac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pruebbim" class="control-label">Nota Pruebbim</label>
						<div class="form-group">
							<input type="text" name="nota_pruebbim" value="<?php echo $this->input->post('nota_pruebbim'); ?>" class="form-control" id="nota_pruebbim" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_puntajetot" class="control-label">Nota Puntajetot</label>
						<div class="form-group">
							<input type="text" name="nota_puntajetot" value="<?php echo $this->input->post('nota_puntajetot'); ?>" class="form-control" id="nota_puntajetot" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_numbimestre" class="control-label">Nota Numbimestre</label>
						<div class="form-group">
							<input type="text" name="nota_numbimestre" value="<?php echo $this->input->post('nota_numbimestre'); ?>" class="form-control" id="nota_numbimestre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond1_mat" class="control-label">Nota Pond1 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond1_mat" value="<?php echo $this->input->post('nota_pond1_mat'); ?>" class="form-control" id="nota_pond1_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond2_mat" class="control-label">Nota Pond2 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond2_mat" value="<?php echo $this->input->post('nota_pond2_mat'); ?>" class="form-control" id="nota_pond2_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond3_mat" class="control-label">Nota Pond3 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond3_mat" value="<?php echo $this->input->post('nota_pond3_mat'); ?>" class="form-control" id="nota_pond3_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond4_mat" class="control-label">Nota Pond4 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond4_mat" value="<?php echo $this->input->post('nota_pond4_mat'); ?>" class="form-control" id="nota_pond4_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond5_mat" class="control-label">Nota Pond5 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond5_mat" value="<?php echo $this->input->post('nota_pond5_mat'); ?>" class="form-control" id="nota_pond5_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond6_mat" class="control-label">Nota Pond6 Mat</label>
						<div class="form-group">
							<input type="text" name="nota_pond6_mat" value="<?php echo $this->input->post('nota_pond6_mat'); ?>" class="form-control" id="nota_pond6_mat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_pond7_ma" class="control-label">Nota Pond7 Ma</label>
						<div class="form-group">
							<input type="text" name="nota_pond7_ma" value="<?php echo $this->input->post('nota_pond7_ma'); ?>" class="form-control" id="nota_pond7_ma" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_fec_registrada" class="control-label">Nota Fec Registrada</label>
						<div class="form-group">
							<input type="text" name="nota_fec_registrada" value="<?php echo $this->input->post('nota_fec_registrada'); ?>" class="form-control" id="nota_fec_registrada" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_bimestre" class="control-label">Nota Bimestre</label>
						<div class="form-group">
							<input type="text" name="nota_bimestre" value="<?php echo $this->input->post('nota_bimestre'); ?>" class="form-control" id="nota_bimestre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota_notafinal" class="control-label">Nota Notafinal</label>
						<div class="form-group">
							<input type="text" name="nota_notafinal" value="<?php echo $this->input->post('nota_notafinal'); ?>" class="form-control" id="nota_notafinal" />
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