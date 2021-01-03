<?php
session_start();
$page_title="home user";
include "init.php";

if(isset($_SESSION['name'])  )
{

        $statement=$conn->prepare("SELECT * from categories ");
        $statement->execute();
        $all_categories=$statement->fetchAll();



  ?>

      <section class="section1 d-flex flex-row flex-wrap ">
        <div>
          <div class="h1">select your category and find ur items now </div>
          <div class="h6">Trusted by over 1,000,000 businesses worldwide</div>
        </div>
        <img srcset="https://cdn.shopify.com/shopifycloud/brochure/assets/landers/short-lander/free-trial/default@mobile-3fe887017342aa5a2a0d2ad2d4d4755382e331ec1bebfb4c68579bbe89d4532b.png 1x, https://cdn.shopify.com/shopifycloud/brochure/assets/landers/short-lander/free-trial/default@mobile-2x-1e95e12dd1cec4201eecf6f4f4001317b06dcfb8cfc9b6001f46030940a49cc2.png 2x" alt="">
      </section>
          <div class="main"> 
            <div class="categories col" align="center">
             <?php

                foreach($all_categories as $cat)
                {
                  ?>
                    <div class="cat"> 
                      <h3> <?php echo $cat['name']; ?></h3>
                        <div>
                          <p><?php echo $cat['description']; ?></p>
                          <a class="btn btn-primary" href="itemsOfCategory.php?id=<?php echo $cat['id']; ?>">view items</a>
                        </div>
                    </div>
                  <?php
                }
            
              ?>
    
            </div>
          </div>


        <section>
          <div class="container">
            <div class="row">

              <div class="col-md-4">
                <span><i class="fas fa-sitemap fa-5x"></i></span>
                <h3>Beautiful items Meet your needs</h3>
                <p>you can buy many items fron our website just click and do shopping <a href="items.php">items page</a></p>
              </div>
              <div class="col-md-4">
                <span> <i class="fas fa-users fa-5x"></i></span>
                <h3>About The Team </h3>
                <p>We Are Specialised Desiging And Programming Team Passionate About Web Design And Creatin Digital Ideas We Will Transfer Your Idea To A Digital Dream And Make Your Wish Come True</p>
              </div>
              <div class="col-md-4">
                <span> <i class="fas fa-truck fa-5x"></i></span>
                <h3>buy your items online</h3>
                <p>Choose your favorite items and place the order online and we will deliver the product to you</p>
              </div>
               

            </div>
          </div>
        </section>
   <?php
}
else
{
  header ('location: ../admin/index.php');
  exit();
}
 