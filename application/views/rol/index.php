<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rol Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rol/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Rol Id</th>
						<th>Estado Id</th>
						<th>Rol Nombre</th>
						<th>Rol Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($rol as $r){ ?>
                    <tr>
						<td><?php echo $r['rol_id']; ?></td>
						<td><?php echo $r['estado_id']; ?></td>
						<td><?php echo $r['rol_nombre']; ?></td>
						<td><?php echo $r['rol_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('rol/edit/'.$r['rol_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('rol/remove/'.$r['rol_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
