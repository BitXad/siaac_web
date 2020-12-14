$(document).on("ready",inicio);
function inicio(){
    var filtro = document.getElementById('filtrar').value;
   tabla_docente(filtro);
}

function validar(e,opcion) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){ 
     	if (opcion==1){   //si la pulsacion proviene del buscador de estudiantes
            var filtro = document.getElementById('filtrar').value;
            /*filtro = " and c.estudiante_nombre like '"+resfiltro+"' or c.estudiante_apellidos like '"+resfiltro+"'"; 
            filtro += " or c.estudiante_codigo like '"+resfiltro+"' or c.estudiante_ci like '"+resfiltro+"'";
            filtro += " or c.estudiante_nit like '"+resfiltro+"' ";*/
            tabla_docente(filtro);
        }
    }

}
function tabla_docente(filtro){
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'docente/buscar_docentes';
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
        $.ajax({url:controlador,
            type:"POST",
            data:{filtro:filtro},
            success:function(respuesta){

            var registros = JSON.parse(respuesta);
            if (registros != null){
                var n = registros.length; //tamaño del arreglo de la consulta
                html = "";
                for (var i = 0; i < n ; i++){
                html += "<tr>";
                html += "<td>"+(i+1)+"</td>";
                html += "<td>";
                html += "<div id='horizontal'>";
                if (registros[i]["docente_foto"] != null && registros[i]["docente_foto"] != ""){
                    html += "<div id='contieneimg'>";
                    var mimagen = "thumb_"+registros[i]["docente_foto"];
                    html += "<a class='btn btn-xs' data-toggle='modal' data-target='#mostrarimagen"+registros[i]["docente_id"]+"' style='padding: 0px;'>";
                    html += "<img src='"+base_url+"resources/images/docentes/"+mimagen+"' />";
                    html += "</a>";
                    html += "</div>";
                }else{
                    html += "<div id='contieneimg'>";
                    html += "<img src='"+base_url+"resources/images/docentes/thumb_default.jpg' />";
                    html += "</div>";
                }
                html += "<div style='padding-left: 4px'>";
                html += "<b>"+registros[i]["docente_apellidos"]+"</b><br>";
                html += "<b>"+registros[i]["docente_nombre"]+"</b><br>";
                html += "<b>Cod.:</b> "+registros[i]["docente_codigo"];
                html += "</div>";
                html += "</div>";
                html += "</td>";
                html += "<td>"+registros[i]["estadocivil_descripcion"]+"<br>";
                html += registros[i]["genero_nombre"]+"<br>";
                html += "<b>C.I.:</b> "+registros[i]["docente_ci"];
                html += " "+registros[i]["docente_extci"];
                html += "</td>			";
                html += "<td align='center'>";
                if(registros[i]["docente_fechanac"] != '0000-00-00'){
                    html += moment(registros[i]["docente_fechanac"]).format("DD/MM/YYYY");
                    html += "</br>";
                    var hoy = new Date();
                    var cumpleanos = new Date(registros[i]["docente_fechanac"]);
                    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                    var m = hoy.getMonth() - cumpleanos.getMonth();
                    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                        edad--;
                    }
                    html += "("+edad+")";
                }
                html += "</td>";
                html += "<td><b>Dir.:</b> "+registros[i]["docente_direccion"]+"</br>";
                html += "<b>Telf.:</b> "+registros[i]["docente_telefono"]+"</br>";
                html += registros[i]["docente_celular"]+"</td>";
                html += "<td>"+registros[i]["docente_titulo"]+"</td>";
                html += "<td>"+registros[i]["docente_especialidad"]+"</td>";
                html += "<td>"+registros[i]["docente_email"]+"</td>";
                html += "<td>"+registros[i]["estado_descripcion"];
                html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                html += "<div class='modal fade' id='mostrarimagen"+registros[i]["docente_id"]+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel"+registros[i]["docente_id"]+"'>";
                html += "<div class='modal-dialog' role='document'>";
                html += "<br><br>";
                html += "<div class='modal-content'>";
                html += "<div class='modal-header'>";
                html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                html += "<font size='3'><b>"+registros[i]["docente_nombre"]+"</b><b style='padding-left: 10px;'>"+registros[i]["docente_apellidos"]+"</b> </font>";
                html += "</div>";
                html += "<div class='modal-body'>";
                html += "<!------------------------------------------------------------------->";
                html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/docentes/"+registros[i]["docente_foto"]+"' />";
                html += "<!------------------------------------------------------------------->";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                html += "</td>";
                html += "<td>";
                html += "<a href='"+base_url+"docente/edit/"+registros[i]["docente_id"]+"' class='btn btn-info btn-xs' title='Editar'><span class='fa fa-pencil'></span></a>";
                html += "<a href='#' data-toggle='modal' data-target='#restablecer"+registros[i]["docente_id"]+"' class='btn btn-warning btn-xs' title='Restablecer'><span class='fa fa-repeat'></span></a>";
                html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                html += "<div class='modal fade' id='restablecer"+registros[i]["docente_id"]+"' tabindex='-1' role='dialog' aria-labelledby='restablecer"+registros[i]["docente_id"]+"'>";
                html += "<div class='modal-dialog' role='document'>";
                html += "<br><br>";
                html += "<div class='modal-content'>";
                html += "<div class='modal-header'>";
                html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                html += "</div>";
                html += "<div class='modal-body text-center'>";
                html += "<font size='3'>Desea restablecer acceso de:";
                html += "<br><b>"+registros[i]["docente_nombre"]+"</b><b style='padding-left: 10px;'>"+registros[i]["docente_apellidos"]+"</b> ?</font>";
                html += "<br>";
                html += "<br>";
                html += "<a href='"+base_url+"docente/restablecer/"+registros[i]["docente_id"]+"' class='btn btn-info btn-sm'><span class='fa fa-check'></span> Restablecer</a>";
                html += " <button data-dismiss='modal' class='btn btn-danger btn-sm'><span class='fa fa-times'></span> Cancelar</button>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                html += "</td>";
                html += "</tr>";
            }
                $("#tablaresultados").html(html);
                document.getElementById('loader').style.display = 'none';
            }
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }		
        });
}

