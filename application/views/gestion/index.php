<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Gestion</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('gestion/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Gesti&oacute;n</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Descripci&oacute;n</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php $i=0;
                    foreach($gestion as $g){ 
                        $i=$i+1; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $g['gestion_semestre']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($g['gestion_inicio'])); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($g['gestion_fin'])); ?></td>
                        <td><?php echo $g['gestion_descripcion']; ?></td>
                        <td class="text-center"><?php echo $g['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('gestion/edit/'.$g['gestion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('gestion/remove/'.$g['gestion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
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
