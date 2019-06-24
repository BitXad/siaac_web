<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
            <div class="box-header">
                <h3 class="box-title">Plan de Pagos Mensualidades</h3>
                <div class="col-md-12">
                <div class="col-md-6">
                <h5>Estudiante: <?php echo $kardex_economico[0]['estudiante_nombre']." ". $kardex_economico[0]['estudiante_apellidos']; ?></h5>
                <h5>Carrera: <?php echo $kardex_economico[0]['carrera_nombre']; ?></h5>
                </div>
                <div class="col-md-6">
                <h5>Matricula: <?php echo number_format($kardex_economico[0]['kardexeco_matricula'], 2, ".", ","); ?></h5>
                <h5>No. Mensualidades: <?php echo $kardex_economico[0]['kardexeco_nummens']; ?></h5>
                </div>
                </div>

            	<div class="box-tools">
                    <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#nuevamensu"><span class="fa fa-edit">Nueva Mensualidad</span></a>
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
                    <div class="col-md-3">
                        <label for="mensualidad_numero" class="control-label">Numero</label>
                        <div class="form-group">
                          <input type="text" name="mensualidad_numero" value="<?php echo $this->input->post('mensualidad_numero'); ?>" class="form-control" id="mensualidad_numero" />
                        </div>
                      </div>
                    <div class="col-md-3">
                        <label for="mensualidad_montoparcial" class="control-label">Monto</label>
                        <div class="form-group">
                         <input type="text" name="mensualidad_montoparcial" value="<?php echo $this->input->post('mensualidad_montoparcial'); ?>" class="form-control" id="mensualidad_montoparcial" />
                        </div>
                      </div>
                    <div class="col-md-3">
                        <label for="mensualidad_mes" class="control-label">Mes</label>
                        <div class="form-group">
                          <input type="text" name="mensualidad_mes" value="<?php echo $this->input->post('mensualidad_mes'); ?>" class="form-control" id="mensualidad_mes" />
                        </div>
                      </div>
                  
                     <div class="col-md-3">
                        <label for="mensualidad_fechalimite" class="control-label">Fecha Limite</label>
                        <div class="form-group">
                          <input type="date" name="mensualidad_fechalimite" value="<?php echo $this->input->post('mensualidad_fechalimite'); ?>" class="form-control" id="mensualidad_fechalimite" />
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
						<th>Desc.</th>
						<th>Montototal</th>
						<th>Fechalimite</th>
						<th>Mora</th>
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
    <script>
