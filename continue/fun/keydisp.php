<script>
function disp() // キーボード入力を反映して表示座標を更新
{
  if(left==1){
    menu_select("left");
  }
  if(right==1){
    menu_select("right");
  }
  if(up==1){
    menu_select("up");
  }
  if(down==1){
    menu_select("down");
  }
  if(Z_key==1){
    menu_select("ok");
  }
  if(X_key==1){
    menu_select("no");
  }
  setTimeout(disp,10000);
}
</script>
