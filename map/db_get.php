<?php
  $location_shimotokida = array();
  $people = array();
  $random_spawn_shimotokida = array();
  $db_people_table_num = array();
  if(!empty($_GET['user_id'])){
    if(!empty($_GET['hero_id'])){
      $user_id = $_GET['user_id'];
      $hero_id = $_GET['hero_id'];
      try
      {
         $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $stmt = $db->query("SELECT * FROM `users` WHERE `user_id`={$user_id}");
         $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
         if(!empty($users)){
           $db->query("UPDATE `users` SET `last_hero_id`={$hero_id} WHERE `user_id`={$user_id}");
         }else{
           $db->query("INSERT INTO `users`(`user_id`, `last_hero_id`) VALUES ({$user_id},{$hero_id})");
         }
         $db = null;
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
      }
    }else{
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.html?user_id={$user_id}\">";
    }
  }else{
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.html\">";
  }

  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     $stmt = $db->query("SELECT * FROM location_shimotokida");
     $location_shimotokida = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt = $db->query("SELECT * FROM people");
     $people = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt = $db->query("SELECT * FROM random_spawn_shimotokida");
     $random_spawn_shimotokida = $stmt->fetchAll(PDO::FETCH_ASSOC);

     $stmt = $db->query("SELECT COUNT(*) as people_table_num FROM `people` ");
     $db_people_table_num = $stmt->fetch(PDO::FETCH_ASSOC);
     $people_table_num = $db_people_table_num['people_table_num'];
     for($i=0;$i<$people_table_num;$i++){
       $j = $i + 1;
       $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$j}");
       $db_talk_table = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $type = 0;
       $type_temp = 0;
       foreach ($db_talk_table as $r){
         $type_temp = $r['type'];
         if($type_temp > $type){
           $type = $type_temp;
         }
       }
       $people_talk_type[$i] = $type;
     }
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }

  $db_syujinkou = array();
  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $db->query("SELECT * FROM hero WHERE id = '{$hero_id}'");
     $db_syujinkou = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
    //print_r($syujinkou);

    foreach ($db_syujinkou as $l) {
      $h_name = $l['name'];
      $h_feature = $l['feature'];
      $h_png = $l['png'];
      $h_front = $l['front'];
      $h_left = $l['left'];
      $h_right = $l['right'];
      $h_back = $l['back'];
    }

?>