$(document).ready(function(){
  
  function restar(){
    
  
      uno = $("#mensualidad_montototal<?php echo $m['mensualidad_id']; ?>");
      dos = $("#mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>");
      tres = $("#mensualidad_saldo<?php echo $m['mensualidad_id']; ?>");
      cuatro = $("#mensualidad_mora<?php echo $m['mensualidad_id']; ?>");
      cinco =  $("#mensualidad_descuento<?php echo $m['mensualidad_id']; ?>");

      descuento = parseFloat(cinco.val());
      multa = parseFloat(cuatro.val());
      multar = parseFloat(uno.val())  + multa;
      operacion  = multar - parseFloat(dos.val()) - descuento; 
      tres.val(operacion);
    
  }
$("#mensualidad_descuento<?php echo $m['mensualidad_id']; ?>").keyup(function(){
      
      
      var descuento = $("#mensualidad_descuento<?php echo $m['mensualidad_id']; ?>");
      var total = $("#mensualidad_montototal<?php echo $m['mensualidad_id']; ?>");
      var nuevo = parseFloat(total.val() - descuento.val());
      $("#mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>").val(nuevo);
      
  });

  $("#mensualidad_mora<?php echo $m['mensualidad_id']; ?>").keyup(function(){
      
      var cuatro;
      cuatro = $("#mensualidad_mora<?php echo $m['mensualidad_id']; ?>").val();
      if(cuatro != ""){
        restar()
      }
      
  });
  
  $("#mensualidad_montototal<?php echo $m['mensualidad_id']; ?>").keyup(function(){
      
      var dos;
      dos = $("#mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>").val();
      
      if(dos != ""){
        restar()
      }
      
  });
  
  $("#mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>").keyup(function(){
      
      var uno;
      uno = $("#mensualidad_montototal<?php echo $m['mensualidad_id']; ?>").val();
      
      if(uno != ""){
        restar()
      }
      
  });
})
</script>
						<td><?php echo $i; ?></td>
            <td><?php echo $m['mensualidad_numero']; ?></td>
            <td><?php echo $m['mensualidad_mes']; ?></td>
						<td><?php echo $m['estado_descripcion']; ?></td>
						<td><?php echo $m['mensualidad_montoparcial']; ?></td>
						<td><?php echo $m['mensualidad_descuento']; ?></td>
						<td><?php echo $m['mensualidad_montototal']; ?></td>
						<td><?php echo date('d/m/Y',strtotime($m['mensualidad_fechalimite'])); ?></td>
						<td><?php echo $m['mensualidad_mora']; ?></td>
						<td><?php echo $m['mensualidad_montocancelado']; ?></td>
						<td><?php echo $m['mensualidad_saldo']; ?></td>
						<td style="text-align: center;"><?php if ($m['mensualidad_fechapago']=='') { echo ("");
                         
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($m['mensualidad_fechapago'])); } ?> <?php echo $m['mensualidad_horapago']; ?></td>
						<td><?php echo $m['mensualidad_nombre']; ?></br>
						<?php echo $m['mensualidad_ci']; ?></td>
            <td><?php echo $m['mensualidad_numrec']; ?></td>
						<td><?php echo $m['mensualidad_glosa']; ?></td>
						<td> <?php if ($m['estado_id']==3) { ?>
                      
                           
                             <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Eliminar"><span class="fa fa-trash" title="ELIMINAR"></span></a>
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

                          <?php }else { ?>
                             <a href="<?php echo site_url("mensualidad/pendiente/".$m['mensualidad_id']."/".$m['kardexeco_id']."/".$m['mensualidad_descuento']."/".$m['mensualidad_numero']); ?>" title="REESTABLECER" class="btn btn-info btn-xs"><span class="fa fa-undo"></span></a>
                             <a href="<?php echo site_url('mensualidad/boucher/'.$m['mensualidad_id']); ?>" target="_blank" class="btn btn-success btn-xs"><span class="fa fa-print"></span></a>
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

         
               <h1><b> <span class="mail-box" >Cancelar mensualidad<br><i class="fa fa-money"></i>
                    <?php echo $m['mensualidad_montototal']; ?></span>
              </b></h1>
          </div>
          <div class="col-md-12">
            <input type="hidden" name="mensualidad_id" value="<?php echo $m['mensualidad_id']; ?>" class="form-control" id="mensualidad_id" />
            <input type="hidden" name="estado_id" value="9" class="form-control" id="estado_id" />
            <div class="col-md-4" hidden>
                        <label for="mensualidad_mora" class="control-label">Mora</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_mora" value="0" class="form-control" id="mensualidad_mora<?php echo $m['mensualidad_id']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="mensualidad_descuento" class="control-label">Descuento</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_descuento" value="0" class="form-control" id="mensualidad_descuento<?php echo $m['mensualidad_id']; ?>" />
                        </div>
                    </div>
          <div class="col-md-4">

                        <label for="mensualidad_montocancelado" class="control-label">Monto Cancelado</label>
                        <div class="form-group">
                            <input type="number" step="any" name="mensualidad_montocancelado" value="<?php echo $m['mensualidad_montototal']; ?>" class="form-control" id="mensualidad_montocancelado<?php echo $m['mensualidad_id']; ?>" min="0"/>
                            <input type="hidden"  name="mensualidad_montototal" value="<?php echo $m['mensualidad_montototal']; ?>" class="form-control" id="mensualidad_montototal<?php echo $m['mensualidad_id']; ?>" />
                            <input type="hidden"  name="kardexeco_id" value="<?php echo $m['kardexeco_id']; ?>" class="form-control" id="kardexeco_id" />
                        </div>
                    </div>
                     <div class="col-md-4">
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
                        <label for="mensualidad_nombre" class="control-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_nombre" value="" class="form-control" id="mensualidad_nombre" />
                            <input type="hidden"  name="mensualidad_mes" value="<?php echo $m['mensualidad_mes']; ?>" class="form-control" id="mensualidad_mes<?php echo $m['mensualidad_id']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="mensualidad_ci" class="control-label">C.I.</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_ci" value="" class="form-control" id="mensualidad_ci" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="mensualidad_glosa" class="control-label">Glosa</label>
                        <div class="form-group">
                            <input type="text" name="mensualidad_glosa" value="" class="form-control" id="mensualidad_glosa" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer" align="right">

            <button class="btn btn-lg btn-success"  type="submit">
                <h4>
                <span class="fa fa-money"></span>   Cobrar  
                </h4>
            </button> 
            </form>
            <button class="btn btn-lg btn-danger" data-dismiss="modal">
                <h4>
                <span class="fa fa-close"></span>   Cancelar  
                </h4>
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
        <a href="javascript:cerrar();" class="btn btn-danger">Cerrar</a>
    </div>
</div>
