<?php
include '../db_config.php';
if(!empty($_GET['user_id'])){
  $user_id = $_GET['user_id'];
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
       $db->query("INSERT INTO `users`(`user_id`, `start_time`) VALUES ({$user_id},{$timestamp})");
     }
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
}
?>
