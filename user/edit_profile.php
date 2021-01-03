<?php 
session_start();
$page_title='edit info';
include 'init.php';
 
if(isset($_SESSION['name']) && $_SESSION['role']==0 && isset($_GET['id']) && isset($_GET['do']))
{
    $user_id=$_GET['id'];
    $do=$_GET['do'];
    if($do=="edit")
    {
        $statement=$conn->prepare("SELECT  *  FROM users WHERE id=?");
        $statement->execute(array($user_id));
        $row=$statement->fetch();
         
        ?>
        <div class="container">
                <div class="card d-flex justify-content-center" >
                        <div class="card-header">
                            <div class="h1 d-flex justify-content-center">edit your profile</div>
                        </div>
                        <div class="card-body">
                            <form action="?do=update&id=<?php echo $row['id'] ?>" method="POST">
                             
                              <input type="hidden" name="oldpass" value=<?php echo $row['password'] ?>>
                             
                                        <div class="form-group">
                                            <label for="name">your name : </label>
                                            <input type="text" class="form-control" value="<?php echo $row['name']?>" name="name" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label for="email">email : </label>
                                            <input type="email" class="form-control" value="<?php echo $row['email']?>" name="email" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label for="password">password : </label>
                                            <input type="password" class="form-control"   name="password" >
                                        </div>
                                        

                                        <div class="form-group">
                                                <button class="btn btn-primary">update</button> 
                                        </div>
                            </form>
                        </div>
                </div>
         </div>
        <?php
    }
    else if ($do=="update")
    {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
                $id=$_GET['id'];
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                if(empty($_REQUEST['password']))
                {
                    $hashed_pass=$_REQUEST['oldpass'];
                }
                else
                {
                    $pass=$_REQUEST['password'];
                    $hashed_pass=sha1($pass);
                }
                $emails_id=$conn->prepare("SELECT email,id FROM users WHERE email=? AND id!=? ");
                $emails_id->execute(array($email,$id));
                $row_of_email=$emails_id->fetch();
                $count_of_the_same_email=$emails_id->rowCount();
            if($count_of_the_same_email == 0)
            {
                $statement=$conn->prepare("UPDATE users SET name=?,email=?,password=?,role=? WHERE id=?");
                $statement->execute(array($name,$email,$hashed_pass,$role,$user_id));
                  
                    ?><script type="text/javascript">goto("dashbord.php");</script><?php
    
            }
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php
        }
    }
    else
    {
        ?><script type="text/javascript">goto("dashbord.php");</script><?php

    }
} 
else
{
  
    ?><script type="text/javascript">goto("dashbord.php");</script><?php

}
