<?php
session_start();
$page_title="home user";
include "init.php";

if(isset($_SESSION['name'])    )
{   
    $do=isset($_GET['do'])?$_GET['do']:'manage';
        if($do=="manage")
        {
            $id_user=$_SESSION['id'];
        $statement=$conn->prepare("SELECT items.name , cart_shop.quntity , items.price,items.category_id , cart_shop.id FROM items INNER JOIN cart_shop WHERE id_user=? and items.id=cart_shop.id_item");
        $statement->execute(array($id_user));
        $count_items = $statement->rowCount(); 
        $rows=$statement->fetchAll();
        $total=0.0;
        
           ?>
           <div class="container">
           
           <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">item name</th>
                        <th scope="col">quentity</th>
                        <th scope="col">price</th> 
                        <th colspan="2" scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    foreach($rows as $row)
                    {   $total+=(float)$row['price'];
                        ?>
                        <tr>
                        <td><?php echo $row['name'] ;?></td>
                        <td> <?php echo $row['quntity'] ;?></td>
                        <td><?php echo $row['quntity']*$row['price'] ;?></td>
                        <td><a href="?do=delete&id=<?php echo  $row['id'];?>" class="btn btn-sm btn-danger">remove</a></td>
                        
                    </tr>
                    <?php
                    }
                   ?>
                    
                </tbody>
                </table>
                <div class="alert alert-secondary" role="alert"> total cost= <?php echo $total;?></div>
            <div align="right">
            
                <a href="?do=clear" class="btn btn-danger"><span class="glyphicon glyphicon-trash">clear</span></a>
                <a href="check_out.php" class="btn btn-primary"><span class="glyphicon glyphicon-trash">check out</span></a>
            </div>
           </div>
           <?php
       
        }
        else if($do=="delete")
        {
            $id=$_GET['id'];
            
           $statement=("DELETE FROM cart_shop WHERE id=$id");
           $conn->query($statement);
           ?><script type="text/javascript">goto("car_shop.php?do=manage");</script><?php
        }
        else if($do=="clear")
        {
            clear_shop_cart($conn);
            ?><script type="text/javascript">goto("car_shop.php?do=manage");</script><?php

        }
       

}