<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Materia Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('materia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Materia Id</th>
						<th>Area Id</th>
						<th>Nivel Id</th>
						<th>Mat Materia Id</th>
						<th>Estado Id</th>
						<th>Materia Nombre</th>
						<th>Materia Alias</th>
						<th>Materia Codigo</th>
						<th>Materia Hp</th>
						<th>Materia Ht</th>
						<th>Materia Th</th>
						<th>Materia Cyp</th>
						<th>Materia Cys</th>
						<th>Materia Vtt</th>
						<th>Materia Ctp</th>
						<th>Materia Estapa1</th>
						<th>Materia Estapa2</th>
						<th>Materia Estapa3</th>
						<th>Materia Estapa4</th>
						<th>Materia Numareas</th>
						<th>Materia Notainstancia</th>
						<th>Materia Notaaprobado</th>
						<th>Materia Maxima</th>
						<th>Materia Calificacion1</th>
						<th>Materia Ponderado1</th>
						<th>Materia Calificacion2</th>
						<th>Materia Ponderado2</th>
						<th>Materia Calificacion3</th>
						<th>Materia Ponderado3</th>
						<th>Materia Calificacion4</th>
						<th>Materia Ponderado4</th>
						<th>Materia Ponderado5</th>
						<th>Materia Calificacion5</th>
						<th>Materia Calificacion6</th>
						<th>Materia Ponderado6</th>
						<th>Materia Calificacion7</th>
						<th>Materia Ponderado7</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($materia as $m){ ?>
                    <tr>
						<td><?php echo $m['materia_id']; ?></td>
						<td><?php echo $m['area_id']; ?></td>
						<td><?php echo $m['nivel_id']; ?></td>
						<td><?php echo $m['mat_materia_id']; ?></td>
						<td><?php echo $m['estado_id']; ?></td>
						<td><?php echo $m['materia_nombre']; ?></td>
						<td><?php echo $m['materia_alias']; ?></td>
						<td><?php echo $m['materia_codigo']; ?></td>
						<td><?php echo $m['materia_hp']; ?></td>
						<td><?php echo $m['materia_ht']; ?></td>
						<td><?php echo $m['materia_th']; ?></td>
						<td><?php echo $m['materia_cyp']; ?></td>
						<td><?php echo $m['materia_cys']; ?></td>
						<td><?php echo $m['materia_vtt']; ?></td>
						<td><?php echo $m['materia_ctp']; ?></td>
						<td><?php echo $m['materia_estapa1']; ?></td>
						<td><?php echo $m['materia_estapa2']; ?></td>
						<td><?php echo $m['materia_estapa3']; ?></td>
						<td><?php echo $m['materia_estapa4']; ?></td>
						<td><?php echo $m['materia_numareas']; ?></td>
						<td><?php echo $m['materia_notainstancia']; ?></td>
						<td><?php echo $m['materia_notaaprobado']; ?></td>
						<td><?php echo $m['materia_maxima']; ?></td>
						<td><?php echo $m['materia_calificacion1']; ?></td>
						<td><?php echo $m['materia_ponderado1']; ?></td>
						<td><?php echo $m['materia_calificacion2']; ?></td>
						<td><?php echo $m['materia_ponderado2']; ?></td>
						<td><?php echo $m['materia_calificacion3']; ?></td>
						<td><?php echo $m['materia_ponderado3']; ?></td>
						<td><?php echo $m['materia_calificacion4']; ?></td>
						<td><?php echo $m['materia_ponderado4']; ?></td>
						<td><?php echo $m['materia_ponderado5']; ?></td>
						<td><?php echo $m['materia_calificacion5']; ?></td>
						<td><?php echo $m['materia_calificacion6']; ?></td>
						<td><?php echo $m['materia_ponderado6']; ?></td>
						<td><?php echo $m['materia_calificacion7']; ?></td>
						<td><?php echo $m['materia_ponderado7']; ?></td>
						<td>
                            <a href="<?php echo site_url('materia/edit/'.$m['materia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('materia/remove/'.$m['materia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
