<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Periodo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periodo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Periodo Id</th>
						<th>Periodo Nombre</th>
						<th>Periodo Horainicio</th>
						<th>Periodo Horafin</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($periodo as $p){ ?>
                    <tr>
						<td><?php echo $p['periodo_id']; ?></td>
						<td><?php echo $p['periodo_nombre']; ?></td>
						<td><?php echo $p['periodo_horainicio']; ?></td>
						<td><?php echo $p['periodo_horafin']; ?></td>
						<td>
                            <a href="<?php echo site_url('periodo/edit/'.$p['periodo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('periodo/remove/'.$p['periodo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
