<?php

include '../db_config.php';
$talk = array();

if(isset($_POST["hero_id"]) && isset($_POST["people_id"]) && isset($_POST["people_talk_type"]))
{
  $hero_id = $_POST['hero_id'];
  $people_id = $_POST['people_id'];
  $type = $_POST["people_talk_type"];
  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //$stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`=1 AND `people_id`=4");
     $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `speak_type`=3  AND `type`={$type} ORDER BY `turn`");
     $db_talk = $stmt->fetchAll(PDO::FETCH_ASSOC);

     $db = null;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
  // talkの整形
  foreach($db_talk as $l)
  {
    echo "<p>{$l['speak']}</p>";
  }

}




?>
