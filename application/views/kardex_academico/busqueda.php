<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/kardexacademico.js'); ?>"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#estudiante').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
  <div class="box-header">
                <h3 class="box-title">Kardex Academico</h3>
                
            </div>
<div class="row">
<div class="box">
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
          
        <div class="box-body">  
        
        <div class="col-md-2">
            <label for="nose" class="control-label">Filtro por</label>
            <div class="form-group">
                <select class="form-control" name="opcion" id="opcion">
                    <option value="2">NOMBRE</option>
                    <option value="3" selected="true">APELLIDO(S)</option>
                    <option value="0">CÓDIGO</option>
                    <option value="1">C.I.</option>
                </select>
            </div>
        </div>
    
        <div class="col-md-4">
            <label for="Buscar" class="control-label">Buscar</label>
            <div class="form-group">
                <input type="text" name="estudiante" class="form-control" id="estudiante"   autocomplete="off" onkeypress="validar(event)"  />
            </div>
        </div>

        <!--<div class="col-md-3">
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
                <input type="text" name="apellidos" class="form-control" id="apellidos"  autocomplete="off" onkeypress="validar(event,3)"  />
            </div>
        </div>
        
        <div class="col-md-3">
            <label for="estudiante_codigo" class="control-label">Codigo</label>
            <div class="form-group">
                <input type="estudiante_codigo" name="estudiante_codigo" class="form-control" id="estudiante_codigo" autocomplete="off" onkeypress="validar(event,0)" />
            </div>
        </div>-->
    
    </div>
    <div class="col-md-12">
    
                <div class="box-body table-responsive">
                    <table class="table table-striped" id="mitabla">
                        <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>C.I.</th>
                        <th>CODIGO</th>
                        <th>CARRERA</th>
                        <th>GESTION</th>
                        <th>No MATERIAS</th>
                        <th>ESTADO</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaestudiantes">
                    </tbody>    
                    </table>
                    
                    <!--------------- RESULTADO TABLA DE ESTUDIANTES--------------------------->
                    
                </div>
 
   
    </div>            


</div>    