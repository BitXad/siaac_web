<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/mensualidad.js'); ?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>
<script type="text/css">
    
    h2{
        font-style: Arial;
    }    
    
</script>

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    
    <div class="col-md-12">
        
        <div class="box">
                <h3 class="box-title" style="font-family: Arial;"><center><b>KARDEX ECONOMICO</b></center> </h3>
            <div class="box-header">
                
                <div class="col-md-12 ">
<!--                    
                    <div class="panel col-md-2" style="padding:0;"> 
                        <center>
                            <?php
                            if($kardex_economico[0]["estudiante_id"] >0){
                                $direcimagen = base_url("resources/images/estudiantes/").$kardex_economico[0]["estudiante_foto"];
                            }else{
                                $direcimagen ="";
                            }
                            ?>
                        <img src="<?php echo $direcimagen; ?>" width="70" height="70" class="img-bordered img-circle">                                
                        </center>
                    </div>-->

                    <?php $estilo = "style='font-family: Arial; font-size: 8pt;' "; ?>    
                    
                    <div class="col-md-5" <?php echo $estilo; ?>>
                        <b>Estudiante:</b> <?php echo $kardex_economico[0]['estudiante_nombre']." ". $kardex_economico[0]['estudiante_apellidos']; ?>
                        <br><b>Carrera:</b> <?php echo $kardex_economico[0]['carrera_nombre']; ?>
                        <br><b>Plan Acad.:</b> <?php echo $kardex_economico[0]['planacad_nombre']; ?>
                        <br><b>Semestre:</b> <?php echo $kardex_economico[0]['nivel_descripcion']; ?>
                    </div>
                    
                    <div class="col-md-5" <?php echo $estilo; ?>>
                        <b>karde Nº:</b> <?php echo "00".$kardex_economico[0]['kardexeco_id']; ?>
                        <br><b>Matricula:</b> <?php echo number_format($kardex_economico[0]['kardexeco_matricula'], 2, ".", ","); ?>
                        <br><b>No. Mensualidades:</b> <?php echo $kardex_economico[0]['kardexeco_nummens']; ?>
                    </div>
                    
                </div>
                

            	<div class="box-tools">
                    <a class="btn btn-success btn-xs no-print" data-toggle="modal" data-target="#nuevamensu"><span class="fa fa-edit"></span> Nueva Mensualidad</a>
                    <!------------------------- modal  nueva mesualidad------------------->
                     <div class="modal fade" id="nuevamensu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body" align="center">
                <form action="<?php echo base_url('mensualidad/nueva/'.$mensualidad[0]['kardexeco_id']); ?>"  method="POST" class="form" id="saldar">

                <h3><b><span class="btn-info" style="border-radius: 8px;">Nueva Mensualidad </span></b></h3>  
                </div>
          
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for="mensualidad_numero" class="control-label">Numero</label>
                        <div class="form-group">
                          <input type="text" name="mensualidad_numero" value="<?php echo $this->input->post('mensualidad_numero'); ?>" class="form-control" id="mensualidad_numero" />
                        </div>
                      </div>
                    <div class="col-md-4">
                        <label for="mensualidad_montoparcial" class="control-label">Monto</label>
                        <div class="form-group">
                         <input type="text" name="mensualidad_montoparcial" value="<?php echo $this->input->post('mensualidad_montoparcial'); ?>" class="form-control" id="mensualidad_montoparcial" />
                        </div>
                      </div>
                    <div class="col-md-4">
                        <label for="mensualidad_mes" class="control-label">Mes</label>
                        <div class="form-group">
                          <input type="text" name="mensualidad_mes" value="<?php echo $this->input->post('mensualidad_mes'); ?>" class="form-control" id="mensualidad_mes" />
                        </div>
                      </div>
                  
                     <div class="col-md-4">
                        <label for="mensualidad_fechalimite" class="control-label">Fecha Limite</label>
                        <div class="form-group">
                          <input type="date" name="mensualidad_fechalimite" value="<?php echo $this->input->post('mensualidad_fechalimite'); ?>" class="form-control" id="mensualidad_fechalimite" />
                        </div>
                      </div>
                    
                      <div class="col-md-8">
                        <label for="mensualidad_glosa" class="control-label">Glosa</label>
                        <div class="form-group">
                          <input type="text" name="mensualidad_glosa" value="<?php echo $this->input->post('mensualidad_glosa'); ?>" class="form-control" id="mensualidad_glosa" />
                        </div>
                      </div>
                      
                    </div>
              <div class="modal-footer" align="right">

            <button class="btn btn-sm btn-success"  type="submit">
              
                <span class="fa fa-money"></span>   Insertar  
         
            </button> 
            </form>
            <button class="btn btn-sm btn-danger" data-dismiss="modal">
            
                <span class="fa fa-close"></span>   Cancelar  
         
            </button>
                         
        </div>

            </div>
          </div>
        </div>
        <!-------------------------fin modal------------------->
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                  <thead>
                    <tr>
                      <!--<th>#</th>-->
                      <th>CUOTA</th>
                      <th>MES</th>
                      <th>MONTO<br>PARC.Bs</th>
                      <th>MORA<br>DIAS</th>
                      <th>MULTA<br>Bs</th>
                      <th>DESC.<br>Bs</th>
                      <th>MONTO<br>TOTAL</th>
                      <th>FECHA<br>LIMITE</th>
                      <th>MONTO<br>CANC.Bs</th>
                      <th>SALDO<br>Bs</th>
                      <th>FECHA<br>PAGO</th>
                      <!--<th>DATOS<br>FACTURA</th>-->
                      <th>REC.</th>
                      <th>GLOSA</th>
                      <th>ESTADO</th>
                      <th  class="no-print"></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php $i=0;
                    $bandera=0;
                    $aux_matricula = $kardex_economico[0]['kardexeco_matriculapagada'];
                    $aux_mensualidad = $kardex_economico[0]['kardexeco_mensualidadpagada'];
                    
                    $total_mensualidad = 0;
                    $total_multa = 0;
                    $total_descuento = 0;
                    $total_monto = 0;
                    $total_cancelado = 0;
                    
                    foreach($mensualidad as $m){ 
                    	$i=$i+1; 
                    
                        $color = "";
                        if ($m['estado_id']==9){
                            $color = "background: #888888;";
                        }
                        if($aux_matricula < $kardex_economico[0]['kardexeco_matricula'] && $i == 1){
                          echo "<script type='text/javascript'>mensualidad({$m['mensualidad_id']});</script>";
                        }
                        
                        $total_mensualidad += $m['mensualidad_montoparcial'];
                        $total_multa += $m['mensualidad_multa'];
                        $total_descuento += $m['mensualidad_descuento'];
                        $total_monto += $m['mensualidad_montototal'];
                        $total_cancelado += $m['mensualidad_montocancelado'];

                    ?>
                    
                    <tr>
    
                      <!--<td style="<?php echo $color; ?>"><?php echo $i; ?></td>-->
                      <?php $color = $color." padding:0; "; ?>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo $m['mensualidad_numero']; ?></td>
                      <td style="<?php echo $color; ?>"><?php echo $m['mensualidad_mes']; ?></td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo number_format($m['mensualidad_montoparcial'],2,".",","); ?></td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo number_format($m['mensualidad_mora'],2,".",","); ?></td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo number_format($m['mensualidad_multa'],2,".",","); ?></td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo number_format($m['mensualidad_descuento'],2,".",","); ?></td>
                      <td style="<?php echo $color." font-size:8pt; text-align: center;"; ?>"><b><?php echo number_format($m['mensualidad_montototal'],2,".",","); ?></b></td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo date('d/m/Y',strtotime($m['mensualidad_fechalimite'])); ?></td>
                      
                      <td style="<?php echo $color." font-size:10pt; text-align: center;"; ?>"><center><b><?php echo number_format($m['mensualidad_montocancelado'],2,".",","); ?></center> </td>
                      <td style="<?php echo $color." text-align: center;"; ?>"><?php echo number_format($m['mensualidad_saldo'],2,".",","); ?></td>
                      <td style="text-align: center;<?php echo $color; ?>">
                      <?php 
                      if ($m['mensualidad_fechapago']=='') {
                        echo ("");
                      } else{ 
                        echo $fecha_format = date('d/m/Y', strtotime($m['mensualidad_fechapago'])); 
                      } 
                      ?> 
                      <?php echo $m['mensualidad_horapago']; ?></td>
                      
<!--                      <td style="<?php echo $color; ?>"><?php echo $m['mensualidad_nombre']; ?></br>
                      <?php echo $m['mensualidad_ci']; ?></td>
                      -->
                      <td style="<?php echo $color." text-align: center; font-size: 12px;"; ?>"><b><?php echo $m['mensualidad_numrec']; ?></b> </td>
                      <td style="<?php echo $color; ?>"><?php echo substr($m['mensualidad_glosa'],0,8).".."; ?></td>
                      <td style="<?php echo $color; ?>"><?php echo $m['estado_descripcion']; ?></td>
                      <td style="<?php echo $color; ?>" class="no-print"> 
                          <?php 
                            if ($m['estado_id']==8) { ?>
                                          <?php //if ($bandera==0) { ?>
                                        
                                          <a href="#" data-toggle="modal" data-target="#pagar<?php echo $i; ?>" class="btn btn-success btn-xs"><span class="fa fa-dollar" title="COBRAR"></span> Cobrar</a>
              <?php //} $bandera=1; ?>
                                              <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                                <div class="modal-dialog" role="document">
                                      <!------------------------ INICIO modal para confirmar eliminación ------------------->
                                                      <br><br>
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <!------------------------------------------------------------------->
                                                    
                                                    <h3><b> <span class="fa fa-trash"></span></b>
                                                        ¿Desea eliminar la mensualidad <b> <?php echo $m['mensualidad_numero']; ?></b>?
                                                    </h3>
                                                    <!------------------------------------------------------------------->
                                                    </div>
                                                    <div class="modal-footer aligncenter">
                                                                <a href="<?php echo site_url('mensualidad/remove/'.$m['mensualidad_id'].'/'.$m['kardexeco_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                                                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                  <!------------------------ FIN modal para confirmar eliminación ------------------->
                                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Eliminar"><span class="fa fa-trash" title="ELIMINAR"></span></a>
                                    <?php }else { ?>
                                      <a href="<?php echo site_url("mensualidad/pendiente/".$m['mensualidad_id']."/".$m['kardexeco_id']."/".$m['mensualidad_descuento']."/".$m['mensualidad_numero']); ?>" title="REESTABLECER" class="btn btn-info btn-xs"><span class="fa fa-undo"></span> Restabl.</a>
                                      <a href="<?php echo site_url('mensualidad/comprobante/'.$m['mensualidad_id']); ?>" target="_blank" class="btn btn-success btn-xs"><span class="fa fa-print"></span> </a>
                                      <?php if ($m['factura_id']>0) {
                                        ?>
                                      <a href="<?php echo site_url('factura/imprimir_factura_id/'.$m['factura_id']); ?>" target="_blank" class="btn btn-warning btn-xs"><span class="fa fa-list"></span></a>
                                    <?php } ?>
                                  </td>  
                                <?php } ?>
                              
            <!---------------------------------MODAL DE PAGAR------------------------->
            <div class="modal fade" id="pagar<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                            <h5 style="font-family: Arial;"><b> <i class="fa fa-money"></i> 
                                Cobrar Mensualidad                                
                                </b>
                            </h5>
                        </div>
                        <form action="<?php echo base_url('mensualidad/pagar/'.$m['mensualidad_id']); ?>" method="POST" class="form" id="saldar">
                        
                            <div class="modal-body">
                                <center>
                                    
                                    
                                    <b style="font-family: Arial; font-size: 14px;"><?php echo $m['mensualidad_mes']; ?></b>
                                    
                                    <h2 style="font-family: Arial; margin: 0;">
                                        <b> 
                                            Monto Bs: <?php echo number_format($m['mensualidad_montototal'],2,".",","); ?>
                                        </b>
                                    </h2>
                                    
                                    <?php if(count($dosificacion) >0){ ?>
                                        <button class="btn btn-info btn-xs" type="button">
                                            <input type="checkbox" name="factura<?php echo $m['mensualidad_id']; ?>" id="factura<?php echo $m['mensualidad_id']; ?>"  onclick="facturar(<?php echo $m['mensualidad_id'] ?>)"  />
                                            <label for="factura<?php echo $m['mensualidad_id']; ?>"> Generar Factura</label>
                                        </button>
                                    <?php  }else{ echo "<span class='text-bold text-red'>Dosificación no activa</span>"; } ?>
                                </center>
                            </div>
                        
                        <div class="col-md-12">
                            <input type="hidden" name="mensualidad_id" value="<?php echo $m['mensualidad_id']; ?>" class="form-control" id="mensualidad_id" />
                            <input type="hidden" name="estado_id" value="9" class="form-control" id="estado_id" />
                            <div class="col-md-4">
                                <label for="mensualidad_descuento" class="control-label">Descuento</label>
                                <div class="form-group">
                                    <input type="number" onkeyup="descontar(<?php echo $m['mensualidad_id']; ?>)" name="mensualidad_descuento" value="0" min="0" step="any" class="form-control" id="mensualidad_descuento<?php echo $m['mensualidad_id']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <label for="mensualidad_multa" class="control-label">Multa</label>
                                <div class="form-group">
                                    <input type="text" name="mensualidad_multa" value="<?php echo number_format($m['mensualidad_multa'],2,".",","); ?>" class="form-control" id="mensualidad_multa<?php echo $m['mensualidad_id']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="mensualidad_montocancelado" class="control-label">Monto Cancelado</label>
                                <div class="form-group">
                                    <input type="number" step="any" onkeyup="calcular(<?php echo $m['mensualidad_id']; ?>)" name="mensualidad_montocancelado" value="<?php echo number_format($m['mensualidad_montoparcial']+$m['mensualidad_multa'],2,".",","); ?>" class="form-control" id="mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>" min="0"/>
                                    <input type="hidden"  name="mensualidad_montototal" value="<?php echo number_format($m['mensualidad_montoparcial']+$m['mensualidad_multa'],2,".",","); ?>" class="form-control" id="mensualidad_montototal<?php echo $m['mensualidad_id']; ?>" />
                                    <input type="hidden"  name="kardexeco_id" value="<?php echo $m['kardexeco_id']; ?>" class="form-control" id="kardexeco_id" />
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <label for="mensualidad_saldo" class="control-label">Saldo</label>
                                <div class="form-group">
                                    <input type="number" step="any" name="mensualidad_saldo" value="0.00" class="form-control" id="mensualidad_saldo<?php echo $m['mensualidad_id']; ?>" />
                                    <input type="hidden" name="mensualidad_numero" value="<?php echo $m['mensualidad_numero']; ?>" class="form-control" id="mensualidad_numero" />
                                    <input type="hidden" name="mensualidad_fechalimite" value="<?php echo $m['mensualidad_fechalimite']; ?>" class="form-control" id="mensualidad_fechalimite" />
                                    <input type="hidden" name="mensualidad_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="mensualidad_fecha" />
                                    <input type="hidden" name="mensualidad_hora" value="<?php echo date('H:i:s'); ?>" class="form-control" id="mensualidad_hora" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="mensualidad_nombre" class="control-label">Razon Soc./Nombre</label>
                                <div class="form-group">
                                    <input type="text" name="mensualidad_nombre" value="<?php echo $kardex_economico[0]['estudiante_razon']?>" class="form-control" id="mensualidad_nombre" />
                                    <input type="hidden"  name="mensualidad_mes" value="<?php echo $m['mensualidad_mes']; ?>" class="form-control" id="mensualidad_mes<?php echo $m['mensualidad_id']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="mensualidad_ci" class="control-label">NIT/C.I.</label>
                                <div class="form-group">
                                    <input type="text" name="mensualidad_ci" value="<?php echo $kardex_economico[0]['estudiante_nit']?>" class="form-control" id="mensualidad_ci" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="mensualidad_glosa" class="control-label">Glosa</label>
                                <div class="form-group">
                                    <input type="text" name="mensualidad_glosa" value="" class="form-control" id="mensualidad_glosa" />
                                </div>
                            </div>
                            <div id="clinit<?php echo $m['mensualidad_id']; ?>" style="display: none">
                                <div class="col-md-12">
                                    <label for="factura_detalle" class="control-label">Detalle Factura</label>
                                    <div class="form-group">
                                        <textarea class="form-control" type="text" rows="2" name="factura_detalle<?php echo $m['mensualidad_id']; ?>" id="factura_detalle<?php echo $m['mensualidad_id']; ?>"><?php echo 'MENSUALIDAD No.'. $m['mensualidad_numero'].','.$m['mensualidad_mes'].','.$kardex_economico[0]['carrera_nombre'].','.$kardex_economico[0]['estudiante_nombre'].' '.$kardex_economico[0]['estudiante_apellidos'];?> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="modal-footer" align="right">
                            <button class="btn btn-success"  type="submit">
                                <span class="fa fa-money"></span>   Cobrar
                            </button>
                            <button class="btn btn-danger" data-dismiss="modal">
                                <span class="fa fa-close"></span>   Cancelar
                            </button>
                        </div>
                      </form>

                      </div>
                    </div>
                  </div>
                  <!---------------------------------FIN MODAL DE PAGAR------------------------->
                      </tr>
                    </tbody>
                    <?php } ?>
                    
                    <tr>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0; font-size: Arial; font-size: 12pt;"><?php echo number_format($total_mensualidad,2,".",","); ?></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0; font-size: Arial; font-size: 12pt;"><?php echo number_format($total_multa,2,".",","); ?></th>
                        <th style="padding: 0; font-size: Arial; font-size: 12pt;"><?php echo number_format($total_descuento,2,".",","); ?></th>
                        <th style="padding: 0; font-size: Arial; font-size: 12pt;"><?php echo number_format($total_monto,2,".",","); ?></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0; font-size: Arial; font-size: 12pt;"><?php echo number_format($total_cancelado,2,".",","); ?></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                        <th style="padding: 0;"></th>
                    </tr>
                    
                </table>
            </div>
        </div>
        
    </div>
