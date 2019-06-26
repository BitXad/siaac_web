<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<div class="box-header">
    <h3 class="box-title">Día</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('dia/add'); ?>" class="btn btn-success btn-sm">+ Día</a> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach($dia as $d){
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $d['dia_nombre']; ?></td>
                        <td><?php echo $d['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('dia/edit/'.$d['dia_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> 
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
