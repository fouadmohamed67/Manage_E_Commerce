<?php
session_start();
$page_title="home user";
include "init.php";

if(isset($_SESSION['name']) )

{
    $id_user=$_SESSION['id'];
    $statement=$conn->prepare("SELECT  *  FROM cart_shop WHERE id_user=?");
    $statement->execute(array($id_user));
    $rows=$statement->fetchAll();
    foreach($rows as $row)
    {
        $statement=$conn->prepare("INSERT INTO payments ( id_item , id_user ,date_pay,price,quntity ) VALUES ( :_id_item,:_id_user,now(),:_price,:_quntity)");
        $statement->execute(array(

            '_id_item'=>$row['id_item'],
            '_id_user'=>$row['id_user'],
            '_price'=>$row['price'],
            '_quntity'=>$row['quntity'] 
             

        ));
        clear_shop_cart($conn);
        ?><script type="text/javascript">goto("dashbord.php");</script><?php
    
    }
}
