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
<script src="<?php echo base_url('resources/js/estudiante.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>

       
            <div class="box-header">
                <h3 class="box-title">Estudiante</h3>
            	<div class="box-tools">
                    <form action="<?php echo site_url('estudiante/generar_excel'); ?>" method="POST">
                    <a href="<?php echo site_url('estudiante/add'); ?>" class="btn btn-success btn-sm">Registrar Estudiante</a>
                    <button  type="submit" class="btn btn-facebook btn-sm" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</button>
                    </form> 
                </div>  
            </div>
            <div class="col-md-8">
            <div class="input-group">
            <span class="input-group-addon">Buscar</span>
            
                <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off" onkeypress="validar(event,1)"  placeholder="Nombre, Apellidos del Estudiante" />
           
            </div>
            </div>
            <div class="col-md-4">
                <select name="estado" class="form-control" id="estado">
                                
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                  

                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
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
