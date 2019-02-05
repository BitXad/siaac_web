<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Turno</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('turno/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						
						<th>Nombre</th>
                        <th>Estado Id</th>
						<th></th>
                    </tr>
                    <?php foreach($turno as $t){ ?>
                    <tr>
						<td><?php echo $t['turno_id']; ?></td>
						
						<td><?php echo $t['turno_nombre']; ?></td>
                        <td><?php echo $t['estado_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('turno/edit/'.$t['turno_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!---<a href="<?php echo site_url('turno/remove/'.$t['turno_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
