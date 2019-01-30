<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Administrativo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('administrativo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Administrativo Id</th>
						<th>Estado Id</th>
						<th>Estadocivil Id</th>
						<th>Institucion Id</th>
						<th>Genero Id</th>
						<th>Administrativo Nombre</th>
						<th>Administrativo Apellidos</th>
						<th>Administrativo Fechanac</th>
						<th>Administrativo Edad</th>
						<th>Administrativo Ci</th>
						<th>Administrativo Extci</th>
						<th>Administrativo Codigo</th>
						<th>Administrativo Direccion</th>
						<th>Administrativo Telefono</th>
						<th>Administrativo Celular</th>
						<th>Administrativo Cargo</th>
						<th>Administrativo Foto</th>
						<th>Administrativo Fechareg</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($administrativo as $a){ ?>
                    <tr>
						<td><?php echo $a['administrativo_id']; ?></td>
						<td><?php echo $a['estado_id']; ?></td>
						<td><?php echo $a['estadocivil_id']; ?></td>
						<td><?php echo $a['institucion_id']; ?></td>
						<td><?php echo $a['genero_id']; ?></td>
						<td><?php echo $a['administrativo_nombre']; ?></td>
						<td><?php echo $a['administrativo_apellidos']; ?></td>
						<td><?php echo $a['administrativo_fechanac']; ?></td>
						<td><?php echo $a['administrativo_edad']; ?></td>
						<td><?php echo $a['administrativo_ci']; ?></td>
						<td><?php echo $a['administrativo_extci']; ?></td>
						<td><?php echo $a['administrativo_codigo']; ?></td>
						<td><?php echo $a['administrativo_direccion']; ?></td>
						<td><?php echo $a['administrativo_telefono']; ?></td>
						<td><?php echo $a['administrativo_celular']; ?></td>
						<td><?php echo $a['administrativo_cargo']; ?></td>
						<td><?php echo $a['administrativo_foto']; ?></td>
						<td><?php echo $a['administrativo_fechareg']; ?></td>
						<td>
                            <a href="<?php echo site_url('administrativo/edit/'.$a['administrativo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('administrativo/remove/'.$a['administrativo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
