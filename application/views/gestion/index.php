<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Gestion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('gestion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Gestion Id</th>
						<th>Estado Id</th>
						<th>Gestion Semestre</th>
						<th>Gestion Inicio</th>
						<th>Gestion Fin</th>
						<th>Gestion Estado</th>
						<th>Gestion Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($gestion as $g){ ?>
                    <tr>
						<td><?php echo $g['gestion_id']; ?></td>
						<td><?php echo $g['estado_id']; ?></td>
						<td><?php echo $g['gestion_semestre']; ?></td>
						<td><?php echo $g['gestion_inicio']; ?></td>
						<td><?php echo $g['gestion_fin']; ?></td>
						<td><?php echo $g['gestion_estado']; ?></td>
						<td><?php echo $g['gestion_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('gestion/edit/'.$g['gestion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('gestion/remove/'.$g['gestion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>