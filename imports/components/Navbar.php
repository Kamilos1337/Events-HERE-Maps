<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top nav-height" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="/">HERE & NOW</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
              if(isset($_SESSION['logged'])){      echo '<a class="nav-link js-scroll-trigger" href="HomePage.php">Panel</a>';}
            ?>
          </li>
          <li class="nav-item">
            <?php
              if(isset($_SESSION['logged'])){      echo '<a class="nav-link js-scroll-trigger" href="imports/functions/logout.php">Log out</a>';}else{      echo '<a class="nav-link js-scroll-trigger" href="/login.php">Sing In</a>';}
            ?>
          </li>
          <li class="nav-item">
            <?php
              if(!isset($_SESSION['logged'])){echo '<a class="nav-link js-scroll-trigger" href="/register.php">Sing Up</a>';}
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
