<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Area - Materia</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('area_materium/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th></th>
                    </tr>
                    <?php $cont=0;
                    foreach($area_materia as $a){
                    $cont=$cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $a['area_nombre']; ?></td>
						
						<td>
                            <a href="<?php echo site_url('area_materium/edit/'.$a['area_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('area_materium/remove/'.$a['area_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
