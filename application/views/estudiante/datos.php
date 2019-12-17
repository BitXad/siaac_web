<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <table>
                    <tr>
                        <td style="white-space: nowrap">
                      <?php if ($estudiante['estudiante_foto']!=NULL && $estudiante['estudiante_foto']!="") { ?>
                        <div>
                            <?php
                            $mimagen = $estudiante['estudiante_foto'];
                            //echo '<img src="'.site_url('/resources/images/clientes/'.$mimagen).'" />';
                            ?>
                            <!--<a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php //echo $i; ?>" style="padding: 0px;">-->
                            <img src="<?php echo site_url('/resources/images/estudiantes/'.$mimagen); ?>" width="30%" height="30%" />
                            <!--</a>-->
                        </div>
                        <?php } else { ?>
                            <div>
                                <img src="<?php echo site_url('/resources/images/usuarios/thumb_default.jpg');  ?>" />
                            </div>
                            <?php }  ?>
                     
                    <h3 class="box-title"><span class="text-bold">Estudiante: </span><?php echo $estudiante['estudiante_nombre']." ".$estudiante['estudiante_apellidos']."(".$estudiante['estudiante_codigo'].")"; ?></h3>
                     </td>
                </tr>
            </table>
            <?php echo form_open_multipart('estudiante/datos/'.$estudiante['estudiante_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                <div class="col-md-3">
                        <label for="genero_id" class="control-label">Genero</label>
                        <div class="form-group">
                                <?php echo $estudiante['genero_nombre'] ?>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estadocivil_id" class="control-label">Estado Civil</label>
                        <div class="form-group">
                                <?php echo $estudiante['estadocivil_descripcion'] ?>
                        </div>
                </div>

                <div class="col-md-3">
                        <label for="estudiante_fechanac" class="control-label">Fecha de Nacimiento</label>
                        <div class="form-group">
                            <?php
                            if($estudiante['estudiante_fechanac'] != null){
                                echo date("d/m/Y", time($estudiante['estudiante_fechanac']));
                            }else{
                                
                            }
                            ?>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estudiante_ci" class="control-label">C.I.</label>
                        <div class="form-group">
                            <?php echo $estudiante['estudiante_ci']." ".$estudiante['estudiante_extci'] ?>
                        </div>
                </div>
                <div class="col-md-6">
                        <label for="estudiante_direccion" class="control-label"><span class="text-danger">*</span>Direccion</label>
                        <div class="form-group">
                            <input type="text" name="estudiante_direccion" value="<?php echo ($this->input->post('estudiante_direccion') ? $this->input->post('estudiante_direccion') : $estudiante['estudiante_direccion']); ?>" class="form-control" id="estudiante_direccion" required />
                                <span class="text-danger"><?php echo form_error('estudiante_direccion');?></span>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estudiante_telefono" class="control-label">Telefono</label>
                        <div class="form-group">
                                <input type="number" name="estudiante_telefono" value="<?php echo ($this->input->post('estudiante_telefono') ? $this->input->post('estudiante_telefono') : $estudiante['estudiante_telefono']); ?>" class="form-control" id="estudiante_telefono" />
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estudiante_celular" class="control-label">Celular</label>
                        <div class="form-group">
                                <input type="number" name="estudiante_celular" value="<?php echo ($this->input->post('estudiante_celular') ? $this->input->post('estudiante_celular') : $estudiante['estudiante_celular']); ?>" class="form-control" id="estudiante_celular" />
                        </div>
                </div>
                <div class="col-md-6">
                        <label for="estudiante_email" class="control-label">Email</label>
                        <div class="form-group">
                                <input type="email" name="estudiante_email" value="<?php echo ($this->input->post('estudiante_email') ? $this->input->post('estudiante_email') : $estudiante['estudiante_email']); ?>" class="form-control" id="estudiante_email" />
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estudiante_lugarnac" class="control-label">Lugar de Nacimiento</label>
                        <div class="form-group">
                            <?php echo $estudiante['estudiante_lugarnac']; ?>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="estudiante_nacionalidad" class="control-label">Nacionalidad</label>
                        <div class="form-group">
                            <?php echo $estudiante['estudiante_nacionalidad']; ?>
                        </div>
                </div>
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('estudiante/menu_estudiante/'.$estudiante['estudiante_id']); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
        </div>
    </div>
</div>