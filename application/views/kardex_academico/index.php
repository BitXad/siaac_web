<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kardex Academico Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kardex_academico/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Kardexacad Id</th>
						<th>Inscripcion Id</th>
						<th>Kardexacad Notfinal1</th>
						<th>Kardexacad Notfinal2</th>
						<th>Kardexacad Notfinal3</th>
						<th>Kardexacad Notfinal4</th>
						<th>Kardexacad Notfinal5</th>
						<th>Kardexacad Notfinal</th>
						<th>Kardexacad Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kardex_academico as $k){ ?>
                    <tr>
						<td><?php echo $k['kardexacad_id']; ?></td>
						<td><?php echo $k['inscripcion_id']; ?></td>
						<td><?php echo $k['kardexacad_notfinal1']; ?></td>
						<td><?php echo $k['kardexacad_notfinal2']; ?></td>
						<td><?php echo $k['kardexacad_notfinal3']; ?></td>
						<td><?php echo $k['kardexacad_notfinal4']; ?></td>
						<td><?php echo $k['kardexacad_notfinal5']; ?></td>
						<td><?php echo $k['kardexacad_notfinal']; ?></td>
						<td><?php echo $k['kardexacad_estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('kardex_academico/edit/'.$k['kardexacad_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kardex_academico/remove/'.$k['kardexacad_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
