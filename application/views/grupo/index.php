<script src="<?php echo base_url('resources/js/grupo.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
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
            <label for="paralelo_id" class="control-label">Paralelo:</label>
            <div class="form-group">
                <select name="paralelo_id" id="paralelo_id" class="form-control" >
                    <?php 
                    foreach($all_paralelo as $paralelo)
                    {
                        $selected = ($paralelo['paralelo_id'] == $this->input->post('paralelo_id')) ? ' selected="selected"' : "";
                        echo '<option value="'.$carrera['paralelo_id'].'" '.$selected.'>'.$paralelo['paralelo_descripcion'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="fotodocente"></div>
        <label for="docente_id" class="control-label">Docente:</label>
        <div class="form-group">
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
