$(document).on("ready",inicio);
function inicio(){
    buscar_inscripciones();
}

function buscar_inscripciones()
{
    var opcion      = document.getElementById('select_inscripcion').value;   
    if (opcion == 1)
    {
        filtro = " and c.inscripcion_fecha = date(now())";
        mostrar_ocultar_buscador("ocultar");
    }//pedidos de hoy
    if (opcion == 2)
    {
        filtro = " and c.inscripcion_fecha = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
    }//pedidos de ayer
    if (opcion == 3) 
    {
        filtro = " and c.inscripcion_fecha >= date_add(date(now()), INTERVAL -1 WEEK)";//pedidos de la semana
        mostrar_ocultar_buscador("ocultar");
    }
    if (opcion == 4) 
    {   filtro = " ";//todos los pedidos
        mostrar_ocultar_buscador("ocultar");
    }
    if (opcion == 5) {
        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }

    tabla_inscripcion(filtro);
}

function inscripciones_por_fecha()
{
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var carrera_id = document.getElementById('carrera_id').value;
    var planacad_id = document.getElementById('planacad_id').value;
    var nivel_id = document.getElementById('nivel_id').value;
    var estado_id   = document.getElementById('estado_id').value;
    var usuario_id   = document.getElementById('usuario_id').value;
    var carrera = "";
    var planacad = "";
    var nivel = "";
    var estado = "";
    var usuario = "";
    if(carrera_id != 0){
        carrera = " and c.carrera_id = "+carrera_id;
    }
    if(planacad_id != 0){
        planacad = " and c.planacad_id = "+planacad_id;
    }
    if(nivel_id != 0){
        nivel = " and c.nivel_id = "+nivel_id;
    }
    if(estado_id != 0){
        estado = " and c.estado_idinsc = "+estado_id;
    }
    if(usuario_id != 0){
        usuario = " and c.usuario_id = "+usuario_id;
    }
    filtro = " and date(c.inscripcion_fecha) >= '"+fecha_desde+"'  and  date(c.inscripcion_fecha) <='"+fecha_hasta+"' "+carrera+planacad+nivel+estado+usuario;

    tabla_inscripcion(filtro);
}
function buscarinscritos(e,opcion) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){ 
     	if (opcion==1){   //si la pulsacion proviene del buscador de estudiantes
            var resfiltro = document.getElementById('filtrar').value;
            filtro = " and (c.estudiante_nombre like '%"+resfiltro+"%' or c.estudiante_apellidos like '%"+resfiltro+"%'"; 
            filtro += " or c.estudiante_codigo like '%"+resfiltro+"%' or c.estudiante_ci like '%"+resfiltro+"%'";
            filtro += " or c.estudiante_nit like '%"+resfiltro+"%') ";
            tabla_inscripcion(filtro);
        }
    }

}
function tabla_inscripcion(filtro){
    if(filtro != null){
        var base_url = document.getElementById('base_url').value;
        var parametro = document.getElementById('parametro').value;
        var controlador = base_url+'inscripcion/buscar_inscritos';
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader

        $.ajax({url:controlador,
            type:"POST",
            data:{filtro:filtro},
            success:function(respuesta){

            var registros = JSON.parse(respuesta);
            if (registros != null){
                const myString = JSON.stringify(registros);
                   $("#resinscripcion").val(myString);
                var n = registros.length; //tamaño del arreglo de la consulta
                html = "";
                //var j = 0;
                for (var i = 0; i < n ; i++){
                    html += "<tr style='background-color: #"+registros[i]["estado_colorinsc"]+"'>";
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td><font size='3'><b>"+registros[i]["estudiante_apellidos"]+", "+registros[i]["estudiante_nombre"]+"</b></font>";
                    html += "<sub>["+registros[i]["estudiante_id"]+"]</sub>";
                    html += "<br>CODIGO: "+registros[i]["estudiante_codigo"]+" | C.I.: "+registros[i]["estudiante_ci"]+" "+registros[i]["estudiante_extci"];
                    html += "</td>";
                    html += "<td align='center'>"+registros[i]["inscripcion_fecha"]+"<br>"+registros[i]["inscripcion_hora"]+"</td>";
                    html += "<td align='center'><font size='3'><b>00"+registros[i]["inscripcion_id"]+"</b></font></td>";
                    html += "<td align='center'><b>"+registros[i]["carrera_nombre"]+"</b><br>"+registros[i]["nivel_descripcion"]+"</td>";
                    html += "<td align='center'>"+registros[i]["paralelo_descripcion"]+"<br>"+registros[i]["turno_nombre"]+"</td>";
                    html += "<td>"+registros[i]["inscripcion_fechainicio"]+"</td>";
                    html += "<td>"+registros[i]["esteestado_descripcion"]+"</td>";
                    html += "<td>";
                    if(registros[i]["estado_idinsc"] != 3){
                        html += "<a href='"+base_url+"inscripcion/edit/"+registros[i]["inscripcion_id"]+"' class='btn btn-info btn-xs'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"venta/ventas_cliente/"+registros[i]["cliente_id"]+"' class='btn btn-success btn-xs' title='Vender'><span class='fa fa-cart-plus'></span></a>";
                        html += "<a href='"+base_url+"inscripcion/boleta_inscripcion/"+registros[i]["inscripcion_id"]+"' target='_blank' class='btn btn-facebook btn-xs' title='Imprimir comprobante de inscripción'><span class='fa fa-print'></span></a>";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+registros[i]["inscripcion_id"]+"' title='Anular Inscripción'><span class='fa fa-ban'></span></a>";
                        if(registros[i]["factura_id"] >0){
                            //if(parametro["parametro_tipoimpresora"] == "FACTURADORA"){
                            if(parametro == "FACTURADORA"){
                                var tipo_fact = "factura_boucher_id";
                            }else { tipo_fact = "factura_carta_id";}
                            html += "<a href='"+base_url+"factura/"+tipo_fact+"/"+registros[i]["factura_id"]+"' target='_blank' class='btn btn-warning btn-xs' title='Ver/anular factura'><span class='fa fa-list-alt'></span></a>";
                        }
                    }
                    html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                    html += "<div class='modal fade' id='myModal"+registros[i]["inscripcion_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]["inscripcion_id"]+"'>";
                    html += "<div class='modal-dialog' role='document'>";
                    html += "<br><br>";
                    html += "<div class='modal-content'>";
                    html += "<div class='modal-header text-center'>";
                    html += "<span class='text-bold' style='font-size: 18px'>ANULAR INSCRIPCION</span>";
                    html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                    html += "</div>";
                    html += "<div class='modal-body'>";
                    html += "<!------------------------------------------------------------------->";
                    html += "<div style='text-align: left !important; font-size: 15px'>";
                    html += "Se anulara la inscripcion de:";
                    html += "</div><br>";
                    html += "<div class='text-center' style='font-size: 15px'><b> "+registros[i]["estudiante_apellidos"]+", "+registros[i]["estudiante_nombre"]+"</b></div>";
                    html += "<span style='font-size: 12px'>";
                    if(registros[i]["factura_id"] >0){
                        html += "<b><u>Nota</u>.- </b>Esta inscripcion, cuenta con una factura; se le recomienda anular dicha factura";
                    }
                    html += "</span>";
                    html += "<!------------------------------------------------------------------->";
                    html += "</div>";
                    html += "<div class='modal-footer aligncenter'>";
                    html += "<a href='"+base_url+"inscripcion/anular/"+registros[i]["inscripcion_id"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                    html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
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
}

/* Obtiene los planes academicos de una determinada Carrera */
function obtener_planacademico(carrera_id){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'plan_academico/get_plan_acadcarrera';
    
    if(carrera_id >0){
    
        document.getElementById('loader').style.display = 'block';
        $.ajax({url: controlador,
               type:"POST",
               data:{carrera_id:carrera_id},
               success:function(respuesta){

                    var registros =  JSON.parse(respuesta);
                    var html1 = "";
                    

                    if (registros != null){
                        var n = registros.length; //tamaño del arreglo de la consulta
                            html1 = "";
                            html1 += "<b><select name='planacad_id' class='btn btn-warning btn-sm  form-control' onchange='obtener_niveles(this.value)' id='planacad_id' required>";
                            html1 += "<option value=''>- PLAN ACADEMICO -</option>";

                            for (var i = 0; i < n ; i++){

                                html1 += "<option value='"+registros[i]['planacad_id']+"' "+seleccionado+">"+registros[i]['planacad_nombre']+"</option>";
                            }
                            html1 += "</select></b>";
                            $("#elegirplanacad").html(html1);
                            $("#carrera_nivel").val("-");
                            $("#carrera_tiempoestudio").val("-");
                            $("#carrera_codigo").val("-");
                            $("#carrera_modalidad").val("-");
                            $("#carrera_plan").val("-");
                            $("#carrera_matricula").val("0.00");
                            $("#carrera_mensualidad").val("0.00");
                            $("#carrera_nummeses").val("0");
                            $("#pagar_mensualidad").empty();
                            $("#pagar_mensualidad").html("<option value='0'>- NINGUNA -</option>");
                            $("#nivel_id").empty();
                            $("#nivel_id").html("<option value='0'>- NIVEL -</option>");
                            $("#tabla_materia").html("");
                            $('#pagar_matricula').find('option:first').attr('selected', 'selected').parent('select');
                            document.getElementById('loader').style.display = 'none';


                }
                document.getElementById('loader').style.display = 'none';
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#elegirplanacad").html("");
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
        $("#elegirplanacad").html(htmln);
        document.getElementById('nuevo_plan').style.display = 'none';
    }
}
/* obtiene niveles de un plan academico*/
function obtener_niveles(planacad_id){
    var base_url = document.getElementById('base_url').value;
    controlador = base_url+"inscripcion/buscar_nivel";
    $("#nivel_id").empty();
    $("#nivel_id").prepend("<option value='0'>- NIVEL -</option>");
    $.ajax({
        url:controlador,
        type:"POST",
        data:{planacad_id:planacad_id},
        success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                for(var i=0;i<registros.length;i++){
                    $("#nivel_id").prepend("<option value='"+registros[i].nivel_id+"'>"+registros[i].nivel_descripcion+"</option>");                       
                }
            }
        },
        error:function(respuesta){
        }, 
    });
}


function validar(e,opcion) {
 tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){ 
     	if (opcion==1){   //si la pulsacion proviene del buscador de estudiantes
            var parametro = document.getElementById('filtrar2').value;
            buscarestudiante(parametro);
        }
//        
//        if (opcion==1){   //si la pulsacion proviene del ci         
//            var ci = document.getElementById('estudiante_ci').value;
//            sql = "e.estudiante_ci="+ci+" ";
//            buscarestudiante(sql);           
//        }
//
//        if (opcion==2){   //si la pulsacion proviene del nombre  
//            var nombre = document.getElementById('nombre').value;
//            var apellidos = document.getElementById('apellidos').value;
//
//            sql = "e.estudiante_nombre='"+nombre+"' or e.estudiante_apellidos='"+apellidos+"'";
//            buscarestudiante(sql);
//        }
    }

}
function boton_buscarestudiante() {
    var parametro = document.getElementById('filtrar2').value;
    buscarestudiante(parametro);
}

function buscarestudiante(parametro){
	var base_url = document.getElementById('base_url').value;
	var controlador = base_url+'inscripcion/buscar_estudiante';
            
        $.ajax({url:controlador,
                type:"POST",
                data:{parametro:parametro},
                success:function(respuesta){
                    
            	var registros = JSON.parse(respuesta);
                if (registros != null){
                		html = "";
                        html += "<table class='table table-striped table-condensed' id='mitabla'";
                        html += "<tr>";
                        html += "<th>#</th>";
                        html += "<th>Nombre</th>";                            
                        html += "<th>Apellidos</th>";
                        html += "<th>C.I.</th>";
                        html += "<th>Codigo</th>";
                        html += "<th></th>";
                        
                        html += "</tr>";  
                        var cont = 0;
                        for (var i = 0; i < 55 ; i++){
                           cont = cont+1;

                        html += "<tr>";
                        html += "<td>"+cont+"</td>";
                        html += "<td><b>"+registros[i]["estudiante_nombre"]+"</b></td>";
                        html += "<td><b>"+registros[i]["estudiante_apellidos"]+"</b></td>";
                        html += "<td><b>"+registros[i]["estudiante_ci"]+"</b></td>";
                        html += "<td><b>"+registros[i]["estudiante_codigo"]+"</b></td>";
                        html += "<td><a href='"+base_url+"inscripcion/inscribir/"+registros[i]["estudiante_id"]+"' class='btn btn-info btn-sm' ><i class='fa fa-drivers-license-o'></i> Inscribir</a></td>";
                        
                        html += "</tr>";  
                        html += "</table>";
                        $("#tablaestudiantes").html(html);
                        }              
                }
            },
                error:function(respuesta){

        		}		
        });
}


function seleccionar_carrera(){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/buscar_carrera";
    var carrera_id = document.getElementById('carrera_id').value;
    var estudiante_id = document.getElementById('estudiante_id').value;
    var planacad_id = document.getElementById('planacad_id').value;
    
    
   
    if(estudiante_id>0){
    
    
    
    //alert(controlador);
        $.ajax({
            url:controlador,
            type:"POST",
            data:{carrera_id:carrera_id},
            success:function(respuesta){
                html = " ";
                $("#tabla_materia").html(html);
                
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    $("#carrera_codigo").val(registros[0].carrera_codigo);
                    $("#carrera_nivel").val(registros[0].carrera_nivel);
                    $("#carrera_tiempoestudio").val(registros[0].carrera_tiempoestudio);
                    $("#carrera_modalidad").val(registros[0].carrera_modalidad);
                    $("#carrera_plan").val(registros[0].carrera_plan);
                    $("#carrera_matricula").val(registros[0].carrera_matricula);
                    $("#carrera_mensualidad").val(registros[0].carrera_mensualidad);
                    $("#carrera_nummeses").val(registros[0].carrera_nummeses);
                    //$("#inscripcion_fechainicio").val(registros[0].carrera_fechainicio);                
                
                        $("#pagar_mensualidad").empty();
                    for (j = Number(registros[0].carrera_nummeses); j>=1 ; j--){
                        $("#pagar_mensualidad").prepend("<option  value="+j+">"+j+" CUOTA/MES");
                    }
                        $("#pagar_mensualidad").prepend("<option  value="+0+">- NINGUNA -");
                        $("#pagar_mensualidad").val(0) ;
                          
                    var mensualidades = document.getElementById('pagar_mensualidad').value;
                    /*
                    $("#total").val((Number(registros[0].carrera_matricula) + Number(registros[0].carrera_mensualidad * mensualidades)).toFixed(2));
                    $("#total_final").val((Number(registros[0].carrera_matricula) + Number(registros[0].carrera_mensualidad * mensualidades)).toFixed(2));
                    $("#efectivo").val((Number(registros[0].carrera_matricula) + Number(registros[0].carrera_mensualidad * mensualidades)).toFixed(2));
                    */
                    
                }
            },
            error:function(respuesta){

            }, 
        }); 
            
        controlador = base_url+"inscripcion/buscar_nivel";
        $("#nivel_id").empty();
        $("#nivel_id").prepend("<option value='0'>- NIVEL -</option>");
        
        $.ajax({
            url:controlador,
            type:"POST",
            data:{planacad_id:planacad_id},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    for(var i=0;i<registros.length;i++){
                        $("#nivel_id").prepend("<option value='"+registros[i].nivel_id+"'>"+registros[i].nivel_descripcion+"</option>");                       
                    }
                }
                
                
            },
            error:function(respuesta){

            }, 
        }); 
    
    calcular(); 
    
    }
    else{
        $("#modalbuscarclie").click();
        //alert("ERROR: Debe seleccionar/registrar un estudiante...!!");
    }
  
}

function mostrar_materias(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/buscar_materias";
    var nivel_id = document.getElementById('nivel_id').value;
    var allgrupo = JSON.parse(document.getElementById('allgrupo').value);
        $.ajax({
            url:controlador,
            type:"POST",
            data:{nivel_id:nivel_id},
            success:function(respuesta){
                html = " ";
                
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    var resgrupo = allgrupo.length;
                    for (j = 0; j<Number(registros.length) ; j++){
                        html += "<tr>";
                        html += "<td style='padding: 0;'>"+(j+1)+"</td>";
                        html += "<td style='padding: 0;'>"+registros[j]["materia_nombre"];
                        if(registros[j]["materia_nombre"] != registros[j]["materia_alias"] && registros[j]["materia_alias"] != null){
                            html += "<span class='text-blue' style='font-size: 8px'>";
                            html += "<br>"+registros[j]["materia_alias"];
                            html += "</span>";
                        }
                        if(registros[j]["materia_alias"] == null){
                            html += "<span class='text-blue' style='font-size: 8px'>";
                            html += "<br>MATERIA COMPLEMENTARIA";
                            html += "</span>";
                        }
                        html += "</td>";
                        html += "<td style='padding: 0;'>"+registros[j].materia_codigo+"</td>";
                        html += "<td style='padding: 0;'>";
                        //processData(registros[j]["materia_id"]);
                        //html += "<div id='mostrargrupo"+registros[j]['materia_id']+"'>";
                        
                        html += "<select id='selgrupo"+registros[j]['materia_id']+"' name='selgrupo"+registros[j]['materia_id']+"'>";
                        html += "<option value='0'>- GRUPO -</option>";
                        for (var i = 0; i < resgrupo ; i++){
                            if(registros[j]['materia_id'] == allgrupo[i]["materia_id"]){
                                html += "<option value='"+allgrupo[i]['grupo_id']+"'>"+allgrupo[i]['grupo_nombre']+"</option>";
                            }
                        }
                        html += "</select>";
                        
                        
                        
                        
                        /* html += "<select >";
                        html += "<option value='0'>- GRUPO -</option>";
                        html += "<option value='1'>Grupo 1</option>";
                        
                        html += "</select>*/;
                        //html += "</div>";
                        html += "</td>";
                        html += "<td align='center' style='padding: 0;'><input type='checkbox' name='mat[]' id='mat"+registros[j].materia_id+"' value='"+registros[j].materia_id+"' checked /></td>";
                        html += "</tr>";
                        
                    }
                              
                $("#tabla_materia").html(html);
                    
                }
            },
            error:function(respuesta){

            }, 
        }); 
}


function calcular(){
    
    var matricula = Number(document.getElementById('carrera_matricula').value);
    var mensualidad = Number(document.getElementById('carrera_mensualidad').value);    
    var pagar_matricula = Number(document.getElementById('pagar_matricula').value);
    var pagar_mensualidad = Number(document.getElementById('pagar_mensualidad').value);
    

    var calculo_total = (matricula * pagar_matricula) + (mensualidad * pagar_mensualidad) ;
    
    $("#total").val(Number(calculo_total).toFixed(2));
    $("#total_final").val(Number(calculo_total).toFixed(2));
    
    var total = document.getElementById('total').value;
    
    var descuento = document.getElementById('descuento').value;
    
//    var efectivo = document.getElementById('efectivo').value;
    var total_final = total - descuento;
    $("#total_final").val(Number(total_final).toFixed(2));
    $("#efectivo").val(Number(total_final).toFixed(2));
    
    var efectivo = document.getElementById('efectivo').value;
    
    //var total_final = document.getElementById('total_final').value;
    cambio = efectivo - (total_final);
    $("#cambio").val(cambio);
    
}
function calcularcambio(){
    
    var efectivo = Number(document.getElementById('efectivo').value);
    var total_final = Number(document.getElementById('total_final').value);
    
    cambio = efectivo - (total_final);
    $("#cambio").val(cambio);
    
}

function seleccionar_efectivo(){
    $("#efectivo").select();
    
}

function registrar_inscripcion(){

    var eschecked = document.getElementById('escheck').checked;
    var esfactura = "";
    var nit = "";
    var razon = "";
    if(eschecked == true){
        esfactura = "si";
        var nit   = document.getElementById('nit').value;
        var razon = document.getElementById('razon').value;
    }else{ esfactura = "no"; }
    var estudiante_id = document.getElementById('estudiante_id').value;
    var paralelo_id = document.getElementById('paralelo_id').value;
    var nivel_id = document.getElementById('nivel_id').value;
    var turno_id = document.getElementById('turno_id').value;
    var inscripcion_fechainicio = document.getElementById('inscripcion_fechainicio').value;
    var carrera_id = document.getElementById('carrera_id').value;
    var inscripcion_glosa = document.getElementById('inscripcion_glosa').value;
    
    var inscripcion_matricula = document.getElementById('carrera_matricula').value;
    var inscripcion_mensualidad = document.getElementById('carrera_mensualidad').value;
    var carrera_nummeses = document.getElementById('carrera_nummeses').value;
    var pagar_matricula = document.getElementById('pagar_matricula').value;
    var pagar_mensualidad = document.getElementById('pagar_mensualidad').value;
    var total = document.getElementById('total').value;
    var total_final = document.getElementById('total_final').value;
    var descuento = document.getElementById('descuento').value;
    var efectivo  = document.getElementById('efectivo').value;
    var cambio    = document.getElementById('cambio').value;

    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/registrar_inscripcion";
    var materias = document.getElementsByName('mat');
    
    var ban = 0;
    var men = "ERROR: ";
    
    if (estudiante_id<=0) { ban = 1; men = men + "Debe seleccionar un estudiante \n"; }
    if (carrera_id<=0) { ban = 1; men = men + "Debe seleccionar la carrera \n"; }
    if (turno_id<=0) { ban = 1; men = men + "Debe seleccionar un turno \n"; }
    if (nivel_id<=0) { ban = 1; men = men + "Debe seleccionar un nivel \n"; }
    if (paralelo_id<=0) { ban = 1; men = men + "Debe seleccionar un paralelo \n"; }

    if (ban==0){
        $.ajax({
            url:controlador,
            type:"POST",
            data:{estudiante_id:estudiante_id, paralelo_id:paralelo_id, nivel_id:nivel_id, 
                    turno_id:turno_id,inscripcion_fechainicio:inscripcion_fechainicio, 
                    carrera_id:carrera_id, inscripcion_glosa:inscripcion_glosa,inscripcion_matricula:inscripcion_matricula,
                    inscripcion_mensualidad:inscripcion_mensualidad,carrera_nummeses:carrera_nummeses,
                    pagar_matricula:pagar_matricula, pagar_mensualidad:pagar_mensualidad, esfactura:esfactura,
                    total:total, total_final:total_final, nit:nit, razon:razon, descuento:descuento,
                    efectivo:efectivo, cambio:cambio
                },
            success:function(respuesta){
                var kardexacad_id =  JSON.parse(respuesta);
                /*alert($('input:checkbox[name=mat]:checked').val());
                alert(materias.length+"BB");*/
                $("input:checkbox:checked").each(
                    function() {
                        var thismateria_id = $(this).val();
                        if(thismateria_id >0){
                            var thisgrupo_id = 0;
                            registrar_materiagrupo(kardexacad_id[0], thismateria_id, thisgrupo_id);
                        }
                    }
                );
                
                /*
                for(i=0; i<materias.length; i++){
                    if (materias[i].checked){
                        var thismateria_id = materias[i].value;
                        var thisgrupo_id = 0; //document.getElementById('selgrupo'+thismateria_id).value;
                        //if(thisgrupo_id >0){
                            registrar_materiagrupo(kardexacad_id[0], thismateria_id, thisgrupo_id);
                        //}
                        //res = materias[i].value;
                       //cons += cons + ""
                    }
                }*/
                alert("Inscripción realizada con éxito");
                //$("#boton_imprimir").click();
                location.href = base_url+"inscripcion/inscribir/0";
                if(kardexacad_id[1] > 0){
                    window.open( base_url+"factura/factura_carta_id/"+kardexacad_id[1], "_blank");
                }else{
                    window.open( base_url+"inscripcion/ultima_inscripcion", "_blank");
                }
            },
            error:function(respuesta){
                alert("proceso erroneo");
            }
        }); 
    }
    else{
        alert(men);
    }
}



function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function registrar_materiagrupo(kardexacad_id, materia_id, grupo_id)
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/registrar_matasignada";
    $.ajax({url: controlador,
            type:"POST",
            data:{kardexacad_id:kardexacad_id, materia_id:materia_id, grupo_id:grupo_id},
            success:function(resul){
                var registros =  JSON.parse(resul);
               if (registros == "ok"){
                   
               }else{
                   
               }
                
        },
        error:function(resul){
           alert("Algo salio mal...!!!");
        }
        
    });   

}
function ultimatransaccion(){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/ultimatransaccion";
    $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(resul){
                var registros =  JSON.parse(resul);
                if (registros != null){
                    var tipoimpresion = "";
                    html = "";
                    if(registros['numfactura'] > 0){
                        tipoimpresion = "factura/imprimir_factura_id/"+registros['numfactura'];
                    }else if(registros['inscripcion_id'] > 0){
                        tipoimpresion = "inscripcion/boleta_inscripcion/"+registros['inscripcion_id'];
                    }
                    html += "<a href='"+base_url+tipoimpresion+"' target='_blank' class='btn btn-warning btn-block' id='boton_imprimir'>";
                    html += "<i class='fa fa-print'></i> Imprimir";
                    html += "</a>";
                    $('#esultimatransaccion').html(html);
                }else{
                   
                }
                
        },
        error:function(resul){
           alert("Algo salio mal...!!!");
        }
        
    });
}

/* modifica una inscripcion */
function modificar_inscripcion(){
    var tiene_factura = document.getElementById('tiene_factura').value;
    var eschecked = document.getElementById('escheck').checked;
    var esfactura = "";
    var nit = "";
    var razon = "";
    if(eschecked == true){
        esfactura = "si";
        var nit   = document.getElementById('nit').value;
        var razon = document.getElementById('razon').value;
    }else{ esfactura = "no"; }
    var tipousuario_id = document.getElementById('tipousuario_id').value;
    var modif_kacademico = "no"
    var modif_keconomico = "no"
    if(tipousuario_id == true){
        modif_kacademico = "si"
        modif_keconomico = "si"
    }
    var inscripcion_id = document.getElementById('inscripcion_id').value;
    var kardexacad_id = document.getElementById('kardexacad_id').value;
    var kardexeco_id = document.getElementById('kardexeco_id').value;
    var estudiante_id = document.getElementById('estudiante_id').value;
    var paralelo_id = document.getElementById('paralelo_id').value;
    var nivel_id = document.getElementById('nivel_id').value;
    var turno_id = document.getElementById('turno_id').value;
    var inscripcion_fechainicio = document.getElementById('inscripcion_fechainicio').value;
    var carrera_id = document.getElementById('carrera_id').value;
    var inscripcion_glosa = document.getElementById('inscripcion_glosa').value;
    
    var inscripcion_matricula = document.getElementById('carrera_matricula').value;
    var inscripcion_mensualidad = document.getElementById('carrera_mensualidad').value;
    var carrera_nummeses = document.getElementById('carrera_nummeses').value;
    var pagar_matricula = document.getElementById('pagar_matricula').value;
    var pagar_mensualidad = document.getElementById('pagar_mensualidad').value;
    var total = document.getElementById('total').value;
    var total_final = document.getElementById('total_final').value;
    var descuento = document.getElementById('descuento').value;
    var efectivo  = document.getElementById('efectivo').value;
    var cambio    = document.getElementById('cambio').value;

    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"inscripcion/modificar_inscripcion";
    var materias = document.getElementsByName('mat');
    
    var ban = 0;
    var men = "ERROR: ";
    
    if (estudiante_id<=0) { ban = 1; men = men + "Debe seleccionar un estudiante \n"; }
    if (carrera_id<=0) { ban = 1; men = men + "Debe seleccionar la carrera \n"; }
    if (turno_id<=0) { ban = 1; men = men + "Debe seleccionar un turno \n"; }
    if (nivel_id<=0) { ban = 1; men = men + "Debe seleccionar un nivel \n"; }
    if (paralelo_id<=0) { ban = 1; men = men + "Debe seleccionar un paralelo \n"; }

    if (ban==0){
        $.ajax({
            url:controlador,
            type:"POST",
            data:{inscripcion_id:inscripcion_id, kardexacad_id:kardexacad_id, kardexeco_id:kardexeco_id,
                    estudiante_id:estudiante_id, paralelo_id:paralelo_id, nivel_id:nivel_id, 
                    turno_id:turno_id,inscripcion_fechainicio:inscripcion_fechainicio, 
                    carrera_id:carrera_id, inscripcion_glosa:inscripcion_glosa,inscripcion_matricula:inscripcion_matricula,
                    inscripcion_mensualidad:inscripcion_mensualidad,carrera_nummeses:carrera_nummeses,
                    pagar_matricula:pagar_matricula, pagar_mensualidad:pagar_mensualidad, esfactura:esfactura,
                    total:total, total_final:total_final, nit:nit, razon:razon, descuento:descuento,
                    efectivo:efectivo, cambio:cambio, modif_kacademico:modif_kacademico, modif_keconomico:modif_keconomico
                },
            success:function(respuesta){
                var kardexacad_id =  JSON.parse(respuesta);
                /*alert($('input:checkbox[name=mat]:checked').val());
                alert(materias.length+"BB");*/
                if(modif_kacademico == "si"){
                    $("input:checkbox:checked").each(
                        function() {
                            var thismateria_id = $(this).val();
                            if(thismateria_id >0){
                                var thisgrupo_id = 0;
                                registrar_materiagrupo(kardexacad_id[0], thismateria_id, thisgrupo_id);
                            }
                        }
                    );
                }else{
                    
                }
        
                if(tiene_factura > 0 && kardexacad_id[1] > 0){
                    alert("Esta modificacion de inscripcion genero otra Factura\n se le recomienda anular la factura anterior\n Modificacion exitosa!!");
                }else if(tiene_factura >0){
                    alert("Esta modificacion de inscripcion tiene Factura\n se le recomienda revisar la factura\n Modificacion exitosa!!");
                }/*else if(kardexacad_id[1] > 0){
                    alert("Esta modificacion de inscripcion tiene Factura\n se le recomienda revisar la factura\n Modificacion exitosa!!");
                }*/else{
                    alert("Modificacion exitosa!!");
                }
                //alert(kardexacad_id[1]);
                /*
                for(i=0; i<materias.length; i++){
                    if (materias[i].checked){
                        var thismateria_id = materias[i].value;
                        var thisgrupo_id = 0; //document.getElementById('selgrupo'+thismateria_id).value;
                        //if(thisgrupo_id >0){
                            registrar_materiagrupo(kardexacad_id[0], thismateria_id, thisgrupo_id);
                        //}
                        //res = materias[i].value;
                       //cons += cons + ""
                    }
                }*/
                //$("#boton_imprimir").click();
                location.href = base_url+"inscripcion";
                if(kardexacad_id[1] > 0){
                //window.open( base_url+"factura/factura_carta_id/"+kardexacad_id[1], "_blank");
                    window.open( base_url+"factura/factura_carta_id/"+kardexacad_id[1], " _blank");
                }else{
                    window.open( base_url+"inscripcion/boleta_inscripcion/"+inscripcion_id, "_blank");
                }
            },
            error:function(respuesta){
                alert("proceso erroneo");
            }
        }); 
    }
    else{
        alert(men);
    }
}
/* generar excel */
function generarexcel_inscripcion(){
    //var base_url = document.getElementById('base_url').value;
    //var parametro = document.getElementById('parametro').value;
    //var controlador = base_url+'inscripcion/buscar_inscritos';
    var respuesta = document.getElementById('resinscripcion').value;
    var registros =  JSON.parse(respuesta);
    
    var showLabel = true;
    
    var reportitle = moment(Date.now()).format("DD/MM/YYYY H_m_s");
    //document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
               // var registros = JSON.parse(result);
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
                        row += 'CURSO' + ',';
                        row += 'NIVEL' + ',';
                        row += 'CARRERA' + ',';
                        row += 'C.I.' + ',';
                        row += 'EXT' + ',';
                        row += 'APELLIDOS' + ',';
                        row += 'NOMBRES' + ',';
                        row += 'GENERO' + ',';
                        row += 'EST. CIV.' + ',';
                        row += 'LUGAR' + ',';
                        row += 'FECHA' + ',';
                        row += 'EDAD' + ',';
                        row += 'NACIONALIDAD' + ',';
                        row += 'NOMBRE' + ',';
                        row += 'DISTRITO' + ',';
                        row += 'NOM. APODERADO' + ',';
                        row += 'PARENTESCO' + ',';
                        row += 'DIRECCION DOMICILIO' + ',';
                        row += 'FIJO' + ',';
                        row += 'CELULAR' + ',';
                        row += 'N° RECIBO' + ',';
                        row += 'TURNO' + ',';
                        row += 'PLAN DE ESTUDIOS' + ',';
                           
                        row = row.slice(0, -1);

                        //append Label row with line break
                        CSV += row + '\r\n';
                    }
                    var j = 0;
                    //1st loop is to extract each row
                    for (var i = 0; i < tam; i++) {
                        if(registros[i]["estado_idinsc"] == 1){
                        var row = "";
                        //2nd loop will extract each column and convert it in string comma-seprated
                        
                            row += (j+1)+',';
                            row += '"' +registros[i]["nivel_descripcion"]+ '",';
                            row += '"' +registros[i]["carrera_nivel"]+ '",';
                            row += '"' +registros[i]["carrera_nombre"]+ '",';
                            row += '"' +registros[i]["estudiante_ci"]+ '",';
                            row += '"' +registros[i]["estudiante_extci"]+ '",';
                            row += '"' +registros[i]["estudiante_apellidos"]+ '",';
                            row += '"' +registros[i]["estudiante_nombre"]+ '",';
                            row += '"' +registros[i]["genero_nombre"]+ '",';
                            row += '"' +registros[i]["estadocivil_descripcion"]+ '",';
                            row += '"' +registros[i]["estudiante_lugarnac"]+ '",';
                            row += '"' +registros[i]["estudiante_fechanac"]+ '",';
                            var hoy = new Date();
                            var cumpleanos = new Date(registros[i]["estudiante_fechanac"]);
                            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                            var m = hoy.getMonth() - cumpleanos.getMonth();
                            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                                edad--;
                            }
                            row += '"' +edad+ '",';
                            row += '"' +registros[i]["estudiante_nacionalidad"]+ '",';
                            row += '"' +registros[i]["estudiante_establecimiento"]+ '",';
                            row += '"' +registros[i]["estudiante_distrito"]+ '",';
                            row += '"' +registros[i]["estudiante_apoderado"]+ '",';
                            row += '"' +registros[i]["estudiante_apoparentesco"]+ '",';
                            row += '"' +registros[i]["estudiante_direccion"]+ '",';
                            row += '"' +registros[i]["estudiante_telefono"]+ '",';
                            row += '"' +registros[i]["estudiante_celular"]+ '",';
                            row += '"00' +registros[i]["inscripcion_id"]+ '",';
                            row += '"' +registros[i]["turno_nombre"]+ '",';
                            row += '"' +registros[i]["planacad_nombre"]+ '",';
                            
                        row.slice(0, row.length - 1);

                        //add a line break after each row
                        CSV += row + '\r\n';
                        j++;
                        }
                    }
                    
                    if (CSV == '') {        
                        alert("Invalid data");
                        return;
                    }
                    
                    //Generate a file name
                    var fileName = "Inscripcion_";
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
                   
                   
       
}
