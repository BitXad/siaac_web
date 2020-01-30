<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/credito.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#cliente_id').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="box-header">
    <div class="col-md-6 no-print">
               <font size='4' face='Arial'><b>Cuentas por Cobrar</b></font>
               <br><font size='2' face='Arial' id="pillados">Registros Econtrados: </font>
        </div>
        <div class="col-md-6 no-print">
            <form action="<?php echo site_url('credito/repoCuentas'); ?>"  target="_blank" method="POST">
                <input type="hidden" name="usu" id="usu">
                <input type="hidden" name="feini" id="feini">
                <input type="hidden" name="fefin" id="fefin">
                <input type="hidden" name="esti" id="esti" value="">
                 <input type="hidden" name="vendedor" id="vendedor" value="">
              <?php if($rol[50-1]['rolusuario_asignado'] == 1){ ?>
               <button class="btn btn-success btn-md" style="float: right;margin-left: 10px"><span class="fa fa-print"></span> Imprimir</button>
          
              <?php } ?>
              <label class="btn btn-info btn-md" style="float: right;"> <input  class="btn btn-xs" type="checkbox"  id="agrupar" name="agrupar" value="1" > Agrupar</label>
            </form>
        </div></div>
                 <div class="col-md-12">
                     <div class="col-md-3">
        <!--------------------- parametro de buscador --------------------->
                <label for="fecha_desde" class="control-label">Cliente</label>
               <input id="cliente_id" type="text" onkeypress="buscarcuenta(event)" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  style="width: 100%;"  class="form-control" placeholder="Ingrese el Cliente">
                  
        <!--------------------- fin parametro de buscador --------------------->
    </div>
                     <div class="col-md-2" style="padding-left: -30px;"  >
            <label for="fecha_desde" class="control-label">Desde</label>
              <input type="date" class="form-control btn btn-primary" id="fecha_desde" name="fecha_desde" required="true"value="">
        </div>
            <div class="col-md-2" style="padding-left: -30px;"  >
                <label for="fecha_desde" class="control-label">Hasta</label>
           <input type="date" class="form-control btn btn-primary" id="fecha_hasta" name="fecha_hasta" required="true" value="">
    
       </div> 
       
      <div class="col-md-2">
        <label for="estado_id" class="control-label">Estado</label>
        <!--------------------- parametro de buscador --------------------->
                    <select  class="form-control btn btn-success"  id="estado_id" >
                        
                        <option value="8">PENDIENTE</option>
                        <option value="9">CANCELADO</option>
                        <option value="27">ANULADO</option>
                        <option value="">TODOS</option>
                       
                    </select>
        <!--------------------- fin parametro de buscador --------------------->
    </div>
    <div class="col-md-2" >
                        

                <label for="usuario_id" class="control-label">Usuario</label>                     
                           <select  name="usuario_id" id="usuario_id"  class="form-control btn btn-warning">
                                <option value="">-TODOS-</option>
                                <?php 
                                foreach($all_usuario as $usuario)
                                {
                                    $selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

                                    echo '<option  value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
                                } 
                                ?>
                            </select>

  
    </div>
         <div class="col-md-1" style="padding-bottom: 20px;padding-top: 5px;">
       <br>
     <button class="btn btn-facebook no-print" onclick="buscar_fecha_cuenta()">
           
                <span class="fa fa-search"></span>   Busqueda  
             
          </button>
  
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
             
        <!--------------------- fin parametro de buscador --------------------->
        <div class="box">

            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <thead id="titulos">
                    <tr>
						<th>#</th>
                                             
						<th>Cliente</th>
                        <th>Credito</th>
                        <th>Transaccion</th>
						<th>Estado</th>
						<th>Monto</th>
						<th>Cuota Inicial</th>
						<th>Interes (%)</th>
						<th># Pagos</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Usuario</th>
						<th></th>
                    </tr></thead>
                    <tbody class="buscar" id="tablacuentas">
                  
                </table>
                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
        </div>
    </div>
</div>

<!----------------- modal factura ---------------------------------------------->
<div hidden>
    
<button type="button" id="boton_modal_factura" class="btn btn-primary" data-toggle="modal" data-target="#modalfactura" >
    modal factura
</button>
</div>

<div class="modal fade" id="modalfactura" tabindex="-1" role="dialog" aria-labelledby="modalfactura" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                            <center>
                                <h4 class="modal-title" id="myModalLabel"><b>EMITIR FACTURA</b></h4>
                                <!--<b>ADVERTENCIA: Seleccione la </b>-->                  
                            </center>
                            
                        <br><b>NIT:</b><input type="text" id="generar_nit" value="0" class="form-control btn btn-xs btn-warning" style="text-align: left;">
                        <br><b>RAZON SOCIAL:</b><input type="text" id="generar_razon" value="SIN NOMBRE" class="form-control btn btn-xs btn-warning" style="text-align: left;">

                            
                    </div>
                    <div class="modal-body">
                        <!--------------------- TABLA---------------------------------------------------->
                        
                        <div class="box-body table-responsive">
                            
                            <b>DETALLE:</b><input type="text" id="generar_detalle" value="-" class="form-control btn btn-xs btn-default" style="text-align: left;">
                                
                            <div class="col-md-6">
                                <label for="usuario_idx" class="control-label">TOTAL Bs</label>

                                <input type="text" id="generar_venta_id" value="0.00" hidden >
                                <input type="text" id="generar_credito" value="" hidden >
                                <input type="text" id="generar_monto" value="0.00" class="form-control btn btn-xs btn-default" style="text-align: left;">
                            </div>
                                
                            <div class="col-md-6" id='botones'  style='display:block;'>
                                    <label for="opciones" class="control-label">Opciones</label>
                                    <div class="form-group">

                                        <button class="btn btn-facebook" id="boton_asignar" onclick="registrar_factura()" data-dismiss="modal" >
                                                <span class="fa fa-floppy-o"></span> Generar Factura
                                        </button>

                                        <button class="btn btn-danger" id="cancelar_preferencia" data-dismiss="modal" >
                                            <span class="fa fa-close"></span>   Cancelar                                                          
                                        </button>
                                    </div>
                                </div>
                            
                                <!--------------------- inicio loader ------------------------->
                                <div class="col-md-6" id='loaderinventario'  style='display: none;'>
                                    <center>
                                        <img src="<?php echo base_url("resources/images/loader.gif"); ?>" >        
                                    </center>
                                </div> 
                                <!--------------------- fin inicio loader ------------------------->

             
                        </div>

                        <!----------------------FIN TABLA--------------------------------------------------->
                    </div>
    </div>
  </div>
</div>


<!----------------- fin modal factura ---------------------------------------------->