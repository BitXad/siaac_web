$(document).on("ready",inicio);
function inicio(){
  buscar_por_fecha();
}
function buscar_por_fecha(){

    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    //var usuario = document.getElementById('buscarusuario_id').value;
    
    busquedainscripcion(fecha_desde, fecha_hasta, "");

}
function busquedainscripcion(fecha_desde, fecha_hasta, usuario){

    var base_url   = document.getElementById('base_url').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var controlador = base_url+"reportes/buscarlosinscritos";
     /*var limite = 1000; */
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, gestion_id:gestion_id},
           success:function(resul){
              
                //$("#resinscritos").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    //var esusuario =  $('#buscarusuario_id option:selected').text();
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

                    var totalmatricula   = 0;
                    var totalmensualidad = 0;
                    var montototal       = 0;
                    
                   var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resinscritos").val("- "+n+" -");
                   
                    html = "";
                    for (var i = 0; i < n ; i++){
                      /*totalmatricula   += parseFloat(registros[i]['ingreso']);
                      totalmensualidad += parseFloat(registros[i]['egreso']);
                      montototal       += parseFloat(registros[i]['egreso']);
                     */
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["estudiante_apellidos"]+"</td>";
                        html += "<td>"+registros[i]["estudiante_nombre"]+"</td>";
                        html += "<td>"+registros[i]["carrera_nombre"]+"</td>";
                        html += "<td>"+registros[i]["carrera_codigo"]+"</td>";
                        html += "<td>"+registros[i]["carrera_codigo"]+"</td>";
                        html += "<td>"+registros[i]["inscripcion_fecha"]+"</td>";
                        html += "<td>"+registros[i]["inscripcion_fecha"]+"</td>";
                        html += "<td>"+registros[i]["inscripcion_fecha"]+"</td>";
                        html += "<td>"+registros[i]["inscripcion_fecha"]+"</td>";
                        
                        //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                         html += "</tr>";
                    }
                   
                    html += "<tr>";
                    html += "<td></td>";
                    html += "<td colspan='2' class='esbold'>TOTAL (INGRESOS/EGRESOS)Bs.</td>";
                    //html += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalingreso).toFixed(2))+"</td>";
                    html += "</tr>";
                   
                  
                   /*$('#elusuario').html("Usuario: "+esusuario);
                   $('#fecha1impresion').html(fecha1);
                   $('#fecha2impresion').html(fecha2);
                    */
                    
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

