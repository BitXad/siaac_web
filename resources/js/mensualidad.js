function facturar(mensualidad){
	 
     var factu = document.getElementById('factura'+mensualidad).checked;
                      
     if (factu==true){
      document.getElementById('clinit'+mensualidad).style.display = 'block';
    }else{
      document.getElementById('clinit'+mensualidad).style.display = 'none';
    }            	
                       
        
}