<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detalle Factura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('detalle_factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Detalle Id</th>
						<th>Factura Id</th>
						<th>Detalle Descripcion</th>
						<th>Detalle Cantidad</th>
						<th>Detalle Precio</th>
						<th>Detalle Subtotal</th>
						<th>Detalle Descuento</th>
						<th>Detalle Totalfinal</th>
						<th>Detalle Caracteristicas</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($detalle_factura as $d){ ?>
                    <tr>
						<td><?php echo $d['detalle_id']; ?></td>
						<td><?php echo $d['factura_id']; ?></td>
						<td><?php echo $d['detalle_descripcion']; ?></td>
						<td><?php echo $d['detalle_cantidad']; ?></td>
						<td><?php echo $d['detalle_precio']; ?></td>
						<td><?php echo $d['detalle_subtotal']; ?></td>
						<td><?php echo $d['detalle_descuento']; ?></td>
						<td><?php echo $d['detalle_totalfinal']; ?></td>
						<td><?php echo $d['detalle_caracteristicas']; ?></td>
						<td>
                            <a href="<?php echo site_url('detalle_factura/edit/'.$d['detalle_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('detalle_factura/remove/'.$d['detalle_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
