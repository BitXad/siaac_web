<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Detalle Factura Add</h3>
            </div>
            <?php echo form_open('detalle_factura/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="factura_id" class="control-label">Factura</label>
						<div class="form-group">
							<select name="factura_id" class="form-control">
								<option value="">select factura</option>
								<?php 
								foreach($all_factura as $factura)
								{
									$selected = ($factura['factura_id'] == $this->input->post('factura_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$factura['factura_id'].'" '.$selected.'>'.$factura['factura_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_descripcion" class="control-label">Detalle Descripcion</label>
						<div class="form-group">
							<input type="text" name="detalle_descripcion" value="<?php echo $this->input->post('detalle_descripcion'); ?>" class="form-control" id="detalle_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_cantidad" class="control-label">Detalle Cantidad</label>
						<div class="form-group">
							<input type="text" name="detalle_cantidad" value="<?php echo $this->input->post('detalle_cantidad'); ?>" class="form-control" id="detalle_cantidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_precio" class="control-label">Detalle Precio</label>
						<div class="form-group">
							<input type="text" name="detalle_precio" value="<?php echo $this->input->post('detalle_precio'); ?>" class="form-control" id="detalle_precio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_subtotal" class="control-label">Detalle Subtotal</label>
						<div class="form-group">
							<input type="text" name="detalle_subtotal" value="<?php echo $this->input->post('detalle_subtotal'); ?>" class="form-control" id="detalle_subtotal" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_descuento" class="control-label">Detalle Descuento</label>
						<div class="form-group">
							<input type="text" name="detalle_descuento" value="<?php echo $this->input->post('detalle_descuento'); ?>" class="form-control" id="detalle_descuento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_totalfinal" class="control-label">Detalle Totalfinal</label>
						<div class="form-group">
							<input type="text" name="detalle_totalfinal" value="<?php echo $this->input->post('detalle_totalfinal'); ?>" class="form-control" id="detalle_totalfinal" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_caracteristicas" class="control-label">Detalle Caracteristicas</label>
						<div class="form-group">
							<textarea name="detalle_caracteristicas" class="form-control" id="detalle_caracteristicas"><?php echo $this->input->post('detalle_caracteristicas'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>