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
        
        $(document).ready(function () {
            (function ($) {
                $('#filtrar2').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar2 tr').hide();
                    $('.buscar2 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

    $(document).ready(function () {
            (function ($) {
                $('#filtrar3').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar3 tr').hide();
                    $('.buscar3 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
        
        
//function mostrar(){
//document.getElementById('oculto').style.display = 'block';}
//
//function ocultar(){
//document.getElementById('oculto').style.display = 'none';}
//
//function mostrar_ocultar(){
//    var x = document.getElementById('tipo_pago').value;
//    if (x=='CREDITO'){
//        document.getElementById('oculto').style.display = 'block';}
//    else{
//        document.getElementById('oculto').style.display = 'none';}
//}
//
//$(document).ready(localize());

function mostrar_ocultar(){
    var x = document.getElementById('escheck').checked;
    if (x== true){
        document.getElementById('nitraz').style.display = 'block';}
    else{
        document.getElementById('nitraz').style.display = 'none';}
}

</script>
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<input type="hidden" name="allgrupo" id="allgrupo" value='<?php echo json_encode($all_grupo); ?>' />
<input type="text" value="<?php echo $estudiante[0]["estudiante_id"]; ?>" id="estudiante_id" hidden>

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<?php
$session_data = $this->session->userdata('logged_in'); ?>
<div class="box-header with-border">
    <h3 class="box-title"><b>INSCRIPCIÓN <?php echo $session_data['semestre']."-".$session_data['gestion'] ?></b></h3>
</div>

<div class="container">
    <div class="panel panel-primary col-md-8">       
        <br>
        <div class="panel col-md-2" style="padding:0;"> 
            <center>
                <?php
                if($estudiante[0]["estudiante_id"] >0){
                    $direcimagen = base_url("resources/images/estudiantes/").$estudiante[0]["estudiante_foto"];
                }else{
                    $direcimagen ="";
                }
                ?>
            <img src="<?php echo $direcimagen; ?>" width="80" height="100" class="img-bordered-sm">                                
            </center>
        </div>

        <div class="col-md-6">
            <b>Estudiante: </b><?php echo $estudiante[0]["estudiante_apellidos"].", ".$estudiante[0]["estudiante_nombre"]; ?> <br>
            <b>C.I.: </b><?php echo $estudiante[0]["estudiante_ci"];?> <br>
            <b>Código: </b><?php echo $estudiante[0]["estudiante_codigo"]; ?><br>
            <b>Dirección: </b><?php echo $estudiante[0]["estudiante_direccion"]; ?>              
        </div>
    </div>
    <?php
    if($estudiante[0]["estudiante_id"] >0){
        if(count($all_historial)>0){
    ?>
    <div class="panel panel-primary col-md-8" style="padding-top: 1px; padding-bottom: 1px; padding-left: 1px; padding-right: 1px">
        <div class="text-center text-bold">Historial</div>
        <!--<div class="box-body">-->
            <table class="table table-striped table-responsive" id="mitabla">
                <tr>
                    <th style="padding: 0">Kardex</th>
                    <th style="padding: 0">Gesti&oacute;n</th>
                    <th style="padding: 0">Carrera</th>
                    <th style="padding: 0">Cod.</th>
                    <th style="padding: 0">Nivel</th>
                    <th style="padding: 0">Plan Acad.</th>
                    <th style="padding: 0">Estado</th>
                </tr>
                <?php
                foreach($all_historial as $historial){ ?>
                    <tr>
                        <td class="text-center" style="padding: 0"><?php echo $historial['kardexeco_id']; ?></td>
                        <td class="text-center" style="padding: 0"><?php echo $historial['estagestion']; ?></td>
                        <td style="padding: 0"><?php echo $historial['carrera_nombre']; ?></td>
                        <td class="text-center" style="padding: 0"><?php echo $historial['carrera_codigo']; ?></td>
                        <td class="text-center" style="padding: 0"><?php echo $historial['nivel_descripcion']; ?></td>
                        <td class="text-center" style="padding: 0"><?php echo $historial['planacad_nombre']; ?></td>
                        <td class="text-center" style="padding: 0"><?php echo $historial['esteestado_descripcion']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <!--</div>-->
    </div>
        <?php }} ?>
    <div class="box-tools">
        <center>            
            <a href="<?php echo base_url('estudiante/registrar/'); ?>" class="btn btn-success btn-foursquarexs"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Reg. Estudiante</small></a>
            <!--<a href="#" data-toggle="modal" data-target="#modalbuscar" id="modalbuscarclie" class="btn btn-warning btn-foursquarexs"><font size="5"><span class="fa fa-search"></span></font><br><small>Buscar Estud.</small></a>-->
            <button data-toggle="modal" data-target="#modalbuscar" id="modalbuscarclie" class="btn btn-warning btn-foursquarexs" onclick="enfocar_cursor()"><font size="5"><span class="fa fa-search"></span></font><br><small>Buscar Estud.</small></button>
            <!--<a href="" class="btn btn-info btn-foursquarexs"><font size="5"><span class="fa fa-cubes"></span></font><br><small>Productos</small></a>-->            
        </center>            
    </div>
</div>
<div class="row">
    <div class="col-md-9">
      	<div class="box box-info">
            <?php //echo form_open('inscripcion/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6" hidden>
                            <label for="usuario_id" class="control-label">Usuario</label>
                            <div class="form-group">
                                <select name="usuario_id" class="form-control" >
                                    <option value="">select usuario</option>
                                    <?php 
                                    foreach($all_usuario as $usuario)
                                    {
                                        $selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                            
                        <div class="col-md-6"  hidden>
                            <label for="gestion_id" class="control-label">Gestion</label>
                            <div class="form-group">
                                <select name="gestion_id" class="form-control">
                                    <option value="">select gestion</option>
                                    <?php 
                                    foreach($all_gestion as $gestion)
                                    {
                                        $selected = ($gestion['gestion_id'] == $this->input->post('gestion_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" id='loader'  style='display:none; text-align: center'>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                        </div>
                        <div class="col-md-4">
                            <label for="carrera_id" class="control-label">Curso/Carrera</label>
                            <div class="form-group"> <b>
                                <select name="carrera_id" id="carrera_id" class="form-control" onchange="obtener_planacademico(this.value)">
                                    <option value="0">- CURSO/CARRERA -</option>
                                    <?php
                                    foreach($all_carrera as $carrera)
                                    {
                                        $selected = ($carrera['carrera_id'] == $carrera_idinsc_est) ? ' selected="selected"' : "";
                                        echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
                                    } 
                                    ?>
                                </select></b>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="carrera_id" class="control-label">Plan Academico</label>
                            <div class="form-group" id="elegirplanacad"><b>
                                <select name="planacad_id" id="planacad_id" class="form-control" required>
                                    <option value="0">- PLAN ACADEMICO -</option>
                                </select></b>
                            </div>
                        </div>
                        <?php if($carrera_idinsc_est >0){ ?>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    var carrera_id = document.getElementById('carrera_id').value;
                                    obtener_planacademico(carrera_id);
                                    //seleccionar_carrera();
                                });
                            </script>
                        <?php } ?>
<!-------------------- INICIO ------------------------------------->
                        <?php 
                            $atributos = "";
                            $atributos2 = "style='background-color: black; color: red;' readonly";
                        ?>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_nivel" class="control-label">Nivel</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_nivel" id="carrera_nivel" value="<?php echo ($this->input->post('carrera_nivel') ? $this->input->post('carrera_nivel') : "-"); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_tiempoestudio" class="control-label">Duración Carrera</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_tiempoestudio" id="carrera_tiempoestudio" value="<?php echo ($this->input->post('carrera_tiempoestudio') ? $this->input->post('carrera_tiempoestudio') : "-"); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_codigo"  id="carrera_codigo" value="<?php echo ($this->input->post('carrera_codigo') ? $this->input->post('carrera_codigo') : "-"); ?>" class="form-control" required <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_modalidad" class="control-label">Modalidad</label>
                                <div class="form-group">
                                        <input type="text" name="carrera_modalidad" id="carrera_modalidad" value="<?php echo ($this->input->post('carrera_modalidad') ? $this->input->post('carrera_modalidad') : "-"); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_plan" class="control-label">Plan</label>
                                <div class="form-group">
                                        <input type="text" name="carrera_plan" id="carrera_plan" value="<?php echo ($this->input->post('carrera_plan') ? $this->input->post('carrera_plan') : "-"); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>
                        <?php 
                            $atributos = "";
                            $atributos2 = "style='background-color: orange; color: black;'";
                        ?>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_matricula" class="control-label">Matrícula Bs</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="carrera_matricula" id="carrera_matricula" value="<?php echo ($this->input->post('carrera_matricula') ? $this->input->post('carrera_matricula') : number_format(0,2)); ?>" class="form-control" placeholder="0.00" <?php echo $atributos2; ?> onkeyup="calcular_totales(event)" />
                            </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_mensualidad" class="control-label">Mensualidad Bs</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="carrera_mensualidad" id="carrera_mensualidad" value="<?php echo ($this->input->post('carrera_mensualidad') ? $this->input->post('carrera_mensualidad') : number_format(0,2)); ?>" class="form-control" placeholder="0.00" <?php echo $atributos2; ?> onkeyup="calcular_totales(event)"/>
                            </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_nummeses" class="control-label">Meses/Cuotas</label>
                            <div class="form-group">
                                <input type="number" min="0" name="carrera_nummeses" id="carrera_nummeses"  value="<?php echo ($this->input->post('carrera_nummeses') ? $this->input->post('carrera_nummeses') : "0"); ?>" class="form-control" placeholder="0" <?php echo $atributos2; ?>/>
                            </div>
                        </div>
<!--------------------- FIN ------------------------------------>
                        <div class="col-md-3">
                            <label for="nivel_id" class="control-label">Grado</label>
                            <div class="form-group">
                                <select name="nivel_id" id="nivel_id" class="form-control" onchange="mostrar_materias()">
                                    <option value="0">- GRADO -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="turno_id" class="control-label">Turno</label>
                            <div class="form-group">
                                <select name="turno_id" id="turno_id" class="form-control">
                                    <!--<option value="">- TURNO -</option>-->
                                    <?php 
                                    foreach($all_turno as $turno)
                                    {
                                        $selected = ($turno['turno_id'] == $this->input->post('turno_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$turno['turno_id'].'" '.$selected.'>'.$turno['turno_nombre'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label for="paralelo_id" class="control-label">Paralelo</label>
                            <div class="form-group">
                                <select name="paralelo_id" class="form-control" id="paralelo_id">
                                    <!--<option value="">- PARALELO -</option>-->
                                    <?php 
                                    foreach($all_paralelo as $paralelo)
                                    {
                                        $selected = ($paralelo['paralelo_id'] == $this->input->post('paralelo_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$paralelo['paralelo_id'].'" '.$selected.'>'.$paralelo['paralelo_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inscripcion_fechainicio" class="control-label">Fecha Inicio</label>
                            <div class="form-group">
                                <?php  
                                    //$fecha_inicio = $all_gestion[0]["gestion_inicio"];
                                
                                ?>
                                <input type="date" name="inscripcion_fechainicio" value="<?php if($parametro["parametro_fechainicio"] == null || $parametro["parametro_fechainicio"] =="0000-00-00"){ echo date("Y-m-d"); }else{ echo $parametro["parametro_fechainicio"]; } ?>" class="form-control" id="inscripcion_fechainicio" />
                            </div>
                        </div>

<!-------------------------------- INICIO ---------------------------------------->
                                <?php $padding = "style='padding:0;'"; ?>
					<div class="col-md-6">
						<label for="pagar_matricula" class="control-label">Materias</label>
						<div class="form-group">
                                                    <table class="table table-striped" id="mitabla">
                                                        <tr >
                                                            <th <?php echo $padding; ?>>#</th>
                                                            <th <?php echo $padding; ?>>Materia</th>
                                                            <th <?php echo $padding; ?>>Cód</th>
                                                            <th <?php echo $padding; ?>>Grupo</th>
                                                            <th <?php echo $padding; ?>></th>
                                                        </tr>
                                                        <tbody id="tabla_materia">
<!--                                                            <tr>
                                                                <td style="padding: 0;">1</td>
                                                                <td style="padding: 0;">Matematicas</td>
                                                                <td style="padding: 0;">MS100</td>
                                                                <td align="center" style="padding: 0;"><input type="checkbox" name="" valur="1" checked=""/></td>
                                                            </tr>
             -->
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
					</div>

                                        <div class="col-md-3">
						<label for="pagar_matricula" class="control-label">Pagar Matrícula</label>
						<div class="form-group">
                                                    <select id="pagar_matricula" name="pagar_matricula"  class="form-control" onchange="calcular()">
                                                        <option value="0">- NO - PAGAR MATRICULA</option>
                                                        <option value="1">PAGAR MATRICULA</option>
                                                        <option value="2">PAGAR MATRICULA DESPUES</option>
                                                        <option value="3">PAGAR A CUENTA</option>
                                                    </select>                                                    
                                                </div>
                                                
                                                <div id="div_acuenta" style="display: none">

                                                        <div class="col-md-2" id="div_acuenta">
                                                            <label for="div_acuenta" class="control-label">Bs</label>
                                                        </div>

                                                        <div class="col-md-10">
                                                                <!--<label for="pagar_mensualidad" class="control-label">Matric. a Cuenta</label>-->
                                                                <div class="form-group">
                                                                    <input type="text" value="0.00" class="form-control" id="matricula_acuenta" style="background-color: #46b8da" onchange="calcular()">
                                                                </div>
                                                        </div>
                                                </div>
					</div>

					<div class="col-md-3">
                                            <label for="pagar_mensualidad" class="control-label">Mensualidad <!--span class="btn btn-info btn-xs" style="padding: 0;"> <input type="checkbox" onchange="calcular()" id="check_acuenta"> A cuenta </span-->   </label>
						<div class="form-group">
                                                    <select id="pagar_mensualidad" name="pagar_mensualidad" class="form-control" onchange="calcular()">
                                                        <option value="0">- NINGUNA -</option>                                                        
                                                    </select>
                                                </div>

                                                
                                                <div id="div_mensualidad" style="display: none">

                                                        <div class="col-md-2" id="div_acuenta">
                                                            <label for="div_acuenta" class="control-label">Bs</label>
                                                        </div>

                                                        <div class="col-md-10">
                                                                <!--<label for="pagar_mensualidad" class="control-label">Matric. a Cuenta</label>-->
                                                                <div class="form-group">
                                                                    <input type="text" value="0.00" class="form-control" id="mensualidad_acuenta" name="mensualidad_acuenta" style="background-color: #46b8da" onchange="calcular()">
                                                                </div>
                                                        </div>
                                                </div>                                            
                                            
<!--                                                
                                                <div class="col-md-12" id="div_mensualidad" style="display: block;">
                                                        <label for="pagar_mensualidad" class="control-label">Matric. a Cuenta</label>
                                                        <div class="form-group">
                                                            <input type="text" value="0.00" class="form-control" id="mensualidad_acuenta" style="background-color: orange">
                                                        </div>
                                                </div>                                            
                                            -->
					</div>


					<div class="col-md-6">
						<label for="inscripcion_glosa" class="control-label">Observaciones</label>
						<div class="form-group">
                                                    <input type="text" name="inscripcion_glosa" value="" class="form-control" id="inscripcion_glosa" />
                                                </div>
					</div>






<!--------------------------------- FIN ----------------------------------------->

				</div>
			</div>
<!--          	<div class="box-footer">
            	<button type="submit" class="btn btn-facebook">
            		<i class="fa fa-floppy-o"></i> Inscribir
            	</button>
            	<a href="<?php echo base_url("dash"); ?>" class="btn btn-danger">
            		<i class="fa fa-fax"></i> Salir
            	</a>
                    
          	</div>-->
            <?php //echo form_close(); ?>
      	</div>
    </div>
    
<div class="col-md-3">
    <div class="box box-info">
        <div class="box-body table-responsive table-condensed">
            <center>
                <font size="5"><b>DETALLE INSCRIPCIÓN</b></font>
                <br><br>
                <?php if(count($dosificacion) >0){ ?>
                <input type="checkbox" name="escheck" id="escheck" style="display: flex" onclick="mostrar_ocultar()" />
                <?php }else{ echo "<span class='text-bold text-red'>Dosificación no activa</span>"; ?>
                <div hidden="true">
                    <input type="checkbox" name="escheck" id="escheck" style="display: flex"  />
                </div>
                
                    <?php } ?>
                
                <table class="table table-condensed" style="display: none" id="nitraz">
                    <tr>
                        <td style="font-weight: bold; text-align: right; border: 0px; padding: 0px; padding-top: 3px; padding-right: 4px">
                            
                            NIT:
                        </td>
                        <td style="border: 0px; padding: 0px">
                            <input type="text" name="nit" value="<?php echo $estudiante[0]["estudiante_nit"]; ?>" id="nit" onkeypress="validar(event,9)"  onchange="seleccionar_cliente()"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; text-align: right; border: 0px; padding: 0px; padding-top: 3px; padding-right: 4px">
                            RAZÓN:
                        </td>
                        <td style="border: 0px; padding: 0px">
                            <input type="text" name="razon" value="<?php echo $estudiante[0]["estudiante_razon"]; ?>" id="razon" onkeypress="validar(event,9)"  onchange="seleccionar_cliente()"/>
                        </td>
                    </tr>
                </table>
                
                <table class="table table-condensed">
                                        
                    <tr>

                        <td style="padding: 0" align="right">
                            <b>TOTAL Bs</b>
                        </td>
                        <td></td>
                        <td style="padding: 0">
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" style="font-size: 15px; font-weight: bolder; text-align:right;" size="5" name="total" value="0.00" id="total" readonly/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td  style="padding: 0" align="right">                           
                            <b>DESC.MENS. Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">                                        
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" size="5"  style="font-size: 15px; font-weight: bolder; text-align:right;" name="descuento" value="0.00" id="descuento" onkeyup="calcular()" onclick="this.select();" />
                        </td>
                    </tr>
                    <tr>

                        <td style="padding: 0" align="right">
                            <b>TOTAL FINAL Bs</b>
                        </td>
                        <td></td>
                        <td style="padding: 0">
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" style="font-size: 15px; font-weight: bolder; text-align:right;" size="5" name="total_final" value="0.00" id="total_final" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td   style="padding: 0" align="right">                   
                            <b>EFECTIVO Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">                                        
                            <input type="number" class="btn btn-sm btn-warning btn-foursquarexs" style="width: 94px;  font-size: 15px; font-weight: bolder; text-align:right;" name="efectivo" value="0.00" id="efectivo" onchange="calcularcambio()" onclick="this.select();"/>
                        </td>                                    
                    </tr>

                    <tr>
                        <td  style="padding: 0" align="right">
                            <b>CAMBIO Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" size="5"  style="font-size: 15px; font-weight: bolder; text-align:right;" name="inscripcion_glosa" value="0.00" id="cambio" readonly/>
                        </td>
                    </tr>
                    
                </table>
            </center>
                     
                    
                    
                    
                        <div class="col-md-12">
                            <button type="button" class="btn btn-facebook btn-block" onclick="registrar_inscripcion()">
                                    <i class="fa fa-floppy-o"></i> Finalizar Inscripción
                            </button>
                            <span id="esultimatransaccion"></span>
                            <a href="<?php echo base_url("inscripcion"); ?>" class="btn btn-danger btn-block">
                                    <i class="fa fa-fax"></i> Salir
                            </a>
                        </div>      
                    
                </div>   
                
            
        </div>    
</div>    
                            
                            
    
</div>


<!--------------------------------- INICIO MODAL CLIENTES ------------------------------------>
<div class="modal fade" id="modalbuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
                            
                                <div class="row">

                                           <!--------------------- parametro de buscador por codigo --------------------->

                                           <div class="col-md-8">
                                                <label for="buscar_estudiante" class="control-label">Buscar Estudiante:</label>
                                                <div class="input-group">
                                                     <span class="input-group-addon"> 
                                                       <i class="fa fa-binoculars"></i>
                                                     </span>
                                                     <input type="text" name="filtrar2" id="filtrar2" class="form-control" placeholder="Ingrese el nombre, CI, codigo del cliente " onkeyup="validar(event,1)">
                                                 </div>
                                           </div>      
                                          <!--------------------- fin buscador por codigo --------------------->


                                <div class="col-md-4">

                               <!--            ------------------- parametro de buscador --------------------->

                                <div class="input-group" style="padding-top: 5px">
                                    <br>
                                    <label>&nbsp;</label>
                                    <button class="btn btn-primary" onclick="boton_buscarestudiante()"><span class="fa fa-binoculars"></span> Buscar </button>
                                </div>
               <!--            ------------------- fin parametro de buscador ------------------- -->
                                   </div>

                               </div>

                                
			</div>
			<div class="modal-body">
                        <!--------------------- TABLA---------------------------------------------------->
                        <div class="box-body table-responsive">
                        <table class="table table-striped" id="mitabla">
<!--                            <tr>
                                                        <th>#</th>
                                                        <th>imagen</th>
                                                        <th>Nombres</th>
                            </tr>-->
                            
                            <tbody class="buscar2" id="tablaestudiantes">
                 

                            </tbody>
                        </table>
                    </div>

                        <!----------------------FIN TABLA--------------------------------------------------->
			</div>
		</div>
	</div>
</div>
<!--------------------------------- FIN MODAL CLIENTES ------------------------------------>