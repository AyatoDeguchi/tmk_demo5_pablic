<?php
  $url = "https://boo-tmk18.ssl-lolipop.jp/demo5/";
?>
<style>
/* ------headber内------ */

  #headbar {
   /* ▼上端に固定するCSS */
   position: fixed;
   top: 0px;
   left: 0px;
   width: 100%;
   height: 80px;

   /* ▼バーの装飾 */
   background-color: #000;  /* 背景色 */
   color: white;             /* 文字色 */
   box-shadow: 3px 3px 3px rgba(51,0,204,0.5); /* 影 */
  }

  .headbar{
  padding: 5px ;
  }

  .headbar-list ul{
    float: right;
    margin: 0;
    margin-top: 50px;
    padding: 5px 10px 5px 10px;
  }

  .headbar-list li {
    float: left;
    margin-right: 14px;
    list-style-type: none;
    margin: 0px 5px 0px 5px;
  }
  .color-hover-y {
    color: #fff;
  }
  .color-hover-y:hover {
    color: #ff0;
    font-weight:bold;
  }
  .logo{
    position: absolute;
    height: 90%;
  }
</style>
<div id="headbar" class="headbar">
  <img class="logo" style="margin: 0%;" src="<?php echo $url; ?>img/logo.png">
   <div class="headbar-list">
   <ul>
     <li><a href="<?php echo $url; ?>admin/talk/" class="color-hover-y">会話内容</a></li>
     <li><a href="#" class="color-hover-y">---</a></li>
     <li><a href="#" class="color-hover-y">---</a></li>
     <li><a href="#" class="color-hover-y">---</a></li>
     <li><a href="<?php echo $url; ?>" class="color-hover-y">ゲームを開始する</a></li>
   </ul>
  </div>
</div>
