<?php
/*
  $talk = array();


  $talk_1 = array(
    "side_class"=>"right",
    "name"=>"生方 すみれ",
    "message"=>"このJavaScriptライブラリ。<br>普段書いいているブログより反響がいいみたいね。。",
    "img_url"=>""
  );

  $talk_2 = array(
    "side_class"=>"left",
    "name"=>"斑 王石",
    "message"=>"な、な、なにぃいいいぃいい〜〜〜〜！！<br>う、う、嬉しいじゃねーかぁ！！？",
    "img_url"=>""
  );


  array_push($talk, $talk_1);
  array_push($talk, $talk_2);

  echo json_encode($talk, JSON_UNESCAPED_UNICODE);
*/



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

     /*$continue_id_str =  strval($user_id_str). strval($hero_id_str);
     $continue_id = (int)$continue_id_str;
     print_r($continue_id_str);echo " ";
     print_r($continue_id);*/
     $continue_id = $user_id * 10 + $hero_id;
     //print_r($continue_id);
     foreach($db_talk as $l)
     {
       $hero_talk = $l['hero_talk'];
     }

     $stmt = $db->query("SELECT COUNT(*) as continue_num from `continue` where `continue_id` = {$continue_id};");
     $db_continue_num = $stmt->fetch(PDO::FETCH_ASSOC);
     $continue_num = $db_continue_num['continue_num'];
     //print_r($continue_num);
     if($continue_num == 1){
       $db->query("UPDATE `continue` SET `{$hero_talk}`=1 WHERE `continue_id`={$continue_id}");
     }else{
       $db->query("INSERT INTO `continue` ( `continue_id`, `user_id` ,`{$hero_talk}` ) VALUES ( {$continue_id} , {$user_id} , 1 ) " );
     }
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
  foreach($db_talk as $l)
  {

    $talk_item = array(
      "side_class"=>"left",
      "name"=> $people_jp_name,
      "message"=>$l['speak'],
      "img_url"=>"../data/gazou_load.png"
    );

    array_push($talk, $talk_item);
  }

  echo json_encode($talk, JSON_UNESCAPED_UNICODE);
  //print_r($talk);
  //$item = $_POST['item'];
  //print($item);

}




?>