</div>
Deudas por Ventas
<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
             
        <!--------------------- fin parametro de buscador --------------------->
        <div class="box">

            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                   
                    <tr>
            <th>#</th>
            <th>Credito</th>
            <th>Transaccion</th>
            <th>Monto</th>
            <th>Cuota Inicial</th>
            <th>Interes (%)</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th></th>
                    </tr>
                    <?php $cont = 0;
                    $total = 0;
                    foreach($creditos as $cr){ 
                        $total += $cr['credito_monto'];
                        $cont = $cont+1; 
                        
                        
                        ?>
                        <tr>
                          <td align="center"><?php echo $cont; ?></td>
                          <td align="center"><?php echo $cr['credito_id']; ?></td>
                          <td align="center"><?php echo $cr['venta_id']; ?></td>
                          <td align="right"><?php echo number_format($cr['credito_monto'],2); ?></td>
                          <td align="right"><?php echo number_format($cr['credito_cuotainicial'],2); ?></td>
                          <td align="right"><?php echo number_format($cr['credito_interesmonto'],2); echo '('.$cr['credito_interesproc'].')'; ?></td>
                          <td align="center"><?php echo date("d/m/Y", strtotime($cr['credito_fecha'])); ?></td>
                          <td align="center"><?php echo $cr['credito_hora']; ?></td>
                          <td><a href="<?php echo site_url('factura/imprimir_recibo/'.$cr['venta_id']); ?>"
                           class="btn btn-facebook btn-xs" target="_blank" title="Ver nota de venta"><span class="fa fa-print"></span></a> <a href="<?php echo site_url('cuotum/cuentas/'.$cr['credito_id']); ?>" target="_blank" class="btn btn-success btn-xs" title="Ver cuotas"><span class="fa fa-eye"></span></a>    </td>
                        <?php } ?>
                        </tr>
                        
                        <tr>
                          <td colspan="3" style="font-size: 12px">TOTAL</td>
                          <td align="right" style="font-size: 12px"><b><?php echo number_format($total,2); ?></b></td>
                          <td colspan="5"></td>
                        </tr>
                  
                </table>
                
            </div>
                        
        </div>
    </div>
</div>
<a href="javascript:cerrar();" class="btn btn-danger no-print">Cerrar</a>