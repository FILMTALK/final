function eliminar(id){

    $.get("../model/borrarPeli.php?id="+id, function(data) {

    	$('#fila_'+id).remove();        
        
    });
}