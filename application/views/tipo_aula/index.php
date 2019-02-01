<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Aula Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_aula/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tipoaula  Id</th>
						<th>Tipoaula Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_aula as $t){ ?>
                    <tr>
						<td><?php echo $t['tipoaula _id']; ?></td>
						<td><?php echo $t['tipoaula_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_aula/edit/'.$t['tipoaula _id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_aula/remove/'.$t['tipoaula _id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
