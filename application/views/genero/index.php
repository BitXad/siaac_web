<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Genero</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('genero/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Genero Nombre</th>
						<th></th>
                    </tr>
                    <?php $i=0;
                    foreach($genero as $g){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $g['genero_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('genero/edit/'.$g['genero_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('genero/remove/'.$g['genero_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
