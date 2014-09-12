$(document).ready( function(){

    $("#image-cycle").carousel();

    $(".dropdown-hover, .dropdown-menu").hover( function(){      
        $(this).parent().attr('class', 'dropdown open');
    }, function(){
        $(this).parent().attr('class', 'dropdown');
    })

});