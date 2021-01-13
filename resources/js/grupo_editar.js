$(document).on("ready",inicio);
function inicio(){
    //var registros = JSON.parse(document.getElementById('lacarrera').value);
    var informacion = JSON.parse(document.getElementById('get_informacion').value);
    //alert(informacion);
    get_carreras(informacion[0]["carrera_id"]);
    get_planes_academicos(informacion[0]["carrera_id"]);
}
/* Carreras; seleccionar carrera */
function get_carreras(carrera_id){
    var base_url = document.getElementById('base_url').value;
    var registros = JSON.parse(document.getElementById('lacarrera').value);
        document.getElementById('loader').style.display = 'block';
                //var registros =  JSON.parse(respuesta);
                var html = "";
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                  //  if(n > 0){
                        html = "";
                        html += "<select name='carrera_id' id='carrera_id' class='form-control' onchange='get_planes_academicos(this.value)' required>";
                        html += "<option value=''>- CARRERA -</option>";
                        var eslacarrera = "";
                        for (var i = 0; i < n ; i++){
                            if(registros[i]['carrera_id'] == carrera_id ){
                                eslacarrera = "selected='selected'";
                            }
                            html += "<option value='"+registros[i]['carrera_id']+"'"+eslacarrera+">"+registros[i]['carrera_nombre']+"</option>";
                        }
                        html += "</select>";
                        $("#carrera_id").html(html);
                    document.getElementById('loader').style.display = 'none';
            }
}
/* Elegir planes academicos */
function get_planes_academicos(carrera_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_planes_academicos';
    if(carrera_id >0){
        document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{carrera_id:carrera_id},
           success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html = "";
                var html1 = "";
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                  //  if(n > 0){
                        html1 = "";
                        html1 += "<select name='planacad_id' class='form-control' onchange='elegir_niveles(this.value)' id='planacad_id' required>";
                        html1 += "<option value=''>- PLAN ACADEMICO -</option>";
                        for (var i = 0; i < n ; i++){
                            html1 += "<option value='"+registros[i]['planacad_id']+"'>"+registros[i]['planacad_nombre']+"</option>";
                        }
                        html1 += "</select>";
                        $("#elegirplanacad").html(html1);
                        /*$("#imprimirplanacademico").html("");
                        $("#dibujarniveles").html("");
                        new_planacademico(carrera_id);*/
                    document.getElementById('loader').style.display = 'none';
            }

            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#elegirplanacad").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none';
        }
        
    });   
    }else{
        var htmln = "";
        htmln += "<select name='planacad_id' class='form-control' id='planacad_id' required>";
        htmln += "<option value=''>- PLAN ACADEMICO -</option>";
        htmln += "</select>";
        
        //$("#isnuevoplan").html("");
        $("#elegirplanacad").html(htmln);
        //$("#imprimirplanacademico").html("");
        /*$('#bnewnivel').attr("disabled", true);
        $("#nuevonivel").css('visibility', 'hidden');*/
        /*$("#nuevonivel").html("");
        $("#dibujarniveles").html("");*/
    }
}

/* Elegir NIVELES de plan academico */
function elegir_niveles(planacad_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_niveles';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{planacad_id:planacad_id},
           success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html1 = "";
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                        html1 = "";
                        html1 += "<select name='nivel_id' class='form-control' onchange='elegir_materias(this.value)' id='nivel_id' required>";
                        html1 += "<option value=''>- NIVEL -</option>";
                        for (var i = 0; i < n ; i++){
                            html1 += "<option value='"+registros[i]['nivel_id']+"'>"+registros[i]['nivel_descripcion']+"</option>";
                        }
                        html1 += "</select>";
                        $("#elegirnivel").html(html1);
                    document.getElementById('loader').style.display = 'none';
            }

            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           html = "";
           $("#elegirnivel").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none';
        }
        
    });
}

/* Elegir NIVELES de plan academico */
function elegir_materias(nivel_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_materias';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{nivel_id:nivel_id},
           success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html1 = "";
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                        html1 = "";
                        html1 += "<select name='materia_id' class='form-control' onchange='mostrar_grupos(this.value)' id='materia_id' required>";
                        //html1 += "<select name='materia_id' class='form-control' id='materia_id' required>";
                        html1 += "<option value=''>- MATERIA -</option>";
                        for (var i = 0; i < n ; i++){
                            html1 += "<option value='"+registros[i]['materia_id']+"'>"+registros[i]['materia_nombre']+"</option>";
                        }
                        html1 += "</select>";
                        $("#elegirmateria").html(html1);
                    document.getElementById('loader').style.display = 'none';
            }

            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           html = "";
           $("#elegirmateria").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none';
        }
        
    });
}

