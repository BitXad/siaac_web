<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Periodos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periodo/nuevo'); ?>" class="btn btn-success btn-sm">Nuevo</a>
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                    <p><?php echo $this->session->flashdata('msg'); ?></p>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>

						<th>ID</th>
						<th>Nombre</th>
						<th>Hora de inicio</th>
						<th>Hora fin</th>
						<th>Operaciones</th>
                    </tr>
                    <?php $i=0; 
                    foreach($periodo as $p){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $p['periodo_nombre']; ?></td>
						<td><?php echo substr_replace($p['periodo_horainicio'] ,"", -3) ?></td>
						<td><?php echo substr_replace($p['periodo_horafin'] ,"", -3); ?></td>
						<td>
                            <a href="<?php echo site_url('periodo/editar/'.$p['periodo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('periodo/remove/'.$p['periodo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </table>
                                
            </div>
        </div>
    </div>
</div>
