<script src="<?php echo base_url('resources/js/grupo.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<style type="text/css">
    #contieneimg{
        
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<script type="text/javascript">
function toggle(source) {
  checkboxes = document.getElementsByClassName('checkbox');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<div class="box-header" style="padding-left: 0px">
    <!--<h3 class="box-title">Grupo Listing</h3>-->
    <div class="col-md-3">
        <div class="col-md-12">
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
        <div class="col-md-12">
            <label for=´planacad_id" class="control-label">Plan Academico:</label>
            <div class="form-group" id="elegirplanacad">
                <select name="planacad_id" id="planacad_id" class="form-control">
                    <option value="">- PLAN ACADEMICO -</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label for=´nivel_id" class="control-label">Nivel:</label>
            <div class="form-group" id="elegirnivel">
                <select name="nivel_id" id="nivel_id" class="form-control">
                    <option value="">- NIVEL -</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <!--<div class="col-md-12">
            <label for="paralelo_id" class="control-label">Paralelo:</label>
            <div class="form-group">
                <select name="paralelo_id" id="paralelo_id" class="form-control" >
                    <?php 
                    /*foreach($all_paralelo as $paralelo)
                    {
                        $selected = ($paralelo['paralelo_id'] == $this->input->post('paralelo_id')) ? ' selected="selected"' : "";
                        echo '<option value="'.$carrera['paralelo_id'].'" '.$selected.'>'.$paralelo['paralelo_descripcion'].'</option>';
                    } */
                    ?>
                </select>
            </div>
        </div>-->
        <div class="col-md-12">
            <div id="horizontal">
                <div id="fotodocente"></div>
                <div id class="contieneimg">
                    <label for="docente_id" class="control-label">Docente:</label>
                    <div style="display: inline">
                        <select name="docente_id" id="docente_id" class="form-control" onchange="get_foto_docente(this.value)" >
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
        <div class="col-md-12">
            <br>
            <label for=´materia_id" class="control-label">Materia:</label>
            <div class="form-group" id="elegirmateria">
                <select name="materia_id" id="materia_id" class="form-control">
                    <option value="">- MATERIA -</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <!--<div class="col-md-12">
            <label for=´aula_id" class="control-label">Aula:</label>
            <div class="form-group" id="elegiraula">
                <select name="aula_id" id="aula_id" class="form-control">
                    <option value="">- AULA -</option>
                    <?php 
                    /*foreach($all_aula as $aula)
                    {
                        $selected = ($aula['aula_id'] == $this->input->post('aula_id')) ? ' selected="selected"' : "";
                        echo '<option value="'.$aula['aula_id'].'" '.$selected.'>'.$aula['aula_nombre'].'</option>';
                    } */
                    ?>
                </select>
            </div>
        </div>-->
        <!--<div class="col-md-12">
            <label for=´horario_id" class="control-label">Horario:</label>
            <div class="form-group" id="elegirhorario">
                <select name="horario_id" id="horario_id" class="form-control">
                    <option value="">- HORARIO -</option>
                    <?php 
                    /*foreach($all_horario as $horario)
                    {
                        $selected = ($horario['horario_id'] == $this->input->post('horario_id')) ? ' selected="selected"' : "";
                        echo '<option value="'.$horario['horario_id'].'" '.$selected.'>'.$horario['horario_desde'].' - '.$horario['horario_hasta'].'</option>';
                    } */
                    ?>
                </select>
            </div>
        </div>-->
        <div class="col-md-12">
            <label for=´horario_id" class="control-label">Grupo:</label>
            <div class="form-group" id="elegirhorario">
                <input type="text" name="grupo_nombre" id="grupo_nombre" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!--<div class="col-md-12">-->
            <label for="dias_visita" class="control-label"></label><input type="checkbox" id="select_all" onClick="toggle(this)" /> Todos
            <div id="horizontal" class="form-group table-responsive">
                <?php 
                foreach($all_dia as $dia)
                { ?>
                <div class="col-md-2">
                <label><?php echo $dia['dia_nombre']; ?><input class="checkbox" type="checkbox" name="<?php echo $dia['dia_nombre']; ?>" value="1" id="<?php echo $dia['dia_nombre']; ?>" /></label>&nbsp;&nbsp;&nbsp;
                <!--<label for=´horario_id" class="control-label">Horario:</label>-->
                <!--<div class="form-group" id="elegirhorario">-->
                    <select name="horario_id" id="horario_id" class="form-control">
                        <option value="">- HORARIO -</option>
                        <?php 
                        foreach($all_horario as $horario)
                        {
                            $selected = ($horario['horario_id'] == $this->input->post('horario_id')) ? ' selected="selected"' : "";
                            echo '<option value="'.$horario['horario_id'].'" '.$selected.'>'.$horario['horario_desde'].' - '.$horario['horario_hasta'].'</option>';
                        } 
                        ?>
                    </select>
                    <select name="aula_id" id="aula_id" class="form-control">
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
            <div class="box-header">
                <h3 class="box-title">Grupo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Grupo Id</th>
						<th>Horario Id</th>
						<th>Docente Id</th>
						<th>Gestion Id</th>
						<th>Usuario Id</th>
						<th>Aula Id</th>
						<th>Materia Id</th>
						<th>Grupo Nombre</th>
						<th>Grupo Descripcion</th>
						<th>Grupo Horanicio</th>
						<th>Grupo Horafin</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($grupo as $g){ ?>
                    <tr>
						<td><?php echo $g['grupo_id']; ?></td>
						<td><?php echo $g['horario_id']; ?></td>
						<td><?php echo $g['docente_id']; ?></td>
						<td><?php echo $g['gestion_id']; ?></td>
						<td><?php echo $g['usuario_id']; ?></td>
						<td><?php echo $g['aula_id']; ?></td>
						<td><?php echo $g['materia_id']; ?></td>
						<td><?php echo $g['grupo_nombre']; ?></td>
						<td><?php echo $g['grupo_descripcion']; ?></td>
						<td><?php echo $g['grupo_horanicio']; ?></td>
						<td><?php echo $g['grupo_horafin']; ?></td>
						<td>
                            <a href="<?php echo site_url('grupo/edit/'.$g['grupo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('grupo/remove/'.$g['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
    </div>
</div>
