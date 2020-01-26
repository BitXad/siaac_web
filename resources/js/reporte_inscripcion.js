$(document).on("ready",inicio);
function inicio(){
  buscar_por_fecha();
}
function buscar_por_fecha(){

    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var usuario_id = document.getElementById('buscarusuario_id').value;
    
    busquedainscripcion(fecha_desde, fecha_hasta, usuario_id, "");

}
function busquedainscripcion(fecha_desde, fecha_hasta, usuario, filtro){

    var base_url   = document.getElementById('base_url').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var controlador = base_url+"reportes/buscarlosinscritos";
     /*var limite = 1000; */
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, gestion_id:gestion_id, filtro:filtro},
           success:function(resul){
              
                //$("#resinscritos").val("- 0 -");
               var registros =  JSON.parse(resul);
           
                if (registros != null){
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario = $('#buscarusuario_id option:selected').text();
                    
                    if(filtro == ""){
                        if(!(fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null  || fecha_hasta =="")){
                            fecha1 = "Desde: "+moment(fecha_desde).format("DD/MM/YYYY");
                            fecha2 = " - Hasta: "+moment(fecha_hasta).format("DD/MM/YYYY");
                        }else if(!(fecha_desde == null || fecha_desde =="") && (fecha_desde == null || fecha_hasta =="")){
                            fecha1 = "De: "+moment(fecha_desde).format("DD/MM/YYYY");
                            fecha2 = "";
                        }else if((fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null || fecha_hasta =="")){
                            fecha1 = "";
                            fecha2 = "De: "+moment(fecha_hasta).format("DD/MM/YYYY");
                        }else{
                            fecha1 = "";
                            fecha2 = "";
                        }
                    }else{
                        var sel_inscripcion = document.getElementById('select_inscripcion').value;
                        if(sel_inscripcion == 1){
                            fecha1 = "De Hoy";
                        }else if(sel_inscripcion == 2){
                            fecha1 = "De Hayer";
                        }else if(sel_inscripcion == 3){
                            fecha1 = "De la semana";
                        }else if(sel_inscripcion == 4){
                            fecha1 = "Todas los inscritos";
                        }
                    }

                    var totalmatricula   = 0;
                    var totalmensualidad = 0;
                    var montototal       = 0;
                    
                   var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resinscritos").val("- "+n+" -");
                   
                    html = "";
                    for (var i = 0; i < n ; i++){
                      totalmatricula   += parseFloat(registros[i]['kardexeco_matriculapagada']);
                      totalmensualidad += parseFloat(registros[i]['kardexeco_mensualidadpagada']);
                      montototal       += Number(Number(registros[i]["kardexeco_matriculapagada"])+Number(registros[i]["kardexeco_mensualidadpagada"]));
                     
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["estudiante_apellidos"]+"</td>";
                        html += "<td>"+registros[i]["estudiante_nombre"]+"</td>";
                        html += "<td>"+registros[i]["carrera_nombre"]+"</td>";
                        html += "<td>"+registros[i]["carrera_codigo"]+"</td>";
                        html += "<td>00"+registros[i]["kardexeco_id"]+"</td>";
                        html += "<td>"+registros[i]["inscripcion_fecha"]+"</td>";
                        html += "<td class='text-right'>"+numberFormat(Number(registros[i]["kardexeco_matriculapagada"]).toFixed(2))+"</td>";
                        html += "<td class='text-right'>"+numberFormat(Number(registros[i]["kardexeco_mensualidadpagada"]).toFixed(2))+"</td>";
                        html += "<td class='text-right'>"+numberFormat(Number(Number(registros[i]["kardexeco_matriculapagada"])+Number(registros[i]["kardexeco_mensualidadpagada"])).toFixed(2))+"</td>";
                        
                        //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                         html += "</tr>";
                    }
                   
                    html += "<tr>";
                    html += "<td colspan='7' class='text-bold text-right'>TOTAL Bs.</td>";
                    html += "<td class='text-bold text-right'>"+numberFormat(Number(totalmatricula).toFixed(2))+"</td>";
                    html += "<td class='text-bold text-right'>"+numberFormat(Number(totalmensualidad).toFixed(2))+"</td>";
                    html += "<td class='text-bold text-right'>"+numberFormat(Number(montototal).toFixed(2))+"</td>";
                    html += "</tr>";
                   
                  
                    $('#elusuario').html("Usuario: "+esusuario);
                    $('#fecha1impresion').html(fecha1);
                    $('#fecha2impresion').html(fecha2);
                    
                    
                    $("#resinscripcion").html(html);
                   
                    document.getElementById('loader').style.display = 'none';
            }
        document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#resinscripcion").html(html);
           
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}

function buscar_inscritos()
{
    var opcion      = document.getElementById('select_inscripcion').value;
    var usuario_id = document.getElementById('buscarusuario_id').value;
    var filtro = "";

    if (opcion == 1)
    {
        filtro = " and date( c.inscripcion_fecha) = date(now())";
    }//servicios de hoy
    
    if (opcion == 2)
    {
        filtro = " and date(c.inscripcion_fecha) = date_add(date(now()), INTERVAL -1 DAY)";
    }//servicios de ayer
    
    if (opcion == 3) 
    {
        filtro = " and date(c.inscripcion_fecha) >= date_add(date(now()), INTERVAL -1 WEEK)";
    }//servicios de la semana

    if (opcion == 4) 
    {   filtro = " ";
    }//todos los servicios
    
    busquedainscripcion("", "", usuario_id, filtro)
}

function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\,/g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\,/g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(".")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf("."));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ",": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(".")>=0)
            resultado+=numero.substring(numero.indexOf("."));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
}

