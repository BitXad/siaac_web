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
    <h3 class="box-title">Nivel</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('nivel/add'); ?>" class="btn btn-success btn-sm"> + Añadir</a> 
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese descripción, plan academico" autofocus autocomplete="off">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Plan Academico</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                        $i = 0;
                        foreach($nivel as $n){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $n['nivel_descripcion']; ?></td>
                        <td><?php echo $n['planacad_nombre']; ?></td>
                        <td>
                            <a href="<?php echo site_url('nivel/edit/'.$n['nivel_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('nivel/remove/'.$n['nivel_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
