<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#nombre').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<script src="<?php echo base_url('resources/js/estudiante.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>

       
            <div class="box-header">
                <h3 class="box-title">Estudiante</h3>
            	<div class="box-tools">
                    <form action="<?php echo site_url('estudiante/generar_excel'); ?>" method="POST">
                    <a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success btn-sm">Registrar Estudiante</a>
                    <button  type="submit" class="btn btn-facebook btn-sm" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</button>
                    </form> 
                </div>  
            </div>
            <div class="input-group">
            <span class="input-group-addon">Buscar</span>
            
                <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Nombre, Apellidos del Estudiante" />
           
            </div>
<div class="row">
    <div class="col-md-12">
         <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th> Nombre</th>
						<th>Info.</th>
						<th>Fecha y Lugar<br>
						de Nacimiento</th>
						<th> Direccion</br>
						Telefono(s)</th>
						<th> Establecimiento</th>
						<th> Distrito</th>
						<th> Apoderado</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="tablaestudiantes">
                    <?php $cont = 0;
                    $i=0;
                    foreach($estudiante as $e){ 
                        $cont = $cont+1; $i+1; ?>
                    
                    <tr>
						<td><?php echo $cont; ?></td>
						<td>
                            <div id="horizontal">
                              <?php if ($e['estudiante_foto']!=NULL && $e['estudiante_foto']!="") { ?>
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$e['estudiante_foto'];
                                    //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/estudiantes/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                </div>
                                <?php } else { ?>
                                    <div id="contieneimg">
                                        <img src="<?php echo site_url('/resources/images/usuarios/thumb_default.jpg');  ?>" />
                                    </div>
                                    <?php }  ?>
                                <div style="padding-left: 4px">
                                    <?php echo "<b>".$e['estudiante_nombre']."</b><br>";
                                          echo "<b>".$e['estudiante_apellidos']."</b><br>";
                                          echo "<b>Cod.:</b> [".$e['estudiante_codigo']." ]";
                                    ?>
                                </div>
                             </div>
                            <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby=mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $e['estudiante_nombre']; ?></b><b style="padding-left: 10px;"><?php echo $e['estudiante_apellidos']; ?></b> </font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/estudiantes/'.$e['estudiante_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>	
						<td><?php echo $e['genero_nombre']; ?></br>
						<?php echo $e['estadocivil_descripcion']; ?></br>
            <?php echo "<b>C. I.: </b>".$e['estudiante_ci']; ?>
            <?php echo $e['estudiante_extci']; ?></td>
						<td><?php if($e['estudiante_fechanac']!='0000-00-00'){ echo date("d/m/Y", strtotime($e['estudiante_fechanac'])); ?></>
                        <!--<td><?php echo $d['docente_edad']; ?></td>-- CALCULAR A PARTIR DE LA FECHA DE NAC.-->
                        <?php $cumpleanos = new DateTime($e['estudiante_fechanac']); $hoy = new DateTime(); $annos = $hoy->diff($cumpleanos); echo "(", $annos->y, "años)";  } ?></br>
                        <?php echo $e['estudiante_lugarnac']; ?></br>
            <?php echo "(".$e['estudiante_nacionalidad'].")"; ?></td> 
						
						<td><?php echo "<b>Dir.:</b> ".$e['estudiante_direccion']; ?></br>
						<?php echo "<b>Telf.:</b> ".$e['estudiante_telefono']; ?></br>
						<?php echo $e['estudiante_celular']; ?></td>
						<td><?php echo $e['estudiante_establecimiento']; ?></td>
						<td><?php echo $e['estudiante_distrito']; ?></td>
						<td>
							 <div id="horizontal">
                <?php if ($e['apoderado_foto']!=NULL && $e['apoderado_foto']!="") { ?>
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$e['apoderado_foto'];
                                    //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagenapo<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/apoderados/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                </div>
                                <?php } else { ?>
                                    <div id="contieneimg">
                                        <img src="<?php echo site_url('/resources/images/usuarios/thumb_default.jpg');  ?>" />
                                    </div>
                                    <?php }  ?>
                                <div style="padding-left: 4px">
                                    <?php echo "<b>".$e['estudiante_apoderado']."</b>(".$e['estudiante_apoparentesco'].")<br>";
                                          echo "<b>Dir.:</b> ".$e['estudiante_apodireccion']."<br>";
                                          echo "<b>Telf.:</b> ".$e['estudiante_apotelefono']."<br>";
                                    ?>
                                </div>
                             </div>
                             <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagenapo<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $e['estudiante_apoderado']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/apoderados/'.$e['apoderado_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
						</td>
            <td><?php echo $e['estado_descripcion']; ?></br>
						<?php echo "Nit: ".$e['estudiante_nit']; ?></br>
						<?php echo "Razon Social: ".$e['estudiante_razon']; ?></td>
						<td>
                            <a href="<?php echo site_url('estudiante/edit/'.$e['estudiante_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('estudiante/remove/'.$e['estudiante_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                
                    <?php $i++; } ?>
                    </tbody>
                </table>
                               
            </div>
        </div>
    </div>
</div>
