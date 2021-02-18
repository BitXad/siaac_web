<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexacademico_nota.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="cuerpo">
    <div class="columna_derecha">
        <center> 
            <b>(E-2)</b>
        </center>
    </div>
    <div class="columna_izquierda">
       <center> <img src="<?php echo base_url("resources/images/institucion/")."thumb_".$institucion["institucion_logo"]; ?>">    <font size="2"><b>CENTRALIZADOR DE EVALUACION</b></font></center>
     </div>
    <div class="columna_central">
        <center> GESTION <?php echo $kardex_estudiante['gestion_semestre']."/".$kardex_estudiante['gestion_descripcion']; ?> </center>
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
            <th></th>

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
            <td><a onclick='cargarnotas(<?php echo json_encode($m); ?>)' class="btn btn-info btn-xs" title="Modifcar notas">
                    <i class="fa fa-file-text"></i></a>
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

<!------------------------ INICIO modal para Seleccioanr nuevo asociado ------------------->
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
                <div class="box-body table-responsive">
                    <div id="tablaresultados"></div>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Seleccionar nuevo asociado ------------------->