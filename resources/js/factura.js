/**
 * Comment
 */
function mostrar_facturas() {
    var base_url = document.getElementById('base_url').value;
    var desde = document.getElementById('fecha_desde').value;
    var hasta = document.getElementById('fecha_desde').value; 
    
    $.ajax({url:controlador,
            type:"POST",
            data:{desde:desde, hasta:hasta},
            success:function(result){
                html += "<tr>";
                html += "<td>ESPECIFICACION<td>";
                html += "<td>N°<td>";
                html += "<td>FECHA DE LA FACTURA<td>";
                html += "<td>N° DE LA FACTURA<td>";
                html += "<td>N° DE AUTORIZACION<td>";
                html += "<td>ESTADO	NIT/CI CLIENTE<td>";
                html += "<td>NOMBRE O RAZON SOCIAL<td>";
                html += "<td>IMPORTE<td>";
                html += "<td>TOTAL DE LA VENTA<td>";
                html += "<td>IMPORTE ICE<td>";
                html += "<td>/IEHD/TASAS	EXPORTACIONES Y OPERACIONES EXENTAS<td>";	
                html += "<td>VENTAS GRAVADAS A TASA CERO<td>";	
                html += "<td>SUBTOTAL<td>";	
                html += "<td>DESCUENTOS<td>"; 
                html += "<td>BONIFICACIONES Y REBAJAS OTORGADAS<td>";	
                html += "<td>IMPORTE BASE PARA DEBITO FISCAL<td>";	
                html += "<td>DEBITO FISCAL<td>";	
                html += "<td>CODIGO DE CONTROL<td>";	
                html += "<td>TRANSACCION<td>";
                
                $("tabla_factura").html(html);
                
            },
            erro:function(result){},
                   
        
            
            })

    
}