<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Aula</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_aula/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Tipoaula Descripcion</th>
						<th></th>
                    </tr>
                    <?php $i=0;
                    foreach($tipo_aula as $t){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $t['tipoaula_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_aula/edit/'.$t['tipoaula_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('tipo_aula/remove/'.$t['tipoaula_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>--->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
