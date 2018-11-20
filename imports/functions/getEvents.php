<?php
  $id = $_POST['id'];
  $prefs = $_POST['prefs'];
  $prefs = explode(',',$prefs);


  include('db_connect.php');
  $res = $dbh -> query("SELECT preferences, search_range,latitude,longitude FROM users WHERE id = '$id'");
  $res = $res->fetch();
  // $prefs = explode(',',$res[0]);
  $distance = $res[1];
  $x = $res[2];
  $y = $res[3];

  $res2 = $dbh -> query("SELECT * FROM events");
  $res2 = $res2->fetchAll();
  $tb_res = [];
  $tb_res2 = [];
  foreach($res2 as $n){
    foreach($prefs as $a){
      if(in_array($a,explode(',',$n[7]))){array_push($tb_res,$n);break;}
    }
  }

  foreach ($tb_res as $v){
    $R = 6371e3;
    $k1 = deg2rad($v[5]);
    $k2 = deg2rad($x);

    $D = deg2rad($x-$v[5]);
    $Y = deg2rad($y-$v[6]);

    $a = sin($D/2) * sin($Y/2) + cos($k1) * cos($k2) * sin($Y/2) * sin($Y/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $d = $R * $c;

    $d = (int)$d;
    $d = $d/1000;

    if($d<=$distance){
      array_push($tb_res2,$v);
    }
  }

foreach($tb_res2 as $event) {
  echo "[" . $event['latitude'] . '=' . $event['longitude'] . "],";
}
