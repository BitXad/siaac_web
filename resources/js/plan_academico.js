$(document).on("ready",inicio);
function inicio(){
    var titplan_id =  ($("#planacad_id").val());
    if(titplan_id != undefined){
        dibujar_nivel(titplan_id);
    }
       //tablaresultadoscliente(1);
}

//Tabla resultados de la busqueda en el index de cliente
function buscar_plan(carrera_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_plan_acadcarrera';
    $.ajax({url: controlador,
           type:"POST",
           data:{carrera_id:carrera_id},
           success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html = "";
                var html1 = "";
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    if(n > 0){
                        html1 = "";
                        html1 += "<select name='planacad_id' class='form-control' id='planacad_id' required>";
                        //html += "<option value=''>- PLAN ACADEMICO -</option>";
                        for (var i = 0; i < n ; i++){
                            html1 += "<option value='"+registros[i]['planacad_id']+"'>"+registros[i]['planacad_nombre']+"</option>";
                        }
                        html1 += "</select>";
                        
                        $("#isnuevoplan").html("");
                        $("#elegirplanacad").html(html1);
                        
                        $('#bnewnivel').attr("disabled", false);
                        $("#nuevonivel").css('visibility', 'visible');
                        
                        var titplan_id =  ($("#planacad_id").val());
                        if(titplan_id != undefined){
                            dibujar_nivel(titplan_id);
                        }
                        
                   }else{
                        html += "";
                        html += "<div class='col-md-6'>";
                        html += "<div class='form-group' id='newplanacad'>";
                        html += "<a class='btn btn-success' data-toggle='modal' data-target='#modalnuevoplanacad' title='Nuevo Plan Academico'>Nuevo Plan Academico</a>";
                        html += "</div>";
                        html += "</div>";
                
                        html += "<!-- ---------------------- INICIO modal para Registrar Nuevo Plan Academico ----------------- -->";
                        html += "<div class='modal fade' id='modalnuevoplanacad' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<label>Nuevo Plan Academico&nbsp;&nbsp;</label>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<button type='button' class='btn btn-success btn-xs' onclick='cambiarcodplan();' title='genera codigo'>";
			html += "<i class='fa fa-edit'></i> Generar Código";
		        html += "</button>";
                        //html += "<span id='mensajetec_detalleserv"+registros[i]["detalleserv_id"]+"' class='text-danger'></span>";
                        html += "</div>";
                        //html += "form_open('detalle_serv/registrartec/"+servicio_id+"/"+registros[i]["detalleserv_id"]+"')";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        
                        
                        html += "<div class='col-md-6'>";
                        html += "<label for='planacad_nombre' class='control-label'><span class='text-danger'>*</span>Nombre</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='text' name='planacad_nombre' class='form-control' id='planacad_nombre' required />";
                        html += "</div>";
                        html += "</div>";
                        
                        html += "<div class='col-md-6'>";
                        html += "<label for='planacad_codigo' class='control-label'>Código&nbsp;&nbsp;";
                         
                        html += "</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='text' name='planacad_codigo' class='form-control' id='planacad_codigo' required />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-6'>";
                        html += "<label for='planacad_titmodalidad' class='control-label'>Titulo/Modalidad</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='text' name='planacad_titmodalidad' class='form-control' id='planacad_titmodalidad' required />";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<button onclick='registroplanacademico("+carrera_id+")' class='btn btn-success' data-dismiss='modal'>";
                        html += "<i class='fa fa-check'></i> Guardar";
                        html += "</button>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'>";
                        html += "<i class='fa fa-times'></i> Cancelar</a>";
                        html += "</div>";
                        //html += "<?php echo form_close(); ?>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!-- ---------------------- FIN modal para Registrar Nuevo Plan Academico ----------------- -->";
                        
                        $("#isnuevoplan").html(html);
                        $("#elegirplanacad").html("");
                        $('#bnewnivel').attr("disabled", true);
                        $("#nuevonivel").css('visibility', 'hidden');
                        
                    }
                    
            }

            
            
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }
        
    });   

}

