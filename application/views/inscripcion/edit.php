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
<style>
    /*input[type="number"]
    {
        -webkit-appearance: textfield !important;
        margin: 0;
        -moz-appearance:textfield !important;
    }*/
</style>
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<input type="hidden" name="allgrupo" id="allgrupo" value='<?php echo json_encode($all_grupo); ?>' />
<input type="text" value="<?php echo $estudiante[0]["estudiante_id"]; ?>" id="estudiante_id" hidden>
<input type="hidden" value="<?php echo $inscripcion["inscripcion_id"]; ?>" id="inscripcion_id" name="inscripcion_id">
<input type="hidden" value="<?php echo $kardexacad_id; ?>" id="kardexacad_id" name="kardexacad_id">
<input type="hidden" value="<?php echo $keconomico["kardexeco_id"]; ?>" id="kardexeco_id" name="kardexeco_id">
<input type="hidden" value="<?php echo $tipousuario_id; ?>" id="tipousuario_id" name="tipousuario_id">
<input type="hidden" value="<?php echo $tiene_factura; ?>" id="tiene_factura" name="tiene_factura">

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<?php
$session_data = $this->session->userdata('logged_in'); ?>
<div class="box-header with-border">
    <h3 class="box-title"><b>MODIFICAR INSCRIPCIÓN <?php echo $session_data['semestre']."-".$session_data['gestion'] ?></b></h3>
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
                            <label for="carrera_id" class="control-label">Carrera</label>
                            <div class="form-group"> <b>
                                <select name="carrera_id" id="carrera_id" class="form-control" onchange="obtener_planacademico(this.value)">
                                    <option value="0">- CURSO/CARRERA -</option>
                                    <?php
                                    foreach($all_carrera as $carrera)
                                    {
                                        $selected = ($carrera['carrera_id'] == $inscripcion["carrera_id"]) ? ' selected="selected"' : "";
                                        echo '<option value="'.$carrera['carrera_id'].'" '.$selected.'>'.$carrera['carrera_nombre'].'</option>';
                                    } 
                                    ?>
                                </select></b>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="carrera_id" class="control-label">Plan Academico</label>
                            <div class="form-group" id="elegirplanacad"><b>
                                <select name="planacad_id" id="planacad_id" class="form-control" onchange='seleccionar_carrera()' required>
                                    <option value="0">- PLAN ACADEMICO -</option>
                                    <?php
                                    foreach($all_plan_academico as $plan)
                                    {
                                        $selected = ($plan['planacad_id'] == $esteplanacad_id) ? ' selected="selected"' : "";
                                        echo '<option value="'.$plan['planacad_id'].'" '.$selected.'>'.$plan['planacad_nombre'].'</option>';
                                    }
                                    ?>
                                </select></b>
                            </div>
                        </div>
                        <?php //if($carrera_idinsc_est >0){ ?>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    //var carrera_id = document.getElementById('carrera_id').value;
                                    //obtener_planacademico(carrera_id);
                                    //seleccionar_carrera();
                                });
                            </script>
                        <?php // } ?>
<!-------------------- INICIO ------------------------------------->
                        <?php 
                            $atributos = "";
                            $atributos2 = "style='background-color: black; color: red;' readonly";
                        ?>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_nivel" class="control-label">Nivel</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_nivel" id="carrera_nivel" value="<?php echo ($this->input->post('carrera_nivel') ? $this->input->post('carrera_nivel') : $carrerainscrita["carrera_nivel"]); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_tiempoestudio" class="control-label">Duración Carrera</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_tiempoestudio" id="carrera_tiempoestudio" value="<?php echo ($this->input->post('carrera_tiempoestudio') ? $this->input->post('carrera_tiempoestudio') : $carrerainscrita["carrera_tiempoestudio"]); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                                <div class="form-group">
                                    <input type="text" name="carrera_codigo"  id="carrera_codigo" value="<?php echo ($this->input->post('carrera_codigo') ? $this->input->post('carrera_codigo') : $carrerainscrita["carrera_codigo"]); ?>" class="form-control" required <?php echo $atributos2; ?>/>
                                </div>
                        </div>

                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_modalidad" class="control-label">Modalidad</label>
                                <div class="form-group">
                                        <input type="text" name="carrera_modalidad" id="carrera_modalidad" value="<?php echo ($this->input->post('carrera_modalidad') ? $this->input->post('carrera_modalidad') : $carrerainscrita["carrera_modalidad"]); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                                <label for="carrera_plan" class="control-label">Plan</label>
                                <div class="form-group">
                                        <input type="text" name="carrera_plan" id="carrera_plan" value="<?php echo ($this->input->post('carrera_plan') ? $this->input->post('carrera_plan') : $carrerainscrita["carrera_plan"]); ?>" class="form-control" <?php echo $atributos2; ?>/>
                                </div>
                        </div>
                        <?php 
                            $atributos = "";
                            $atributos2 = "style='background-color: orange; color: black;'";
                        ?>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_matricula" class="control-label">Matrícula Bs</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="carrera_matricula" id="carrera_matricula" value="<?php echo ($this->input->post('carrera_matricula') ? $this->input->post('carrera_matricula') : $keconomico["kardexeco_matricula"]); ?>" class="form-control" placeholder="0.00" <?php echo $atributos2; ?> />
                            </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_mensualidad" class="control-label">Mensualidad Bs</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="carrera_mensualidad" id="carrera_mensualidad" value="<?php echo ($this->input->post('carrera_mensualidad') ? $this->input->post('carrera_mensualidad') : $keconomico["kardexeco_mensualidad"]); ?>" class="form-control" placeholder="0.00" <?php echo $atributos2; ?> />
                            </div>
                        </div>
                        <div class="col-md-2" <?php echo $atributos; ?>>
                            <label for="carrera_nummeses" class="control-label">Meses/Cuotas</label>
                            <div class="form-group">
                                <input type="number" min="0" name="carrera_nummeses" id="carrera_nummeses"  value="<?php echo ($this->input->post('carrera_nummeses') ? $this->input->post('carrera_nummeses') : $keconomico["kardexeco_nummens"]); ?>" class="form-control" placeholder="0" <?php echo $atributos2; ?>/>
                            </div>
                        </div>
