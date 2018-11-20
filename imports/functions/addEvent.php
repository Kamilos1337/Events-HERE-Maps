<?php
  session_start();
  include('functions.php');
  isNotLoggedIn(1);

  if(isset($_POST['title'])){
    include('db_connect.php');
    $title = $_POST['title'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $startDateHour = $_POST['startDateHour'];
    $endDate = $_POST['endDate'];
    $endDateHour = $_POST['endDateHour'];
    $category = implode(",",$_POST['category']);
    $sex = $_POST['sex'];
    $place = $_POST['place'];
    $agefrom = $_POST['agefrom'];
    $ageto = $_POST['ageto'];
    $id = $_SESSION['id'];
    $x = $_POST['x'];
    $y = $_POST['y'];

    $deadline = date('Y-m-d', strtotime($startDate));
    $deadline = date('Y-m-d', strtotime($deadline . '+1 day'));
    $deadlineHour = $startDateHour;
    $sql = "INSERT INTO events VALUES (NULL,$id,'$title','$description','$place',$x,$y,'$category','$startDate','$startDateHour','$endDate','$endDateHour','$sex',$agefrom,$ageto,'$deadline','$deadlineHour')";
    $dbh->query($sql);
    header('Location: ../../HomePage.php');
    exit();
  }
