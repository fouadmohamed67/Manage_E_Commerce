<?php

  $dsn='mysql:host=localhost;dbname=id15575106_my_m';
  $user='id15575106_user_my_m';
  $pass='Eg0>ul[K\#J37X>r';
   
   

  try{
         $conn=new PDO($dsn,$user,$pass);
         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         
  }
  catch(PDOException $e){
    echo 'faild';
  }