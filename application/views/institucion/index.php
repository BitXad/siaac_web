<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Institucion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('institucion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Institucion Id</th>
						<th>Institucion Nombre</th>
						<th>Institucion Direccion</th>
						<th>Institucion Telefono</th>
						<th>Institucion Fechacreacion</th>
						<th>Institucion Logo</th>
						<th>Institucion Ubicacion</th>
						<th>Institucion Distrito</th>
						<th>Institucion Zona</th>
						<th>Institucion Slogan</th>
						<th>Institucion Departamento</th>
						<th>Institucion Codigo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($institucion as $i){ ?>
                    <tr>
						<td><?php echo $i['institucion_id']; ?></td>
						<td><?php echo $i['institucion_nombre']; ?></td>
						<td><?php echo $i['institucion_direccion']; ?></td>
						<td><?php echo $i['institucion_telefono']; ?></td>
						<td><?php echo $i['institucion_fechacreacion']; ?></td>
						<td><?php echo $i['institucion_logo']; ?></td>
						<td><?php echo $i['institucion_ubicacion']; ?></td>
						<td><?php echo $i['institucion_distrito']; ?></td>
						<td><?php echo $i['institucion_zona']; ?></td>
						<td><?php echo $i['institucion_slogan']; ?></td>
						<td><?php echo $i['institucion_departamento']; ?></td>
						<td><?php echo $i['institucion_codigo']; ?></td>
						<td>
                            <a href="<?php echo site_url('institucion/edit/'.$i['institucion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('institucion/remove/'.$i['institucion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
