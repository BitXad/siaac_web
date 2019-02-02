<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Administrativo</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('administrativo/add'); ?>" class="btn btn-success btn-sm">Registrar Administrativo</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Estado</th>
						<th>Estado Civil</th>
						<th>Institucion</th>
						<th>Genero Id</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Fechanac</th>
						<th>Edad</th>
						<th>Ci</th>
						<th>Extci</th>
						<th>Codigo</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Celular</th>
						<th>Cargo</th>
						<th>Foto</th>
						<th>Fechareg</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($administrativo as $a){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $a['estado_descripcion']; ?></td>
						<td><?php echo $a['estadocivil_descripcion']; ?></td>
						<td><?php echo $a['institucion_nombre']; ?></td>
						<td><?php echo $a['genero_nombre']; ?></td>
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
                            <a href="<?php echo site_url('administrativo/edit/'.$a['administrativo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('administrativo/remove/'.$a['administrativo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
