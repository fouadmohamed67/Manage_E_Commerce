<?php 
session_start();
$page_title='dashbord';
include 'init.php';

if(isset($_SESSION['name']) &&$_SESSION['role']==1)
{
             
            $statement=$conn->prepare("SELECT * from categories ");
            $statement->execute();
            $row_of_category=$statement->fetchAll();

            $statement=$conn->prepare("SELECT 
            items.*,
            categories.name as  category_name
             from items 
             INNER JOIN categories ON categories.id=items.category_id 
             ORDER BY id DESC LIMIT 10
             ");
            $statement->execute();
            $items=$statement->fetchAll();


            
            $no_all_users=count_of_Users('users',0,$conn);
            $no_all_admins=count_of_Users('users',1,$conn);
            $no_all_categories=count_of_things('categories',$conn);
            $no_all_items=count_of_things('items',$conn);
  ?>
                 <div class="loading"> 
                      <div class="o1"></div>
                      <div class="o2"></div>
                 </div>
                  
       
                   
                 
      
    <div class="container less-mar">
            <div class="row justify-content-center row-counter">
               <div class="col-md-2  users text-center counter">
                  
                   <h3>users</h3>
                   <span><?php echo $no_all_users; ?></span>
                 </div>
   
               <div class="col-md-3   admins text-center counter">
                
                   <h3>admins</h3>
                   <span><?php echo $no_all_admins; ?></span>
                 </div>
                
               <div class="col-md-3   categories text-center counter">
                 
                   <h3>categories</h3>
                   <span><?php echo  $no_all_categories ; ?></span>
                 </div> 
               <div class="col-md-2   items text-center counter">
                   <h3>items</h3>
                   <span> <?php echo $no_all_items; ?></span>
               </div>
                
            </div>
          <div class="row">
            <div class="col-md-4">
               <div class="card">
                 <div class="card-header">all categories</div>
                 <div class="card-body in-card-body">
                   <div class="col">
                     <?php
                     if($no_all_categories <=0)
                     {
                       ?>
                            <h3>no categories</h3>
                       <?php
                     }
                     else
                     {
                      foreach($row_of_category as $category)
                      {?>
 
                          <div class="ele ">
                           <a class="cat_link" href="items_category.php?do=show_items&id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
                          </div>
                      <?php }
                     }
                     ?>
                    </div>
                 </div>
               </div>
                     



            </div>
            <div class="col-md-8"> 
              <div class="card">
                  <div class="card-header">new items</div>
                  <div class="card-body">
                          <?php
                          if( ! empty($items))
                          {
                            foreach($items as $item)
                            {
                              ?>
                                <div class="row_item">
                                 <div class="item_name"> <?php  echo $item['name']; ?></div>
                                 <span class="for_or">|</span>
                                 <div class="item_cat_name"><?php  echo $item['category_name']; ?></div>
                                 <span class="for_or">|</span>
                                 <div class="item_price">$ <?php  echo $item['price']; ?></div>

                                </div>
                              <?php
                            }
                          }
                          else
                          {
                            echo "emp";
                          }
                          ?>   
                  </div>    
              </div>
            </div>
          </div>             
    </div>


         <div class="for_adding_news">
            <h1 class="text-center">news</h1>
            <p class="text-center">here you can upload your news ..</p>
               <form action="add_news.php?do=add_to_db" method="POST" class="form-inline">
                 <div class="form-group">
                  <label for="subject" class="label_subject">subject  </label>
                  <input type="text" name="subject" placeholder="enter subject" class="form-control" >
                 </div>
                 <div class="form-group">
                   <textarea name="news"  cols="30" rows="5" placeholder="add your news" class="form-control"></textarea>                       
                 </div>
                 <div class="form-group">
                   <select name="statue" class="form-control">
                     <option value="0">ordinary</option>
                     <option value="1">danger</option>
                   </select>
                 </div>
                 <div class="form-group">
                       <input type="submit" class="btn btn-danger" value="add" name="submit_news" id="">   
                  </div>
                </form>
          </div>  



          <?php
          $statement =$conn->prepare("SELECT
          news.*,
          users.name AS adder_name
          FROM news
          INNER JOIN users
          ON users.id=news.admin_id 
          ");
          $statement->execute();
          $all_news=$statement->fetchAll();
          ?>

          <div class="for_show_news">
            <div class="all_news">
              <?php
              foreach ($all_news as $new)
              {

                  if($new['statue']==0)
                      {
                      ?>
                      <div class="row_item_0 alert alert-info">
                      <?php
                      }
                     else
                      {
                       ?>
                        <div class="row_item_1 alert alert-danger">
                       <?php
                       }   
                        ?> 
                    <h2 class="h2"><?php echo $new['subject']; ?></h2>
                    <p><?php echo $new['content']; ?></p>
                    <span>by :<?php echo $new['adder_name']; ?> </span>
                    <form method="POST" action="add_news.php?do=edit&id=<?php echo $new['id'];?>">
                    <button class="btn btn-primary btn-news">edit</button>
                    </form>
                    <form method="POST" action="add_news.php?do=delete&id=<?php echo $new['id'];?>">
                    <button class="btn btn-danger btn-news">delete</button>
                    </form>
                  </div>
                  
                <?php
              }
              ?>
            </div>
   </div>
   



       
<?php
  include $footer;  
  }
else
{
  ?><script type="text/javascript">goto("index.php");</script><?php

   
}

 