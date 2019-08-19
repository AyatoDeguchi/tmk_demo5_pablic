<?php
  $text = array();
    try
    {
       $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt = $db->query("SELECT * FROM professional");
       $text = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $db = null;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
     exit;
    }
?>
<style>
@charset "UTF-8";
.scr {
  position: fixed;
  margin-left: 10px;
  overflow-y: scroll;   /* 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ陦ｨ遉ｺ */
  width: 80%;
  height: 61%;
  /*
  color: #FE2EF7;*/
  background-color: black;

}

.modal_content {
  height: 90%;
	width: 80% ;
	margin: 0 ;
	padding: 10px 20px ;
	border: 2px solid #aaa ;
	background: #fff ;
	position: fixed;
	display: none ;
	z-index: 2 ;
}

#modal-overlay {
	z-index: 1 ;
	display: none ;
	position: fixed ;
  left: 0;
  top:0;
	width: 100% ;
	height: 120%;
	background-color: rgba( 0,0,0, 0.75 ) ;
}

.image{
position: absolute;
width: auto;
height: auto;
max-width: 100%;
max-height: 90%;
bottom: 10%;
  left:0;
  top :10%;
  right:0;
   margin: auto;
}


.finish{
  position: absolute;
  top: 88%;
  left: 10%;
  font-size: 1.3vw;
  color: black;
}
.button-link{
  position: absolute;
  top:95%;
  left:10%;
  font-size: 1.5vw;
  color: black;
}
.title-back{
position: absolute;
top:4.5%;
right: 4%;
  	color: yellow ;
text-align: center;
text-decoration: none;
background-color: #000;
border-style: solid;
padding: 0.5%;
font-size: 1.2vw;

}
.title-back:hover {
	cursor: pointer ;
	color: #868A08 ;
}



.kensaku-box{
  width:70%;
  height: auto;
  font-size: 2vw;
}

.my-btn{
     font-size: 1.9vw;
    isplay: inline-block;
    text-decoration: none;
     background: white;/*ボタン色*/
     border: solid 2px #0000;
    border-radius: 3px;
    transition: .4s;
     color: black;
     height:auto;

}
.my_btn:hover {
    background:#A4A4A4;
    color: #A4A4A4;
}

.kensaku-result:hover {
    color: #FFF;
    text-decoration: none;
}
.kensaku_result2:hover {
    color: #A4A4A4;
}


</style>
<header role="banner">
  <!-- ハンバーガーボタン -->
  <button type="button" class="drawer-toggle drawer-hamburger"style="padding-right:20px;">
    <img src="../img/senmon_icon.png"width="50px"height="50px" id="senmon_icon" />
  </button>
  <!-- ナビゲーションの中身 -->
  <nav class="drawer-nav" role="navigation" style="background-color:black; width: 24rem;">
    <!--<h1 class="side-menu" style="margin-left:10px;">玉城町プロジェクト</h1>-->
    <img style="width:100%;margin-top: 0%;"src="../img/logo.png"><br />
    <hr />
    <div style="text-align: center;">
    <h3 class="side-menu">簡易型専門家モード</h3>
    <input id="kensaku-text" class="kensaku-box" type="text" />
    <button id="kensaku-btn" class="my-btn">検索</button>
    </div>
    <div id="list" class="scr drawer-menu-item kensaku-result side-menu" style="margin:0;padding-left:0;">
      <ul class="kensaku-ul" id="kensaku" style="margin: 0;font-size:20px;line-height: 37px;width:40%;">
        <?php
               $i = 0;
               foreach ($text as $r) {
                 $id = $r['id'];
                 $image = $r['image'];
                 $title = $r['title'];
                 $explain = $r['explain'];

                   echo <<< EOM
                   <li><a class="modal-syncer kensaku_result2" data-target="modal-content-{$i}"> {$title}</a></li>

EOM;
                  $i += 1;
               }
               ?>
      </ul>
    </div>
  </nav>
</header>
<div id="modal_pro">
  <?php
         $i = 0;
         foreach ($text as $r) {
           $id = $r['id'];
           $image = $r['image'];
           $title = $r['title'];
           $explain = $r['explain'];
             echo <<< EOM
             <div id="modal-content-{$i}" class="modal_content" style="z-index:7;">
             <img class="image" src="{$image}">
             <p class="finish">「閉じる」をクリックすると終了します。</p>
              <p><a id="modal-close"  class="button-link">閉じる</a></p>
             </div>
EOM;
            $i += 1;
         }
         ?>
