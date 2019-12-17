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
    <h3 class="box-title"><span class="text-bold">KARDEX ACADEMICO</span></h3><br>
    <span class="text-bold">Estudiante: </span><?php echo $estudiante['estudiante_nombre']." ".$estudiante['estudiante_apellidos']."(".$estudiante['estudiante_codigo'].")"; ?>
</div>
<!--<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, código, nivel formación" onkeypress="validar2(event,3)" autofocus autocomplete="off">
</div>-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Carrera</th>
                        <th>Código</th>
                        <th>Nivel Formación</th>
                        <th>Area</th>
                        <th>Plan</th>
                        <th>Modalidad</th>
                        <th>Tiempo Estudio</th>
                        <th>Carga Horaria</th>
                        <th>Fecha Creación</th>
                        <th>Matr.</th>
                        <th>Mens.</th>
                        <th>Nro. Mens.</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    $bool = true;
                    foreach($carrera as $c){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $c['carrera_nombre']; ?></td>
                        <td><?php echo $c['carrera_codigo']; ?></td>
                        <td><?php echo $c['carrera_nivel']; ?></td>
                        <td><?php echo $c['areacarrera_nombre']; ?></td>
                        <td><?php echo $c['carrera_plan']; ?></td>
                        <td><?php echo $c['carrera_modalidad']; ?></td>
                        <td><?php echo $c['carrera_tiempoestudio']; ?></td>
                        <td><?php echo $c['carrera_cargahoraria']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($c['carrera_fechacreacion'])); ?></td>
                        <!--<td><?php //echo $c['carrera_codaprod']; ?></td>-->
                        <td><?php echo number_format($c['carrera_matricula'],2); ?></td>
                        <td><?php echo number_format($c['carrera_mensualidad'],2); ?></td>
                        <td><?php echo $c['carrera_nummeses']; ?></td>
                        <td>
                            <?php
                            if($bool == true){
                                $bool = false;
                            ?>
                            <a href="<?php echo site_url('estudiante/mikardex_academico/'.$c['carrera_id']."/".$estudiante['estudiante_id']); ?>" class="btn btn-info btn-xs" title="Kardex académico"><span class="fa fa-file-text"></span></a>
                            <!--<a href="<?php //echo site_url('carrera/remove/'.$c['carrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                            <?php
                            }else{ ?>
                                <a href="<?php echo site_url('estudiante/mikardex_academco/'.$c['carrera_id']."/".$estudiante['estudiante_id']); ?>" class="btn btn-info btn-xs" title="Kardex académico"><span class="fa fa-file-text"></span></a>
                            <?php
                                $bool = true;
                            }
                            ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
        <a href="<?php echo site_url('estudiante/menu_estudiante/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger">
            <i class="fa fa-times"></i> Cerrar</a>
    </div>
</div>
