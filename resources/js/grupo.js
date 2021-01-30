/*$(document).on("ready",inicio);
function inicio(){
    get_all_carrera();
    var titplan_id =  ($("#planacad_id").val());
    if(titplan_id != undefined){
        dibujar_nivel(titplan_id);
    }
       //tablaresultadoscliente(1);
}*/

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

/* Elegir planes academicos */
function get_foto_docente(docente_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_docente';
    if(docente_id >0){
        $.ajax({url: controlador,
           type:"POST",
           data:{docente_id:docente_id},
           success:function(respuesta){
               
                var registros =  JSON.parse(respuesta);
                var html = "";
                if (registros != null){
                    //html += "<div id='horizontal'>";
                    //html += "<div id='contieneimg'>";
                    var mimagen = "";
                    if(registros['docente_foto'] != null){
                        mimagen += "<img src='"+base_url+"resources/images/docentes/thumb_"+registros["docente_foto"]+"' class='img img-circle' />";
                        //mimagen = "thumb_"+registros[i]['docente_foto'];
                    }else{
                        mimagen += "<img src='"+base_url+"resources/images/docentes/thumb_default.jpg"+"' class='img img-circle' />";
                    }
                    
                    html += mimagen;
                    
                    //html += "</div>";
                    //html += "</div>";
                    
                        $("#fotodocente").html(html);
            }

            
            //document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           //$("#tablaresultados").html(html);
        }
        
    });   
    }else{
        var mimagen = "";
        mimagen += "<img src='"+base_url+"resources/images/docentes/thumb_default.jpg"+"' class='img img-circle' />";
        
        $("#fotodocente").html(mimagen);
        
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
                        //html1 += "<select name='materia_id' class='form-control' onchange='mostrar_grupos(this.value)' id='materia_id' required>";
                        html1 += "<select name='materia_id' class='form-control' id='materia_id' required>";
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

/* Elegir grupos de un docente */
function getgrupo_docente(docente_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'grupo/get_grupodocente';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{docente_id:docente_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    var html = "";
                    var n = registros.length; //tamaño del arreglo de la consulta
                        //html1 += "<select name='materia_id' class='form-control' onchange='mostrar_grupos(this.value)' id='materia_id' required>";
                        //html1 += "<option value=''>- MATERIA -</option>";
                    for (var i = 0; i < n ; i++){
//                        html += "<tr>";
//                        html += "<td>"+registros[i]['materia_nombre']+"</td>";
//                        html += "<td>"+registros[i]['grupo_nombre']+"</td>";
//                        html += "<td>"+registros[i]['dia_nombre']+": "+registros[i]['periodo_horainicio']+" - "+registros[i]['periodo_horafin']+"</td>";
//                        html += "<td>"+registros[i]['aula_nombre']+"</td>";
//                        html += "<td>"+registros[i]['nombre_docente']+"</td>";
//                        html += "<td>"+registros[i]['descripcion_gestion']+"</td>";
//                        html += "<td>"+registros[i]['usuario_nombre']+"</td>";
//                        html += "<td>";
//                        html += "<a href='"+base_url+"grupo/edit/"+registros[i]["grupo_id"]+"' class='btn btn-info btn-xs' title='modificar grupo'><span class='fa fa-pencil'></span> </a>";
//                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modaleliminarhorario"+i+"' title='eliminar Grupo y Horario' ><span class='fa fa-trash'></span></a>";
//                        html += "<!------------------------ INICIO modal para confirmar Eliminación ------------------->";
//                        html += "<div class='modal fade' id='modaleliminarhorario"+i+"' tabindex='-1' role='dialog' aria-labelledby='modaleliminarLabel"+i+"'>";
//                        html += "<div class='modal-dialog' role='document'>";
//                        html += "<br><br>";
//                        html += "<div class='modal-content'>";
//                        html += "<div class='modal-header'>";
//                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
//                        html += "</div>";
//                        html += "<div class='modal-body'>";
//                        html += "<!------------------------------------------------------------------->";
//                        html += "<h3><b><span class='fa fa-trash'></span></b>";
//                        html += "¿Desea Eliminar el grupo: <b>"+registros[i]["grupo_nombre"]+"</b> y sus horarios?";
//                        html += "</h3>";
//                        html += "Al eliminar este grupo, se perdera toda la información.";
//                        html += "<!------------------------------------------------------------------->";
//                        html += "</div>";
//                        html += "<div class='modal-footer aligncenter'>";
//                        html += "<a onclick='eliminargrupohorario("+docente_id+", "+registros[i]['grupo_id']+", "+i+")' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
//                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
//                        html += "</div>";
//                        html += "</div>";
//                        html += "</div>";
//                        html += "</div>";
//                        html += "<!------------------------ FIN modal para confirmar Eliminación ------------------->";
//                        
//                        
//                        html += "</td>";
//                        html += "</tr>";
                        
                        
                        
                    }
                    //html1 += "</select>";
                    //$("#mostrarhorariodocente").html(html);
                    //$("#docente_grupo").html(registros[0]['nombre_docente']);
                    document.getElementById('loader').style.display = 'none';
                    
            }
            
            document.getElementById('loader').style.display = 'none';
        },
        error:function(respuesta){
           html = "";
           $("#mostrarhorariodocente").html(html);
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
    var dia1 = "";
    var dia2 = "";
    var dia3 = "";
    var dia4 = "";
    var dia5 = "";
    var dia6 = "";
    var dia7 = "";
    var periodo1 = "";
    var periodo2 = "";
    var periodo3 = "";
    var periodo4 = "";
    var periodo5 = "";
    var periodo6 = "";
    var periodo7 = "";
    var aula1 = "";
    var aula2 = "";
    var aula3 = "";
    var aula4 = "";
    var aula5 = "";
    var aula6 = "";
    var aula7 = "";
    var docente1 = "";
    var docente2 = "";
    var docente3 = "";
    var docente4 = "";
    var docente5 = "";
    var docente6 = "";
    var docente7 = "";
    
    var checkdias = document.getElementsByClassName('checkdia');
    var getdia = [];
    var ind = 0;
    
    for(var i=0, n=checkdias.length;i<n;i++){
        if(checkdias[i].checked == true ){
            getdia[ind] = checkdias[i].name;
            //getdia[ind] = getdia.push(checkdias[i].name);
            ind = ind+1;
        }
        //alert(checkdias[i].checked+" "+checkdias[i].name);
    }
    
    for(var i=0, n=getdia.length;i<n;i++){
        //alert(getdia[i]);
        if(getdia[i] == 1){
                dia1     = 1;
                periodo1 = document.getElementById('periodo_id'+getdia[i]).value;
                aula1    = document.getElementById('aula_id'+getdia[i]).value;
                docente1    = document.getElementById('docente_id'+getdia[i]).value;
                if(periodo1 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                
                if(aula1 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }

                if(docente1 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                
                
            }else if(getdia[i] == 2){
                dia2     = 2;
                periodo2 = document.getElementById('periodo_id'+getdia[i]).value;
                aula2    = document.getElementById('aula_id'+getdia[i]).value;
                docente2 = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo2 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula2 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }

                if(docente2 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                                
            }else if(getdia[i] == 3){
                dia3     = 3;
                periodo3 = document.getElementById('periodo_id'+getdia[i]).value;
                aula3    = document.getElementById('aula_id'+getdia[i]).value;
                docente3    = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo3 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula3 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }
                
                if(docente3 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                
                
            }else if(getdia[i] == 4){
                dia4     = 4;
                periodo4 = document.getElementById('periodo_id'+getdia[i]).value;
                aula4    = document.getElementById('aula_id'+getdia[i]).value;
                docente4    = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo4 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula4 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }
                
                if(docente4 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                
                
            }else if(getdia[i] == 5){
                dia5     = 5;
                periodo5 = document.getElementById('periodo_id'+getdia[i]).value;
                aula5    = document.getElementById('aula_id'+getdia[i]).value;
                docente5    = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo5 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula5 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }
                                
                if(docente5 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                
            }else if(getdia[i] == 6){
                dia6     = 6;
                periodo6 = document.getElementById('periodo_id'+getdia[i]).value;
                aula6    = document.getElementById('aula_id'+getdia[i]).value;
                docente6 = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo6 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula6 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }
                
                if(docente6 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                
            }else if(getdia[i] == 7){
                dia7     = 7;
                periodo7 = document.getElementById('periodo_id'+getdia[i]).value;
                aula7    = document.getElementById('aula_id'+getdia[i]).value;
                docente7 = document.getElementById('docente_id'+getdia[i]).value;
                
                if(periodo7 == ""){
                    alert("debe seleccionar un periodo");
                    band = false;
                }
                if(aula7 == ""){
                    alert("debe seleccionar un aula");
                    band = false;
                }

                if(docente7 == ""){
                    alert("debe seleccionar un docente");
                    band = false;
                }
                                
            }
    }
    
    if(carrera_id == "" && planacad_id == "" && nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir una Carrera; elegir un Plan Academico; elegir un Nivel; elegir Docente; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(planacad_id == "" && nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir un Plan Academico; elegir un Nivel; elegir Docente; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(nivel_id == "" && materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir un Nivel; elegir Docente; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir Docente; elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(materia_id == "" && grupo_nombre == ""){
        alert("Debe: elegir Materia; nombre de Grupo no debe ser vacio");
        band = false;
    }else if(grupo_nombre == ""){
        alert("El Nombre de Grupo no debe ser vacio");
        band = false;
    }else if(ind == 0){
        alert("Por lo menos debe elegir un día");
        band = false;
    }
    
    if(band == true){
    var controlador = base_url+'grupo/registrar_newgrupodocente';
    document.getElementById('loader').style.display = 'block';
    $.ajax({url: controlador,
           type:"POST",
           data:{carrera_id:carrera_id, planacad_id:planacad_id, nivel_id:nivel_id, docente1:docente1,
                 docente2:docente2,docente3:docente3,docente4:docente4,docente5:docente5,docente6:docente6,docente7:docente7,
                 materia_id:materia_id, grupo_nombre:grupo_nombre, periodo1:periodo1, periodo2:periodo2,
                 periodo3:periodo3, periodo4:periodo4, periodo5:periodo5, periodo6:periodo6, periodo7:periodo7,
                 aula1:aula1, aula2:aula2, aula3:aula3, aula4:aula4, aula5:aula5, aula6:aula6, aula7:aula7,
                 dia1:dia1, dia2:dia2, dia3:dia3, dia4:dia4, dia5:dia5, dia6:dia6, dia7:dia7},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    if(registros == "ok"){
                        getgrupo_docente(docente_id);
                        resetearcamposgrupo(2);
                    }else if(registros == "siaula"){
                        alert("El Horario Seleccionado ya se encuentra ocupado, por favor revise sus datos.");
                    }else if(registros == "sidoc"){
                        alert("El Docente Seleccionado ya tiene hora y dia ocupado, por favor revise sus datos.");
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

/* ****** Resetar campos de registro de GRUPO ********* */
function resetearcamposgrupo(reseteardocente){
    $('#carrera_id').find('option:first').attr('selected', 'selected').parent('select');
    $('#planacad_id').find('option:first').attr('selected', 'selected').parent('select');
    $('#nivel_id').find('option:first').attr('selected', 'selected').parent('select');
    if(reseteardocente == 1){
        $('#docente_id').find('option:first').attr('selected', 'selected').parent('select');
    }
    $('#materia_id').find('option:first').attr('selected', 'selected').parent('select');
    $('#grupo_nombre').val('');
    $('#select_all').prop("checked", false);
    checkboxes = document.getElementsByClassName('checkbox');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = false;
    }
    $('#periodo_id1').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id1').prop("disabled", true);
    $('#periodo_id2').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id2').prop("disabled", true);
    $('#periodo_id3').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id3').prop("disabled", true);
    $('#periodo_id4').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id4').prop("disabled", true);
    $('#periodo_id5').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id5').prop("disabled", true);
    $('#periodo_id6').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id6').prop("disabled", true);
    $('#periodo_id7').find('option:first').attr('selected', 'selected').parent('select');
    $('#periodo_id7').prop("disabled", true);
    $('#aula_id1').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id1').prop("disabled", true);
    $('#aula_id2').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id2').prop("disabled", true);
    $('#aula_id3').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id3').prop("disabled", true);
    $('#aula_id4').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id4').prop("disabled", true);
    $('#aula_id5').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id5').prop("disabled", true);
    $('#aula_id6').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id6').prop("disabled", true);
    $('#aula_id7').find('option:first').attr('selected', 'selected').parent('select');
    $('#aula_id7').prop("disabled", true);
    
}

function eliminargrupohorario(docente_id, grupo_id, nummodal){
    var nombremodal = nummodal;
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"grupo/remove/";
    $('#modaleliminarhorario'+nombremodal).modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{grupo_id:grupo_id},
            success:function(resul){
                
                var registros =  JSON.parse(resul);
                if (registros != null){
                    if(registros == "ok"){
                        
                        //alert('#modaleliminar'+nombremodal);
                        alert("Eliminacion exitosa");
                        getgrupo_docente(docente_id);
                        
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