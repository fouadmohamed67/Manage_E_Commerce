<?php 
session_start();
$page_title='dashbord';
include 'init.php';

if(isset($_SESSION['name']) &&$_SESSION['role']==1)
{ 
    $do=isset($_GET['do'])?$_GET['do']:'manage';
    if($do=="add_to_db")
    {
      if( $_SERVER['REQUEST_METHOD']=="POST" && isset($_REQUEST['submit_news']))
        
        {
            $new=$_REQUEST['news'];
            $subject=$_REQUEST['subject'];
            $statue=$_REQUEST['statue'];
            $user_id=$_SESSION['id'];

        
            $statement=$conn->prepare("INSERT INTO news ( content, admin_id,statue,subject) VALUES ( :_new,:_user_id,:_statue,:_subject)");
            $statement->execute(array(

                '_new'=>$new,
                '_user_id'=>$user_id,
                '_statue'=>$statue,
                '_subject'=>$subject

            ));
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

           
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

        }
    }
    else if($do=="edit")
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id=$_REQUEST['id']; 
            $statement=$conn->prepare("SELECT * FROM news WHERE id=$id");
            $statement->execute();
            $new_edit=$statement->fetch();

            ?>
                 <div class="loading"> 
                      <div class="o1"></div>
                      <div class="o2"></div>
                    </div> 
                 </div>
                 
                 <div class="for_adding_news">
                        <h1 class="text-center"> edit news</h1>
                      
                            <form method="POST" action="add_news.php?do=update&id=<?php echo $id?>"  class="form-inline">
                                <div class="form-group">
                                    <label for="subject" class="label_subject">subject  </label>
                                    <input type="text" value="<?php echo $new_edit['subject'] ?>" name="subject" placeholder="enter subject" class="form-control" >
                                </div>
                                <div class="form-group">
                                     <textarea name="news"  cols="30" rows="5" placeholder="add your news"  class="form-control"> <?php echo $new_edit['content'] ?></textarea>                       
                                </div>
                                <div class="form-group">
                               
                                    <select name="statue" class="form-control">
                                        <option value="0" <?php if($new_edit['statue']==0)echo "selected";?> >ordinary</option>
                                        <option value="1"  <?php if($new_edit['statue']==1)echo "selected"; ?>>danger</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="update" name="submit_news" id="">   
                                </div>
                            </form>
               </div>  

            <?php
             include $footer;
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

        }
    }
    else if($do=="delete")
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id=$_REQUEST['id']; 
            $statement=$conn->prepare("DELETE FROM news WHERE id=$id");
            $statement->execute();
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

             
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
            $id=$_REQUEST['id']; 
            $subject=$_REQUEST['subject'];
            $content=$_REQUEST['news'];
            $statue=$_REQUEST['statue'];
            echo $subject;
            echo $content;
            echo $statue;
            $statement=$conn->prepare("UPDATE news SET subject=?,content=?,statue=? WHERE id=?");
            $statement->execute(array($subject,$content,$statue,$id));
            
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

             
        }
        else
        {
            ?><script type="text/javascript">goto("dashbord.php");</script><?php

        }
    }
}

else
  {
    ?><script type="text/javascript">goto("index.php");</script><?php

     
}  
