<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Area Carrera Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('area_carrera/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Areacarrera Id</th>
						<th>Areacarrera Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($area_carrera as $a){ ?>
                    <tr>
						<td><?php echo $a['areacarrera_id']; ?></td>
						<td><?php echo $a['areacarrera_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('area_carrera/edit/'.$a['areacarrera_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('area_carrera/remove/'.$a['areacarrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
