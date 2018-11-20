<?php
  session_start();
  require('db_connect.php');
  include('functions.php');


  if(isset($_POST['email'])){
    $email = $_POST['email'];
    if(empty($_POST['address'])){header("location: ../../register.php"); exit();}
    $res = $dbh->query("SELECT id FROM users WHERE email='$email'");
    if($res->rowCount()){
      $asd = $res->rowCount();
      echo $asd;
      $_SESSION['reg_er']=1;
      header('Location: ../../register.php');
      exit();
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $preferences = implode(",",$_POST['preferences']);
    $search_range = $_POST['search_range'];
    $sql = "INSERT INTO users VALUES (NULL, '$email','$password','$name','$surname','$address','$x','$y','$age','$sex','$preferences','$search_range')";
    $dbh->query($sql);
    $sql = "SELECT id from users where email='$email'";
    $sql=$dbh->prepare("SELECT id from users where email='$email'");
    $sql->execute();
    $res = $sql->fetch();
    $_SESSION['id'] = $res[0];
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['address'] = $address;
    $_SESSION['age'] = $age;
    $_SESSION['sex'] = $sex;
    $_SESSION['preferences'] = $preferences;
    $_SESSION['search_range'] = $search_range;
    $_SESSION['logged'] = 1;

    header('Location: ../../HomePage.php');
    exit();
  }
