<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Area Materia Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('area_materium/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Area Id</th>
						<th>Area Nombre</th>
						<th>Area Fechareg</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($area_materia as $a){ ?>
                    <tr>
						<td><?php echo $a['area_id']; ?></td>
						<td><?php echo $a['area_nombre']; ?></td>
						<td><?php echo $a['area_fechareg']; ?></td>
						<td>
                            <a href="<?php echo site_url('area_materium/edit/'.$a['area_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('area_materium/remove/'.$a['area_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
