<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/plan_academico.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/plan_academico.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!--<input type="hidden" name="lasmaterias" id="lasmaterias" value='<?php //echo json_encode($all_materias);  ?>' />-->
<input type="hidden" name="lasareas" id="lasareas" value='<?php echo json_encode($all_areas);  ?>' />
<input type="hidden" name="mosprereq" id="mosprereq" value='0' />

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
                <div class="col-md-6">
                    <label for="carrera_id" class="control-label">Carrera</label>
                    <div class="form-group">
                        <select name="carrera_id" class="form-control" id="carrera_id" onchange="buscar_plan(this.value)">
                            <option value="">- CARRERA -</option>
                            <?php 
                            foreach($all_carrera as $carrera)
                            {
                                echo '<option value="'.$carrera['carrera_id'].'">'.$carrera['carrera_nombre'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for=´planacad_id" class="control-label">Plan Academico</label>
                    <div class="form-group" id="elegirplanacad">
                        <select name="planacad_id" class="form-control">
                            <option value="">- PLAN ACADEMICO -</option>
                            
                        </select>
                    </div>
                </div>
                <div id="isnuevoplan"></div>
                <div class="col-md-6">
                    <div class="form-group" id="nuevonivel" style="visibility: hidden;">
                        <a class="btn btn-success" data-toggle="modal" onclick="getnombreplan()" data-target="#modalnuevonivel" title="Nuevo Nivel" disabled="true" id="bnewnivel">+ Nuevo Nivel</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<p>
    <button type="button" class="btn btn-success" id="toggleArrowBtn">Mostrar conectores</button>
</p>-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <div id="dibujarniveles"></div>
                
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
                    <label for='nivel_id' class='control-label'>Descripción</label>
                    <div class='form-group'>
                        <input type='text' name='nivel_nombre' class='form-control' id='nivel_nombre' required />
                    </div>
                </div>
                <input type='hidden' name='hplanacad_id' class='form-control' id='hplanacad_id'/>
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