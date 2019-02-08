<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Periodo</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periodo/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Hora Inicio</th>
						<th>Hora Fin</th>
						<th></th>
                    </tr>
                    <?php $i=0; 
                    foreach($periodo as $p){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $p['periodo_nombre']; ?></td>
                        <td><?php echo date("H:i", strtotime($p['periodo_horainicio'])); ?></td>
						<td><?php echo date("H:i", strtotime($p['periodo_horafin'])); ?></td>
						<td>
                            <a href="<?php echo site_url('periodo/edit/'.$p['periodo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!----<a href="<?php echo site_url('periodo/remove/'.$p['periodo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                    </table>
                                
            </div>
        </div>
    </div>
</div>
