<script src="<?php echo base_url('resources/js/docente.js'); ?>" type="text/javascript"></script>
<input type="text" id="base_url" value="<?php echo base_url();?>" hidden>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
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
    <h3 class="box-title">Docente</h3>
</div>
<div class="col-md-8">
    <div class="input-group">
    <span class="input-group-addon">Buscar</span>
        <input type="text" name="filtrar" class="form-control" id="filtrar" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Nombre, Apellidos del Docente" />
        
    </div>
    </div>
<div class="col-md-2">
    <div class="form-group">
        <a href="<?php echo site_url('docente/add'); ?>" class="btn btn-success btn-sm form-control">Registrar Docente</a>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <a onclick="generarexcel_docente()" class="btn btn-facebook btn-sm form-control" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</a>
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
                        <th>Nombre</th>
                        <th>Info.</th>
                        <th>Fecha Nacimineto</br>
                        (Edad)</th>
                        <th>Direccion</br>
                        Telefono</th>
                        <th>Titulo</th>
                        <th>Especialidad</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados"></tbody>
                </table>
                               
            </div>
        </div>
    </div>
</div>
