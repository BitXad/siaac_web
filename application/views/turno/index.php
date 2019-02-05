<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Turno Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('turno/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Turno Id</th>
						<th>Estado Id</th>
						<th>Turno Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($turno as $t){ ?>
                    <tr>
						<td><?php echo $t['turno_id']; ?></td>
						<td><?php echo $t['estado_id']; ?></td>
						<td><?php echo $t['turno_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('turno/edit/'.$t['turno_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('turno/remove/'.$t['turno_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
