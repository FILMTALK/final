function eliminar(id){

    $.get("../model/borrarUser.php?id="+id, function(data) {

        $('#fila_'+id).remove();

    });
}