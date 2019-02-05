<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nota Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('notum/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nota Id</th>
						<th>Estado Id</th>
						<th>Materiaasig Id</th>
						<th>Nota Aistencia</th>
						<th>Nota Trabinv</th>
						<th>Nota Dps</th>
						<th>Nota Pruebprac</th>
						<th>Nota Pruebbim</th>
						<th>Nota Puntajetot</th>
						<th>Nota Numbimestre</th>
						<th>Nota Pond1 Mat</th>
						<th>Nota Pond2 Mat</th>
						<th>Nota Pond3 Mat</th>
						<th>Nota Pond4 Mat</th>
						<th>Nota Pond5 Mat</th>
						<th>Nota Pond6 Mat</th>
						<th>Nota Pond7 Ma</th>
						<th>Nota Fec Registrada</th>
						<th>Nota Bimestre</th>
						<th>Nota Notafinal</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($nota as $n){ ?>
                    <tr>
						<td><?php echo $n['nota_id']; ?></td>
						<td><?php echo $n['estado_id']; ?></td>
						<td><?php echo $n['materiaasig_id']; ?></td>
						<td><?php echo $n['nota_aistencia']; ?></td>
						<td><?php echo $n['nota_trabinv']; ?></td>
						<td><?php echo $n['nota_dps']; ?></td>
						<td><?php echo $n['nota_pruebprac']; ?></td>
						<td><?php echo $n['nota_pruebbim']; ?></td>
						<td><?php echo $n['nota_puntajetot']; ?></td>
						<td><?php echo $n['nota_numbimestre']; ?></td>
						<td><?php echo $n['nota_pond1_mat']; ?></td>
						<td><?php echo $n['nota_pond2_mat']; ?></td>
						<td><?php echo $n['nota_pond3_mat']; ?></td>
						<td><?php echo $n['nota_pond4_mat']; ?></td>
						<td><?php echo $n['nota_pond5_mat']; ?></td>
						<td><?php echo $n['nota_pond6_mat']; ?></td>
						<td><?php echo $n['nota_pond7_ma']; ?></td>
						<td><?php echo $n['nota_fec_registrada']; ?></td>
						<td><?php echo $n['nota_bimestre']; ?></td>
						<td><?php echo $n['nota_notafinal']; ?></td>
						<td>
                            <a href="<?php echo site_url('notum/edit/'.$n['nota_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('notum/remove/'.$n['nota_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
