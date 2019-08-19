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
     $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `speak_type`=2 AND `type`={$type} ORDER BY `turn`");
     $location_shimotokida = $stmt->fetchAll(PDO::FETCH_ASSOC);

     $db = null;
     //print_r($people_name);
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }


  // talkの整形
  foreach($location_shimotokida as $l)
  {
    $img = '../data/'.$l['speak'];
    echo "<img style=\"width:100%;margin-top: 0%;\"src=\"{$img}\"><br />";
  }

}
?>
