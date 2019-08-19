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
     $location_shimotokida = $stmt->fetchAll(PDO::FETCH_ASSOC);
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


  // talkの整形
  foreach($location_shimotokida as $l)
  {

    $talk_item = array(
      "side_class"=>"left",
      "name"=> $people_jp_name,
      "message"=>$l['speak'],
      "img_url"=>""
    );

    array_push($talk, $talk_item);
  }

  echo json_encode($talk, JSON_UNESCAPED_UNICODE);
  //print_r($talk);
  //$item = $_POST['item'];
  //print($item);

}




?>
