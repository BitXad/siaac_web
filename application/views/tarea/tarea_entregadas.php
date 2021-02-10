<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#nombre').keyup(function () {
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
    <h3 class="box-title">Tareas</h3>
    <div class="box-tools">
        <!-- <a href="<?php echo site_url('tarea/add/'.$materia); ?>" class="btn btn-success btn-sm">Agregar Tarea</a>  -->
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Tarea" />
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Fecha y Hora <br> de entrega</th>
                        <th>Respuesta</th>
                        <!-- <th></th> -->
                        <!-- <th></th> -->
                    </tr>
                    <tbody class="buscar">
                    <?php $cont = 1;?>
                        <?php foreach($tareas as $t){ ?>
                        <tr>
                            <td><?= $cont ?></td>
                            <td><?= "{$t['estudiante_apellidos']} {$t['estudiante_nombre']}" ?></td>
                            <td class="text-center"><?= "{$t['respuesta_fecha_entregada']}<br>{$t['respuesta_hora_entregada']}" ?></td>
                            <td class="text-center">
                                
                                <!-- Large modal -->
                                <button type="button" title="Ver" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal<?=$t['respuesta_id']?>" data-><i class="fa fa-file-image-o" aria-hidden="true"></i></button>

                                <a href="<?= base_url('resources/respuestas_tareas/').$t['respuesta_foto']; ?>" class="btn btn-success btn-sm" download="<?= "{$t['estudiante_apellidos']}_{$t['estudiante_nombre']}_{$t['respuesta_foto']}" ?>" title="Descargar"><i class="fa fa-download" aria-hidden="true"></i></a>

                                <div id="modal<?=$t['respuesta_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-title">
                                            <?= "{$t['estudiante_apellidos']} {$t['estudiante_nombre']}" ?>
                                        </div>
                                        <div class="modal-content">
                                            <img src="<?= base_url('resources/respuestas_tareas/').$t['respuesta_foto']; ?>" width="100%" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $cont += 1; }?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
