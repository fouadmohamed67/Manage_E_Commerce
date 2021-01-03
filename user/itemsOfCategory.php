<?php
session_start();
$page_title="home user";
include "init.php";

if(isset($_SESSION['name'])  )
{
    ?>
      <section class="section_items_page  ">
            
            <div class="h1">add item to car</div>
             
      </section>

      <div class="all_items">
          <div class="row d-flex flex-row align-items-center justify-content-around flex-wrap">
          
            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd               adknagd adnoakljwfj nsfdkljsi  i mlkkl j ;lk ; lk; lkl; k;l k; lk;l k;lk;l kl;k ;lk</p>
                    <p>sdsdsdsds ds555555 555555 555555555555555555 55555555555 5555555555555jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjd</p>
               </div>
            </div>

            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd               adknagd adnoakljwfj nsfdkljsi  i mlkkl j ;lk ; lk; lkl; k;l k; lk;l k;lk;l kl;k ;lk</p>
                    <p>sdsdsdsds ds555555 555555 555555555555555555 55555555555 5555555555555jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjd</p>
               </div>
            </div>


            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd               adknagd adnoakljwfj nsfdkljsi  i mlkkl j ;lk ; lk; lkl; k;l k; lk;l k;lk;l kl;k ;lk</p>
                    <p>sdsdsdsds ds555555 555555 555555555555555555 55555555555 5555555555555jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjd</p>
               </div>
            </div>

            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd</p>
                    <p>sdsdsdsdsdsd</p>
               </div>
            </div>

            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd</p>
                    <p>sdsdsdsdsdsd</p>
               </div>
            </div>

            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd</p>
                    <p>sdsdsdsdsdsd</p>
               </div>
            </div>

            <div class="col-md-4 item_of_cat d-flex flex-column ">
                <h3>kklkjklj</h3>
                <div class="for_image">
                    <img src="..\admin\layout\images\IMG-20190928-WA0039.jpg" alt="">
                </div>
               <div>
                    <p class="price">sddsd</p>
                    <p>sdsdsdsdsdsd</p>
               </div>
            </div>




 

          </div>
      </div>
      <?php
}
else
{
  header ('location: ../admin/index.php');
  exit();
}