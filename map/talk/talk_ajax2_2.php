<?php
include '../db_config.php';

if(isset($_POST["hero_id"]) && isset($_POST["people_id"]) && isset($_POST["people_talk_type"]))
{
  $hero_id = $_POST['hero_id'];
  $people_id = $_POST['people_id'];
  $type = $_POST["people_talk_type"];
  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $stmt = $db->query("SELECT COUNT(*) as talk2_num FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `speak_type`=2 AND `type`={$type} ORDER BY `turn`");
     $db_talk2_num = $stmt->fetch(PDO::FETCH_ASSOC);
     $talk2_num = $db_talk2_num['talk2_num'];

     echo $talk2_num;
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }

}

?>
