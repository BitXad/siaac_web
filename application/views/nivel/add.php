<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Nivel</h3>
            </div>
            <?php echo form_open('nivel/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
                            <div class="col-md-6">
                                <label for="nivel_descripcion" class="control-label"><span class="text-danger">*</span>Descripción</label>
                                <div class="form-group">
                                    <input type="text" name="nivel_descripcion" value="<?php echo $this->input->post('nivel_descripcion'); ?>" class="form-control" id="nivel_descripcion" required />
                                    <span class="text-danger"><?php echo form_error('nivel_descripcion');?></span>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <label for="planacad_id" class="control-label"><span class="text-danger">*</span>Plan Academico</label>
                                    <div class="form-group">
                                        <select name="planacad_id" class="form-control" required>
                                            <option value="">- PLAN ACADEMICO -</option>
                                            <?php 
                                            foreach($all_plan_academico as $plan_academico)
                                            {
                                                $selected = ($plan_academico['planacad_id'] == $this->input->post('planacad_id')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$plan_academico['planacad_id'].'" '.$selected.'>'.$plan_academico['planacad_nombre'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>Guardar
            	</button>
                <a href="<?php echo site_url('nivel'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>