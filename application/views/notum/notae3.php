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
                        
                        <b>Nivel:</b> <br>
                        <b>Turno:</b> <br>
                        <b>Fecha:</b> <?php echo date('d/m/Y'); ?>
                        
                    
                    </div>
                    <div class="columna_izquierda">
                     
                        <b>Docente:</b> <br>
                        <b>Carrera:</b> <br>
                        <b>Asignatura:</b> 
                       
                     </div>
                    <div class="columna_central">
                        <br>
                        <b>Materia:</b> <br>
                        <b>Sigla:</b> 
                        
                    </div>
</div>
<div class="box-body table-responsive" >
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th rowspan="2"><BR>N</th>
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
                   

              	</table>
              	<?php echo date('d/m/Y H:i:s'); ?>
              	<center>
              	<table class="table table-striped" id="mitabla" style="width: 50%">
              		<tr>
              			<th colspan="5">ESTADISTICA DE (......)</th>
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
              			<td>M</td>
              			<td>V</td>
              			<td>T</td>
              			<td>%</td>
              		</tr>
              		<tr>
              			<th>Efectivos</th>
              			<td>M</td>
              			<td>V</td>
              			<td>T</td>
              			<td>%</td>
              		</tr>
              		<tr>
              			<th>Retirados</th>
              			<td>M</td>
              			<td>V</td>
              			<td>T</td>
              			<td>%</td>
              		</tr>
              		<tr>
              			<th>Aprobados</th>
              			<td>M</td>
              			<td>V</td>
              			<td>T</td>
              			<td>%</td>
              		</tr>
              		<tr>
              			<th>Reprobados</th>
              			<td>M</td>
              			<td>V</td>
              			<td>T</td>
              			<td>%</td>
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