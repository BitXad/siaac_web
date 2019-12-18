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
    <h3 class="box-title"><span class="text-bold">Carrera: </span><?php echo $carrera['carrera_nombre']; ?></h3><br>
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
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Materia</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota Final</th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($kardex as $c){ ?>
                        <?php
                        if($i<5){
                        ?>
                    <tr>
                        
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $c['materia_nombre']; ?></td>
                        <td><?php $nota1 = rand(40,100); echo $nota1; ?></td>
                        <td><?php $nota2 = rand(40,100); echo $nota2; ?></td>
                        <td><?php echo round(($nota1+$nota2)/2); ?></td>
                    </tr>
                    <?php
                        }else{
                    ?>
                    <tr>
                        
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $c['materia_nombre']; ?></td>
                        <td><?php //$nota1 = rand(40,100); echo $nota1; ?></td>
                        <td><?php //$nota2 = rand(40,100); echo $nota2; ?></td>
                        <td><?php //echo round(($nota1+$nota2)/2); ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
        <a href="<?php echo site_url('estudiante/knotas/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger">
            <i class="fa fa-times"></i> Cerrar</a>
    </div>
</div>
