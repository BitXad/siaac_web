<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Carrera Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('carrera/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Carrera Id</th>
						<th>Inscripcion Id</th>
						<th>Areacarrera Id</th>
						<th>Carrera Nombre</th>
						<th>Carrera Nombreinterno</th>
						<th>Carrera Codigo</th>
						<th>Carrera Nivel</th>
						<th>Carrera Modalidad</th>
						<th>Carrera Plan</th>
						<th>Carrera Fechacreacion</th>
						<th>Carrera Codaprod</th>
						<th>Carrera Matricula</th>
						<th>Carrera Mensualidad</th>
						<th>Carrera Nummeses</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($carrera as $c){ ?>
                    <tr>
						<td><?php echo $c['carrera_id']; ?></td>
						<td><?php echo $c['inscripcion_id']; ?></td>
						<td><?php echo $c['areacarrera_id']; ?></td>
						<td><?php echo $c['carrera_nombre']; ?></td>
						<td><?php echo $c['carrera_nombreinterno']; ?></td>
						<td><?php echo $c['carrera_codigo']; ?></td>
						<td><?php echo $c['carrera_nivel']; ?></td>
						<td><?php echo $c['carrera_modalidad']; ?></td>
						<td><?php echo $c['carrera_plan']; ?></td>
						<td><?php echo $c['carrera_fechacreacion']; ?></td>
						<td><?php echo $c['carrera_codaprod']; ?></td>
						<td><?php echo $c['carrera_matricula']; ?></td>
						<td><?php echo $c['carrera_mensualidad']; ?></td>
						<td><?php echo $c['carrera_nummeses']; ?></td>
						<td>
                            <a href="<?php echo site_url('carrera/edit/'.$c['carrera_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('carrera/remove/'.$c['carrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
