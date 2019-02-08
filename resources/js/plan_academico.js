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
                        html1 += "<select name='planacad_id' class='form-control' onclick='elegir_planiveles(this.value)' id='planacad_id' required>";
                        //html += "<option value=''>- PLAN ACADEMICO -</option>";
                        for (var i = 0; i < n ; i++){
                            html1 += "<option value='"+registros[i]['planacad_id']+"'>"+registros[i]['planacad_nombre']+"</option>";
                        }
                        html1 += "</select>";
                        
                        $("#isnuevoplan").html("");
                        $("#elegirplanacad").html(html1);
                        
                        /*$('#bnewnivel').attr("disabled", false);
                        $("#nuevonivel").css('visibility', 'visible');*/
                        /*
                        var titplan_id =  ($("#planacad_id").val());
                        if(titplan_id != undefined){
                            dibujar_nivel(titplan_id);
                        }*/
                       $('#bnewnivel').attr("disabled", true);
                        $("#nuevonivel").css('visibility', 'hidden');
                       $("#dibujarniveles").html("");
                        
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



//Tabla resultados de la busqueda en el index de cliente
function elegir_planiveles(planacad_id){
    /*var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_plan_acadcarrera';
    $.ajax({url: controlador,
           type:"POST",
           data:{planacad_id:planacad_id},*/
          /* success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html = "";
                var html1 = "";
                if (registros != null){*/
                   /* var n = registros.length; //tamaño del arreglo de la consulta
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
                        */
                        //var titplan_id =  ($("#planacad_id").val());
                        $('#bnewnivel').attr("disabled", false);
                        $("#nuevonivel").css('visibility', 'visible');
                        
                        if(planacad_id != undefined){
                            dibujar_nivel(planacad_id);
                        }
                        
                  /* } else{
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
                        
                    } */
        /*            
            }

            
            
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }*/
        
    /*});  */ 

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
    //var all_materias = JSON.parse(document.getElementById('lasmaterias').value);
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
                    //var cantmat = all_materias.length;
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
                            html += "<div class='form-group' id='dibmaterias"+registros[i]["nivel_id"]+"'>";
                            get_materia(registros[i]["nivel_id"], planacad_id);
                         /*   html += "<select name='mat_materia_id"+registros[i]["nivel_id"]+"' class='form-control' id='mat_materia_id"+registros[i]["nivel_id"]+"' >";
                            html += "<option value=''>- MATERIA -</option>";
                            for (var m = 0; m < cantmat ; m++){
                                html += "<option value='"+all_materias[m]["materia_id"]+"'>"+all_materias[m]["materia_nombre"]+"</option>"; 
                            }
                            //html += get_materia(registros[i]["nivel_id"]);
                            html += "</select>";*/
                            
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
                        res += "<div class='is_materias materia' id='"+registros[i]["materia_id"]+"'>";
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
    var prereq         = document.getElementById('prerequisito'+nivel_id).checked;
    var materia_nombre = document.getElementById('materia_nombre'+nivel_id).value;
    var materia_alias  = document.getElementById('materia_alias'+nivel_id).value;
    var mat_materia_id = document.getElementById('mat_materia_id'+nivel_id).value;
    var area_id        = document.getElementById('area_id'+nivel_id).value;
    var materia_codigo = document.getElementById('materia_codigo'+nivel_id).value;
    var prerequisito = 0;
    if(prereq){
        prerequisito = 1;
    }
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

/* **************Mostrar MATERIAS de un plan academico***************** */
function get_materia(nivel_id, planacad_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_materias_activas_plan';
    var html ="";
    $.ajax({url: controlador,
           type:"POST",
           data:{planacad_id:planacad_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                   var cantmat = registros.length;
                   html += "<select name='mat_materia_id"+nivel_id+"' class='form-control' id='mat_materia_id"+nivel_id+"' >";
                   html += "<option value=''>- MATERIA -</option>";
                   for (var m = 0; m < cantmat ; m++){
                       html += "<option value='"+registros[m]["materia_id"]+"'>"+registros[m]["materia_nombre"]+"</option>"; 
                   }
                   
                   html += "</select>";
                   $('#dibmaterias'+nivel_id).html(html);
                    
                }
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
        }
        
    });
}
/* ********************************************** */
/*Array Asociativo en el que se indica para cada materia cuales materias se deben tomar despues*/
var PREREQUISITOS = { 
           '30':['31'],
           'CB0260':['CB0236'],
           'ST0242':['ST0245','ST0244'],
            
           'CB0231':['CB0232'],
           'CB0236':['CB0239'],
           'CB0246':['ST0270'],
           'ST0245':['ST0247','ST0246'],
           'ST0244':['ST0246'],
  //Semestre 3
            'ST0246':['ST0250'],
            'ST0248':['ST0249'],
  //Semestre 4
            'CB0232':['EC0255'],
            'OG0205':['ST0253'],
  'ST0251':['ST0252'],
  
  
  //Semestre 5
  'EC0255':['CB0244','PY0231'],  
  
  //Semestre 6
  'PY0231':['PT0113','CB0245'],

//Semestre 7
'CB0245':['PT0131'],
'ST0258':['PT0131'],
'ST0257':['PT0131']
           };

