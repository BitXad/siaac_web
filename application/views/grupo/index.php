<script src="<?php echo base_url('resources/js/grupo.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<style type="text/css">
    #contieneimg{
        
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    /*#masg{
        font-size: 12px;
    }
    td div div{
        
    }*/
</style>
<script type="text/javascript">
    
function toggle(source) {
  checkboxes = document.getElementsByClassName('checkbox');
  
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
    
  }
    if(checkboxes[0].checked == true){
        $(".periodoselect").each(function(){
        	    $(this).prop('disabled', false)
        	});
        
        $(".aulaselect").each(function(){
        	    $(this).prop('disabled', false)
        	});

        $(".docenteselect").each(function(){
        	    $(this).prop('disabled', false)
        	});
        //$('#horario_id').prop('disabled', false);
    }else{
        $(".periodoselect").each(function(){
        	    $(this).prop('disabled', true)
        	});
        $(".aulaselect").each(function(){
        	    $(this).prop('disabled', true)
        	});
        $(".docenteselect").each(function(){
        	    $(this).prop('disabled', true)
        	});
        //$('#horario_id').prop('disabled', true);
    }
    
}

function sel_individual(source, dia_id) {
    estecheck = document.getElementById(dia_id); //.checked
    estecheck.checked = source.checked;
  
    if(estecheck.checked == true){
        $('#periodo_id'+dia_id).prop('disabled', false);
        $('#aula_id'+dia_id).prop('disabled', false);
        $('#docente_id'+dia_id).prop('disabled', false);
    }else{
         $('#periodo_id'+dia_id).prop('disabled', true);
        $('#aula_id'+dia_id).prop('disabled', true);
        $('#docente_id'+dia_id).prop('disabled', true);
    }
}
</script>
<div class="box-header" style="padding-left: 0px">
    <!--<h3 class="box-title">Grupo Listing</h3>-->
    <div class="col-md-12">
        <div class="col-md-4">
            <label for="carrera_id" class="control-label">Carrera:</label>
            <div class="form-group">
                <select name="carrera_id" id="carrera_id" class="form-control" onchange="get_planes_academicos(this.value)">
                    <option value="">- CARRERA -</option>
                    <?php 
                    foreach($all_carrera as $carrera)
                    {
                        $selected = ($carrera['carrera_id'] == $this->input->post('carrera_id')) ? ' selected="selected"' : "";
                        echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for=´planacad_id" class="control-label">Plan Academico:</label>
            <div class="form-group" id="elegirplanacad">
                <select name="planacad_id" id="planacad_id" class="form-control">
                    <option value="">- PLAN ACADEMICO -</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="nivel_id" class="control-label">Nivel:</label>
            <div class="form-group" id="elegirnivel">
                <select name="nivel_id" id="nivel_id" class="form-control">
                    <option value="">- NIVEL -</option>
                </select>
            </div>
        </div>
        <!----------
        <div class="col-md-4">
            <div id="horizontal">
                <div id="fotodocente"></div>
                <div id="contieneimg">
                    <label for="docente_id" class="control-label">Docente:</label>
                    <div style="display: inline">
                        <select name="docente_id" id="docente_id" class="form-control" onchange="get_foto_docente(this.value); getgrupo_docente(this.value);" style="width: 200px" >
                            <option value="">- DOCENTE -</option>
                            <?php 
                            foreach($all_docente as $docente)
                            {
                                $selected = ($docente['docente_id'] == $this->input->post('docente_id')) ? ' selected="selected"' : "";
                                echo '<option value="'.$docente['docente_id'].'" '.$selected.'>'.$docente['docente_apellidos']." ".$docente['docente_nombre'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        ---------->
        
        <div class="col-md-4">
            <label for=´materia_id" class="control-label">Materia:</label>
            <div class="form-group" id="elegirmateria">
                <select name="materia_id" id="materia_id" class="form-control">
                    <option value="">- MATERIA -</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for=´horario_id" class="control-label">Grupo:</label>
            <div class="form-group" id="elegirhorario">
                <input type="text" name="grupo_nombre" id="grupo_nombre" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!--<div class="col-md-12">-->
            <label for="dias_visita" class="control-label"></label><input type="checkbox" id="select_all" onClick="toggle(this)" /> Todos
            <div  class="form-group table-responsive">
                <?php 
                foreach($all_dia as $dia)
                { ?>
                <div class="col-md-2">
                <label><?php echo $dia['dia_nombre']; ?><input class="checkbox checkdia" type="checkbox" name="<?php echo $dia['dia_id']; ?>" value="1" id="<?php echo $dia['dia_id']; ?>" onClick="sel_individual(this, <?php echo $dia['dia_id']; ?>)" /></label>&nbsp;&nbsp;&nbsp;
                <!--<label for=´horario_id" class="control-label">Horario:</label>-->
                <!--<div class="form-group" id="elegirhorario">-->
                    
<!--                    <div id="horizontal">
                        <div id="fotodocente"></div>
                        <div id="contieneimg">
                            <label for="docente_id" class="control-label">Docente:</label>
                            <div style="display: inline">-->
                                <select name="docente_id<?php echo $dia['dia_id']; ?>" id="docente_id<?php echo $dia['dia_id']; ?>" class="form-control docenteselect" onchange="get_foto_docente(this.value); getgrupo_docente(this.value);" disabled>
                                    
                                    <option value="">- DOCENTE -</option>
                                    <?php 
                                    foreach($all_docente as $docente)
                                    {
                                        $selected = ($docente['docente_id'] == $this->input->post('docente_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$docente['docente_id'].'" '.$selected.'>'.$docente['docente_apellidos']." ".$docente['docente_nombre'].'</option>';
                                    } 
                                    ?>
                                    
                                </select>
<!--                            </div>
                        </div>
                    </div>-->
                
                
                
                
                    <select name="periodo_id<?php echo $dia['dia_id']; ?>" id="periodo_id<?php echo $dia['dia_id']; ?>" class="form-control periodoselect" disabled>
                        <option value="">- PERIODO -</option>
                        <?php 
                        foreach($all_periodo as $periodo)
                        {
                            $selected = ($periodo['periodo_id'] == $this->input->post('periodo_id')) ? ' selected="selected"' : "";
                            echo '<option value="'.$periodo['periodo_id'].'" '.$selected.'>'.$periodo['periodo_horainicio'].' - '.$periodo['periodo_horafin'].'</option>';
                        } 
                        ?>
                    </select>

                    <select name="aula_id<?php echo $dia['dia_id']; ?>" id="aula_id<?php echo $dia['dia_id']; ?>" class="form-control aulaselect" disabled>
                        <option value="">- AULA -</option>
                        <?php 
                        foreach($all_aula as $aula)
                        {
                            $selected = ($aula['aula_id'] == $this->input->post('aula_id')) ? ' selected="selected"' : "";
                            echo '<option value="'.$aula['aula_id'].'" '.$selected.'>'.$aula['aula_nombre'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
                <?php
                
                } 
                ?>
                
  
                    <div class="col-md-2">
                    <br>
                        <!--<div class="box-tools">-->
                            <a class="btn btn-success btn-sm  form-control" onclick="registrar_grupo()" ><span class="fa fa-check"></span> Registrar Grupo</a>
                    <br>
                    <br>
                            <a class="btn btn-danger btn-sm  form-control" onclick="resetearcamposgrupo(1)"><span class="fa fa-times"></span> Cancelar</a>
                        <!--</div>-->
                    </div>
                    <br>
                    <div class="col-md-2">
                        <!--<div class="box-tools">-->
                        <!--</div>-->
                    </div>
                    
             
                
                </div>
        <!--</div>-->
    </div>
    
    <div class="row" id='loader' style='display:none; text-align: center'>
        <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
    </div>
    
<!--    <div class="box-tools">
        <a href="<?php //echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
    </div>-->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!--<div class="box-header">
                <h3 class="box-title" id="docente_grupo"></h3>
            </div>-->
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th style="padding: 0; width: min-content"> </th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Domingo</th>
                        <!--<th></th>-->
<!--                        <th>Materia</th>
                        <th>Grupo</th>
                        <th>Horario</th>
                        <th>Aula</th>
                        <th>Docente</th>
                        <th>Gestion</th>
                        <th>Usuario</th>
                        <th></th>-->
                    </tr>
                    
                    <tbody id="mostrarhorariodocente">
                    <?php foreach($all_periodo as $p){ ?>
                    <tr>
                        <th style="padding: 0; width: min-content"><?php echo $p['periodo_horainicio']." - ".$p['periodo_horafin']; ?></th>
                        <td><div id="casilla<?php echo $p['periodo_id']."1"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."2"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."3"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."4"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."5"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."6"; ?>" > </div></td>
                        <td><div id="casilla<?php echo $p['periodo_id']."7"; ?>" > </div></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
