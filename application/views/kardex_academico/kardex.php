<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexacademico_nota.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="cuerpo">
    <div class="columna_derecha"  style="width:40%;">
        <center> 
            <h3 class="box-title">NOTAS<br>
            <?php //echo $kardex_economico[0]['kardexeco_id']; ?></h3>
        </center>
        <!--<b>CARRERA: <?php //echo $kardex_economico[0]['carrera_nombre']; ?></b>-->
    </div>
    <div class="columna_izquierda">
        <center>
            <img src="<?php echo base_url('resources/images/institucion/'.$institucion['institucion_logo']); ?>" width="100" height="60"><br>
        </center>
    </div>
    <div class="columna_central">
        <center>
            <font size="3"><b><u><?php echo $institucion['institucion_nombre']; ?></u></b></font><br>
            <?php echo $institucion['institucion_zona']; ?> - <?php echo $institucion['institucion_direccion']; ?><br>
            <?php echo $institucion['institucion_telefono']; ?><br>
            <?php echo $institucion['institucion_departamento']; ?> - BOLIVIA
        </center>
    </div>
</div>
<div class="cuerpo">
    <div class="columna_derecha">
        <b>Nivel: </b><?php echo $kardex_estudiante['nivel_descripcion']; ?><br>
        <b>Turno: </b> TARDE<br>
        <b>Fecha: </b> <?php echo date('d/m/Y'); ?>
    </div>
    <div class="columna_izquierda">
        <!--<b>Docente:</b> <br>-->
        <b>Carrera: </b><?php echo $kardex_estudiante['carrera_nombre']; ?><br>
        <b>Plan Academico: </b><?php echo $kardex_estudiante['planacad_nombre']; ?><br>
        <b>Estudiante: </b><?php echo $kardex_estudiante['estudiante_apellidos']." ".$kardex_estudiante['estudiante_nombre']; ?><br>
        <!--<b>Asignatura: </b> FISICA I-->
    </div>
    <div class="columna_central">
        <!--<br>
        <b>Materia:</b> FISICA I<br>
        <b>Sigla:</b> (FIS100) -->
    </div>
</div>
<div class="box-body table-responsive" >
    <?php echo date('d/m/Y H:i:s'); ?>
    <table class="table table-striped" id="mitabla">
        <tr>
            <th>#</th>
            <th>Materia</th>
            <th>Cod.</th>
            <?php
            if(isset($max_numareas['max_numareas'])){
                for ($i = 0; $i < $max_numareas['max_numareas']; $i++) {
                    echo "<th>Nota ".($i+1)."</th>";
                }
            }
            ?>
            <th class="no-print"></th>
        </tr>
        <?php
        $cont = 0;
        foreach($materias_estudiante as $m){
            $cont = $cont+1; ?>
        <tr>
            <td class="text-center"><?php echo $cont; ?></td>
            <td><?php echo $m["materiaasig_nombre"]; ?></td>
            <td><?php echo $m["materiaasig_codigo"]; ?></td>
            <?php
            if(isset($max_numareas['max_numareas'])){
                for ($i = 0; $i < $max_numareas['max_numareas']; $i++) {
                    $lanota = "nota_pond".($i+1)."_mat";
                    if(($i+1) <= $m["materia_numareas"]){
                        echo "<td class='text-center'>".$m[$lanota]."</td>";
                    }else{
                        echo "<td></td>";
                    }
                }
            }
            ?>
            <td class="no-print">
                <?php if($m["nota_id"] == 0 || $m["nota_id"] == "" || $m["nota_id"] == null){ ?>
                <a onclick='generarnotas(<?php echo json_encode($m); ?>)' class="btn btn-success btn-xs" title="Generar notas">
                    <i class="fa fa-file-text-o"></i></a>
                <?php }else{?>
                <a onclick='cargarnotas(<?php echo json_encode($m); ?>)' class="btn btn-info btn-xs" title="Modificar notas">
                    <i class="fa fa-file-text"></i></a>
                <?php } ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
<center>
    <div class="row" style="padding-left: 15%;">
        <div class="left">        
            <?php echo "-------------------------------------------"; ?><br>
                FIRMA DOCENTE               
        </div>
        <div class="left1">
            <?php echo "-------------------------------------------"; ?><br>
            V. B. DIRECTOR ACADEMICO
        </div>
    </div>
 </center>

<!------------------------ INICIO modal para modificar notas ------------------->
<div class="modal fade" id="modalmodificarnota" tabindex="-1" role="dialog" aria-labelledby="modalmodificarnotalabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">Modifcar notas de la materia:</span><br>
                <span class="text-bold" id="nombrede_materia"></span>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <input type="hidden" name="materia_numareas" id="materia_numareas" />
                <input type="hidden" name="nota_id" id="nota_id" />
                <div class="box-body table-responsive">
                    <div id="tablaresultados"></div>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a onclick="guardarmodificacion()" class="btn btn-success"><span class="fa fa-check"></span> Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para modificar notas ------------------->

<!------------------------ INICIO modal para generar notas ------------------->
<div class="modal fade" id="modalgenerarnotas" tabindex="-1" role="dialog" aria-labelledby="modalgenerarnotaslabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">Generar notas de la materia:</span><br>
                <span class="text-bold" id="nombrede_materiagen"></span>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <input type="hidden" name="materia_numareasgen" id="materia_numareasgen" />
                <input type="hidden" name="materiaasig_id" id="materiaasig_id" />
                <div class="box-body table-responsive">
                    <div id="tablaresultadosgen"></div>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a onclick="registrar_nuevasnotas()" class="btn btn-success"><span class="fa fa-check"></span> Generar Notas</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para generar notas ------------------->