//Array Asociativo en el que se indican los correquisitos de una materia
var CORREQUISITOS = {'CB0260':['CB0246'],
            'ST0243':['ST0244'],
            'CB0236':['CB0231'],
                     
             'ST0250':['ST0251'],
              'ST0258':['ST0263']
       };
//duración del retrazo entre animaciones
var TIME_OUT_ANIM = 300;

//Booleano que indica si la flechas ya se añadieron
var FLECHAS_INICIALIZADAS = false;


$(document).ready(function(){
  $('.materia').on('click',function(){
    //alert('materia');
    var idMat = $(this).attr('id');
    $(this).addClass('selected');
    
    //alert('hace el llamado'+idMat);
    seleccionarAdelante( idMat );
    
    seleccionarCorreq( idMat );
    
    seleccionaPrevios(idMat);
  });
  
  $('.materia').on('mouseout',function(){
    //alert('materia');
    //var corr = $(this).attr('corr');
    
    //alert(corr);
    //alert('borre');
    limpiarSeleccion();
  });
  
  //Botón que alterna las flechas
  $('#toggleArrowBtn').on('click',function(){
    //Si ya se añadieron las flechas
    if( FLECHAS_INICIALIZADAS ){
      //las oculta
      $('svg').toggle();
    }else{
      //Las añade dinámicamente
       conectarMaterias(); 
      FLECHAS_INICIALIZADAS = true;
    }
    
  });
});

/*Función que selecciona las materias hacía adelante*/
function seleccionarAdelante( idMateria ){
   //alert('adelante'+idMateria);
    
    var corrAct = PREREQUISITOS[idMateria];
    
    //alert('corrAct'+corrAct);
    //Marca los correquisitos
  console.log(idMateria+'-> corrAct'+corrAct);
    if( corrAct ){
      for( var i = 0; i < corrAct.length; i++){    
        var idCorrAct = corrAct[i];
        //alert('iterando'+idCorrAct);
        
        console.log('idCorrAct'+idCorrAct);
        //alert('adelante: '+idCorrAct);
        $('#'+idCorrAct).addClass('prerequisito');
        
        
        //Se invoca recursivamente si existen prerrequisitos del prerequisito
        if( PREREQUISITOS[idCorrAct] ){
          console.log('llamado Recursivo con: '+idCorrAct);
          /*setTimeout( function(){*/seleccionarAdelante( idCorrAct );//}, TIME_OUT_ANIM );
          //seleccionarAdelante( idCorrAct );
        }
        
        //REtorna para quebrar el ciclo y el llamado recursivo
        //return;
      }
    }
  return;
}

/*Función que marca los correquisitos*/
function seleccionarCorreq( idMateria ){
  //Marca los prerequisitos
    var preAct = CORREQUISITOS[idMateria];
    
    //alert('preAct:'+preAct);
    if( preAct ){
      //Marca los correquisitos
      for( var i = 0; i < preAct.length; i++){    
        var idPreAct = preAct[i];
        //alert('iterando'+idCorrAct);
        $('#'+idPreAct).toggleClass('correquisito');
      }
    }
}