/* **************Registrar plan academico***************** */
function registroplanacademico(carrera_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/new_plan_acadcarrera';
    var planacad_nombre       = document.getElementById('planacad_nombre').value;
    var planacad_codigo       = document.getElementById('planacad_codigo').value;
    var planacad_titmodalidad = document.getElementById('planacad_titmodalidad').value;
    
    $.ajax({url: controlador,
           type:"POST",
           data:{carrera_id:carrera_id, planacad_nombre:planacad_nombre, planacad_codigo:planacad_codigo, planacad_titmodalidad:planacad_titmodalidad},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                        html = "";
                        html += "<select name='planacad_id' class='form-control' id='planacad_id' required>";
                        //html += "<option value=''>- PLAN ACADEMICO -</option>";
                        for (var i = 0; i < n ; i++){
                            html += "<option value='"+registros[i]['planacad_id']+"'>"+registros[i]['planacad_nombre']+"</option>";
                        }
                        html += "</select>";

                        $('#bnewnivel').attr("disabled", false);
                        $("#nuevonivel").css('visibility', 'visible');
                        $("#isnuevoplan").html("");
                        $("#elegirplanacad").html(html);
                    
            }else{
                $('#bnewnivel').attr("disabled", true);
                $("#nuevonivel").css('visibility', 'hidden');
                alert("Nombre no debe ser vacio");
            }

            
            
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }
        
    });   

}

/* **************Obtiene el NOMBRE del plan academico seleccionado***************** */
function getnombreplan(){
        var titplan =  ($("#planacad_id option:selected").text());
        var titplan_id =  ($("#planacad_id").val());
        $("#estetitplan").html("<b>"+titplan+"</b>");
        $("#hplanacad_id").val(titplan_id);
}

/* **************Registrar NIVEL en un plan academico***************** */
function registronivel(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/new_nivel';
    var nivel_descripcion       = document.getElementById('nivel_nombre').value;
    var planacad_id       = document.getElementById('hplanacad_id').value;
    
    $.ajax({url: controlador,
           type:"POST",
           data:{nivel_descripcion:nivel_descripcion, planacad_id:planacad_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   $('#modalnuevonivel').modal('hide');
                  dibujar_nivel(planacad_id);   
                    
                }else{
                    //dibujar_nivel(planacad_id);
                    alert("No se pudo registrar el Nivel");
                }
                
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
        }
        
    });   
   
}

