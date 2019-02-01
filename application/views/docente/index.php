<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Docente</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success btn-sm">Registrar Docente</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Estado Id</th>
						<th>Genero Id</th>
						<th>Docente Nombre</th>
						<th>Docente Apellidos</th>
						<th>Docente Fechanac</th>
						<th>Docente Edad</th>
						<th>Docente Ci</th>
						<th>Docente Extci</th>
						<th>Docente Codigo</th>
						<th>Docente Direccion</th>
						<th>Docente Telefono</th>
						<th>Docente Celular</th>
						<th>Docente Titulo</th>
						<th>Docente Especialidad</th>
						<th>Docente Foto</th>
						<th>Docente Email</th>
						<th>Actions</th>
                    </tr>
                    <?php $cont = 0;
                    foreach($docente as $d){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $d['estado_id']; ?></td>
						<td><?php echo $d['genero_id']; ?></td>					
						<td><?php echo $d['docente_nombre']; ?></td>
						<td><?php echo $d['docente_apellidos']; ?></td>
						<td><?php echo $d['docente_fechanac']; ?></td>
						<td><?php echo $d['docente_edad']; ?></td>
						<td><?php echo $d['docente_ci']; ?></td>
						<td><?php echo $d['docente_extci']; ?></td>
						<td><?php echo $d['docente_codigo']; ?></td>
						<td><?php echo $d['docente_direccion']; ?></td>
						<td><?php echo $d['docente_telefono']; ?></td>
						<td><?php echo $d['docente_celular']; ?></td>
						<td><?php echo $d['docente_titulo']; ?></td>
						<td><?php echo $d['docente_especialidad']; ?></td>
						<td><?php echo $d['docente_foto']; ?></td>
						<td><?php echo $d['docente_email']; ?></td>
						<td>
                            <a href="<?php echo site_url('docente/edit/'.$d['docente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('docente/remove/'.$d['docente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
