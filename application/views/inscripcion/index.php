<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<!-------------------------------------------------------->
            <div class="box-header">
                <center> 
                <h3 class="box-title"><font size="3" face="Arial"><b> INSCRIPCIONES</b></font></h3>
                </center>            	
            </div>
<!-------------------------------------------------------->


<div class="box-header no-print">
<h3 class="box-title"></h3>
            	<div class="box-tools">                    
                    <select  class="btn btn-facebook btn-sm" id="select_inscripcion" onclick="buscar_inscripciones()">
<!--                        <option value="1">-- SELECCIONE UNA OPCION --</option>-->
                        <option value="1">Inscripciones de Hoy</option>
                        <option value="2">Inscripciones de Ayer</option>
                        <option value="3">Inscripciones de la semana</option>
                        <option value="4">Todos las Inscripciones</option>
                        <option value="5">Inscripciones por fecha</option>
                    </select>
                    <button class="btn btn-warning btn-sm" onclick="verificar_Inscripciones()"><span class="fa fa-binoculars"></span> Verificar </button>
                    <a href="<?php echo site_url('venta/ventas'); ?>" class="btn btn-success btn-sm"><span class="fa fa-cart-arrow-down"></span> Ventas</a>
                    <a href="<?php echo site_url('inscripcion/add'); ?>" class="btn btn-info btn-sm"> <span class="fa fa-address-card"></span> Inscribir</a> 
                </div>
</div>


<!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<form method="post" onclick="Inscripciones_por_fecha()">
<div class="panel panel-primary col-md-12 no-print" id='buscador_oculto' style='display:none;'>
    <br>
    <center>            
        <div class="col-md-2">
            Desde: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_desde" value="<?php echo date("Y-m-d");?>" name="fecha_desde" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-warning btn-sm form-control" id="fecha_hasta" value="<?php echo date("Y-m-d");?>"  name="fecha_hasta" required="true">
        </div>
        
        <div class="col-md-2">
            Tipo:             
            <select  class="btn btn-warning btn-sm form-control" id="estado_id" required="true">
                <?php foreach($estado as $es){?>
                    <option value="<?php echo $es['estado_id']; ?>"><?php echo $es['estado_descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="col-md-2">
            Usuario:             
            <select  class="btn btn-warning btn-sm form-control" id="usuario_id">
                    <option value="0">-- TODOS --</option>
                <?php foreach($usuario as $us){?>
                    <option value="<?php echo $us['usuario_id']; ?>"><?php echo $us['usuario_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <br>
        <div class="col-md-3">

            <button class="btn btn-sm btn-facebook btn-sm btn-block"  type="submit">
                <h4>
                <span class="fa fa-search"></span>   Buscar
                </h4>
          </button>
            <br>
        </div>
        
    </center>    
    <br>    
</div>
</form>
<!------------------------------------------------------------------------------------------->

<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body  table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                            <th>#</th>
                            <th>Estudiante</th>
                            <th>Fecha Inscripción</th>
                            <th>Cod. Inscrip.</th>
                            <th>Nivel</th>
                            <th>Grupo/Horario</th>
                            <th>Fecha Inicio</th>
                            <th></th>
                    </tr>
                    <?php 
                            $j = 0;
                        foreach($inscripcion as $i){ ?>
                    <tr>
                            <td><?php echo ++$j; ?></td>
                            <td><font size="3"><b><?php echo $i['estudiante_apellidos'].", ".$i['estudiante_nombre']; ?></b></font>
                                <sub><?php echo "[".$i['estudiante_id']."]"; ?></sub>
                                <br><?php echo "CODIGO: ".$i['estudiante_codigo']." | C.I.: ".$i['estudiante_ci']." ".$i['estudiante_extci']; ?>
                            </td>
                            <td align="center"><?php echo $i['inscripcion_fecha']."<br>".$i['inscripcion_hora'] ; ?></td>
                            <td align="center"><font size="3"><b><?php echo "00".$i['inscripcion_id']; ?></b></font></td>
                            <td align="center"><b><?php echo $i['carrera_nombre']; ?></b><br><?php echo $i['nivel_descripcion']; ?></td>                           
                            <td align="center"><?php echo $i['paralelo_descripcion']."<br>".$i["turno_nombre"]; ?></td>
                            <td><?php echo $i['inscripcion_fechainicio']; ?></td>
                            <td>
                            <a href="<?php echo site_url('inscripcion/edit/'.$i['inscripcion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('inscripcion/remove/'.$i['inscripcion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
<!--                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                -->
            </div>
        </div>
    </div>
</div>
