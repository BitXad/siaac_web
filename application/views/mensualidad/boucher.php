<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>
<!----------------------------- script buscador --------------------------------------->
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

<style type="text/css">
    p {
        font-family: Arial;
        font-size: 7pt;
        line-height: 120%;   /*esta es la propiedad para el interlineado*/
        color: #000;
        padding: 10px;
    }

    div {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 10px;
        margin: 0px;
    }


    table{
        width : 7cm;
        margin : 0 0 0px 0;
        padding : 0 0 0 0;
        border-spacing : 0 0;
        border-collapse : collapse;
        font-family: Arial narrow;
        font-size: 7pt;  
    }
    td {
        border:hidden;
    }

    td#comentario {
        vertical-align : bottom;
        border-spacing : 0;
    }
    div#content {
        background : #ddd;
        font-size : 7px;
        margin : 0 0 0 0;
        padding : 0 5px 0 5px;
        border-left : 1px solid #aaa;
        border-right : 1px solid #aaa;
        border-bottom : 1px solid #aaa;
}
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php //echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->
<?php
    $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
    $ancho = $parametro[0]["parametro_anchofactura"]."cm";
    $margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];
    $fecha_d_m_a =  date('d/m/Y H:i:s')
?>
<div class="<?php echo $margen_izquierdo; ?>" style="padding: 0; max-width:5cm;">
    
</div>
 
<div class="col-xs-10" style="padding: 0;">
    <table class="table" style="width: <?php echo $ancho;?>; padding: 0; margin-bottom: 0px">
    <!--<table class="table" style="width: <?php //echo $ancho; ?>;" >-->
        <tr>
            <td style="padding:0;">        
                <center>
                    <img src="<?php echo base_url('resources/images/institucion/'.$institucion['institucion_logo']); ?>" width="100" height="60"><br>
                    <font size="3" face="Arial"><b><?php echo $institucion['institucion_nombre']; ?></b></font><br>
                    <font size="2" face="Arial"><b><?php echo $institucion['institucion_slogan']; ?></b></font><br>
                    <!--<font size="1" face="Arial"><b><?php //echo "De: ".$institucion['institucion_propietario']; ?></b></font><br>-->
                    <font size="1" face="Arial"><?php echo $institucion['institucion_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_ubicacion']; ?></font>
                    <br>
                    <font size="3" face="arial"><b>COMPROBANTE DE PAGO</b></font> <br>
                    <font size="3" face="Arial"><b>Nº: 00<?php echo $mensualidad[0]['mensualidad_numrec']; ?></b></font><br>
                    <!--<font size="1" face="arial"><b>ORIGINAL</b></font> <br>-->
                    <font size="1" face="Arial"><b><?php echo $fecha_d_m_a; ?></b></font><br>
                </center>
                <hr style="border-top: 2px solid; margin: 0px">
                <span class="text-left">
                    <b>ESTUDIANTE: </b><?php echo $mensualidad[0]['estudiante_apellidos'].", ".$mensualidad[0]['estudiante_nombre']; ?> <br>
                    <b>CÓDIGO: </b><?php echo $mensualidad[0]['estudiante_codigo']; ?> <br>
                    <?php $fecha = new DateTime($mensualidad[0]['inscripcion_fecha']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                    ?>
                    <b>FECHA: </b><?php echo $fecha_d_m_a." - ".$mensualidad[0]['inscripcion_hora']; ?>
                </span>
                <hr style="border-top: 2px solid; margin: 0px">
            </td>
        </tr>
    </table>
    <table class="table" table-striped table-condensed border-bottom="1" id="mitabla" style="width: <?php echo $ancho;?>; padding: 0; margin-bottom: 0px">
        <tr>
            <th style="padding-bottom: 0px">CAN.</th>
            <th style="text-align: center;padding-left: 0px;padding-right: 0px; padding-bottom: 0px">DESCRIPCION</th>
            <th style="padding-bottom: 0px">UNIT.</th>
            <?php
            $desc = $mensualidad[0]['mensualidad_descuento'];
            if ($desc!=0) {  ?>
                <th style="padding-bottom: 0px">SUBT.</th>
                <th style="padding-bottom: 0px">DESC.</th>
            <?php } ?>
            <th style="padding-bottom: 0px">TOTAL</th>
        </tr>
         <?php
        $cont = 0;
        foreach($mensualidad as $i[0]) {;
            $cont = $cont+1; ?>
            <tr>
                <td><?php echo $cont;?></td>

                <td style="text-align: left;padding-left: 0px;padding-right: 0px;"><?php echo 'MENSUALIDAD No.'. $i[0]['mensualidad_numero'].','.$i[0]['mensualidad_mes'].','.$i[0]['carrera_nombre'].','.$i[0]['estudiante_nombre'].' '.$i[0]['estudiante_apellidos'];?></td>                            


                <td style="text-align: right;"><?php echo number_format($i[0]['mensualidad_montocancelado'],'2','.',',');?></td>

                <?php if ($desc!=0) {  ?>
                <td style="text-align: right;"><?php echo number_format($i[0]['detallecomp_subtotal'],'2','.',',');?></td>
                <td style="text-align: right;"><?php echo number_format($i[0]['detallecomp_descuento'],'2','.',',');?></td>
                <?php } ?>
                <td style="text-align: right;"><?php echo number_format($i[0]['mensualidad_montocancelado'],'2','.',',');?></td>
            </tr>
            <tr>
                <td colspan="6" style="padding-top: 0px; padding-bottom: 0px"><b>Nota.-</b><?php echo $mensualidad[0]['mensualidad_glosa'];?></td>
            </tr>
       <?php } ?>
    </table>
    <table class="table" table-striped table-condensed border-bottom="1" id="mitabla" style="width: <?php echo $ancho;?>; padding: 0; margin-bottom: 0px">
        <tr>
            <td align="right">
                <hr style="border-top: 2px solid; margin: 0px">
                <font size="1">
                 <b>
                    <?php echo "TOTAL Bs: ".number_format($mensualidad[0]['mensualidad_montocancelado'] ,2,'.',','); ?><br>
                </b>
                </font>
                <font size="1" face="arial narrow">
                    <?php echo "SON: ".num_to_letras($mensualidad[0]['mensualidad_montocancelado'],' Bolivianos'); ?>         
                </font>
                <hr style="border-top: 2px solid; margin: 0px">
            </td>
        </tr>
    </table>
     <table class="table" table-striped table-condensed border-bottom="1" id="mitabla" style="width: <?php echo $ancho;?>; padding: 0; margin-bottom: 0px">
        <tr>
            <td align="left">
                <font size="1" face="arial narrow">
                    <?php echo "TRANS.: ".$mensualidad[0]['mensualidad_id']; ?><br>
                </font>
                <font size="1" face="arial narrow">
                    <?php echo "CAJERO: ".$mensualidad[0]['usuario_id']; ?>         
                </font>
            </td>
        </tr>
    </table>
</div>

