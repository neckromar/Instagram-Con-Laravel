var url="http://instagram-parecido-laravel.com.devel";

window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    //boton de likes

    function like(){
        $('.btn-like').unbind('click').click(function () {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/img/corazonrojo.png');
            
            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type:'GET',
                success: function(response){
                    if(response.like)
                    {
                         console.log('Has dado like ');
                    }else{
                        console.log('Error al dar like ');
                    }
                   
                }
                
            });
            
            
            dislike();
        });
        
    }

    like();


    //boton de dislikes

    function dislike(){
        $('.btn-dislike').unbind('click').click(function () {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/img/corazongris.png');
            
             $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type:'GET',
                success: function(response){
                    if(response.like)
                    {
                         console.log('Has dado dislike ');
                    }else{
                        console.log('Error al dar dislike ');
                    }
                   
                }
                
            });
            
            
            like();
        });
    }
    dislike();
    
    
    //buscador
    $('#buscador').submit(function(){
        
       $(this).attr('action',url+'/usuarios/'+$('#buscador #search').val());
       
    });
});

