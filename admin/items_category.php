<?php 
session_start();
$page_title='categories page';
include 'init.php';
if(isset($_SESSION['name']) && $_SESSION['role']==1)
{
    
    $do=isset($_GET['do'])?$_GET['do']:"";
    if($do=="show_items")
    {
        $cat_id=$_GET['id'];
         
    }
    $statement=$conn->prepare("SELECT * from items WHERE category_id= $cat_id ");
    $statement->execute();
    $rows_of_items=$statement->fetchAll();

    $statement=$conn->prepare("SELECT * from categories WHERE id= $cat_id ");
    $statement->execute();
    $my_category=$statement->fetch();


    ?>

                <div class="loading"> 
                      <div class="o1"></div>
                      <div class="o2"></div>
                    </div> 
                 </div>



    <div class="container">
      <div class="justify-content-center row-counter row">
       <div class="col-md-12">
       <div class="card ">
        <div class="card-header bg-dark text-white text-center">
         items of <?php echo $my_category['name']; ?>
        </div>
        <div class="card-body  d-flex flex-row justify-content-center flex-wrap">
        
         <?php 
          foreach($rows_of_items as $item)
          {
              ?>
              <div class="item_cat h4">
                         <div class="h4"><?php echo $item['name']; ?></div>
                         <div class="h6"><?php echo $item['description']; ?></div>
                         <div   class="h4 price_item"><?php echo $item['price']; ?>$</div>
                         <div class="h4"><?php echo $item['date']; ?></div>
                           <form method="POST" action="items.php?do=edit&id=<?php echo $item['id'] ?>">
                                  <button class="btn btn-primary btn-sm">edit</button>
                           </form>
                           <form method="POST" action="items.php?do=delete&id=<?php echo $item['id'] ?>">
                               <button class="btn btn-danger btn-sm">delete</button>
                            </form> 
                
                
              </div>
                               
              <?php
          }
         ?>
        
        </div>
       </div>
       </div>
      </div>
    </div>
    <?php
    include $footer;
}
else if($_SESSION['role']==0)
{
    ?><script type="text/javascript">goto("../user/dashbord.php.php");</script><?php

    
}
else
{
    ?><script type="text/javascript">goto("index.php");</script><?php

    
}