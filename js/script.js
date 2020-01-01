$('document').ready(function() {
        
        onButtonClick();
        
        $('#search_input').keyup(function(e){
            e.preventDefault();           
           
            var q = $(this).val();//$('#search_input').val();
            
            send_ajax(q, $('#dep_time').val());
        })   
         
        
          $('#dep_time').change(function(e){              
              send_ajax($('#search_input').val(), $('#dep_time').val());              
          });
        
        $('#search-form').on('click',function(e){
           $('#show-data').empty();
           e.preventDefault();
           onButtonClick();
        });
        
        
        function onButtonClick(){
             
                $.getJSON("data.json", function(data){
                    var loaded_data = '';
                    $.each(data, function(key, value){
                        loaded_data += value.dep_time + ' ' + value.dest + ' (przez: '+ value.via1 +', '+ value.via2+ ')' + '<br>';

                    });
                    $('#show-data').append(loaded_data);

                });
            }
    
    
    function send_ajax(a,b)
    {
        if (a!='' && b!='') obj={q:a,t:b};
        else if (a!=''&& b=='') obj={q:a};
        else if (b!=''&& a=='') obj={t:b};
        
        console.log(obj);
            
         $.ajax({
                    url: "search.php",
                    method: "POST",                    
                    data: obj,
                    //cache: false, 
                   beforeSent: onButtonClick(),
                     success: function(obj){
                            $('#show-data').fadeIn();
                            $('#show-data').html(obj);
                                                  
                    }                                
                })
    }
        
        
}); 
    
      
      