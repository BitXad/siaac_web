<!----------------------------- script buscador --------------------------------------->
<!--<script src="<?php //echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>-->
<script src="<?php echo base_url('resources/js/reporte_inscripcion.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        var estafecha = new Date();
        $('#fechaimpresion').html(moment(estafecha).format("DD/MM/YYYY HH:mm:ss"));
        //window.onload = window.print();
    });
</script>
<script type="text/javascript">
    function imprimirdetalle(){
        var estafecha = new Date();
        $('#fechaimpresion').html(moment(estafecha).format("DD/MM/YYYY HH:mm:ss"));
        window.print();
    }

</script>
<style type="text/css">
    @media print {
        #elfondo {
            background: rgba(127,127,127,0.3) !important;
        }
    }
</style>
 
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="text" value="<?php echo base_url(); ?>" name="base_url" id="base_url" hidden>
<input type="text" value="<?php echo $gestion_id; ?>" name="gestion_id" id="gestion_id" hidden>
<?php $padding = "style='padding:0; '"; 
    $ancho = "18cm";
    
    $logo = base_url("resources/images/institucion/").$institucion[0]['institucion_logo'];
    $logo_thumb = base_url("resources/images/institucion/")."thumb_".$institucion[0]['institucion_logo'];
?>
    <table style="width: <?php echo $ancho; ?>; font-family: Arial;">
    <tr>
        <td width="300" style="line-height: 10px; ">
                     <center>                        
                         <img src="<?php echo $logo; ?>" width="80" height="60"><br>
                        <font size="2" face="Arial"><b><?php echo $institucion[0]['institucion_nombre']; ?></b></font><br>
                        <?php if(sizeof($institucion[0]['institucion_slogan'])>1){ ?>
                            <font size="2" face="Arial"><b><?php echo $institucion[0]['institucion_slogan']; ?></b></font><br>
                        <?php } ?>
                        
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_direccion']; ?><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_telefono']; ?></font><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_departamento']." - BOLIVIA"; ?></font><br>
                    </center>           
        </td>
        <td width="400" style="line-height: 14px; ">
            <center>
                <font size="3" face="Arial"><b>INSCRIPCIONES</b></font><br>
                <!--<font size="2" face="Arial"><b>DE INSCRIPCION</b></font><br>
                <font size="3" face="Arial"><b>Nº: 00<?php //echo $inscripcion[0]['inscripcion_id']; ?></b></font><br>-->
                <font size="1" face="Arial"><span id="fechaimpresion"></span></font>
                
            </center>
        </td>
        <td width="300" style="text-align: center;">
            --------------------------<br>
            <b>Gestión: </b><?php echo $gestion_descripcion; ?><br>
            --------------------------
<!--                <h5><b>Tipo: </b><?php /*echo $inscripcion[0]['tipotrans_nombre']; ?> <br>
                <b>Cred. Nº: </b><?php echo $inscripcion[0]['cliente_codigo']; ?> <br>
                <b>Limite: </b><?php echo $inscripcion[0]['venta_fecha'];*/ ?></h5>       -->
        
        </td>            
    </tr>
