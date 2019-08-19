<?php
include '../db_config.php';
$talk = array();

if(isset($_POST["hero_id"]) && isset($_POST["people_id"]) && isset($_POST["user_id"]) && isset($_POST["people_talk_type"]))
{
  $user_id = $_POST['user_id'];
  $hero_id = $_POST['hero_id'];
  $people_id = $_POST['people_id'];
  $type = $_POST["people_talk_type"];
  //$user_id_str = $user_id;
  //$hero_id_str = $hero_id;
  try
  {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //$stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`=1 AND `people_id`=4");
     $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `speak_type`=1 AND `type`={$type} ORDER BY `turn`");
     $db_talk = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $_stmt = $db->query("SELECT `jp_name` FROM `people` WHERE `id`={$people_id} ");
     $people_name = $_stmt->fetch(PDO::FETCH_ASSOC);
     $db = null;
     //print_r($people_name);
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
  $people_jp_name = $people_name['jp_name'];
  echo "<hr /><h3>{$people_jp_name}</h3>";

  // talkの整形
  foreach($db_talk as $l)
  {
    //echo "<hr style=\"border:2px dotted #fff;\">";
    echo "<p>{$l['speak']}</p>";
  }
}




?>
