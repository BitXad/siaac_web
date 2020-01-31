function facturar(mensualidad){
	 
     var factu = document.getElementById('factura'+mensualidad).checked;
                      
     if (factu==true){
      document.getElementById('clinit'+mensualidad).style.display = 'block';
    }else{
      document.getElementById('clinit'+mensualidad).style.display = 'none';
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