</div>
<script src="side_nav.js" type="text/javascript"></script>
<script>
  document.getElementById("kensaku-btn").onclick = function() {
    var text = document.getElementById("kensaku-text").value;
    console.log(text);
    var parameter = {"q": text};
    exePHPFunc_pro(parameter).done(function(data_pro){
      console.log(data_pro);
      //data_status = JSON.parse(data_status);
      list.innerHTML = data_pro;
      modal_js();
      font_size();
    });
    exePHPFunc_pro2(parameter).done(function(data_pro2){
      console.log(data_pro2);
      //data_status = JSON.parse(data_status);
      modal_pro.innerHTML = data_pro2;
      modal_js();
    });
  }
  function exePHPFunc_pro(parameter)
  {
    var defer = $.Deferred();
    $.ajax({
      url: "professional_ajax.php",
      type: "POST",
      data: parameter,
      scriptCharset: 'utf-8',
      success: defer.resolve,
    });
    return defer.promise();
  }
  function exePHPFunc_pro2(parameter)
  {
    var defer = $.Deferred();
    $.ajax({
      url: "professional_ajax2.php",
      type: "POST",
      data: parameter,
      scriptCharset: 'utf-8',
      success: defer.resolve,
    });
    return defer.promise();
  }
  function modal_js(){

  //グローバル変数
  var nowModalSyncer = null ;		//現在開かれているモーダルコンテンツ
  var modalClassSyncer = "modal-syncer" ;		//モーダルを開くリンクに付けるクラス名

  //モーダルのリンクを取得する
  var modals = document.getElementsByClassName( modalClassSyncer ) ;

  //モーダルウィンドウを出現させるクリックイベント
  for(var i=0,l=modals.length; l>i; i++){

    //全てのリンクにタッチイベントを設定する
    modals[i].onclick = function(){

      //ボタンからフォーカスを外す
      this.blur() ;

      //ターゲットとなるコンテンツを確認
      var target = this.getAttribute( "data-target" ) ;

      //ターゲットが存在しなければ終了
      if( typeof( target )=="undefined" || !target || target==null ){
        return false ;
      }

      //コンテンツとなる要素を取得
      nowModalSyncer = document.getElementById( target ) ;

      //ターゲットが存在しなければ終了
      if( nowModalSyncer == null ){
        return false ;
      }

      //キーボード操作などにより、オーバーレイが多重起動するのを防止する
      if( $( "#modal-overlay" )[0] ) return false ;		//新しくモーダルウィンドウを起動しない
      //if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;		//現在のモーダルウィンドウを削除して新しく起動する

      //オーバーレイを出現させる
      $( "body" ).append( '<div style="z-index:6;position:fixed;left:0;top:0;width:100%;height:120%;background-color:rgba(0,0,0,0.75);" id="modal-overlay"></div>' ) ;
      $( "#modal-overlay" ).fadeIn( "fast" ) ;

      //コンテンツをセンタリングする
      centeringModalSyncer() ;

      //コンテンツをフェードインする
      $( nowModalSyncer ).fadeIn( "slow" ) ;

      //[#modal-overlay]、または[#modal-close]をクリックしたら…
      $( "#modal-overlay,#modal-close" ).unbind().click( function() {

        //[#modal-content]と[#modal-overlay]をフェードアウトした後に…
        $( "#" + target + ",#modal-overlay" ).fadeOut( "fast" , function() {

          //[#modal-overlay]を削除する
          $( '#modal-overlay' ).remove() ;

        } ) ;

        //現在のコンテンツ情報を削除
        nowModalSyncer = null ;

      } ) ;

    }
    //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
    $( window ).resize( centeringModalSyncer ) ;

    //センタリングを実行する関数
    function centeringModalSyncer() {

      //モーダルウィンドウが開いてなければ終了
      if( nowModalSyncer == null ) return false ;

      //画面(ウィンドウ)の幅、高さを取得
      var w = $( window ).width() ;
      var h = $( window ).height() ;

      //コンテンツ(#modal-content)の幅、高さを取得
      // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
  //		var cw = $( nowModalSyncer ).outerWidth( {margin:true} ) ;
  //		var ch = $( nowModalSyncer ).outerHeight( {margin:true} ) ;
      var cw = $( nowModalSyncer ).outerWidth() ;
      var ch = $( nowModalSyncer ).outerHeight() ;

      //センタリングを実行する
      $( nowModalSyncer ).css( {"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"} ) ;

    }
  }
  console.log('aaaaaaaaaaaaaaaaaaaaaaaaa');
  }
</script>
