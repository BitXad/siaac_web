<script src="<?php echo base_url('resources/js/grupo_nuevo.js'); ?>" type="text/javascript"></script>
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
            <label for=´nivel_id" class="control-label">Nivel:</label>
            <div class="form-group" id="elegirnivel">
                <select name="nivel_id" id="nivel_id" class="form-control">
                    <option value="">- NIVEL -</option>
                </select>
            </div>
        </div>
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
                <input type="text" name="grupo_nombre" id="grupo_nombre" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-2">
            <div class="box-tools">
                <a class="btn btn-success btn-sm" onclick="registrar_grupo()" ><span class="fa fa-check"></span> Registrar Grupo</a>
            </div>
        </div>
        <!--<div class="col-md-2">
            <div class="box-tools">
                <a class="btn btn-danger btn-sm" onclick="resetearcamposgrupo(1)"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>-->
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
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>Grupo</th>
                        <th>Gestión</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                    <tbody id="mostrargrupo"></tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
