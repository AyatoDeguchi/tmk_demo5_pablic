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
          $db->query("UPDATE `users` SET `start_time`={$timestamp} WHERE `user_id`={$user_id}");
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
