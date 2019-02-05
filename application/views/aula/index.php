<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aula</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aula/add'); ?>" class="btn btn-success btn-sm">Registrar Aula</a> 
                    <a href="<?php echo site_url('aula/generar_excel'); ?>" target="_blank"> Generar excel </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Capacidad</th>
						<th>Tipo</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                    foreach($aula as $a){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont;  ?></td>
						<td><?php echo $a['aula_nombre']; ?></td>
						<td><?php echo $a['aula_descripcion']; ?></td>
						<td><?php echo $a['aula_capacidad']; ?> Personas</td>
						<td><?php echo $a['tipoaula_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('aula/edit/'.$a['aula_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                           <!-- <a href="<?php echo site_url('aula/remove/'.$a['aula_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
