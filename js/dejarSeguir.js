function noSeguir(id){
    $.get("../model/dejarSeguir.php?id="+id, function(data) {

    	$('#fila_'+id).remove();     
        
    });
}
