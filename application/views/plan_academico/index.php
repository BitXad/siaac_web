<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Plan Academico Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('plan_academico/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Plan Academico Id</th>
						<th>Estado Id</th>
						<th>Carrera Id</th>
						<th>Plan Academico Nombre</th>
						<th>Plan Academico Feccreacion</th>
						<th>Plan Academico Codigo</th>
						<th>Plan Academico Titmodalidad</th>
						<th>Plan Academico Cantgestion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($plan_academico as $p){ ?>
                    <tr>
						<td><?php echo $p['plan_academico_id']; ?></td>
						<td><?php echo $p['estado_id']; ?></td>
						<td><?php echo $p['carrera_id']; ?></td>
						<td><?php echo $p['plan_academico_nombre']; ?></td>
						<td><?php echo $p['plan_academico_feccreacion']; ?></td>
						<td><?php echo $p['plan_academico_codigo']; ?></td>
						<td><?php echo $p['plan_academico_titmodalidad']; ?></td>
						<td><?php echo $p['plan_academico_cantgestion']; ?></td>
						<td>
                            <a href="<?php echo site_url('plan_academico/edit/'.$p['plan_academico_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('plan_academico/remove/'.$p['plan_academico_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
