<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aula Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aula/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Aula Id</th>
						<th>Aula Nombre</th>
						<th>Aula Descripcion</th>
						<th>Aula Capacidad</th>
						<th>Aula Tipo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($aula as $a){ ?>
                    <tr>
						<td><?php echo $a['aula_id']; ?></td>
						<td><?php echo $a['aula_nombre']; ?></td>
						<td><?php echo $a['aula_descripcion']; ?></td>
						<td><?php echo $a['aula_capacidad']; ?></td>
						<td><?php echo $a['aula_tipo']; ?></td>
						<td>
                            <a href="<?php echo site_url('aula/edit/'.$a['aula_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('aula/remove/'.$a['aula_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
