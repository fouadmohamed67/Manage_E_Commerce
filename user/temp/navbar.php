<nav class="navbar navbar-expand-lg  nav_color">
  <a class="navbar-brand" href="dashbord.php">HOME</a>
  
  <a class="car_shop" href="items.php"><i class="fas fa-cart-plus"></i> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   
    <i class="fas fa-list"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="items.php"> all items <span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="edit_profile.php?do=edit&id=<?php echo $_SESSION['id']?>">edit profile</a>
          <a class="dropdown-item" href="../user/logout.php">logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>