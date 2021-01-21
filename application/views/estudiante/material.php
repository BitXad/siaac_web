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
    <h3 class="box-title"><span class="text-bold">Estudiante: </span><?php echo $estudiante['estudiante_nombre']." ".$estudiante['estudiante_apellidos']."(".$estudiante['estudiante_codigo'].")"; ?></h3>
    <h3 class="box-title"><span class="text-bold">Materia: </span><?php echo "100".$material[0]['materia_id']." ".$material[0]['materia_nombre']; ?></h3>
</div>
<!--<div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, código, nivel formación" onkeypress="validar2(event,3)" autofocus autocomplete="off">
</div>-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Descripcion</th>
                        <th>Materia</th>
                        <th>Fecha</th>
                        <th>profesor</th>
                        <!--<th>Nivel</th>-->
<!--                        <th>Modalidad</th>
                        <th>Matr.</th>
                        <th>Mens.</th>
                        <th>Nro. Mens.</th>
                        <th>Material de clases</th>-->
                        <!--<th></th>-->
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($material as $c){ 
                        $estilo = "style='padding:0;'";
                        $estilo = "";
                        ?>
                    <tr>
                        <td <?php echo $estilo; ?>><?php echo $i+1; ?></td>
                        <td <?php echo $estilo; ?>><a href="<?php echo $c['material_enlace']; ?>" class="btn btn-warning btn-xs" target="_BLANK"><fa class="fa fa-<?php echo $c['material_tipo']; ?>"></fa> </a><b><?php echo $c['material_descripcion']; ?></b> 
                            <br><?php echo $c['material_recomendacion']; ?>
                        </td>
                        
                        <td <?php echo $estilo; ?>><?php echo $c['materia_nombre']; ?></td>
                        <td <?php echo $estilo; ?>><?php echo $c['material_fecha']; ?></td>
                        <td <?php echo $estilo; ?>>
                            <img src="<?php echo base_url("resources/images/docentes/jose.jpg"); ?>" class="img img-circle" width="50px;" height="50px;">
                                <?php echo $c['material_docente']; ?>
                        </td>
                        
                        
                        
<!--                        <td <?php echo $estilo; ?>><?php echo $c['nivel_descripcion']." ".$c['carrera_nivel']; ?></td>
                        <td <?php echo $estilo; ?>><?php echo $c['carrera_plan']; ?></td>
                        <td <?php echo $estilo; ?>><?php echo $c['carrera_plan']; ?></td>
                        <td <?php echo $estilo; ?>><?php echo $c['carrera_modalidad']; ?></td>
                        <td <?php echo $estilo; ?>><?php echo number_format($c['carrera_matricula'],2); ?></td>
                        <td <?php echo $estilo; ?>><?php echo number_format($c['carrera_mensualidad'],2); ?></td>
                        <td <?php echo $estilo; ?>><?php echo $c['carrera_nummeses']; ?></td>
                        <td <?php echo $estilo; ?>><a href="<?php ?>" class="btn btn-info btn-xs" ><fa class="fa fa-book"></fa> </a></td>
                        <td>
                            <a href="<?php echo site_url('carrera/edit/'.$c['carrera_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a> -->
                            <!--<a href="<?php //echo site_url('carrera/remove/'.$c['carrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        <!--</td>-->
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
