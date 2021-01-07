<script src="<?php echo base_url('resources/js/inscripcion_index.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="parametro" id="parametro" value="<?php echo $parametro["parametro_tipoimpresora"]; ?>" />
<input type="hidden" name="resinscripcion" id="resinscripcion" />
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script> 

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<!-------------------------------------------------------->
<div class="box-header">
    <center> 
    <h3 class="box-title"><font size="3" face="Arial"><b> INSCRIPCIONES</b></font></h3>
    </center>            	
</div>
<!-------------------------------------------------------->
<div class="col-md-5">
    <div class="input-group">
        <span class="input-group-addon">Buscar</span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit" onkeypress="buscarinscritos(event,1)" autocomplete="off" >
    </div>
</div>
<div class="col-md-7">
    <!--<div class="box-header no-print">-->
        <!--<div class="box-tools">-->
        <!--<div class="col-md-3">-->
        <select  class="btn btn-facebook btn-sm" id="select_inscripcion" onchange="buscar_inscripciones()">
    <!--                        <option value="1">-- SELECCIONE UNA OPCION --</option>-->
                <option value="1">Inscripciones de Hoy</option>
                <option value="2">Inscripciones de Ayer</option>
                <option value="3">Inscripciones de la semana</option>
                <option value="4">Todos las Inscripciones</option>
                <option value="5">Inscripciones por fecha</option>
            </select>
        <!--</div>-->
        <!--<div class="col-md-3">-->
            <button class="btn btn-warning btn-sm" onclick="verificar_Inscripciones()"><span class="fa fa-binoculars"></span> Verificar </button>
            <!--</div>-->
        <!--<div class="col-md-3">-->
            <a href="<?php echo site_url('venta/ventas'); ?>" class="btn btn-success btn-sm"><span class="fa fa-cart-arrow-down"></span> Ventas</a>
            <!--</div>-->
        <!--<div class="col-md-3">-->
            <a href="<?php echo site_url('inscripcion/inscribir/0'); ?>" class="btn btn-info btn-sm"> <span class="fa fa-address-card"></span> Inscribir</a>
            <a onclick="generarexcel_inscripcion()" class="btn btn-facebook btn-sm" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</a>
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</div>


<!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<!--<form method="post" onclick="Inscripciones_por_fecha()">-->
<div class="panel panel-primary col-md-12 no-print" id='buscador_oculto' style='display:none;'>
    <br>
    <center>            
        <div class="col-md-2">
            Desde: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_desde" value="<?php echo date("Y-m-d");?>" name="fecha_desde" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_hasta" value="<?php echo date("Y-m-d");?>"  name="fecha_hasta" required="true">
        </div>
        <div class="col-md-4">
            <!--<label for="carrera_id" class="control-label">Carrera</label>-->
            Carrera:
            <div class="form-group"> <b>
                <select name="carrera_id" id="carrera_id" class="btn btn-warning btn-sm form-control" onchange="obtener_planacademico(this.value)">
                    <option value="0">- CURSO/CARRERA -</option>
                    <?php
                    foreach($all_carrera as $carrera)
                    {
                        $selected = ($carrera['carrera_id'] == $carrera_idinsc_est) ? ' selected="selected"' : "";
                        echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
                    } 
                    ?>
                </select></b>
            </div>
        </div>
        <div class="col-md-4">
            <!--<label for="carrera_id" class="control-label">Plan Academico</label>-->
            Plan Academico:
            <div class="form-group" id="elegirplanacad"><b>
                <select name="planacad_id" id="planacad_id" class="btn btn-warning btn-sm  form-control" required>
                    <option value="0">- PLAN ACADEMICO -</option>
                </select></b>
            </div>
        </div>
        <div class="col-md-3">
            <!--<label for="nivel_id" class="control-label">Nivel</label>-->
            Nivel:
            <div class="form-group">
                <select name="nivel_id" id="nivel_id" class=" btn btn-warning btn-sm form-control" onchange="mostrar_materias()">
                    <option value="0">- NIVEL -</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            Estado:
            <select  class="btn btn-warning btn-sm form-control" id="estado_id" >
                <option value="0">-- TODOS --</option>
                <?php foreach($estado as $es){?>
                    <option value="<?php echo $es['estado_id']; ?>"><?php echo $es['estado_descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-2">
            Usuario:
            <select  class="btn btn-warning btn-sm form-control" id="usuario_id">
                    <option value="0">-- TODOS --</option>
                <?php foreach($usuario as $us){?>
                    <option value="<?php echo $us['usuario_id']; ?>"><?php echo $us['usuario_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <!--<br>-->
        <div class="col-md-3">
            &nbsp;
            <button class="btn btn-facebook btn-block" onclick="inscripciones_por_fecha()" >
                <span class="fa fa-search"></span>   Buscar
          </button>
            <!--<br>-->
        </div>
    </center>    
    <br>    
</div>
<!--</form>-->
<!------------------------------------------------------------------------------------------->
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body  table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Fecha Inscripción</th>
                        <th>Cod. Inscrip.</th>
                        <th>Nivel</th>
                        <th>Grupo/Horario</th>
                        <th>Fecha Inicio</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    
                    </tbody>
                </table>
<!--                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                -->
            </div>
        </div>
    </div>
</div>
