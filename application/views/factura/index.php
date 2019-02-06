<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Factura Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            <div class="col-md-12">
                <form action="<?php echo site_url('factura/generar_excel'); ?>" method="POST">
                    <div class="col-md-3">
                Desde: <input type="date" style=" width: 65%;  " class="btn btn-primary btn-xs form-control"  id="fecha_desde" name="fecha_desde" >
        </div><div class="col-md-3">
                    Hasta: <input type="date" style=" width: 65%;" class="btn btn-primary btn-xs form-control"  id="fecha_hasta" name="fecha_hasta" ></div>
                    <div class="col-md-3">
                    <select name="opcion" id="opcion" class="form-control-xs">
                                <option value="1">VENTAS</option>
                                <option value="2">COMPRAS</option>
                            </select></div>
                            <button  type="submit" class="btn btn-info btn-xs" target="_blank"><span class="fa fa-file"> Generar excel</span></button>
                            </form></div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>Factura Id</th>
                        <th>Factura Razonsocial</th>
                        <th>Factura Nitemisor</th>
                        <th>Factura Sucursal</th>
                        <th>Factura Sfc</th>
                        <th>Factura Actividad</th>
                        <th>Matricula Id</th>
                        <th>Mensualidad Id</th>
                        <th>Estado Id</th>
                        <th>Venta Id</th>
                        <!--<th>Factura Fechaventa</th>
                        <th>Factura Fecha</th>
                        <th>Factura Hora</th>
                        <th>Factura Subtotaltotal</th>
                        <th>Factura Ice</th>
                        <th>Factura Exento</th>
                        <th>Factura Descuento</th>
                        <th>Factura Total</th>
                        <th>Factura Numero</th>
                        <th>Factura Autorizacion</th>
                        <th>Factura Llave</th>
                        <th>Factura Fechalimite</th>
                        <th>Factura Codigocontrol</th>
                        <th>Factura Leyenda1</th>
                        <th>Factura Leyenda2</th>
                        <th>Factura Nit</th>-->
                        <th>Actions</th>
                    </tr>
                    <?php foreach($factura as $f){ ?>
                    <tr>
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
                        <!--<td><?php echo $f['factura_fechaventa']; ?></td>
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
                        <td><?php echo $f['factura_nit']; ?></td>-->
                        <td>
                            <a href="<?php echo site_url('factura/edit/'.$f['factura_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('factura/remove/'.$f['factura_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
