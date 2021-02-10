<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <h3 class="box-title"><span class="text-bold">Estudiante: </span><?php echo $estudiante['estudiante_nombre']." ".$estudiante['estudiante_apellidos']."(".$estudiante['estudiante_codigo'].")"; ?></h3>
    <!-- <h3 class="box-title"><span class="text-bold">Materia: </span><?php echo "100".$material[0]['materia_id']." ".$material[0]['materia_nombre']; ?></h3> -->
</div>
<!--<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, código, nivel formación" onkeypress="validar2(event,3)" autofocus autocomplete="off">
</div>-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Motivo de la reuni&oacute;n</th>
                        <th>Materia</th>
                        <th>profesor</th>
                        <th>Fecha de Reni&oacute;n <br> y Hora</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                        <?php $cont = 1;?>
                        <?php foreach ($citaciones as $citacion){?>
                            <tr>
                                <td><?= $cont; ?></td>
                                <td><?= $citacion['citacion_razon'] ?></td>
                                <td><?= $citacion['materia_nombre'] ?></td>
                                <td><?= "{$citacion['docente_apellidos']} {$citacion['docente_nombre']}" ?></td>
                                <td class="text-center"><?= "{$citacion['citacion_fecha']}<br>{$citacion['citacion_hora']}" ?></td>
                                <td>
                                    <a href="<?= site_url('citacion/ver_citacion/'.$citacion['citacion_id']) ?>" class="btn btn-xs btn-info" title="Ver más">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Ver
                                    </a>
                                </td>
                            </tr>
                        <?php $cont += 1;?>
                        <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
        <a href="<?php echo site_url('estudiante/menu_estudiante/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger">
            <i class="fa fa-times"></i> Cerrar</a>
    </div>
</div>