/* **************Registrar plan academico***************** */
function dibujar_nivel(planacad_id){
    var base_url = document.getElementById('base_url').value;
    //var esprereq = document.getElementById('mosprereq').value;
    var all_materias = JSON.parse(document.getElementById('lasmaterias').value);
    var all_area = JSON.parse(document.getElementById('lasareas').value);
    var controlador = base_url+'plan_academico/get_nivel_planacad';
    //alert(planacad_id);
    $.ajax({url: controlador,
           type:"POST",
           data:{planacad_id:planacad_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var cantmat = all_materias.length;
                    var canta = all_area.length;
                        html = "";
                        html += "<div class='cont_nivel'>";
                        //html += "<option value=''>- PLAN ACADEMICO -</option>";
                        for (var i = 0; i < n ; i++){
                            html += "<div>";
                                html += "<div class='cont_titulo'>"; //inicio titulo  NIVEL
                                    html += "<div>";
                                        html += "<a class='btn cont_titulo' data-toggle='modal' data-target='#modalnuevamateria"+registros[i]['nivel_id']+"' title='Crear Nueva Materia'>"+registros[i]["nivel_descripcion"]+"</a>";
                                        //html += registros[i]['nivel_descripcion'];
                                    html += "</div>";
                                html += "</div>"; // fin titulo NIVEL
                                html += "<div class='cont_materias'>"; //INICIO Materia de un nivel
                                    html += "<div id='materia"+registros[i]["nivel_id"]+"'>"; //inicioContiene MAterias
                                        processData(registros[i]["nivel_id"]);
                                    html += "</div>"; //FIN Contiene materias
                                html += "</div>"; //FIN Materia de un Nivel
                            html += "</div>";
                            
                            html += "<!-- ---------------------- INICIO modal para Registrar Nuevo Plan Academico ----------------- -->";
                            html += "<div class='modal fade' id='modalnuevamateria"+registros[i]["nivel_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
                            html += "<div class='modal-dialog' role='document'>";
                            html += "<br><br>";
                            html += "<div class='modal-content'>";
                            html += "<div class='modal-header'>";
                            html += "<label>Nueva Materia para el Nivel: &nbsp;"+registros[i]["nivel_descripcion"]+"</label>";
                            html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                            //html += "<span id='mensajetec_detalleserv"+registros[i]["detalleserv_id"]+"' class='text-danger'></span>";
                            html += "<label class='alinearizq'><input type='checkbox' class='checkbox' name='prerequisito"+registros[i]["nivel_id"]+"' id='prerequisito"+registros[i]["nivel_id"]+"' />Sin Prerequisito</label>";
                            html += "</div>";
                            //html += "form_open('detalle_serv/registrartec/"+servicio_id+"/"+registros[i]["detalleserv_id"]+"')";
                            html += "<div class='modal-body textizq'>";
                            html += "<!------------------------------------------------------------------->";
                            //if(esprereq == 1){
                            html += "<div class='col-md-6'>";
                            html += "<label for='materia_nombre"+registros[i]['nivel_id']+"' class='control-label'><span class='text-danger'>*</span>Nombre</label>";
                            html += "<div class='form-group'>";
                            html += "<input type='text' name='materia_nombre"+registros[i]['nivel_id']+"' class='form-control' id='materia_nombre"+registros[i]['nivel_id']+"' required />";
                            html += "</div>";
                            html += "</div>";
                            
                            html += "<div class='col-md-6'>";
                            html += "<label for='materia_alias"+registros[i]['nivel_id']+"' class='control-label'>Alias</label>";
                            html += "<div class='form-group'>";
                            html += "<input type='text' name='materia_alias"+registros[i]['nivel_id']+"' class='form-control' id='materia_alias"+registros[i]['nivel_id']+"' />";
                            html += "</div>";
                            html += "</div>";
                            
                            //}
                            //html += "<div id='lasmaterias"+registros[i]["nivel_id"]+"'>";
                            html += "<div class='col-md-6'>";
                            html += "<label for='mat_materia_id"+registros[i]["nivel_id"]+"' class='control-label'>Pre-Requisisto</label>";
                            html += "<div class='form-group'>";
                            html += "<select name='mat_materia_id"+registros[i]["nivel_id"]+"' class='form-control' id='mat_materia_id"+registros[i]["nivel_id"]+"' >";
                            html += "<option value=''>- MATERIA -</option>";
                            for (var m = 0; m < cantmat ; m++){
                                html += "<option value='"+all_materias[m]["materia_id"]+"'>"+all_materias[m]["materia_nombre"]+"</option>"; 
                            }
                            //html += get_materia(registros[i]["nivel_id"]);
                            html += "</select>";
                            html += "</div>";
                            html += "</div>";
                            
                            html += "<div class='col-md-6'>";
                            html += "<label for='area_id"+registros[i]["nivel_id"]+"' class='control-label'><span class='text-danger'>*</span>Area</label>";
                            html += "<div class='form-group'>";
                            html += "<select name='area_id"+registros[i]["nivel_id"]+"' class='form-control' id='area_id"+registros[i]["nivel_id"]+"' required>";
                            html += "<option value=''>- AREA -</option>";
                            for (var a = 0; a < canta ; a++){
                                html += "<option value='"+all_area[a]["area_id"]+"'>"+all_area[a]["area_nombre"]+"</option>"; 
                            }
                            html += "</select>";
                            html += "</div>";
                            html += "</div>";
                            
                            html += "<div class='col-md-6'>";
                            html += "<label for='materia_codigo"+registros[i]["nivel_id"]+"' class='control-label'>Codigo</label>";
                            html += "<div class='form-group'>";
                            html += "<input type='text' name='materia_codigo"+registros[i]["nivel_id"]+"' class='form-control' id='materia_codigo"+registros[i]["nivel_id"]+"' />";
                            html += "</div>";
                            html += "</div>";
                            html += "<!------------------------------------------------------------------->";
                            html += "</div>";
                            html += "<div class='modal-footer aligncenter'>";
                            html += "<button onclick='registro_newmateria("+registros[i]["nivel_id"]+", "+planacad_id+")' class='btn btn-success' data-dismiss='modal'>";
                            html += "<i class='fa fa-check'></i> Guardar";
                            html += "</button>";
                            html += "<a href='#' class='btn btn-danger' data-dismiss='modal'>";
                            html += "<i class='fa fa-times'></i> Cancelar</a>";
                            html += "</div>";
                            //html += "<?php echo form_close(); ?>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            html += "<!-- ---------------------- FIN modal para Registrar Nuevo Plan Academico ----------------- -->";

                        }
                        html += "<div>";
                        $("#dibujarniveles").html(html);
                        
                        /*$('#bnewnivel').attr("disabled", false);
                        $("#nuevonivel").css('visibility', 'visible');
                        $("#isnuevoplan").html("");
                        $("#elegirplanacad").html(html);*/
                    
            }
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }
        
    });   

}

