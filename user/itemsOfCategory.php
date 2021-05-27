<?php
session_start();
$page_title="home user";
include "init.php";

if(isset($_SESSION['name'])  && isset($_GET['id']) )
{
    $page_no=$_GET['page_no'];
    $id_cat=$_GET['id'];


    $statement=$conn->prepare("SELECT * FROM items  WHERE category_id =?");
    $statement->execute(array($id_cat));
    $count_items = $statement->rowCount(); 
    $no_pages=ceil($count_items/10);
    $offset=($page_no-1)*10;


    $statement=$conn->prepare("SELECT  *  FROM items WHERE category_id =?  LIMIT 10 OFFSET $offset");
        $statement->execute(array($id_cat));
        $row=$statement->fetchAll();

    ?>
     <nav aria-label="Page navigation example mt-10px">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($page_no==1) echo "disabled"; ?>  ">
                      <a class="page-link" href="?id=<?php echo($id_cat);?>&page_no=<?php echo $page_no-1 ;?>">Previous</a>
                    </li>
                     <?php
                     for($i=0;$i<$no_pages;$i++)
                     {?>
                     <li class="page-item"><a class="page-link" href="?id=<?php echo($id_cat);?>&page_no=<?php echo $i+1 ;?> "><?php echo $i+1; ?></a></li>
                     <?php } ?>
                     
                     
                   
                    <li class="page-item  <?php if($page_no==$no_pages) echo "disabled";?>  ">
                      <a class="page-link" href="?id=<?php echo($id_cat);?>&page_no=<?php echo $page_no+1 ;?>">Next</a>
                    </li>
                </ul>
            </nav>
      <section class="section_items_page  ">
            
            <div class="h1">add item to car</div>
             
      </section>

      <div class="all_items">
          <div class="row d-flex flex-row align-items-center justify-content-around flex-wrap">
          
           <?php
           foreach($row as $r)
           {?>
            <div class="   col-sm-3 item_of_cat d-flex flex-column ">
             
            <div class="for_image">
                <img src="..\admin\layout\images\<?php echo($r['image']);?>" alt="">
            </div>
           <div>
               <h4><?php echo($r['name']);?></h4>
                <p class=""><span class="badge badge-success">info </span> : <?php echo($r['description']);?></p>
                <p class="  price_div"> <span class="badge badge-secondary">price</span> : <span class="price<?php echo($r['id']);?>"><?php echo($r['price']);?></apsn></p>
                <input class="form-control num_item<?php echo $r['id']; ?>" type="number" value="1" min="1">
           </div>
           <div class="btn btn_car" id="<?php echo($r['id']);?>"><i class="fas fa-cart-plus" aria-hidden="true"></i>add to car</div>
        </div>
        <?php
           }
           ?>  
          </div>
      </div>
      
      <?php
}
else
{
    ?><script type="text/javascript">goto("dashbord.php");</script><?php
  
}