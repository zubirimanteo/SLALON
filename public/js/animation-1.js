
$(document).ready(function(){
    //tabla editable y exportar datos en json
    var $TABLE = $('#table');
     
    $('#editar-btn').click(function() {
     
     $('.edit').attr('contenteditable','true');
     
    });
    
    $('#table-add').click(function () {
      var $clone = $TABLE.find('.hide').clone(true).removeClass('hide');
      $TABLE.find('.clonado').after($clone);
    });
    
    $('.table-remove').click(function () {
      $(this).parents('li').detach();
    });
   
    $('.scrollsp').on('scrollSpy:enter', function() {//when scrolling and element showing in window
    $(this).toggle();
    });
    
    // $('.scrollsp').on('scrollSpy:exit', function() {//when scrolling and element exit at window
    //     $(this).fadeOut();
    // });
    
    $('.scrollsp').scrollSpy();
  
  
});



