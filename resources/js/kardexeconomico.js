function validar(e) {
var opcion = document.getElementById('opcion').value;
 tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13){ 
     	if (opcion==0){   //si la pulsacion proviene del codigo
            var codigo = document.getElementById('estudiante').value;
            sql = "and e.estudiante_codigo='"+codigo+"' ";
            buscarestudiante(sql);
        }
        
        if (opcion==1){   //si la pulsacion proviene del ci         
            var ci = document.getElementById('estudiante').value;
            sql = "and e.estudiante_ci="+ci+" ";
            buscarestudiante(sql);           
        }

        if (opcion==2){   //si la pulsacion proviene del nombre  
            var nombre = document.getElementById('estudiante').value;
            
            sql = "and e.estudiante_nombre like '%"+nombre+"%'";
            buscarestudiante(sql);
        }

        if (opcion==3){   //si la pulsacion proviene del apellido  
            var apellidos = document.getElementById('estudiante').value;

            sql = "and e.estudiante_apellidos like '%"+apellidos+"%'";
            buscarestudiante(sql);
        }
    }

}

function buscarestudiante(dato){
	var base_url = document.getElementById('base_url').value;
	var controlador = base_url+'kardex_economico/busqueda';
		$.ajax({url:controlador,
            type:"POST",
            data:{dato:dato},
            success:function(respuesta){
            	var registros = JSON.parse(respuesta);
                var x = registros.length;
                if (registros != null){
                		html = "";
                          
                        var cont = 0;
                        for (var i = 0; i < x; i++){
                        cont = i+1;

                        html += "<tr>";
                        html += "<td>"+cont+"</td>";
                        html += "<td><b>"+registros[i]["estudiante_nombre"]+"</b></td>";
                        html += "<td><b>"+registros[i]["estudiante_apellidos"]+"</b></td>";
                        html += "<td align='center'>"+registros[i]["estudiante_ci"]+"  "+registros[i]["estudiante_extci"]+"</td>";
                        html += "<td align='center'>"+registros[i]["estudiante_codigo"]+"</td>";
                        html += "<td><b>"+registros[i]["carrera_nombre"]+"</b><br>"+registros[i]["nivel_descripcion"]+"</td>";
                        html += "<td class='text-center'><b>"+registros[i]["gestion_semestre"]+"/"+registros[i]["gestion_descripcion"]+"</b></td>";
                        html += "<td align='right'><b>"+Number(registros[i]["kardexeco_matricula"]).toFixed(2)+"</b></td>";
                        html += "<td align='right'><b>"+Number(registros[i]["kardexeco_mensualidad"]).toFixed(2)+"</b></td>";
                        html += "<td align='center'><b>"+registros[i]["kardexeco_nummens"]+"</b></td>";
                        html += "<td align='center'><b>"+registros[i]["estado_descripcion"]+"</b></td>";
                        html += "<td><a href='"+base_url+"mensualidad/mensualidad/"+registros[i]["kardexeco_id"]+"' target='_blank' class='btn btn-success btn-xs' title='COBRAR'><i class='fa fa-usd'></i></a> <a href='"+base_url+"mensualidad/planmensualidad/"+registros[i]["kardexeco_id"]+"' target='_blank' class='btn btn-info btn-xs' title='VER PLAN DE PAGOS'><i class='fa fa-print'></i></a></td>";
                        html += "</tr>";  
                        }     
                        
                        $("#tablaestudiantes").html(html);        
                }
            },
                error:function(respuesta){

        		}		
        });
}

function buscar(e,opcion) {
 tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13){ 
        if (opcion==1){   //si la pulsacion proviene del codigo
            var carrera = document.getElementById('carrera').value;
            sql = "c.carrera_nombre like '%"+carrera+"%' ";
            buscargrupos(sql);
        }
  
    }

}
      
function buscargrupos(dato){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'kardex_economico/carrera';
        $.ajax({url:controlador,
            type:"POST",
            data:{dato:dato},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                var x = registros.length;
                if (registros != null){
                        html = "";
                        html += "<table class='table table-striped table-condensed' id='mitabla'";
                        html += "<tr>";
                        html += "<th>#</th>";
                        html += "<th>Carerra</th>";                            
                        html += "<th># Grupo</th>";
                        html += "<th>Grupo</th>";
                        html += "<th>Descripcion</th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "</tr>";  
                        var cont = 0;
                        for (var i = 0; i < x ; i++){
                           cont = cont+1;

                        html += "<tr>";
                        html += "<td>"+cont+"</td>";
                        html += "<td><b>"+registros[i]["carrera_nombre"]+"</b></td>";
                        html += "<td><b>"+registros[i]["grupo_id"]+"</b></td>";
                        html += "<td><b>"+registros[i]["grupo_nombre"]+"</b></td>";
                        html += "<td><b>"+registros[i]["grupo_descripcion"]+"</b></td>";
                        html += "<td><a class='btn btn-info btn-sm' href='"+base_url+"mensualidad/buscarpension/"+registros[i]["grupo_id"]+"' target='_blank'><i class='fa fa-eye'></i> Registro de Pensiones</a></td>";
                        html += "<td></td>";
                        html += "</tr>";  
                        
                        }    
                        html += "</table>";
                        $("#tablagrupos").html(html);          
                }
            },
                error:function(respuesta){

                }       
        });
}    
