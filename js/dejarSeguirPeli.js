function noSeguirPeli(id){
    $.get("../model/dejarSeguirPeli.php?id="+id, function(data) {

    	$('#fila_'+id).remove();     
        
    });
}
