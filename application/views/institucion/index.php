<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
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
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Fecha creación</th>
                        <th>Ubicación</th>
                        <th>Distrito</th>
                        <th>Zona</th>
                        <th>Slogan</th>
                        <th>Departamento</th>
                        <th>Código</th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach($institucion as $in){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <div id="horizontal">
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$in['institucion_logo'];
                                    //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/institucion/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                </div>
                                <div style="padding-left: 4px">
                                    <?php echo "<b id='masg'>".$in['institucion_nombre']."</b><br>";
                                          echo "<b>Teléfono: </b>".$in['institucion_telefono']."<br>";
                                    ?>
                                </div>
                             </div>
                            
                        </td>
                        <td><?php echo $in['institucion_direccion']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($in['institucion_fechacreacion'])); ?></td>
                        <td><?php echo $in['institucion_ubicacion']; ?></td>
                        <td><?php echo $in['institucion_distrito']; ?></td>
                        <td><?php echo $in['institucion_zona']; ?></td>
                        <td><?php echo $in['institucion_slogan']; ?></td>
                        <td><?php echo $in['institucion_departamento']; ?></td>
                        <td><?php echo $in['institucion_codigo']; ?>
                            <!--<a href="<?php //echo site_url('institucion/edit/'.$in['institucion_id']); ?>" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a>-->
                            <!--<a href="<?php //echo site_url('institucion/remove/'.$in['institucion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                            <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $in['institucion_nombre']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/institucion/'.$in['institucion_logo']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
