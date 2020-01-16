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
<?php $padding = "style='padding:0; '"; ?>
<div class="container">
    
<table>
    <tr>
        <td width="300">
                     <center>                        
                        <font size="3" face="Arial"><b><?php echo $institucion[0]['institucion_nombre']; ?></b></font><br>
                        <font size="2" face="Arial"><b><?php echo $institucion[0]['institucion_slogan']; ?></b></font><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_direccion']; ?><br>
                        <font size="1" face="Arial"><?php echo $institucion[0]['institucion_telefono']; ?></font><br>
                    </center>           
        </td>
        <td width="300">
            <center>
                <font size="3" face="arial"><b>COMPROBANTE DE INSCRIPCION</b></font><br>
                <font size="2" face="arial"><b>Nº: 00<?php echo $inscripcion[0]['inscripcion_id']; ?></b></font>
            </center>
            
        </td>
        <td width="300">

<!--                <h5><b>Tipo: </b><?php /*echo $inscripcion[0]['tipotrans_nombre']; ?> <br>
                <b>Cred. Nº: </b><?php echo $inscripcion[0]['cliente_codigo']; ?> <br>
                <b>Limite: </b><?php echo $inscripcion[0]['venta_fecha'];*/ ?></h5>       -->
        
        </td>            
    </tr>    
</table>
</div>

    
<div class="container">
    <div class="panel panel-primary col-md-8">
        <h5><b>Estudiante: </b><?php echo $inscripcion[0]['estudiante_apellidos'].", ".$inscripcion[0]['estudiante_nombre']; ?> <br>
        <b>Código: </b><?php echo $inscripcion[0]['estudiante_codigo']; ?> <br>
        <b>Fecha/Hora: </b><?php echo $inscripcion[0]['inscripcion_fecha']; ?></h5>       
    </div>
</div>



<div >
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
<!--                  <div class="input-group  no-print"> <span class="input-group-addon">Buscar</span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el codigo, venta, precio">
                  </div>-->
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" >
                    <tr >
                        <td <?php echo $padding; ?>><b>CARRERA:</b></td>
                        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['carrera_nombre']; ?></td>
                    </tr>
                    
                    <tr>
                        <td <?php echo $padding; ?>><b>NIVEL:</b></td>
                        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['nivel_id']; ?></td>
                    </tr>
                    
                    <tr>
                        <td <?php echo $padding; ?>><b>MATRICULA:</b></td>
                        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['kardexeco_matricula']; ?></td>
                    </tr>
                    
                    <tr>
                        <td <?php echo $padding; ?>><b>MENSUALIDAD:</b></td>
                        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['kardexeco_mensualidad']; ?></td>
                    </tr>
                    
                    
                    <tr>
                        <td <?php echo $padding; ?>><b>INICIO DE CLASES:</b></td>
                        <td <?php echo $padding; ?>><?php echo $inscripcion[0]['inscripcion_fechainicio']; ?></td>
                    </tr>
                    
                    
                    <tr>
                        
                        
                    </tr>                 
                </table>
                
            </div>
            
        </div>
    </div>
</div>
<b>Usuario: </b><?php echo $inscripcion[0]['usuario_nombre']; ?>

<center>
    <div class="col-md-12">
        <table>
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
        </table>
        
    </div>
    
</center>   

    <a  href="javascript:close();" class="btn btn-sq-lg btn-danger no-print" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-sign-out fa-4x"></i><br><br>
       Salir <br>
    </a>