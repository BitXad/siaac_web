<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Estudiante</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success btn-sm">Registrar Estudiante</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th> Nombre</th>
						<th>Estado</th>
						<th>Genero Id</th>
						<th>Estadocivil Id</th>
						<th> Fechanac<br>
						Edad</th>
						<th> Ci</br>
						Extci</th>
						<th> Direccion</th>
						<th> Telefono</th>
						<th> Celular</th>
						<th> Foto</th>
						<th> Lugarnac</th>
						<th> Nacionalidad</th>
						<th> Establecimiento</th>
						<th> Distrito</th>
						<th> Apoderado</br>
						Apodireccion</br>
						 Apoparentesco</br>
						 Apotelefono</th>
						<th> Apoderado Foto</th>
						<th> Nit</th>
						<th> Razon</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($estudiante as $e){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $e['estudiante_nombre']; ?>
						<?php echo $e['estudiante_apellidos']; ?></td>
						<td><?php echo $e['estado_descripcion']; ?></td>
						<td><?php echo $e['genero_nombre']; ?></td>
						<td><?php echo $e['estadocivil_descripcion']; ?></td>
						<td><?php echo $e['estudiante_fechanac']; ?></br>
						<?php echo $e['estudiante_edad']; ?></td>
						<td><?php echo $e['estudiante_ci']; ?></br>
						<?php echo $e['estudiante_extci']; ?></td>
						<td><?php echo $e['estudiante_direccion']; ?></td>
						<td><?php echo $e['estudiante_telefono']; ?></td>
						<td><?php echo $e['estudiante_celular']; ?></td>
						<td><?php echo $e['estudiante_foto']; ?></td>
						<td><?php echo $e['estudiante_lugarnac']; ?></td>
						<td><?php echo $e['estudiante_nacionalidad']; ?></td>
						<td><?php echo $e['estudiante_establecimiento']; ?></td>
						<td><?php echo $e['estudiante_distrito']; ?></td>
						<td><?php echo $e['estudiante_apoderado']; ?></br>
						<?php echo $e['estudiante_apodireccion']; ?></br>
						<?php echo $e['estudiante_apoparentesco']; ?></br>
						<?php echo $e['estudiante_apotelefono']; ?></td>
						<td><?php echo $e['apoderado_foto']; ?></td>
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
