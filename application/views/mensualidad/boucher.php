

<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
                                            /*function imprimir()
                                            {
                                                /*$('#paraboucher').css('max-width','7cm !important');*/
                                                /* window.print(); 
                                            }*/
    });
</script>
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

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
.box-body {
padding-top: 0px;
  
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
th {
text-align: center;
}
td{
border: none!important;
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
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->


<table class="table" style="width: 7cm; margin-bottom: 0px;" >
    <tr>
        <td style="padding-bottom: 0px;">
                
            <center>
                               
                    <img src="<?php echo base_url('resources/images/institucion/'.$institucion['institucion_logo']); ?>" width="100" height="60"><br>
                    <font size="3" face="Arial"><b><?php echo $institucion['institucion_nombre']; ?></b></font><br>
                    <font size="2" face="Arial"><b><?php echo $institucion['institucion_slogan']; ?></b></font><br>
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$institucion['institucion_propietario']; ?></b></font><br>-->
                    
                    <font size="1" face="Arial"><?php echo $institucion['institucion_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_ubicacion']; ?></font>
                
                    <br>
                   

                <font size="3" face="arial"><b>FACTURA</b></font> <br>
                <font size="1" face="arial"><b>ORIGINAL</b></font> <br>
                _______________________________________________                
                   
                <!--<div class="panel panel-primary col-md-12" style="width: 6cm;">-->
                <table style="width: 6cm;">
                    <tr>
                        <td style="font-family: arial; font-size: 8pt;">

                            <b>NIT:  </b><br>
                            <b>AUTORIZACION:</b><br>
                            <b>No. FACT.: </b>
                           

                        </td>
                        <td style="font-family: arial; font-size: 8pt;">
                            
                            <?php echo $mensualidad[0]['estudiante_razon']; ?> <br>
                            <?php echo $mensualidad[0]['estudiante_razon']; ?>  <br>   
                            <?php echo $mensualidad[0]['mensualidad_numrec']; ?>  
                        </td>
                    </tr>
                </table>
<!--                </div>-->

            <!--<center>-->                        
                <!--<div class="panel" style="width: 7cm; ">-->
               
               
                _______________________________________________
                <br> 
                <?php $fecha = new DateTime($mensualidad[0]['mensualidad_fechapago']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo "COCHABAMBA".", ".$fecha_d_m_a; ?> <br>
                    
                    <b>NIT/CI: </b><?php echo $mensualidad[0]['estudiante_nit'].""; ?><br>
                    <b>SEÑORES: </b><?php echo $mensualidad[0]['estudiante_razon'].""; ?>
                <br>_______________________________________________

            </center>                      
        </td>
    </tr>
     
</table>

      
  
           <div class="box-body ">  

        <table class="table table-striped table-condensed" border-bottom="1" id="mitabla" style="width: 7cm;">                        
                        <tr>

                           
                            <th>CAN.</th>
                            
                            <th style="text-align: center;padding-left: 0px;padding-right: 0px;">DESCRIPCION</th>
                            
                            
                            <th>UNIT.</th>
                            
                            <?php 

                            $desc = $mensualidad[0]['mensualidad_descuento'];
                            if ($desc!=0) {  ?>
                            <th>SUBT.</th>
                            <th>DESC.</th>
                            <?php } ?>
                            <th>TOTAL</th>
                        
                       
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
                    
                           <?php } ?>

</table>
 
   <div class="box6" style="padding: 0px;">
           <div class="left">
                <div class="row" style="padding-left: 22px; font-size: 11px;">Nota.- 
                            <b><?php echo $mensualidad[0]['mensualidad_glosa'];?> </b>
          </div></div>
          </div>
          <div style="font-family: arial; font-size: 8pt;">
        <br>____________________________________________
        </div>
          
   
<table class="table" style="max-width: 7cm;">
    <tr>
        
        <td align="right">
            
            
            <font size="1">
                 <b>
                <?php echo "TOTAL Bs: ".number_format($mensualidad[0]['mensualidad_montocancelado'] ,2,'.',','); ?><br>
            </b>
           
        </font>
            
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($mensualidad[0]['mensualidad_montocancelado'],' Bolivianos'); ?>         
            </font>
 
        </td>          
    </tr>
   
</table>
<div style="font-family: arial; font-size: 8pt; border-top: 0PX;">
        ____________________________________________
        </div>
<table class="table" style="max-width: 7cm;">
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