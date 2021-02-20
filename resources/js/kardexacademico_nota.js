function cargarnotas(registro){
    $('#nombrede_materia').html(registro.materiaasig_nombre);
    var html = "";
    if(registro.materia_numareas > 0 || registro.materia_numareas != null){
        for (var i = 0; i < registro.materia_numareas; i++) {
            var numnota = i+1;
            html += "<div class='col-md-6'>";
            html += "<label for='nota"+numnota+"' class='control-label'>Nota "+numnota+"</label>";
            html += "<div class='form-group'>";
            html += "<input type='number' name='nota_pond"+numnota+"_mat' value='"+registro['nota_pond'+numnota+'_mat']+"' class='form-control' id='nota_pond"+numnota+"_mat' />";
            html += "</div>";
            html += "</div>";
        }
        $('#nota_id').val(registro.nota_id);
        $('#materia_numareas').val(registro.materia_numareas);
    }
    
    $('#tablaresultados').html(html);
    $('#modalmodificarnota').modal('show');
}
/* Funcion que MODIFICA las notas de una materia, de un determinado estudiante */
function guardarmodificacion(){
    var materia_numareas = document.getElementById('materia_numareas').value;
    var nota_id = document.getElementById('nota_id').value;
    if(nota_id == 0 || nota_id == "" || nota_id == null){
        alert("No hay notas para esta materia");
    }else{
        if(materia_numareas == 0 || materia_numareas == "" || materia_numareas == null){
            alert("No hay limite de notas para esta materia");
        }else{
            var lasnotas = [];
            for (var i = 0; i < materia_numareas; i++) {
                var numnota = i+1;
                lasnotas.push($("#nota_pond"+numnota+"_mat").val());
                //nota_pond+numnota = $("#nota_pond"+numnota+"_mat").val();
                //eval("var nota_pond"+numnota+"_mat = "+$("#nota_pond"+numnota+"_mat").val());
                //alert(nota_pond3_mat);
            }
            var base_url = document.getElementById('base_url').value;
            var controlador = base_url+"kardex_academico/modificar_notas/";
            $.ajax({url: controlador,
                type:"POST",
                data:{materia_numareas:materia_numareas, lasnotas:lasnotas, nota_id:nota_id},
                success:function(respuesta){
                    if(respuesta != null){
                        location.reload();
                    }else{
                        alert("posiblemente no tenga permisos de modificación, consulte con su administrador!.");
                    }
                },
                error: function(respuesta){
                }
            });
        }
    }
}

function generarnotas(registro){
    $('#nombrede_materiagen').html(registro.materiaasig_nombre);
    var html = "";
    if(registro.materia_numareas > 0 || registro.materia_numareas != null){
        for (var i = 0; i < registro.materia_numareas; i++) {
            var numnota = i+1;
            html += "<div class='col-md-6'>";
            html += "<label for='nota"+numnota+"' class='control-label'>Nota "+numnota+"</label>";
            html += "<div class='form-group'>";
            html += "<input type='number' name='nota_pond"+numnota+"_mat' value='0' class='form-control' id='nota_pond"+numnota+"_mat' />";
            html += "</div>";
            html += "</div>";
        }
        $('#materiaasig_id').val(registro.materiaasig_id);
        $('#materia_numareasgen').val(registro.materia_numareas);
    }
    
    $('#tablaresultadosgen').html(html);
    $('#modalgenerarnotas').modal('show');
}

/* Funcion que REGISTRA las notas de una materia, de un determinado estudiante */
function registrar_nuevasnotas(){
    var materia_numareas = document.getElementById('materia_numareasgen').value;
    var materiaasig_id = document.getElementById('materiaasig_id').value;
    if(materia_numareas == 0 || materia_numareas == "" || materia_numareas == null){
        alert("No hay limite de notas para esta materia");
    }else{
        var lasnotas = [];
        for (var i = 0; i < materia_numareas; i++) {
            var numnota = i+1;
            lasnotas.push($("#nota_pond"+numnota+"_mat").val());
        }
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+"kardex_academico/generar_notas/";
        $.ajax({url: controlador,
            type:"POST",
            data:{materia_numareas:materia_numareas, lasnotas:lasnotas, materiaasig_id:materiaasig_id},
            success:function(respuesta){
                if(respuesta != null){
                    location.reload();
                }else{
                    alert("posiblemente no tenga permisos de generar notas, consulte con su administrador!.");
                }
            },
            error: function(respuesta){
            }
        });
    }
}