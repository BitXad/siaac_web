

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


table{
width : 7cm;
margin : 0 0 0px 0;
padding : 0 0 0 0;
border-spacing : 0 0;
border-collapse : collapse;
font-family: Arial narrow;
font-size: 7pt;  

}
td{
border:none!important;
}


td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 7px;
margin : 0 0 0 0;
padding : 0 1px 0 1px;
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
        <td>
                
            <center>
                               
                    <!--<img src="<?php echo base_url('resources/images/').$institucion['institucion_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="3" face="Arial"><b><?php echo $institucion['institucion_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $institucion['institucion_eslogan']; ?></b></font><br>-->
                    <font size="1" face="Arial"><b><?php echo "De: ".$institucion['institucion_slogan']; ?></b></font><br>
                    
                    <font size="1" face="Arial"><?php echo $institucion['institucion_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $institucion['institucion_ubicacion']; ?></font>
                
                    <br>
                   

                <font size="3" face="arial"><b>INGRESO</b></font> <br>
                <font size="1" face="arial"><b>NUMERO:  00<?php echo $ingreso[0]['ingreso_id']; ?> </b></font> <br>            
                             
                _______________________________________________
                <br> 
                <?php $fecha = new DateTime($ingreso[0]['ingreso_fecha']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $institucion['institucion_departamento'].", ".$fecha_d_m_a; ?> <br>
                    
                    <b>RECIBI DE: </b><?php echo $ingreso[0]['ingreso_nombre'].""; ?>
                <br>_______________________________________________

            </center>                      
     </td>
 </tr>
     
</table>

       <table class="table"  style="width: 7cm; margin: 0; padding: 0;" >
           <tr>
               <td align="left" ><b>LA SUMA DE: </b></td>
               <td align="right"><?php echo number_format($ingreso[0]['ingreso_monto'],2,'.',','); ?></td>
               
                               
           </tr>
           
           <tr>
               <td align="left"><b>POR CONCEPTO DE: </b></td>
               <td><?php echo $ingreso[0]['ingreso_categoria'];?><br>
                             (<?php echo $ingreso[0]['ingreso_concepto'];?>)</td>
                
               
           </tr>
               
       </table>
        <center  style="width: 7cm; padding-left: 8px;">
         <font size="1" face="arial"> _______________________________________________ </font>
        </center>  
<table class="table" style="max-width: 7cm;">
    <tr>
        
        <td align="right">
            
            
            <font size="2">
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($ingreso[0]['ingreso_monto'] ,2,'.',','); ?><br>
            </b>
            </font>
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($ingreso[0]['ingreso_monto'],' Bolivianos'); ?>           
            </font>
           
            
        </td>          
    </tr>
    <tr>
        <td nowrap>
           
            </font>
        </td>           
    </tr>
     
    <tr >
          <td>
             No. TRANSACCION:  <b> 00<?php echo $ingreso[0]['ingreso_numero']; ?> </b><br>
                    
               USUARIO: <b><?php echo $ingreso[0]['usuario_nombre']; ?></b>
            
         </td>
    </tr>    
    
</table>
<table class="table" style="max-width: 7cm;">
            <tr>
                <td> <center>
                
                        <?php echo "------------------------------------"; ?><br>
                        <?php echo "RECIBI CONFORME"; ?><br>
                    
                    </center>
                </td>
                <td width="20">
                    <?php echo "     "; ?><br>
                    <?php echo "     "; ?><br>
                </td>
                <td>
                    <center>

                        <?php echo "------------------------------------"; ?><br>
                        <?php echo "ENTREGUE CONFORME"; ?><br>   

                    </center>
                </td>
            </tr>
        </table>