/* Elegir grupos de una materia */
function mostrar_grupos(materia_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_grupomateria';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{materia_id:materia_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    var html = "";
                    var n = registros.length; //tamaño del arreglo de la consulta
                        //html1 += "<select name='materia_id' class='form-control' onchange='mostrar_grupos(this.value)' id='materia_id' required>";
                        //html1 += "<option value=''>- MATERIA -</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td>"+registros[i]['grupo_nombre']+"</td>";
                        html += "<td>"+registros[i]['gestion_descripcion']+"</td>";
                        html += "<td>"+registros[i]['usuario_nombre']+"</td>";
                        html += "<td>";
                        html += "<a href='"+base_url+"grupo/editar/"+registros[i]["grupo_id"]+"' class='btn btn-info btn-xs' title='modificar grupo'><span class='fa fa-pencil'></span> </a>";
                        //html += "<a href='"+base_url+"grupo/remove/"+registros[i]["grupo_id"]+"' class='btn btn-danger btn-xs' title='eliminar'><span class='fa fa-trash'></span> </a>";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modaleliminargrupo"+registros[i]['grupo_id']+"' title='eliminar Grupo' ><span class='fa fa-trash'></span></a>";
                        html += "<!------------------------ INICIO modal para confirmar Eliminación ------------------->";
                        html += "<div class='modal fade' id='modaleliminargrupo"+registros[i]['grupo_id']+"' tabindex='-1' role='dialog' aria-labelledby='modaleliminarLabel"+registros[i]['grupo_id']+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b><span class='fa fa-trash'></span></b>";
                        html += "¿Desea Eliminar el grupo: <b>"+registros[i]["grupo_nombre"]+"</b>?";
                        html += "</h3>";
                        html += "Al eliminar este grupo, se perdera toda la información.";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a onclick='eliminargrupo("+registros[i]['grupo_id']+")' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar Eliminación ------------------->";
                        
                        
                        html += "</td>";
                        html += "</tr>";
                    }
                    //html1 += "</select>";
                    $("#mostrargrupo").html(html);
                    //$("#docente_grupo").html(registros[0]['nombre_docente']);
                    document.getElementById('loader').style.display = 'none';
                    
            }
            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           html = "";
           $("#mostrargrupo").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none';
        }
        
    });
}

/* Registrar un grupo */
function registrar_grupo(){
    var band = true;
    var base_url = document.getElementById('base_url').value;
    var carrera_id = document.getElementById('carrera_id').value;
    var planacad_id = document.getElementById('planacad_id').value;
    var nivel_id = document.getElementById('nivel_id').value;
    //var docente_id = document.getElementById('docente_id').value;
    var materia_id = document.getElementById('materia_id').value;
    var grupo_nombre = document.getElementById('grupo_nombre').value;
    
    if(carrera_id == "" && planacad_id == "" && nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir una Carrera; elegir un Plan Academico; elegir un Nivel; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(planacad_id == "" && nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir un Plan Academico; elegir un Nivel; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir un Nivel; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(grupo_nombre == ""){
        alert("El Nombre de Grupo no debe ser vacio");
        band = false;
    }
    if(band == true){
    var controlador = base_url+'grupo/registrar_newgrupomateria';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{carrera_id:carrera_id, planacad_id:planacad_id, nivel_id:nivel_id,
                 materia_id:materia_id, grupo_nombre:grupo_nombre},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    if(registros == "ok"){
                        mostrar_grupos(materia_id);
                        alert("Grupo registrado satisfactoriamente");
                    }else if(registros == "no"){
                        alert("este grupo ya se encuentra registrado, por favor revise sus datos.");
                    }
                }
            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           html = "";
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none';
        }
        
    });
    }
}
/* elimina un grupo */
function eliminargrupo(grupo_id){
    var base_url    = document.getElementById('base_url').value;
    var materia_id  = document.getElementById('materia_id').value;
    var controlador = base_url+"grupo/eliminar_grupo/";
    $('#modaleliminargrupo'+grupo_id).modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{grupo_id:grupo_id},
            success:function(resul){
                
                var registros =  JSON.parse(resul);
                if (registros != null){
                    if(registros == "ok"){
                        
                        //alert('#modaleliminar'+nombremodal);
                        alert("Eliminacion exitosa");
                        mostrar_grupos(materia_id);
                        
                    }else{
                        alert("Hubo problemas con la Eliminacion");
                    }
                }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           alert("Ocurrio un error inesperado");
        }
        
    });   

}
