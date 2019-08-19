<?php

include 'db_config.php';
if(isset($_POST["user_id"]))
{
  $user_id = $_POST['user_id'];
  $users = array();

    // 入力値とDBとの照合
    if(!empty($user_id))
    {
      try
      {
        $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM `users` WHERE `user_id`={$user_id}");
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $timestamp = time();
        if(!empty($users)){
          $play_time = $users['play_time'];


          $hour = intval($play_time / 3600);
          $minute = intval($play_time / 60);
          $second = $play_time % 60;


        if($hour == 0 && $minute < 10 && $second < 10){
        echo "00:0".$minute.":0".$second;
        // echo "a";
        }
        if($hour == 0 && $minute < 10 && $second >= 10){
        echo "00:0".$minute.":".$second;
        // echo "a";
        }
        if($hour == 0 && $minute >= 10 && $second < 10){
        echo "00:".$minute.":0".$second;
        // echo "b";
        }
        if($hour == 0 && $minute >= 10 && $second >= 10){
        echo "00:".$minute.":".$second;
        // echo "b";
        }
        if($hour != 0 && $hour < 10 && $minute < 10 && $second < 10){
        echo "0".$hour.":0".$minute.":0".$second;
        // echo "c";
        }
        if($hour != 0 && $hour < 10 && $minute < 10 && $second >= 10){
        echo "0".$hour.":0".$minute.":".$second;
        // echo "c";
        }
        if($hour != 0 && $hour < 10 && $minute >= 10 && $second < 10){
        echo "0".$hour.":".$minute.":0".$second;
        // echo "d";
        }
        if($hour != 0 && $hour < 10 && $minute >= 10 && $second >= 10){
        echo "0".$hour.":".$minute.":".$second;
        // echo "d";
        }
        if($hour >= 10 && $minute < 10 && $second < 10){
        echo $hour.":0".$minute.":0".$second;
        // echo "e";
        }
        if($hour >= 10 && $minute < 10 && $second >= 10){
        echo $hour.":0".$minute.":".$second;
        // echo "e";
        }
        if($hour >= 10 && $minute >= 10 && $second < 10){
        echo $hour.":".$minute.":0".$second;
        // echo "f";
        }
        if($hour >= 10 && $minute >= 10 && $second >= 10){
        echo $hour.":".$minute.":".$second;
        // echo "f";
        }


        }else{
          echo "処理なし";
        }
        $db = null;
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
      }
    }
}
?>
