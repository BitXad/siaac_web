<script src="<?php echo base_url('resources/js/estudiante.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#nombre').keyup(function () {
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
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <h3 class="box-title">Estudiante</h3>  
</div>
<div class="col-md-6">
    <div class="input-group">
    <span class="input-group-addon">Buscar</span>
        <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Nombre, Apellidos del Estudiante" />
    </div>
</div>
<div class="col-md-2">
    <select name="estado" class="form-control" id="estado">
        <?php 
        foreach($all_estado as $estado)
        {
            echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
        } 
        ?>
    </select>
</div>
<div class="col-md-2">
    <div class="form-group">
        <a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success btn-sm form-control">Registrar Estudiante</a>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <a onclick="generarexcel_estudiante()" class="btn btn-facebook btn-sm form-control" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</a>
    </div>
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
         <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th> Nombre</th>
						<th>Info.</th>
						<th>Fecha y Lugar<br>
						de Nacimiento</th>
						<th> Direccion</br>
						Telefono(s)</th>
						<th> Establecimiento</th>
						<th> Distrito</th>
						<th> Apoderado</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="tablaestudiantes">
                  
                    </tbody>
                </table>
                               
            </div>
        </div>
    </div>
</div>
