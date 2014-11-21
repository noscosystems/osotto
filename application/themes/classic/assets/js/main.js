$(document).ready( function(){

    $.material.init();

    $("#image-cycle").carousel();

    $(".dropdown-hover, .dropdown-menu").hover( function(){      
        $(this).parent().attr('class', 'dropdown open');
    }, function(){
        $(this).parent().attr('class', 'dropdown');
    })

});