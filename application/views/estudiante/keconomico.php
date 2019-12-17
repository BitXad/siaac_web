<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexeconomico.js'); ?>"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="panel-group">
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
    <div class="panel-heading">
        <h3 class="box-title"> Kardex Economico </h3>
    
    </div>
    <div class="col-md-12">
        <div id="tablaestudiantes" class="table-responsive">
            <table class='table table-striped table-condensed' id='mitabla'>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>C.I.</th>
                    <th>CODIGO</th>
                    <th>CARRERA</th>
                    <th>MATRICULA</th>
                    <th>MENSUALIDAD</th>
                    <th>No. MENSUALIDADES</th>
                    <th class="no-print"></th>
                </tr>
                <?php
                $cont = 0;
                foreach($mikardex as $kardex){
                ?>
                <tr>
                    <td><?php echo $cont+1; ?></td>
                    <td><b><?php echo $kardex["estudiante_nombre"]; ?></b></td>
                    <td><b><?php echo $kardex["estudiante_apellidos"]; ?></b></td>
                    <td><b><?php echo $kardex["estudiante_ci"]; ?></b></td>
                    <td><b><?php echo $kardex["estudiante_codigo"]; ?></b></td>
                    <td><b><?php echo $kardex["carrera_nombre"]; ?></b></td>
                    <td align='right'><b><?php echo number_format($kardex["kardexeco_matricula"], 2, '.', ','); ?></b></td>
                    <td align='right'><b><?php echo number_format($kardex["kardexeco_mensualidad"], 2, '.', ','); ?></b></td>
                    <td align='center'><b><?php echo $kardex["kardexeco_nummens"]; ?></b></td>
                    <td class="no-print">
                        <a href="<?php echo site_url('mensualidad/planmensualidad//'.$kardex['kardexeco_id']) ?>" target="_blank" class="btn btn-info btn-xs" title="VER PLAN DE PAGOS"><i class="fa fa-print"></i></a>
                    </td>
                </tr>
                <?php
                $cont ++;
                }
                ?>
            </table>
        </div>
    </div>
<a href="<?php echo site_url('estudiante/menu_estudiante/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger no-print">
            <i class="fa fa-times"></i> Cerrar</a>
</div>