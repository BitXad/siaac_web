<script type="text/javascript">
    function reflejarnombre(){
        var estenombre = $('#carrera_nombre').val();
        $('#carrera_nombreinterno').val(estenombre);
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Carrera</h3>
            </div>
            <?php echo form_open('carrera/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class='col-md-6'>
                        <label for='carrera_nombre' class='control-label'><span class="text-danger">*</span>Nombre</label>
                        <div class='form-group'>
                            <input type='text' name='carrera_nombre' class='form-control' id='carrera_nombre' required autocomplete="off" onchange="reflejarnombre()" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <label for='carrera_nombreinterno' class='control-label'>Nombre Interno</label>
                        <div class='form-group'>
                            <input type='text' name='carrera_nombreinterno' class='form-control' id='carrera_nombreinterno' autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" onclick="this.select();" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="carrera_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                        <div class="form-group">
                            <input type="text" name="carrera_codigo" value="<?php echo $this->input->post('carrera_codigo'); ?>" class="form-control" id="carrera_codigo" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="carrera_nivel" class="control-label">Nivel de Formación</label>
                        <div class="form-group">
                            <input type="text" name="carrera_nivel" value="<?php echo $this->input->post('carrera_nivel'); ?>" class="form-control" id="carrera_nivel" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="areacarrera_id" class="control-label"><span class="text-danger">*</span>Area</label>
                        <div class="form-group">
                            <select name="areacarrera_id" class="form-control" id="areacarrera_id" required>
                                <option value="">- AREA -</option>
                                <?php 
                                foreach($all_areacarrera as $areacarrera)
                                {
                                    $selected = ($areacarrera['areacarrera_id'] == $this->input->post('areacarrera_id')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$areacarrera['areacarrera_id'].'" '.$selected.'>'.$areacarrera['areacarrera_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_plan" class="control-label">Plan</label>
                        <div class="form-group">
                            <input type="text" name="carrera_plan" value="<?php echo $this->input->post('carrera_plan'); ?>" class="form-control" id="carrera_plan" placeholder="Semestral, Anual...." onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_modalidad" class="control-label">Modalidad</label>
                        <div class="form-group">
                            <input type="text" name="carrera_modalidad" value="<?php echo $this->input->post('carrera_modalidad'); ?>" class="form-control" id="carrera_modalidad" placeholder="Modular, Bimestral, Trimestral...." onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_tiempoestudio" class="control-label">Tiempo de Estudio</label>
                        <div class="form-group">
                            <input type="text" name="carrera_tiempoestudio" value="<?php echo $this->input->post('carrera_tiempoestudio'); ?>" class="form-control" id="carrera_tiempoestudio" placeholder="N Semestres, N Años..." onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="carrera_cargahoraria" class="control-label">Carga Horaria</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="carrera_cargahoraria" value="<?php echo $this->input->post('carrera_cargahoraria'); ?>" class="form-control" id="carrera_cargahoraria" placeholder="0" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="carrera_fechacreacion" class="control-label">Fecha Creación</label>
                        <div class="form-group">
                            <input type="date" name="carrera_fechacreacion" value="<?php echo $this->input->post('carrera_fechacreacion'); ?>" class="form-control" id="carrera_fechacreacion" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_matricula" class="control-label">Matrícula</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="carrera_matricula" value="<?php echo $this->input->post('carrera_matricula'); ?>" class="form-control" id="carrera_matricula" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_mensualidad" class="control-label">Mensualidad</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="carrera_mensualidad" value="<?php echo $this->input->post('carrera_mensualidad'); ?>" class="form-control" id="carrera_mensualidad" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="carrera_nummeses" class="control-label">Nro. Mensualidad</label>
                        <div class="form-group">
                            <input type="number" min="0" name="carrera_nummeses" value="<?php echo $this->input->post('carrera_nummeses'); ?>" class="form-control" id="carrera_nummeses" placeholder="0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
            	    <i class="fa fa-check"></i>Guardar
            	</button>
                <a href="<?php echo site_url('carrera'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>