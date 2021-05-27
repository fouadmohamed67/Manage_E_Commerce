 

$(document).ready(function(){
 
    function count_cart_shop()
    {
        $.ajax({
            url:"get_count_cart.php",
            method:"POST",
            success:function(data)
            {
                $(".cart_shop").html(data);
            }
        });
    }
    count_cart_shop(); 
    $(document).on('click','.btn_car',function(){
        
        var item_id=$(this).attr("id");
        var num_item=$(".num_item"+item_id+"").val();
        var price=$(".price"+item_id+"").html();
         
    
         $.ajax({
            type:"POST",
            url:"addToCar.php", 
            data:{id:item_id,quntity:num_item,price:price},
            success:function(data)
            {
                alert("one item added");
                 count_cart_shop();
            }
        });
    });
  });