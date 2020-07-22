<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/mensualidad.js'); ?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
                <h3 class="box-title"><center><b>KARDEX ECONOMICO</b></center> </h3>
            <div class="box-header">
                <div class="col-md-12 ">
                <div class="panel col-md-2" style="padding:0;"> 
                    <center>
                        <?php
                        if($kardex_economico[0]["estudiante_id"] >0){
                            $direcimagen = base_url("resources/images/estudiantes/").$kardex_economico[0]["estudiante_foto"];
                        }else{
                            $direcimagen ="";
                        }
                        ?>
                    <img src="<?php echo $direcimagen; ?>" width="80" height="100" class="img-bordered-sm">                                
                    </center>
                </div>
                <div class="col-md-5">
                    <h5><b>Estudiante:</b> <?php echo $kardex_economico[0]['estudiante_nombre']." ". $kardex_economico[0]['estudiante_apellidos']; ?></h5>
                <h5><b>Carrera:</b> <?php echo $kardex_economico[0]['carrera_nombre']; ?></h5>
                </div>
                <div class="col-md-5">
                <h5><b>Matricula:</b> <?php echo number_format($kardex_economico[0]['kardexeco_matricula'], 2, ".", ","); ?></h5>
                <h5><b>No. Mensualidades:</b> <?php echo $kardex_economico[0]['kardexeco_nummens']; ?></h5>
                </div>
                </div>
                

            	<div class="box-tools">
                    <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#nuevamensu"><span class="fa fa-edit"></span> Nueva Mensualidad</a>
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
                    <tr>
						<th>#</th>
            <th>No. <br>Mens.</th>
            <th>Mes</th>
						<th>Estado</th>
						<th>Montoparcial</th>
            <th>Mora</th>
            <th>Multa</th>
						<th>Desc.</th>
						<th>Montototal</th>
						<th>Fechalimite</th>
						<th>Cancelado</th>
						<th>Saldo</th>
						<th>Fecha Pago</th>
						<th>Nombre</br>
						Ci</th>
            <th>Recibo</th>
						<th>Glosa</th>
						<th></th>
                    </tr>
                    <?php $i=0;
                    $bandera=0;
                    foreach($mensualidad as $m){ 
                    	$i=$i+1; ?>
                    <tr>
    
						<td><?php echo $i; ?></td>
            <td><?php echo $m['mensualidad_numero']; ?></td>
            <td><?php echo $m['mensualidad_mes']; ?></td>
						<td><?php echo $m['estado_descripcion']; ?></td>
						<td><?php echo $m['mensualidad_montoparcial']; ?></td>
            <td><?php echo $m['mensualidad_mora']; ?></td>
            <td><?php echo $m['mensualidad_multa']; ?></td>
						<td><?php echo $m['mensualidad_descuento']; ?></td>
						<td><?php echo $m['mensualidad_montototal']; ?></td>
						<td><?php echo date('d/m/Y',strtotime($m['mensualidad_fechalimite'])); ?></td>
						
						<td><?php echo $m['mensualidad_montocancelado']; ?></td>
						<td><?php echo $m['mensualidad_saldo']; ?></td>
						<td style="text-align: center;"><?php if ($m['mensualidad_fechapago']=='') { echo ("");
                         
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($m['mensualidad_fechapago'])); } ?> <?php echo $m['mensualidad_horapago']; ?></td>
						<td><?php echo $m['mensualidad_nombre']; ?></br>
						<?php echo $m['mensualidad_ci']; ?></td>
            <td><?php echo $m['mensualidad_numrec']; ?></td>
						<td><?php echo $m['mensualidad_glosa']; ?></td>
						<td> <?php if ($m['estado_id']==8) { ?>
                      
                           
                             
                            <?php if ($bandera==0) { ?>
                           
                            <a href="#" data-toggle="modal" data-target="#pagar<?php echo $i; ?>" class="btn btn-success btn-xs"><span class="fa fa-dollar" title="COBRAR"></span></a>
<?php } $bandera=1; ?>
                            <!------------------------ INICIO modal para confirmar eliminación ------------------->
                                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
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
                             <a href="<?php echo site_url("mensualidad/pendiente/".$m['mensualidad_id']."/".$m['kardexeco_id']."/".$m['mensualidad_descuento']."/".$m['mensualidad_numero']); ?>" title="REESTABLECER" class="btn btn-info btn-xs"><span class="fa fa-undo"></span></a>
                             <a href="<?php echo site_url('mensualidad/comprobante/'.$m['mensualidad_id']); ?>" target="_blank" class="btn btn-success btn-xs"><span class="fa fa-print"></span></a>
                             <?php if ($m['factura_id']>0) {
                              ?>
                             <a href="<?php echo site_url('factura/factura_boucher_id/'.$m['factura_id']); ?>" target="_blank" class="btn btn-warning btn-xs"><span class="fa fa-list"></span></a>
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
              </div>
              <div class="modal-body" align="center">
                <form action="<?php echo base_url('mensualidad/pagar/'.$m['mensualidad_id']); ?>"  method="POST" class="form" id="saldar">

         
               <h2><b> <span class="mail-box" >Cancelar mensualidad<br><i class="fa fa-money"></i>
                    <?php echo $m['mensualidad_montototal']; ?></span>
              </b></h2>
              <?php if(count($dosificacion) >0){ ?>
              <button class="btn btn-info btn-xs" type="button">
              <input type="checkbox" name="factura<?php echo $m['mensualidad_id']; ?>" id="factura<?php echo $m['mensualidad_id']; ?>"  onclick="facturar(<?php echo $m['mensualidad_id'] ?>)"  />
              <label for="factura<?php echo $m['mensualidad_id']; ?>"> Generar Factura</label></button>
              <?php  }else{ echo "<span class='text-bold text-red'>Dosificación no activa</span>"; } ?>
          </div>
          <div class="col-md-12">
            <input type="hidden" name="mensualidad_id" value="<?php echo $m['mensualidad_id']; ?>" class="form-control" id="mensualidad_id" />
            <input type="hidden" name="estado_id" value="9" class="form-control" id="estado_id" />
            
                    <div class="col-md-4">
                        <label for="mensualidad_descuento" class="control-label">Descuento</label>
                        <div class="form-group">
                            <input type="number" onkeyup="descontar(<?php echo $m['mensualidad_id']; ?>)" max="<?php echo $m['mensualidad_multa']; ?>" name="mensualidad_descuento" value="0" min="0"class="form-control" id="mensualidad_descuento<?php echo $m['mensualidad_id']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <label for="mensualidad_multa" class="control-label">Multa</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_multa" value="<?php echo $m['mensualidad_multa']; ?>" class="form-control" id="mensualidad_multa<?php echo $m['mensualidad_id']; ?>" readonly/>
                        </div>
                    </div>
          <div class="col-md-4">

                        <label for="mensualidad_montocancelado" class="control-label">Monto Cancelado</label>
                        <div class="form-group">
                            <input type="number" step="any" onkeyup="calcular(<?php echo $m['mensualidad_id']; ?>)" name="mensualidad_montocancelado" value="<?php echo $m['mensualidad_montoparcial']+$m['mensualidad_multa']; ?>" class="form-control" id="mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>" min="0"/>
                            <input type="hidden"  name="mensualidad_montototal" value="<?php echo $m['mensualidad_montoparcial']+$m['mensualidad_multa']; ?>" class="form-control" id="mensualidad_montototal<?php echo $m['mensualidad_id']; ?>" />
                            <input type="hidden"  name="kardexeco_id" value="<?php echo $m['kardexeco_id']; ?>" class="form-control" id="kardexeco_id" />
                        </div>
                    </div>
                     <div class="col-md-4" >
                        <label for="mensualidad_saldo" class="control-label">Saldo</label>
                        <div class="form-group">
                            
                            
                           <input type="number" step="any" name="mensualidad_saldo" value="0" class="form-control" id="mensualidad_saldo<?php echo $m['mensualidad_id']; ?>" />
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
                    <div class="col-md-4">
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
            </form>
            <button class="btn btn-danger" data-dismiss="modal">
                
                <span class="fa fa-close"></span>   Cancelar  
               
            </button>
                         
        </div>

            </div>
          </div>
        </div>
        <!---------------------------------FIN MODAL DE PAGAR------------------------->
                    </tr>
                    <?php } ?>
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
                        $cont = $cont+1; ?>
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
<a href="javascript:cerrar();" class="btn btn-danger">Cerrar</a>