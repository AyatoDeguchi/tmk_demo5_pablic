<style>
  #level {
    /* ▼表示位置を画面の右下に固定 */
    position: absolute; /* ←表示場所を固定 */
    top: 20%;   /* ←下端からの距離 */
  /*  top: 446px;*/
    right: 20%;    /* ←右端からの距離 */
    left: 20%;
    bottom: 20%;
    background-color:black;
    opacity: 1;             /* ←透明度 */
    padding: 4px;
    /*padding-right: 80px;*/
    /*width: auto;*/
    color: #fff;
    /*height: auto;*/
    line-height: 70px;
    text-align: left;
    display: inline-block;
    border-radius: 2%;
    font-size: 50px;
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
<div id="level" class="boxContainer" style="display:none;">
  <!-- ページのタイトル表示 -->
    <p style="margin-left:10px;margin-top:1%;margin-bottom:1%;">Level UPしました！</p>
    <p style="margin-left:10px;font-size:300%;text-align: center;margin-bottom:15%;"><a id="level_bef">--</a> → <a id="level_up">--</a></p>
    <p style="margin-right:20px;margin-top:1%;margin-bottom:1%;text-align: right;"><a style="color:yellow;" href="index.html?user_id=<?php echo $user_id; ?>&hero_id=<?php echo $hero_id; ?>">閉じる</a></p>
</div>
<script>

</script>
