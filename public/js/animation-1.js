
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
    $(window).on('scroll', function() {
    var y_scroll_pos = window.pageYOffset;
    var scroll_pos_test = 150;             // set to whatever you want it to be

    if(y_scroll_pos > scroll_pos_test) {
        //do stuff
    }
});
  
  
});



