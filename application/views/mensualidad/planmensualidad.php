<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>
<div class="row">
    <div class="cuerpo">
                    <div class="columna_derecha"  style="width:40%;">
                        <center> 
                     <h3 class="box-title">KARDEX DE PENSIONES<br>
                        <?php echo $kardex_economico[0]['kardexeco_id']; ?></h3>
                    </center>
                    <b>CARRERA: <?php echo $kardex_economico[0]['carrera_nombre']; ?></b>
                    </div>
                    <div class="columna_izquierda">
                       <center>                      <img src="<?php echo base_url('resources/images/institucion/'.$institucion['institucion_logo']); ?>" width="100" height="60"><br>
                     </center></div>
                    <div class="columna_central">
                        <center>  <font size="3"><b><u><?php echo $institucion['institucion_nombre']; ?></u></b></font><br>
                        <?php echo $institucion['institucion_zona']; ?> - <?php echo $institucion['institucion_direccion']; ?><br>
                        <?php echo $institucion['institucion_telefono']; ?><br>
                        <?php echo $institucion['institucion_departamento']; ?> - BOLIVIA
                     </center>
                    </div>

          

            </div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                
                <div class="col-md-12">
                  <?php $estilo = "style='font-family: Arial; font-size: 8pt;' "; ?>    
                    
                    <div class="col-md-4" <?php echo $estilo; ?>>
                        <b>Fecha Inscripción:</b> <?php echo date('d/m/Y', strtotime($kardex_economico[0]['inscripcion_fecha']))." ". $kardex_economico[0]['inscripcion_hora'];; ?>
                        <br><b>Estudiante:</b> <?php echo $kardex_economico[0]['estudiante_nombre']." ". $kardex_economico[0]['estudiante_apellidos']; ?>
                        <br><b>Cod./C.I.:</b> <?php echo $kardex_economico[0]['estudiante_ci']; ?>
                        <br><b>Carrera:</b> <?php echo $kardex_economico[0]['carrera_nombre']; ?>
                    </div>
                    <div class="col-md-3" <?php echo $estilo; ?>>
                        <b>Plan Acad.:</b> <?php echo $kardex_economico[0]['planacad_nombre']; ?>
                        <br><b>Semestre:</b> <?php echo $kardex_economico[0]['nivel_descripcion']; ?>
                        <br><b>karde Nº:</b> <?php echo "00".$kardex_economico[0]['kardexeco_id']; ?>
                        <br><b>Matricula:</b> <?php echo number_format($kardex_economico[0]['kardexeco_matricula'], 2, ".", ","); ?>
                    </div>
                    <div class="col-md-4" <?php echo $estilo; ?>>
                        <b>Mensualidad:</b> <?php echo number_format($kardex_economico[0]['kardexeco_mensualidad'], 2, ".", ","); ?>
                        <br><b>No. Mensualidades:</b> <?php echo $kardex_economico[0]['kardexeco_nummens']; ?>
                        <br><b>Nit:</b> <?php echo $kardex_economico[0]['estudiante_nit']; ?>
                        <br><b>Razon:</b> <?php echo $kardex_economico[0]['estudiante_razon']; ?>
                    </div>
                </div>
    
            <div class="box-body table-responsive">
                <table class="table-striped table-condensed" id="mitabla">
                    <tr>
						
                        <th>CTA.</th>                        
                        <th>COD.<BR>MENS.</th>
                        <th>REC.</th>
                        <th>MENS.</th>
                        <th>DESC.</th>
                        <th>LIMITE</th>
                        <th>TOTAL</th>
                        <th>EFECT.</th>
                        <th>SALDO</th>
                        <th>FECHA<br>PAGO</th>
                        <th>GLOSA</th>
                        <th>PAGADO POR</th>
						
					
                    </tr>
                    <?php $i=0;
                    $cancelados = 0;
                    foreach($mensualidad as $m){ 
                    	$i = $i+1; 
                        $subcancelados = $m['mensualidad_montocancelado']; 
                        $cancelados = $subcancelados + $cancelados; ?>
                    <tr>
						
                        <td><?php echo $m['mensualidad_numero']; ?></td>
                        <td ><?php echo $m['mensualidad_id']; ?></td>
                        <td ><?php echo $m['mensualidad_numrec']; ?></td>
                        <td style="text-align: right;"><?php echo number_format($m['mensualidad_montoparcial'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo number_format($m['mensualidad_descuento'], 2, ".", ","); ?></td>
                        <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($m['mensualidad_fechalimite'])); ?></td>
                        <td style="text-align: right;"><?php echo number_format($m['mensualidad_montototal'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo number_format($m['mensualidad_montocancelado'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo number_format($m['mensualidad_saldo'], 2, ".", ","); ?></td>
                        <td style="text-align: center;"><?php if ($m['mensualidad_fechapago']=='') { echo ("NO PAGADO");
                        }else{ echo $fecha_format = date('d/m/Y', strtotime($m['mensualidad_fechapago'])); } ?> <?php echo $m['mensualidad_horapago']; ?>
                        </td>
                        <td><?php echo $m['mensualidad_glosa']; ?>
                        </td>
                        <td><?php echo $m['mensualidad_nombre']; ?>
                            <?php echo $m['mensualidad_ci']; ?>
                        </td>		
                    </tr>
                    <?php } ?>
                     <tr>
                     <td><b>TOTAL</td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right; font-size: 12px;"><b><?php echo  number_format($cancelados, 2, ".", ","); ?></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     
                   </tr>
                </table>
            </div>
            <div class="cuerpo" style="padding-left: 80px; padding-right: 80px;">
                    <div class="columna_derecha">
                        <center>
                        <hr style="border-color: black; width: 80%;"> 
                       TITULAR: .................................<br>
                       C.I.: ............................................
                      
                    </center>
                    </div>
                    <div class="columna_izquierda">
                       <center>  
                         <hr style="border-color: black; width: 80%;">
                        CAJERO(A)
                       
                    </center></div> 
                    <div class="columna_central">
                    
                    </div>

            </div>
        </div>
             <a href="javascript:cerrar();" class="btn btn-danger no-print">Cerrar</a>
        </div>
    </div>
</div>
