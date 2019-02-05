<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <h3 class="box-title">Carrera</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('carrera/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
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
                        <th>Nombre Interno</th>
                        <th>Código</th>
                        <th>Nivel</th>
                        <th>Area</th>
                        <th>Modalidad</th>
                        <th>Plan</th>
                        <th>Fecha Creación</th>
                        <th>Codaprod</th>
                        <th>Matrícula</th>
                        <th>Mensualidad</th>
                        <th>Num. Meses</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach($carrera as $c){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $c['carrera_nombre']; ?></td>
                        <td><?php echo $c['carrera_nombreinterno']; ?></td>
                        <td><?php echo $c['carrera_codigo']; ?></td>
                        <td><?php echo $c['carrera_nivel']; ?></td>
                        <td><?php echo $c['areacarrera_nombre']; ?></td>
                        <td><?php echo $c['carrera_modalidad']; ?></td>
                        <td><?php echo $c['carrera_plan']; ?></td>
                        <td><?php echo $c['carrera_fechacreacion']; ?></td>
                        <td><?php echo $c['carrera_codaprod']; ?></td>
                        <td><?php echo number_format($c['carrera_matricula'],2); ?></td>
                        <td><?php echo number_format($c['carrera_mensualidad'],2); ?></td>
                        <td><?php echo $c['carrera_nummeses']; ?></td>
                        <td>
                            <a href="<?php echo site_url('carrera/edit/'.$c['carrera_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('carrera/remove/'.$c['carrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
