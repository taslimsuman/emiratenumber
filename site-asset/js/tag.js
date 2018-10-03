$(function(){

    $('a.inliner').on('click',function(){
    

    var content= $(this).text();

    var cma = '';

    
    var old = $('#hashtag').val();


    if(old){
        cma = ', ';
    }

    $('#hashtag').val(old+cma+content);
    
      });

   



});