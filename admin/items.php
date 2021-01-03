<?php 
session_start();
$page_title='items page';
include 'init.php';
if(isset($_SESSION['name']) && $_SESSION['role']==1)
{
    $do=isset($_GET['do'])?$_GET['do']:'manage';
   
    if($do=='manage')
    {
        $page_no=$_GET['page_no'];
        $statement=$conn->prepare("SELECT * FROM items");
        $statement->execute();
        $count_items = $statement->rowCount();
         
         
         
        $no_pages=ceil($count_items/6);
        $offset=($page_no-1)*6;
          

        $statement=$conn->prepare("SELECT 
        items.*,
        categories.name As category_name,
        users.name As user_name
          FROM
          items
          INNER JOIN categories ON categories.id=items.category_id
          INNER JOIN users ON users.id=items.user_id
          LIMIT 6 OFFSET $offset
          ");
        $statement->execute();
        $all_items=$statement->fetchAll();
        
       

         
         
         
         
    ?>
    
         <div class="loading"> 
                      <div class="o1"></div>
                      <div class="o2"></div>
         </div> 


         <nav aria-label="Page navigation example mt-10px">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($page_no==1) echo "disabled"; ?>  ">
                      <a class="page-link" href="?do=manage&page_no=<?php echo $page_no-1 ;?>">Previous</a>
                    </li>
                     <?php
                     for($i=0;$i<$no_pages;$i++)
                     {?>
                     <li class="page-item"><a class="page-link" href="?do=manage&page_no=<?php echo $i+1 ;?> "><?php echo $i+1; ?></a></li>
                     <?php } ?>
                     
                     
                   
                    <li class="page-item  <?php if($page_no==$no_pages) echo "disabled";?>  ">
                      <a class="page-link" href="?do=manage&page_no=<?php echo $page_no+1 ;?>">Next</a>
                    </li>
                </ul>
            </nav>



         <div class="container">




            <a href="?do=additem" class="btn btn-primary mb-2">add new item</a>
            <div class="card d-flex justify-content-center" >
                            <div class="card-header">
                                <div class="h1 d-flex justify-content-center">items</div>
                            </div>
                            <div class="card-body ">
                            <?php
                            foreach($all_items as $item)
                            {
                               ?>
                                
                              <div class="item_row ">
                               
                               
                               <div class="row d-flex flex-row">
                               <div class="col-md-4 c1">
                                    <h3><?php echo $item['name'] ?></h3>
                                    <p><?php echo $item['description'] ?></p>
                                    <span class="price"><?php echo $item['price']; ?></span><br>
                                    <span class="date">category name: <?php echo $item['category_name'] ; ?></span><br>
                                    <span class="date"><?php echo $item['user_name'] ; ?></span><br>
                                    <span class="date"><?php echo $item['date'] ; ?></span>
                                </div>
                                <div class="col-md-8 c2">
                                   <div class="row_image">
                                        <img class="image_items" src="layout\images\<?php echo $item['image'];?>" alt="">
                                    </div>
                                
                                </div>
                                <div class="row_buttons">
                                        <form method="POST" action="?do=edit&id=<?php echo $item['id'] ?>">
                                        <button class="btn btn-primary btn-sm">edit</button>
                                        </form>
                                        <form method="POST" action="?do=delete&id=<?php echo $item['id'] ?>">
                                        <button class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                   </div>
                               </div>
                              </div>

                                <?php
                            }
                            
                            ?>
             </div>
         </div>
     </div>
                            
            

         
    <?php
    
    }
    else if($do=="additemtodata")
    {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $name=$_REQUEST['name'];
            $description=$_REQUEST['description'];
            $price=$_REQUEST['price'];
            $category_id=$_REQUEST['category_id'];
            $user_id=$_SESSION['id'];
            

            $filename = $_FILES["image"]["name"]; 
            $tempname = $_FILES["image"]["tmp_name"];  
            $folder_image_name= "layout/images/".$filename;
              
             
            
              
            
                
                 $statement=$conn->prepare("INSERT INTO items ( name, description,price,date,category_id,user_id,image) VALUES ( :_name,:_description,:_price,now(),:_category_id,:_user_id,:_image)");
                $statement->execute(array(
    
                    '_name'=>$name,
                    '_description'=>$description,
                    '_price'=>$price,
                    '_user_id'=>$user_id,
                    '_category_id'=>$category_id,
                    '_image'=>$filename
                    
                    
                    
                    
    
                ));
                move_uploaded_file($tempname, $folder_image_name);
                ?><script type="text/javascript">goto("items.php?do=manage&page_no=1");</script><?php
                 
                


                 
            

        }
        else
        {
            ?><script type="text/javascript">goto("items.php?do=manage&page_no=1");</script><?php

            
        }
    }
    else if($do=="additem")
    {
    ?>
    
    <div class="loading"> 
                      <div class="o1"></div>
                      <div class="o2"></div>
         </div> 
    
         <div class="container">
      <div class="container">
                <div class="card d-flex justify-content-center" >
                        <div class="card-header">
                            <div class="h1 d-flex justify-content-center">add item</div>
                        </div>
                        <div class="card-body">
                        
                       
                            <form action="?do=additemtodata" method="POST" enctype="multipart/form-data"> 

                                        <div class="form-group">
                                            <label for="name">item name : </label>
                                            <input type="text" placeholder="name" class="form-control"   name="name" required="required" >
                                        </div>

                                        <div class="form-group">
                                            <label for="image">item image : </label>
                                            <input type="file" placeholder="image" class="form-control"   name="image" required="required" >
                                        </div>
                                      



                                        <div class="form-group">
                                            <label for="description">item description : </label>
                                            <br>
                                            <textarea name="description"  class="textarea" cols="30" rows="10"></textarea>
                                        </div>
                                        <?php
                                        if(isset($_SESSION['items_error'][1]))
                                        { 
                                            ?> 
                                            <div class="alert alert-danger">
                                            <?php echo $_SESSION['items_error'][1]; ?>
                                            </div> 
                                            <?php unset($_SESSION['items_error'][1]); ?>
                                       <?php } ?> 

                                       <div class="form-group">
                                            <label for="price">item price : </label>
                                             <input type="text" name="price">
                                       </div>
                                       <?php
                                        if(isset($_SESSION['items_error'][2]))
                                        {?>
                                            <div class="alert alert-danger">
                                            <?php echo $_SESSION['items_error'][2]; ?>
                                            </div> 
                                            <?php unset($_SESSION['items_error'][2]); ?>
                                       <?php } ?> 


                                       <div class="form-group">
                                            <label for="visible">item price : </label>
                                             <select name="category_id" class="form-control" id="">
                                                 <?php
                                                 $statement=$conn->prepare("SELECT * FROM categories");
                                                 $statement->execute();
                                                 $all_categories=$statement->fetchAll();


                                                 foreach($all_categories as $category)
                                                 {
                                                     ?>
                                                                <option value="<?php echo $category['id'];?>"><?php echo $category['name'] ;?> </option>
                                                     <?php
                                                 }

                                                 ?>
                                             </select>
                                       </div>

                                         
                                       
                                      
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="add the item" name="submit" id="">   
                                        </div>
                            </form>
                             
                        </div>
                </div>
         </div>
    <?php 
    }
   
    else if($do=="delete")
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
           $id_will_del=$_REQUEST['id'];
           $statement=("DELETE FROM items WHERE id=$id_will_del");
           $conn->query($statement);
           ?><script type="text/javascript">goto("items.php?do=manage&page_no=1");</script><?php

           
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

           
        }
    }
    else if($do=="update")
    {
         
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
             
            $id= isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0;
            $name=$_REQUEST['name'];
            $description=$_REQUEST['description'];
            $price=$_REQUEST['price'];

            $statement=$conn->prepare("UPDATE items SET name=?,description=?,price=? WHERE id=?");
                $statement->execute(array($name,$description,$price,$id));
                 if($statement->rowCount()>0)
                 {
                    ?><script type="text/javascript">goto("items.php?do=manage&page_no=1");</script><?php

                     
                     
                 }



        }
        else
        {
            ?><script type="text/javascript">goto("items.php?do=manage&page_no=1");</script><?php

            
        }
    }

    else if($do=="edit")
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id=$_REQUEST['id']; 

            
             
            $statement=$conn->prepare("SELECT 
            items.*,
            categories.name As category_name,
            users.name As user_name
            FROM
            items
            INNER JOIN categories ON items.id=$id
            INNER JOIN users ON users.id=items.user_id");
            $statement->execute();
            $all_items=$statement->fetch();

            
          


            

            ?>
            
         <div class="container">
            <div class="container">
            <div class="card d-flex justify-content-center" >
                    <div class="card-header">
                        <div class="h1 d-flex justify-content-center">edit item</div>
                    </div>
                    <div class="card-body">
                        <form action="?do=update&id=<?php echo $id?>" method="POST"> 

                                    <div class="form-group">
                                        <label for="name">item name : </label>
                                        <input type="text" placeholder="name" class="form-control" value="<?php echo $all_items['name'];?>"   name="name" required="required" >
                                    </div> 
                                    <div class="form-group">
                                        <label for="description">category name : </label>
                                        
                                         <p> <?php echo $all_items['category_name'];?> </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">description:</label>
                                        <input type="text" name="description" value="<?php echo $all_items['description'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">price:</label>
                                        <input type="text" name="price" value="<?php echo $all_items['price'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">date: </label>
                                        
                                         <p> <?php echo $all_items['date'];?> </p>
                                    </div>
                                    

                                

                                    
                                
                                
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="update" name="submit" id="">   
                                    </div>
                        </form>
                        
                    </div>
                </div>
            </div>
    
        
    <?php
            
 
            
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

        }
       
    }
    include $footer;
 
}
else if($_SESSION['name']&&$_SESSION['role']==0)
{
    ?><script type="text/javascript">goto("../user/dashbord.php");</script><?php
  
}
else
{
    ?><script type="text/javascript">goto("index.php");</script><?php

     
}
 
 