
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Docente</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success btn-sm">Registrar Docente</a> 
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Info.</th>
						<th>Fecha Nacimineto</br>
						(Edad)</th>
						<th>Direccion</br>
						Telefono</th>
						<th>Titulo</th>
						<th>Especialidad</th>
						<th>Email</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                     $i = 0;
                    foreach($docente as $d){ 
                        $cont = $cont+1; $i+1; ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td>  
                            <div id="horizontal">
                                <?php if ($d['docente_foto']!=NULL && $d['docente_foto']!="") { ?>
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$d['docente_foto'];
                                    //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/usuarios/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                </div>
                                <?php } else { ?>
                                    <div id="contieneimg">
                                        <img src="<?php echo site_url('/resources/images/usuarios/thumb_default.jpg');  ?>" />
                                    </div>
                                    <?php }  ?>
                                <div style="padding-left: 4px">
                                    <?php echo "<b>".$d['docente_nombre']."</b><br>";
                                          echo "<b>".$d['docente_apellidos']."</b><br>";
                                          echo "<b>Cod.:</b> [".$d['docente_codigo']." ]";
                                    ?>
                                </div>
                             </div>

                        </td>	
						<td><?php echo $d['estadocivil_descripcion']; ?><br>
                            <?php echo $d['genero_nombre']; ?><br>
                        <?php echo "<b>C.I.:</b> ".$d['docente_ci']; ?>
                        <?php echo $d['docente_extci']; ?></td>                  
						
						<td align="center"><?php if($d['docente_fechanac']!='0000-00-00'){ echo date("d/m/Y", strtotime($d['docente_fechanac'])); ?></br>
                        <!--<td><?php echo $d['docente_edad']; ?></td>-- CALCULAR A PARTIR DE LA FECHA DE NAC.-->
                        <?php $cumpleanos = new DateTime($d['docente_fechanac']); $hoy = new DateTime(); $annos = $hoy->diff($cumpleanos); echo "(", $annos->y, ")";  } ?></td>
						
						<td><?php echo "<b>Dir.:</b> ".$d['docente_direccion']; ?></br>
						<?php echo "<b>Telf.:</b> ".$d['docente_telefono']; ?></br>
						<?php echo $d['docente_celular']; ?></td>
						<td><?php echo $d['docente_titulo']; ?></td>
						<td><?php echo $d['docente_especialidad']; ?></td>
						<td><?php echo $d['docente_email']; ?></td>
						<td><?php echo $d['estado_descripcion']; ?>
							 <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $d['docente_nombre']; ?></b><b style="padding-left: 10px;"><?php echo $d['docente_apellidos']; ?></b> </font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/usuarios/'.$d['docente_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
						</td>
						<td>
                            <a href="<?php echo site_url('docente/edit/'.$d['docente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                           <!-- <a href="<?php echo site_url('docente/remove/'.$d['docente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                   <?php $i++; } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
