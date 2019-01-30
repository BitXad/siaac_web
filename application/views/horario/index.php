<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Horario Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('horario/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Horario Id</th>
						<th>Estado Id</th>
						<th>Periodo Id</th>
						<th>Horario Desde</th>
						<th>Horario Hasta</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($horario as $h){ ?>
                    <tr>
						<td><?php echo $h['horario_id']; ?></td>
						<td><?php echo $h['estado_id']; ?></td>
						<td><?php echo $h['periodo_id']; ?></td>
						<td><?php echo $h['horario_desde']; ?></td>
						<td><?php echo $h['horario_hasta']; ?></td>
						<td>
                            <a href="<?php echo site_url('horario/edit/'.$h['horario_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('horario/remove/'.$h['horario_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
