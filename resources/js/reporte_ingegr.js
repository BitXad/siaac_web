$(document).on("ready",inicio);
function inicio(){
    var f = new Date();
    $('#fechaimpresion').html(moment(f).format("DD/MM/YYYY HH:mm:ss"));
    buscar_por_fecha();
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
                //var registros =  JSON.parse(resul);
                var resultado =  JSON.parse(resul);
                var registros = resultado.ventas;
                var detalles = resultado.detalles;
                const myventa   = JSON.stringify(registros);
                const mydetalle = JSON.stringify(detalles);
                $("#resventas").val(myventa);
                $("#resdetalles").val(myventa);
               if (registros != null){
                   
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    if(!(fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null  || fecha_hasta =="")){
                        fecha1 = "<b>DESDE: </b>"+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = "<br><b>HASTA: </b>"+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else if(!(fecha_desde == null || fecha_desde =="") && (fecha_desde == null || fecha_hasta =="")){
                        fecha1 = "<b>DE: </b>"+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = "";
                    }else if((fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null || fecha_hasta =="")){
                        fecha1 = "";
                        fecha2 = "<b>DE: </b>"+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else{
                        fecha1 = "";
                        fecha2 = "";
                    }

                    var totalingreso = 0;
                    var totalegreso = 0;
                    var totalbanca = 0;
                    //var totalutilidad = 0;
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var m = detalles.length;
                    $("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    var tituloingreso =1;
                    var tituloegreso  =1;
                    var titulobanca   =1;
                    for (var i = 0; i < n ; i++){
                     // totalutilidad += parseFloat(registros[i]['utilidad']);
                        if(registros[i]['tipo'] == 3){ //Egresos
                            totalegreso   += parseFloat(registros[i]['egreso']);
                            if(tituloegreso == 1){
                                html += "<tr style='border-bottom: 3px solid; border-bottom-color: #aaaaaa;'>";
                                html += "<th colspan='8' class='text-center'><span style='background-color: #aaaaaa;' class='fondoprint'> - EGRESOS - </span></th>";
                                html += "</tr>";
                                tituloegreso = 0;
                            }
                            html += "<tr class='labj'>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td>"+registros[i]["recibo"]+"</td>";
                        html += "<td>"+registros[i]["esfactura"]+"</td>";
                        
                       html += "<td>"+registros[i]["detalle"]+"</td>";
                       html += "<td></td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                       html += "<td style='text-align: right'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       html += "<td></td>";
                       /*if(registros[i]['tipo'] == 3 || registros[i]['tipo'] == 2){
                           html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";
                       }else{
                           html += "<td id='alinearder'>0.00</td>";
                       }*/

                       
                       
                        html += "</tr>";
                        }else if(registros[i]['tipo'] == 2){ // banca
                            totalbanca  += parseFloat(registros[i]['ingreso']);
                            if(titulobanca == 1){
                                html += "<tr style='border-bottom: 3px solid; border-bottom-color: #aaaaaa;'>";
                                html += "<th colspan='8' class='text-center'><span style='background-color: #aaaaaa;' class='fondoprint'> - BANCA - </span></th>";
                                html += "</tr>";
                                titulobanca = 0;
                            }
                        html += "<tr class='labj'>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY")+"</td>";
                        html += "<td>"+registros[i]["recibo"]+"</td>";
                        html += "<td>";
                        if(registros[i]["estado_id"] == 1){
                            html += registros[i]["esfactura"];
                        }else{
                            html += "-";
                        }
                        html += "</td>";
                        
                       html += "<td>";
                       html += registros[i]["detalle"];
                       for(var j = 0; j < m; j++){
                            if(detalles[j]['venta_id'] == registros[i]["laventa_id"]){
                                html += ", "+detalles[j]['producto_nombre']+" "+detalles[j]['detalleven_total'];
                            }
                       }
                       html += "</td>";
                       html += "<td></td>";
                       html += "<td></td>";
                       html += "<td style='text-align: right'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       /*if(registros[i]['tipo'] == 3 || registros[i]['tipo'] == 2){
                           html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";
                       }else{
                           html += "<td id='alinearder'>0.00</td>";
                       }*/

                       
                       
                        html += "</tr>";
                        }else if(registros[i]["tipo"] == 1){ //Ingresos
                            totalingreso  += parseFloat(registros[i]['ingreso']);
                            if(tituloingreso == 1){
                                html += "<tr style='border-bottom: 3px solid; border-bottom-color: #aaaaaa;'>";
                                html += "<th colspan='8' class='text-center'><span style='background-color: #aaaaaa;' class='fondoprint'> - INGRESOS - </span></th>";
                                html += "</tr>";
                                tituloingreso = 0;
                            }
                            html += "<tr class='labj'>";

                            html += "<td>"+(i+1)+"</td>";
                            html += "<td>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY")+"</td>";
                            html += "<td>"+registros[i]["recibo"]+"</td>";
                            html += "<td>";
                            if(registros[i]["estado_id"] == 1){
                                html += registros[i]["esfactura"];
                            }else{
                                html += "-";
                            }
                            html += "</td>";

                            html += "<td>";
                            html += registros[i]["detalle"];
                            for(var j = 0; j < m; j++){
                                if(detalles[j]['venta_id'] == registros[i]["laventa_id"]){
                                    html += ", "+detalles[j]['producto_nombre']+" "+detalles[j]['detalleven_total'];
                                }
                            }
                            html += "</td>";
                            html += "<td style='text-align: right'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                            html += "<td></td>";
                            html += "<td></td>";
                            html += "</tr>";
                        }
                       
                   }
                   
                   htmls = "";
                   htmls += "<tr style='border-top: 3px solid; border-top-color: #aaaaaa;'>";
                   htmls += "<td colspan='4'></td>";
                   htmls += "<td class='esbold'>TOTAL (INGRESOS)Bs.</td>";
                   htmls += "<td class='esbold' style='text-align: right'>"+numberFormat(Number(totalingreso).toFixed(2))+"</td>";
                   htmls += "<td colspan='2'></td>";
                   htmls += "</tr>";
                   htmls += "<tr>";
                   htmls += "<td colspan='4'></td>";
                   htmls += "<td class='esbold'>TOTAL (EGRESOS)Bs.</td>";
                   htmls += "<td></td>";
                   htmls += "<td class='esbold' style='text-align: right'>"+numberFormat(Number(totalegreso).toFixed(2))+"</td>";
                   htmls += "<td></td>";
                   htmls += "</tr>";
                   htmls += "<tr style='border-bottom: 3px solid; border-bottom-color: #aaaaaa;'>";
                   htmls += "<td colspan='4'></td>";
                   htmls += "<td class='esbold'>TOTAL (BANCA)Bs.</td>";
                   htmls += "<td colspan='2'></td>";
                   htmls += "<td class='esbold' style='text-align: right'>"+numberFormat(Number(totalbanca).toFixed(2))+"</td>";
                   htmls += "</tr>";
                  
                   htmls += "<tr style='border-bottom: 3px solid; border-bottom-color: #aaaaaa;'>";
                   htmls += "<td></td>";
                   htmls += "<td colspan='5' class='text-bold' style='font-family: Arial; font-size: 12px'>SALDO EFECTIVO EN CAJA Bs.</td>";
                   htmls += "<td class='text-bold' id='alinearder' style='font-family: Arial; font-size: 12px'>"+numberFormat(Number((totalingreso)-totalegreso).toFixed(2))+"</td>";
                   htmls += "<td></td>";
                   htmls += "</tr>";
                   
                   

                   $('#elusuario').html("<b>USUARIO</b>: "+esusuario);
                   $('#fecha1impresion').html(fecha1);
                   $('#fecha2impresion').html(fecha2);
                   
                   $("#tablatotalresultados").html(html+htmls);
                   
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

function generarexcel_movdiario(){
    var resventas = document.getElementById('resventas').value;
    var respuesta = document.getElementById('resdetalles').value;
    if(resventas == "" || resventas == null){
        alert("Primero debe realizar una búsqueda");
    }else{
        /*var nombre_moneda = document.getElementById('nombre_moneda').value;
        var lamoneda_id = document.getElementById('lamoneda_id').value;
        var lamoneda = JSON.parse(document.getElementById('lamoneda').value);*/
        var registros =  JSON.parse(resventas);
        var showLabel = true;
        //var reportitle = moment(Date.now()).format("DD/MM/YYYY H_m_s");
        var tam = registros.length;
        //var otramoneda_nombre = "";
        //var total_otram = Number(0);
        html = "";
                //if (opcion==1){
                  /* **************INICIO Generar Excel JavaScript************** */
                    var CSV = 'sep=,' + '\r\n\n';
                    //This condition will generate the Label/Header
                    if (showLabel) {
                        var row = "";

                        //This loop will extract the label from 1st index of on array
                        

                            //Now convert each value to string and comma-seprated
                            row += 'Nro.' + ',';
                            row += 'FECHA' + ',';
                            row += 'REC.'+ ',';
                            row += 'FACT.'+ ',';
                            row += 'DETALLE'+ ',';
                            row += 'INGRESO'+ ',';
                            row += 'EGRESO'+ ',';
                            row += 'BANCA'+ ',';
                            
                        row = row.slice(0, -1);

                        //append Label row with line break
                        CSV += row + '\r\n';
                    }
                    
                    //1st loop is to extract each row
                    for (var i = 0; i < tam; i++) {
                        var row = "";
                        //2nd loop will extract each column and convert it in string comma-seprated
                        //var utilidad = Number(Number(registros[i]["detalleven_total"])-(Number(registros[i]["detalleven_costo"])*Number(registros[i]["detalleven_cantidad"])));
                        //utilidades += Number(utilidad);
                            row += (i+1)+',';
                            row += moment(registros[i]['']).format("DD/MM/YYYY")+',';
                            row += '"' +registros[i]["cliente_nombre"]+ '",';
                            row += '"' +numberFormat(Number(registros[i]["totalventas"]).toFixed(2))+ '",';
                            if(lamoneda_id == 1){
                                total_otram = Number(registros[i]["totalventas"])/Number(registros[i]["tipo_cambio"])
                                //total_otramoneda += total_otram;
                            }else{
                                total_otram = Number(registros[i]["totalventas"])*Number(registros[i]["tipo_cambio"])
                                //total_otramoneda += total_otram;
                            }
                            row += '"' +numberFormat(Number(total_otram).toFixed(2))+ '",';
                            if(tipousuario_id == 1){
                                row += '"' +numberFormat(Number(Number(registros[i]["totalcosto"])).toFixed(2))+ '",';
                                row += '"' +numberFormat(Number(Number(registros[i].totalventas)-Number(registros[i].totalcosto)).toFixed(2))+ '",';
                        }
                            
                        row.slice(0, row.length - 1);

                        //add a line break after each row
                        CSV += row + '\r\n';
                    }
                    
                    if (CSV == '') {
                        alert("Invalid data");
                        return;
                    }
                    
                    //Generate a file name
                    var fileName = "Ventacategoria_";
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
        //}  
        }
}
