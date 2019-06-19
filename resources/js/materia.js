 function actualizar(){
 	var base_url    = document.getElementById('base_url').value;
 	
    
            var maxima = Number($('#materia_maxima').val());
            var uno = Number($('#materia_ponderado1').val());
            var dos = Number($('#materia_ponderado2').val());
            var tres = Number($('#materia_ponderado3').val());
            var cuatro = Number($('#materia_ponderado4').val());
            var cinco = Number($('#materia_ponderado5').val());
            var seis = Number($('#materia_ponderado6').val());
            var siete = Number($('#materia_ponderado7').val());
            var total = Number(uno+dos+tres+cuatro+cinco+seis+siete);
            if (maxima == total) {
            document.all["formulario"].submit(); 
            } else{
           alert('El total de la nota no es igual que la suma de sus ponderaciones');
            }
} 

function nuevo(){
    var base_url    = document.getElementById('base_url').value;
    
    
            var maxima = Number($('#materia_maxima').val());
            var uno = Number($('#materia_ponderado1').val());
            var dos = Number($('#materia_ponderado2').val());
            var tres = Number($('#materia_ponderado3').val());
            var cuatro = Number($('#materia_ponderado4').val());
            var cinco = Number($('#materia_ponderado5').val());
            var seis = Number($('#materia_ponderado6').val());
            var siete = Number($('#materia_ponderado7').val());
            var total = Number(uno+dos+tres+cuatro+cinco+seis+siete);
            if (maxima == total) {
            document.all["formulario"].submit(); 
            } else{
           alert('El total de la nota no es igual que la suma de sus ponderaciones');
            }
} 