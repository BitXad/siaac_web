<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Plan de Pagos Mensualidades</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>MENS.</th>                        
						<th>MES</th>                        
                        <th>PARC.</th>
                        <th>DESC.</th>
                        <th>LIMITE</th>
                        <th>TOTAL</th>
                        <th>EFECT.</th>
                        <th>FECHA<br>PAGO</th>
						<th>PAGADO POR</th>
						
					
                    </tr>
                    <?php $i=0;
                    foreach($mensualidad as $m){ 
                    	$i = $i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $m['mensualidad_numero']; ?></td>
						<td ><?php echo $m['mensualidad_mes']; ?></td>
						<td style="text-align: right;"><?php echo $m['mensualidad_montoparcial']; ?></td>
						<td style="text-align: right;"><?php echo $m['mensualidad_descuento']; ?></td>
						<td style="text-align: center;"><?php echo date('d/m/Y', strtotime($m['mensualidad_fechalimite'])); ?></td>
						<td style="text-align: right;"><?php echo $m['mensualidad_montototal']; ?></td>
						<td style="text-align: right;"><?php echo $m['mensualidad_montocancelado']; ?></td>
						<td style="text-align: center;"><?php if ($m['mensualidad_fechapago']=='') { echo ("NO PAGADO");
                         
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($m['mensualidad_fechapago'])); } ?> <?php echo $m['mensualidad_horapago']; ?></td>
					
						<td><?php echo $m['mensualidad_nombre']; ?>
						<?php echo $m['mensualidad_ci']; ?></td>
						
						
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
         <a href="javascript:cerrar();" class="btn btn-danger">Cerrar</a>
    </div>
</div>
