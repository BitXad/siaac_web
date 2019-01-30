<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Inscripcion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('inscripcion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Inscripcion Id</th>
						<th>Usuario Id</th>
						<th>Gestion Id</th>
						<th>Estudiante Id</th>
						<th>Paralelo Id</th>
						<th>Nivel Id</th>
						<th>Turno Id</th>
						<th>Inscripcion Fecha</th>
						<th>Inscripcion Hora</th>
						<th>Inscripcion Fechainicio</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($inscripcion as $i){ ?>
                    <tr>
						<td><?php echo $i['inscripcion_id']; ?></td>
						<td><?php echo $i['usuario_id']; ?></td>
						<td><?php echo $i['gestion_id']; ?></td>
						<td><?php echo $i['estudiante_id']; ?></td>
						<td><?php echo $i['paralelo_id']; ?></td>
						<td><?php echo $i['nivel_id']; ?></td>
						<td><?php echo $i['turno_id']; ?></td>
						<td><?php echo $i['inscripcion_fecha']; ?></td>
						<td><?php echo $i['inscripcion_hora']; ?></td>
						<td><?php echo $i['inscripcion_fechainicio']; ?></td>
						<td>
                            <a href="<?php echo site_url('inscripcion/edit/'.$i['inscripcion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('inscripcion/remove/'.$i['inscripcion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
