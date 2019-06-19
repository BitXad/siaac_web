<div class="row">
    <div class="col-md-12">
                <h3 class="box-title">Facturas</h3>
        <div class="box">
            <div class="box-header">
<!--                <div class="box-tools">
                    <a href="<?php echo site_url('factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                    <button  type="submit" class="btn btn-success btn-xs form-control" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</button>

                </div>-->
                
                <div class="col-md-12">
                    <form action="<?php echo site_url('factura/generar_excel'); ?>" method="POST">
                        
                        <div class="col-md-3">
                            <label for="desde" class="control-label">Desde:</label>
                            <div class="form-group">
                                <input type="date"class="btn btn-warning btn-xs form-control"  id="fecha_desde" name="fecha_desde" value="<?php echo date("Y-m-d");?>" onchange="mostrar_facturas()">

                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="hasta" class="control-label">Desde:</label>
                            <div class="form-group">
                                <input type="date" class="btn btn-warning btn-xs form-control"  id="fecha_hasta" name="fecha_hasta" value="<?php echo date("Y-m-d");?>" onchange="mostrar_facturas()">
                        
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <label for="tipo" class="control-label">Tipo:</label>
                            <div class="form-group">
                                <select name="tipo" id="opcion" class="btn btn-warning btn-xs form-control">
                                        <option value="1">VENTAS</option>
                                        <option value="2">COMPRAS</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-2">
                           <label for="desde" class="control-label"> </label>
                           <div class="form-group">
              
                               <button  type="submit" class="btn btn-danger btn-xs form-control" onclick="mostrar_facturas()"><span class="fa fa-binoculars"> </span> Ver</button>
      
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                           <label for="desde" class="control-label"> </label>
                           <div class="form-group">
              
                                <button  type="submit" class="btn btn-facebook btn-xs form-control" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</button>
      
                            </div>
                        </div>
                        
                    
                    </form>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tabla_factura">
<!--                    <tr>
                        <th>Id</th>
                        <th>Razon Social</th>
                        <th>Nit Emisor</th>
                        <th>Sucursal</th>
                        <th>Sfc</th>
                        <th>Actividad</th>
                        <th>Matricula Id</th>
                        <th>Mensualidad Id</th>
                        <th>Estado Id</th>
                        <th>Venta Id</th>
                        <th>Fechaventa</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Subtotaltotal</th>
                        <th>Ice</th>
                        <th>Exento</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Numero</th>
                        <th>Autorizacion</th>
                        <th>Llave</th>
                        <th>Fechalimite</th>
                        <th>Codigocontrol</th>
                        <th>Leyenda1</th>
                        <th>Leyenda2</th>
                        <th>Nit</th>
                        <th>Actions</th>
                    </tr>-->
                    <?php //foreach($factura as $f){ ?>
<!--                    <tr>
                        <td><?php echo $f['factura_id']; ?></td>
                        <td><?php echo $f['factura_razonsocial']; ?></td>
                        <td><?php echo $f['factura_nitemisor']; ?></td>
                        <td><?php echo $f['factura_sucursal']; ?></td>
                        <td><?php echo $f['factura_sfc']; ?></td>
                        <td><?php echo $f['factura_actividad']; ?></td>
                        <td><?php echo $f['matricula_id']; ?></td>
                        <td><?php echo $f['mensualidad_id']; ?></td>
                        <td><?php echo $f['estado_id']; ?></td>
                        <td><?php echo $f['venta_id']; ?></td>
                        <td><?php echo $f['factura_fechaventa']; ?></td>
                        <td><?php echo $f['factura_fecha']; ?></td>
                        <td><?php echo $f['factura_hora']; ?></td>
                        <td><?php echo $f['factura_subtotaltotal']; ?></td>
                        <td><?php echo $f['factura_ice']; ?></td>
                        <td><?php echo $f['factura_exento']; ?></td>
                        <td><?php echo $f['factura_descuento']; ?></td>
                        <td><?php echo $f['factura_total']; ?></td>
                        <td><?php echo $f['factura_numero']; ?></td>
                        <td><?php echo $f['factura_autorizacion']; ?></td>
                        <td><?php echo $f['factura_llave']; ?></td>
                        <td><?php echo $f['factura_fechalimite']; ?></td>
                        <td><?php echo $f['factura_codigocontrol']; ?></td>
                        <td><?php echo $f['factura_leyenda1']; ?></td>
                        <td><?php echo $f['factura_leyenda2']; ?></td>
                        <td><?php echo $f['factura_nit']; ?></td>
                        <td>
                            <a href="<?php echo site_url('factura/edit/'.$f['factura_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('factura/remove/'.$f['factura_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>-->
                    <?php //} ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
