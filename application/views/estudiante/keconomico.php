<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexeconomico.js'); ?>"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="panel-group">
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
    <div class="panel-heading">
        <h3 class="box-title"> Kardex Economico </h3>
    <div class="col-md-12">   
        <div class="col-md-3">
            <label for="estudiante_ci" class="control-label">C.I.</label>
            <div class="form-group">
                <input type="text" name="estudiante_ci" class="form-control" id="estudiante_ci"   autocomplete="off" onkeypress="validar(event,1)"  />
            </div>
        </div>
        
        <div class="col-md-3">
            <label for="nombre" class="control-label">Nombre</label>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" id="nombre"  autocomplete="off" onkeypress="validar(event,2)"  />
            </div>
        </div>
        <div class="col-md-3">
            <label for="apellidos" class="control-label">Apellidos</label>
            <div class="form-group">
                <input type="text" name="apellidos" class="form-control" id="apellidos"  autocomplete="off" onkeypress="validar(event,2)"  />
            </div>
        </div>
        
        <div class="col-md-3">
            <label for="estudiante_codigo" class="control-label">Codigo</label>
            <div class="form-group">
                <input type="estudiante_codigo" name="estudiante_codigo" class="form-control" id="estudiante_codigo" autocomplete="off" onkeypress="validar(event,0)" />
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-12">
    
                <div id="tablaestudiantes">
                    
                    <!--------------- RESULTADO TABLA DE ESTUDIANTES--------------------------->
                    
                </div>
 
   
    </div>            
</div>