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
                <h3 class="box-title">Plan Academico</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('plan_academico/add'); ?>" class="btn btn-success btn-sm">Nuevo Plan Academico</a>
                </div>
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, código, estado" autofocus autocomplete="off">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <!--<th>Fecha Creación</th>-->
                        <th>Codigo</th>
                        <th>Carrera</th>
                        <th>Titulo/Modalidad</th>
                        <!--<th>Cant. Gestion</th>-->
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($plan_academico as $p){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $p['planacad_nombre']; ?></td>
                        <!--<td><?php //echo $p['planacad_feccreacion']; ?></td>-->
                        <td><?php echo $p['planacad_codigo']; ?></td>
                        <td><?php echo $p['carrera_nombre']; ?></td>
                        <td><?php echo $p['planacad_titmodalidad']; ?></td>
                        <!--<td><?php //echo $p['planacad_cantgestion']; ?></td>-->
                        <td style="background-color: #<?php echo $p['estado_color']; ?>"><?php echo $p['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('plan_academico/edit/'.$p['planacad_id']); ?>" class="btn btn-info btn-xs" title="Editar" ><span class="fa fa-pencil"></span></a> 
                            <?php if ($p['estado_id']==1) { ?>
                            <a href="<?php echo site_url('plan_academico/inactivar/'.$p['planacad_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-ban"></span></a>
                            <?php } else { ?>
                            <a href="<?php echo site_url('plan_academico/activar/'.$p['planacad_id']); ?>" class="btn btn-facebook btn-xs"><span class="fa fa-repeat"></span></a>    
                            <?php } ?>
                            
                            <!--<a href="<?php //echo site_url('plan_academico/remove/'.$p['planacad_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
