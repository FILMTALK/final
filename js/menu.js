$(document).ready(function(){
    //Obtenemos el link que contenga el id pull
    var pull=$('#pull');
    //Obtenemos todos las etiquetas ul que contenga la etiqueta nav
    var menu=$('ul');
    var html=$('html');
    //Guardamos la altura del menú en una variable
    var menuHeight=menu.height();
    //Cuando haga clic en el link, realizaremos una función con pasando un parámetro
    $(pull).on('click', function(e) {

        e.preventDefault();
        menu.slideToggle();

    }); //Cierre del método on

    //Cuando la ventana se hace más pequeño, se realiza la siguiente función
    $(window).resize(function(){
      //Gaurdamos en una variable el width de la ventana de forma local
      var w=$(window).width();
      //Si la anchura es mayor que 700px, el slider debe aparecer
      if(w>700) {
        //Eliminamos el atributo style del menú
        menu.removeAttr('style');     
      }
    //Cierre de la función resize
    });    
//Cierre de la función general    
});