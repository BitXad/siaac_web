<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Administrar Cuenta</h3>
            </div>
			<?php echo form_open('docente/cuenta/'.$docente['docente_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="docente_login" class="control-label">Login docente</label>
						<div class="form-group">
							<input type="text" name="docente_login" value="<?php echo $docente['docente_login'] ?>" class="form-control" id="docente_login" required />
						</div>
					</div>

					<div class="col-md-4">
						<label for="newpass" class="control-label">Clave Antigua</label>
						<div class="form-group">
							<input type="password" name="docente_clave" class="form-control" id="docente_clave" required />
							<span class="text-danger"><?php echo $mensaje;?></span>
							
						</div>
					</div>

					<div class="col-md-4">
						<label for="confpass" class="control-label">Nueva Clave</label>
						<div class="form-group">
							<input type="password" name="newpass"  class="form-control" id="newpass" required />
							<span class="text-danger"><?php echo form_error('newpass');?></span>
						</div>
					</div>
				
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('docente/dashboard'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>