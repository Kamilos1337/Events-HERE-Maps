<?php
  include('db_connect.php');
  $p = $_POST['id'];
  $stmt = $dbh->query("SELECT preferences FROM users where id='$p' ");
  $result = $stmt->fetchAll();
  echo $result[0];
?>
