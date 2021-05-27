<?php 
session_start();
$page_title='items page';
include 'connect.php';
if(isset($_SESSION['name']))
{
    $id_user=$_SESSION['id']; 

    $statement=$conn->prepare("SELECT * FROM cart_shop  WHERE id_user =?");
    $statement->execute(array($id_user));
    $count_items = $statement->rowCount(); 

    echo json_encode($count_items);
}
