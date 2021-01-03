 $(window).ready(function(){
   
    
    if (document.readyState === 'complete'||document.readyState==='interactive') {
        
        $(".loading").fadeOut(1500,function(){

            $(".loading").remove();
            $("body").css("overflow","auto");
             
        });
        
       
    
      }
     
   
});
function goto(location)
{
     
     window.location = location; 
    
                   
}

