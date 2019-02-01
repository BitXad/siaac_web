<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aula</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aula/add'); ?>" class="btn btn-success btn-sm">Registrar Aula</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Aula Nombre</th>
						<th>Aula Descripcion</th>
						<th>Aula Capacidad</th>
						<th>Aula Tipo</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($aula as $a){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont;  ?></td>
						<td><?php echo $a['aula_nombre']; ?></td>
						<td><?php echo $a['aula_descripcion']; ?></td>
						<td><?php echo $a['aula_capacidad']; ?></td>
						<td><?php echo $a['aula_tipo']; ?></td>
						<td>
                            <a href="<?php echo site_url('aula/edit/'.$a['aula_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('aula/remove/'.$a['aula_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
