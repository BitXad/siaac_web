<link href="<?php echo site_url('resources/css/formValidation.css')?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>

<section class="content-header">
    <h1>
        Nuevo Periodo
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url() ?>periodo"><i class="fa fa-calendar-check-o"></i> Periodos</a></li>
        <li class="active">Nuevo Periodo</li>
    </ol>
</section>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nuevo Periodo</h3>
                <div id="user-result"></div>
            </div>
            <?php $attributes = array("name" => "periodoForm", "id"=>"periodoForm");
            echo form_open("periodo/add", $attributes);?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="periodo_nombre" class="control-label"><span class="text-danger">*</span>Nombre del Periodo</label>
						<div class="form-group">
							<input type="text" name="periodo_nombre" value="<?php echo set_value('periodo_nombre'); ?>" class="form-control" id="periodo_nombre" />
							<span class="text-danger"><?php echo form_error('periodo_nombre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periodo_horainicio" class="control-label"><span class="text-danger">*</span>Hora de inicio</label>
						<div class="form-group">
							<input type="time" name="periodo_horainicio" value="<?php echo set_value('periodo_horainicio'); ?>" class="form-control" id="periodo_horainicio" />
							<span class="text-danger"><?php echo form_error('periodo_horainicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="periodo_horafin" class="control-label"><span class="text-danger">*</span>Hora final</label>
						<div class="form-group">
							<input type="time" name="periodo_horafin" value="<?php echo set_value('periodo_horafin'); ?>" class="form-control" id="periodo_horafin" />
							<span class="text-danger"><?php echo form_error('periodo_horafin');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" id="boton" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('periodo/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<script>

    $( '#periodo_horafin' ).change(function() {
        //console.log( $('#periodo_horafin').val());
        var hdesde = $('#periodo_horainicio').val();
        var hhasta = $('#periodo_horafin').val();

        if( hdesde!='' && hhasta!=''){
            if(hhasta<=hdesde){
                console.log('ERROR! hora desde es menor!');
                $("#user-result").html('<small style="color: #f0120a;" class="help-block"><i class="fa fa-close"></i> ERROR! ´Hora final´ es menor a ´Hora inicio´</small>');
                $("#periodoForm").attr('class', 'form-group has-feedback has-error');
                $("#boton").attr( "disabled","disabled" );
            } else {
                $("#user-result").html('<i class="fa fa-check" style="color: #00CC00;"></i>');
                $("#periodoForm").attr('class', 'form-group');
                $("#boton").removeAttr("disabled");
            }
        }
    });

    $(document).ready(function() {

        $('#periodoForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                periodo_nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Nombre del Periodo es un campo requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 100,
                            message: 'Nombre del Periodo debe tener al menos 3 caracteres y maximo 100'
                        }
                    }
                },

                periodo_horainicio: {
                    validators: {
                        notEmpty: {
                            message: 'Hora Inicio es un campo requerido'
                        }
                    }
                },

                periodo_horafin: {
                    validators: {
                        notEmpty: {
                            message: 'Hora Fin es un campo requerido'
                        }
                    }
                }
            }
        });
    });

</script>