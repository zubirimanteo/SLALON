
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
   
  document.getElementById("myVideo").width=document.body.offsetWidth;
  document.getElementById("myVideo").height=document.body.offsetheight;
  
  
});