</table>
<div class="box-header no-print" style="padding: 10px 0px 0px">
        <div class="container" style="margin: 0px; padding: 0px">  
        <div class="box-tools">
            <div class=" col-md-11" style="padding: 0px;">
                    <div class="col-md-2" style="padding: 0px 10px 0px 0px;">
                        USUARIO:
                        <?php //if($tipousuario_id == 1){ ?>
                        <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>
                            <option value="0"> TODOS </option>
                            <?php foreach($all_usuario as $usuario){?>
                            <option value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <?php /*}else{ ?>
                        <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>
                            <?php
                            $ischequed = "";
                            foreach($all_usuario as $usuario){
                                if($usuario_id == $usuario['usuario_id']){
                                    $ischequed = "selected";
                            ?>
                            <option <?php echo $ischequed; ?> value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                            <?php }    
                                } ?>
                        </select>
                        <?php }*/ ?>
                    </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    DESDE: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    HASTA: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    &nbsp;
                    <select  class="btn btn-facebook btn-sm form-control" id="select_inscripcion" onchange="buscar_inscritos()">
<!--                        <option value="1">-- SELECCIONE UNA OPCION --</option>-->
                        <option value="1">Inscripciones de Hoy</option>
                        <option value="2">Inscripciones de Ayer</option>
                        <option value="3">Inscripciones de la semana</option>
                        <option value="4">Todos las Inscripciones</option>
                        <!--<option value="5">Inscripciones por fecha</option>-->
                    </select>
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    <br>
                    <button class="btn btn-sm btn-warning btn-sm btn-block"  type="submit" onclick="buscar_por_fecha()" style="height: 34px;">
                        <span class="fa fa-search"></span> Buscar
                  </button>
                    <br>
                </div>
                <div class="col-md-1" style="padding: 0px 10px 0px 0px">
                    &nbsp;
                    <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Inscritos: <span class="badge btn-primary"><input style="border-width: 0; width: 90px" id="resinscritos" type="text" value="0" readonly="true"> </span></span>
                </div>
                
            </div>
            <div class=" col-md-11" style="padding: 0px;">
                <div class="col-md-2" style="padding: 0px 10px 0px 0px; text-align: center">
                    &nbsp;
                    <a id="imprimirestedetalle" class="btn btn-sq-lg btn-success" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-body table-responsive" id="cabizquierdafechas" style="font-family: Arial; font-size: 10px; padding-bottom: 0px !important; padding-left: 0px" >
    <span id="elusuario" style="margin: 0px"></span><br>
    <span id="fecha1impresion" style="margin: 0px"></span>
    <span id="fecha2impresion" style="margin: 0px"></span>
</div>
<div class="row" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>">
</div>

<div class="table-responsive">
<table  class="table table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size: 9px;">
    <!--<table class="table table-striped" id="mitabla">-->
    <tr>
        <th id="elfondo" class="text-center" style="vertical-align: central; border: 2px solid black ; border-left: 2px solid black; background-color: #000 solid !important" rowspan="2">#</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black; width: 4cm" rowspan="2">APELLIDOS</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black; width: 3.5cm" rowspan="2">NOMBRES</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black" rowspan="2">CURSO/CARRERA</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black" rowspan="2">COD.</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black" rowspan="2">N°<br>KARD.</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black" rowspan="2">FECHA<br>INSCRIP.</th>
        <th id="elfondo" class="text-center" style="border: 2px solid black; border-right: 2px solid black" colspan="3">MONTO</th>
    </tr>
    <tr>
        <th id="elfondo" class="text-center" style="padding: 0px; border-bottom: 2px solid black; border: 2px solid black" rowspan="2">MATR.</th>
        <th id="elfondo" class="text-center" style="padding: 0px; border-bottom: 2px solid black; border: 2px solid black" rowspan="2">MENS.</th>
        <th id="elfondo" class="text-center" style="padding: 0px; border-bottom: 2px solid black; border-right: 2px solid black" rowspan="2">TOTAL</th>
    </tr>
    <tbody id="resinscripcion"></tbody>
    </table>
</div>
<table  class="table table-striped table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size:10px;">
    <tr><br>
    </tr>
    <tr>
        <td style="line-height: 8px !important"> <center>
                -----------------------------------------------------<br>
                RECIBI CONFORME<br>
            </center>
        </td>
        <td width="100">
            <?php echo "     "; ?><br>
            <?php echo "     "; ?><br>
        </td>
        <td style="line-height: 8px !important">
            <center>
                -----------------------------------------------------<br>
                ENTREGUE CONFORME<br>
            </center>
        </td>
    </tr>
    <tr>
        <td>
        <b>IMPRESO POR: </b><?php echo $usuario_nombre; ?><br>
        </td>
    </tr>
</table>


    <a  href="javascript:close();" class="btn btn-sq-lg btn-danger no-print" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-sign-out fa-4x"></i><br><br>
       Salir <br>
    </a>
