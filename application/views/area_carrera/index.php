<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <h3 class="box-title">Area - Carrera</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('area_carrera/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
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
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach($area_carrera as $a){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $a['areacarrera_nombre']; ?></td>
                        <td>
                            <a href="<?php echo site_url('area_carrera/edit/'.$a['areacarrera_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('area_carrera/remove/'.$a['areacarrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
