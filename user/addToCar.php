<?php 
session_start();
$page_title='items page';
include 'init.php';
if(isset($_SESSION['name'])  )
{
    $id_item=$_POST['id'];
    $id_user=$_SESSION['id'];
    $quntity=$_POST['quntity'];
    $price= $_POST['price'];
    $date = date('Y-m-d H:i:s'); 
    $statement=$conn->prepare("INSERT INTO cart_shop ( id_item, id_user,price, quntity , date_shopping ) VALUES ( :_id_item,:_id_user,:_price,:_quntity ,now() )");
    $statement->execute(array(

        '_id_item'=>$id_item,
        '_quntity'=>$quntity,
        '_price'=> (int)$price*(int)$quntity,
        '_id_user'=>$id_user 
        

    ));
    
}