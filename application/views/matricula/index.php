<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Matricula Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('matricula/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Matricula Id</th>
						<th>Inscripcion Id</th>
						<th>Matricula Fechapago</th>
						<th>Matricula Horapago</th>
						<th>Matricula Fechalimite</th>
						<th>Matricula Monto</th>
						<th>Matricula Descuento</th>
						<th>Matricula Total</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($matricula as $m){ ?>
                    <tr>
						<td><?php echo $m['matricula_id']; ?></td>
						<td><?php echo $m['inscripcion_id']; ?></td>
						<td><?php echo $m['matricula_fechapago']; ?></td>
						<td><?php echo $m['matricula_horapago']; ?></td>
						<td><?php echo $m['matricula_fechalimite']; ?></td>
						<td><?php echo $m['matricula_monto']; ?></td>
						<td><?php echo $m['matricula_descuento']; ?></td>
						<td><?php echo $m['matricula_total']; ?></td>
						<td>
                            <a href="<?php echo site_url('matricula/edit/'.$m['matricula_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('matricula/remove/'.$m['matricula_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