/*Función que marca las materias hacia atrás*/
function seleccionaPrevios( idMateria ){
  // alert(idSel);
  //Itera sobre la lista de prerequisitos
  for( var keyAct in PREREQUISITOS ){
    var rel = PREREQUISITOS[keyAct];
    
    //alert('rel: '+rel);
    
    var valAct;
    for( var j = 0; j < rel.length; j++ ){
      valAct = rel[j];
      if( valAct == idMateria ){
        $('#'+keyAct).addClass('previo');
        
        //seleccionaPrevios( keyAct )
        /*setTimeout( function(){*/seleccionaPrevios( keyAct );/*}, TIME_OUT_ANIM );*/
        
        //
        //break;
      }
      //alert(valAct);
    }
  }
}

/*Métdo que limpia las selecciones*/
function limpiarSeleccion(){
  $('.contenedor .correquisito').removeClass('correquisito');
  $('.contenedor .prerequisito').removeClass('prerequisito');
  $('.contenedor .previo').removeClass('previo');
  $('.contenedor .selected').removeClass('selected');
}

//Métodos de jsPlumb
//jsPlumb.bind("ready", conectarMaterias);

function conectarMaterias() {
    
    var color_prueba = "#002846";
    var common = {
          /*paintStyle:{ fillStyle:example3Color, opacity:0.5 },*/
      connector:"StateMachine",
    anchors:["Center", "Center" ],
    endpoints:["Dot", "Blank" ],
      endpointStyle:{ radius:2 },
     overlays:[ ["PlainArrow", {location:1, width:10, length:9} ]],
    /*connectorStyle:{ strokeStyle:'green', lineWidth:4 },*/
          paintStyle:{lineWidth:3,strokeStyle:color_prueba}
    };
    // your jsPlumb related init code goes here

    //Estilo de las flechas de correquisitos
    var commcorr  = {
      /*connector:"StateMachine",*/
      anchors:["Center", "Center" ],
      endpoints:["Blank", "Blank" ],
      endpointStyle:{ radius:2 },
       /*overlays:[ ["PlainArrow", {location:1, width:10, length:9} ]],*/
      paintStyle:{ 
        lineWidth:2,
        strokeStyle:"rgb(131,8,135)",
        dashstyle:"2 2"
        /*joinstyle:"miter"*/
      }
    }

    //alert('inicializo');
    for( var keyAct in PREREQUISITOS ){
      var rel = PREREQUISITOS[keyAct];
      var valAct;
      for( var j = 0; j < rel.length; j++ ){
        valAct = rel[j];
        //alert('conecte '+ keyAct+ ' '+valAct);
        jsPlumb.connect({source:keyAct, target:valAct},common);    
      }
    }
    /*
    jsPlumb.connect({source:"30", target:"31",},common);
    jsPlumb.connect({source:"CB0260", target:"CB0236"},common);
    jsPlumb.connect({source:"ST0242", target:"ST0245"},common);
    jsPlumb.connect({source:"ST0242", target:"ST0244"},common);

    jsPlumb.connect({source:"CB0231", target:"CB0232"},common);
    jsPlumb.connect({source:"CB0236", target:"CB0239"},common);  
    jsPlumb.connect({source:"CB0246", target:"ST0270"},common);
    jsPlumb.connect({source:"ST0245", target:"ST0247"},common);
    jsPlumb.connect({source:"ST0245", target:"ST0246"},common);
    jsPlumb.connect({source:"ST0244", target:"ST0246"},common);
    //Semestre 3
    jsPlumb.connect({source:"ST0246", target:"ST0250"},common);
    jsPlumb.connect({source:"ST0248", target:"ST0249"},common);

    jsPlumb.connect({source:"CB0232", target:"EC0255"},common);
    jsPlumb.connect({source:"OG0205", target:"ST0253"},common);
    jsPlumb.connect({source:"ST0251", target:"ST0252"},common);*/

    //Correquisitos
    //var corrAct = PREREQUISITOS[idMateria];

  //Marca los correquisitos
  for( var corrAct in CORREQUISITOS){    
     var idCorrAct = CORREQUISITOS[corrAct];     

    //alert('conecte: '+corrAct+' '+idCorrAct);
    jsPlumb.connect({source:corrAct+'' , target:idCorrAct+''},commcorr);
  }
    /*jsPlumb.connect({source:"CB0260", target:"CB0246"},commcorr);
    jsPlumb.connect({source:"ST0243", target:"ST0244"},commcorr);
    jsPlumb.connect({source:"CB0236", target:"CB0231"},commcorr);
    jsPlumb.connect({source:"ST0250", target:"ST0251"},commcorr);*/
}