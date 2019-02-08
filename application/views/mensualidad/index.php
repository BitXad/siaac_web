<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mensualidad Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('mensualidad/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Mensualidad Id</th>
						<th>Estado Id</th>
						<th>Kardexeco Id</th>
						<th>Usuario Id</th>
						<th>Mensualidad Numero</th>
						<th>Mensualidad Montoparcial</th>
						<th>Mensualidad Descuento</th>
						<th>Mensualidad Montototal</th>
						<th>Mensualidad Fechalimite</th>
						<th>Mensualidad Mora</th>
						<th>Mensualidad Fechapago</th>
						<th>Mensualidad Horapago</th>
						<th>Mensualidad Nombre</th>
						<th>Mensualidad Ci</th>
						<th>Mensualidad Glosa</th>
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
						<td>
                            <a href="<?php echo site_url('mensualidad/edit/'.$m['mensualidad_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('mensualidad/remove/'.$m['mensualidad_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