async function processData(nivel_id){
    try{
        const result = await materiasnivel(nivel_id);
        //alert(result);
        $('#materia'+nivel_id).html(result);
        //console.log(result);
        return "";
    }catch (err) {
        return console.log(err.message);
  }
}

function materiasnivel(nivel_id){
    const promise = new Promise(function (resolve, reject) {
    //var html = "";
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_materiasnivel';
    $.ajax({url: controlador,
           type:"POST",
           data:{nivel_id:nivel_id},
           success:function(respuesta){
               var res = "";
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    for (var i = 0; i < n ; i++){
                        res += "<div>";
                        res += registros[i]['materia_nombre']+"<br>";
                        res += registros[i]['materia_codigo'];
                        res += "</div>";
                        /*res += "-"+registros[i]['producto_nombre']+" ("+registros[i]['producto_codigobarra']+")";
                        res += " <b>Cant.: </b>"+registros[i]['detalleven_cantidad'];
                        res += " <b>Prec.: </b>"+numberFormat(Number(registros[i]['detalleven_total']).toFixed(2))+"<br>";
                      */ 
                   }
               }
               resolve(res);
        },
        error:function(error){
            reject(error);
        }
        
    });
    });
  
  return promise;
}

/* **************Registrar nueva MATERIA en un NIVEL***************** */
function registro_newmateria(nivel_id, planacad_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/new_materia';
    var prerequisito = document.getElementById('prerequisito'+nivel_id).checked;
    var materia_nombre = document.getElementById('materia_nombre'+nivel_id).value;
    var materia_alias  = document.getElementById('materia_alias'+nivel_id).value;
    var mat_materia_id = document.getElementById('mat_materia_id'+nivel_id).value;
    var area_id        = document.getElementById('area_id'+nivel_id).value;
    var materia_codigo = document.getElementById('materia_codigo'+nivel_id).value;
    
    $.ajax({url: controlador,
           type:"POST",
           data:{prerequisito:prerequisito, materia_nombre:materia_nombre, materia_alias:materia_alias, mat_materia_id:mat_materia_id, area_id:area_id, materia_codigo:materia_codigo, nivel_id:nivel_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   $('#modalnuevamateria'+nivel_id).modal('hide');
                  dibujar_nivel(planacad_id);   
                    
                }else{
                    //dibujar_nivel(planacad_id);
                    alert("No se pudo registrar el Nivel");
                }
                
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
        }
        
    });   
   
}

/* **************Mostrar MATERIAS de un NIVEL***************** */
function get_materia(nivel_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_materias_activas';
    var html ="";
    $.ajax({url: controlador,
           type:"POST",
           data:{nivel_id:nivel_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   var cantmat = registros.length;
                    for (var m = 0; m < cantmat ; m++){
                        //html += "<option value='"+all_materias[m]["materia_id"]+"'>"+all_materias[m]["materia_nombre"]+"</option>"; 
                        html += "<option value='"+registros[m]["materia_id"]+"'>"+registros[m]["materia_nombre"]+"</option>"; 
                    }
                    /*
                   $('#modalnuevamateria'+nivel_id).modal('hide');
                  dibujar_nivel(planacad_id);   */
                    
                }else{
                    //dibujar_nivel(planacad_id);
                    alert("No se pudo registrar el Nivel");
                }
                
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
        }
        
    });   
   return html;
}