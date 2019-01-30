<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grupo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Grupo Id</th>
						<th>Horario Id</th>
						<th>Docente Id</th>
						<th>Gestion Id</th>
						<th>Usuario Id</th>
						<th>Aula Id</th>
						<th>Materia Id</th>
						<th>Grupo Nombre</th>
						<th>Grupo Descripcion</th>
						<th>Grupo Horanicio</th>
						<th>Grupo Horafin</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($grupo as $g){ ?>
                    <tr>
						<td><?php echo $g['grupo_id']; ?></td>
						<td><?php echo $g['horario_id']; ?></td>
						<td><?php echo $g['docente_id']; ?></td>
						<td><?php echo $g['gestion_id']; ?></td>
						<td><?php echo $g['usuario_id']; ?></td>
						<td><?php echo $g['aula_id']; ?></td>
						<td><?php echo $g['materia_id']; ?></td>
						<td><?php echo $g['grupo_nombre']; ?></td>
						<td><?php echo $g['grupo_descripcion']; ?></td>
						<td><?php echo $g['grupo_horanicio']; ?></td>
						<td><?php echo $g['grupo_horafin']; ?></td>
						<td>
                            <a href="<?php echo site_url('grupo/edit/'.$g['grupo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('grupo/remove/'.$g['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
