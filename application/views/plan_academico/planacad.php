<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/plan_academico.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/plan_academico.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!--<input type="hidden" name="lasmaterias" id="lasmaterias" value='<?php //echo json_encode($all_materias);  ?>' />-->
<input type="hidden" name="lasareas" id="lasareas" value='<?php echo json_encode($all_areas);  ?>' />
<input type="hidden" name="mosprereq" id="mosprereq" value='0' />
<input type="hidden" name="prerequisito" id="prerequisito" value='' />

<script type="text/javascript">
    function cambiarcodplan(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#planacad_codigo').val(anio+mes+dia+hora+min+seg);
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#carrera_nombre").change(function(){
        var nombre = $("#carrera_nombre").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = nombre.substring(nombre.length-1,nombre.length);
        var cad = cad1+cad2;
        $('#carrera_codigo').val(cad);
    });
  });
    
</script>
<script type="text/javascript">
    /*function cambiarprereq(nivel_id){
        var res = document.getElementById('prerequisito'+nivel_id).checked;
        if(res){
            $('#mosprereq').val('1');
        }else{
            $('#mosprereq').val('0');
        }
    }*/
</script>
<div class="box-header" style="text-align: center">
    <h3 class="box-title"><b><?php echo $all_institucion[0]['institucion_nombre']; ?></b></h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                
<!--                <div class="col-md-2">
                    <label for="carrera_id" class="control-label">&nbsp;</label>
                    <div class="form-group no-print">
                        <a class="btn btn-success" data-toggle="modal" data-target="#modalnuevacarrera" onclick="borrardatosmodal()" title="Nueva Carrera" id="bnewcarrera">+ Nueva Carrera</a>
                    </div>
                </div>-->
                
                <div class="col-md-5">
                    <label for="carrera_id" class="control-label">Carrera <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalnuevacarrera" onclick="borrardatosmodal()" title="Nueva Carrera" id="bnewcarrera">+ Nueva Carrera</a>
                        <a href="<?php echo site_url('carrera'); ?>" class="btn btn-xs btn-xs btn-info no-print" title="Modificar carreras"><i class="fa fa-file-text"></i></a>
                    </label>
                    <div class="form-group" id="sonlascarreras"></div>
                </div>

                <div class="col-md-5">
                    <label for="planacad_id" class="control-label">Plan Academico <a class='btn btn-warning btn-xs' data-toggle='modal' data-target='#modalnuevoplanacad' title='Nuevo Plan Académico' id="nuevo_plan" style="display:none;">+ Nuevo Plan</a>
                        <a href="<?php echo site_url('plan_academico'); ?>" class="btn btn-xs btn-xs btn-info no-print" title="Modificar planes academicos"><i class="fa fa-file-text"></i></a>
                    </label>
                    <div class="form-group" id="elegirplanacad">
                        <select name="planacad_id" class="form-control">
                            <option value="">- PLAN ACADEMICO -</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="nuevonivel"></div>
                    <div id="imprimirplanacademico" class="no-print"></div>
                </div>

                
                <div id="isnuevoplan"></div>
                <!--<div id="nuevonivel"></div>-->
                <!--<div class="col-md-6">
                    <div class="form-group" id="nuevonivel" style="visibility: hidden;">
                        <a class="btn btn-success" data-toggle="modal" onclick="getnombreplan()" data-target="#modalnuevonivel" title="Nuevo Nivel" disabled="false" id="bnewnivel">+ Nuevo Nivel</a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>

<div class="row" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<!--<p>
    <button type="button" class="btn btn-success" id="toggleArrowBtn">Mostrar conectores</button>
</p>-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <div id="dibujarniveles" class="table-responsive"></div>
                
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para crear nuevo nivel ------------------->
<div class="modal fade" id="modalnuevonivel" tabindex="-1" role="dialog" aria-labelledby="modalnuevonivelLabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <span id="estetitplan"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class='col-md-6'>
                    <label for='nivel_id' class='control-label'><span class="text-danger">*</span>Nivel</label>
                    <div class='form-group'>
                        <input type='text' name='nivel_descripcion' class='form-control' id='nivel_descripcion' required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                    <input type='hidden' name='hplanacad_id' class='form-control' id='hplanacad_id'/>
                </div>
                <div class="col-md-6">
                    <label for="nivel_color" class="control-label">Color</label>
                    <div class="form-group">
                        <input type="color" name="nivel_color" value="#73baa8" class="form-control" id="nivel_color" />
                    </div>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registronivel()" class="btn btn-success"><span class="fa fa-check"></span>Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para crear nuevo nivel ------------------->

<!------------------------ INICIO modal para crear nueva Carrera ------------------->
<div class="modal fade" id="modalnuevacarrera" tabindex="-1" role="dialog" aria-labelledby="modalnuevacarreraLabel">
    <div class="modal-dialog modal-lg" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <span id="estetitplan"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class='col-md-6'>
                    <label for='carrera_nombre' class='control-label'><span class="text-danger">*</span>Carrera</label>
                    <div class='form-group'>
                        <input type='text' name='carrera_nombre' class='form-control' id='carrera_nombre' required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <label for="areacarrera_id" class="control-label"><span class="text-danger">*</span>Area</label>
                    <div class="form-group">
                        <select name="areacarrera_id" class="form-control" id="areacarrera_id" required>
                            <!--<option value="">- AREA -</option>-->
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
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrocarrera()" class="btn btn-success"><span class="fa fa-check"></span>Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para crear nueva Carrera ------------------->