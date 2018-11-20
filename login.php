<?php
  session_start();
  include('imports/functions/functions.php');
  isLoggedIn(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
        position: relative;
        width: 100%;
        height: 100vh;
        padding-top:8vh;
        color: white;
        background: url(../img/bg-pattern.png), linear-gradient(to left, #302b63, #005AA7);
    }

    input{
      margin:15px !important;
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
	<?php include('imports/components/Navbar.php');?>

	<form method="POST" action="imports/functions/logon.php">
    <div class="container allRegister">
      <div class="row">
        <i class="fas fa-user iconRegister"> </i>
      </div>
      <div class="row">
        <input type="text" name="email" class="form-control cut" placeholder="Email">
        <input type="password" name="password" class="form-control cut" placeholder="Password">
        <input type="submit" value="Sign In" class="form-control cutSubmit" placeholder="First name">
      </div>
    </div>
  </form>

	<?php include('imports/components/Footer.php');?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/new-age.min.js"></script>

</body></html>
