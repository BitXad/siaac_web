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
    <h3 class="box-title">Material</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('material/add/'.$materia); ?>" class="btn btn-success btn-sm">Agregar Material de Estudio</a> 
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Material, Tipo, Estado" />
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Material-Descripci&oacute;n</th>
                        <th>Enlace</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                        <?php $cont = 0;
                        foreach($material as $m){
                            $cont = $cont+1; ?>
                        <tr>
                            <td><?= $cont; ?></td>
                            <td>
                                <b><?= $m['material_titulo'] ?></b>
                                <br>
                                <span style="font-size: 6pt;" title="<?= $m['material_descripcion'] ?>"><?= substr($m['material_descripcion'],0,20); ?>...</span>
                            </td>
                            <td class="text-center">
                                <a href="<?= $m['material_enlace']; ?>" class="btn btn-xs btn-info" target="_blanck">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td><?= $m['material_tipo']; ?></td>
                            <td class="text-center"><?= $m['estado_descripcion']?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('material/edit/'.$m['materialest_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                                <!-- <a href="<?php echo site_url('material/remove/'.$m['materialest_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a> -->
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
