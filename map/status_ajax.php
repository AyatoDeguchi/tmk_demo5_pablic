<?php

include 'db_config.php';
$talk = array();

if(isset($_POST["hero_id"])&& isset($_POST["user_id"]))
{
  $user_id = $_POST['user_id'];
  $hero_id = $_POST['hero_id'];
  $is_logined = false; // ログインが成功したか否かのフラグ
  $db_hero = array();
  $hero_name;
  $par = 0;
  $no_par =0;

    // 入力値とDBとの照合
    if(!empty($user_id))
    {
      try
      {
         // connect
         $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $is_logined = true;
           $last_hero_id = $hero_id;

           $stmt = $db->query("SELECT * FROM `hero` WHERE `id`= {$last_hero_id}");
           $db_hero = $stmt->fetch(PDO::FETCH_ASSOC);

           $hero_talk_num = $db_hero['hero_talk_num'];
           $hero_name = $db_hero['name'];

           $continue_id = $user_id * 10 + $last_hero_id;

           $stmt = $db->query("SELECT * FROM `continue` WHERE `continue_id`= {$continue_id}");
           $db_continue = $stmt->fetch(PDO::FETCH_ASSOC);

           $sum = 0;

           //print_r($db_continue);
           if($db_continue > 0){
             for($i = 1;$i <= $hero_talk_num +3;$i++){
               list( $key, $value ) = each( $db_continue );
               if($key == 'id' || $key == 'user_id' || $key == 'continue_id'){

               }else{
                 $sum = $sum + $value;
               }
             }
             //echo $sum;
             $par = ($sum/$hero_talk_num)*100;
             $no_par = 100 - $par;
           }else{
             $par = 0;
             $no_par = 100;
           }
         $db = null;
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
      }
    }
}
echo "[{$par},{$no_par}]";
?>
