<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Materia</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('materia/add'); ?>" class="btn btn-success btn-sm">Registrar Materia</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Materia</th>
						<th>Codigo</th>
						<th>Nivel</th>
						<th>Pre-Requisito</th>
						<th>Area</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($materia as $m){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						
						<td><?php echo $m['materia_nombre']; ?>
						(<?php echo $m['materia_alias']; ?>)</td>
						<td><?php echo $m['materia_codigo']; ?></td>
						<td><?php echo $m['nivel_descripcion']; ?></td>
						<?php if($m['mat_materia_id']==0) { ?>
						<td>NINGUNO</td>
						<?php } else { ?>
						<td><?php echo $m['requisito']; ?></td>
						<?php } ?>
						<td><?php echo $m['area_nombre']; ?></td>
						<td><?php echo $m['estado_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('materia/edit/'.$m['materia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('materia/remove/'.$m['materia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
