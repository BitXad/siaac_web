<div class="row">
    <div class="col-md-12">
        <div class="box box-info"> 
            <div class="box-header with-border">
                <h3 class="box-title">Entregar Tarea</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
                    <div class="col-md-8 col-sm-12">
                        <div class="card" style="width: 100%;">
                            <div class="card-body" style="background-color: #c2e2e2; border-radius:10px 10px;">
                                <div style="margin: 10px 10px;">
                                    <h3 class="card-title"><?= $tarea['tarea_titulo'] ?></h3>
                                    <span style="white-space: pre-wrap;" class="text-justify"><?= $tarea['tarea_descripcion'] ?></span>
                                    <a href="<?= $tarea['tarea_enlace'] ?>" class="text-justify" title="Ir al enlace" target="_blank"><?= $tarea['tarea_enlace'] ?></a>
                                </div>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?php echo form_open_multipart("estudiante/respuesta/{$tarea['tarea_id']}/{$tarea['materia_id']}"); ?>
                        <label for="respuesta_estudiante">Respuesta de Estudiante</label>
                        <div class="form-group" style="margin-top: 20px; ">
                            <input type="file" class="form-control-file" id="respuesta_estudiante" name="respuesta_estudiante" value="<?php echo $this->input->post('respuesta_estudiante'); ?>" aria-describedby="respuestaHelp" required>
                            <small id="respuestaHelp" class="form-text text-muted">Debe subir un archivo con la tarea para completarla.</small>
                            <span class="text-danger"><?php echo form_error('respuesta_estudiante');?></span>
                        </div>
                        <button type="submit" class="btn btn-success col-md-12 col-xs-12">
                            <i class="fa fa-check"></i> Enviar
                        </button>
                        <?php echo form_close(); ?>
                    </div>
				</div>
			</div>
			<div class="box-footer">
				<a href="<?php echo site_url('estudiante/menu_estudiante'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </div>				
		</div>
    </div>
</div>