<?php
include '../db_config.php';

if(isset($_POST["user_id"]))
{
  $user_id = $_POST['user_id'];
  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $stmt = $db->query("SELECT * FROM `users` WHERE `user_id`={$user_id}");
     $db_users = $stmt->fetch(PDO::FETCH_ASSOC);
     $before_level = $db_users['level'];
     $level = $before_level + 1;
     $stmt = $db->query("UPDATE `users` SET `level`={$level} WHERE `user_id` = {$user_id}");
     echo $level;
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }

}

?>
