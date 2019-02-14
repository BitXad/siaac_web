<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<style type="text/css">
   @media print{@page {size: landscape;
   margin-top: 0mm;
    margin-left: 0mm;
    margin-right: 0mm;}
        
}  @page{
    margin-top: 0mm;
    margin-left: 0mm;
    margin-right: 0mm; }
  
</style>
<!-------------------------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>
<div class="row" >
    <div class="cuerpo">
                    <div class="columna_derecha"  style="width:40%;">
                        <center> 
                     <h3 class="box-title">REGISTRO DE PENSIONES</h3>
                        <?php echo date('d/m/Y H:i:s'); ?>
                    </center>
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
        <div class="box" style="padding-left: 0px;">
            <div class="box-header">
              <b>CARRERA: <?php echo $mensualidad[0]['carrera_nombre']; ?></b><b>  GRUPO: <?php echo $mensualidad[0]['grupo_nombre']; ?></b>
            <div class="box-body">
                <table class="table-condensed" id="mitabla">
                    <tr>
						               
						<th style="width: 1%;">#</th>                        
                        <th>ESTUDIANATE</th>
                        <th>PAGO<BR>MES 1</th>
                        <th>PAGO<BR>MES 2</th>
                        <th>PAGO<BR>MES 3</th>
                        <th>PAGO<BR>MES 4</th>
                        <th>PAGO<BR>MES 5</th>
                        <th>PAGO<BR>MES 6</th><th>PAGO<BR>MES 4</th>
                        <th>PAGO<BR>MES 5</th>
                        <th>PAGO<BR>MES 6</th><th>PAGO<BR>MES 4</th>
                        <th>PAGO<BR>MES 5</th>
                        <th>PAGO<BR>MES 6</th>
					
                    </tr>
                    <?php $i=0;
                    
                    foreach($mensualidad as $m){ 
                    	$i = $i+1; 
                        ?>
                    <tr>
						
						
						<td ><?php echo $i; ?></td>
                        <td style="padding-left: 1px;padding-right: 0px;width: 150px;"><?php echo $m['estudiante_apellidos']; ?> <?php echo $m['estudiante_nombre']; ?></br>
                        C.I.: <?php echo $m['estudiante_ci']; ?> TELF.:<?php echo $m['estudiante_telefono']; ?></td>
                    
                        
                        <?php   foreach($pensiones as $p) { if ($p['kardexeco_id']==$m['kardexeco_id']) {                           
                               
                                $concatenar=$p['sux'];  ?>
                               <td style="text-align: center; width: 75px; font-size: 8px; padding-left: 0px;padding-right: 0px;"><font size="1"><?php  echo number_format($concatenar, 2, ".", ","); ?> /
                              <?php echo number_format($m['kardexeco_mensualidad'], 2, ".", ","); ?></font><br>
                        <?php if ($p['fecha']=='') { echo date('d/m/Y', strtotime($p['mensualidad_fechalimite']));
                       $hoy = new DateTime(); $retraso = new DateTime($p['mensualidad_fechalimite']); $diasmora = $retraso->diff($hoy); echo "(", $diasmora->d, ")";
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($p['fecha'])); } ?></td>
                           
        
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
