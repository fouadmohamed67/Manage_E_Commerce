<?php
session_start();
$page_title="home user";
include "init.php";
if(isset($_SESSION['name']) )
{
    $id_user=$_SESSION['id'];
    $statement=$conn->prepare("SELECT  *  FROM payments WHERE id_user=? GROUP BY date_pay");
    $statement->execute(array($id_user));
    $rows=$statement->fetchAll();
    ?>
        <div class="container">
        
    <?php
    $i=1;
    foreach($rows as $row)
    {    $date =    $row['date_pay'] ;  
         
        ?> 
            <div   class="btn btn-primary">
            bill no <span class="badge badge-light"><?php echo $i;?></span> 
            </div>
            <span class="p-3 badge badge-dark">  date: <?php echo $date ;?></span>

        <?php
        
         $i+=1; 
         $statement=$conn->prepare("SELECT items.name , payments.quntity , payments.price ,payments.date_pay   FROM items INNER JOIN payments WHERE payments.id_user=? and items.id=payments.id_item and  payments.date_pay= '$date'   "); 
         $statement->execute(array($id_user)); 
         $rows2=$statement->fetchAll();
         ?>
         <table class="table  mt-5">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">quntity</th>
                    <th scope="col">price</th> 
                </tr>
            </thead>
            <tbody>
         <?php
         $bill_price=0;
         foreach($rows2 as $r)
         {
            $bill_price+=$r['price'];
           ?>
          
                    <tr> 
                        <td><?php echo $r['name'];?></td>
                        <td><?php echo $r['quntity'];?></td>
                        <td><?php echo $r['price'];?></td>
                    </tr> 
                
           <?php
         }  
         ?>
             </tbody>
            </table>
            <div class="alert alert-dark" role="alert">
             total price = <?php echo $bill_price; ?>
            </div>
         <?php
    }
    ?>
         
         
    </div>
    <?php

}