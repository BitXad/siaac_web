<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<div class="box-header">
    <h3 class="box-title">Institución</h3>
    <div class="box-tools">
        <?php
        if($newinst == 0){
        ?>
            <a href="<?php echo site_url('institucion/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a>
        <?php } ?>
        <?php
        if($newinst == 1){
        ?>
            <a href="<?php echo site_url('institucion/edit/'.$institucion[0]['institucion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
        <?php } ?>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Fecha creación</th>
                        <th>Ubicación</th>
                        <th>Distrito</th>
                        <th>Zona</th>
                        <th>Slogan</th>
                        <th>Departamento</th>
                        <th>Código</th>
                        <th></th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach($institucion as $in){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><div id="horizontal">
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$in['institucion_logo'];
                                    //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                    if($c['cliente_foto']){
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $cont; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                    <?php }
                                    else{
                                       echo '<img style src="'.site_url('/resources/images/usuarios/thumb_default.jpg').'" />'; 
                                    }
                                    ?>
                                    </div>
                                        <div style="padding-left: 4px">
                                        <?php echo "<b id='masg'>".$c['cliente_nombre']."</b><br>";
                                              echo "<b>Codigo: </b>".$c['cliente_codigo']."<br>";
                                              echo "<b>C.I.: </b>".$c['cliente_ci']."<br>";
                                              $linea = "";
                                              if($c['cliente_telefono'] >0 && $c['cliente_celular']>0){
                                                  $linea = "-";
                                              }
                                              echo "<b>Tel.: </b>".$c['cliente_telefono'].$linea.$c['cliente_celular'];
                                        ?>
                                    </div>
                                 </div>
                            
                            
                            
                            
                            <?php echo $i['institucion_logo'];
                                  echo $i['institucion_nombre']; ?></td>
                        <td><?php echo $i['institucion_direccion']; ?></td>
                        <td><?php echo $i['institucion_telefono']; ?></td>
                        <td><?php echo $i['institucion_fechacreacion']; ?></td>
                        <td><?php  ?></td>
                        <td><?php echo $i['institucion_ubicacion']; ?></td>
                        <td><?php echo $i['institucion_distrito']; ?></td>
                        <td><?php echo $i['institucion_zona']; ?></td>
                        <td><?php echo $i['institucion_slogan']; ?></td>
                        <td><?php echo $i['institucion_departamento']; ?></td>
                        <td><?php echo $i['institucion_codigo']; ?></td>
                        <td>
                            <a href="<?php echo site_url('institucion/edit/'.$i['institucion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('institucion/remove/'.$i['institucion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
