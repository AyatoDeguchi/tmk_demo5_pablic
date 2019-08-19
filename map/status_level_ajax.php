<?php

include 'db_config.php';
$talk = array();

if(isset($_POST["user_id"]))
{
  $user_id = $_POST['user_id'];
  $db_users = array();
  $level = 0;

    // 入力値とDBとの照合
    if(!empty($user_id))
    {
      try
      {
         // connect
         $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $stmt = $db->query("SELECT * FROM `users` WHERE `user_id`= {$user_id}");
           $db_users = $stmt->fetch(PDO::FETCH_ASSOC);

           $level = $db_users['level'];
         $db = null;
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
      }
    }
}
echo $level;
?>
