<script type="text/javascript">
     function calular(e,estudiante) {
 tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){ 
      //si la pulsacion proviene del buscador de estudiantes
            var p1 = document.getElementById('pond1'+estudiante).value;
            var p2 = document.getElementById('pond2'+estudiante).value;
            var p3 = document.getElementById('pond3'+estudiante).value;
            //var p4 = document.getElementById('pond4'+estudiante).value;
            //var p5 = document.getElementById('pond5'+estudiante).value;
            if (Number(p1)>30 || Number(p2)>60 || Number(p3)>10){
              alert('La nota no puede ser mas alta que su % ponderado');
              $("#total"+estudiante).val(0); 
            }else{
            var total = Number(p1)+Number(p2)+Number(p3);
            var final = Number(total/3);
            $("#total"+estudiante).val(total); 
          }
            //buscarestudiante(parametro);
            //alert(estudiante);
      

    }

}

function mal()
{
  alert('Esta Materia tiene 3 notas ponderadas')
}

function nopermitido()
{
  alert('No se puede modificar este campo')
}
function noestiempo()
{
  alert('No es permitido registrar notas fuera del rango de fechas establecidas')
}
</script>
<?php 
$session_data = $this->session->userdata('logged_in');
$usuario_id = $session_data['usuario_nombre']; ?>
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<div class="box-header">
                <h3 class="box-title">Registro de Notas</h3>
           
            </div>
<div class="cuerpo">
                    <div class="columna_derecha">
                        
                        <b>Nivel:</b> NIVEL 1<br>
                        <b>Turno:</b> TARDE<br>
                        <b>Fecha:</b> <?php echo date('d/m/Y'); ?>
                        
                    
                    </div>
                    <div class="columna_izquierda">
                     
                        <b>Docente:</b> <?php echo $usuario_id; ?> <br>
                        <b>Carrera:</b> Sistemas<br>
                        <b>Asignatura: </b> FISICA I
                       
                     </div>
                    <div class="columna_central">
                        <br>
                        <b>Materia:</b> FISICA I<br>
                        <b>Sigla:</b> (FIS100) 
                        
                    </div>
</div>
<div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
            <th >N°</th>
            <th >APELLIDOS</th>
            <th >NOMBRES</th>
            <th>EVALUACION TEORICA<BR>(30%)</th>
            <th>EVALUACION PRACTICA<BR>(60%)</th>
            <th>ASISTENCIA<BR>(10%)</th>
            <!--<th>Pond4</th>
            <th>Pond5</th>
            <th>Pond6</th>
            <th>Pond7</th>-->
            <th >PUNTAJE<br>TOTAL</th>
            
                    </tr>
                    <?php $cont = 0; foreach ($estudiante as $e) { $cont = $cont+1; ?>
                     
<tr>
  <td><?php echo $cont; ?></td>
  <td><?php echo $e["estudiante_apellidos"]; ?></td>
  <td><?php echo $e["estudiante_nombre"]; ?></td>
  <td style="width: 15%"><input  onclick="this.select()" onkeypress="calular(event,<?php echo $e['estudiante_id']; ?>)" type="number" value="0" min="0" max="30" name="pond1" id="pond1<?php echo $e["estudiante_id"]; ?>"></td>
  <td style="width: 15%"><input onclick="this.select()" onkeypress="calular(event,<?php echo $e['estudiante_id']; ?>)" type="number" value="0" min="0" max="60" name="pond2" id="pond2<?php echo $e["estudiante_id"]; ?>"></td>
  <td style="width: 15%"><input onclick="this.select()" onkeypress="calular(event,<?php echo $e['estudiante_id']; ?>)" type="number" value="0" min="0" max="10" name="pond3" id="pond3<?php echo $e["estudiante_id"]; ?>"></td>
  <!--<td><input onclick="mal()" readonly type="number" value="0" min="0" max="100" name="pond4" id="pond4<?php echo $e["estudiante_id"]; ?>"></td>
  <td><input onclick="mal()" readonly type="number" value="0" min="0" max="100" name="pond5" id="pond5<?php echo $e["estudiante_id"]; ?>"></td>
  <td><input type="number" onclick="mal()" value="0" readonly min="0" max="100" name="pond6" id="pond6"></td>
  <td><input type="number" onclick="mal()" value="0" readonly min="0" max="100" name="pond7" id="pond7"></td>-->
  <td><input type="number" onclick="nopermitido()" value="0" readonly min="0" max="100" name="total" id="total<?php echo $e['estudiante_id']; ?>"></td>
</tr>
                    <?php } ?>
                </table>
</div>

<button class="btn btn-success" onclick="noestiempo()"><span class="fa fa-check"></span> Registrar Notas</button>