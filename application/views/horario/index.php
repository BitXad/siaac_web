<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Horarios</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('horario/nuevo'); ?>" class="btn btn-success btn-sm">Nuevo</a>
                </div>
                   
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Id</th>
						<th>Horario Desde</th>
						<th>Horario Hasta</th>
                        <th>Periodo</th>
                        <th>Estado</th>
						<th></th>
                    </tr>
                    <?php
                        $estado = '<span class="label label-danger">--</span>';
                        foreach($horario as $h){
                            if($h->estado_id==1){
                                $estado = 'ACTIVO';
                            }
                            if($h->estado_id==2){
                                $estado = 'INACTIVO';
                            }
                    ?>
                    <tr>
						<td><?php echo $h->horario_id; ?></td>
						<td><?php echo substr_replace($h->horario_desde ,"", -3) ?></td>
						<td><?php echo substr_replace($h->horario_hasta ,"", -3) ?></td>
                        <td><?php echo strtoupper($h->periodo_nombre); ?></td>
                        <td><?php echo $estado; ?></td>
						<td>
                            <a href="<?php echo site_url('horario/editar/'.$h->horario_id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                            <a href="<?php echo site_url('horario/remove/'.$h->horario_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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
