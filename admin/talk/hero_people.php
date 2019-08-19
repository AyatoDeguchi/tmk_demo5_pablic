<?php include "../../db_config.php"; ?>
<?php
  if(!empty($_GET['hero_id'])){
    if(!empty($_GET['people_id'])){
      try
      {
        $hero_id = $_GET['hero_id'];
        $people_id = $_GET['people_id'];
        $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id}");
        $db_talk = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
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
        <div><a href="../">TOP</a>＞<a href="index.php">主人公選択</a>＞<a href="hero.php?hero_id=<?php echo $hero_id; ?>">町人選択</a>＞会話内容選択</div>
        <h2>会話内容</h2>
        <?php
        if ($hero_id == 1){$temp2 = "町長";}else if ($hero_id == 2){$temp2 = "町民";}else if ($hero_id == 3){$temp2 = "保健師";}
        if ($people_id == 1){$temp = "男性";}else if ($people_id == 2){$temp = "男性（病み）";}else if ($people_id == 3){$temp = "女性";}else if ($people_id == 4){$temp = "女性（病み）";}
        else if ($people_id == 5){$temp = "高齢男性";}else if ($people_id == 6){$temp = "高齢男性（病み）";}else if ($people_id == 7){$temp = "高齢女性";}else if ($people_id == 8){$temp = "高齢女性（病み）";}
        else if ($people_id == 9){$temp = "男子中学生";}else if ($people_id == 10){$temp = "男子中学生（病み）";}else if ($people_id == 11){$temp = "女子中学生";}else if ($people_id == 12){$temp = "女子中学生（病み）";}
        else if ($people_id == 13){$temp = "男の子";}else if ($people_id == 14){$temp = "男の子（病み）";}else if ($people_id == 15){$temp = "女の子";}else if ($people_id == 16){$temp = "女の子（病み）";}
        ?>
        <h3>編集・追加・削除 会話内容選択　-<?php echo $temp2; ?>、<?php echo $temp; ?>-</h3>
        <table border="1">
          <tr>
            <th></th><th>会話の出だし</th><th style="padding:5px;">編集</th><th style="padding:5px;">削除</th>
          </tr>
        <?php
          $type_temp = 0;
          foreach($db_talk as $l)
          {
            $id = $l['id'];
            $hero_id = $l['hero_id'];
            $hero_talk = $l['hero_talk'];
            $people_id = $l['people_id'];
            $type = $l['type'];
            $turn = $l['turn'];
            $speak_type = $l['speak_type'];
            $speak = $l['speak'];
            if($type > $type_temp){
              echo "<tr><td>type：{$type}</td><td>{$speak}</td><td style=\"padding:5px;\"><a href=\"edit.php?hero_id={$hero_id}&people_id={$people_id}&type={$type}\">編集</a></td><td style=\"padding:5px;\"><a href=\"delete.php?hero_id={$hero_id}&people_id={$people_id}&type={$type}\">削除</a></td></tr>";
              $type_temp = $type;
            }
          }
          echo "<tr><th colspan=\"4\"><a href=\"add.php?hero_id={$hero_id}&people_id={$people_id}\">追加</a></th></tr>";
        ?>
        </table>
        <br /><hr />
        <h3>データベース内一覧　-<?php echo $temp2; ?>、<?php echo $temp; ?>-</h3>
        <div><a style="background-color:#D4FBC4">　　　</a>　データベース内容</div><div>(無色)　解説</div><br />
        <table border="1">
          <tr>
            <th><div style="background-color:#D4FBC4">id</div><br />通し番号</th><th><div style="background-color:#D4FBC4">hero_id</div><br />主人公</th><th><div style="background-color:#D4FBC4">hero_talk</div>主人公に対しての<br />通し番号</th><th><div style="background-color:#D4FBC4">people_id</div><br />町民</th><th><div style="background-color:#D4FBC4">type</div>主人公と町民の<br />パターン番号</th><th><div style="background-color:#D4FBC4">turn</div><br />ターン数</th><th><div style="background-color:#D4FBC4">speak_type</div>speakに保存されている<br />データの種類</th><th><div style="background-color:#D4FBC4">speak</div><br />データ -会話内容、画像ファイル名-</th>
          </tr>
          <?php
          foreach($db_talk as $l)
          {
            $id = $l['id'];
            $hero_id = $l['hero_id'];
            $hero_talk = $l['hero_talk'];
            $people_id = $l['people_id'];
            $type = $l['type'];
            $turn = $l['turn'];
            $speak_type = $l['speak_type'];
            $speak = $l['speak'];
            echo "<tr>";
            echo "<td><div style=\"background-color:#D4FBC4\">{$id}</div><br /></td>";
            if ($hero_id == 1){$temp = "町長";}else if ($hero_id == 2){$temp = "町民";}else if ($hero_id == 3){$temp = "保健師";}
            echo "<td><div style=\"background-color:#D4FBC4\">{$hero_id}</div>{$temp}</td>";
            echo "<td><div style=\"background-color:#D4FBC4\">{$hero_talk}</div><br /></td>";
            if ($people_id == 1){$temp = "男性";}else if ($people_id == 2){$temp = "男性（病み）";}else if ($people_id == 3){$temp = "女性";}else if ($people_id == 4){$temp = "女性（病み）";}
            else if ($people_id == 5){$temp = "高齢男性";}else if ($people_id == 6){$temp = "高齢男性（病み）";}else if ($people_id == 7){$temp = "高齢女性";}else if ($people_id == 8){$temp = "高齢女性（病み）";}
            else if ($people_id == 9){$temp = "男子中学生";}else if ($people_id == 10){$temp = "男子中学生（病み）";}else if ($people_id == 11){$temp = "女子中学生";}else if ($people_id == 12){$temp = "女子中学生（病み）";}
            else if ($people_id == 13){$temp = "男の子";}else if ($people_id == 14){$temp = "男の子（病み）";}else if ($people_id == 15){$temp = "女の子";}else if ($people_id == 16){$temp = "女の子（病み）";}
            echo "<td><div style=\"background-color:#D4FBC4\">{$people_id}</div>{$temp}</td>";
            echo "<td><div style=\"background-color:#D4FBC4\">{$type}</div><br /></td>";
            echo "<td><div style=\"background-color:#D4FBC4\">{$turn}</div><br /></td>";
            if ($speak_type == 1){$temp = "会話（画像前）";}else if ($speak_type == 2){$temp = "画像データ";}else if ($speak_type == 3){$temp = "会話（画像後）";}
            echo "<td><div style=\"background-color:#D4FBC4\">{$speak_type}</div>{$temp}</td>";
            echo "<td><div style=\"background-color:#D4FBC4\">{$speak}</div></td>";
            echo "</tr>";
          }
          ?>
        </table>
        <br /><hr />
        <?php $hero_id = $_GET['hero_id']; if ($hero_id == 1){$temp = "町長";}else if ($hero_id == 2){$temp = "町民";}else if ($hero_id == 3){$temp = "保健師";} ?>
        <h3>町人選択 -<?php echo $temp; ?>-</h3>
        <ul>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=1">男性</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=2">男性（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=3">女性</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=4">女性（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=5">高齢男性</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=6">高齢男性（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=7">高齢女性</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=8">高齢女性（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=9">男子中学生</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=10">男子中学生（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=11">女子中学生</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=12">女子中学生（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=13">男の子</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=14">男の子（病み）</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=15">女の子</a></li>
          <li><a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=16">女の子（病み）</a></li>
        </ul>
      </div>
    </body>
  </html>
