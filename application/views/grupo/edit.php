<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Grupo</h3>
            </div>
            <?php echo form_open('grupo/edit/'.$grupo['grupo_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <label for="carrera_id" class="control-label">Carrera:</label>
                        <div class="form-group">
                            <input type="text" name="carrera_id" id="carrera_id" value="<?php echo $all_todo['carrera_nombre']; ?>" class="form-control" readonly>
                            <!--<select name="carrera_id" id="carrera_id" class="form-control" onchange="get_planes_academicos(this.value)" disabled>
                                <option value="">- CARRERA -</option>
                                <?php 
                                /*foreach($all_carrera as $carrera)
                                {
                                    $selected = ($carrera['carrera_id'] == $all_todo['carrera_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
                                } */
                                ?>
                            </select>-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=´planacad_id" class="control-label">Plan Academico:</label>
                        <div class="form-group" id="elegirplanacad">
                            <input type="text" name="planacad_id" id="planacad_id" value="<?php echo $all_todo['planacad_nombre']; ?>" class="form-control" readonly>
                            <!--<select name="planacad_id" id="planacad_id" class="form-control">
                                <option value="">- PLAN ACADEMICO -</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=´nivel_id" class="control-label">Nivel:</label>
                        <div class="form-group" id="elegirnivel">
                            <input type="text" name="nivel_id" id="nivel_id" value="<?php echo $all_todo['nivel_descripcion']; ?>" class="form-control" readonly>
                            <!--<select name="nivel_id" id="nivel_id" class="form-control">
                                <option value="">- NIVEL -</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=´nivel_id" class="control-label">Docente:</label>
                        <div class="form-group">
                            <input type="text" name="docente_nombre" id="docente_nombre" value="<?php echo $docente['docente_nombre']." ".$docente['docente_apellidos']; ?>" class="form-control" readonly>
                            <input type="hidden" name="docente_id" id="docente_id" value="<?php echo $docente['docente_id']; ?>">
                        </div>
                        <!--<div id="horizontal">
                            <div id="fotodocente"></div>
                            <div id="contieneimg">
                                <label for="docente_id" class="control-label">Docente:</label>
                                <div style="display: inline">
                                    <select name="docente_id" id="docente_id" class="form-control" onchange="get_foto_docente(this.value); getgrupo_docente(this.value);" style="width: 200px" >
                                        <option value="">- DOCENTE -</option>
                                        <?php 
                                        /*foreach($all_docente as $docente)
                                        {
                                            $selected = ($docente['docente_id'] == $this->input->post('docente_id')) ? ' selected="selected"' : "";
                                            echo '<option value="'.$docente['docente_id'].'" '.$selected.'>'.$docente['docente_apellidos']." ".$docente['docente_nombre'].'</option>';
                                        } */
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-md-4">
                        <label for=´materia_id" class="control-label">Materia:</label>
                        <div class="form-group" id="elegirmateria">
                            <select name="materia_id" id="materia_id" class="form-control" >
                                <option value="">- MATERIA -</option>
                                <?php 
                                foreach($all_materia as $materia)
                                {
                                    $selected = ($materia['materia_id'] == $all_todo['materia_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$materia['materia_id'].'" '.$selected.'>'.$materia['materia_nombre'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=´horario_id" class="control-label">Grupo:</label>
                        <div class="form-group" id="elegirhorario">
                            <input type="text" name="grupo_nombre" id="grupo_nombre" value="<?php echo $grupo['grupo_nombre'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="dia_id" class="control-label">Dia:</label>
                        <select name="dia_id" id="dia_id" class="form-control">
                            <option value="">- DIA -</option>
                            <?php 
                            foreach($all_dia as $dia)
                            {
                                $selected = ($dia['dia_id'] == $grupo['dia_id']) ? ' selected="selected"' : "";
                                echo '<option value="'.$dia['dia_id'].'" '.$selected.'>'.$dia['dia_nombre'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="periodo_id" class="control-label">Periodo:</label>
                        <select name="periodo_id" id="periodo_id" class="form-control">
                            <option value="">- PERIODO -</option>
                            <?php 
                            foreach($all_periodo as $periodo)
                            {
                                $selected = ($periodo['periodo_id'] == $grupo['periodo_id']) ? ' selected="selected"' : "";
                                echo '<option value="'.$periodo['periodo_id'].'" '.$selected.'>'.$periodo['periodo_horainicio']." - ".$periodo['periodo_horafin'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="aula_id" class="control-label">Aula:</label>
                        <select name="aula_id" id="aula_id" class="form-control">
                            <option value="">- AULA -</option>
                            <?php 
                            foreach($all_aula as $aula)
                            {
                                $selected = ($aula['aula_id'] == $grupo['aula_id']) ? ' selected="selected"' : "";
                                echo '<option value="'.$aula['aula_id'].'" '.$selected.'>'.$aula['aula_nombre'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('grupo'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<?php if($mensaje == 1){ ?>
<script type="text/javascript">
    alert("El Horario Seleccionado ya se encuentra ocupado, por favor revise sus datos.");
</script>
<?php }else if($mensaje == 2){ ?>
<script type="text/javascript">
    alert("El Docente Seleccionado ya tiene hora y dia ocupado, por favor revise sus datos.");
</script>
<?php } ?>
