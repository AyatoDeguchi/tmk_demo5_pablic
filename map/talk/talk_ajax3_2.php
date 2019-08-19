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

     $stmt = $db->query("SELECT COUNT(*) as talk3_num FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `speak_type`=3 AND `type`={$type} ORDER BY `turn`");
     $db_talk3_num = $stmt->fetch(PDO::FETCH_ASSOC);
     $talk3_num = $db_talk3_num['talk3_num'];

     echo $talk3_num;
     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }

}

?>
