<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script> 
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<!-------------------------------------------------------->
            <div class="box-header">
                <center> 
                <h3 class="box-title"><font size="3" face="Arial"><b> INSCRIPCIONES</b></font></h3>
                </center>            	
            </div>
<!-------------------------------------------------------->
<!--<div class="col-md-6">-->
            <!--este es INICIO de input buscador-->
             <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon">Buscar</span>           
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit" onkeypress="buscarcliente(event)" autocomplete="off" >
                </div>
            </div>
        <!--</div>-->

<div class="box-header no-print">
<h3 class="box-title"></h3>
            	<div class="box-tools">                    
                    <select  class="btn btn-facebook btn-sm" id="select_inscripcion" onclick="buscar_inscripciones()">
<!--                        <option value="1">-- SELECCIONE UNA OPCION --</option>-->
                        <option value="1">Inscripciones de Hoy</option>
                        <option value="2">Inscripciones de Ayer</option>
                        <option value="3">Inscripciones de la semana</option>
                        <option value="4">Todos las Inscripciones</option>
                        <option value="5">Inscripciones por fecha</option>
                    </select>
                    <button class="btn btn-warning btn-sm" onclick="verificar_Inscripciones()"><span class="fa fa-binoculars"></span> Verificar </button>
                    <a href="<?php echo site_url('venta/ventas'); ?>" class="btn btn-success btn-sm"><span class="fa fa-cart-arrow-down"></span> Ventas</a>
                    <a href="<?php echo site_url('inscripcion/inscribir/0'); ?>" class="btn btn-info btn-sm"> <span class="fa fa-address-card"></span> Inscribir</a> 
                </div>
</div>


<!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<form method="post" onclick="Inscripciones_por_fecha()">
<div class="panel panel-primary col-md-12 no-print" id='buscador_oculto' style='display:none;'>
    <br>
    <center>            
        <div class="col-md-2">
            Desde: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_desde" value="<?php echo date("Y-m-d");?>" name="fecha_desde" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_hasta" value="<?php echo date("Y-m-d");?>"  name="fecha_hasta" required="true">
        </div>
        
        <div class="col-md-2">
            Tipo:             
            <select  class="btn btn-warning btn-sm form-control" id="estado_id" required="true">
                <?php foreach($estado as $es){?>
                    <option value="<?php echo $es['estado_id']; ?>"><?php echo $es['estado_descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="col-md-2">
            Usuario:             
            <select  class="btn btn-warning btn-sm form-control" id="usuario_id">
                    <option value="0">-- TODOS --</option>
                <?php foreach($usuario as $us){?>
                    <option value="<?php echo $us['usuario_id']; ?>"><?php echo $us['usuario_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <br>
        <div class="col-md-3">

            <button class="btn btn-sm btn-facebook btn-sm btn-block"  type="submit">
                <h4>
                <span class="fa fa-search"></span>   Buscar
                </h4>
          </button>
            <br>
        </div>
        
    </center>    
    <br>    
</div>
</form>
<!------------------------------------------------------------------------------------------->

<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body  table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Fecha Inscripción</th>
                        <th>Cod. Inscrip.</th>
                        <th>Nivel</th>
                        <th>Grupo/Horario</th>
                        <th>Fecha Inicio</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php 
                            $j = 0;
                        foreach($inscripcion as $i){ ?>
                    <tr style="background-color: #<?php echo $i['estado_colorinsc'] ?>">
                        <td><?php echo ++$j; ?></td>
                        <td><font size="3"><b><?php echo $i['estudiante_apellidos'].", ".$i['estudiante_nombre']; ?></b></font>
                            <sub><?php echo "[".$i['estudiante_id']."]"; ?></sub>
                            <br><?php echo "CODIGO: ".$i['estudiante_codigo']." | C.I.: ".$i['estudiante_ci']." ".$i['estudiante_extci']; ?>
                        </td>
                        <td align="center"><?php echo $i['inscripcion_fecha']."<br>".$i['inscripcion_hora'] ; ?></td>
                        <td align="center"><font size="3"><b><?php echo "00".$i['inscripcion_id']; ?></b></font></td>
                        <td align="center"><b><?php echo $i['carrera_nombre']; ?></b><br><?php echo $i['nivel_descripcion']; ?></td>                           
                        <td align="center"><?php echo $i['paralelo_descripcion']."<br>".$i["turno_nombre"]; ?></td>
                        <td><?php echo $i['inscripcion_fechainicio']; ?></td>
                        <td><?php echo $i['esteestado_descripcion']; ?></td>
                        <td>
                            <?php if($i['estado_idinsc'] != 3){ ?>
                                <a href="<?php echo site_url('inscripcion/edit/'.$i['inscripcion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                                <a href="<?php echo site_url('venta/ventas_cliente/'.$i['cliente_id']); ?>" class='btn btn-success btn-xs' title='Vender'><span class='fa fa-cart-plus'></span></a>
                                <?php /*if($parametro['parametro_tipoimpresora'] == "FACTURADORA"){
                                        $tipo_recibo = "factura_boucher_id";
                                      }else { $tipo_recibo = "factura_carta_id";}*/ ?>
                                <a href="<?php echo site_url('inscripcion/boleta_inscripcion/'.$i['inscripcion_id']); ?>" target="_blank" class="btn btn-facebook btn-xs" title="Imprimir comprobante de inscripción"><span class="fa fa-print"></span></a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i['inscripcion_id']; ?>"  title="Anular Inscripción"><span class="fa fa-ban"></span></a>
                                <?php if($i['factura_id'] >0){ ?>
                                    <?php if($parametro['parametro_tipoimpresora'] == "FACTURADORA"){
                                            $tipo_fact = "factura_boucher_id";
                                          }else { $tipo_fact = "factura_carta_id";} ?>
                                    <a href="<?php echo site_url('factura/'.$tipo_fact."/".$i['factura_id']); ?>" target="_blank" class="btn btn-warning btn-xs" title="Ver/anular factura"><span class="fa fa-list-alt"></span></a>
                                <?php } ?>
                            <?php } ?>
                            <!------------------------ INICIO modal para confirmar eliminación ------------------->
                            <div class="modal fade" id="myModal<?php echo $i['inscripcion_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i['inscripcion_id']; ?>">
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <span class="text-bold" style="font-size: 18px">ANULAR INSCRIPCION</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <!------------------------------------------------------------------->
                                            <div style="text-align: left !important; font-size: 15px">
                                                Se anulara la inscripcion de:
                                            </div><br>
                                            <div class="text-center" style="font-size: 15px"><b> <?php echo $i['estudiante_apellidos'].", ".$i['estudiante_nombre']; ?></b></div>
                                            <span style="font-size: 12px">
                                            <?php
                                            if($i['factura_id'] >0){
                                                echo "<b><u>Nota</u>.- </b>Esta inscripcion, cuenta con una factura; se le recomienda anular dicha factura";
                                            }
                                            ?>
                                            </span>
                                            <!------------------------------------------------------------------->
                                        </div>
                                        <div class="modal-footer aligncenter">
                                            <a href="<?php echo site_url('inscripcion/anular/'.$i['inscripcion_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                            <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------ FIN modal para confirmar eliminación ------------------->
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
<!--                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                -->
            </div>
        </div>
    </div>
</div>
