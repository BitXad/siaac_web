<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<<<<<<< HEAD
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Carrera</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('carrera/add'); ?>" class="btn btn-success btn-sm">Registrar Carrera</a> 
=======
<div class="box-header">
                <h3 class="box-title">Carrera</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('carrera/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
>>>>>>> master
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
<<<<<<< HEAD
						<th>#</th>
						<th>Inscripcion Id</th>
						<th>Areacarrera Id</th>
						<th>Carrera Nombre</th>
						<th>Carrera Nombreinterno</th>
						<th>Carrera Codigo</th>
						<th>Carrera Nivel</th>
						<th>Carrera Modalidad</th>
						<th>Carrera Plan</th>
						<th>Carrera Fechacreacion</th>
						<th>Carrera Codaprod</th>
						<th>Carrera Matricula</th>
						<th>Carrera Mensualidad</th>
						<th>Carrera Nummeses</th>
						<th>Actions</th>
                    </tr>
                    <?php $cont = 0;
                    foreach($carrera as $c){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $c['inscripcion_id']; ?></td>
						<td><?php echo $c['areacarrera_id']; ?></td>
						<td><?php echo $c['carrera_nombre']; ?></td>
						<td><?php echo $c['carrera_nombreinterno']; ?></td>
						<td><?php echo $c['carrera_codigo']; ?></td>
						<td><?php echo $c['carrera_nivel']; ?></td>
						<td><?php echo $c['carrera_modalidad']; ?></td>
						<td><?php echo $c['carrera_plan']; ?></td>
						<td><?php echo $c['carrera_fechacreacion']; ?></td>
						<td><?php echo $c['carrera_codaprod']; ?></td>
						<td><?php echo $c['carrera_matricula']; ?></td>
						<td><?php echo $c['carrera_mensualidad']; ?></td>
						<td><?php echo $c['carrera_nummeses']; ?></td>
						<td>
=======
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Nombre Interno</th>
                        <th>Código</th>
                        <th>Area</th>
                        <th>Nivel</th>
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
                        <td><?php echo $c['areacarrera_id']; ?></td>
                        <td><?php echo $c['carrera_nombre']; ?></td>
                        <td><?php echo $c['carrera_nombreinterno']; ?></td>
                        <td><?php echo $c['carrera_codigo']; ?></td>
                        <td><?php echo $c['carrera_nivel']; ?></td>
                        <td><?php echo $c['carrera_modalidad']; ?></td>
                        <td><?php echo $c['carrera_plan']; ?></td>
                        <td><?php echo $c['carrera_fechacreacion']; ?></td>
                        <td><?php echo $c['carrera_codaprod']; ?></td>
                        <td><?php echo $c['carrera_matricula']; ?></td>
                        <td><?php echo $c['carrera_mensualidad']; ?></td>
                        <td><?php echo $c['carrera_nummeses']; ?></td>
                        <td>
>>>>>>> master
                            <a href="<?php echo site_url('carrera/edit/'.$c['carrera_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('carrera/remove/'.$c['carrera_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
