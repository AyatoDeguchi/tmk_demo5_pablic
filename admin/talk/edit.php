<?php include "../../db_config.php"; ?>
<?php
  if(!empty($_GET['hero_id'])){
    if(!empty($_GET['people_id'])){
      if(!empty($_GET['type'])){
        try
        {
          $hero_id = $_GET['hero_id'];
          $people_id = $_GET['people_id'];
          $type = $_GET['type'];
          $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$people_id} AND `type`={$type} ORDER BY `turn`");
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
        <div><a href="../">TOP</a>＞<a href="index.php">主人公選択</a>＞<a href="hero.php?hero_id=<?php echo $hero_id; ?>">町人選択</a>＞<a href="hero_people.php?hero_id=<?php echo $hero_id; ?>&people_id=<?php echo $people_id; ?>">会話内容選択</a>＞会話内容編集</div>
        <h2>会話内容</h2>
        <?php
        if ($hero_id == 1){$temp2 = "町長";}else if ($hero_id == 2){$temp2 = "町民";}else if ($hero_id == 3){$temp2 = "保健師";}
        if ($people_id == 1){$temp = "男性";}else if ($people_id == 2){$temp = "男性（病み）";}else if ($people_id == 3){$temp = "女性";}else if ($people_id == 4){$temp = "女性（病み）";}
        else if ($people_id == 5){$temp = "高齢男性";}else if ($people_id == 6){$temp = "高齢男性（病み）";}else if ($people_id == 7){$temp = "高齢女性";}else if ($people_id == 8){$temp = "高齢女性（病み）";}
        else if ($people_id == 9){$temp = "男子中学生";}else if ($people_id == 10){$temp = "男子中学生（病み）";}else if ($people_id == 11){$temp = "女子中学生";}else if ($people_id == 12){$temp = "女子中学生（病み）";}
        else if ($people_id == 13){$temp = "男の子";}else if ($people_id == 14){$temp = "男の子（病み）";}else if ($people_id == 15){$temp = "女の子";}else if ($people_id == 16){$temp = "女の子（病み）";}
        ?>
        <h3>編集・追加・削除　-<?php echo $temp2; ?>、<?php echo $temp; ?>、Type：<?php echo $type; ?>-</h3>
        ※　注意事項 ページ下にあり
        <form action="edit-result.php" method="post">
        <table border="1" id="table" style="text-align: center;">
          <tr>
            <th><div style="background-color:#D4FBC4">id</div><br />通し番号</th><th><div style="background-color:#D4FBC4">turn</div><br />ターン数</th><th><div style="background-color:#D4FBC4">speak_type</div>speakに保存されている<br />データの種類</th><th><div style="background-color:#D4FBC4">speak</div><br />データ -会話内容、画像ファイル名-</th><th style="padding:5px;">削除</th>
          </tr>
        <?php
        echo "<input type=\"hidden\" name=\"hero_id\" value=\"{$hero_id}\" >";
        echo "<input type=\"hidden\" name=\"people_id\" value=\"{$people_id}\" >";
        echo "<input type=\"hidden\" name=\"type\" value=\"{$type}\" >";
          $i = 0;
          foreach($db_talk as $l)
          {
            $id = $l['id'];
            $hero_id = $l['hero_id'];
            $hero_talk = $l['hero_talk'];
            $people_id = $l['people_id'];
            $type = $l['type'];
            $turn = $l['turn'];
            $speak_type = $l['speak_type'];
            if ($speak_type == 1){$speak_type_temp = "<select name=\"speak_type[]\" onChange='selectChange({$i})'><option value=\"1\" selected>1：会話（画像前）</option><option value=\"2\">2：画像データ</option><option value=\"3\">3：会話（画像後）</option></select>";}
            else if ($speak_type == 2){$speak_type_temp = "<select name=\"speak_type[]\" onChange='selectChange({$i})'><option value=\"1\">1：会話（画像前）</option><option value=\"2\" selected>2：画像データ</option><option value=\"3\">3：会話（画像後）</option></select>";}
            else if ($speak_type == 3){$speak_type_temp = "<select name=\"speak_type[]\"  onChange='selectChange({$i})'><option value=\"1\">1：会話（画像前）</option><option value=\"2\">2：画像データ</option><option value=\"3\" selected>3：会話（画像後）</option></select>";}
            $speak = $l['speak'];
            echo <<< EOM
              <tr>
                <th>{$id}<input type="hidden" name="id[]" value="{$id}" ></th>
                <th><input type="number" name="turn[]" value="{$turn}" style="width:40px;"></th>
                <th>{$speak_type_temp}</th><th><textarea name="speak[]" style="width:310px;height:70px;">{$speak}</textarea></th>
                <th></th>
              </tr>
EOM;
            $i += 1;
          }
          $add_num_te = $i + 1;
          echo "<script>  var add_num = {$add_num_te};  </script>";
        ?>
        <script>
        var te = -1;
          function coladd() {
            var table = document.getElementById("table");
            // 行を行末に追加
            var row = table.insertRow(add_num);
            //td分追加
            var cell1 = row.insertCell(-1);
            var cell2 = row.insertCell(-1);
            var cell3 = row.insertCell(-1);
            var cell4 = row.insertCell(-1);
            var cell5 = row.insertCell(-1);
            // セルの内容入力
            cell1.innerHTML = '<input type="hidden" name="id[]" value="' + te + '" >'+ te +'(仮)';
            cell2.innerHTML = '<input type="number" name="turn[]" value="" style="width:40px;">';
            cell3.innerHTML = "<select name=\"speak_type[]\" onChange='selectChange(" + add_num + ")'><option value=\"1\" selected>1：会話（画像前）</option><option value=\"2\">2：画像データ</option><option value=\"3\">3：会話（画像後）</option></select>";
            cell4.innerHTML = '<textarea name="speak[]" style="width:310px;height:70px;"></textarea>';
            cell5.innerHTML = '';
            te -= 1;
            add_num += 1;
          }
        </script>
        <tr><th colspan="5"><input type="button" onclick="coladd()" value="追加" ></th></tr>
        </table>
        <p><input type="submit" value="変更">　<input type="reset" value="元に戻す"></p>
        </form>
        <p>※　・会話内容の制限：１画面４行×４０文字<br />　　・turn（ターン数）は必ず1から連続する昇順であること<br />　　・改行を行う際は以下のタグを使うことで改行がされる。<br />　　　<input type="text" value="<br>" readonly="readonly"></p>
      </div>
    </body>
  </html>
