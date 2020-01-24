<!----------------------------- script buscador --------------------------------------->
<!--<script src="<?php //echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>-->
<script src="<?php echo base_url('resources/js/reporte_inscripcion.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        //window.onload = window.print();
    });
</script>

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
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="text" value="<?php echo base_url(); ?>" name="base_url" id="base_url" hidden>
<input type="text" value="<?php echo $gestion_id; ?>" name="gestion_id" id="gestion_id" hidden>
<?php $padding = "style='padding:0; '"; 
    $ancho = "16cm";
    
    $logo = base_url("resources/images/institucion/").$institucion[0]['institucion_logo'];
    $logo_thumb = base_url("resources/images/institucion/")."thumb_".$institucion[0]['institucion_logo'];
?>

<?php //$fecha = date();
    $fecha_d_m_a =  date('d/m/Y H:t:s')
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
                <font size="1" face="Arial"><b><?php echo $fecha_d_m_a; ?></b></font>
                
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
            <div class=" col-md-12" style="padding: 0px;">
                    <div class="col-md-2" style="padding: 0px 10px 0px 0px;">
                        Usuario:
                        <?php if($tipousuario_id == 1){ ?>
                        <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>
                            <option value="0"> TODOS </option>
                            <?php /*foreach($all_usuario as $usuario){?>
                            <option value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                            <?php }*/ ?>
                        </select>
                        <?php }else{ ?>
                        <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>
                            <?php
                           /* $ischequed = "";
                            foreach($all_usuario as $usuario){
                                if($usuario_id == $usuario['usuario_id']){
                                    $ischequed = "selected";
                            ?>
                            <option <?php echo $ischequed; ?> value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                            <?php }    
                                }*/ ?>
                        </select>
                        <?php } ?>
                    </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px">
                    <br>
                    <button class="btn btn-sm btn-warning btn-sm btn-block"  type="submit" onclick="buscar_por_fecha()" style="height: 34px;">
                        <span class="fa fa-search"></span> Buscar
                  </button>
                    <br>
                </div>
                <div class="col-md-1" style="padding: 0px 10px 0px 0px">
                    <br>
                    <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Inscritos: <span class="badge btn-primary"><input style="border-width: 0; width: 60px" id="resinscritos" type="text" value="0" readonly="true"> </span></span>
                </div>
                <div class="col-md-2" style="padding: 0px 10px 0px 0px; text-align: center">
                    <br>
                    <a id="imprimirestedetalle" class="btn btn-sq-lg btn-success" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>">
</div>
<br>
<div class="table-responsive">
<table  class="table table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size: 10px; border-top: solid; border-bottom: solid; ">
    <!--<table class="table table-striped" id="mitabla">-->
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">APELLIDOS</th>
            <th rowspan="2">NOMBRES</th>
            <th rowspan="2">CURSO/CARRERA</th>
            <th rowspan="2">COD.</th>
            <th rowspan="2">N°<br>KARD.</th>
            <th rowspan="2">FECHA<br>INSCRIP.</th>
            <th colspan="3">MONTO</th>
        </tr>
        <tr>
            <th style="padding: 0px" rowspan="2">MATR.</th>
            <th style="padding: 0px" rowspan="2">MENS.</th>
            <th style="padding: 0px" rowspan="2">TOTAL</th>
        </tr>
        <tbody id="resinscripcion"></tbody>
    </table>
</div>
<table  class="table table-striped table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size:10px;">
    <tr><br>
    </tr>
    
    <tr>
        <td> <center>

                <?php echo "-----------------------------------------------------"; ?><br>
                <?php echo "RECIBI CONFORME"; ?><br>

            </center>
        </td>
        <td width="100">
            <?php echo "     "; ?><br>
            <?php echo "     "; ?><br>
        </td>
        <td>
            <center>

                <?php echo "-----------------------------------------------------"; ?><br>
                <?php echo "ENTREGUE CONFORME"; ?><br>   

            </center>
        </td>
    </tr>
    <tr>
        <td>
        <b>USUARIO: </b><?php //echo $inscripcion[0]['usuario_nombre']; ?><br>
        </td>
    </tr>
</table>


    <a  href="javascript:close();" class="btn btn-sq-lg btn-danger no-print" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-sign-out fa-4x"></i><br><br>
       Salir <br>
    </a>
