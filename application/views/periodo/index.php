<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
<<<<<<< Updated upstream
                <h3 class="box-title">Periodo</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periodo/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
=======
                <h3 class="box-title">Periodos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periodo/nuevo'); ?>" class="btn btn-success btn-sm">Nuevo</a>
>>>>>>> Stashed changes
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                    <p><?php echo $this->session->flashdata('msg'); ?></p>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
<<<<<<< Updated upstream
						<th>#</th>
						<th>Nombre</th>
						<th>Hora Inicio</th>
						<th>Hora Fin</th>
						<th></th>
=======
						<th>ID</th>
						<th>Nombre</th>
						<th>Hora de inicio</th>
						<th>Hora fin</th>
						<th>Operaciones</th>
>>>>>>> Stashed changes
                    </tr>
                    <?php $i=0; 
                    foreach($periodo as $p){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $p['periodo_nombre']; ?></td>
<<<<<<< Updated upstream
                        <td><?php echo date("H:i", strtotime($p['periodo_horainicio'])); ?></td>
						<td><?php echo date("H:i", strtotime($p['periodo_horafin'])); ?></td>
						<td>
                            <a href="<?php echo site_url('periodo/edit/'.$p['periodo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!----<a href="<?php echo site_url('periodo/remove/'.$p['periodo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
=======
						<td><?php echo substr_replace($p['periodo_horainicio'] ,"", -3) ?></td>
						<td><?php echo substr_replace($p['periodo_horafin'] ,"", -3); ?></td>
						<td>
                            <a href="<?php echo site_url('periodo/editar/'.$p['periodo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('periodo/remove/'.$p['periodo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
>>>>>>> Stashed changes
                        </td>
                    </tr>
                    <?php } ?>
                    </table>
                                
            </div>
        </div>
    </div>
</div>
