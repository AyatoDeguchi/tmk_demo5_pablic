<style>
  #status {
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
    line-height: 60px;
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
</style>
<div id="status" class="boxContainer" style="display:none;">
  <!-- ページのタイトル表示 -->
    <p id="title" style="margin-left:10px;margin-top:1%;margin-bottom:1%;">ステータス　　Level：<a id="status_level"></a>　　総プレイ時間：<a id="status_playtime"></a></p>
  <hr style="margin-top:0;margin-bottom:0;">
    <!-- キャラの頭上の矢印配置 -->
      <ul class="table-ul" style="list-style:none;padding:0;margin-bottom:1%;margin-top:1%;width:100%">
      <ul class="table-li" style="list-style:none;width:20%;padding:0;padding-top:2%;">
        <!-- キャラ画像の配置 -->
        <li id="chara-img"><img src="../img/<?php echo $h_png; ?>"></li>
        <!-- キャラ文字の配置 -->
        <li id="chara-name"><?php echo $h_name; ?></li>
      </ul>
        <!-- キャラ説明文 -->
        <li class="table-li" id="sentences" style="padding-left:2%;text-align:left;width:40%;font-size: 25px;">
          <p><?php echo $h_feature; ?></p>
        </li>
        <li class="table-li" style="list-style:none;text-align:left;line-height:22px;">
          <p id="title" style="font-size:25px;">現在の住民との会話 達成率</p>
          <canvas  id="myChart"></canvas>
        </li>
        </ul>
</div>
<script>
  function status(){
    document.getElementById("cmd").style.display = "none";
    var parameter = {"user_id": user,"hero_id": shujinko};
    exePHPFunc_status_level(parameter).done(function(data_status_level){
      console.log(data_status_level);
      document.getElementById("status_level").innerHTML = data_status_level;
    });
    exePHPFunc_status_playtime(parameter).done(function(data_status_playtime){
      console.log(data_status_playtime);
      document.getElementById("status_playtime").innerHTML = data_status_playtime;
    });
    var parameter = {"user_id": user,"hero_id": shujinko};
    exePHPFunc_status(parameter).done(function(data_status){
      console.log(data_status);
      data_status = JSON.parse(data_status);
      document.getElementById("status").style.display = "block";
      //--------------------------------------------------------------グラフ
      var ctx = document.getElementById("myChart").getContext("2d");
      var myBarChart = new Chart(ctx, {
          type: 'pie',
          data: {
          labels: ["クリア","未達成"],
          datasets: [{
              label: '%',
              data: data_status,
                      backgroundColor:
                          ['rgba(255, 0, 235, 0.8)','rgba(255, 197, 0, 0.6)'],
                      borderColor:['rgba(255, 0, 235, 1)','rgba(255, 197, 0, 1)'],
                      borderWidth: 1
                  }]
              },
              });
    });
  }

  /* -----------------------------------
   * phpを呼び出す
   * -----------------------------------*/
  function exePHPFunc_status(parameter)
  {
  	var defer = $.Deferred();

  	$.ajax({
  		url: "status_ajax.php",
  		type: "POST",
  		data: parameter,
  		scriptCharset: 'utf-8',
  		success: defer.resolve,
  	});
  	return defer.promise();
  }
  function exePHPFunc_status_level(parameter)
  {
  	var defer = $.Deferred();

  	$.ajax({
  		url: "status_level_ajax.php",
  		type: "POST",
  		data: parameter,
  		scriptCharset: 'utf-8',
  		success: defer.resolve,
  	});
  	return defer.promise();
  }
  function exePHPFunc_status_playtime(parameter)
  {
  	var defer = $.Deferred();

  	$.ajax({
  		url: "status_playtime_ajax.php",
  		type: "POST",
  		data: parameter,
  		scriptCharset: 'utf-8',
  		success: defer.resolve,
  	});
  	return defer.promise();
  }
</script>
