
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
						<th>Nombre</th>
						<th>Genero</th>
						<th>Fecha Nacimineto</br>
						(Edad)</th>
						<th>Ci</th>
						<th>Codigo</th>
						<th>Direccion</th>
						<th>Telefono</br>
						Celular</th>
						<th>Titulo</th>
						<th>Especialidad</th>
						<th>Email</th>
						<th>Foto</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($docente as $d){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $d['docente_nombre']; ?>
						<?php echo $d['docente_apellidos']; ?></td>
						<td><?php echo $d['genero_nombre']; ?></td>					
						
						<td><?php echo $d['docente_fechanac']; ?></br>
						<!--<td><?php echo $d['docente_edad']; ?></td>-- CALCULAR A PARTIR DE LA FECHA DE NAC.-->
						<?php $cumpleanos = new DateTime($d['docente_fechanac']); $hoy = new DateTime(); $annos = $hoy->diff($cumpleanos); echo "(", $annos->y, ")";   ?></td>
						<td><?php echo $d['docente_ci']; ?>
						<?php echo $d['docente_extci']; ?></td>
						<td><?php echo $d['docente_codigo']; ?></td>
						<td><?php echo $d['docente_direccion']; ?></td>
						<td><?php echo $d['docente_telefono']; ?></br>
						<?php echo $d['docente_celular']; ?></td>
						<td><?php echo $d['docente_titulo']; ?></td>
						<td><?php echo $d['docente_especialidad']; ?></td>
						<td><?php echo $d['docente_email']; ?></td>
						<td><?php echo $d['docente_foto']; ?></td>
						<td><?php echo $d['estado_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('docente/edit/'.$d['docente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('docente/remove/'.$d['docente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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
