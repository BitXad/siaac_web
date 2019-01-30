<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Materia Add</h3>
            </div>
            <?php echo form_open('materia/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="area_id" class="control-label">Area Materium</label>
						<div class="form-group">
							<select name="area_id" class="form-control">
								<option value="">select area_materium</option>
								<?php 
								foreach($all_area_materia as $area_materium)
								{
									$selected = ($area_materium['area_id'] == $this->input->post('area_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$area_materium['area_id'].'" '.$selected.'>'.$area_materium['area_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nivel_id" class="control-label">Nivel</label>
						<div class="form-group">
							<select name="nivel_id" class="form-control">
								<option value="">select nivel</option>
								<?php 
								foreach($all_nivel as $nivel)
								{
									$selected = ($nivel['nivel_id'] == $this->input->post('nivel_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$nivel['nivel_id'].'" '.$selected.'>'.$nivel['nivel_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mat_materia_id" class="control-label">Materia</label>
						<div class="form-group">
							<select name="mat_materia_id" class="form-control">
								<option value="">select materia</option>
								<?php 
								foreach($all_materia as $materia)
								{
									$selected = ($materia['materia_id'] == $this->input->post('mat_materia_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$materia['materia_id'].'" '.$selected.'>'.$materia['materia_nombre'].'</option>';
								} 
								?>
							</select>
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
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_nombre" class="control-label">Materia Nombre</label>
						<div class="form-group">
							<input type="text" name="materia_nombre" value="<?php echo $this->input->post('materia_nombre'); ?>" class="form-control" id="materia_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_alias" class="control-label">Materia Alias</label>
						<div class="form-group">
							<input type="text" name="materia_alias" value="<?php echo $this->input->post('materia_alias'); ?>" class="form-control" id="materia_alias" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_codigo" class="control-label">Materia Codigo</label>
						<div class="form-group">
							<input type="text" name="materia_codigo" value="<?php echo $this->input->post('materia_codigo'); ?>" class="form-control" id="materia_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_hp" class="control-label">Materia Hp</label>
						<div class="form-group">
							<input type="text" name="materia_hp" value="<?php echo $this->input->post('materia_hp'); ?>" class="form-control" id="materia_hp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ht" class="control-label">Materia Ht</label>
						<div class="form-group">
							<input type="text" name="materia_ht" value="<?php echo $this->input->post('materia_ht'); ?>" class="form-control" id="materia_ht" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_th" class="control-label">Materia Th</label>
						<div class="form-group">
							<input type="text" name="materia_th" value="<?php echo $this->input->post('materia_th'); ?>" class="form-control" id="materia_th" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_cyp" class="control-label">Materia Cyp</label>
						<div class="form-group">
							<input type="text" name="materia_cyp" value="<?php echo $this->input->post('materia_cyp'); ?>" class="form-control" id="materia_cyp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_cys" class="control-label">Materia Cys</label>
						<div class="form-group">
							<input type="text" name="materia_cys" value="<?php echo $this->input->post('materia_cys'); ?>" class="form-control" id="materia_cys" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_vtt" class="control-label">Materia Vtt</label>
						<div class="form-group">
							<input type="text" name="materia_vtt" value="<?php echo $this->input->post('materia_vtt'); ?>" class="form-control" id="materia_vtt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ctp" class="control-label">Materia Ctp</label>
						<div class="form-group">
							<input type="text" name="materia_ctp" value="<?php echo $this->input->post('materia_ctp'); ?>" class="form-control" id="materia_ctp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa1" class="control-label">Materia Estapa1</label>
						<div class="form-group">
							<input type="text" name="materia_estapa1" value="<?php echo $this->input->post('materia_estapa1'); ?>" class="form-control" id="materia_estapa1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa2" class="control-label">Materia Estapa2</label>
						<div class="form-group">
							<input type="text" name="materia_estapa2" value="<?php echo $this->input->post('materia_estapa2'); ?>" class="form-control" id="materia_estapa2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa3" class="control-label">Materia Estapa3</label>
						<div class="form-group">
							<input type="text" name="materia_estapa3" value="<?php echo $this->input->post('materia_estapa3'); ?>" class="form-control" id="materia_estapa3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa4" class="control-label">Materia Estapa4</label>
						<div class="form-group">
							<input type="text" name="materia_estapa4" value="<?php echo $this->input->post('materia_estapa4'); ?>" class="form-control" id="materia_estapa4" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_numareas" class="control-label">Materia Numareas</label>
						<div class="form-group">
							<input type="text" name="materia_numareas" value="<?php echo $this->input->post('materia_numareas'); ?>" class="form-control" id="materia_numareas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_notainstancia" class="control-label">Materia Notainstancia</label>
						<div class="form-group">
							<input type="text" name="materia_notainstancia" value="<?php echo $this->input->post('materia_notainstancia'); ?>" class="form-control" id="materia_notainstancia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_notaaprobado" class="control-label">Materia Notaaprobado</label>
						<div class="form-group">
							<input type="text" name="materia_notaaprobado" value="<?php echo $this->input->post('materia_notaaprobado'); ?>" class="form-control" id="materia_notaaprobado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_maxima" class="control-label">Materia Maxima</label>
						<div class="form-group">
							<input type="text" name="materia_maxima" value="<?php echo $this->input->post('materia_maxima'); ?>" class="form-control" id="materia_maxima" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion1" class="control-label">Materia Calificacion1</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion1" value="<?php echo $this->input->post('materia_calificacion1'); ?>" class="form-control" id="materia_calificacion1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado1" class="control-label">Materia Ponderado1</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado1" value="<?php echo $this->input->post('materia_ponderado1'); ?>" class="form-control" id="materia_ponderado1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion2" class="control-label">Materia Calificacion2</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion2" value="<?php echo $this->input->post('materia_calificacion2'); ?>" class="form-control" id="materia_calificacion2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado2" class="control-label">Materia Ponderado2</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado2" value="<?php echo $this->input->post('materia_ponderado2'); ?>" class="form-control" id="materia_ponderado2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion3" class="control-label">Materia Calificacion3</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion3" value="<?php echo $this->input->post('materia_calificacion3'); ?>" class="form-control" id="materia_calificacion3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado3" class="control-label">Materia Ponderado3</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado3" value="<?php echo $this->input->post('materia_ponderado3'); ?>" class="form-control" id="materia_ponderado3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion4" class="control-label">Materia Calificacion4</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion4" value="<?php echo $this->input->post('materia_calificacion4'); ?>" class="form-control" id="materia_calificacion4" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado4" class="control-label">Materia Ponderado4</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado4" value="<?php echo $this->input->post('materia_ponderado4'); ?>" class="form-control" id="materia_ponderado4" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado5" class="control-label">Materia Ponderado5</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado5" value="<?php echo $this->input->post('materia_ponderado5'); ?>" class="form-control" id="materia_ponderado5" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion5" class="control-label">Materia Calificacion5</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion5" value="<?php echo $this->input->post('materia_calificacion5'); ?>" class="form-control" id="materia_calificacion5" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion6" class="control-label">Materia Calificacion6</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion6" value="<?php echo $this->input->post('materia_calificacion6'); ?>" class="form-control" id="materia_calificacion6" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado6" class="control-label">Materia Ponderado6</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado6" value="<?php echo $this->input->post('materia_ponderado6'); ?>" class="form-control" id="materia_ponderado6" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_calificacion7" class="control-label">Materia Calificacion7</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion7" value="<?php echo $this->input->post('materia_calificacion7'); ?>" class="form-control" id="materia_calificacion7" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_ponderado7" class="control-label">Materia Ponderado7</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado7" value="<?php echo $this->input->post('materia_ponderado7'); ?>" class="form-control" id="materia_ponderado7" />
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