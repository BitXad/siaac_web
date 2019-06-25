<script src="http://code.jquery.com/jquery-1.0.4.js"></script>
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/materia.js'); ?>"></script>
<script>
      $(document).ready(function () {
          $("#materia_nombre").keyup(function () {
              var value = $(this).val();
              var cad1 = value.substring(0,3);
              $("#materia_alias").val(value);
              $("#materia_codigo").val(cad1);
          });
      });
</script>
<script>
	 $(document).ready(function () {
	$("#materia_notaaprobado").change(function(){
            var tot = Number($("#materia_maxima").val());
            var aproba = $(this).val();
            if (aproba > tot) {
            alert("La nota de aprobacion es mas alta que la nota total");
            }
        });
	});
</script>
<script>
      $(document).ready(function () {
        $("#materia_notainstancia").change(function(){
            var tot = Number($('#materia_maxima').val());
            var inst = $(this).val();
            if (inst > tot) {
            alert("La nota para 2da instancia es mas alta que la nota total");
            }
        });  
        });  
</script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Materia Edit</h3>
            </div>
            <?php
                $attributes = array("name" => "formulario", "id"=>"formulario", "method"=>"post");
                echo form_open('materia/edit/'.$materia['materia_id'], $attributes);
            ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
						<label for="materia_nombre" class="control-label">Materia</label>
						<div class="form-group">
							<input type="text" name="materia_nombre" value="<?php echo ($this->input->post('materia_nombre') ? $this->input->post('materia_nombre') : $materia['materia_nombre']); ?>" class="form-control" id="materia_nombre" />
							<input type="hidden" name="materia_id" value="<?php echo ($this->input->post('materia_id') ? $this->input->post('materia_id') : $materia['materia_id']); ?>" class="form-control" id="materia_id" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_alias" class="control-label">Alias</label>
						<div class="form-group">
							<input type="text" name="materia_alias" value="<?php echo ($this->input->post('materia_alias') ? $this->input->post('materia_alias') : $materia['materia_alias']); ?>" class="form-control" id="materia_alias" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="materia_codigo" value="<?php echo ($this->input->post('materia_codigo') ? $this->input->post('materia_codigo') : $materia['materia_codigo']); ?>" class="form-control" id="materia_codigo" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_horas" class="control-label">Horas por Semana</label>
						<div class="form-group">
							<input type="text" name="materia_horas" value="<?php echo ($this->input->post('materia_horas') ? $this->input->post('materia_horas') : $materia['materia_horas']); ?>" class="form-control" id="materia_horas" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="mat_materia_id" class="control-label">Pre-Requisito</label>
						<div class="form-group">
							<select name="mat_materia_id" class="form-control">
								<option value="">-SIN REQUISITO-</option>
								<?php 
								foreach($all_materia as $mate)
								{
									$selected = ($mate['materia_id'] == $materia['mat_materia_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$mate['materia_id'].'" '.$selected.'>'.$mate['materia_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<label for="area_id" class="control-label">Area</label>
						<div class="form-group">
							<select name="area_id" class="form-control">
								<option value="">-AREA-</option>
								<?php 
								foreach($all_area_materia as $area_materium)
								{
									$selected = ($area_materium['area_id'] == $materia['area_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$area_materium['area_id'].'" '.$selected.'>'.$area_materium['area_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<label for="nivel_id" class="control-label">Nivel</label>
						<div class="form-group">
							<select name="nivel_id" class="form-control">
								<option value="">-NIVEL-</option>
								<?php 
								foreach($all_nivel as $nivel)
								{
									$selected = ($nivel['nivel_id'] == $materia['nivel_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$nivel['nivel_id'].'" '.$selected.'>'.$nivel['nivel_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>

					
					<div class="col-md-3">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">-ESTADO-</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $materia['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					<div class="forma" hidden>
					<div class="col-md-6">
						<label for="materia_estapa1" class="control-label">Materia Estapa1</label>
						<div class="form-group">
							<input type="text" name="materia_estapa1" value="<?php echo ($this->input->post('materia_estapa1') ? $this->input->post('materia_estapa1') : $materia['materia_estapa1']); ?>" class="form-control" id="materia_estapa1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa2" class="control-label">Materia Estapa2</label>
						<div class="form-group">
							<input type="text" name="materia_estapa2" value="<?php echo ($this->input->post('materia_estapa2') ? $this->input->post('materia_estapa2') : $materia['materia_estapa2']); ?>" class="form-control" id="materia_estapa2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa3" class="control-label">Materia Estapa3</label>
						<div class="form-group">
							<input type="text" name="materia_estapa3" value="<?php echo ($this->input->post('materia_estapa3') ? $this->input->post('materia_estapa3') : $materia['materia_estapa3']); ?>" class="form-control" id="materia_estapa3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="materia_estapa4" class="control-label">Materia Estapa4</label>
						<div class="form-group">
							<input type="text" name="materia_estapa4" value="<?php echo ($this->input->post('materia_estapa4') ? $this->input->post('materia_estapa4') : $materia['materia_estapa4']); ?>" class="form-control" id="materia_estapa4" />
						</div>
					</div>
					</div><!-- ACA ESTA OCULTO  -->
					<div class="col-md-3">
						<label for="materia_maxima" class="control-label">Nota Total</label>
						<div class="form-group">
							<input type="number" name="materia_maxima" value="<?php echo ($this->input->post('materia_maxima') ? $this->input->post('materia_maxima') : $materia['materia_maxima']); ?>" class="form-control" id="materia_maxima" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_notaaprobado" class="control-label">Nota Min. de Aprobacion</label>
						<div class="form-group">
							<input type="number" name="materia_notaaprobado" value="<?php echo ($this->input->post('materia_notaaprobado') ? $this->input->post('materia_notaaprobado') : $materia['materia_notaaprobado']); ?>" class="form-control" id="materia_notaaprobado" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_notainstancia" class="control-label">Nota Min. 2da Instancia</label>
						<div class="form-group">
							<input type="number" name="materia_notainstancia" value="<?php echo ($this->input->post('materia_notainstancia') ? $this->input->post('materia_notainstancia') : $materia['materia_notainstancia']); ?>" class="form-control" id="materia_notainstancia" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="materia_numareas" class="control-label">Num. Areas de Calif.</label>
						<div class="form-group">
							<input type="number" name="materia_numareas" value="<?php echo ($this->input->post('materia_numareas') ? $this->input->post('materia_numareas') : $materia['materia_numareas']); ?>" class="form-control" id="materia_numareas" />
						</div>
					</div>
	</div>				
	<div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Areas de calificacion</h3>
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-plus"></i></button>
          </div>
				<div class="box-body" style="display: none;">	
					<div class="col-md-4">
						<label for="materia_calificacion1" class="control-label">Calificacion1</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion1" value="<?php echo ($this->input->post('materia_calificacion1') ? $this->input->post('materia_calificacion1') : $materia['materia_calificacion1']); ?>" class="form-control" id="materia_calificacion1" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado1" class="control-label">Ponderado1</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado1" value="<?php echo ($this->input->post('materia_ponderado1') ? $this->input->post('materia_ponderado1') : $materia['materia_ponderado1']); ?>" class="form-control" id="materia_ponderado1" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_calificacion2" class="control-label">Calificacion2</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion2" value="<?php echo ($this->input->post('materia_calificacion2') ? $this->input->post('materia_calificacion2') : $materia['materia_calificacion2']); ?>" class="form-control" id="materia_calificacion2" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado2" class="control-label">Ponderado2</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado2" value="<?php echo ($this->input->post('materia_ponderado2') ? $this->input->post('materia_ponderado2') : $materia['materia_ponderado2']); ?>" class="form-control" id="materia_ponderado2" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_calificacion3" class="control-label">Calificacion3</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion3" value="<?php echo ($this->input->post('materia_calificacion3') ? $this->input->post('materia_calificacion3') : $materia['materia_calificacion3']); ?>" class="form-control" id="materia_calificacion3" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado3" class="control-label">Ponderado3</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado3" value="<?php echo ($this->input->post('materia_ponderado3') ? $this->input->post('materia_ponderado3') : $materia['materia_ponderado3']); ?>" class="form-control" id="materia_ponderado3" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_calificacion4" class="control-label">Calificacion4</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion4" value="<?php echo ($this->input->post('materia_calificacion4') ? $this->input->post('materia_calificacion4') : $materia['materia_calificacion4']); ?>" class="form-control" id="materia_calificacion4" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado4" class="control-label">Ponderado4</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado4" value="<?php echo ($this->input->post('materia_ponderado4') ? $this->input->post('materia_ponderado4') : $materia['materia_ponderado4']); ?>" class="form-control" id="materia_ponderado4" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_calificacion5" class="control-label">Calificacion5</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion5" value="<?php echo ($this->input->post('materia_calificacion5') ? $this->input->post('materia_calificacion5') : $materia['materia_calificacion5']); ?>" class="form-control" id="materia_calificacion5" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado5" class="control-label">Ponderado5</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado5" value="<?php echo ($this->input->post('materia_ponderado5') ? $this->input->post('materia_ponderado5') : $materia['materia_ponderado5']); ?>" class="form-control" id="materia_ponderado5" />
						</div>
					</div>
					
					<div class="col-md-4">
						<label for="materia_calificacion6" class="control-label">Calificacion6</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion6" value="<?php echo ($this->input->post('materia_calificacion6') ? $this->input->post('materia_calificacion6') : $materia['materia_calificacion6']); ?>" class="form-control" id="materia_calificacion6" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado6" class="control-label">Ponderado6</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado6" value="<?php echo ($this->input->post('materia_ponderado6') ? $this->input->post('materia_ponderado6') : $materia['materia_ponderado6']); ?>" class="form-control" id="materia_ponderado6" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="materia_calificacion7" class="control-label">Calificacion7</label>
						<div class="form-group">
							<input type="text" name="materia_calificacion7" value="<?php echo ($this->input->post('materia_calificacion7') ? $this->input->post('materia_calificacion7') : $materia['materia_calificacion7']); ?>" class="form-control" id="materia_calificacion7" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="materia_ponderado7" class="control-label">Ponderado7</label>
						<div class="form-group">
							<input type="text" name="materia_ponderado7" value="<?php echo ($this->input->post('materia_ponderado7') ? $this->input->post('materia_ponderado7') : $materia['materia_ponderado7']); ?>" class="form-control" id="materia_ponderado7" />
						</div>
					</div>
				</div></div><!------C Cb COLLapse__------->
				
			</div>
			<div class="box-footer">
            	<button type="button" class="btn btn-success" onclick="actualizar()">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('materia/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>