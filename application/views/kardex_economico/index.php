<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kardex Economico Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kardex_economico/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Kardexeco Id</th>
						<th>Inscripcion Id</th>
						<th>Estado Id</th>
						<th>Kardexeco Matricula</th>
						<th>Kardexeco Mensualidad</th>
						<th>Kardexeco Nummens</th>
						<th>Kardexeco Observacion</th>
						<th>Kardexeco Fecha</th>
						<th>Kardexeco Hora</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kardex_economico as $k){ ?>
                    <tr>
						<td><?php echo $k['kardexeco_id']; ?></td>
						<td><?php echo $k['inscripcion_id']; ?></td>
						<td><?php echo $k['estado_id']; ?></td>
						<td><?php echo $k['kardexeco_matricula']; ?></td>
						<td><?php echo $k['kardexeco_mensualidad']; ?></td>
						<td><?php echo $k['kardexeco_nummens']; ?></td>
						<td><?php echo $k['kardexeco_observacion']; ?></td>
						<td><?php echo $k['kardexeco_fecha']; ?></td>
						<td><?php echo $k['kardexeco_hora']; ?></td>
						<td>
                            <a href="<?php echo site_url('kardex_economico/edit/'.$k['kardexeco_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kardex_economico/remove/'.$k['kardexeco_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
