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
    <h3 class="box-title">Citaciones</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('citacion/add'); ?>" class="btn btn-success btn-sm">Realziar una citaci&oacute;n<a> 
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Título, Razón, Estado" />
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>T&iacute;tulo</th>
                        <th>Raz&oacute;n</th>
                        <th>Descrici&oacute;n</th>
                        <th>Estudiante</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                        <?php $cont = 1; ?>
                        <?php foreach ($citaciones as $citacion){?>
                        <tr>
                            <td><?= $cont ?></td>
                            <td><?= $citacion['citacion_titulo'] ?></td>
                            <td><?= $citacion['citacion_razon'] ?></td>
                            <td>
                                <span title="<?= $citacion['citacion_descripcion'] ?>">
                                    <?= substr($citacion['citacion_descripcion'],0,50).'...' ?>
                                </span>
                            </td>
                            <td><?= "{$citacion['estudiante_nombre']} <br> {$citacion['estudiante_apellidos']}" ?></td>
                            <td><?= $citacion['citacion_fecha'] ?></td>
                            <td><?= $citacion['estado_descripcion'] ?></td>
                            <td>
                                <a href="<?= base_url('citacion/edit/'.$citacion['citacion_id']) ?>" class="btn btn-xs btn-info">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <!-- <a href="" class="btn btn-xs"></a> -->
                            </td>
                        </tr>
                        <?php $cont += 1; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
