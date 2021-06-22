<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/funciones.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
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
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<?php $padding = "style='padding:0; '"; 
    $ancho = "18cm";
    
    $logo = base_url("resources/images/institucion/").$institucion[0]['institucion_logo'];
    $logo_thumb = base_url("resources/images/institucion/")."thumb_".$institucion[0]['institucion_logo'];
?>

<?php //$fecha = date();
    $fecha_d_m_a =  date('d/m/Y H:t:s')
?> 
<!--<div class="container">-->
    
    <table style="width: <?php echo $ancho; ?>; font-family: Arial;">
    <tr>
        <td width="300" style="line-height: 10px; ">
                     <center>                        
                         <img src="<?php echo $logo; ?>" width="80" height="60"><br>
                        <font size="2" face="Arial"><b><?php echo $institucion[0]['institucion_nombre']; ?></b></font><br>
                        <?php if(isset($institucion[0]['institucion_slogan'])){ ?>
                            <font size="2" face="Arial"><b><?php echo $institucion[0]['institucion_slogan']; ?></b></font><br>
                        <?php } ?>
                        
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_direccion']; ?><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_telefono']; ?></font><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_departamento']." - BOLIVIA"; ?></font><br>
                    </center>           
        </td>
        <td width="400" style="line-height: 14px; ">
            <center>
                <font size="3" face="Arial"><b>COMPROBANTE</b></font><br>
                <font size="2" face="Arial"><b>DE INSCRIPCION</b></font><br>
                <font size="3" face="Arial"><b>Nº: 00<?php echo $inscripcion[0]['inscripcion_numrecibo']; ?></b></font><br>
                <font size="1" face="Arial"><b><?php echo $fecha_d_m_a; ?></b></font>
                
            </center>
        </td>
        <td width="300" style="text-align: center;">
            --------------------------<br>
            <b>Gestión: </b><?php echo $inscripcion[0]['gestion_descripcion']; ?><br>
            --------------------------
<!--                <h5><b>Tipo: </b><?php /*echo $inscripcion[0]['tipotrans_nombre']; ?> <br>
                <b>Cred. Nº: </b><?php echo $inscripcion[0]['cliente_codigo']; ?> <br>
                <b>Limite: </b><?php echo $inscripcion[0]['venta_fecha'];*/ ?></h5>       -->
        
        </td>            
    </tr>    
    
    <tr style=" border-style: solid; border-width: thin; padding: 0; line-height: 14px; font-family: Arial; font-size: 10px; background-color: #d2d6de !important; -webkit-print-color-adjust: exact;">
        <td width="300" style="padding: 0;">
        </td>
        <td colspan="2" style="padding: 0;">
            <!--<font face="Arial" size="2">-->
                <b>ESTUDIANTE: </b><?php echo $inscripcion[0]['estudiante_apellidos'].", ".$inscripcion[0]['estudiante_nombre']; ?> <br>
                <b>CÓDIGO: </b><?php echo $inscripcion[0]['estudiante_codigo']; ?> <br>
                
                <?php $fecha = new DateTime($inscripcion[0]['inscripcion_fecha']); 
                    $fecha_d_m_a = $fecha->format('d/m/Y');
                ?>     
                
                <b>FECHA: </b><?php echo $fecha_d_m_a." - ".$inscripcion[0]['inscripcion_hora']; ?>
            <!--</font>-->            
        </td>
    </tr>
    
    
</table>
<br>

<table  class="table table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size: 10px; border-top: solid; border-bottom: solid; ">
    <!--<tbody background="<?php echo $logo; ?>">-->
        
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>CURSO/CARRERA:</b></td>
        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['carrera_nombre']; ?></td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>NIVEL:</b></td>
        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['carrera_nivel']; ?></td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>CURSO:</b></td>
        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['nivel_descripcion']; ?></td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>MATRICULA Bs:</b></td>
        <td <?php echo $padding; ?>><?php echo number_format($inscripcion[0]['kardexeco_matriculapagada'],2,".",","); ?></td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>MENSUALIDAD Bs:</b></td>
        <td <?php echo $padding; ?>><?php echo number_format($inscripcion[0]['kardexeco_mensualidad'],2,".",","); ?>
            <?php if ($inscripcion[0]['kardexeco_descuento']>0) {?>
            <b> DESC. Bs: </b><?php echo number_format($inscripcion[0]['kardexeco_descuento'],2,".",","); ?>
            <?php } ?>
        
        </td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>MENS. CANCELADAS:</b></td>
        <td <?php echo $padding; ?>><?php echo number_format($inscripcion[0]['kardexeco_mensualidadpagada'],2,".",","); ?></td>
    </tr>

    <tr>
        <td style="width: 2cm;"></td>
        <td <?php echo $padding; ?>><b>INICIO DE CLASES:</b></td>
                        
                <?php $fecha = new DateTime($inscripcion[0]['inscripcion_fechainicio']); 
                    $fecha_d_m_a = $fecha->format('d/m/Y');
                ?>     

        
        <td <?php echo $padding; ?>><?php echo $fecha_d_m_a; ?></td>
    </tr>
    <tr>
        <td style="padding: 0;"></td>
        <td colspan="2" style="padding: 0;">__________________________________________________________</td>
            
    </tr>
    <tr>
        <td></td>
        <td style="line-height: 14px; text-align: right;">
            <font face="Arial" size="1"><b>TOTAL FINAL Bs: </b></font><br>
            <?php if ($inscripcion[0]['kardexeco_descuento']>0){ ?>
                <font face="Arial" size="1"><b>DESCUENTO Bs: </b></font><br>
            <?php } ?>
            
            <font face="Arial" size="3"><b>TOTAL FINAL Bs: </b></font>
        </td>
        <td style="line-height: 14px; text-align: left;">
            <font face="Arial" size="1"><b><?php echo number_format($inscripcion[0]['kardexeco_total'],2,".",","); ?></b></font><br>
            <?php if ($inscripcion[0]['kardexeco_descuento']>0){ ?>
                <font face="Arial" size="1"><b><?php echo number_format($inscripcion[0]['kardexeco_descuento'] * $inscripcion[0]['kardexeco_mensualidadpagada'],2,".",","); ?></b></font><br>
            <?php } ?>
            <font face="Arial" size="3"><b><?php echo number_format($inscripcion[0]['kardexeco_totalfinal'],2,".",","); ?></b></font>
        </td>
    </tr>
    <!--</tbody>-->
</table>   

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
        <b>USUARIO: </b><?php echo $inscripcion[0]['usuario_nombre'];
        echo "<b> / Trans.: </b>".$inscripcion[0]['inscripcion_id']; ?><br>
        </td>
    </tr>
</table>


    <a  href="javascript:close();" class="btn btn-sq-lg btn-danger no-print" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-sign-out fa-4x"></i><br><br>
       Salir <br>
    </a>