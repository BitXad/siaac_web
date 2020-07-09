<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Añadir Gesti&oacute;n</h3>
            </div>
            <?php echo form_open('gestion/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="gestion_semestre" class="control-label"><label class="text-danger">*</label>Gesti&oacute;n</label>
                        <div class="form-group">
                            <input type="text" name="gestion_semestre" value="<?php echo $this->input->post('gestion_semestre'); ?>" class="form-control" id="gestion_semestre" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gestion_inicio" class="control-label"><label class="text-danger">*</label>Inicio</label>
                        <div class="form-group">
                            <input type="date" name="gestion_inicio" value="<?php echo $this->input->post('gestion_inicio'); ?>" class="form-control" id="gestion_inicio"required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gestion_fin" class="control-label">Fin</label>
                        <div class="form-group">
                            <input type="date" name="gestion_fin" value="<?php echo $this->input->post('gestion_fin'); ?>" class="form-control" id="gestion_fin" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gestion_descripcion" class="control-label">Descripci&oacute;n</label>
                        <div class="form-group">
                            <input type="text" name="gestion_descripcion" value="<?php echo $this->input->post('gestion_descripcion'); ?>" class="form-control" id="gestion_descripcion" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('gestion/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>