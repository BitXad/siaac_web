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
    <!-- <h3 class="box-title"><span class="text-bold">Estudiante: </span><?php echo $estudiante['estudiante_nombre']." ".$estudiante['estudiante_apellidos']."(".$estudiante['estudiante_codigo'].")"; ?></h3> -->
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Tarea" onkeypress="validar2(event,3)" autofocus autocomplete="off">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tarea</th>
                            <th>Materia</th>
                            <th>Profesor</th>
                            <th>Estado</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                    <?php
                    $i = 1;
                    foreach($tareas as $tarea){ 
                        $estilo = "style='padding:0;'";
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tarea['tarea_titulo'] ?></td>
                            <td><?= $tarea['materia_nombre'] ?></td>
                            <td><?= ("{$tarea['docente_nombre']} {$tarea['docente_apellidos']}") ?></td>
                            <td> No entregado </td>
                            <td>
                                <a href="<?= site_url("tarea/respuesta/{$tarea['tarea_id']}") ?>" class="btn btn-xs btn-info">Responder</a>
                            </td>
                        </tr>
                        <?php $i+=1; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
        <!-- <a href="<?php echo site_url('estudiante/menu_estudiante/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger">
            <i class="fa fa-times"></i> Cerrar</a> -->
    </div>
</div>
