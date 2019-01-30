<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Estudiante Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Estudiante Id</th>
						<th>Estado Id</th>
						<th>Genero Id</th>
						<th>Estadocivil Id</th>
						<th>Estudiante Nombre</th>
						<th>Estudiante Apellidos</th>
						<th>Estudiante Fechanac</th>
						<th>Estudiante Edad</th>
						<th>Estudiante Ci</th>
						<th>Estudiante Extci</th>
						<th>Estudiante Direccion</th>
						<th>Estudiante Telefono</th>
						<th>Estudiante Celular</th>
						<th>Estudiante Foto</th>
						<th>Estudiante Lugarnac</th>
						<th>Estudiante Nacionalidad</th>
						<th>Estudiante Establecimiento</th>
						<th>Estudiante Distrito</th>
						<th>Estudiante Apoderado</th>
						<th>Apoderado Foto</th>
						<th>Estudiante Apodireccion</th>
						<th>Estudiante Apoparentesco</th>
						<th>Estudiante Apotelefono</th>
						<th>Estudiante Nit</th>
						<th>Estudiante Razon</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($estudiante as $e){ ?>
                    <tr>
						<td><?php echo $e['estudiante_id']; ?></td>
						<td><?php echo $e['estado_id']; ?></td>
						<td><?php echo $e['genero_id']; ?></td>
						<td><?php echo $e['estadocivil_id']; ?></td>
						<td><?php echo $e['estudiante_nombre']; ?></td>
						<td><?php echo $e['estudiante_apellidos']; ?></td>
						<td><?php echo $e['estudiante_fechanac']; ?></td>
						<td><?php echo $e['estudiante_edad']; ?></td>
						<td><?php echo $e['estudiante_ci']; ?></td>
						<td><?php echo $e['estudiante_extci']; ?></td>
						<td><?php echo $e['estudiante_direccion']; ?></td>
						<td><?php echo $e['estudiante_telefono']; ?></td>
						<td><?php echo $e['estudiante_celular']; ?></td>
						<td><?php echo $e['estudiante_foto']; ?></td>
						<td><?php echo $e['estudiante_lugarnac']; ?></td>
						<td><?php echo $e['estudiante_nacionalidad']; ?></td>
						<td><?php echo $e['estudiante_establecimiento']; ?></td>
						<td><?php echo $e['estudiante_distrito']; ?></td>
						<td><?php echo $e['estudiante_apoderado']; ?></td>
						<td><?php echo $e['apoderado_foto']; ?></td>
						<td><?php echo $e['estudiante_apodireccion']; ?></td>
						<td><?php echo $e['estudiante_apoparentesco']; ?></td>
						<td><?php echo $e['estudiante_apotelefono']; ?></td>
						<td><?php echo $e['estudiante_nit']; ?></td>
						<td><?php echo $e['estudiante_razon']; ?></td>
						<td>
                            <a href="<?php echo site_url('estudiante/edit/'.$e['estudiante_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('estudiante/remove/'.$e['estudiante_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
