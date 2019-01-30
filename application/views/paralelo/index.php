<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Paralelo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('paralelo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Paralelo Id</th>
						<th>Estado Id</th>
						<th>Paralelo Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($paralelo as $p){ ?>
                    <tr>
						<td><?php echo $p['paralelo_id']; ?></td>
						<td><?php echo $p['estado_id']; ?></td>
						<td><?php echo $p['paralelo_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('paralelo/edit/'.$p['paralelo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('paralelo/remove/'.$p['paralelo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
