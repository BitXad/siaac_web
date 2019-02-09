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
						<th>Estado Id</th>
						<th>Kardexeco Id</th>
						<th>Usuario Id</th>
						<th>Numero</th>
						<th>Montoparcial</th>
						<th>Descuento</th>
						<th>Montototal</th>
						<th>Fechalimite</th>
						<th>Mora</th>
						<th>Fechapago</th>
						<th>Horapago</th>
						<th>Nombre</th>
						<th>Ci</th>
						<th>Glosa</th>
						<th></th>
                    </tr>
                    <?php foreach($mensualidad as $m){ ?>
                    <tr>
						<td><?php echo $m['mensualidad_id']; ?></td>
						<td><?php echo $m['estado_id']; ?></td>
						<td><?php echo $m['kardexeco_id']; ?></td>
						<td><?php echo $m['usuario_id']; ?></td>
						<td><?php echo $m['mensualidad_numero']; ?></td>
						<td><?php echo $m['mensualidad_montoparcial']; ?></td>
						<td><?php echo $m['mensualidad_descuento']; ?></td>
						<td><?php echo $m['mensualidad_montototal']; ?></td>
						<td><?php echo $m['mensualidad_fechalimite']; ?></td>
						<td><?php echo $m['mensualidad_mora']; ?></td>
						<td><?php echo $m['mensualidad_fechapago']; ?></td>
						<td><?php echo $m['mensualidad_horapago']; ?></td>
						<td><?php echo $m['mensualidad_nombre']; ?></td>
						<td><?php echo $m['mensualidad_ci']; ?></td>
						<td><?php echo $m['mensualidad_glosa']; ?></td>
						
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
