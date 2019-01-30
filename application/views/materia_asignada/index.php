<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Materia Asignada Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('materia_asignada/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Materiaasig Id</th>
						<th>Estado Id</th>
						<th>Kardexacad Id</th>
						<th>Materiaasig Nombre</th>
						<th>Materiaasig Codigo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($materia_asignada as $m){ ?>
                    <tr>
						<td><?php echo $m['materiaasig_id']; ?></td>
						<td><?php echo $m['estado_id']; ?></td>
						<td><?php echo $m['kardexacad_id']; ?></td>
						<td><?php echo $m['materiaasig_nombre']; ?></td>
						<td><?php echo $m['materiaasig_codigo']; ?></td>
						<td>
                            <a href="<?php echo site_url('materia_asignada/edit/'.$m['materiaasig_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('materia_asignada/remove/'.$m['materiaasig_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
