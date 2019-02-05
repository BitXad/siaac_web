<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nivel Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('nivel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nivel Id</th>
						<th>Plan Academico Id</th>
						<th>Nivel Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($nivel as $n){ ?>
                    <tr>
						<td><?php echo $n['nivel_id']; ?></td>
						<td><?php echo $n['plan_academico_id']; ?></td>
						<td><?php echo $n['nivel_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('nivel/edit/'.$n['nivel_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('nivel/remove/'.$n['nivel_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
