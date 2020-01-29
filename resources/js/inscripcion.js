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
                    $("#inscripcion_fechainicio").val(registros[0].carrera_fechainicio);                
                
                        $("#pagar_mensualidad").empty();
                    for (j = Number(registros[0].carrera_nummeses); j>=1 ; j--){
                        $("#pagar_mensualidad").prepend("<option  value="+j+">"+j+" CUOTA/MES");
                    }
                        $("#pagar_mensualidad").prepend("<option  value="+0+">- NINGUNA -");
                        $("#pagar_mensualidad").val(0) ;
                          
                    var mensualidades = document.getElementById('pagar_mensualidad').value;
                    
                    $("#total_final").val((Number(registros[0].carrera_matricula) + Number(registros[0].carrera_mensualidad * mensualidades)).toFixed(2));
                    $("#efectivo").val((Number(registros[0].carrera_matricula) + Number(registros[0].carrera_mensualidad * mensualidades)).toFixed(2));

                    
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
            data:{carrera_id:carrera_id},
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
        $.ajax({
            url:controlador,
            type:"POST",
            data:{nivel_id:nivel_id},
            success:function(respuesta){
                html = " ";
                
                var registros = JSON.parse(respuesta);
                if (registros != null){
                   
                    for (j = 0; j<Number(registros.length) ; j++){
                        html += "<tr>";
                        html += "<td style='padding: 0;'>"+(j+1)+"</td>";
                        html += "<td style='padding: 0;'>"+registros[j]["materia_nombre"];
                        if(registros[j]["materia_nombre"] != registros[j]["materia_alias"]){
                            html += "<span class='text-bold text-center' style='font-size: 8px'>";
                            html += "<br>"+registros[j]["materia_alias"];
                            html += "</span>";
                        }
                        html += "</td>";
                        html += "<td style='padding: 0;'>"+registros[j].materia_codigo+"</td>";
                        html += "<td style='padding: 0;'>";
                        processData(registros[j]["materia_id"]);
                        html += "<div id='mostrargrupo"+registros[j]['materia_id']+"'>";
                        /* html += "<select >";
                        html += "<option value='0'>- GRUPO -</option>";
                        html += "<option value='1'>Grupo 1</option>";
                        
                        html += "</select>*/;
                        html += "</div>";
                        html += "</td>";
                        html += "<td align='center' style='padding: 0;'><input type='checkbox' name='mat' id='materias' value='"+registros[j].materia_id+"' checked/></td>";
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
    
    $("#total_final").val(Number(calculo_total).toFixed(2));
    
    var total_final = document.getElementById('total_final').value;
    
    var descuento = document.getElementById('descuento').value;
    
//    var efectivo = document.getElementById('efectivo').value;
    var efectivo = total_final - descuento;
    $("#efectivo").val(Number(efectivo).toFixed(2));
    
    var cambio = document.getElementById('cambio').value;
    
    
    cambio = efectivo - (total_final - descuento);
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
    var total_final = document.getElementById('total_final').value;
    var descuento = document.getElementById('descuento').value;

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
                    total_final:total_final, nit:nit, razon:razon, descuento:descuento
                },
            success:function(respuesta){
                var kardexacad_id =  JSON.parse(respuesta);
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
                }
                $("#boton_imprimir").click();
                location.href = base_url+"inscripcion/inscribir/0";
                if(kardexacad_id[1] > 0){
                    window.open( base_url+"factura/factura_carta_id/"+kardexacad_id[1], "_blank");
                }else{
                    alert("Inscripcion realizada con éxito..!!");
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

function buscar_inscripciones()
{
//    var base_url    = document.getElementById('base_url').value;
    var opcion      = document.getElementById('select_inscripcion').value;
 
    
    if (opcion == 1)
    {
        filtro = " and v.venta_fecha = date(now())";
        mostrar_ocultar_buscador("ocultar");
        
        
    }//pedidos de hoy
    
    if (opcion == 2)
    {
        filtro = " and v.venta_fecha = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
    }//pedidos de ayer
    
    if (opcion == 3) 
    {
        filtro = " and v.venta_fecha >= date_add(date(now()), INTERVAL -1 WEEK)";//pedidos de la semana
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

    tabla_ventas(filtro);
    //tabla_pedidos(filtro);
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

async function processData(materia_id) {
  try {
    const result = await mostrargrupo(materia_id);
    //alert(result);
    $('#mostrargrupo'+materia_id).html(result);
    //console.log(result);
    return "";
  } catch (err) {
    return console.log(err.message);
  }
}
function mostrargrupo(materia_id){
    const promise = new Promise(function (resolve, reject) {
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'inscripcion/getname_grupo/';
    $.ajax({url: controlador,
           type:"POST",
           data:{materia_id:materia_id},
           success:function(respuesta){
               var res = "";
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    res += "<select id='selgrupo"+materia_id+"' name='selgrupo"+materia_id+"'>";
                    res += "<option value='0'>- GRUPO -</option>";
                    for (var i = 0; i < n ; i++){
                        
                        res += "<option value='"+registros[i]['grupo_id']+"'>"+registros[i]['grupo_nombre']+"</option>";
                    }
                    res += "</select>";
               }
               resolve(res);
        },
        error:function(error){
            reject(error);
        }
        
    });
    });
  
  return promise;
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
