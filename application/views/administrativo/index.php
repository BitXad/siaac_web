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

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Administrativo</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('administrativo/add'); ?>" class="btn btn-success btn-sm">Registrar Administrativo</a> 
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Info.</th>
						<th>Institucion</th>
						<th>Fecha Nacimineto <br>
						(Edad)</th>
						<th>Direccion</br>
						Telefono</th>
						<th>Cargo</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <?php $cont = 0;
                     $i = 0;
                    foreach($administrativo as $a){ 
                        $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont; $i+1;  ?></td>
							<td>
                            <div id="horizontal">
                                <?php if ($a['administrativo_foto']!=NULL && $a['administrativo_foto']!="") { ?>
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$a['administrativo_foto'];
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
                                    <?php echo "<b>".$a['administrativo_nombre']."</b><br>";
                                          echo "<b>".$a['administrativo_apellidos']."</b><br>";
                                          echo "<b>Cod.:</b> [".$a['administrativo_codigo']." ]";
                                    ?>
                                </div>
                             </div>
                            
                        </td>	
                        <td><?php echo $a['genero_nombre']; ?></br>
						<?php echo $a['estadocivil_descripcion']; ?></br>
                        <?php echo "<b>C.I.:</b> ".$a['administrativo_ci']; ?>
                        <?php echo $a['administrativo_extci']; ?></td>
						<td><?php echo $a['institucion_nombre']; ?></td>
											
						<td align="center"><?php if($a['administrativo_fechanac']!='0000-00-00'){ echo date("d/m/Y", strtotime($a['administrativo_fechanac'])); ?></br>
                        <!--<td><?php echo $d['docente_edad']; ?></td>-- CALCULAR A PARTIR DE LA FECHA DE NAC.-->
                        <?php $cumpleanos = new DateTime($a['administrativo_fechanac']); $hoy = new DateTime(); $annos = $hoy->diff($cumpleanos); echo "(", $annos->y, ")";  } ?></td>
						
						<td><?php echo "<b>Dir.:</b> ".$a['administrativo_direccion']; ?></br>
						<?php echo "<b>Telf.:</b> ".$a['administrativo_telefono']; ?><br>
						<?php echo $a['administrativo_celular']; ?></td>
						<td><?php echo $a['tipousuario_descripcion']; ?></td>  
						<td><?php echo $a['estado_descripcion']; ?>
							 <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $a['administrativo_nombre']; ?></b><b style="padding-left: 10px;"><?php echo $a['administrativo_apellidos']; ?></b> </font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/usuarios/'.$a['administrativo_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
						</td>
						<!--<td><?php echo $a['administrativo_fechareg']; ?></td>-->
						<td>
                            <a href="<?php echo site_url('administrativo/edit/'.$a['administrativo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('administrativo/remove/'.$a['administrativo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                   <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
