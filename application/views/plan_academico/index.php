<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
                <h3 class="box-title">Plan Academico</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('plan_academico/add'); ?>" class="btn btn-success btn-sm">Nuevo Plan Academico</a>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<!--<th>Fecha Creación</th>-->
						<th>Codigo</th>
						<th>Carrera</th>
						<th>Titulo/Modalidad</th>
						<th>Cant. Gestion</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <?php foreach($plan_academico as $p){ ?>
                    <tr>
						<td><?php echo $p['planacad_id']; ?></td>
						<td><?php echo $p['planacad_nombre']; ?></td>
						<!--<td><?php //echo $p['planacad_feccreacion']; ?></td>-->
						<td><?php echo $p['planacad_codigo']; ?></td>
						<td><?php echo $p['carrera_id']; ?></td>
						<td><?php echo $p['planacad_titmodalidad']; ?></td>
						<td><?php echo $p['planacad_cantgestion']; ?></td>
						<td><?php echo $p['estado_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('plan_academico/edit/'.$p['planacad_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('plan_academico/remove/'.$p['planacad_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
