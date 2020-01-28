$(document).on("ready",inicio);
function inicio(){
  buscar_por_fecha(); 
  /*var f = new Date();
        var estafecha = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();


       fechabusquedaingegr(esta_fecha, esta_fecha);
        /*tablaproductos();
        */
}

function convertDateFormat(string){
    var info = "";
    if(string != null){
       info = string.split('-').reverse().join('/');
   }
    return info;
}
/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
function formatofecha_hora(string){
    var mifh = new Date(string);
    var info = "";
    

    if(string != null){
       info = mifh.getDate()+"/"+(mifh.getMonth()+1)+"/"+mifh.getFullYear()+" "+aumentar_cero(mifh.getHours())+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds());
   }
    return info;
}
    
function buscar_por_fecha(){

    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var usuario = document.getElementById('buscarusuario_id').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario);

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



function fechabusquedaingegr(fecha_desde, fecha_hasta, usuario){

    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarlosreportes";
     /*var limite = 1000; */
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario},
          
           success:function(resul){
              
                            
                $("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    if(!(fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null  || fecha_hasta =="")){
                        fecha1 = "Desde: "+convertDateFormat(fecha_desde);
                        fecha2 = " - Hasta: "+convertDateFormat(fecha_hasta);
                    }else if(!(fecha_desde == null || fecha_desde =="") && (fecha_desde == null || fecha_hasta =="")){
                        fecha1 = "De: "+convertDateFormat(fecha_desde);
                        fecha2 = "";
                    }else if((fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null || fecha_hasta =="")){
                        fecha1 = "";
                        fecha2 = "De: "+convertDateFormat(fecha_hasta);
                    }else{
                        fecha1 = "";
                        fecha2 = "";
                    }

                    var totalingreso1   = 0;
                    var totalingreso2   = 0;
                    var totalingreso3  = 0;
                    var totalegreso4    = 0;
                    
                    var totalingreso = 0;
                    var totalegreso = 0;
                    //var totalutilidad = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    var cont1 = 1;
                    var cont2 = 1;
                    var cont3 = 1;
                    var cont4 = 1;
                    var tituloingreso =1;
                    var tituloegreso  =1;
                    for (var i = 0; i < n ; i++){
                      totalingreso  += parseFloat(registros[i]['ingreso']);
                      totalegreso   += parseFloat(registros[i]['egreso']);
                     // totalutilidad += parseFloat(registros[i]['utilidad']);
                        if(registros[i]['tipo'] == 4){
                            if(tituloegreso == 1){
                                html += "<tr class='cabeceratabla' style='background: #5bc0de;'>";
                                html += "<th colspan='5' class='text-center'> - EGRESOS - </th>";
                                html += "</tr>";
                                tituloegreso = 0;
                            }
                            html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        
                        
                       html += "<td>"+formatofecha_hora(registros[i]["fecha"])+"</td>";
                       html += "<td>"+registros[i]["detalle"]+"</td>";
                       html += "<td></td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                       html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       /*if(registros[i]['tipo'] == 3 || registros[i]['tipo'] == 2){
                           html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";
                       }else{
                           html += "<td id='alinearder'>0.00</td>";
                       }*/

                       
                       
                        html += "</tr>";
                        }else{
                            if(tituloingreso == 1){
                                html += "<tr class='cabeceratabla' style='background: #5bc0de;'>";
                                html += "<th colspan='5' class='text-center'> - INGRESOS - </th>";
                                
                                html += "</tr>";
                                tituloingreso = 0;
                            }
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        
                       ; 
                       html += "<td>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY")+"</td>";
                       html += "<td>"+registros[i]["detalle"]+registros[i]["esfactura"]+"</td>";
                       html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       /*if(registros[i]['tipo'] == 3 || registros[i]['tipo'] == 2){
                           html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";
                       }else{
                           html += "<td id='alinearder'>0.00</td>";
                       }*/

                       
                       
                        html += "</tr>";
                        }
                       
                   }
                   
                   htmls = "";
                   htmls += "<tr>";
                   htmls += "<td></td>";
                   htmls += "<td colspan='2' class='esbold'>TOTAL (INGRESOS/EGRESOS)Bs.</td>";
                   /*var totaling = Number(totalingreso).toFixed(2);
                   var n = totaling.toString(); */
                   htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalingreso).toFixed(2))+"</td>";
                   htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalegreso).toFixed(2))+"</td>";
                   htmls += "<td></td>";
                   //htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td>";
                   //htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td>";
                   htmls += "</tr>";
                   
                  /* htmls += "<tr>";
                   htmls += "<td></td>";
                   //htmls += "<td colspan='2' class='esbold'>TOTAL INGRESOS(EFECTIVO, VENTAS CONT., COBROS CRED.)/UTILIDAD:</td>";
                   
                   htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalingreso1+totalingreso2+totalingreso3).toFixed(2))+"</td>";
                   htmls += "<td class='esbold' id='alinearder'></td>";
                   //htmls += "<td></td>";
                   //htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td>";
                   //htmls += "<td class='esbold' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td>";
                   htmls += "</tr>";*/
                   
                   
                   htmls += "<tr class='cabeceratabla' style='background: #5bc0de;'>";
                   htmls += "<td></td>";
                   htmls += "<td colspan='3' class='text-bold' style='font-family: Arial; font-size: 12px'>SALDO EFECTIVO EN CAJA Bs.</td>";
                   htmls += "<td class='text-bold' id='alinearder' style='font-family: Arial; font-size: 12px'>"+numberFormat(Number((totalingreso)-totalegreso).toFixed(2))+"</td>";
                   htmls += "</tr>";
                   
                   

                   $('#elusuario').html("Usuario: "+esusuario);
                   $('#fecha1impresion').html(fecha1);
                   $('#fecha2impresion').html(fecha2);
                    
                    /* *****************INICIO para suma reporte total de INGRESOS****************** */
                    totaltablaegresoresultados  = "<table style='width:100%;' class='table table-striped table-condensed' id='tablasinespacio'><tr><td style='width:5%;'> </td><td style='width:61%;'><b>TOTAL EGRESOS: </b></td><td style='width:17%;'></td><td style='width:17%;' id='alinearder'><b>"+numberFormat(Number(totalegreso4).toFixed(2))+"</b></td></tr></table>";
                    /* *****************F I N para suma reporte total de INGRESOS****************** */ 
                   //para mostrar saldo en caja
                    saldoencaja = "<table style='width:100%;' class='table table-striped table-condensed' id='tablasinespacio'><tr style='font-size: 12px'><td style='width:5%;'> </td><td style='width:61%;' id='alinearder'><b>SALDO EFECTIVO EN CAJA: </b></td><td style='width:17%;'></td><td style='width:17%;' id='alinearder'><b>"+numberFormat(Number((totalingreso1+totalingreso2+totalingreso3)-totalegreso).toFixed(2))+"</b></td></tr></table>";
                    /* *****************INICIO para reporte TOTAL****************** */
                    //cabecerahtmlt= "<label  class='control-label'><a href='#' class='btn btn-success btn-sm no-print' id='mostotal' onclick='mostrartotal(); return false'>REPORTE TOTAL</a></label>";
                    
                    cabecerahtmlt = "<table class='table table-striped table-condensed' id='mitabladetimpresion' style='width: 100%'>";
                    cabecerahtmlt += "<tr>";
                    cabecerahtmlt += "<th style='width: 2%'>N°</th>";
                    cabecerahtmlt += "<th style='width: 15%'>Fecha</th>";
                    cabecerahtmlt += "<th style='width: 58%'>Detalle</th>";
                    cabecerahtmlt += "<th style='width: 10%'>Ingreso</th>";
                    cabecerahtmlt += "<th style='width: 10%'>Egreso</th>";
                    cabecerahtmlt += "</tr>";
                    cabecerahtmlt += "<tbody>";
                    
                    piehtmlt = "</tbody></table>";
                    /* *****************F I N para reporte TOTAL****************** */
                   
                   $("#saldoencaja").html(saldoencaja);
                   $("#tablatotalresultados").html(cabecerahtmlt+html+htmls+piehtmlt);
                   
                   document.getElementById('loader').style.display = 'none';
            }
        document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaingresoresultados").html(html);
           $("#tablaventaresultados").html(html);
           $("#tablacobroresultados").html(html);
           $("#tablaegresoresultados").html(html);
           $("#tablacompraresultados").html(html);
           $("#tablapagoresultados").html(html);
           $("#tablatotalresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}

function porformapago(fecha_desde, fecha_hasta, usuario, formapago, nombre1, nombre2){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/reportesformapago";
    var tipoformapago = "";
    if(formapago == 2){
        tipoformapago = 2;
    }else if(formapago == 3){
        tipoformapago = 3;
    }else if(formapago == 4){
        tipoformapago = 4;
    }else if(formapago == 5){
        tipoformapago = 5;
    }
    
     /*var limite = 1000; */
     
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, formapago: tipoformapago},
          
           success:function(resul){
              
                            
                //$("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    var totalingreso = 0;
                    //var totalegreso = 0;
                    var totalutilidad = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    html1 = "";
                    cabecerahtml1= "";
                    
                    var cont = 1;
                    for (var i = 0; i < n ; i++){
                      totalingreso  += parseFloat(registros[i]['ingreso']);
                      //totalegreso   += parseFloat(registros[i]['egreso']);
                      totalutilidad += parseFloat(registros[i]['utilidad']);
                        html += "<tr>";
                      
                        html += "<td>"+cont+"</td>";
                        
                       html += "<td>"+formatofecha_hora(registros[i]["fecha"])+"</td>";
                       html += "<td>"+registros[i]["detalle"]+"</td>";
                       html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                    //   html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";

                       
                       
                        html += "</tr>";
                       cont += 1;
                   }

                    /* *****************INICIO para reporte TOTAL****************** */
                    
                    cabecerahtml += "<table class='table table-striped table-condensed' id='mitabladetimpresion'>";
                    cabecerahtml += "<tr>";
                    cabecerahtml += "<th>N°</th>";
                    cabecerahtml += "<th>Fecha</th>";
                    cabecerahtml += "<th>Detalle</th>";
                    cabecerahtml += "<th>Ingreso</th>";
                //    cabecerahtml += "<th>Utilidad</th>";
                    cabecerahtml += "</tr>";
                    
                    piehtml = "</table>";
                    /* *****************F I N para reporte TOTAL****************** */
                   $("#tablaformapagoresultados"+formapago).html(cabecerahtml+html+piehtml);
                   return totalingreso;
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaformapagoresultados"+formapago).html(html);
        }
        
    });   

}
