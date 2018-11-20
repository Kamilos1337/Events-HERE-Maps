<?php
  session_start();
  include('imports/functions/functions.php');
  isNotLoggedIn(0);
  require('imports/functions/db_connect.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1533195059" />
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

      <style>
      .card{
        margin-top:15px !important;
        color:black !important;
      }
      .card-body{
          color:black !important;
      }
        .form-control, .custom-select{
          margin:0 auto !important;
          margin-bottom:5px !important;
        }
        .nav-link{
          color:black !important;
        }
        .navbar-brand:hover{
          color:black !important;
        }
        .navbar-brand:hover{
          color:black !important;
        }
        .navbar-brand{
          color:#302b63 !important;
        }

        input {
          margin:15px !important;
        }
        .sidebar{
          border-right:0px !important;
        }
        a{
          text-decoration:none !important;
        }
      </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HERE & NOW</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
  </head>

  <body>
      <div class="container-fluid" style="padding-right:0px !important; padding-left:0px !important; padding-top:0px !important; ">
        <div class="row sidebar">
          <a href="/" class="MainPage">Main Page</a>
          <a href="/HomePage.php" class="MainPage">Panel</a>
          <a href="/imports/functions/logout.php" class="MainPage">Log out</a>
        <div class="container text-center">
          <i class="fas fa-user iconS"></i>
          <?php

          echo '  <p class="events">'.$_SESSION['name']." ".$_SESSION['surname'].'</p>';
          echo ' <p class="eventsSmall"><b>Email:</b><br> '.$_SESSION['email'].'</p>';
          echo ' <p class="eventsSmall"><b>Address:</b><br> '.$_SESSION['address'].'</p>';
          echo ' <p class="eventsSmall"><b>Age:</b><br> '.$_SESSION['age'].'</p>';
          echo ' <button type="button" class="btn btn-danger">Change infos</button>';
          ?>


        </div>
    <script>


    </script>
  </div>
  <div class="row mapMain">
    <div id="allEvents" style="width: 100vw; height: 100vh; border-left: 1px solid #eee">
      <div class="container eventsALL">
        <div class="row">

        <h2> My events list </h2><br><br>
      </div>
      <div class="row">
        <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM events WHERE organiser_id='$id'";
        $res = $dbh->query($sql);
        foreach($res as $row){
    echo '<div class="card" style="width:47% !important; margin-right:10px;">';
  echo '<a href="/showevent.php?id='.$row['id'].'"><div class="card-body">';
      echo ' <h5 class="card-title">'.$row['title'].'</h5>';
      echo'<p class="card-text">'.$row['description'].'</p>';
      echo'<p class="card-text"><small class="text-muted">Created at: '.$row['date_start'].', '.$row['date_start_h'].' - '.$row['deadline'].','.$row['deadline_h'].'</small></p>';
    echo'</div>';
  echo'</div>';

}
  ?>
    </div>

      </div>  </div>
    </div>
</div>

    <script>

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
