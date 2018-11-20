<?php
$f_ROOT = '../../';

function isLoggedIn($a){

  if(isset($_SESSION['logged'])){
    $a?header('Location: '.$f_ROOT.'HomePage.php'):header('Location: HomePage.php');
    exit();
  }
}

function isNotLoggedIn($a){
  if(!isset($_SESSION['logged'])){
    $a?header('Location: '.$f_ROOT.'index.php'):header('Location: index.php');
    exit();
  }
}
