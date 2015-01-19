$(function() {
    $('.images')
    .mouseenter(function() {
        $('.img2').fadeOut('fast');
    })
    .mouseleave(function() {
        $('.img2').fadeIn('fast');
    });  
});