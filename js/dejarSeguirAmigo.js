function noSeguirAmigo(id){
    $.get("../model/borrarAmigo.php?id="+id, function(data) {

    	$('#fila_'+id).remove();     
        
    });
}
