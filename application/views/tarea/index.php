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
        <a href="<?php echo site_url('tarea/add/'.$materia); ?>" class="btn btn-success btn-sm">Agregar Tarea</a> 
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
                        <th>Tarea - T&iacute;tulo</th>
                        <th>Descripci&oacute;n</th>
                        <th>Fecha de Entrega</th>
                        <th>Entregas</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                    <tbody class="buscar">
                    <?php $cont = 1;?>
                    <?php foreach ($tareas as $tarea){?>
                        <tr>
                            <td class="text-center"><?= $cont; ?></td>
                            <td><?= $tarea['tarea_titulo'] ?></td>
                            <td><span title="<?= $tarea['tarea_descripcion']?>"><?= substr($tarea['tarea_descripcion'],0,50) ?>... [ver m&aacute;s]</span></td>
                            <td class="text-center"><?= $tarea['tarea_fecha_entrega'] ?></td>
                            <td class="text-center">15/20</td>
                            <td class="text-center"><?= $tarea['estado_descripcion'] ?></td>
                            <td>
                                <a href="<?= $tarea['tarea_enlace'] ?>" class="btn btn-xs btn-info" title="Ir al enlace" target="_blanck"><i class="fa fa-link" aria-hidden="true"></i></a>
                                <a href="<?= site_url('tarea/edit/'.$tarea['tarea_id'])?>" class="btn btn-xs btn-info" title="Editar Tarea"><span class="fa fa-pencil"></span></a>
                                <a href="#" class="btn btn-xs btn-success" title="Respuestas de la Tarea"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $cont += 1;?>
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
