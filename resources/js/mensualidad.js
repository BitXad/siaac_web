function mostrarmodalpagar(mensualidad){
    
    var base_url = document.getElementById('base_url').value;
    var kardex_economico = JSON.parse(document.getElementById('elkardex_economico').value);
    
    $("#mes_mensualidad").html(mensualidad["mensualidad_mes"]);
    $("#mes_montototal").html(mensualidad["mensualidad_montototal"]);
    var la_factura = "<input type='checkbox' name='factura"+mensualidad["mensualidad_id"]+"' id='factura"+mensualidad["mensualidad_id"]+"' onclick='facturar("+mensualidad["mensualidad_id"]+")' />";
    $("#lafactura").html(la_factura);
    $("#mensualidad_id").val(mensualidad["mensualidad_id"]);
    
    var eldescuento = "<input type='number' onkeyup='descontar("+mensualidad["mensualidad_id"]+")' name='mensualidad_descuento' value='"+Number(mensualidad["mensualidad_descuento"])+"' min='0' step='any' class='form-control' id='mensualidad_descuento"+mensualidad["mensualidad_id"]+"' />";
    $("#eldescuento").html(eldescuento);
    
    var lamulta = "<input type='text' name='mensualidad_multa' value='"+Number(mensualidad["mensualidad_multa"]).toFixed(2)+"' class='form-control' id='mensualidad_multa"+mensualidad["mensualidad_id"]+"' readonly/>";
    $("#lamulta").html(lamulta);
    var elmontocancelado = "<input type='number' step='any' onkeyup='calcular("+mensualidad["mensualidad_id"]+")' name='mensualidad_montocancelado' value='"+Number(Number(mensualidad["mensualidad_montoparcial"])+Number(mensualidad["mensualidad_multa"]) - Number(mensualidad["mensualidad_descuento"])).toFixed(2)+"' class='form-control' id='mensualidad_montocancelado"+mensualidad["mensualidad_id"]+"' min='0'/>";
    $("#elmontocancelado").html(elmontocancelado);
    var lamensualidad_montototal = "<input type='hidden' name='mensualidad_montototal' value='"+Number(Number(mensualidad["mensualidad_montoparcial"])+Number(mensualidad["mensualidad_multa"])).toFixed(2)+"' class='form-control' id='mensualidad_montototal"+mensualidad["mensualidad_id"]+"' />";
    $("#lamensualidad_montototal").html(lamensualidad_montototal);
    $("#kardexeco_id").val(mensualidad["kardexeco_id"]);
    var lamensualidadsaldo = "<input type='text' step='any' name='mensualidad_saldo' value='0.00' class='form-control' id='mensualidad_saldo"+mensualidad["mensualidad_id"]+"' readonly />";
    $("#lamensualidadsaldo").html(lamensualidadsaldo);
    $("#mensualidad_numero").val(mensualidad["mensualidad_numero"]);
    $("#mensualidad_fechalimite").val(mensualidad["mensualidad_fechalimite"]);
    $("#mensualidad_fecha").val(moment($.now()).format("YYYY-MM-DD"));
    $("#mensualidad_hora").val(moment($.now()).format("HH:mm:ss"));
    $("#mensualidad_ci").val(kardex_economico[0]['estudiante_nit']);
    $("#mensualidad_nombre").val(kardex_economico[0]['estudiante_razon']);
    document.getElementById("mensualidad_ci").required = false;
    document.getElementById("mensualidad_nombre").required = false;
    var lamensualidadmes = "<input type='hidden' name='mensualidad_mes' value='"+mensualidad["mensualidad_mes"]+"' class=form-control id=mensualidad_mes"+mensualidad["mensualidad_id"]+"' />";
    $("#lamensualidadmes").html(lamensualidadmes);
    var eldetallefactura = "<textarea class='form-control' type='text' rows='2' name='factura_detalle"+mensualidad["mensualidad_id"]+"' id='factura_detalle"+mensualidad["mensualidad_id"]+"'>";
    eldetallefactura += "MENSUALIDAD No. "+mensualidad["mensualidad_numero"]+","+mensualidad["mensualidad_mes"]+","+kardex_economico[0]["carrera_nombre"]+", "+kardex_economico[0]["estudiante_nombre"]+" "+kardex_economico[0]["estudiante_apellidos"];
    eldetallefactura += "</textarea>";
    $("#eldetallefactura").html(eldetallefactura);
    
    //$('form').get(0).setAttribute('action',  base_url+'mensualidad/pagar/'+mensualidad["mensualidad_id"]);

    document.getElementById('saldar1').setAttribute('action', base_url+'mensualidad/pagar/'+mensualidad["mensualidad_id"])
    //formulario.setAttribute('action', 'ventas/registrar_venta')
    $("#pagar").modal('show');
}

function facturar(mensualidad){
    
    var factu = document.getElementById('factura'+mensualidad).checked;
    if (factu==true){
       document.getElementById('clinit').style.display = 'block';
        document.getElementById("mensualidad_ci").required = true;
        document.getElementById("mensualidad_nombre").required = true;
        //$("#mensualidad_ci").attr('required', 'required');
    }else{
        document.getElementById('clinit').style.display = 'none';
        document.getElementById("mensualidad_ci").required = false;
        document.getElementById("mensualidad_nombre").required = false;
        //$("#mensualidad_ci").removeAttr('required');
    }
    
}

function descontar(mensualidad_id){
    var montototal = Number(document.getElementById('mensualidad_montototal'+mensualidad_id).value);
    var descuento = Number(document.getElementById('mensualidad_descuento'+mensualidad_id).value);
    $('#mensualidad_montocancelado'+mensualidad_id).val(montototal-descuento);	
}

function calcular(mensualidad_id){
    var montototal = Number(document.getElementById('mensualidad_montototal'+mensualidad_id).value);
    var montocancelado = Number(document.getElementById('mensualidad_montocancelado'+mensualidad_id).value);
    var descuento = Number(document.getElementById('mensualidad_descuento'+mensualidad_id).value);
    $('#mensualidad_saldo'+mensualidad_id).val(montototal-montocancelado-descuento);
}
