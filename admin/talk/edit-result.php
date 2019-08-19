<?php include "../../db_config.php"; ?>
<?php
  if(!empty($_POST['hero_id'])){
    if(!empty($_POST['people_id'])){
      if(!empty($_POST['type'])){
        try
        {
          $ids = array();
          $turns = array();
          $speak_types = array();
          $speaks = array();
          $hero_id = $_POST['hero_id'];
          $people_id = $_POST['people_id'];
          $type = $_POST['type'];
          $ids = $_POST['id'];
          $turns = $_POST['turn'];
          $speak_types = $_POST['speak_type'];
          $speaks = $_POST['speak'];
          $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `type`={$type} ORDER BY `turn`");
          $db_talk1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $db = null;
          foreach($db_talk1 as $l)
          {
            $hero_talk = $l['hero_talk'];
          }
        }
        catch(PDOException $e)
        {
         echo $e->getMessage();
         exit;
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>管理者モード-会話内容</title>
    <style>
      #main{
        margin-top: 100px;
      }
    </style>
  </head>
  <body>
    <?php include "../headbar.php"; ?>
    <div id="main">

      <h2>会話内容</h2>
      <?php
      if ($hero_id == 1){$temp2 = "町長";}else if ($hero_id == 2){$temp2 = "町民";}else if ($hero_id == 3){$temp2 = "保健師";}
      if ($people_id == 1){$temp = "男性";}else if ($people_id == 2){$temp = "男性（病み）";}else if ($people_id == 3){$temp = "女性";}else if ($people_id == 4){$temp = "女性（病み）";}
      else if ($people_id == 5){$temp = "高齢男性";}else if ($people_id == 6){$temp = "高齢男性（病み）";}else if ($people_id == 7){$temp = "高齢女性";}else if ($people_id == 8){$temp = "高齢女性（病み）";}
      else if ($people_id == 9){$temp = "男子中学生";}else if ($people_id == 10){$temp = "男子中学生（病み）";}else if ($people_id == 11){$temp = "女子中学生";}else if ($people_id == 12){$temp = "女子中学生（病み）";}
      else if ($people_id == 13){$temp = "男の子";}else if ($people_id == 14){$temp = "男の子（病み）";}else if ($people_id == 15){$temp = "女の子";}else if ($people_id == 16){$temp = "女の子（病み）";}
      ?>
      <h3>変更しました。　　　-<?php echo $temp2; ?>、<?php echo $temp; ?>、Type：<?php echo $type; ?>-</h3>
      <?php
        $i = 0;
        foreach($ids as $ln)
        {
          if($ids[$i] > 0){
            try
            {
              $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $stmt = $db->query("SELECT * FROM `talk` WHERE `id`={$ids[$i]}");
              $db_talk = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $db = null;
              foreach($db_talk as $l)
              {
                $id = $l['id'];
                $turn = $l['turn'];
                $speak_type = $l['speak_type'];
                $speak = $l['speak'];
                if ($id == $ids[$i]){
                  if ($turn != $turns[$i]){
                    try
                    {
                      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
                      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $stmt = $db->query("UPDATE `talk` SET `turn` = {$turns[$i]} WHERE `id` = {$id}");
                      $db = null;
                      echo "id：{$id}　turn：{$turns[$i]}<br />";
                    }
                    catch(PDOException $e)
                    {
                     echo $e->getMessage();
                     exit;
                    }
                  }
                  if ($speak_type != $speak_types[$i]){
                    try
                    {
                      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
                      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $stmt = $db->query("UPDATE `talk` SET `speak_type` = {$speak_types[$i]} WHERE `id` = {$id}");
                      $db = null;
                      echo "id：{$id}　speak_type：{$speak_types[$i]}<br />";
                    }
                    catch(PDOException $e)
                    {
                     echo $e->getMessage();
                     exit;
                    }
                  }
                  if ($speak != $speaks[$i]){
                    try
                    {
                      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
                      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $stmt = $db->query("UPDATE `talk` SET `speak` = '{$speaks[$i]}' WHERE `id` = {$id}");
                      $db = null;
                      echo "id：{$id}　speak：{$speaks[$i]}<br />";
                    }
                    catch(PDOException $e)
                    {
                     echo $e->getMessage();
                     exit;
                    }
                  }
                }
              }
            }
            catch(PDOException $e)
            {
             echo $e->getMessage();
             exit;
            }
          }else{
            try
            {
              $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $db->query("INSERT INTO `talk`(`hero_id`, `hero_talk`, `people_id`, `type`, `turn`, `speak_type`, `speak`) VALUES ({$hero_id},{$hero_talk},{$people_id},{$type},{$turns[$i]},{$speak_types[$i]},'{$speaks[$i]}')");
              $db = null;
              echo "id：{$id}　turn：{$turns[$i]}　speak_type：{$speak_types[$i]}　speak：{$speaks[$i]}<br />";
            }
            catch(PDOException $e)
            {
             echo $e->getMessage();
             exit;
            }
          }
          $i += 1;
        }
        $hero_id = $_POST['hero_id'];
        $people_id = $_POST['people_id'];
        $type = $_POST['type'];
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=edit.php?hero_id={$hero_id}&people_id={$people_id}&type={$type}\">";
        echo "<br /><h3>３秒後にページが移動します。</h3>";
        echo "<a href=\"edit.php?hero_id={$hero_id}&people_id={$people_id}&type={$type}\">移動しない場合</a>";
      ?>
    </div>
  </body>
</html>
