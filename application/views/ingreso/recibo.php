<style>@page 
            body {
                text-align: left;
        }
      
.box1 {
width:100%;
margin:0% 10%;
padding:10px;
align-content:  right;
border:2px solid black;
border-bottom: 0px;
border-right: 0px;
}
.box2 {

margin:2% 15%;
padding:5px;
border:2px solid black;
}

.box3 {
width:100%;
margin:0% 0% 0% 0%;
padding:1px;
border:2px solid black;
}
.box4 {
width:100%;
margin:0% 0% 0% 0%;
padding-top:40px;
border:2px solid black;
border-top: 0px;
}


    .box {
        overflow: hidden;
    }

    .content {
        font-size: 15px;
        line-height: 20px;
        padding: 0 20px;
        text-align: justify;
    }

    .left {
        float: left;
        width: 50%;
    }

    .left .content {
        border-right: 5px solid #4BB495  ;
    }

    .right {
        float: right;
        width: 50%;
    }

     .left1 {
        float: left;
        width: 25%;
    }
     .medio1 {
        float: left;
        width: 35%;
    }
       .right1 {
        float: right;
        width: 40%;
    }

         </style>
         <div class="box">
        <div class="row"> 
         <link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="cuerpo">
                    <div class="columna_derecha">
                        <center> 
                        <?php echo "<img src='/siaac_web/resources/images/institucion/".$institucion['institucion_logo']."';  style='width:90px;height:90px'>"; ?>
                    </center>
                    </div>
                    <div class="columna_izquierda">
                       <center>  <font size="4"><b><u><?php echo $institucion['institucion_nombre']; ?></u></b></font><br>
                        <?php echo $institucion['institucion_zona']; ?><br>
                        <?php echo $institucion['institucion_direccion']; ?><br>
                        <?php echo $institucion['institucion_telefono']; ?>
                    </div> </center>
                    <div class="columna_central">
                        <center>      <h3 class="box-title"><u>RECIBO DE INGRESO</u></h3>
                           Numero: <b><?php echo $ingresos[0]['ingreso_id'];?></b>  <br>
                          Numero transaccion: <b><?php echo$ingresos[0]['ingreso_numero'];?></b>
               
                </center>
                    </div>

          

            </div>       
           <div class="row" style="padding-left: 17%;">
                       <div class="left">
                Fecha y Hora: 
                            <b><?php echo date('d/m/Y  H:i:s',strtotime($ingresos[0]['ingreso_fecha']));?></b>            
                 
            </div>
            <div class="right">
                Apellidos y Nombre(s): <b><?php echo$ingresos[0]['ingreso_nombre'];?></b>  
            </div>
        </div>
      
                            
 <div class="box3">            

              <div class="box2">                        
                        
                        <th>MONTO:  </th>
                            
                            <td><?php echo$ingresos[0]['ingreso_monto'];?><?php echo$ingresos[0]['ingreso_moneda'];?></td>                      
    </div>

              <div class="box2">
                        <th>CONCEPTO:    </th>
                             <td><?php echo$ingresos[0]['ingreso_categoria'];?></td>
                             <td>(<?php echo$ingresos[0]['ingreso_concepto'];?>)</td>


              </div> 

              <div class="box2">
                        <th>SON:    </th>
                             <td> <?php echo num_to_letras($ingresos[0]['ingreso_monto']);?> </td>
                

              </div> 

           
             <div class="box2">          
            <th>CAJERO:  </th>
            <td><?php echo$ingresos[0]['usuario_nombre'];?></td>
             </div> 
</div>
 <div class="right" style="text-align: right; padding-right: 10px;">
                 <font size="2" style=""><?php echo date("d/m/Y   H:i:s  .")  ; ?></font>   
                 
            </div>
 <div class="box4" >            

<center>
              <div class="row" style="padding-left: 15%; ">
            <div class="left">
                
                <?php echo "---------------------------------"; ?><br>
                    Firma interesado.
               
            </div>
            <div class="left1">
                
                <?php echo "---------------------------------"; ?><br>
                    Firma cajero.
                
            </div>
        </div>
 </center>
</div>
</div>