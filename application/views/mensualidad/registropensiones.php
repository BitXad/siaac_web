<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>
<div class="row">
    <div class="cuerpo">
                    <div class="columna_derecha"  style="width:40%;">
                        <center> 
                     <h3 class="box-title">REGISTRO DE PENSIONES</h3>
                        <?php echo date('d/m/Y H:i:s'); ?>
                    </center>
                    <b>CARRERA: <?php echo $mensualidad[0]['carrera_nombre']; ?></b>
                    </div>
                    <div class="columna_izquierda">
                       <center>   <?php echo "<img src='/siaac_web/resources/images/institucion/".$institucion['institucion_logo']."';  style='width:90px;height:80px'>"; ?>
                     </center></div>
                    <div class="columna_central">
                        <center>  <font size="3"><b><u><?php echo $institucion['institucion_nombre']; ?></u></b></font><br>
                        <?php echo $institucion['institucion_zona']; ?> - <?php echo $institucion['institucion_direccion']; ?><br>
                        <?php echo $institucion['institucion_telefono']; ?><br>
                        <?php echo $institucion['institucion_departamento']; ?> - BOLIVIA
                     </center>
                    </div>

          

            </div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              
            <div class="box-body">
                <table class="table-striped table-condensed" id="mitabla">
                    <tr>
						
						<th>GRUPO</th>                        
						<th>#</th>                        
                        <th>NOMBRE</th>
                        <th>C.I.</th>
                        <th>F.NAC.</th>
                        <th>TELF.</th>
                        <th>PAGO<BR>MES 1</th>
                        <th>PAGO<BR>MES 2</th>
                        <th>PAGO<BR>MES 3</th>
                        <th>PAGO<BR>MES 4</th>
                        <th>PAGO<BR>MES 5</th>
                        <th>PAGO<BR>MES 6</th>
                        <th>PAGO<BR>MES 7</th>
                        <th>PAGO<BR>MES 8</th>
                        <th>PAGO<BR>MES 9</th>
                        <th>PAGO<BR>MES 10</th>
                        <th>PAGO<BR>MES 11</th>
                        <th>PAGO<BR>MES 12</th>
						
					
                    </tr>
                    <?php $i=0;
                    
                    foreach($mensualidad as $m){ 
                    	$i = $i+1; 
                        ?>
                    <tr>
						
						<td><?php echo $m['grupo_nombre']; ?></td>
						<td ><?php echo $i; ?></td>
                        <td><?php echo $m['estudiante_apellidos']; ?> <?php echo $m['estudiante_nombre']; ?></td>
                        <td><?php echo $m['estudiante_ci']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($m['estudiante_fechanac'])); ?></td>
                        <td><?php echo $m['estudiante_telefono']; ?></td>
                        
                        <?php   foreach($pensiones as $p) { if ($p['kardexeco_id']==$m['kardexeco_id']) {                           
                               
                                $concatenar=$p['sux'];  ?>
                               <td style="text-align: center;"><?php  echo number_format($concatenar, 2, ".", ","); ?> /
                              <?php echo number_format($m['kardexeco_mensualidad'], 2, ".", ","); ?><br>
                        <?php if ($p['mensualidad_fechapago']=='') { echo date('d/m/Y', strtotime($p['mensualidad_fechalimite']));
                         
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($p['mensualidad_fechapago'])); } ?></td>
                           
        
                       <?php   } }  ?>
                       
                         
						
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
            <div class="cuerpo" style="padding-left: 80px; padding-right: 80px;">
                    <div class="columna_derecha">
                     
                    </div>
                    <div class="columna_izquierda">
                      </div> 
                    <div class="columna_central">
                        <CENTER>
                      <hr style="border-color: black; width: 50%;">
                        RESPONSABLE
                    </CENTER></div>

            </div>
        </div>
         <a href="javascript:cerrar();" class="btn btn-danger no-print">Cerrar</a>
    </div>
</div>