function generarexcel_docente(){
     var base_url = document.getElementById('base_url').value;
     var filtro = document.getElementById('filtrar').value;
    var controlador = base_url+'docente/buscar_docentes';
    
    var showLabel = true;
    
    var reportitle = moment(Date.now()).format("DD/MM/YYYY H_m_s");
    //document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
           success:function(result){
                var registros = JSON.parse(result);
                var tam = registros.length;
              
                var mensaje = "";
                
                html = "";
                //if (opcion==1){
                  /* **************INICIO Generar Excel JavaScript************** */
                    var CSV = 'sep=,' + '\r\n\n';
                    //This condition will generate the Label/Header
                    if (showLabel) {
                        var row = "";

                        //This loop will extract the label from 1st index of on array
                        

                            //Now convert each value to string and comma-seprated
                            //row += 'ESPEC.' + ',';
                        row += 'N°' + ',';
                        row += 'APELLIDOS' + ',';
                        row += 'NOMBRE' + ',';
                        row += 'CODIGO' + ',';
                        row += 'CARNET' + ',';
                        row += 'EXT.' + ',';
                        row += 'DIRECCION' + ',';
                        row += 'TELEFONO' + ',';
                        row += 'TITULO' + ',';
                        row += 'ESPECIALIDAD' + ',';
                        row += 'CORREO ELEC.' + ',';
                            
                        row = row.slice(0, -1);

                        //append Label row with line break
                        CSV += row + '\r\n';
                    }
                    
                    //1st loop is to extract each row
                    for (var i = 0; i < tam; i++) {
                        var row = "";
                        //2nd loop will extract each column and convert it in string comma-seprated
                        
                            row += (i+1)+',';
                            row += '"' +registros[i]["docente_apellidos"]+ '",';
                            row += '"' +registros[i]["docente_nombre"]+ '",';
                            row += '"' +registros[i]["docente_codigo"]+ '",';
                            /*if(registros[i]["estado_id"]==1){
                                row += 'V,';
                            }
                            else{
                                row += 'A,';
                            }*/
                            row += '"' +registros[i]["docente_ci"]+ '",';
                            row += '"' +registros[i]["docente_extci"]+ '",';
                            row += '"' +registros[i]["docente_direccion"]+ '",';
                            row += '"' +registros[i]["docente_telefono"]+ '",';
                            row += '"' +registros[i]["docente_titulo"]+ '",';
                            row += '"' +registros[i]["docente_especialidad"]+ '",';
                            row += '"' +registros[i]["docente_email"]+ '",';
                            //row += '"' +Number(registros[i]["docente_direccion"]).toFixed(2)+ '",';
                            
                        row.slice(0, row.length - 1);

                        //add a line break after each row
                        CSV += row + '\r\n';
                    }
                    
                    if (CSV == '') {        
                        alert("Invalid data");
                        return;
                    }
                    
                    //Generate a file name
                    var fileName = "Docentes_";
                    //this will remove the blank-spaces from the title and replace it with an underscore
                    fileName += reportitle.replace(/ /g,"_");   

                    //Initialize file format you want csv or xls
                    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

                    // Now the little tricky part.
                    // you can use either>> window.open(uri);
                    // but this will not work in some browsers
                    // or you will not get the correct file extension    

                    //this trick will generate a temp <a /> tag
                    var link = document.createElement("a");    
                    link.href = uri;

                    //set the visibility hidden so it will not effect on your web-layout
                    link.style = "visibility:hidden";
                    link.download = fileName + ".csv";

                    //this part will append the anchor tag and remove it after automatic click
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    /* **************F I N  Generar Excel JavaScript************** */
                   
                   
                   
                   
                   //document.getElementById('loader').style.display = 'none';
            //}
         //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tabla_factura").html(html);
        },
        complete: function (jqXHR, textStatus) {
            //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            //tabla_inventario();
        }
        
    });   

}
