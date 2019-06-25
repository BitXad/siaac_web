<link href="<?php echo site_url('resources/css/formValidation.css')?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>
<script src="<?php echo site_url() ?>resources/js/timepicker.min.js"></script>
<link href="<?php echo site_url() ?>resources/css/timepicker.min.css" rel="stylesheet"/>
<section class="content-header">
    <h1>
        Editar Horario
    </h1>
    
</section>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <?php $attributes = array("name" => "horarioForm", "id"=>"horarioForm");
            echo form_open("horario/set", $attributes);?>
			<div class="box-body">
				<div class="row clearfix">
                    <div class="col-md-6">
                        <label for="horario_desde" class="control-label">Horario Desde</label>
                        <div class="form-group">
                            <input type="time" name="horario_desde" value="<?php echo substr_replace($horario->horario_desde ,"", -3) ?>" class="form-control" id="horario_desde" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="horario_hasta" class="control-label">Horario Hasta</label>
                        <div class="form-group">
                            <input type="time" name="horario_hasta" value="<?php echo substr_replace($horario->horario_hasta ,"", -3); ?>" class="form-control" id="horario_hasta" />
                        </div>
                    </div>
					<div class="col-md-6">
						<label for="periodo_id" class="control-label">Periodo</label>
						<div class="form-group">
							<select name="periodo_id" id="periodo_id" class="form-control">
								<?php 
								foreach($all_periodo as $periodo)
								{
									$selected = ($periodo['periodo_id'] == $horario->periodo_id) ? ' selected="selected"' : "";

									echo '<option value="'.$periodo['periodo_id'].'" '.$selected.'>'.$periodo['periodo_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
                    <div class="col-md-6">
                        <label for="estado_id" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_id" id="estado_id" class="form-control">
                                <?php
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado_id'] == $horario->estado_id) ? ' selected="selected"' : "";
                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
				</div>
			</div>
			<div class="box-footer">
                <input type="hidden" name="horario_id" value="<?php echo $horario->horario_id?>">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
                <a href="<?php echo site_url('horario/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>

<script>

    $( '#horario_hasta' ).change(function() {
        //console.log( $('#horario_hasta').val());
        var hdesde = $('#horario_desde').val();
        var hhasta = $('#horario_hasta').val();

        if( hdesde!='' && hhasta!=''){
            if(hhasta<=hdesde){
                console.log('ERROR! hora desde es menor!');
                $("#user-result").html('<small style="color: #f0120a;" class="help-block"><i class="fa fa-close"></i> ERROR! ´Hora hasta´ es menor a ´Hora desde´</small>');
                $("#horarioForm").attr('class', 'form-group has-feedback has-error');
                $("#boton").attr( "disabled","disabled" );
            } else {
                $("#user-result").html('<i class="fa fa-check" style="color: #00CC00;"></i>');
                $("#horarioForm").attr('class', 'form-group');
                $("#boton").removeAttr("disabled");
            }
        }
    });


    $(document).ready(function() {

        $('#horarioForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                horario_desde: {
                    validators: {
                        notEmpty: {
                            message: 'Horario desde es un campo requerido'
                        }
                    }
                },
                horario_hasta: {
                    validators: {
                        notEmpty: {
                            message: 'Horario hasta es un campo requerido'
                        }
                    }
                },
                periodo_id:{
                    validators:{
                        notEmpty: {
                            message: 'Debe elegir un Periodo'
                        }
                    }
                }
            }
        });
    });
</script>