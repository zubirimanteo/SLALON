
$( document ).ready(function(){
    $('.parallax').parallax();
    $(".button-collapse").sideNav();//haburguer menu
    $('.modal').modal();
    $('.materialboxed').materialbox();
    $(".dropdown-button").dropdown();
    $('#clasi').click(function(){
        $('#clasificacion').fadeToggle("slow");
    });
    $('#time').click(function(){
        $('#tiempo').fadeIn("slow");
    });
    $('#penal').click(function(){
        $('#penalizacion').fadeIn("slow");
    });
    $('#fail').click(function(){
        $('#faltas').fadeIn("slow");
    });
});

