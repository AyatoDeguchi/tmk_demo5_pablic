<style>
  #help{
    /* ▼表示位置を画面の右下に固定 */
    position: absolute; /* ←表示場所を固定 */
    top: 5%;   /* ←下端からの距離 */
  /*  top: 446px;*/
    right: 5%;    /* ←右端からの距離 */
    left: 5%;
    bottom: 5%;
    background-color:black;
    opacity: 1;             /* ←透明度 */
    padding: 4px;
    /*padding-right: 80px;*/
    /*width: auto;*/
    color: #fff;
    /*height: auto;*/
    line-height: 45px;
    text-align: left;
    display: inline-block;
    border-radius: 2%;
    font-size: 28px;
    border: 5px solid #fff
  }
  .table-ul {
    display: table;
    table-layout: fixed;
    text-align: center;
    width: auto;
  }
  .table-li {
    display: table-cell;
    vertical-align: middle;
  }
  .scr_l {
    position: absolute;
    overflow-y: scroll;   /* スクロール表示 */
    width: 35%;
    height:85%;
  }
  .scr_r {
    position: absolute;
    overflow-y: scroll;   /* スクロール表示 */
    width: 60%;
    height:85%;
    left:35%;
  }
</style>
<?php
    $hero_id = $_GET['hero_id'];
    $talk_all = "";
    try
    {
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $i = 1;
     //for($i=1;$i<=16;$i++){
       foreach ($people_talk_type as $r) {
       for ($j=1; $j <= $r ; $j++) {
       //echo "i:".$i."r:".$r."j:".$j."<br />";
       $_stmt = $db->query("SELECT `jp_name` FROM `people` WHERE `id`={$i} ");
       $people_name = $_stmt->fetch(PDO::FETCH_ASSOC);
       $people_jp_name = $people_name['jp_name'];
       $talk_all = $talk_all."<hr /><h3>{$people_jp_name}</h3>";
       $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$i} AND `speak_type`=1 AND `type`={$j} ORDER BY `turn`");
       $db_talk_speak_type_1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach($db_talk_speak_type_1 as $l){$talk_all = $talk_all."<p>{$l['speak']}</p>";}
       $stmt = $db->query("SELECT COUNT(*) as talk2_num FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$i} AND `speak_type`=2 AND `type`={$j} ORDER BY `turn`");
       $db_talk2_num = $stmt->fetch(PDO::FETCH_ASSOC);
       $talk2_num = $db_talk2_num['talk2_num'];
       if($talk2_num >= 1){
         $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$i} AND `speak_type`=2 AND `type`={$j} ORDER BY `turn`");
         $db_talk_speak_type_2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach($db_talk_speak_type_2 as $l){$img = '../data/'.$l['speak'];$talk_all = $talk_all."<img style=\"width:100%;margin-top: 0%;\"src=\"{$img}\"><br />";}
         $stmt = $db->query("SELECT COUNT(*) as talk3_num FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$i} AND `speak_type`=3 AND `type`={$j} ORDER BY `turn`");
         $db_talk3_num = $stmt->fetch(PDO::FETCH_ASSOC);
         $talk3_num = $db_talk3_num['talk3_num'];
         if($talk3_num >= 1){
           $stmt = $db->query("SELECT * FROM `talk` WHERE `hero_id`={$hero_id} AND `people_id`={$i} AND `speak_type`=3  AND `type`={$j} ORDER BY `turn`");
           $db_talk_speak_type_3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
           foreach($db_talk_speak_type_3 as $l){$talk_all = $talk_all."<p>{$l['speak']}</p>";}
         }
       }
     }
     $i++;
     }
     $db = null;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
     exit;
    }
?>
<div id="help" class="boxContainer" style="display:none;">
  <!-- ページのタイトル表示 -->
  <p id="title" style="margin-left:10px;margin-top:1%;margin-bottom:1%;">ヘルプ</p>
  <hr style="margin-top:0;margin-bottom:0;">
    <!-- キャラの頭上の矢印配置 -->
      <ul class="table-ul" style="list-style:none;padding:0;margin-bottom:1%;margin-top:1%;width:100%">
        <li class="table-li scr_l" style="list-style:none;padding:0;padding-top:2%;">
          <ul>
            <li id="help-button1">操作方法</li>
            <li id="help-button4">全ての会話</li>
            <li id="help-button2">著作権について</li>
            <li id="help-button3">クレジット</li>
          </ul>
        </li>
        <li class="table-li scr_r" id="sentences" style="padding-left:2%;text-align:left;font-size: 25px;">
          <div id="help-text"></div>
        </li>
      </ul>
</div>
<script>
console.log();
  document.getElementById("help-button1").onclick = function() {
  document.getElementById("help-text").innerHTML = "------------<br>製作中…<br>近日完成予定<br>------------<br>";
};

  document.getElementById("help-button2").onclick = function() {
  document.getElementById("help-text").innerHTML = "【マップ出力API】<br>Google maps API<br><br>【JSライブラリ】<br>MessageViewJS<br><br>【フリーイラスト素材】<br>いらすとや<br><br>【フリーイラスト素材】<br>イラストAC<br><br>【フリー音楽素材】<br>魔王魂<br><br>【統計データ出典】<br>総務省『国勢調査』<br><br>【統計データ出典】<br>平成28年度　2月<br>『玉城町まち・ひと・しごと創生に関するアンケート調査 【結果報告書】』<br><br>【統計データ出典】<br>平成27年度<br>『第５次玉城町総合計画後期基本計画の策定に向けた住民意識調査告書』<br><br>【統計データ出典】<br>平成28年度<br>『玉城町男女共同参画 町民意識調査 結果報告書（速報版）』<br>";
};

  document.getElementById("help-button3").onclick = function() {
    document.getElementById("help-text").innerHTML = "<img style=\"width:100%;margin-top: 0%;\"src=\"../img/logo.png\"><br /><ul style=\"list-style: none;padding:0;width:auto;\"><li>TMKプロジェクト メンバー監修</li><li>　　皇學館大学 教育開発センター<br>　　　　助教 池山　敦</li><li>　　聖隷クリストファー大学 公衆衛生看護学<br>　　　　助教 伊藤　純子</li><li>　　合同会社 ひと・まち・住まい研究所<br>　　　　代表社員 浅見　雅之</li></ul>";
  };

  document.getElementById("help-button4").onclick = function() {
    //document.getElementById("help-text").innerHTML = "<h2>全ての会話</h2>" + help_text_log;
    document.getElementById("help-text").innerHTML = "<h2>全ての会話</h2>" + '<?php echo $talk_all; ?>';
  };

  function help(){
    button_none();
    document.getElementById("cmd").style.display = "none";
    document.getElementById("help").style.display = "block";
    document.getElementById("b_btn").style.display = "block";
    $('#b_btn').css('right', 20+'px');
    $('#b_btn').css('bottom', 'auto');
    $('#b_btn').css('top', 20+'px');
    b_btn.innerHTML = '× 閉じる';
    $('#b_btn').css('width', 200+'px');
    $('#b_btn').css('opacity', 1);
    $('#b_btn').css('font-size', 32+'px');
  }
</script>
