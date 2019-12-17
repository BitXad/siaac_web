<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="cuerpo">
                    <div class="columna_derecha">
                        <center> 
                        <b>(E-3)</b>
                    </center>
                    </div>
                    <div class="columna_izquierda">
                       <center> <img src="<?php echo base_url("resources/images/institucion/")."thumb_".$institucion["institucion_logo"]; ?>">    <font size="2"><b>CENTRALIZADOR DE EVALUACION</b></font></center>
                     </div>
                    <div class="columna_central">
                        <center> GESTION <?php echo date('Y'); ?> </center>
                    </div>
</div>
<div class="cuerpo">
                    <div class="columna_derecha">
                        
                        <b>Nivel:</b> NIVEL 1<br>
                        <b>Turno:</b> TARDE<br>
                        <b>Fecha:</b> <?php echo date('d/m/Y'); ?>
                        
                    
                    </div>
                    <div class="columna_izquierda">
                     
                        <b>Docente:</b> <br>
                        <b>Carrera:</b> Sistemas<br>
                        <b>Asignatura: </b> FISICA I
                       
                     </div>
                    <div class="columna_central">
                        <br>
                        <b>Materia:</b> FISICA I<br>
                        <b>Sigla:</b> (FIS100) 
                        
                    </div>
</div>
<div class="box-body table-responsive" >
                <table class="table table-striped" id="mitabla">
                    <tr>
            <th rowspan="2"><BR>N°</th>
            <th rowspan="2"><BR>APELLIDOS</th>
            <th rowspan="2"><BR>NOMBRES</th>
            <th>1er.</th>
            <th>2do.</th>
            
            
            <th colspan="2" >PROM. ANUAL</th>
            <th rowspan="2"><BR>Obs.</th>
            <th colspan="2" >HABILITACION</th>
            <th rowspan="2"><BR>Obs.</th>
            
                    </tr>
                    <tr>
            <th>P<br>A<br>R</th>
            <th>P<br>A<br>R</th>
            <th>N<br>U<br>M</th>
            <th>LITERAL</th>
            <th>N<br>U<br>M</th>
            <th>LITERAL</th>

                    </tr>
                                       <!--  ESTA TABLA ES de ejempl-->
                    <?php $cont = 0; $rep = 0; $apr = 0; foreach ($estudiante as $e) { $cont = $cont+1; ?>
                     
<tr>
  <td><?php echo $cont; ?></td>
  <td><?php echo $e["estudiante_apellidos"]; ?></td>
  <td><?php echo $e["estudiante_nombre"]; ?></td>
  <td align="center"><?php echo $r1 = rand (10 , 100 ); ?></td>
  <td align="center"><?php echo $r2 =rand (10 , 100 ); ?></td>
  <td align="center"><?php $r3=$r1+$r2; echo $suma = round($r3/2); ?></td>
  <td><?php echo num_to_letras($suma); ?></td>
  <td></td>
  <?php if ($suma>=26 && $suma<=50) {  ?>
  <td align="center"><?php echo $r5 = rand (1 , 49 ); ?></td>
  <td><?php echo num_to_letras($r5); ?></td>
<?php }else{ ?>
  <td></td>
  <td></td>
<?php } ?>
  <td align="center"></td>
</tr>
<?php if ($suma>51) {
  $apr=$apr+1;
}else{
  $rep=$rep+1;
}

                 } ?>

                </table>
                <?php echo date('d/m/Y H:i:s'); ?>
                <center>
                <table class="table table-striped" id="mitabla" style="width: 50%">
                  <tr>
                    <th colspan="5">ESTADISTICA DE FISICA I</th>
                  </tr>
                  <tr>
                    <th>ESTUDIANTES</th>
                    <th>M</th>
                    <th>V</th>
                    <th>T</th>
                    <th>%</th>
                  </tr>
                  <tr>
                    <th>Inscritos</th>
                    <td>3</td>
                    <td>18</td>
                    <td>21</td>
                    <td>100%</td>
                  </tr>
                  <tr>
                    <th>Efectivos</th>
                    <td>3</td>
                    <td>18</td>
                    <td>21</td>
                    <td>100%</td>
                  </tr>
                  <tr>
                    <th>Retirados</th>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0%</td>
                  </tr>
                  <tr>
                    <th>Aprobados</th>
                    <td><?php echo 2; ?></td>
                    <td><?php echo $apr-2; ?></td>
                    <td><?php echo $apr; ?></td>
                    <td><?php echo round($apr/$cont*100, 2) ?> %</td>
                  </tr>
                  <tr>
                    <th>Reprobados</th>
                    <td><?php echo 1; ?></td>
                    <td><?php echo $rep-1; ?></td>
                    <td><?php echo $rep; ?></td>
                    <td><?php echo round($rep/$cont*100, 2) ?> %</td>
                  </tr>
                </table>
                </center>
</div>

<center>
  <b>NOTA: El presente documento queda nulo, si lleva raspaduras, borrones o enmiendas</b>
</center>
<br><br>
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