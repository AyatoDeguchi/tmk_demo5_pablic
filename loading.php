
<style>
#loader {
  width: 40%;
  height: auto;
  display: none;
  position: absolute;
  bottom: 1%;
  left: 60%;
  /*margin-top: -20%; /* heightの半分のマイナス値 */
  /*margin-left: auto; /* widthの半分のマイナス値 */
  z-index: 100;
}

#fade {
  width: 100%;
  height: 100%;
  display: none;
  background-color: #000;
  position: absolute;
  top: 0px;
  left: 0px;
  z-index: 50;
}
</style>
<script>
$('head').append(
    '<style type="text/css">#main { display: none; } #fade, #loader { display: block; }</style>'
);

jQuery.event.add(window,"load",function() { // 全ての読み込み完了後に呼ばれる関数
    var pageH = $("#main").height();

    $("#fade").css("height", pageH).delay(900).fadeOut(800);
    $("#loader").delay(600).fadeOut(300);
    $("#main").css("display", "block");
});
/*
// ローディング画面をフェードインさせてページ遷移
$(function(){
    // リンクをクリックしたときの処理。外部リンクやページ内移動のスクロールリンクなどではフェードアウトさせたくないので少し条件を加えてる。
    $('a[href ^= ""]' + 'a[target != "_blank"]').click(function(){
        var url = $(this).attr('href'); // クリックされたリンクのURLを取得
        //$('#js-loader').fadeIn(600);    // ローディング画面をフェードイン
        $("#fade").fadeIn(600);
        $("#loader").fadeIn(600);
        setTimeout(function(){ location.href = url; }, 800); // URLにリンクする
        return false;
    });
});
 */
// ページのロードが終わった後の処理
$(window).load(function(){
  //$('#js-loader').delay(300).fadeOut(400); //ローディング画面をフェードアウトさせることでメインコンテンツを表示
  $('#fade').delay(300).fadeOut(400);
  $('#loader').delay(300).fadeOut(400);
});

// ページのロードが終わらなくても10秒たったら強制的に処理を実行
$(function(){ setTimeout('stopload()', 10000); });
function stopload(){
  //$('#js-loader').delay(300).fadeOut(400); //ローディング画面をフェードアウトさせることでメインコンテンツを表示
  $('#fade').delay(300).fadeOut(400);
  $('#loader').delay(300).fadeOut(400);
}

</script>
