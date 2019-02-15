<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexeconomico.js'); ?>"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="panel-group">
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
    <div class="panel-heading">
        <h3 class="box-title">Kardex Economico</h3>
    <div class="col-md-12">   
        <div class="col-md-3">
            <label for="carrera" class="control-label">Carrera</label>
            <div class="form-group">
                <input type="text" name="carrera" class="form-control" id="carrera"   autocomplete="off" onkeypress="buscar(event,1)"  />
            </div>
        </div>
    
        </div>
    </div>
 
                <div id="tablagrupos">
                    
                    <!--------------- RESULTADO TABLA DE ESTUDIANTES--------------------------->
                    
                </div>

                <div id="tablapensiones">
                    
                    <!--------------- RESULTADO TABLA DE ESTUDIANTES--------------------------->
                    
                </div>
                
</div>