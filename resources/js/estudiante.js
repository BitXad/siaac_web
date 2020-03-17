/*$(document).on("ready",inicio);
function inicio(){
    
        
        buscarestudiante(); 
     
        
} 
*/
function validar(e,opcion) {
 tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){ 
     	if (opcion==1){   //si la pulsacion proviene del buscador de estudiantes
            
            buscarestudiante();
        }

    }

}


function buscarestudiante(){
	var base_url = document.getElementById('base_url').value;
	var controlador = base_url+'estudiante/buscar_estudiante';
    var parametro = document.getElementById('nombre').value;
    var estado = 1;//document.getElementById('estado').value;

        $.ajax({url:controlador,
                type:"POST",
                data:{parametro:parametro,estado:estado},
                success:function(respuesta){
                    
            	var registros = JSON.parse(respuesta);
                
                if (registros != null){
                    var n = registros.length;
                		
                       
                        var cont = 0;
                        html = "";
                        for (var i = 0; i < n ; i++){
                           cont = cont+1;
                        
                        html += "<tr>";
                        html += "<td>"+cont+"</td>";
                        html += "<td><div id='horizontal'>";
                        if (registros[i]["estudiante_foto"] != null  && registros[i]["estudiante_foto"]  !='') {
                        
                        html += "<div id='contieneimg'>";
                        html += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+registros[i]['estudiante_id']+"' style='padding: 0px;'>";
                        html += "<img src='"+base_url+"/resources/images/estudiantes/thumb_"+registros[i]["estudiante_foto"]+"' /></a>";               
                        html += "</div>";
                        }else{
                        html += "<div id='contieneimg'>";
                        html += "<img src='"+base_url+"/resources/images/usuarios/thumb_default.jpg' />";               
                        html += "</div>";    
                        }
                        html += "<div style='padding-left: 4px'>";
                        html += "<b>"+registros[i]["estudiante_nombre"]+"</b><br>";
                        html += "<b>"+registros[i]["estudiante_apellidos"]+"</b><br>";
                        html += "<b>Cod.:</b>"+registros[i]["estudiante_codigo"]+"</b>";
                        html += "</div>";  
                        html += "</div>";
                        html += "<div class='modal fade' id='mostrarimagen"+registros[i]['estudiante_id']+"' tabindex='-1' role='dialog' aria-labelledby=mostrarimagenlabel"+registros[i]['estudiante_id']+"'>";
                        html += "<div class='modal-dialog' role='document'><br><br><div class='modal-content'><div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["estudiante_nombre"]+"</b><b style='padding-left: 10px;'>"+registros[i]['estudiante_apellidos']+"</b></font>";
                        html += "</div><div class='modal-body'>";
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"/resources/images/estudiantes/"+registros[i]["estudiante_foto"]+"'>";
                        html += "</div></div></div></div>";
                        html += "</td>";
                        html += "<td>"+registros[i]['genero_nombre']+"</br>"+registros[i]['estadocivil_descripcion']+"</br>";
                        html += "<b>C. I.: </b>"+registros[i]['estudiante_ci']+" "+registros[i]['estudiante_extci']+"</td>";
                        //aca falta nacimiento
                        html += "<td>"+moment(registros[i]['estudiante_fechanac']).format('DD/MM/YYYY')+"<br>";
                        html += ""+registros[i]['estudiante_lugarnac']+"<br>";
                        html += ""+registros[i]['estudiante_nacionalidad']+"</td>";

                        html += "<td><b>Dir.: </b>"+registros[i]['estudiante_direccion']+"</br>";
                        html += "<b>Telf.: </b>"+registros[i]['estudiante_telefono']+"<br>"+registros[i]['estudiante_celular']+"</td>";
                        html += "<td>"+registros[i]['estudiante_establecimiento']+"</td>";
                        html += "<td>"+registros[i]['estudiante_distrito']+"</td>";
                        html += "<td><div id='horizontal'>";
                        if (registros[i]["apoderado_foto"] != null  && registros[i]["apoderado_foto"]  !='') {
                        
                        html += "<div id='contieneimg'>";
                        html += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+registros[i]['estudiante_id']+"' style='padding: 0px;'>";
                        html += "<img src='"+base_url+"/resources/images/apoderados/thumb_"+registros[i]["apoderado_foto"]+"' /></a>";               
                        html += "</div>";
                        }else{
                        html += "<div id='contieneimg'>";
                        html += "<img src='"+base_url+"/resources/images/usuarios/thumb_default.jpg' />";               
                        html += "</div>";    
                        }
                        html += "<div style='padding-left: 4px'>";
                        html += "<b>"+registros[i]["estudiante_apoderado"]+"("+registros[i]["estudiante_apoparentesco"]+")</b><br>";
                        html += "<b>Dir.:</b>"+registros[i]["estudiante_apodireccion"]+"<br>";
                        html += "<b>Cod.:</b>"+registros[i]["estudiante_apotelefono"]+"";
                        html += "</div>";  
                        html += "</div>";
                        html += "<div class='modal fade' id='mostrarimagen"+registros[i]['estudiante_id']+"' tabindex='-1' role='dialog' aria-labelledby=mostrarimagenlabel"+registros[i]['estudiante_id']+"'>";
                        html += "<div class='modal-dialog' role='document'><br><br><div class='modal-content'><div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["estudiante_apoderado"]+"</b></font>";
                        html += "</div><div class='modal-body'>";
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"/resources/images/apoderados/"+registros[i]["apoderado_foto"]+"'>";
                        html += "</div></div></div></div>";
                        html += "</td>";
                        html += "<td>"+registros[i]['estado_descripcion']+"</br>";
                        html += "<b>Nit.: </b>"+registros[i]['estudiante_nit']+"<br><b>Razon Social: </b>"+registros[i]['estudiante_razon']+"</td>";
                        html += "<td><a href='"+base_url+"/estudiante/edit/"+registros[i]["estudiante_id"]+"' class='btn btn-info btn-xs' title='Editar'><span class='fa fa-pencil'></span></a>";
                        html += " <a class='btn btn-warning btn-xs' data-toggle='modal' data-target='#restablecer"+registros[i]['estudiante_id']+"' title='Restablecer Acceso'><span class='fa fa-repeat'></span></a>";
                        html += "<div class='modal fade' id='restablecer"+registros[i]['estudiante_id']+"' tabindex='-1' role='dialog' aria-labelledby=mostrarimagenlabel"+registros[i]['estudiante_id']+"'>";
                        html += "<div class='modal-dialog' role='document'><br><br><div class='modal-content'><div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>Desea restablecer el acceso de: "+registros[i]["estudiante_nombre"]+"</b><b style='padding-left: 10px;'>"+registros[i]['estudiante_apellidos']+" ?</b></font>";
                        html += "</div><div class='modal-body'>";
                        html += "<a href='"+base_url+"/estudiante/restablecer/"+registros[i]["estudiante_id"]+"' class='btn btn-info btn-sm'><span class='fa fa-check'></span> Restablecer</a> <button data-dismiss='modal'  class='btn btn-danger btn-sm'><span class='fa fa-times'></span> Cancelar</button>";
                        html += "</div></div></div></div>";
                        html += "</td>";
                        html += "</tr>";
                        }    
                        
                        $("#tablaestudiantes").html(html);          
                }
            },
                error:function(respuesta){

        		}		
        });
}
