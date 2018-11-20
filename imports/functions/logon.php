<?php
  session_start();
  require('db_connect.php');
  include('functions.php');
  isLoggedIn(1);

  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $res = $dbh->query($sql);
    if($res->rowCount()){
      $row = $res->fetchAll();

      $_SESSION['email'] = $email;
      $_SESSION['id'] = $row[0]['id'];
      $_SESSION['name'] = $row[0]['name'];
      $_SESSION['surname'] = $row[0]['surname'];
      $_SESSION['address'] = $row[0]['address'];
      $_SESSION['age'] = $row[0]['age'];
      $_SESSION['sex'] = $row[0]['sex'];
      $_SESSION['preferences'] = explode(',',$row[0]['preferences']);
      $_SESSION['search_range'] = $row[0]['search_range'];
      $_SESSION['logged'] = 1;

      $dbh = null;
      header('Location: ../../HomePage.php');
      exit();

    }
    $dbh = null;
    $_SESSION['log_er'] = 1;
    header('Location: ../../login.php');
    exit();
  }