<!--------------------- FIN ------------------------------------>
                        <div class="col-md-3">
                            <label for="nivel_id" class="control-label">Nivel</label>
                            <div class="form-group">
                                <select name="nivel_id" id="nivel_id" class="form-control" onchange="mostrar_materias()">
                                    <option value="0">- NIVEL -</option>
                                    <?php
                                    foreach($all_nivel as $nivel)
                                    {
                                        $selected = ($nivel['nivel_id'] == $inscripcion["nivel_id"]) ? ' selected="selected"' : "";
                                        echo '<option value="'.$nivel['nivel_id'].'" '.$selected.'>'.$nivel['nivel_descripcion'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="turno_id" class="control-label">Turno</label>
                            <div class="form-group">
                                <select name="turno_id" id="turno_id" class="form-control">
                                    <option value="">- TURNO -</option>
                                    <?php 
                                    foreach($all_turno as $turno)
                                    {
                                        $selected = ($turno['turno_id'] == $inscripcion["turno_id"]) ? ' selected="selected"' : "";
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
                                    <option value="">- PARALELO -</option>
                                    <?php 
                                    foreach($all_paralelo as $paralelo)
                                    {
                                        $selected = ($paralelo['paralelo_id'] == $inscripcion["paralelo_id"]) ? ' selected="selected"' : "";
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
                                <input type="date" name="inscripcion_fechainicio" value="<?php echo $inscripcion["inscripcion_fechainicio"]; ?>" class="form-control" id="inscripcion_fechainicio" />
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
                                        <?php
                                        $i = 0;
                                        foreach($all_materias as $materia)
                                        {
                                        ?>
                                            <tr>
                                                <td style='padding: 0;'><?php echo $i+1; ?></td>
                                                <td style='padding: 0;'><?php echo $materia["materia_nombre"];
                                                    if($materia["materia_nombre"] != $materia["materia_alias"] && $materia["materia_alias"] != null)
                                                    {
                                                    ?>
                                                        <span class='text-blue' style='font-size: 8px'>
                                                        <br><?php echo $materia["materia_alias"]; ?>
                                                        </span>
                                                    <?php
                                                    }
                                                    if($materia["materia_alias"] == null)
                                                    {
                                                    ?>
                                                        <span class='text-blue' style='font-size: 8px'>
                                                        <br>MATERIA COMPLEMENTARIA
                                                        </span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style='padding: 0;'><?php echo $materia["materia_codigo"]; ?></td>
                                                <td style='padding: 0;'>
                                                    <select id='selgrupo<?php echo $materia['materia_id']; ?>' name='selgrupo<?php echo $materia['materia_id'];?>'>
                                                    <option value='0'>- GRUPO -</option>
                                                    <?php
                                                    foreach($all_grupo as $grupo){
                                                        if($materia['materia_id'] == $grupo["materia_id"]){
                                                            echo "<option value='".$grupo['grupo_id']."'>".$grupo['grupo_nombre']."</option>";
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                </td>
                                                <td align='center' style='padding: 0;'>
                                                    <?php
                                                    $eschecked = "";
                                                    foreach($all_materia_asignada as $masignada){
                                                        if($masignada['materia_id'] == $materia["materia_id"]){
                                                            $eschecked = "checked";
                                                        }
                                                    }
                                                    ?>
                                                    <input type='checkbox' name='mat[]' id='mat<?php echo $materia["materia_id"];?>' value='<?php echo $materia["materia_id"];?>' <?php echo $eschecked; ?> /></td>
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="pagar_matricula" class="control-label">Pagar Matrícula</label>
                            <div class="form-group">
                                <select id="pagar_matricula" name="pagar_matricula"  class="form-control" onchange="calcular()">
                                    <?php
                                    $essel = "";
                                    if($keconomico["kardexeco_matriculapagada"]>0)
                                    { $essel = "selected"; }
                                    ?>
                                    <option value="0">- NO - PAGAR MATRICULA</option>
                                    <option value="1" <?php echo $essel; ?>>PAGAR MATRICULA</option>
                                    <option value="0">PAGAR MATRICULA DESPUES</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="pagar_mensualidad" class="control-label">Pagar Mensualidad</label>
                            <div class="form-group">
                                <select id="pagar_mensualidad" name="pagar_mensualidad" class="form-control" onchange="calcular()">
                                    <option value="0">- NINGUNA -</option>
                                    <?php
                                    for ($j = 1; $j <= count($carrerainscrita); $j++) {
                                        $selected = ($j == $num_pagados["pagados"]) ? "selected" : "";
                                        echo "<option value='".$j."' ".$selected.">".$j." CUOTA/MES</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inscripcion_glosa" class="control-label">Observaciones</label>
                            <div class="form-group">
                                <input type="text" name="inscripcion_glosa" value="<?php echo $inscripcion["inscripcion_glosa"]; ?>" class="form-control" id="inscripcion_glosa" />
                            </div>
                        </div>

<!--------------------------------- FIN ----------------------------------------->

				</div>
			</div>
<!--          	<div class="box-footer">
            	<button type="submit" class="btn btn-facebook">
            		<i class="fa fa-floppy-o"></i> Inscribir
            	</button>
            	<a href="<?php //echo base_url("dash"); ?>" class="btn btn-danger">
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
                <font size="3"><b>DETALLE INSCRIPCIÓN</b></font>
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
                            <input type="text" name="nit" value="<?php echo $estudiante[0]["estudiante_nit"]; ?>" id="nit"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; text-align: right; border: 0px; padding: 0px; padding-top: 3px; padding-right: 4px">
                            RAZON:
                        </td>
                        <td style="border: 0px; padding: 0px">
                            <input type="text" name="razon" value="<?php echo $estudiante[0]["estudiante_razon"]; ?>" id="razon"/>
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
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" style="font-size: 15px; font-weight: bolder; text-align:right;" size="5" name="total" value="<?php echo $keconomico["kardexeco_total"]; ?>" id="total" readonly/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td  style="padding: 0" align="right">                           
                            <b>DESC. Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">                                        
                                <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" size="5"  style="font-size: 15px; font-weight: bolder; text-align:right;" name="descuento" value="<?php echo $keconomico["kardexeco_descuento"]; ?>" id="descuento" onchange="calcular()" onclick="this.select();" />
                        </td>
                    </tr>
                    <tr>

                        <td style="padding: 0" align="right">
                            <b>TOTAL FINAL Bs</b>
                        </td>
                        <td></td>
                        <td style="padding: 0">
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" style="font-size: 15px; font-weight: bolder; text-align:right;" size="5" name="total_final" value="<?php echo $keconomico["kardexeco_totalfinal"]; ?>" id="total_final" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td   style="padding: 0" align="right">                   
                            <b>EFECTIVO Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">                                        
                            <input type="number" class="btn btn-sm btn-warning btn-foursquarexs" style="width: 94px; font-size: 15px; font-weight: bolder; text-align:right;" name="efectivo" value="<?php echo $keconomico["kardexeco_efectivo"]; ?>" id="efectivo" onchange="calcularcambio()" onclick="this.select();"/>
                        </td>                                    
                    </tr>

                    <tr>
                        <td  style="padding: 0" align="right">
                            <b>CAMBIO Bs </b>
                        </td>
                        <td></td>
                        <td style="padding: 0">
                            <input type="text" class="btn btn-sm btn-tumblr btn-foursquarexs" size="5"  style="font-size: 15px; font-weight: bolder; text-align:right;" name="inscripcion_glosa" value="<?php echo $keconomico["kardexeco_cambio"]; ?>" id="cambio" readonly/>
                        </td>
                    </tr>
                    <?php
                    if($tipousuario_id == 1){
                    ?>
                    <tr>
                        <td  style="padding: 0" align="lefth" colspan="3">
                            <br>
                            <b class="text-danger">MODIFICAR</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; padding: 0" class="text-danger" align="lefth" colspan="3">
                            <label>
                                <input type="checkbox" class="btn" style="margin: 0px" name="modif_kacademico" id="modif_kacademico"/>
                                Totalidad kardex acad&eacute;mico
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; padding: 0" class="text-danger" align="lefth" colspan="3">
                            <label>
                                <input type="checkbox" class="btn" style="margin: 0px" name="modif_keconomico" id="modif_keconomico"/>
                                Totalidad kardex econ&oacute;mico
                            </label>
                        </td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </center>
                     
                    
                    
                    
                        <div class="col-md-12">
                            <button type="button" class="btn btn-facebook btn-block" onclick="modificar_inscripcion()">
                                    <i class="fa fa-floppy-o"></i> Finalizar Inscripción
                            </button>
                            <span id="esultimatransaccion" style="display: none"></span>
                            <a href="<?php echo base_url("inscripcion"); ?>" class="btn btn-danger btn-block">
                                    <i class="fa fa-fax"></i> Salir
                            </a>
                        </div>      
                    
                </div>   
                
            
        </div>    
</div>    
                            
                            
    
</div>
